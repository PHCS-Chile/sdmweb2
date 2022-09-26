<?php

namespace App\Http\Controllers;

use App\Models\Agente;
use App\Models\Asignacion;
use App\Models\Bloqueo;
use App\Models\Estudio;
use App\Models\Evaluacion;
use App\Models\Grabacion;
use App\Models\Log;
use App\Models\Notificacion;
use App\Models\Periodo;
use App\Models\Reporte;
use App\Models\Respuesta;
use App\Models\Estado;
use App\Models\Escala;
use App\Models\Servicio;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;

/**
 * Class EvaluacionController
 * @package App\Http\Controllers
 * @version 13
 */

class EvaluacionController extends Controller
{

    private $templates = [
        1 => 'index_digital',
        2 => 'index_voz',
        3 => 'index_ventas',
        4 => 'index_backoffice',
        5 => 'index_retenciones',
        6 => 'index_callvoz',
    ];


    public function reporte($evaluacionid){
        $evaluacionfinal = Evaluacion::where('id',$evaluacionid)->first();
        $respuestas = Respuesta::where('evaluacion_id',$evaluacionid)->get();
        $estados = Estado::all();
        $gestiones = Escala::where('grupo_id',1)->get();
        $resoluciones = Escala::where('grupo_id',2)->get();
        return view('evaluacions.reporte',compact( 'evaluacionfinal',  'estados', 'respuestas',
            'gestiones', 'resoluciones'));
    }


    /**
     * Crea respuestas por defecto para una pauta en blanco, segun el tipo de respuesta seteado en la base de datos
     *
     * @param $evaluacion_id
     * @return void
     */
    public function crearRespuestas($evaluacion_id)
    {
        $evaluacion = Evaluacion::find($evaluacion_id);
        //$respuestas = $evaluacion->respuestas->where('origen_id', 1);
        foreach ($evaluacion->atributos() as $atributo) {
            //$respuesta = $respuestas->firstWhere('atributo_id', $atributo->id);
            $respuesta = $evaluacion->respuestas->where('origen_id',1)->where('atributo_id', $atributo->id)->first();
            if (!$respuesta) {
                $nuevaRespuesta = new Respuesta();
                $nuevaRespuesta->origen_id = 1;
                $nuevaRespuesta->atributo_id = $atributo->id;
                $nuevaRespuesta->evaluacion_id = $evaluacion->id;
                if ($atributo->tipo_respuesta == 'grupo_padre') {
                    $nuevaRespuesta->respuesta_int = 1;
                    $nuevaRespuesta->respuesta_text = "Si";
                } elseif ($atributo->tipo_respuesta == 'booleano_na') {
                    $nuevaRespuesta->respuesta_int = -1;
                    $nuevaRespuesta->respuesta_text = "No Aplica";
                } elseif ($atributo->tipo_respuesta == 'grupo_hijo') {
                    $nuevaRespuesta->respuesta_int = 0;
                    $nuevaRespuesta->respuesta_text = "";
                }  elseif ($atributo->tipo_respuesta == 'check') {
                    $nuevaRespuesta->respuesta_int = 0;
                    $nuevaRespuesta->respuesta_text = "";
                }
                $nuevaRespuesta->save();
            }
        }
        
    }


