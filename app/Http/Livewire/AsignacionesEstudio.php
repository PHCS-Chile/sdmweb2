<?php

namespace App\Http\Livewire;

use App\Models\Asignacion;
use App\Models\Estudio;
use App\Models\Periodo;
use Livewire\Component;
use Livewire\WithPagination;

class AsignacionesEstudio extends Component
{
    use WithPagination;
    public $paginacion = 30;

    public Estudio $estudio;
    public $subestudio;
    public int $periodo_id;
    public $todosLosPeriodos;

    public $estadosConversacion;

    public function mount()
    {
        $this->todosLosPeriodos = Periodo::where('visible', Periodo::ACTIVO)->get();
        $this->periodo_id = $this->todosLosPeriodos->sortByDesc('id')->first()->id;
        $this->estadosConversacion = $this->estudio->obtenerEstados($this->estudio->id);

    }

    public function updated()
    {
        $this->resetPage();
    }

    public function obtenerAsignaciones($paginadas=true)
    {
        if ($this->subestudio == 'ventas') {
            $asignaciones = Asignacion::where('estudio_id', $this->estudio->id)
                ->where('periodo_id', $this->periodo_id)
                ->where('n_asignacion','>',0)
                ->where('subestudio','ventas');
        } elseif ($this->subestudio == 'no-ventas') {
            $asignaciones = Asignacion::where('estudio_id', $this->estudio->id)
                ->where('periodo_id', $this->periodo_id)
                ->where('n_asignacion','>',0)
                ->where('subestudio','no-ventas');
        } else {
            $asignaciones = Asignacion::where('estudio_id', $this->estudio->id)
                ->where('periodo_id', $this->periodo_id)
                ->where('n_asignacion','>',0);
        }
        if ($paginadas) {
            return $asignaciones->paginate($this->paginacion);
        }        return $asignaciones->get();
    }

    public function obtenerCuentaEstadosAsignaciones($asignaciones)
    {
        $total = 0;
        $completas = 0;
        foreach($asignaciones as $asignacion){
            $completas += $asignacion->completas->count();
            $total += $asignacion->n_asignacion;
        }
        return ['asignaciones_total' => $total, 'asignaciones_completas' => $completas];
    }

    public function render()
    {
        $totales = $this->obtenerCuentaEstadosAsignaciones($this->obtenerAsignaciones(false));
        return view('livewire.asignaciones-estudio', [
            'asignaciones' => $this->obtenerAsignaciones(),
            'periodo' => Periodo::find($this->periodo_id),
            'estudio' => $this->estudio,
            'periodos' => $this->todosLosPeriodos,
            'asignaciones_completas' => $totales['asignaciones_completas'],
            'asignaciones_total' => $totales['asignaciones_total'],
        ]);
    }
}
