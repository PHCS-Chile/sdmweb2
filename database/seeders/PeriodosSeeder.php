<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

/**
 * Class PeriodosSeeder
 * @package Database\Seeders
 * @version 5
 */
class PeriodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mesInicial = 11;
        $anoInicial = 2021;
        $periodos = crearPeriodos($mesInicial, $anoInicial);
        foreach ($periodos as $periodo) {
            $periodo_full = [
                'name' => ucfirst(mesEspanol($periodo[0])) . "-" . $periodo[1],
                'periodo_id' => idDePeriodo($periodo),
                'periodo_fecha' => $periodo[1] . '-' . ajustarMes($periodo[0]) . '-01',
                'visible' => 1, 'status' => 1, 'web' => 1,
            ];
            DB::table('periodos')->insert($periodo_full);
        }
    }
}
