<?php

namespace App\Http\Livewire;

use App\Models\Atributo;

class PautaCallVozV2 extends PautaBase
{
    
    protected $template = 'pauta-call-voz-v2';
    protected $tipoPuntaje = 'PEC';    
    protected $escalas = [
        ['grupo_id' => 1, 'nombre' => 'gestiones', 'opciones' => [551, 562, 573]],
        ['grupo_id' => 8, 'nombre' => 'resoluciones', 'opciones' => [552, 563, 574]],
        ['grupo_id' => 9, 'nombre' => 'motivo', 'opciones' => [597]],
        ['grupo_id' => 5, 'nombre' => 'tiposnegocio', 'opciones' => [598]],  
    ];
    protected $requeridos = [
        597, 598, 551, 552, 599, 601, 602
    ];

    public function propagarCambio($atributo_id)
    {
        $cambios = [];
        

        // Gestiones 2 y 3
        if (!$this->respuestas[562]) {
            $cambios[] = [563, ""];
            $cambios[] = [553, ""];
            $cambios[] = [554, ""];
            $cambios[] = [555, ""];
            $cambios[] = [556, ""];
            $cambios[] = [557, ""];
            $cambios[] = [558, ""];
            $cambios[] = [559, ""];
            $cambios[] = [560, ""];
            $cambios[] = [561, ""];
        }
        if (!$this->respuestas[573]) {
            $cambios[] = [574, ""];
            $cambios[] = [564, ""];
            $cambios[] = [565, ""];
            $cambios[] = [566, ""];
            $cambios[] = [567, ""];
            $cambios[] = [568, ""];
            $cambios[] = [569, ""];
            $cambios[] = [570, ""];
            $cambios[] = [571, ""];
            $cambios[] = [572, ""];
        }
        

        // No Aplica
        if (in_array($atributo_id, $this->grupos['no_aplica'])) {
            if ($this->tieneRespuestas([531], "checked")) {
                $cambios[] = [529, ""];
                $cambios[] = [530, ""];
            }
            if ($this->tieneRespuestas([538], "checked")) {
                $cambios[] = [536, ""];
                $cambios[] = [537, ""];
            }
        }
        $this->guardarRespuestas($cambios);
    }

    public function validarPauta()
    {

        // Gestiones 2 y 3
        if ($this->respuestas[562]) {
            $this->agregarValidaciones([563]);
        } else {
            $this->quitarValidaciones([563]);
        }
        if ($this->respuestas[573]) {
            $this->agregarValidaciones([574]);
        } else {
            $this->quitarValidaciones([574]);
        }
        



    }


    public function tieneRespuestas($atributos_id, $respuesta): bool
    {
        foreach ($atributos_id as $atributo_id) {
            if ($this->respuestas[$atributo_id] == $respuesta) {
                return true;
            }
        }
        return false;
    }
}
