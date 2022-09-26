<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Estudio;
use App\Models\Periodo;
use App\Models\Evaluacion;
use Illuminate\Http\Request;

/**
 * Class AsignacionController
 * @package App\Http\Controllers
 * @version 3
 */
class AsignacionController extends Controller
{

    public function asignacionesEstudio($estudio_id){
        $estudio = Estudio::find($estudio_id);
        return view('asignaciones.asignaciones-estudio',[
            'estudio' => $estudio,
            'subestudio' => null,
        ]);
    }

    public function asignacionesSubEstudio($estudio_id, $subestudio){
        $estudio = Estudio::find($estudio_id);
        return view('asignaciones.asignaciones-estudio',[
            'estudio' => $estudio,
            'subestudio' => $subestudio,
        ]);
    }

    public function asignacionesEjecutivo($asignacion_id){
        $asignacion = Asignacion::find($asignacion_id);
        return view('asignaciones.asignaciones-ejecutivo',compact('asignacion'));
    }

    public function asignacionEjecutivo($asignacion_id, $ejecutivo){
        $asignacion = Asignacion::find($asignacion_id);
        $asignacionfinal = Asignacion::where('id',$asignacion_id)->first();
        return view('asignaciones.asignacion-ejecutivo',compact(
            'asignacion', 'ejecutivo'
        ));
    }

    public function ejecutivoevaluaciones($asignacionid, $rutejecutivo){
        $asignacions = Asignacion::where('periodo_id',2)->get()->sortByDesc('servicio');
        $asignacionfinal = Asignacion::where('id',$asignacionid)->first();
        $baseasignacions = Evaluacion::where('asignacion_id',$asignacionid)->where('rut_ejecutivo',$rutejecutivo);
        return view('asignaciones.ejecutivoevaluaciones',compact('asignacions', 'baseasignacions', 'asignacionfinal', 'rutejecutivo'));
    }

    public function EjecutivoEvaluacionesCallVoz($asignacionid){
        $asignacions = Asignacion::where('periodo_id',2)->get()->sortByDesc('servicio');
        $asignacionfinal = Asignacion::where('id',$asignacionid)->first();
        $baseasignacions = Evaluacion::where('asignacion_id',$asignacionid);
        return view('asignaciones.ejecutivo-evaluaciones-call-voz',compact('asignacions', 'baseasignacions', 'asignacionfinal'));
    }
}
