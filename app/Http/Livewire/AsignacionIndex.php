<?php

namespace App\Http\Livewire;

use App\Models\Asignacion;
use App\Models\Evaluacion;
use App\Models\Estado;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class AsignacionIndex extends Component
{
    use WithPagination;
    public $asignacions, $asignacionfinal, $asignacionid, $evaluaciones, $fechas, $searchAgente, $searchMovil, $evaluacionescompletas, $filtroChat, $filtroEstado, $estados, $evalconchats, $agentes, $agenteSeleccionado, $filtroNoRecorridos, $evals;

    public function mount($asignacionid){

        $this->asignacionid = $asignacionid;
    }

    public function render(){

        $this->asignacions = Asignacion::all()->sortByDesc('servicio');
        $this->asignacionfinal = Asignacion::where('id',$this->asignacionid)->first();
        $baseasignacions = Evaluacion::select('rut_ejecutivo','asignacion_id')
            ->where('asignacion_id', $this->asignacionid)
            ->groupBy('rut_ejecutivo','asignacion_id');


        $this->estados = Estado::all();

        $this->evaluacionescompletas = Evaluacion::where('asignacion_id','=',$this->asignacionfinal->id)
        ->where('estado_id', '>',1)
        ->where('estado_id', '<',6)
        ->get();

        $this->evalconchats = Evaluacion::where('asignacion_id','=',$this->asignacionfinal->id)
            ->whereNotNull('image_path')
            ->get();

        $this->evals = Evaluacion::where('asignacion_id','=',$this->asignacionfinal->id)
            ->get();

        $this->agentes = Evaluacion::select('rut_ejecutivo')->where('asignacion_id', $this->asignacionfinal->id)->groupBy('rut_ejecutivo')->get();

        if($this->agenteSeleccionado != 0){
            $agenteSeleccionado = "";
            $agenteSeleccionado = $this->agenteSeleccionado;
            $evaluaciones2 = Evaluacion::where('asignacion_id','=',$this->asignacionfinal->id)
            ->where('movil', 'like', "%" . $this->searchMovil . "%")
            ->where('rut_ejecutivo',$agenteSeleccionado)
            ->orderBy('fecha_grabacion', 'desc');

            if ($this->filtroEstado > 0) {
                $evaluaciones2->where('estado_id', '=', $this->filtroEstado);
            }

            if ($this->filtroChat == 'Con Chat') {
                $evaluaciones2->whereNotNull('image_path');
            }
            if ($this->filtroChat == 'Sin Chat') {
                $evaluaciones2->whereNull('image_path');
            }

            $this->evaluaciones = $evaluaciones2->get();

        }

        return view('livewire.asignacion-index',[
            'baseasignacions' => $baseasignacions->paginate(150),
        ]);
    }
}
