<?php

namespace Database\Seeders;

use App\Models\Mensaje;
use Illuminate\Database\Seeder;

class MensajeSeeder extends Seeder
{
    /**
     * Ejecuta el seeder.
     *
     * @return void
     */
    public function run()
    {
        Mensaje::factory()->count(10)->create();
    }
}