    /**
     * Carga una Pauta para ser mostrada y editada
     *
     * @param $evaluacion_id
     * @return Application|Factory|View|RedirectResponse
     */
    public function index($evaluacion_id){
        $bloqueo = Bloqueo::where('tipo', 1)->where('evaluacion_id', $evaluacion_id)->orderBy('id', 'DESC')->first();
        // Caso no loah bloqueo
        if ($bloqueo === NULL) {
            $bloqueo = Bloqueo::nuevo(Auth::user()->id, $evaluacion_id, 1);
        } else {
            if (plazoCumplido($bloqueo->created_at, Bloqueo::DURACION)) {
                $bloqueo = Bloqueo::nuevo(Auth::user()->id, $evaluacion_id, 1);
            } elseif (!$bloqueo->activo) {
                $bloqueo = Bloqueo::nuevo(Auth::user()->id, $evaluacion_id, 1);
            } else {
                if ($bloqueo->user_id != Auth::user()->id) {
                    return back()->withErrors(['msg' => 'La evaluación se encuentra bloqueada por ' . User::find($bloqueo->user_id)->name]);
                }

            }
        }

        $this->crearRespuestas($evaluacion_id);
        $estados = Estado::all();
        $evaluacion = Evaluacion::find($evaluacion_id);
        $asignacion_id = $evaluacion->asignacion_id;
        $agente_id = Asignacion::where('id',$asignacion_id)->first()->agente_id;
        $rut_ejecutivo = $evaluacion->rut_ejecutivo;
        $pauta = $evaluacion->getPauta()->id;
        $historial = Log::where('evaluacion_id', $evaluacion_id)->get();
        $respuestasCentro = Respuesta::where('evaluacion_id', $evaluacion_id)->where('origen_id', Respuesta::CENTRO)->get();
        $grabaciones = Grabacion::where('evaluacion_id', $evaluacion_id)->get();
        $modales = [
            ['id' => 'historial', 'template' => 'evaluacions.voz.modal_historial', 'titulo' => 'Historial de cambios', 'cambios' => $historial],
            ['id' => 'respuestas-centro', 'template' => 'evaluacions.voz.modal_centro', 'titulo' => 'Respuestas del centro', 'respuestas' => $respuestasCentro]
        ];


        if (in_array($pauta, [1, 2, 3, 4, 5, 6])) {
            return view('evaluacions.' . $this->templates[$pauta], compact(
                'evaluacion_id','estados', 'pauta', 'grabaciones', 'modales', 'historial', 'bloqueo', 'asignacion_id', 'rut_ejecutivo', 'agente_id'
            ));
        }
        abort(404);
    }


    public function atrasDesbloqueando(Request $request, $evaluacion_id)
    {
        $bloqueo = Bloqueo::where('tipo', 1)->where('evaluacion_id', $evaluacion_id)->orderBy('id', 'DESC')->first();
        $evaluacion = Evaluacion::where('id',$evaluacion_id)->first();
        if (Auth::user()->id == $bloqueo->user_id) {
            $bloqueo->activo = false;
            $bloqueo->save();
        }
        // Botones "Volver" del Evaluador y Supervisor segun pauta
        if($request->formulario == 1){return redirect()->route('asignacions.ejecutivoevaluaciones', [$evaluacion->asignacion_id, $evaluacion->rut_ejecutivo]);}

        //if($request->formulario == 2){return redirect()->route('asignacions.ejecutivoevaluacionescallvoz', [$evaluacion->asignacion_id]);}
        if($request->formulario == 2){
            if($evaluacion->asignacion->estudio_id == 2 || $evaluacion->asignacion->estudio_id == 3){
                return redirect()->route('asignacions.ejecutivoevaluacionescallvoz', [$evaluacion->asignacion_id]);
            }else{
                return redirect()->route('asignacion.ejecutivo', [$evaluacion->asignacion_id, $evaluacion->nombre_ejecutivo]);
            }
        }
        // Botones "Volver" solo para el Supervisor
        if($request->formulario == 3){return redirect()->route('calidad.index');}
        if($request->formulario == 4){return redirect()->route('evaluacions.reportes');}
        if($request->formulario == 5){return redirect()->route('avances.index');}



    }

    public function chat($evaluacionid){
        $evaluacionfinal = Evaluacion::where('id',$evaluacionid)->first();
        $pauta = $evaluacionfinal->asignacion->estudio->pauta->id;
        $chat = Grabacion::where('evaluacion_id', $evaluacionfinal->id)->first()->url;
        //$chat = $evaluacionfinal->image_path;
        return view('evaluacions.chat',compact( 'evaluacionfinal',  'chat', 'pauta'));
    }

    public function indexNotify($evaluacionid)
    {
        if(Auth::user()->perfil != 1) {
            abort(403);
        }
        $notificacion = Notificacion::where('evaluacion_id', $evaluacionid)->where('activa', true)->first();
        if ($notificacion) {
            $notificacion->leida = true;
            $notificacion->save();

        }
        return $this->index($evaluacionid);
    }

