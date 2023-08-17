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
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id_receptor'); // Usuario que recibe el mensaje
            $table->unsignedBigInteger('usuario_id_emisor');   // Usuario que envía el mensaje
            $table->text('mensaje'); // Contenido del mensaje
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
        Schema::dropIfExists('mensajes');
    }
};
