<?php

namespace App\Http\Livewire;

use App\Models\Atributo;


/**
 * Class PautaCallVoz
 * @package App\Http\Livewire
 * @version 8
 */
class PautaCallVoz extends PautaBase
{

    protected $template = 'pauta-call-voz';
    protected $tipoPuntaje = 'PEC';
    protected $escalas = [
        ['grupo_id' => 1, 'nombre' => 'gestiones', 'opciones' => [180, 181, 182]],
        ['grupo_id' => 8, 'nombre' => 'resoluciones', 'opciones' => [195, 196, 197, 198]],
        ['grupo_id' => 3, 'nombre' => 'pecresponsables', 'opciones' => [166]],
        ['grupo_id' => 4, 'nombre' => 'ruidos', 'opciones' => [168]],
        ['grupo_id' => 5, 'nombre' => 'tiposnegocio', 'opciones' => [171]],
        ['grupo_id' => 9, 'nombre' => 'motivos', 'opciones' => [179]],
    ];
    protected $requeridos = [
        168, 169, 171, 179, 176, 199, 200, 180, 183, 187, 191, 195
    ];

    public function propagarCambio($atributo_id)
    {
        $cambios = [];
        // Deteccion
        if (in_array($atributo_id, [183, 184, 185])) {
            if ($this->tieneRespuestas([183, 184, 185], "No")) {
                $cambios[] = [146, "checked"];
            }
        } elseif ($atributo_id == 146) {
            $cambios[] = [183, "Si"];
            $cambios[] = [184, "Si"];
            $cambios[] = [185, "Si"];
        }

        // Informacion Correcta
        if (in_array($atributo_id, [187, 188, 189])) {
            if ($this->tieneRespuestas([187, 188, 189], "No")) {
                $cambios[] = [147, "checked"];
            }
        } elseif ($atributo_id == 147) {
            $cambios[] = [187, "Si"];
            if ($this->respuestas[181]) {
                $cambios[] = [188, "Si"];
            } elseif ($this->respuestas[182]) {
                $cambios[] = [189, "Si"];
            }
        }

        // Gestiones
        if (in_array($atributo_id, [191, 192, 193])) {
            if ($this->tieneRespuestas([191, 192, 193], "No")) {
                $cambios[] = [148, "checked"];
            }
        } elseif ($atributo_id == 148) {
            $cambios[] = [191, "Si"];
            if ($this->respuestas[181]) {
                $cambios[] = [192, "Si"];
            } elseif ($this->respuestas[182]) {
                $cambios[] = [193, "Si"];
            }
        }

        // Gestiones 2 y 3
        if (!$this->respuestas[181]) {
            $cambios[] = [184, ""];
            $cambios[] = [188, ""];
            $cambios[] = [192, ""];
            $cambios[] = [196, ""];
        }
        if (!$this->respuestas[182]) {
            $cambios[] = [185, ""];
            $cambios[] = [189, ""];
            $cambios[] = [193, ""];
            $cambios[] = [197, ""];
        }
        $this->respuestas[198] = $this->respuestas[195];

        // No Aplica
        if (in_array($atributo_id, $this->grupos['no_aplica'])) {
            if ($this->tieneRespuestas([124, 125], "checked")) {
                $cambios[] = [123, ""];
            }
            if ($this->tieneRespuestas([128, 129, 130, 131], "checked")) {
                $cambios[] = [127, ""];
            }
            if ($this->tieneRespuestas([135, 136, 137, 138, 139, 140, 141], "checked")) {
                $cambios[] = [133, ""];
                $cambios[] = [134, ""];
            }
            if ($this->tieneRespuestas([145], "checked")) {
                $cambios[] = [143, ""];
                $cambios[] = [144, ""];
            }
        }
        $this->guardarRespuestas($cambios);
    }

    public function validarPauta()
    {

        // Reclamos
        if ($this->respuestas[322] == "No Aplica" || $this->respuestas[322] === null) {
            $this->quitarValidaciones([323, 324, 325, 326, 327]);
        } else {
            $this->agregarValidaciones([323, 324, 325, 326, 327]);
        }

        // Tipo de Negocio
        if ($this->respuestas[171] != 49) {
            $this->agregarValidaciones([172, 173, 174]);
        } else {
            $this->quitarValidaciones([172, 173, 174]);
        }

        // Responsable PEC
        if ($this->tieneRespuestas([146, 147, 148, 149, 150, 151, 152, 153, 154, 155, 156, 157, 158, 159, 160, 161, 162, 163, 164, 165], "checked")) {
            $this->agregarValidaciones([166]);
        } else {
            $this->quitarValidaciones([166]);
        }

        // Gestiones 2 y 3
        if ($this->respuestas[181]) {
            $this->agregarValidaciones([184, 188, 192, 196]);
        } else {
            $this->quitarValidaciones([184, 188, 192, 196]);
        }
        if ($this->respuestas[182]) {
            $this->agregarValidaciones([185, 189, 193, 197]);
        } else {
            $this->quitarValidaciones([185, 189, 193, 197]);
        }
        $this->respuestas[198] = $this->respuestas[195];



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
