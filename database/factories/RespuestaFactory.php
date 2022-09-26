<?php

namespace Database\Factories;

use App\Models\Respuesta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class RespuestaFactory
 *
 * @package App\Http\Controllers
 * @version 2
 */
class RespuestaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Respuesta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'origen_id' => Respuesta::PH,
            'respuesta_text' => '',
            'respuesta_int' => NULL,
            'respuesta_memo' => NULL,
        ];
    }
}
