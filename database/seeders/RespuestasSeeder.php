<?php

namespace Database\Seeders;

use App\Models\Atributo;
use App\Models\Evaluacion;
use App\Models\Respuesta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class RespuestasSeeder
 * @package Database\Seeders
 * @version 3
 */
class RespuestasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $evaluaciones = Evaluacion::where('estado_id','>',1)->where('estado_id','<',6)->get();
        foreach($evaluaciones as $evaluacion) {
            $atributos = Atributo::where('pauta_id', $evaluacion->asignacion->estudio->pauta->id)->pluck('id')->toArray();
            foreach ($atributos as $atributo) {
                Respuesta::factory()->create([
                    'atributo_id' => $atributo,
                    'evaluacion_id' => $evaluacion->id,
                ]);
            }
        }
    }

}
