<?php

namespace Database\Seeders;

use App\Models\Agente;
use App\Models\Asignacion;
use App\Models\Periodo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class AsignacionsSeeder
 * @package Database\Seeders
 * @version 7
 */
class AsignacionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Periodo::where('id' ,'>' ,0)->pluck('id')->toArray() as $periodo) {
            foreach (Agente::where('id' ,'>' ,0)->get() as $agente) {
                $preset = ['periodo_id' => $periodo, 'agente_id'  => $agente->id];
                if ($agente->servicio_id < 3) {
                    Asignacion::factory()->digital()->create($preset);
                } elseif ($agente->servicio_id < 8) {
                    Asignacion::factory()->callVoz()->create($preset);
                } elseif ($agente->servicio_id < 12) {
                    Asignacion::factory()->ventaRemota()->create($preset);
                } elseif ($agente->servicio_id < 14) {
                    Asignacion::factory()->backOffice()->create($preset);
                } else {
                    Asignacion::factory()->retenciones()->create($preset);
                }
            }
        }
    }

}
