<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Evaluacion;
use App\Models\Estado;
use App\Models\Asignacion;

class EjecutivoEvaluaciones extends Component
{

	public $asignacionid, $rutejecutivo, $evaluaciones, $estados, $asignacionfinal, $evaluacionescompletas, $filtroEstado, $filtroChat, $searchMovil, $filtroNoRecorridos;

	public function mount($asignacionid, $rutejecutivo){
        $this->rutejecutivo = $rutejecutivo;
        $this->asignacionid = $asignacionid;    	
    }

    public function render()
    {    	
		$this->estados = Estado::all();
        $this->asignacionfinal = Asignacion::all()->find($this->asignacionid);
    	$this->evaluacionescompletas = Evaluacion::where('asignacion_id','=',$this->asignacionid)
    	->where('estado_id', '>',1)
    	->where('estado_id', '<',6)        
    	->get();       
          
		$evaluaciones2 = Evaluacion::where('asignacion_id','=',$this->asignacionid)
    	->where('movil', 'like', "%" . $this->searchMovil . "%")	
        ->where('rut_ejecutivo',$this->rutejecutivo)            
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
 
        return view('livewire.ejecutivo-evaluaciones');
    }
}