    public function guardaeval(Request $request, $evaluacionid){

        $evaluacion = Evaluacion::where('id',$evaluacionid)->first();
        if ($request->has('form1')) {
            //Formulario para pegar el Chat de Whatsapp
            //$evaluacion->image_path = $request->textochatinput;
            //$evaluacion->user_id = Auth::user()->id;



            if(strlen($request->textochatinput) > 0)
            {
                $grabacion = new Grabacion();
                $grabacion->evaluacion_id = $evaluacionid;
                $grabacion->tamano = 0;
                $grabacion->nombre = "";
                $grabacion->url = $request->textochatinput;
                $grabacion->save();
                $evaluacion = Evaluacion::find($evaluacionid);
                $evaluacion->estado_conversacion = 17;
                $evaluacion->user_id = Auth::user()->id;
                $evaluacion->save();
                $message = "El chat se guardo correctamente";
            }else{
                $message = "No hay ningun chat para guardar";
            }



        } elseif ($request->has('form3')) {
            $evaluacion->cambiarEstado($request->cambioestado);
            $message = "El estado se cambio correctamente";
        } elseif ($request->has('descartarEval')) {
            $evaluacion->cambiarEstado(6);
            $message = "La evaluación se descarto correctamente";
        } elseif ($request->has('desbloquearEval')) {
            $evaluacion->cambiarEstado(20);
            $message = "La evaluación se desbloqueo. Recuerda guardar despues de hacer las modificaciones.";
        } elseif ($request->has('enviarRevision')) {
            $evaluacion->cambiarEstado(3);
            $message = "La evaluación se envió a Revisión";
        }
        $evaluacion->save();
        return redirect(route('evaluacions.index', ['evaluacion_id' => $evaluacionid]))->with("status", $message);
    }

//    public function reportes()
//    {
//        $mercados = Agente::distinct()->get('mercado');
//        return $this->reportesMercado($mercados->first()->mercado);
//    }

    public function reportes(Request $request)
    {
        $periodos = Periodo::where('visible', 1)->get();
        $periodo_0 = new Periodo();
        $periodo_0->id = 0;
        $periodo_0->name = "Todos";
        $periodos->prepend($periodo_0);
        $periodoSeleccionado = intval(!empty($request->filter) ? $request->periodo : $periodos->last()->id);

        $mercados = collect([
            ['id' => '0', 'name' => 'Mixto'],
            ['id' => 'Hogar', 'name' => 'Hogar'],
            ['id' => 'Móvil', 'name' => 'Móvil']
        ]);
        $mercadoSeleccionado = !empty($request->filter) ? $request->mercado : '0';

        $estudios = Estudio::all();
        $estudio_0 = new Estudio();
        $estudio_0->id = 0;
        $estudio_0->name = "Todos";
        $estudios->prepend($estudio_0);
        $estudioSeleccionado = intval(!empty($request->filter) ? $request->estudio : 0);

        $servicios = $estudioSeleccionado === 0 ? Servicio::all() : Servicio::where('estudio_id', $estudioSeleccionado)->get();
        $servicio_0 = new Servicio();
        $servicio_0->id = 0;
        $servicio_0->name = "Todos";
        $servicios->prepend($servicio_0);
        $servicioSeleccionado = intval(!empty($request->filter) ? $request->servicio : 0);
        $todoFiltrado = $periodoSeleccionado !== 0 && $estudioSeleccionado !== 0 && $servicioSeleccionado !== 0;

        $evaluaciones = Evaluacion::whereIn('estado_reporte', [11, 12, 13])
            ->when($periodoSeleccionado !== 0, function ($query) use ($periodoSeleccionado) {
                return $query->whereIn('asignacion_id', Asignacion::where('periodo_id', $periodoSeleccionado)->get()->pluck('id')->all());
            })
            ->when($mercadoSeleccionado !== '0', function ($query) use ($mercadoSeleccionado) {
                return $query->whereIn(
                    'asignacion_id',
                    Asignacion::whereIn(
                        'agente_id',
                        Agente::where('mercado', $mercadoSeleccionado)->get()->pluck('id')->all()
                    )->get()->pluck('id')->all()
                );
            })
            ->when($mercadoSeleccionado === '0', function ($query) use ($mercadoSeleccionado) {
                return $query->whereIn(
                    'asignacion_id',
                    Asignacion::whereIn(
                        'agente_id',
                        Agente::where('mercado', '<>', 'Temp')->get()->pluck('id')->all()
                    )->get()->pluck('id')->all()
                );
            })
            ->when($estudioSeleccionado !== 0, function ($query) use ($estudioSeleccionado) {
                return $query->whereIn('asignacion_id', Asignacion::where('estudio_id', $estudioSeleccionado)->get()->pluck('id')->all());
            })
            ->when($servicioSeleccionado !== 0, function ($query) use ($servicioSeleccionado) {
                return $query->whereIn(
                    'asignacion_id',
                    Asignacion::whereIn(
                        'agente_id',
                        Agente::where('servicio_id', $servicioSeleccionado)->get()->pluck('id')->all()
                    )->get()->pluck('id')->all()
                );
            })
            ->get();
        $panelActivo = empty($request->panel_activo) ? 1 : $request->panel_activo;
        return view('evaluacions.reportes_mercado', compact(
            'periodos', 'periodoSeleccionado', 'mercados', 'mercadoSeleccionado', 'estudios',
            'estudioSeleccionado', 'servicios', 'servicioSeleccionado', 'evaluaciones', 'panelActivo', 'todoFiltrado'
        ));
    }

