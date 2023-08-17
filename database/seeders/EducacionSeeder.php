<?php

namespace Database\Seeders;

use App\Models\Educacion;
use Illuminate\Database\Seeder;

class EducacionSeeder extends Seeder
{
    /**
     * Ejecuta el seeder.
     *
     * @return void
     */
    public function run()
    {
        Educacion::factory()->count(10)->create();
    }
}
