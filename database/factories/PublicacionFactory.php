<?php

namespace Database\Factories;

use App\Models\Publicacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublicacionFactory extends Factory
{
    protected $model = Publicacion::class;

    public function definition()
    {
        return [
            'usuario_id' => function () {
                // Genera un ID de usuario válido o utiliza un ID existente de la tabla 'users'
                return random_int(1, 10); // Por ejemplo, suponiendo que ya tienes 10 usuarios creados
            },
            'foto' => $this->faker->imageUrl,
            'titulo' => $this->faker->sentence,
            'medidas' => $this->faker->randomElement(['10x10', '15x15', '20x20']),
            'descripcion' => $this->faker->paragraph,
            'fecha' => $this->faker->date,
        ];
    }
}
