<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

/**
 * Class EstadosSeeder
 * @package Database\Seeders
 * @version 4
 */
class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert($this->estados);
    }

    /**
     * @var array[] Estados actualmente utilizados
     */
    private $estados = [
        // Evaluación (1-6)
        ['name' => 'En Blanco', 'visible' => 1, 'tipo' => 1],
        ['name' => 'Completa', 'visible' => 1, 'tipo' => 1],
        ['name' => 'Enviada a Revision', 'visible' => 1, 'tipo' => 1],
        ['name' => 'Para enviar EC', 'visible' => 1, 'tipo' => 1],
        ['name' => 'Completa y Revisada', 'visible' => 1, 'tipo' => 1],
        ['name' => 'Descartada', 'visible' => 1, 'tipo' => 1],
        // Grabaciones (7-10)
        ['name' => 'No Recorrida', 'visible' => 1, 'tipo' => 2],
        ['name' => 'Con Grabacion', 'visible' => 1, 'tipo' => 2],
        ['name' => 'Sin Grabación', 'visible' => 1, 'tipo' => 2],
        ['name' => 'No Evaluable', 'visible' => 2, 'tipo' => 2], // No se usa
        // Reportes (11-13)
        ['name' => 'Sin Reporte', 'visible' => 1, 'tipo' => 3],
        ['name' => 'Revisado Para Enviar', 'visible' => 1, 'tipo' => 3],
        ['name' => 'Revisado Enviado', 'visible' => 1, 'tipo' => 3],
        // Grabaciones 2 (14-16)
        ['name' => 'No Evaluable - Muy larga', 'visible' => 1, 'tipo' => 2],
        ['name' => 'No Evaluable - Incompleta', 'visible' => 1, 'tipo' => 2],
        ['name' => 'No Evaluable - Inaudible', 'visible' => 1, 'tipo' => 2],
        // Chats (17-19)
        ['name' => 'Tiene Chat', 'visible' => 1, 'tipo' => 3],
        ['name' => 'Sin Chat', 'visible' => 1, 'tipo' => 3],
        ['name' => 'Chat Descartado', 'visible' => 1, 'tipo' => 3],
        // Evaluacion 2: en proceso (20)
        ['name' => 'En evaluación', 'visible' => 2, 'tipo' => 1],
    ];

}
