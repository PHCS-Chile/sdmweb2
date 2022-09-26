<?php

namespace Database\Seeders;

use App\Models\Evaluacion;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 * @package Database\Seeders
 * @version 3
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PautasEstudiosSeeder::class,
            PeriodosSeeder::class,
            EstadosSeeder::class,
            UsersSeeder::class,
            ServiciosSeeder::class,
            AgentesSeeder::class,
            AsignacionsSeeder::class,
            AtributosSeeder::class,
            EvaluacionsSeeder::class,
            RespuestasSeeder::class,
            EscalasSeeder::class,
        ]);
    }
}
