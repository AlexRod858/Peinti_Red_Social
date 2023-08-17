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
        Schema::create('reacciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('publicacion_id');
            $table->unsignedInteger('me_gusta')->default(0);
            $table->unsignedInteger('favoritos')->default(0);
            $table->timestamps();

            // Claves foráneas para vincular la reacción al usuario y a la publicación correspondiente
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('publicacion_id')->references('id')->on('publicaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reacciones');
    }
};
