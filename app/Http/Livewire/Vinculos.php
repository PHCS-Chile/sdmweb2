<?php

namespace App\Http\Livewire;

use App\Models\Evaluacion;
use App\Models\Grabacion;
use Livewire\Component;

class Vinculos extends Component
{

    public $evaluacionId;
    public $vinculoSelecionado = 0;
    public $nuevoVinculo = "";

    public function mount($evaluacionId)
    {
        $this->evaluacionId = $evaluacionId;
    }

    public function nuevoVinculo()
    {
        if(strlen($this->nuevoVinculo) > 0)
        {
            $grabacion = new Grabacion();
            $grabacion->evaluacion_id = $this->evaluacionId;
            $grabacion->tamano = 0;
            $grabacion->nombre = "";
            if(substr($this->nuevoVinculo, 0, 8) == "https://"){
                $grabacion->url = $this->nuevoVinculo;
            }else{
                $grabacion->url = substr($this->nuevoVinculo, 0, 7) == "http://" ? $this->nuevoVinculo : "http://" . $this->nuevoVinculo;
            }
            $grabacion->save();
            $evaluacion = Evaluacion::find($this->evaluacionId);
            $evaluacion->estado_conversacion = 8;
            $evaluacion->save();
            $this->nuevoVinculo = "";
            $this->vinculoSelecionado = Grabacion::where('evaluacion_id', $this->evaluacionId)->where('nombre', '')->count() - 1;
        }
    }

    public function eliminarVinculo($grabacionId)
    {
        $grabacion = Grabacion::find($grabacionId);
        $grabacion->delete();
        $cuentaLinks = Grabacion::where('evaluacion_id', $grabacionId)->where('nombre', '')->count();
        if ($cuentaLinks == 0) {
            $evaluacion = Evaluacion::find($this->evaluacionId);
            $evaluacion->estado_conversacion = 7;
            $evaluacion->save();
        }
        $this->nuevoVinculo = "";
        if ($this->vinculoSelecionado > 0) {
            $this->vinculoSelecionado--;
        }
    }

    public function render()
    {
        return view('livewire.vinculos', [
            'vinculos' => Grabacion::where('evaluacion_id', $this->evaluacionId)->where('nombre', '')->get()->all(),
            'evaluacion_id' => $this->evaluacionId,
        ]);
    }
}
