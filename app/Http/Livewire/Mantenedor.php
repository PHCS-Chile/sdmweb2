<?php

namespace App\Http\Livewire;

use App\Models\Atributo;
use App\Models\Estudio;
use Livewire\Component;

class Mantenedor extends Component
{

    public $estudio;
    public $atributos;

    public $modificados = ['ponderador' => [], 'ponderador_ici' => []];


    public function updatedAtributos($valor, $id)
    {
        $arregloID = explode(".", $id);
        $atributoID = $arregloID[1];
        $columna = $arregloID[0];
        $atributo = Atributo::find($atributoID);
        $atributo->{$columna} = $valor;
        $atributo->save();
        $this->modificados[$arregloID[0]][] = $atributoID;
    }

    public function obtenerAtributos()
    {
        $atributos = Atributo::where('pauta_id', $this->estudio)->get();
        $this->atributos = [];
        foreach ($atributos as $atributo) {
            $this->atributos['objetos'][$atributo->id] = $atributo;
            if($atributo->ponderador !== NULL) {
                $this->atributos['ponderador'][$atributo->id] = $atributo->ponderador;
            }
            if($atributo->ponderador_ici !== NULL) {
                $this->atributos['ponderador_ici'][$atributo->id] = $atributo->ponderador_ici;
            }
        }
    }

    public function render()
    {
        if (!$this->estudio) {
            $this->estudio = 2;
        }
        $this->obtenerAtributos();
        return view('livewire.mantenedor', [
            'estudios' => Estudio::all(),
            'modificados' => $this->modificados,
        ]);
    }
}
