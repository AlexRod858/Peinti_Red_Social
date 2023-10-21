<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Experiencia;
use App\Models\Educacion;
use App\Models\Tablon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
{
    $this->call([
        UsersTableSeeder::class,
        ExperienciaSeeder::class,
        EducacionSeeder::class,
        TablonSeeder::class,
        MensajeSeeder::class,
        AmistadSeeder::class,
        PublicacionSeeder::class,
        ComentarioSeeder::class,
        ReaccionSeeder::class,
        Espacio_PersonalSeeder::class,
        // Agrega otros seeders aquí si los tienes
    ]);
}

}
