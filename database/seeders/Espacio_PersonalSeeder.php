<?php

namespace Database\Seeders;

use App\Models\Espacio_personal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Espacio_PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Espacio_personal::factory()->count(10)->create();
    }
}