    public function reporteCambiarEstado(Request $request, $mercadoSeleccionado)
    {
        $evaluacion = Evaluacion::find($request->evaluacion_id);
        $evaluacion->estado_reporte = $request->estado_destino;
        $evaluacion->save();
        return redirect(route('evaluacions.reportes_mercado', $mercadoSeleccionado))->with('status', 'Se ha marcado la evaluación ' . $request->evaluacion_id . ' como ' . ($request->estado_destino == 13 ? 'REVISADA' : 'ENVIADA') . '.');
    }

    public function crearReporte(Request $request)
    {
        $evaluaciones = explode(",", $request->evaluaciones);
        if(count($evaluaciones) > 0) {
            $reporte = new Reporte();
            $reporte->etiqueta = $request->etiqueta ?: "";
            $reporte->user_id = Auth::user()->id;
            $reporte->save();
            foreach($evaluaciones as $evaluacion_id) {
                $evaluacion = Evaluacion::find($evaluacion_id);
                $evaluacion->estado_reporte = 13;
                $evaluacion->save();
                $reporte->evaluaciones()->attach($evaluacion_id);
            }
            return back()->with('status', 'Reporte creado con éxito.');
        }
        return back()->with('error', 'No se ha podido crear el reporte.');
    }

    public function completarEvaluacion(Request $request)
    {
        $evaluacion = Evaluacion::find($request->modal_evaluacion_id);
        $datetime = NULL;
        $errores = [];
        if ($request->fecha_grabacion && $request->hora_grabacion && $request->minutos_grabacion) {
            $correcta = true;
            // Validar minuto y hora
            if ($request->hora_grabacion < 0 || $request->hora_grabacion > 23) { /* Hora inválida */
                array_push($errores, "La hora de grabación debe tener valores entre 0 y 23 (se ingresó '" . $request->hora_grabacion . "').");
                $correcta = false;
            }
            if ($request->minutos_grabacion < 0 || $request->minutos_grabacion > 59) { /* Minuto inválido */
                array_push($errores, "El minuto de grabación debe tener valores entre 0 y 59 (se ingresó '" . $request->minutos_grabacion . "').");
                $correcta = false;
            }
            // Validar fecha
            $re = '/^(\d{2})\/(\d{2})\/(\d{4})$/m';
            preg_match($re, $request->fecha_grabacion, $matches, PREG_OFFSET_CAPTURE, 0);
            if (!$matches) { /* Formato de fecha inválido */
                array_push($errores, "Formato de fecha inválido (Se acepta únicamente DD/MM/AAAA).");
                $correcta = false;
            } else {
                $ano = $matches[3][0];
                $mes = $matches[2][0];
                $dia = $matches[1][0];
                if ($ano > date("Y") || $ano < 2000) { /* Año inválido */
                    array_push($errores, "El año de grabación debe tener valores entre 2000 y " . date("Y") . " (se ingresó '" . $ano . "').");
                    $correcta = false;
                }
                if (intval($mes) > 12 || intval($mes) < 1) { /* Mes inválido */
                    array_push($errores, "El mes de grabación debe tener valores entre 01 y 12 (se ingresó '" . $mes . "').");
                    $correcta = false;
                }
                if (intval($dia) > 31 || intval($dia) < 1) { /* Dia inválido */
                    array_push($errores, "El día de grabación debe tener valores entre 01 y 31 (se ingresó '" . $dia . "').");
                    $correcta = false;
                }
            }
            if ($correcta) {
                $datetime = Carbon::create($ano, $mes, $dia, $request->hora_grabacion, $request->minutos_grabacion, 0);
                $evaluacion->fecha_grabacion = $datetime->format('d-m-Y H:i:s');
            }

        }
        if ($request->movil) {
            if (is_numeric($request->movil) && strlen($request->movil) == 9) {
                $evaluacion->movil = $request->movil;
            } else {
                array_push($errores, "El móvil indicado no es válido.");
            }
        }
        if ($request->connid) {
            $re = '/^[A-Za-z\d \(\)\-\_\/\.\,\+ñÑáéíóúÁÉÍÓÚÜü\:#èÈ \?\=\%\&\–]*$/';
            preg_match($re, $request->connid, $match, PREG_OFFSET_CAPTURE, 0);
            if ($match) {
                $evaluacion->connid = $request->connid;
            } else {
                array_push($errores, "El ConnID indicado no es válido.");
            }

        }
        //dd($evaluacion);
        $evaluacion->save();
        return back()->withErrors($errores);
    }

