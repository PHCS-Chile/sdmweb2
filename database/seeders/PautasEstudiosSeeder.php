<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class PautasEstudiosSeeder
 * @package Database\Seeders
 * @version 2
 */
class PautasEstudiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pautas')->insert($this->pautas);
        DB::table('estudios')->insert($this->estudios);
    }

    /**
     * @var string[][] Pautas actualmente existentes. (Usar Factory?)
     */
    private $pautas = [
        ['name' => 'Whatsapp', 'descripcion' => 'pauta de whatsapp'],
        ['name' => 'Voz', 'descripcion' => 'Pauta Call Center Voz'],
        ['name' => 'VentasRemotas', 'descripcion' => 'Pauta Ventas Remotas'],
        ['name' => 'BackOffice', 'descripcion' => 'Pauta Back Office'],
        ['name' => 'Retenciones', 'descripcion' => 'Pauta Retenciones'],
        ['name' => 'CallVoz 4.0', 'descripcion' => 'Pauta Call Center Voz'],
    ];

    /**
     * @var string[][] Estudios actualmente existentes. (Usar Factory?)
     */
    private $estudios = [
        ['name' => 'EPCS Call Center Canales Digitales', 'pauta_id' => 1, 'navegacion' => 'ejecutivos'],
        ['name' => 'EPCS Call Center Voz', 'pauta_id' => 6, 'navegacion' => 'directo'],
        ['name' => 'EPCS Ventas Remotas', 'pauta_id' => 3, 'navegacion' => 'directo'],
        ['name' => 'Back Office', 'pauta_id' => 4, 'navegacion' => 'ejecutivos'],
        ['name' => 'Call Center Retenciones', 'pauta_id' => 5, 'navegacion' => 'ejecutivos'],
    ];

}
