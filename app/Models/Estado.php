<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado
 * @package App\Models
 * @version 2
 */
class Estado extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    const ACTIVO = 1;
    const INACTIVO = 2;
    protected $dateFormat = 'd-m-Y H:i:s';

    /*
     * ['name' => 'Sin Reporte', 'visible' => 1, 'tipo' => 3],
        ['name' => 'Revisado Para Enviar', 'visible' => 1, 'tipo' => 3],
        ['name' => 'Revisado Enviado', 'visible' => 1, 'tipo' => 3],
     */

    const EVALUACION_EN_BLANCO = 1;
    const EVALUACION_EN_EVALUACION = 20;
    const EVALUACION_COMPLETA = 2;
    const EVALUACION_ENVIADADA_A_REVISION = 3;
    const EVALUACION_PARA_ENVIAR_EC = 4;
    const EVALUACION_COMPLETA_Y_REVISADA = 5;
    const EVALUACION_DESCARTADA = 6;

    const REPORTE_SIN_REPORTE = 11;
    const REPORTE_REVISADO_PARA_ENVIAR = 12;
    const REPORTE_REVISADO_ENVIADO = 13;

    public function evaluacions()
    {
        return $this->hasMany(Evaluacion::class);
    }

}
