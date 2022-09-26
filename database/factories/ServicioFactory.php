<?php

namespace Database\Factories;

use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class ServicioFactory
 * @package Database\Factories
 * @version 1 (210602)
 */
class ServicioFactory extends Factory
{
    /**
     * El nombre del modelo para usar con Factory
     *
     * @var string
     */
    protected $model = Servicio::class;

    /**
     * Define el estado por defecto del modelo
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'status' => 1,
            'estudio_id' => 1,
        ];
    }
}
