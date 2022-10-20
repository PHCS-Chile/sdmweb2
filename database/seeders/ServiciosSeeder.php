<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class ServiciosSeeder
 * @package Database\Seeders
 * @version 2
 */
class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicios')->insert($this->servicios);
    }

    private $servicios = [
        ['name' => 'SCCP', 'pais' => 'Perú', 'status' => 1, 'estudio_id' => 1],
        ['name' => 'Konecta PE', 'pais' => 'Perú', 'status' => 1, 'estudio_id' => 1],
        ['name' => 'Konecta Perú', 'pais' => 'Perú', 'status' => 1, 'estudio_id' => 2],
        ['name' => 'Konecta Chile', 'pais' => 'Chile', 'status' => 1, 'estudio_id' => 2],
        ['name' => 'SCCP', 'pais' => 'Perú', 'status' => 1, 'estudio_id' => 2],
        ['name' => 'ECC', 'pais' => 'Chile', 'status' => 1, 'estudio_id' => 2],
        ['name' => 'A365', 'pais' => 'Perú', 'status' => 1, 'estudio_id' => 2],
        ['name' => 'A365', 'pais' => 'Perú', 'status' => 1, 'estudio_id' => 3],
        ['name' => 'Konecta', 'pais' => 'Perú', 'status' => 1, 'estudio_id' => 3],
        ['name' => 'SCCP', 'pais' => 'Perú', 'status' => 1, 'estudio_id' => 3],
        ['name' => 'Ampliffica', 'pais' => 'México', 'status' => 1, 'estudio_id' => 3],
        ['name' => 'Konecta', 'pais' => 'Perú', 'status' => 1, 'estudio_id' => 4],
        ['name' => 'Stic', 'pais' => 'Chile', 'status' => 1, 'estudio_id' => 4],
        ['name' => 'SCCP', 'pais' => 'Perú', 'status' => 1, 'estudio_id' => 5],
        ['name' => 'Konecta Colombia', 'pais' => 'Colombia', 'status' => 1, 'estudio_id' => 3],
        ['name' => 'B12', 'pais' => 'Perú', 'status' => 1, 'estudio_id' => 3],
    ];

}
