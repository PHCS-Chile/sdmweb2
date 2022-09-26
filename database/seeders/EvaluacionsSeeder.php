<?php

namespace Database\Seeders;

use App\Models\Asignacion;
use App\Models\Evaluacion;
use App\Models\Notificacion;
use Illuminate\Database\Seeder;


/**
 * Class EvaluacionsSeeder
 * @package Database\Seeders
 * @version 3
 */
class EvaluacionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Asignacion::where('id' ,'>' ,0)->pluck('id')->toArray() as $asignacion) {
            Evaluacion::factory()->count(rand(1, 2))->create(['asignacion_id' => $asignacion]);
        }
        $evaluacionesEnRevision = Evaluacion::where('estado_id', 3)->get();
        foreach ($evaluacionesEnRevision as $evaluacion) {
            Notificacion::notificar($evaluacion->id);
        }
        $asignacion = Asignacion::where('id' ,'>' ,0)->orderBy('id', 'DESC')->first();
        Evaluacion::factory()->count(50)->create(['asignacion_id' => $asignacion->id]);


//        // Asignacion para probar incompletos
//        $asignacion = new Asignacion();
//        $asignacion->n_asignacion = 10;
//        $asignacion->agente_id = 72;
//        $asignacion->periodo_id = 1;
//        $asignacion->estudio_id = 5;
//        $asignacion->save();
//        // evaluacion incompleta
//        $evaluacion = new Evaluacion();
//        $evaluacion->nombre_ejecutivo = "Usuario incompleta";
//        $evaluacion->rut_ejecutivo = "16327196-6";
//        $evaluacion->asignacion_id = $asignacion->id;
//        $evaluacion->estado_id = 1;
//        $evaluacion->sub_estudio = "N3";
//        $evaluacion->estado_conversacion = 7;
//        $evaluacion->save();
//        $evaluacion = new Evaluacion();
//        $evaluacion->nombre_ejecutivo = "Usuario incompleta 2";
//        $evaluacion->rut_ejecutivo = "6562923-2";
//        $evaluacion->asignacion_id = $asignacion->id;
//        $evaluacion->estado_id = 1;
//        $evaluacion->sub_estudio = "N3";
//        $evaluacion->estado_conversacion = 7;
//        $evaluacion->save();
    }
}
