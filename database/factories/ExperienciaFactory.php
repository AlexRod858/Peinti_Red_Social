<?php

namespace Database\Factories;

use App\Models\Experiencia;
use Illuminate\Database\Eloquent\Factories\Factory; // Asegúrate de importar el Factory
use Illuminate\Database\Eloquent\Factories\HasFactory; // Agrega la importación del trait HasFactory

class ExperienciaFactory extends Factory
{
    use HasFactory; // Asegúrate de utilizar el trait HasFactory

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'usuario_id' => function () {
                // Aquí puedes generar un ID de usuario válido o usar un ID existente de la tabla 'users'
                return random_int(1, 10); // Por ejemplo, suponiendo que ya tienes 10 usuarios creados
            },
            'empresa' => $this->faker->company,
            'rol' => $this->faker->jobTitle,
            'duracion' => $this->faker->randomElement(['1 año', '2 años', '3 años', '4 años', '5 años']),
            // Puedes agregar más campos y definiciones aquí según tus necesidades
        ];
    }
}
