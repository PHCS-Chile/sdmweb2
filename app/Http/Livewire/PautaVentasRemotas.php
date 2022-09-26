<?php

namespace App\Http\Livewire;

use App\Http\Livewire\PautaBase;
use App\Models\Atributo;
use App\Models\Escala;
use App\Models\Evaluacion;
use App\Models\Grabacion;
use App\Models\Respuesta;
use Auth;
use Livewire\Component;

/**
 * Class PautaVentasRemotas
 * @package App\Http\Livewire
 * @version 3
 */
class PautaVentasRemotas extends PautaBase
{
    protected $template = 'pauta-ventas-remotas';    
    protected $tipoPuntaje = 'VentasRemotas';  
    protected $escalas = [

    ];
    protected $requeridos = [
        309
    ];

    public function propagarCambio($atributo_id)
    {
        $cambios = [];

        // No Aplica
        if (in_array($atributo_id, $this->grupos['no_aplica'])) {
            if ($this->tieneRespuestas([211], "checked")) {
                $cambios[] = [212, ""];
                $cambios[] = [213, ""];
                $cambios[] = [508, ""];
            }
            if ($this->tieneRespuestas([221], "checked")) {
                $cambios[] = [222, ""];
            }
            if ($this->tieneRespuestas([237], "checked")) {
                $cambios[] = [238, ""];
                $cambios[] = [239, ""];
                $cambios[] = [240, ""];
                $cambios[] = [241, ""];
                $cambios[] = [242, ""];
            }
            if ($this->tieneRespuestas([251], "checked")) {
                $cambios[] = [252, ""];
                $cambios[] = [253, ""];
                $cambios[] = [254, ""];
                $cambios[] = [255, ""];
                $cambios[] = [256, ""];               
            }           
            if ($this->tieneRespuestas([258], "checked")) {
                $cambios[] = [259, ""];
                $cambios[] = [260, ""];
                $cambios[] = [261, ""];
            }
            if ($this->tieneRespuestas([318], "checked")) {
                $cambios[] = [319, ""];
                $cambios[] = [320, ""];
                $cambios[] = [321, ""];
                $cambios[] = [510, ""];
            }
        }        
        if($this->evaluacion['tipo_gestion'] == 'No Venta' && $this->tieneRespuestas([244], "Si")){
            $cambios[] = [244, "No Aplica"];
            $cambios[] = [250, "No Aplica"];
            $cambios[] = [257, "No Aplica"];
            $cambios[] = [262, "No Aplica"];
            $cambios[] = [276, "No Aplica"];
            $cambios[] = [283, "No Aplica"];
            $cambios[] = [288, "No Aplica"];
            
        }
        
        $this->guardarRespuestas($cambios);
    }

