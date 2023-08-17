<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('amistad', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id_receptor'); // Usuario que recibe la solicitud de amistad
            $table->unsignedBigInteger('usuario_id_emisor');   // Usuario que envía la solicitud de amistad
            $table->enum('estado', ['pendiente', 'aceptada', 'rechazada'])->default('pendiente'); // Estado de la solicitud de amistad
            $table->timestamps();

            // Define las claves foráneas para la relación con la tabla de usuarios
            $table->foreign('usuario_id_receptor')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usuario_id_emisor')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('amistad');
    }
};
