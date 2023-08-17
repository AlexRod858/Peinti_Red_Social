<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reaccion;

class ReaccionSeeder extends Seeder
{
    public function run()
    {
        Reaccion::factory()->count(200)->create();
    }
}
