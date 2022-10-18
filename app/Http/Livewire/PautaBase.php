<?php

namespace App\Http\Livewire;

use App\Models\Atributo;
use App\Models\Escala;
use App\Models\Estado;
use App\Models\Evaluacion;
use App\Models\Grabacion;
use App\Models\Log;
use App\Models\Respuesta;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Livewire\Component;
use Auth;

abstract class PautaBase extends Component
{
    public $evaluacion_id;
    public $bloqueo;
    public $modales;
    public $grabaciones;
    public $marca_ici ;
    public $nivel_ec;
    public $agente_id;
    public $evaluacion;
    public $respuestas;
    public $grupos;

    public $respuestasO1;

    public $modal = [
        'id' => null,
        'contenido' => null,
        'titulo' => null,
    ];
    public $modalesValidos = ['historial', 'centro', 'ici'];

    public $opciones = [];

    protected $template;
    protected $tipoPuntaje;
    protected $requeridos;

    /**
     * Dem Render
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        $evaluacion = Evaluacion::find($this->evaluacion_id);

        // Asegurarse que siempre existan los arreglos para el modelo de Livewire
        if (!$this->respuestas || !$this->grupos) {
            $this->crearArreglosRespuestas($evaluacion);
        }
        if (!$this->evaluacion) {
            $this->evaluacion = $evaluacion->toArray();
        }
        $pauta_ok = $this->pautaEsValida();
        // Validaciones
        $pauta = $evaluacion->getPauta();
//        dd($this->respuestas);
        
        return view('livewire.' . $this->template, [
            'escalas' => $pauta->escalas(),
            'requeridos' => $this->requeridos,
            'grabaciones' => Grabacion::where('evaluacion_id', $this->evaluacion_id)->get(),
            'estados_evaluacion' => Estado::where('tipo', 1)
                ->where('visible', 1)
                ->when($this->evaluacion['estado_id'] == 20, function ($query) {
                    $query->orWhere('id', 20);
                })->get()->all(),
            'atributos' => $evaluacion->atributos()->keyBy('id')->all(),
            'pauta_ok' => $pauta_ok,
            'bloqueada' => !$evaluacion->puedeEditar(Auth::user())
        ]);
    }

    /**
     * Crea una version plana (arreglo) de las respuestas que se sincronizará con la interfaz para el
     * guardado en tiempo real de los cambios. Solo será llamado cuando no se encuentre en memoria este arreglo o
     * el arreglo de Grupos (complemento a als respuestas que incluye detalles como familias y no_aplica).
     *
     * @param $evaluacion
     * @return void
     */
    public function crearArreglosRespuestas($evaluacion)
    {
        if (Auth::user()->perfil == User::SUPERVISOR && !$this->respuestasO1) {
            $this->respuestasO1 = $evaluacion->respuestas()->where('origen_id',1)->get()->keyBy('atributo_id')->toArray();
        }
        $arregloRespuestas = [];
        $arregloGrupos = ['primarios' => [], 'no_aplica' => []];
        foreach ($evaluacion->respuestas->where('origen_id', 1) as $respuesta) {
            // Respuestas
            if ($respuesta->atributo->tipo_respuesta == 'escala') {
                $arregloRespuestas[$respuesta->atributo_id] = $this->escalaId($respuesta);
            } elseif ($respuesta->atributo->tipo_respuesta == 'texto') {
                $arregloRespuestas[$respuesta->atributo_id] = $respuesta->respuesta_memo;
            } else {
                $arregloRespuestas[$respuesta->atributo_id] = $respuesta->respuesta_text;
            }
            // Grupos
            if ($respuesta->atributo->tipo_respuesta == 'grupo_hijo') {
                $arregloGrupos['primarios'][$respuesta->atributo->id_primario][] = $respuesta->atributo->id;
            }
            // No Aplica
            if ($respuesta->atributo->no_aplica == 1) {
                $arregloGrupos['no_aplica'][] = $respuesta->atributo->id;
            }
        }
        $this->respuestas =  $arregloRespuestas;
        $this->grupos =  $arregloGrupos;
    }


