<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EvaluacionHeader extends Component{

    public $evaluacionfinal; 
    public $estados; 
    public $grabaciones;
    public $bloqueo;
    public $estudio;
    public $modales, $switch = 1;



    public function cambiaheader(){
        if($this->switch == 1){
            $this->switch = 2;
        }else{
            $this->switch = 1;
        }        
    }

    public function render()
    {
        return view('livewire.evaluacion-header');
    }
}
