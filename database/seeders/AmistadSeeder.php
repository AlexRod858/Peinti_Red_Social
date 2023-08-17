<?php

namespace Database\Seeders;

use App\Models\Amistad;
use Illuminate\Database\Seeder;

class AmistadSeeder extends Seeder
{
    /**
     * Ejecuta el seeder.
     *
     * @return void
     */
    public function run()
    {
        Amistad::factory()->count(10)->create();
    }
}