    /**
     * Retorna el ID de la escala asociada a una respuesta.
     *
     * @param $respuesta
     * @return null
     */
    public function escalaId($respuesta)
    {
        if ($respuesta->respuesta_int) {
            foreach ($this->escalas as $escala) {
                if (in_array($respuesta->atributo_id, $escala['opciones'])) {
                    try {
                        return Escala::where('grupo_id', $escala['grupo_id'])
                            ->where('value', $respuesta->respuesta_int)
                            ->first()->id;
                    } catch (\Exception $e) {
                        return null;
                    }

                }
            }
        }
        return null;
    }


    /**
     * Gatilla cambios en grupos al cambiar un campo. Se llama luego de cambiar una respuesta. Esto actualiza los
     * valores en el padre, segun corresponda.
     *
     * @param $atributo
     * @return void
     */
    public function actualizarPadre($atributo)
    {
        $algoMarcado = false;
        $noAplicaMarcado = false;
        // Tiene padre
        if ($atributo->id_primario) {
            $IDsHermanos = $this->grupos['primarios'][$atributo->id_primario];
            foreach ($IDsHermanos as $atributo_id) {
                if ($this->respuestas[$atributo_id] == 'checked') {
                    $algoMarcado = true;
                    //dd($atributo->no_aplica == 1);
                    if (in_array($atributo_id, $this->grupos['no_aplica'])) {
                        $noAplicaMarcado = true;
                    }
                }
            }
            if ($noAplicaMarcado) {
                $respuestaTextPadre = "No Aplica";
            } elseif ($algoMarcado) {
                $respuestaTextPadre = "No";
            } else {
                $respuestaTextPadre = "Si";
            }
            $this->respuestas[$atributo->id_primario] = $respuestaTextPadre;
            $this->guardarRespuesta($atributo->id_primario, $respuestaTextPadre);
        }
    }

    public function guardarRespuestas($respuestas)
    {
        foreach ($respuestas as $respuesta) {
            $this->respuestas[$respuesta[0]] = $respuesta[1];
            $this->guardarRespuesta($respuesta[0], $respuesta[1]);
        }
    }

    /**
     * Guarda una unica respuesta en la base de datos
     *
     * @param $atributo_id
     * @param $respuesta_text
     * @return void
     */
    public function guardarRespuesta($atributo_id, $respuesta_text)
    {

        $respuesta = Respuesta::where('evaluacion_id', $this->evaluacion_id)
            ->where('origen_id', 1)
            ->firstWhere('atributo_id', $atributo_id);
        $atributo = $respuesta->atributo;
        if ($atributo->tipo_respuesta == 'escala') {
            if ($respuesta_text) {
                $escala = Escala::find($respuesta_text);
                $respuesta->respuesta_text = $escala->name;
                $respuesta->respuesta_int = $escala->value;
            } else {
                $respuesta->respuesta_text = null;
                $respuesta->respuesta_int = null;
            }

        } else if ($atributo->tipo_respuesta == 'texto') {
            $respuesta->respuesta_text = "";
            $respuesta->respuesta_int = ($respuesta_text == "" ? 0 : 1);
            $respuesta->respuesta_memo = $respuesta_text;
        } else if ($atributo->tipo_respuesta == 'check' || $atributo->tipo_respuesta == 'grupo_hijo') {
            if ($respuesta_text == 'checked') {
                $respuesta->respuesta_int = 1;
                $respuesta->respuesta_text = $respuesta_text;
            } else {
                $respuesta->respuesta_int = 0;
                $respuesta->respuesta_text = '';
            }
        } else if ($atributo->tipo_respuesta == 'booleano' || $atributo->tipo_respuesta == 'booleano_na' || $atributo->tipo_respuesta == 'grupo_padre') {
            if ($respuesta_text == "Si") {
                $respuesta->respuesta_int = 1;
            } elseif ($respuesta_text == "No") {
                $respuesta->respuesta_int = 0;
            } elseif ($respuesta_text == "No Aplica") {
                $respuesta->respuesta_int = -1;
            }
            $respuesta->respuesta_text = $respuesta_text;
        }
        $respuesta->save();
    }


