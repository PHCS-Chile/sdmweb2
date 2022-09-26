<?php

namespace Database\Factories;

use App\Models\Asignacion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class AsignacionFactory
 *
 * @package App\Http\Controllers
 * @version 4
 */
class AsignacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asignacion::class;

    public function digital()
    {
        return $this->state(function (array $attributes) {
            return [
                'estudio_id' => 1,
            ];
        });
    }

    public function callVoz()
    {
        return $this->state(function (array $attributes) {
            return [
                'estudio_id' => 2,
            ];
        });
    }

    public function ventaRemota()
    {
        return $this->state(function (array $attributes) {
            return [
                'estudio_id' => 3,
            ];
        });
    }

    public function backOffice()
    {
        return $this->state(function (array $attributes) {
            return [
                'estudio_id' => 4,
            ];
        });
    }

    public function retenciones()
    {
        return $this->state(function (array $attributes) {
            return [
                'estudio_id' => 5,
            ];
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'n_asignacion' => $this->faker->numberBetween(20, 200),
        ];
    }
}
