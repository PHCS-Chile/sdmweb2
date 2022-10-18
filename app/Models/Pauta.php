<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

/**
 * Class Pauta
 * @package App\Models
 * @version 2
 */
class Pauta extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    protected $dateFormat = 'd-m-Y H:i:s';

    public function escalas()
    {
        $escalas = [];
        if (key_exists($this->id, $this->escalasPautas)) {
            foreach ($this->escalasPautas[$this->id] as $escala) {
                $escalas[$escala['nombre']] = [
                    'escalas' => Escala::where('grupo_id',$escala['grupo_id'])->orderBy('value', 'ASC')->get(),
                    'opciones' => $escala['opciones']
                ];
            }

            $booleanoSi = new stdClass;
            $booleanoSi->name = "Si";
            $booleanoSi->id = "Si";
            $booleanoNo = new stdClass;
            $booleanoNo->name = "No";
            $booleanoNo->id = "No";
            $noAplica = new stdClass;
            $noAplica->name = "No Aplica";
            $noAplica->id = "No Aplica";
            $escalas['booleana'] = [
                'escalas' => collect([$booleanoSi, $booleanoNo]),
                'opciones' => []
            ];
            $escalas['no_aplica'] = [
                'escalas' => collect([$booleanoSi, $booleanoNo, $noAplica]),
                'opciones' => []
            ];
        }
        return $escalas;
    }

    public function tiposRespuestas()
    {
        if (key_exists($this->id, $this->tiposRespuestasPauta)) {
            return $this->tiposRespuestasPauta[$this->id];
        }
        return null;
    }

    public function validaciones()
    {
        if (key_exists($this->id, $this->validaciones)) {
            return $this->validaciones[$this->id];
        }
        return null;
    }

    private $validaciones = [
        2 => [
            'motivo' => 'required',
            'tipogestion1' => 'required',
            'deteccion1' => 'required',
            'infocorrecta1' => 'required',
            'gestiona1' => 'required',
            'resolucion1' => 'required',
            'retroalimentacion' => 'required',
            'descripcion_caso' => 'required',
            'respuesta_ejecutivo' => 'required',
            'otro_tiponegocio' => 'required',
            'otro_ruidoenllamada' => 'required',
            'otro_frasesyscripts' => 'required'
        ],
    ];

    private $tiposRespuestasPauta = [
        2 => [
            'check' => [98, 99, 100, 102, 103, 105, 106, 107, 108, 110, 111, 112, 114, 115, 116, 117, 119, 120, 121, 123, 124, 125, 127, 128, 129, 130, 131, 133, 134, 135, 136, 137, 138, 139, 140, 141, 143, 144, 145, 146, 147, 148, 149, 150, 151, 152, 153, 154, 155, 156, 157, 158, 159, 160, 161, 162, 163, 164, 165],
            'opciones' => [166, 168, 171, 180, 181, 182, 195, 196, 197, 198, 179],
            'si_no' => [169, 172, 173, 174, 183, 184, 185, 186, 187, 188, 189, 190, 191, 192, 193, 194, 322, 323, 324, 325, 326, 327],
            'otros' => [94, 95, 199, 200],
        ],
    ];

    private $escalasPautas = [
        1 => [
            ['grupo_id' => 1, 'nombre' => 'gestiones', 'opciones' => [49, 50, 51]],
            ['grupo_id' => 8, 'nombre' => 'resoluciones', 'opciones' => [64, 65, 66]],
            ['grupo_id' => 9, 'nombre' => 'motivo', 'opciones' => [48]],
        ],
        2 => [
            ['grupo_id' => 1, 'nombre' => 'gestiones', 'opciones' => [180, 181, 182]],
            ['grupo_id' => 8, 'nombre' => 'resoluciones', 'opciones' => [195, 196, 197, 198]],
            ['grupo_id' => 3, 'nombre' => 'pecresponsables', 'opciones' => [166]],
            ['grupo_id' => 4, 'nombre' => 'ruidos', 'opciones' => [168]],
            ['grupo_id' => 5, 'nombre' => 'tiposnegocio', 'opciones' => [171]],
            ['grupo_id' => 9, 'nombre' => 'motivo', 'opciones' => [179]]
        ],
        6 => [
            ['grupo_id' => 1, 'nombre' => 'gestiones', 'opciones' => [551, 562, 573]],
            ['grupo_id' => 8, 'nombre' => 'resoluciones', 'opciones' => [552, 563, 574]],
            ['grupo_id' => 10, 'nombre' => 'motivo', 'opciones' => [597]],
            ['grupo_id' => 5, 'nombre' => 'tiposnegocio', 'opciones' => [598]],            
        ],
    ];


}