    /**
     * Función que se llama siempre luego de cambiar un valor de respuesta en la pauta.
     *
     * @param $respuesta_text
     * @param $atributo_id
     * @return void
     */
    public function updatedRespuestas($respuesta_text, $atributo_id)
    {
        if ($this->evaluacion['estado_id'] == 1) {
            $this->evaluacion['estado_id'] = 20;
            $evaluacion = Evaluacion::find($this->evaluacion_id);
            $evaluacion->cambiarEstado(Estado::EVALUACION_EN_EVALUACION);
        }
//        dd($atributo_id, $respuesta_text);
        $this->guardarRespuesta($atributo_id, $respuesta_text);
        $this->propagarCambio($atributo_id);
        $this->actualizarPadre(Atributo::find($atributo_id));
    }


    /**
     * Función que se llama siempre luego de cambiar un parámetro de la evaluación en la pauta.
     *
     * @param $valor
     * @param $columna
     * @return void
     */
    public function updatedEvaluacion($valor, $columna)
    {
        $evaluacion = Evaluacion::find($this->evaluacion_id);
        $evaluacion->{$columna} = $valor;
        $evaluacion->save();
    }


    /**
     * Determina el modo en que se valida una pauta.
     *
     * @return mixed
     */
    public abstract function validarPauta();


    /**
     *
     *
     * @return mixed
     */
    public abstract function propagarCambio($atributo_id);


    /**
     * Determina si la pauta tiene completados los campos definidos como "requeridos".
     *
     * @return bool
     */
    public function pautaEsValida()
    {
        $this->validarPauta();
        foreach ($this->requeridos as $requerido) {
            if ($this->respuestas[$requerido] === null) {
                return false;
            }
        }
        return true;
    }





    /**
     * Agrega un ID de atributo como requerido en la pauta.
     *
     * @param array $atributos_id
     * @return void
     */
    public function agregarValidaciones(array $atributos_id)
    {
        foreach ($atributos_id as $atributo_id) {
            if (!in_array($atributo_id, $this->requeridos)) {
                $this->requeridos[] = $atributo_id;
            }
        }
    }


    /**
     * Remueve un ID de atributo como requerido en la pauta.
     *
     * @param $atributos_id
     * @return void
     */
    public function quitarValidaciones($atributos_id)
    {
        foreach ($atributos_id as $atributo_id) {
            $indice = array_search($atributo_id, $this->requeridos);
            if ($indice !== false) {
                unset($this->requeridos[$indice]);
            }
        }
    }


    /**
     * Carga una lista de escalas para ser utilizadas en la interfaz.
     * TODO: Obsoleta
     *
     * @param $escalas
     * @param $cargarOpciones
     * @return void
     */
    public function cargarEscalas($escalas, $cargarOpciones = True)
    {
        foreach ($escalas as $escala) {
            $this->{$escala['nombre']} = Escala::where('grupo_id',$escala['grupo_id'])->orderBy('value', 'ASC')->get();
            if ($cargarOpciones) {
                foreach ($escala['opciones'] as $opcion) {
                    $this->opciones[$opcion] = $this->{$escala['nombre']}->pluck('name')->all();
                }
            }
        }
    }


    /**
     * Determina si una respuesta de la pauta tiene un valor diferente en la interfaz y en la base de datos.
     *
     * @param $respuesta
     * @return bool|null
     */
    public function haCambiado($atributo)
    {
        if ($atributo->tipo_respuesta == 'escala') {
            $escala = Escala::find($this->respuestas[$atributo->id]);

            try {
                return $this->respuestasO1[$atributo->id]['respuesta_int'] != ($escala === null ? null : $escala->value);
            } catch (\Exception $e) {
                dd($respuesta, $atributo, $this->respuestas[$atributo->id], $escala);
            }

        } elseif ($atributo->name_categoria !== 'Memo') {
            return $this->respuestasO1[$atributo->id]['respuesta_text'] != $this->respuestas[$atributo->id];
        }
        return null;
    }

