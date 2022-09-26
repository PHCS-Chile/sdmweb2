<?php

namespace Database\Factories;

use App\Models\Estudio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class EstudioFactory
 * @package Database\Factories
 * @version 1 (21-06-02)
 */
class EstudioFactory extends Factory
{
    /**
     * El nombre del modelo para usar con Factory
     *
     * @var string
     */
    protected $model = Estudio::class;

    /**
     * Define el estado por defecto del modelo
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->bs,
        ];
    }
}
