<?php

namespace Database\Factories;

use App\Models\Educacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducacionFactory extends Factory
{
    /**
     * Define el modelo de fábrica asociado.
     *
     * @return string
     */
    protected $model = Educacion::class;

    /**
     * Define el estado predeterminado del modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'usuario_id' => function () {
                // Genera un ID de usuario válido o utiliza un ID existente de la tabla 'users'
                return random_int(1, 10); // Por ejemplo, suponiendo que ya tienes 10 usuarios creados
            },
            'institucion' => $this->faker->company,
            'titulo' => $this->faker->jobTitle,
            'duracion' => $this->faker->randomElement(['1 año', '2 años', '3 años', '4 años', '5 años']),
        ];
    }
}
