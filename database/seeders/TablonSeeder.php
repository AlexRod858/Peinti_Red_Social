<?php

namespace Database\Seeders;

use App\Models\Tablon;
use Illuminate\Database\Seeder;

class TablonSeeder extends Seeder
{
    /**
     * Ejecuta el seeder.
     *
     * @return void
     */
    public function run()
    {
        Tablon::factory()->count(30)->create();
    }
}
