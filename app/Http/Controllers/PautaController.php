<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use App\Models\Respuesta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

/**
 * Class PautaController
 * Gestiona las peticiones POST para la modificación de las pautas
 * @package App\Http\Controllers
 * @version 2
 */
class PautaController extends Controller
{

    /**
     * Elimina la discrepancia (ICI) para una evaluación, si es que esta la tiene definida.
     *
     * @param $evaluacionid
     * @return Application|RedirectResponse|Redirector
     */
    public function resetici($evaluacionid)
    {
        $evaluacion = Evaluacion::find($evaluacionid);
        /* Si tiene ICI */
        if ($evaluacion->fecha_ici) {
            /* Se eliminan los origen_id = 1 (respuestas con discrepancia) */
            Respuesta::where('evaluacion_id', $evaluacionid)->where('origen_id', Respuesta::PH)->delete();
            $respuestas = Respuesta::where('evaluacion_id', $evaluacionid)->where('origen_id', Respuesta::ICI)->get();
            /* Se actualiza el origen_id a 1 (sin ICI) */
            foreach ($respuestas as $respuesta) {
                $respuesta->origen_id = Respuesta::PH;
                $respuesta->save();
            }
            /* Se actualiza la evaluación para que no tenga los resultados del ICI */
            $evaluacion->ici = null;
            $evaluacion->user_ici = null;
            $evaluacion->fecha_ici = null;
            $evaluacion->save();

        }
        return redirect(route('evaluacions.index', [$evaluacionid]))->with("status", "Se borro ICI correctamente");

    }

    public function cambiarEstado($evaluacionid, $estado)
    {

    }

    public function grabacionNoEvaluable($evaluacion_id)
    {
        $evaluacion = Evaluacion::find($evaluacion_id);
        $evaluacion->estado_conversacion = 10;
        $evaluacion->save();
        return redirect(route('asignacions.ejecutivoevaluacionescallvoz', [$evaluacion->asignacion->id]))
            ->with('status', 'Estado de la grabación ha cambiado!');
    }

    public function grabacionNoExiste($evaluacion_id)
    {
        $evaluacion = Evaluacion::find($evaluacion_id);
        $evaluacion->estado_conversacion = 9;
        $evaluacion->save();
        return redirect(route('asignacions.ejecutivoevaluacionescallvoz', [$evaluacion->asignacion->id]))
            ->with('status', 'Estado de la grabación ha cambiado!');
    }

}