    /**
     * Efectúa un proceso de evaluación de calidad interna
     */
    public function ici()
    {
        if (Auth::user()->perfil == User::SUPERVISOR) {
            $puntaje = 100;
            foreach ($this->respuestasO1 as $respuesta) {
                $atributo = Atributo::find($respuesta['atributo_id']);
                $respuestaO2 = new Respuesta;
                $respuestaO2->origen_id = Respuesta::ICI;
                $respuestaO2->respuesta_int = $respuesta['respuesta_int'];
                $respuestaO2->respuesta_text = $respuesta['respuesta_text'];
                $respuestaO2->respuesta_memo = $respuesta['respuesta_memo'];
                $respuestaO2->atributo_id = $respuesta['atributo_id'];
                $respuestaO2->evaluacion_id = $respuesta['evaluacion_id'];
                $respuestaO2->save();
                if ($this->haCambiado($atributo)) {
                    if ($atributo->ponderador_ici !== null) {
                        $puntaje -= $atributo->ponderador_ici;
                    }
                }
            }
            $evaluacion = Evaluacion::find($this->evaluacion_id);
            $evaluacion->ici = max($puntaje, 0); /* TOTAL ATRIBUTOS NO MEMO? */
            $evaluacion->user_ici = Auth::user()->id;
            $evaluacion->fecha_ici = now()->format('d-m-Y H:i:s');
            $evaluacion->save();
            $this->save();
        }

    }


    /**
     * Guarda el formulario verificando estado actualizado de la evaluación y las validaciones.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function save()
    {
        $this->calcularPuntaje();
        $this->actualizarEstados();
        return redirect(route('evaluacions.index', ['evaluacion_id'=>$this->evaluacion_id]));

    }


    /**
     * Calcula el puntaje luego de completar la pauta.
     *
     * @return void
     */
    public function calcularPuntaje()    {

        $evaluacion = Evaluacion::find($this->evaluacion_id);        
        if ($this->tipoPuntaje == 'PEC') {
            $this->calcularPEC($evaluacion->atributos()->where('check_ec', 1));
        } elseif ($this->tipoPuntaje == 'ReclamosRetenciones') {
            $this->calcularPECPadres($evaluacion->atributos()->where('check_ec', 1));
            $this->evaluacion['pf'] = $this->calcularPENC($evaluacion->atributos()->where('check_primario', 1));
            $evaluacion->pf = $this->evaluacion['pf'];
        } elseif ($this->tipoPuntaje == 'VentasRemotas') {
            if($evaluacion->tipo_gestion == 'Venta'){                
                $atributosCriticos = $evaluacion->atributos()->where('check_ec', 1);
                $atributosCriticosLeves = $evaluacion->atributos()->wherein('id', [213, 217, 240, 274, 280, 287, 320]);
                $atributosCriticosIntermedios = $evaluacion->atributos()->wherein('id', [218, 225, 234, 248, 255, 261, 282, 285, 286]);
                $atributosCriticosGraves = $evaluacion->atributos()->wherein('id', [219, 226, 235, 241, 242, 249, 256, 275, 281, 284, 295, 321]);
            }else{
                $atributosCriticos = $evaluacion->atributos()->wherein('id', [213, 217, 218, 219, 225, 226, 234, 235, 240, 241, 242, 295, 320, 321]);
                $atributosCriticosLeves = $evaluacion->atributos()->wherein('id', [213, 217, 240, 320]);
                $atributosCriticosIntermedios = $evaluacion->atributos()->wherein('id', [218, 225, 234]);
                $atributosCriticosGraves = $evaluacion->atributos()->wherein('id', [219, 226, 235, 241, 242, 295, 321]);
            }  

            $this->calcularPECSimple($atributosCriticos, $atributosCriticosLeves, $atributosCriticosIntermedios, $atributosCriticosGraves);

        } elseif ($this->tipoPuntaje == 'CallVoz') {

            $atributosPECU = $evaluacion->atributos()->wherein('id', [543, 544, 545, 546, 547, 548, 549, 550, 554, 555, 556, 557, 558, 559, 560, 561, 565, 566, 567, 568, 569, 570, 571, 572, 592, 594]);
            $atributosPECN = $evaluacion->atributos()->wherein('id', [576, 577, 578, 579, 580, 581, 582, 583, 584, 593, 595, 596]);
            $atributosPECC = $evaluacion->atributos()->wherein('id', [586, 587, 588, 589, 590]);

            $this->calcularPECVoz($atributosPECU, $atributosPECN, $atributosPECC);
        }
        if ($this->tipoPuntaje == 'ReclamosRetenciones'){
            $this->evaluacion['penc'] = $this->calcularPENC(
                $evaluacion->atributos()->where('tipo_respuesta', 'grupo_padre')->where('name_categoria', 'PENC')
            );
        }else{
            $this->evaluacion['penc'] = $this->calcularPENC(
                $evaluacion->atributos()->where('tipo_respuesta', 'grupo_padre')
            );
        }
        

        $evaluacion->penc = $this->evaluacion['penc'];

        $evaluacion->pecc = $this->evaluacion['pecc'];
        $evaluacion->pecu = $this->evaluacion['pecu'];
        $evaluacion->pecn = $this->evaluacion['pecn'];
        
        if($this->tipoPuntaje == 'VentasRemotas'){
            $evaluacion->nivel_ec = $this->evaluacion['nivel_ec'];
        }else{
            $evaluacion->nivel_ec = $this->calcularNivelEC(
                $this->evaluacion['pecc'], $this->evaluacion['pecu'], $this->evaluacion['pecn']
            );
        }       

        $evaluacion->save();
    }


