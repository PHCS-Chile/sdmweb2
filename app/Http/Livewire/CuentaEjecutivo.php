<?php

namespace App\Http\Livewire;

use App\Models\Asignacion;
use App\Models\Evaluacion;
use App\Models\Estado;
use Livewire\Component;

class CuentaEjecutivo extends Component
{

	public $baseejecutivo = 0, $chatdescartados = 0, $chatenblanco = 0, $chatcompleto = 0;	

	public function mount($rutejecutivo, $asignacionid){
		$evaluaciones = Evaluacion::where('rut_ejecutivo', $rutejecutivo)->where('asignacion_id', $asignacionid)->get();
		foreach($evaluaciones as $evaluacion){
			$this->baseejecutivo++;
            if($evaluacion->estado_id == 1 && is_null($evaluacion->image_path) == false){
                $this->chatenblanco++;
            }
            
            if($evaluacion->estado_id > 1 && $evaluacion->estado_id < 6){
            	$this->chatcompleto++;
            }
                
            
            if($evaluacion->estado_id == 6){
            	$this->chatdescartados++;
            }
		}

		//$this->baseejecutivo = $baseejecutivo->get()->count();
		//$this->chatenblanco = $baseejecutivo->where('estado_id',1)->get()->count();
		//$this->chatcompleto = $baseejecutivo->where('estado_id','>',1)->where('estado_id','<',6)->get()->count();
		//$this->chatdescartados = $baseejecutivo->where('estado_id',6)->get()->count();
                
	}

    public function render()
    {
        return view('livewire.cuenta-ejecutivo');
    }
}
