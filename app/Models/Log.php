<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Log
 * Registra en el historial los cambios en las respuestas de la pauta y la evaluación
 * @version 1
 */
class Log extends Model
{
    use HasFactory;
    protected $dateFormat = 'd-m-Y H:i:s';

    const PAUTA_MODIFICAR = 1;
    const PAUTA_CALIDAD = 2;

    const ACCION_CAMBIO_ESTADO = 'Cambio de estado';
    const ACCION_MODIFICACION = 'Evaluacion revisada';

    public static function log($evaluacion_id, $accion, $detalle=[])
    {
        $estados = Estado::all();
        if ($accion == LOG::ACCION_CAMBIO_ESTADO && $detalle[0] != $detalle[1]) {
            $log = new Log();
            $log->user_id = Auth::user()->id;
            $log->evaluacion_id = $evaluacion_id;
            $log->accion = $accion;
            $log->detalle = 'Cambió estado de "' . $estados->firstWhere('id', $detalle[0])->name . '" a "' . $estados->firstWhere('id', $detalle[1])->name . '"';
            $log->save();
        }
    }

}
