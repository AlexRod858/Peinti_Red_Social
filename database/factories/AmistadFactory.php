<?php

namespace Database\Factories;

use App\Models\Amistad;
use Illuminate\Database\Eloquent\Factories\Factory;

class AmistadFactory extends Factory
{
    /**
     * Define el modelo de fábrica asociado.
     *
     * @return string
     */
    protected $model = Amistad::class;

    /**
     * Define el estado predeterminado del modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'usuario_id_receptor' => function () {
                // Genera un ID de usuario válido o utiliza un ID existente de la tabla 'users'
                return random_int(1, 10); // Por ejemplo, suponiendo que ya tienes 10 usuarios creados
            },
            'usuario_id_emisor' => function () {
                // Genera un ID de usuario válido o utiliza un ID existente de la tabla 'users'
                return random_int(1, 10); // Por ejemplo, suponiendo que ya tienes 10 usuarios creados
            },
            'estado' => $this->faker->randomElement(['pendiente', 'aceptada', 'rechazada']),

        ];
    }
}
