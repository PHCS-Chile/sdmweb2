<?php

namespace App\Http\Livewire;

use App\Models\Asignacion;
use App\Models\Estudio;
use App\Models\Evaluacion;
use Livewire\Component;
use Livewire\WithPagination;


/**
 *
 */
class AsignacionesEjecutivo extends Component
{
    use WithPagination;

    public $asignacion;

    public $ejecutivos;
    public $estadosConversacion;

    private $paginacion = 10;



    public function obternerEvaluaciones($paginar=true)
    {
        $evaluaciones = $this->asignacion->evaluaciones;
        if ($paginar) {
            return $evaluaciones->paginate($this->paginacion);
        }
        return $evaluaciones->get();
    }

    public function agruparEjecutivos()
    {
        $ejecutivosAgrupados = [];;
        foreach ($this->asignacion->ejecutivos() as $ejecutivo) {
            $evaluacionesEjecutivo = $this->asignacion->evaluacions->where('nombre_ejecutivo', $ejecutivo);
            $completas = $evaluacionesEjecutivo->wherein('estado_id',['2','3','4','5']);
            $ejecutivosAgrupados[$ejecutivo] = [
                'nombre' => $ejecutivo,
                'base' => $evaluacionesEjecutivo->count(),
                'completas' => $completas->count()
            ];

            foreach (Estudio::obtenerEstados($this->asignacion->estudio->id) as $estado) {
                $ejecutivosAgrupados[$ejecutivo][$estado->name] = $evaluacionesEjecutivo->where('estado_conversacion', $estado->id)->count();
            }

        }
        return $ejecutivosAgrupados;
    }

    public function contarEstados($asignaciones)
    {
        $cuentaEstados = [];
        foreach ($this->estadosConversacion as $estado) {
            $cuentaEstados[$estado->name] = 0;
        }
        foreach ($asignaciones as $asignacion) {
            foreach ($this->estadosConversacion as $estado) {
                $cuentaEstados[$estado->name] += $asignacion->contarEstadosConversacion($estado->id);
            }
        }
        return $cuentaEstados;
    }

    public function render()
    {
        $this->estadosConversacion = Estudio::obtenerEstados($this->asignacion->estudio->id);
        return view('livewire.asignaciones-ejecutivo',[
            'ejecutivosAgrupados' => $this->agruparEjecutivos(),
            'asignacion' => $this->asignacion,
            'estadosConversacion' => $this->estadosConversacion,
        ]);
    }

}
