<?php

namespace App\Http\Livewire;

use App\Models\Atributo;


/**
 * Class PautaRetenciones
 * @package App\Http\Livewire
 * @version 2
 */
class PautaRetenciones extends PautaBase
{

    protected $template = 'pauta-retenciones';
    protected $tipoPuntaje = 'ReclamosRetenciones';
    protected $requeridos = [];

    public function validarPauta()
    {

    }

    public function propagarCambio($atributo_id)
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

//    public $saludo1 = '';
//    public $saludo2 = '';
//    public $saludo3 = '';
//    public $saludo4 = '';
//    public $manejosilencios1 = '';
//    public $manejosilencios2 = '';
//    public $manejosilencios3 = '';
//    public $manejosilencios4 = '';
//    public $expresionoral1 = '';
//    public $expresionoral2 = '';
//    public $expresionoral3 = '';
//    public $expresionoral4 = '';
//    public $seguridad1 = '';
//    public $seguridad2 = '';
//    public $seguridad3 = '';
//    public $seguridad4 = '';
//    public $claridad1 = '';
//    public $claridad2 = '';
//    public $claridad3 = '';
//    public $claridad4 = '';
//    public $cordialidad1 = '';
//    public $cordialidad2 = '';
//    public $cordialidad3 = '';
//    public $cordialidad4 = '';
//    public $cordialidad5 = '';
//    public $pecu_antecedentes1 = '';
//    public $pecu_antecedentes2 = '';
//    public $pecu_antecedentes3 = '';
//    public $pecu_antecedentes4 = '';
//    public $pecu_antecedentes5 = '';
//    public $pecu_antecedentes6 = '';
//    public $pecu_antecedentes7 = '';
//    public $pecu_infocompleta1 = '';
//    public $pecu_infocompleta2 = '';
//    public $pecu_infocompleta3 = '';
//    public $pecu_infocompleta4 = '';
//    public $pecu_infocompleta5 = '';
//    public $pecu_infocompleta6 = '';
//    public $pecu_infocorrecta1 = '';
//    public $pecu_infocorrecta2 = '';
//    public $pecu_infocorrecta3 = '';
//    public $pecu_infocorrecta4 = '';
//    public $pecu_infocorrecta5 = '';
//    public $pecu_infocorrecta6 = '';
//    public $pecu_gestiona1 = '';
//    public $pecu_gestiona2 = '';
//    public $pecu_gestiona3 = '';
//    public $pecu_gestiona4 = '';
//    public $pecc_protocolosubtel1 = '';
//    public $pecc_protocolosubtel2 = '';
//    public $pecc_protocolosubtel3 = '';
//    public $pecc_protocolosubtel4 = '';
//    public $pecn_procedimientos1 = '';
//    public $pecn_procedimientos2 = '';
//    public $pecn_procedimientos3 = '';
//    public $pecn_procedimientos4 = '';
//    public $pecn_procedimientos5 = '';
//    public $pecn_procedimientos6 = '';
//    public $pecn_procedimientos7 = '';
//    public $pecn_procedimientos8 = '';
//    public $pecn_procedimientos9 = '';
//    public $pecu_protocoloplataforma1 = '';
//    public $pecu_protocoloplataforma2 = '';
//    public $pecu_protocoloplataforma3 = '';
//    public $pecu_protocoloplataforma4 = '';
//    public $pecu_protocoloplataforma5 = '';
//    public $pecu_protocoloplataforma6 = '';
//    public $caracterizacion1 = '';
//    public $caracterizacion2 = '';
//    public $caracterizacion3 = '';
//    public $caracterizacion4 = '';
//    public $caracterizacion5 = '';
//    public $caracterizacion6 = '';
//    public $caracterizacion7 = '';
//
//    public $grabacion;
//    public $retroalimentacion = '';
//    public $comentario_interno = '';
//    public $descripcion_caso = '';
//    public $respuesta_ejecutivo = '';
//    public $grabacioncheck = 0;
//
//    public function inicializar()
//    {
//        /* Tipos de atributo al guardar */
//        $this->tiposRespuesta = [
//            PautaBase::$RESPUESTA_CHECK => [427, 428, 429, 431, 432, 433, 435, 436, 437, 439, 440, 441, 443, 444, 445, 447, 448, 449, 450, 452, 453, 454, 455, 456, 457, 459, 460, 461, 462, 463, 465, 466, 467, 468, 469, 471, 472, 473, 475, 476, 477, 479, 480, 481, 482, 483, 484, 485, 486, 488, 489, 490, 491, 492, 493, 494, 495, 496, 497, 498, 499],
//            PautaBase::$RESPUESTA_OPCIONES => [],
//            PautaBase::$RESPUESTA_SI_NO => [],
//            PautaBase::$RESPUESTA_OTROS => [500, 501, 502, 503],
//        ];
//
//        /* Reglas de validación */
//        $this->agregarValidaciones([
//            'retroalimentacion' => 'required',
//            'descripcion_caso' => 'required',
//            'respuesta_ejecutivo' => 'required',
//        ]);
//
//        $this->grabacion = Grabacion::where('evaluacion_id', $this->evaluacion->id)->first();
//        if($this->grabacion){
//            $this->grabacioncheck = 1;
//        }
//    }
//
//    public function render()
//    {
//        return view('livewire.pauta-retenciones');
//    }
//
//    public function guardar()
//    {
//        $this->guardarRespuestas([426, 427, 428, 429], 'saludo', 1);
//        $this->guardarRespuestas([430, 431, 432, 433], 'manejosilencios', 1);
//        $this->guardarRespuestas([434, 435, 436, 437], 'expresionoral', 1);
//        $this->guardarRespuestas([438, 439, 440, 441], 'seguridad', 1);
//        $this->guardarRespuestas([442, 443, 444, 445], 'claridad', 1);
//        $this->guardarRespuestas([446, 447, 448, 449, 450], 'cordialidad', 1);
//        $this->guardarRespuestas([451, 452, 453, 454, 455, 456, 457], 'pecu_antecedentes', 1);
//        $this->guardarRespuestas([458, 459, 460, 461, 462, 463], 'pecu_infocompleta', 1);
//        $this->guardarRespuestas([464, 465, 466, 467, 468, 469], 'pecu_infocorrecta', 1);
//        $this->guardarRespuestas([470, 471, 472, 473], 'pecu_gestiona', 1);
//        $this->guardarRespuestas([474, 475, 476, 477], 'pecc_protocolosubtel', 1);
//        $this->guardarRespuestas([478, 479, 480, 481, 482, 483, 484, 485, 486], 'pecn_procedimientos', 1);
//        $this->guardarRespuestas([487, 488, 489, 490, 491, 492], 'pecu_protocoloplataforma', 1);
//        $this->guardarRespuestas([493, 494, 495, 496, 497, 498, 499], 'caracterizacion');
//
//        $this->guardarRespuesta(500, ['memo' => $this->retroalimentacion]);
//        $this->guardarRespuesta(501, ['memo' => $this->comentario_interno]);
//        $this->guardarRespuesta(502, ['memo' => $this->descripcion_caso]);
//        $this->guardarRespuesta(503, ['memo' => $this->respuesta_ejecutivo]);
//
//    }
//
//    public function configurarCalculoDePuntajes()
//    {
//        $ponderadores = [
//            426 => 2,    // saludo
//            430 => 2,   // manejosilencios
//            434 => 4,  // expresionoral
//            438 => 4,  // seguridad
//            442 => 4,   // claridad
//            446 => 4,   // cordialidad
//        ];
//        $this->calcularPENC($ponderadores);
//
//        $ponderadoresPF = [
//            426 => 2,    // saludo
//            430 => 2,   // manejosilencios
//            434 => 4,  // expresionoral
//            438 => 4,  // seguridad
//            442 => 4,   // claridad
//            446 => 4,   // cordialidad
//            451 => 15,   // pecu_antecedentes
//            458 => 10,  // pecu_infocompleta
//            464 => 20,  // pecu_infocorrecta
//            470 => 20,  // pecu_gestiona
//            474 => 5,  // pecc_protocolosubtel
//            478 => 5,  // pecn_procedimientos
//            487 => 5,  // pecu_protocoloplataforma
//        ];
//        $this->calcularPF($ponderadoresPF);
//
//        $atributosCriticos = [
//            'pecu' => ['antecedentes1', 'infocompleta1', 'infocorrecta1', 'gestiona1', 'protocoloplataforma1'],
//            'pecn' => ['procedimientos1'],
//            'pecc' => ['protocolosubtel1'],
//        ];
//        $this->calcularPECPadres($atributosCriticos);
//    }
//
//    public function xatributospec()
//    {
//        $atriobutosPEC = [
//            'pecu' => ['antecedentes1', 'infocompleta1', 'infocorrecta1', 'gestiona1', 'protocoloplataforma1'],
//            'pecn' => ['procedimientos1'],
//            'pecc' => ['protocolosubtel1'],
//        ];
//        $hayMarcado = false;
//        foreach ($atriobutosPEC as $tipo => $atributos) {
//            foreach ($atributos as $atributo) {
//                if ($this->{$tipo . "_" . $atributo} == 'checked') {
//                    $hayMarcado = true;
//                    break;
//                }
//            }
//            if ($hayMarcado) {
//                break;
//            }
//        }
//    }
//
//
//    public function xsaludo()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4], 1, "saludo");
//
//
//    }
//
//    public function xmanejosilencios()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4], 1, "manejosilencios");
//
//    }
//
//    public function xexpresionoral()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4], 1, "expresionoral");
//
//    }
//
//    public function xseguridad()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4], 1, "seguridad");
//
//    }
//
//    public function xclaridad()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4], 1, "claridad");
//
//    }
//
//    public function xcordialidad()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4, 5], 1, "cordialidad");
//
//    }
//
//    public function xantecedentes()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4, 5, 6, 7], 1, "pecu_antecedentes");
//        $this->xatributospec();
//    }
//
//    public function xinfocompleta()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4, 5, 6], 1, "pecu_infocompleta");
//        $this->xatributospec();
//    }
//
//    public function xinfocorrecta()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4, 5, 6], 1, "pecu_infocorrecta");
//        $this->xatributospec();
//    }
//
//    public function xgestiona()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4], 1, "pecu_gestiona");
//        $this->xatributospec();
//    }
//
//    public function xprotocolosubtel()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4], 1, "pecc_protocolosubtel");
//        $this->xatributospec();
//    }
//
//    public function xprocedimientos()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4, 5, 6, 7, 8, 9], 1, "pecn_procedimientos");
//        $this->xatributospec();
//    }
//
//    public function xprotocoloplataforma()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4, 5, 6], 1, "pecu_protocoloplataforma");
//        $this->xatributospec();
//    }
}