    /**
     * Determina el Nivel de Error Crítico.
     * TODO: Rehacer
     *
     * @param $pecc
     * @param $pecu
     * @param $pecn
     * @return int
     */
    public function calcularNivelEC($pecc, $pecu, $pecn)
    {
        if ($pecu == 0) {
            if ($pecc == 0 || $pecn == 0) {
                return 3;
            }
            return 2;
        } else {
            if ($pecc == 0 && $pecn == 0) {
                return 2;
            }
        }
        return 1;
    }


    /**
     * Guarda cambios en el historial
     * TODO: Se usa?
     *
     * @param $accion
     * @param $detalles
     * @return void
     */
    public function guardarEnHistorial($accion, $detalles)
    {
        if ($detalles['antes'] != $detalles['despues']) {
            $log = new Log();
            $log->user_id = Auth::user()->id;
            $log->evaluacion_id = $this->evaluacion->id;
            $log->accion = $accion;
            $log->detalles = $detalles;
            $log->save();
        }
    }


    /**
     * TODO: Pendiente
     *
     * @param $atributosCriticos
     * @return boolean
     */
    public function hayBrechas($atributosCriticos)
    {
        foreach($atributosCriticos as $atributo) {
            if ($this->respuestas[$atributo->id] == "checked") {
                $respuestaCentro = Respuesta::where('origen_id', 3)
                    ->where('evaluacion_id', $this->evaluacion_id)
                    ->where('atributo_id', $atributo->id)
                    ->orderBy('id', 'DESC')->first();
                if($respuestaCentro) {
                    if ($respuestaCentro->respuesta_int == 0) {
                        return true;
                    }
                }
            }
        }
        return false;
    }


    /**
     * Calcula el puntaje para atributos No Críticos.
     *
     * @param $atributosPENC
     * @return float|int
     */
    public function calcularPENC($atributosPENC)
    {
        $sumaPonderadoresAplican = 0;
        $sumaPonderadoresMarcados = 0;
        $respuestas = [];
        $ponderadores = [];        
        foreach ($atributosPENC as $atributo) {
            $respuesta = $this->respuestas[$atributo->id];
            $respuestas[$atributo->id] = $respuesta;
            $ponderadores[$atributo->id] = $atributo->ponderador;
            if ($respuesta != 'No Aplica') {
                $sumaPonderadoresAplican += intval($atributo->ponderador);
            }
            if ($respuesta == 'Si') {
                $sumaPonderadoresMarcados += intval($atributo->ponderador);
            }
        }        
        
        return 100 * ($sumaPonderadoresMarcados / $sumaPonderadoresAplican);
    }


