<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'),
            'apellido1' => $this->faker->lastName,
            'apellido2' => $this->faker->lastName,
            'num_visitas' => $this->faker->numberBetween(0, 1000),
            'estado' => $this->faker->sentence,
            'invitaciones' => $this->faker->numberBetween(0, 10),
            'fotoperfil' => 'https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg', // Generar una URL de imagen aleatoria de 200x200 píxeles
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
