<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


/**
 * Class UserFactory
 * @package Database\Factories
 * @version 1 (21-06-02)
 */
class UserFactory extends Factory
{
    /**
     * El nombre del modelo para usar con Factory
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Indica que el elemento creado con el Factory tendrá un perfil con valor 1
     *
     * @return UserFactory
     */
    public function perfil1(): UserFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'perfil' => 1,
            ];
        });
    }

    /**
     * Define el estado por defecto del modelo
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('patata123'),
            'remember_token' => Str::random(10),
            'perfil' => 2,
        ];
    }
}