    public function reportarGrabacion(Request $request)
    {
//        dd($request);
        $evaluacion = Evaluacion::find($request->modal_evaluacion_id);
        if ($request->estadoGrabacion == "inexistente") {
            $evaluacion->estado_conversacion = 9;
        }
        if ($request->estadoGrabacion == "problema") {
            if ($request->problemaGrabacion == "duracion") {
                $evaluacion->estado_conversacion = 14;
            }
            elseif ($request->problemaGrabacion == "incompleta") {
                $evaluacion->estado_conversacion = 15;
            }
            elseif ($request->problemaGrabacion == "inaudible") {
                $evaluacion->estado_conversacion = 16;
            }
        }
        $evaluacion->save();
        return back();
    }

    public function cambiarEjecutivo(Request $request)
    {
        if ($request->cambiar_ejecutivo_nombre) {
            $evaluacion = Evaluacion::find($request->modal_evaluacion_id);
            $rutAnterior = $evaluacion->rut_ejecutivo;
            $nombreAnterior = $evaluacion->nombre_ejecutivo;
            $evaluacion->nombre_ejecutivo = $request->cambiar_ejecutivo_nombre;
            $evaluacion->rut_ejecutivo = $request->cambiar_ejecutivo_rut;

            $mensaje = "No se actualizaron los datos del ejecutivo porque no se encontraron cambios.";
            if ($request->cambiar_ejecutivo_nombre != $nombreAnterior) {
                $evaluacion->save();
                if ($request->cambiar_ejecutivo_rut != $rutAnterior) {
                    $mensaje = "Nombre y RUT del ejecutivo actualizados.";
                } else {
                    $mensaje = "Nombre del ejecutivo actualizado.";
                }
            } else {
                if ($request->cambiar_ejecutivo_rut != $rutAnterior) {
                    $evaluacion->save();
                    $mensaje = "RUT del ejecutivo actualizado.";
                }
            }
            return back()->with('status', $mensaje);
        }
        return back()->withErrors(["El ejecutivo no pudo ser actualizado"]);
    }

    public function crearDummy(Request $request)
    {
        if ($request->subestudioDummies) {
            $evaluacion = new Evaluacion();
            if (isset($request->ejecutivo)) {
                $evaluacion->nombre_ejecutivo = $request->ejecutivo;
            } else {
                $evaluacion->nombre_ejecutivo = "";
            }
            $evaluacion->rut_ejecutivo = "";
            $evaluacion->asignacion_id = $request->asignacionid;
            $evaluacion->estado_id = 1;
            $evaluacion->sub_estudio = $request->subestudioDummies;
            $evaluacion->estado_conversacion = 7;
            $evaluacion->save();
            return back()->with('status', "Evaluación en blanco con éxito.");
        }
        return back()->withErrors(["No se pudo crear la evaluación en blanco."]);
    }

    public function eliminarDummy(Request $request)
    {
        $evaluacion = Evaluacion::find($request->evaluacion_id);
        if ($evaluacion->esDummy()) {
            $evaluacion->delete();
            return back()->with('status', "Evaluación en blanco eliminada con éxito.");
        }
        return back()->withErrors(["No se puede eliminar una evaluación que no esté en blanco."]);
    }

}
