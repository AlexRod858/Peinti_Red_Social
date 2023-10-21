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
        Schema::create('espacio_personal', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // 
            $table->unsignedBigInteger('usuario_id');
            $table->string('titulo')->nullable();
            $table->text('url')->nullable();
            $table->text('descripcion')->nullable();

            // Claves foráneas para vincular la reacción al usuario y a la publicación correspondiente
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('espacio_personal');
    }
};
