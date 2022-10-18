<?php

namespace App\Http\Livewire;

use App\Models\Asignacion;
use App\Models\Estado;
use App\Models\Evaluacion;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class AsignacionEjecutivo extends Component
{
    use WithPagination;
    public $asignacion;
    public $ejecutivo;

    public $filtroEstado;
    public $filtroEstadoGrabacion;
    public $filtroFecha;
    public $filtroConnid;
    public $searchMovil;
    public $filtroNoRecorridos;
    public $filtroEjecutivo = "Todos";
    public $estudio;

    public $modalVisible = false;
    public $modalOK = false;
    public $datosModal = [];
    public $modalesValidos = ["cambiar_ejecutivo", "completar", "reportar_grabacion", "detalles"];
    public $problemaGrabacion;

    public $subestudioDummies;


    public function abrirModalCompletar($modal, $idEvaluacion)
    {
        if (in_array($modal, $this->modalesValidos)) {
            $evaluacion = Evaluacion::find($idEvaluacion);
            $this->datosModal['id'] = $idEvaluacion;
            $this->modalVisible = true;
            $this->datosModal['ruta'] = $modal;

            if ($modal == "cambiar_ejecutivo") {
                $this->datosModal['titulo'] = "Cambiar ejecutivo";
                $this->datosModal['nombre'] = $evaluacion->nombre_ejecutivo;
                $this->datosModal['rut'] = $evaluacion->rut_ejecutivo;
                $this->modalOK = strlen($this->datosModal['nombre'] . $this->datosModal['rut']) > 0;
            }
            elseif ($modal == "completar") {
                $this->datosModal['titulo'] = "Completar evaluación";
                $this->datosModal['fecha_grabacion'] = $evaluacion->fecha_grabacion ? date_format(date_create($evaluacion->fecha_grabacion), 'd/m/Y') : "";
                $this->datosModal['hora_grabacion'] = $evaluacion->fecha_grabacion ? date_format(date_create($evaluacion->fecha_grabacion), 'H') : "";
                $this->datosModal['minutos_grabacion'] = $evaluacion->fecha_grabacion ? date_format(date_create($evaluacion->fecha_grabacion), 'i') : "";
                $this->datosModal['movil'] = $evaluacion->movil;
                $this->datosModal['connid'] = $evaluacion->connid;
                $this->modalOK = $evaluacion->fecha_grabacion || $evaluacion->movil || $evaluacion->connid;
            }
            elseif ($modal == "reportar_grabacion") {
                $this->datosModal['titulo'] = "Reportar problemas con la grabación";
                $this->datosModal['comentario_estado'] = $evaluacion->comentario_estado;
                if ($evaluacion->estado_conversacion == 9) {
                    $this->datosModal['estadoGrabacion'] = "inexistente";
                } elseif (in_array($evaluacion->estado_conversacion, [14, 15, 16])) {
                    $this->datosModal['estadoGrabacion'] = "problema";
                } elseif ($evaluacion->estado_id = 6 && $evaluacion->comentario_estado) {
                    $this->datosModal['estadoGrabacion'] = "comentario";
                } else {
                    $this->datosModal['estadoGrabacion'] = "ok";
                }
                $this->modalOK = $this->datosModal['estadoGrabacion'] == "ok";


//                if ($this->problemaGrabacion == "") {
//                    if ($evaluacion->estado_conversacion == 9) {
//                        $this->problemaGrabacion = "inexistente";
//                    } elseif (in_array($evaluacion->estado_conversacion, [14, 15, 16])) {
//                        $this->problemaGrabacion = "problema";
//                    }
//                }
//                $this->modalOK = $this->problemaGrabacion == "inexistente";
            } elseif ($modal == "detalles") {
                $this->datosModal['titulo'] = "Detalles de la evaluación";
                $this->datosModal['ruta'] = "detalles";
                $this->datosModal['movil'] = $evaluacion->movil;
                $this->datosModal['connid'] = $evaluacion->connid;
                $this->datosModal['fecha_grabacion'] = $evaluacion->fecha_grabacion;
                $this->datosModal['nombre_ejecutivo'] = $evaluacion->nombre_ejecutivo;
                $this->datosModal['rut_ejecutivo'] = $evaluacion->rut_ejecutivo;
                $this->datosModal['nombre_supervisor'] = $evaluacion->nombre_supervisor;
                $this->datosModal['rut_supervisor'] = $evaluacion->rut_supervisor;
                $this->datosModal['c_descripcion_caso'] = $evaluacion->c_descripcion_caso;
                $this->datosModal['c_respuesta_ejecutivo'] = $evaluacion->c_respuesta_ejecutivo;
                $this->datosModal['c_retroalimentacion'] = $evaluacion->c_retroalimentacion;
            }
        }
    }

    public function darValorModal($llave, $valor)
    {
        $this->datosModal[$llave] = $valor;
    }

    public function cerrarModalCompletar()
    {
        $this->modalVisible = false;
        $this->modalOK = false;
        $this->datosModal = [];
    }


    /**
     * Render
     * @return Application|Factory|View
     */
    public function render()
    {
        $evaluaciones= Evaluacion::where('asignacion_id', $this->asignacion->id)->where('nombre_ejecutivo', urldecode($this->ejecutivo))
            ->when($this->asignacion->estudio->id == 3, function ($query) {
                $query->where('tipo_gestion','Venta');
            })
            ->when($this->searchMovil, function ($query) {
                $query->where('movil', 'like', "%" . trim($this->searchMovil) . "%");
            })
            ->when($this->filtroConnid, function ($query) {
                $query->where('connid', 'like', "%" . trim($this->filtroConnid) . "%");
            })
            ->when($this->filtroFecha, function ($query) {
                $query->where('fecha_grabacion', 'like', "%" . $this->filtroFecha . "%");
            })
            ->when($this->filtroEstado > 0, function ($query) {
                $query->where('estado_id', $this->filtroEstado);
            })
            ->when($this->filtroEstadoGrabacion > 0, function ($query) {
                $query->where('estado_conversacion', $this->filtroEstadoGrabacion);
            })
            ->when($this->filtroEjecutivo != "Todos", function ($query) {
                $query->where('nombre_ejecutivo', $this->filtroEjecutivo);
            })
            ->orderBy('fecha_grabacion', 'desc')->paginate(40);

        return view('livewire.asignacion-ejecutivo', [
            'estados' => Estado::where('tipo', 1)->where('visible', 1)->get(),
            'ejecutivos' => Asignacion::find($this->asignacion->id)->ejecutivos(),
            'grabacionestados' => Estado::where('tipo', 2)->where('visible', 1)->get(),
            'asignacion' => $this->asignacion,
            'evaluacionescompletas' => Evaluacion::where('asignacion_id','=',$this->asignacion->id)->where('estado_id', '>',1)->where('estado_id', '<',6)->get(),
            'evaluaciones' => $evaluaciones,
            'ejecutivo' => urldecode($this->ejecutivo),
        ]);
    }
}
