<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Reaccion;

class ReaccionFactory extends Factory
{
    protected $model = Reaccion::class;

    public function definition()
    {
        return [
            'usuario_id' => function () {
                return random_int(1, 10); // ID de usuario existente
            },
            'publicacion_id' => function () {
                return random_int(1, 40); // ID de publicación existente
            },
            'me_gusta' => $this->faker->numberBetween(0, 100), // Cantidad de me gusta aleatorios entre 0 y 100
            'favoritos' => $this->faker->numberBetween(0, 100), // Cantidad de favoritos aleatorios entre 0 y 100
        ];
    }
}
