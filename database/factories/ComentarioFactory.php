<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
use App\Models\Comentario;

class ComentarioFactory extends Factory
{
    protected $model = Comentario::class;

    public function definition()
    {
        return [
            'usuario_id' => function () {
                return random_int(1, 10); // ID de usuario existente
            },
            'publicacion_id' => function () {
                return random_int(1, 40); // ID de publicación existente
            },
            'contenido' => $this->faker->sentence,
        ];
    }
}

