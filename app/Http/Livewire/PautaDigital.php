<?php

namespace App\Http\Livewire;

use App\Models\Atributo;


/**
 * Class PautaCallVoz
 * @package App\Http\Livewire
 * @version 8
 */
class PautaDigital extends PautaBase
{

    protected $template = 'pauta-digital';
    protected $tipoPuntaje = 'PEC';
    protected $escalas = [
        ['grupo_id' => 1, 'nombre' => 'gestiones', 'opciones' => [49, 50, 51]],
        ['grupo_id' => 8, 'nombre' => 'resoluciones', 'opciones' => [64, 65, 66]],
        ['grupo_id' => 9, 'nombre' => 'motivos', 'opciones' => [48]],
    ];
    protected $requeridos = [
        48, 49, 52, 56, 60, 64, 94
    ];

    public function propagarCambio($atributo_id)
    {
        $cambios = [];

        // Deteccion
        if (in_array($atributo_id, [52, 53, 54])) {
            if ($this->tieneRespuestas([52, 53, 54], "No")) {
                $cambios[] = [67, "checked"];
            }
        } elseif ($atributo_id == 67) {
            $cambios[] = [52, "Si"];
            $cambios[] = [53, "Si"];
            $cambios[] = [54, "Si"];
        }

        // Informacion Correcta
        if (in_array($atributo_id, [56, 57, 58])) {
            if ($this->tieneRespuestas([56, 57, 58], "No")) {
                $cambios[] = [68, "checked"];
            }
        } elseif ($atributo_id == 68) {
            $cambios[] = [56, "Si"];
            if ($this->respuestas[50]) {
                $cambios[] = [57, "Si"];
            } elseif ($this->respuestas[51]) {
                $cambios[] = [58, "Si"];
            }
        }

        // Gestiones
        if (in_array($atributo_id, [60, 61, 62])) {
            if ($this->tieneRespuestas([60, 61, 62], "No")) {
                $cambios[] = [69, "checked"];
            }
        } elseif ($atributo_id == 69) {
            $cambios[] = [60, "Si"];
            if ($this->respuestas[50]) {
                $cambios[] = [61, "Si"];
            } elseif ($this->respuestas[51]) {
                $cambios[] = [62, "Si"];
            }
        }

        // Gestiones 2 y 3
        if (!$this->respuestas[50]) {
            $cambios[] = [53, ""];
            $cambios[] = [57, ""];
            $cambios[] = [61, ""];
            $cambios[] = [65, ""];
        }
        if (!$this->respuestas[51]) {
            $cambios[] = [54, ""];
            $cambios[] = [58, ""];
            $cambios[] = [62, ""];
            $cambios[] = [66, ""];
        }

        // No Aplica
        if (in_array($atributo_id, $this->grupos['no_aplica'])) {
            if ($this->tieneRespuestas([31], "checked")) {
                $cambios[] = [29, ""];
                $cambios[] = [30, ""];
            }
            if ($this->tieneRespuestas([46], "checked")) {
                $cambios[] = [43, ""];
                $cambios[] = [44, ""];
                $cambios[] = [45, ""];
            }
        } else {
            if ($this->tieneRespuestas([29, 30], "checked")) {
                $cambios[] = [31, ""];
            }
            if ($this->tieneRespuestas([43, 44, 45], "checked")) {
                $cambios[] = [46, ""];
            }
        }


        $this->guardarRespuestas($cambios);
    }

    public function validarPauta()
    {

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
