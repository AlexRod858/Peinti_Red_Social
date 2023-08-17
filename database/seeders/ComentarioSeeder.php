<?php

namespace Database\Seeders;

use App\Models\Comentario;
use Illuminate\Database\Seeder;

class ComentarioSeeder extends Seeder
{
    public function run()
    {
        Comentario::factory()->count(100)->create();
    }
}