    /**
     * TODO: Para otras pautas
     * Calcula el Puntaje Final, utilizando los ponderadores definidos en la base de datos.
     *
     * @param $ponderadoresPF
     * @return void
     */
    public function calcularPF($ponderadoresPF)
    {
        $sumatotal = 0;
        $suma = 0;

        foreach ($ponderadoresPF as $atributo_id => $ponderador) {
            $respuesta = $this->evaluacion->respuestas->firstWhere('atributo_id', $atributo_id);
            $sumatotal += $ponderador;
            if ($respuesta->respuesta_int < 0) {
                $sumatotal -= $ponderador;
            }
            if ($respuesta->respuesta_int > 0) {
                $suma += $ponderador;
            }
        }
        $this->evaluacion->pf = ($suma / $sumatotal) * 100;
    }


    /**
     * PEC Simple
     * TODO: Esperando generalización (implementación en otras pautas).
     *
     * @param $atributosCriticos
     * @param $atributosCriticosLeves
     * @param $atributosCriticosIntermedios
     * @param $atributosCriticosGraves
     * @return void
     */
    public function calcularPECSimple($atributosCriticos, $atributosCriticosLeves, $atributosCriticosIntermedios, $atributosCriticosGraves)
    {
        $suma = 0;
        foreach ($atributosCriticos as $atributo) {
            if ($this->respuestas[$atributo->id] != 'checked') {
                $suma++;
            }
        }
        //dd($atributosCriticos, $atributosCriticosLeves, $atributosCriticosIntermedios, $atributosCriticosGraves);
        foreach ($atributosCriticosLeves as $atributo) {
            if ($this->respuestas[$atributo->id] == 'checked') {
                $this->evaluacion['nivel_ec'] = Evaluacion::EC_LEVE;
            }
        }
        foreach ($atributosCriticosIntermedios as $atributo) {
            if ($this->respuestas[$atributo->id] == 'checked') {
                $this->evaluacion['nivel_ec'] = Evaluacion::EC_INTERMEDIO;
            }
        }
        foreach ($atributosCriticosGraves as $atributo) {
            if ($this->respuestas[$atributo->id] == 'checked') {
               
                $this->evaluacion['nivel_ec'] = Evaluacion::EC_GRAVE;
            }
        }
        
        $this->evaluacion['pecu'] = ($suma / count($atributosCriticos)) * 100;
        
    }


    /**
     * Calcula el puntaje PEC utilizando un arreglo que describe los atributos críticos.
     *
     * @param $atributosCriticos
     * @return void
     */
    public function calcularPEC($atributosCriticos)
    {
        $this->evaluacion['pecu'] = 100;
        $this->evaluacion['pecn'] = 100;
        $this->evaluacion['pecc'] = 100;
        foreach ($atributosCriticos as $atributo) {
            $tipo = substr($atributo->name_interno, 0, strpos($atributo->name_interno, "_"));
            if ($this->respuestas[$atributo->id] == 'checked') {
                $this->evaluacion[$tipo] = 0;
            }
        }
    }

    public function calcularPECVoz($atributosPECU, $atributosPECN, $atributosPECC)
    {
        $this->evaluacion['pecu'] = 100;
        $this->evaluacion['pecn'] = 100;
        $this->evaluacion['pecc'] = 100;
        foreach ($atributosPECU as $atributo) {            
            if ($this->respuestas[$atributo->id] == 'checked') {
                $this->evaluacion['pecu'] = 0;
            }
        }
        foreach ($atributosPECN as $atributo) {            
            if ($this->respuestas[$atributo->id] == 'checked') {
                $this->evaluacion['pecn'] = 0;
            }
        }
        foreach ($atributosPECC as $atributo) {            
            if ($this->respuestas[$atributo->id] == 'checked') {
                $this->evaluacion['pecc'] = 0;
            }
        }
    }


    /**
     * PEC Padres
     * TODO: Esperando generalización (implementación en otras pautas).
     *
     * @param $atributosCriticos
     * @return void
     */
    public function calcularPECPadres($atributosCriticos)
    {
        $this->evaluacion['pecu'] = 100;
        $this->evaluacion['pecn'] = 100;
        $this->evaluacion['pecc'] = 100;
        foreach ($atributosCriticos as $atributo) {
            $tipo = substr($atributo->name_interno, 0, strpos($atributo->name_interno, "_"));
            if ($this->respuestas[$atributo->id] == 'No') {
                $this->evaluacion[$tipo] = 0;
            }
        }
    }