    public function validarPauta()
    {
        if($this->evaluacion['tipo_gestion'] == 'No Venta') {           
            $this->agregarValidaciones([511]);
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

//    public $gestiones, $resoluciones, $ruidos, $tiposnegocio, $pecresponsables, $motivos, $grabacion;
//    public $presentacion1 = '';
//    public $presentacion2 = '';
//    public $presentacion3 = '';
//    public $frasesenganche1 = '';
//    public $frasesenganche2 = '';
//    public $frasesenganche3 = '';
//    public $personalizacion1 = '';
//    public $personalizacion2 = '';
//    public $personalizacion3 = '';
//    public $deteccion1 = '';
//    public $deteccion2 = '';
//    public $deteccion3 = '';
//    public $deteccion4 = '';
//    public $evaluacion1 = '';
//    public $evaluacion2 = '';
//    public $evaluacion3 = '';
//    public $evaluacion4 = '';
//    public $evaluacion5 = '';
//    public $evaluacion6 = '';
//    public $mejoralternativa1 = '';
//    public $mejoralternativa2 = '';
//    public $mejoralternativa3 = '';
//    public $argumentacion1 = '';
//    public $argumentacion2 = '';
//    public $argumentacion3 = '';
//    public $argumentacion4 = '';
//    public $objeciones1 = '';
//    public $objeciones2 = '';
//    public $objeciones3 = '';
//    public $objeciones4 = '';
//    public $objeciones5 = '';
//    public $condiciones1 = '';
//    public $condiciones2 = '';
//    public $condiciones3 = '';
//    public $condiciones4 = '';
//    public $condiciones5 = '';
//    public $condiciones6 = '';
//    public $condiciones7 = '';
//    public $condiciones8 = '';
//    public $condiciones9 = '';
//    public $promociones1 = '';
//    public $promociones2 = '';
//    public $promociones3 = '';
//    public $promociones4 = '';
//    public $promociones5 = '';
//    public $promociones6 = '';
//    public $promociones7 = '';
//    public $facturacion1 = '';
//    public $facturacion2 = '';
//    public $facturacion3 = '';
//    public $facturacion4 = '';
//    public $facturacion5 = '';
//    public $facturacion6 = '';
//    public $cargos1 = '';
//    public $cargos2 = '';
//    public $cargos3 = '';
//    public $cargos4 = '';
//    public $cargos5 = '';
//    public $cargos6 = '';
//    public $cargos7 = '';
//    public $equipos1 = '';
//    public $equipos2 = '';
//    public $equipos3 = '';
//    public $equipos4 = '';
//    public $equipos5 = '';
//    public $validacion1 = '';
//    public $validacion2 = '';
//    public $validacion3 = '';
//    public $validacion4 = '';
//    public $validacion5 = '';
//    public $validacion6 = '';
//    public $validacion7 = '';
//    public $validacion8 = '';
//    public $validacion9 = '';
//    public $validacion10 = '';
//    public $validacion11 = '';
//    public $validacion12 = '';
//    public $validacion13 = '';
//    public $validacion14 = '';
//    public $despacho1 = '';
//    public $despacho2 = '';
//    public $despacho3 = '';
//    public $despacho4 = '';
//    public $despacho5 = '';
//    public $despacho6 = '';
//    public $despacho7 = '';
//    public $scripts1 = '';
//    public $scripts2 = '';
//    public $scripts3 = '';
//    public $scripts4 = '';
//    public $scripts5 = '';
//    public $despedida1 = '';
//    public $despedida2 = '';
//    public $despedida3 = '';
//    public $despedida4 = '';
//    public $despedida5 = '';
//    public $atencion1 = '';
//    public $atencion2 = '';
//    public $atencion3 = '';
//    public $atencion4 = '';
//    public $atencion5 = '';
//    public $atencion6 = '';
//    public $atencion7 = '';
//    public $lenguaje1 = '';
//    public $lenguaje2 = '';
//    public $lenguaje3 = '';
//    public $lenguaje4 = '';
//    public $lenguaje5 = '';
//    public $lenguaje6 = '';
//    public $claridad1 = '';
//    public $claridad2 = '';
//    public $claridad3 = '';
//    public $dominio1 = '';
//    public $dominio2 = '';
//    public $dominio3 = '';
//    public $dominio4 = '';
//    public $retroalimentacion = '';
//    public $comentario_interno = '';
//
//    public function inicializar()
//    {
//
//        /* Tipos de atributo al guardar */
//        $this->tiposRespuesta = [
//            PautaBase::$RESPUESTA_CHECK => [202, 203, 205, 206, 208, 209, 211, 212, 213, 215, 216, 217, 218, 219, 221, 222, 224, 225, 226, 228, 229, 230, 231, 232, 233, 234, 235, 237, 238, 239, 240, 241, 242, 245, 246, 247, 248, 249, 251, 252, 253, 254, 255, 256, 258, 259, 260, 261, 263, 264, 265, 266, 267, 268, 269, 270, 271, 272, 273, 274, 275, 277, 278, 279, 280, 281, 282, 284, 285, 286, 287, 290, 291, 292, 293, 294, 295, 297, 298, 299, 300, 301, 303, 304, 306, 307, 308, 313, 314, 315, 316, 318, 319, 320, 321],
//            PautaBase::$RESPUESTA_OPCIONES => [],
//            PautaBase::$RESPUESTA_OTROS => [309, 310],
//        ];
//
//
//        /* Reglas de validación */
//        $this->agregarValidaciones([
//            'retroalimentacion' => 'required',
//        ]);
//        $this->grabacion = Grabacion::where('evaluacion_id', $this->evaluacion->id)->first();
//        if($this->grabacion){
//            $this->grabacioncheck = 1;
//        }
//    }
//
//    public function guardar()
//    {
//        $this->guardarRespuestas([201, 202, 203], 'presentacion', 1);
//        $this->guardarRespuestas([204, 205, 206], 'frasesenganche', 1);
//        $this->guardarRespuestas([207, 208, 209], 'personalizacion', 1);
//        $this->guardarRespuestas([210, 211, 212, 213], 'deteccion', 1, 2);
//        $this->guardarRespuestas([214, 215, 216, 217, 218, 219], 'evaluacion', 1);
//        $this->guardarRespuestas([220, 221, 222], 'mejoralternativa', 1, 2);
//        $this->guardarRespuestas([223, 224, 225, 226], 'argumentacion', 1);
//        $this->guardarRespuestas([227, 228, 229, 230, 231, 232, 233, 234, 235], 'condiciones', 1);
//        $this->guardarRespuestas([236, 237, 238, 239, 240, 241, 242], 'promociones', 1, 2);
//        $this->guardarRespuestas([244, 245, 246, 247, 248, 249], 'facturacion', 1);
//        $this->guardarRespuestas([250, 251, 252, 253, 254, 255, 256], 'cargos', 1, 2);
//        $this->guardarRespuestas([257, 258, 259, 260, 261], 'equipos', 1, 2);
//        $this->guardarRespuestas([262, 263, 264, 265, 266, 267, 268, 269, 270, 271, 272, 273, 274, 275], 'validacion', 1);
//        $this->guardarRespuestas([276, 277, 278, 279, 280, 281, 282], 'despacho', 1);
//        $this->guardarRespuestas([283, 284, 285, 286, 287], 'scripts', 1);
//        $this->guardarRespuestas([288, 313, 314, 315, 316], 'despedida', 1);
//        $this->guardarRespuestas([289, 290, 291, 292, 293, 294, 295], 'atencion', 1);
//        $this->guardarRespuestas([296, 297, 298, 299, 300, 301], 'lenguaje', 1);
//        $this->guardarRespuestas([302, 303, 304], 'claridad', 1);
//        $this->guardarRespuestas([305, 306, 307, 308], 'dominio', 1);
//        $this->guardarRespuestas([317, 318, 319, 320, 321], 'objeciones', 1);
//
//        $this->guardarRespuesta(309, ['memo' => $this->retroalimentacion]);
//        $this->guardarRespuesta(310, ['memo' => $this->comentario_interno]);
//
//    }
//
//    /**
//     * Implementación de método abstracto para ejecutar en el contexto del "save".
//     *
//     * @return mixed|void
//     */
//    public function configurarCalculoDePuntajes()
//    {
//
//        $ponderadores = [
//            201 => 1, // presentacion
//            204 => 1, // frasesenganche
//            207 => 1, // personalizacion
//            210 => 8, // deteccion
//            214 => 16, // evaluacion
//            220 => 8, // mejoralternativa
//            223 => 4, // argumentacion
//            227 => 16, // condiciones
//            236 => 8, // promociones
//            244 => 8, // facturacion
//            250 => 4, // cargos
//            257 => 4, // equipos
//            262 => 8, // validacion
//            276 => 16, // despacho
//            283 => 2, // scripts
//            288 => 1, // despedida
//            289 => 4, // atencion
//            296 => 4, // lenguaje
//            302 => 8, // claridad
//            305 => 4, // dominio
//            317 => 4, // objeciones
//        ];
//        $this->calcularPENC($ponderadores);
//        $atributosCriticos = [
//            'deteccion4', 'evaluacion4', 'evaluacion5', 'evaluacion6', 'argumentacion3', 'argumentacion4',
//            'condiciones8', 'condiciones9', 'promociones5', 'promociones6', 'promociones7', 'facturacion5',
//            'facturacion6', 'cargos6', 'cargos7', 'equipos5', 'validacion13', 'validacion14', 'despacho5',
//            'despacho6', 'despacho7', 'scripts2', 'scripts3', 'scripts4', 'scripts5', 'atencion7', 'objeciones4', 'objeciones5'
//        ];
//        $atributosCriticosLeves = [
//            'deteccion4', 'evaluacion4',
//            'promociones5',
//            'validacion13', 'despacho5',
//            'scripts5', 'objeciones4'
//        ];
//        $atributosCriticosIntermedios = [
//            'evaluacion5', 'argumentacion3',
//            'condiciones8', 'facturacion5',
//            'cargos6', 'equipos5',
//            'despacho7', 'scripts3', 'scripts4',
//        ];
//        $atributosCriticosGraves = [
//            'evaluacion6', 'argumentacion4',
//            'condiciones9', 'promociones6', 'promociones7',
//            'facturacion6', 'cargos7', 'validacion14',
//            'despacho6', 'scripts2', 'atencion7', 'objeciones5'
//        ];
//        $this->calcularPECSimple($atributosCriticos, $atributosCriticosLeves, $atributosCriticosIntermedios, $atributosCriticosGraves);
//
//        // Buscar ocurrencia de errores críticos
//        $atributosPEC = Atributo::where('pauta_id', 3)
//            ->where('name_categoria', 'PEC')->get();
//        $this->buscarBrechas($atributosPEC);
//
//    }
//
//    public function render()
//    {
//        return view('livewire.pauta-ventas-remotas');
//    }
//
//    public function xpresentacion()
//    {
//        $this->validarCamposNoAplica([], [2, 3],1,'presentacion');
//    }
//
//    public function xfrasesenganche()
//    {
//        $this->validarCamposNoAplica([], [2, 3],1,'frasesenganche');
//    }
//
//    public function xpersonalizacion()
//    {
//        $this->validarCamposNoAplica([], [2, 3],1,'personalizacion');
//    }
//
//    public function xdeteccion()
//    {
//        $this->validarCamposNoAplica([2], [3, 4],1,'deteccion');
//    }
//
//    public function xevaluacion()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4, 5, 6],1,'evaluacion');
//    }
//
//    public function xmejoralternativa()
//    {
//        $this->validarCamposNoAplica([2], [3],1,'mejoralternativa');
//    }
//
//    public function xargumentacion()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4],1,'argumentacion');
//    }
//
//    public function xobjeciones()
//    {
//        $this->validarCamposNoAplica([2], [3, 4, 5],1,'objeciones');
//    }
//
//    public function xcondiciones()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4, 5, 6, 7, 8, 9],1,'condiciones');
//    }
//
//    public function xpromociones()
//    {
//        $this->validarCamposNoAplica([2], [3, 4, 5, 6, 7],1,'promociones');
//    }
//
//    public function xfacturacion()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4, 5, 6],1,'facturacion');
//    }
//
//    public function xcargos()
//    {
//        $this->validarCamposNoAplica([2], [3, 4, 5, 6, 7],1,'cargos');
//    }
//
//    public function xdespedida()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4, 5],1,'despedida');
//    }
//
//    public function xequipos()
//    {
//        $this->validarCamposNoAplica([2], [3, 4, 5],1,'equipos');
//    }
//
//    public function xvalidacion()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14],1,'validacion');
//    }
//
//    public function xdespacho()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4, 5, 6, 7],1,'despacho');
//    }
//
//    public function xscripts()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4, 5],1,'scripts');
//    }
//
//    public function xatencion()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4, 5, 6, 7],1,'atencion');
//    }
//
//    public function xlenguaje()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4, 5, 6],1,'lenguaje');
//    }
//
//    public function xclaridad()
//    {
//        $this->validarCamposNoAplica([], [2, 3],1,'claridad');
//    }
//
//    public function xdominio()
//    {
//        $this->validarCamposNoAplica([], [2, 3, 4],1,'dominio');
//    }

}