    /**
     * Gestiona posibles cambios de estado en una evaluación al guardar.
     *
     * @return void
     */
    public function actualizarEstados()
    {
        $evaluacion = Evaluacion::find($this->evaluacion_id);
        
        // Si tiene estado 1 o 20 guarda a quien completa la evaluación
        if ($evaluacion->enBlanco()) {
            $evaluacion->user_completa = Auth::user()->name;
            $evaluacion->fecha_completa = now()->format('d-m-Y H:i:s');
        }
        // Si no tiene usuario vinculado vincula al actual
        if (is_null($evaluacion->user_id )) {
            $evaluacion->user_id = Auth::user()->id;
        }
        // Si es supervisor
        if(Auth::user()->perfil == User::SUPERVISOR){
            $evaluacion->user_supervisor = Auth::user()->name;
            $evaluacion->fecha_supervision = now()->format('d-m-Y H:i:s');
            $evaluacion->cambiarEstado(Estado::EVALUACION_COMPLETA_Y_REVISADA);

            if($evaluacion->nivel_ec > Evaluacion::EC_LEVE && $evaluacion->estado_reporte == Estado::REPORTE_SIN_REPORTE){
                $evaluacion->estado_reporte = Estado::REPORTE_REVISADO_PARA_ENVIAR;
            }
            if($evaluacion->nivel_ec == Evaluacion::EC_LEVE && $evaluacion->estado_reporte == Estado::REPORTE_SIN_REPORTE){
                $evaluacion->estado_reporte = NULL;
            }
        }else{
            if($this->hayBrechas($evaluacion->atributos()->where('check_ec', 1))){
                $evaluacion->cambiarEstado(Estado::EVALUACION_ENVIADADA_A_REVISION);
                if($evaluacion->estado_reporte == NULL){
                    $evaluacion->estado_reporte = Estado::REPORTE_SIN_REPORTE;
                }
            }elseif($evaluacion->getPauta()->id == 6){
                if($evaluacion->pecu == 0 || $evaluacion->pecn == 0 || $evaluacion->pecc == 0){
                    $evaluacion->cambiarEstado(Estado::EVALUACION_ENVIADADA_A_REVISION);
                    if($evaluacion->estado_reporte == NULL){
                        $evaluacion->estado_reporte = Estado::REPORTE_SIN_REPORTE;
                    }
                }else{
                    $evaluacion->cambiarEstado(Estado::EVALUACION_COMPLETA);
                }
            }else{
                $evaluacion->cambiarEstado(Estado::EVALUACION_COMPLETA);
            }
            
        }
        $evaluacion->save();
    }

    /**
     * Abre un modal.
     *
     * @param $modalID
     * @return void
     */
    public function abrirModal($modalID)
    {
        // Si es un modal valido
        if (in_array($modalID, $this->modalesValidos)) {
            if ($modalID == 'historial') {
                $contenido = Log::where('evaluacion_id', $this->evaluacion_id)->get();
                $titulo = 'Historial de cambios';
            } elseif ($modalID == 'centro') {
                $contenido = Respuesta::where('evaluacion_id', $this->evaluacion_id)->where('origen_id', Respuesta::CENTRO)->get();
                $titulo = 'Respuestas del centro';
            } elseif ($modalID == 'ici') {
                $contenido = Respuesta::where('evaluacion_id', $this->evaluacion_id)->where('origen_id', Respuesta::ICI)->get();
                $titulo = 'Respuestas ICI';
            }
            if (isset($contenido, $titulo)) {
                $this->modal['id'] = $modalID;
                $this->modal['contenido'] = $contenido;
                $this->modal['titulo'] = $titulo;
            }

        }
    }


    /**
     * Cierra el modal
     *
     * @return void
     */
    public function cerrarModal()
    {
        $this->modal = [
            'id' => null,
            'contenido' => null,
            'titulo' => null,
        ];
    }

}
