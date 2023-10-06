<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espacio_personal extends Model
{
    use HasFactory;
    protected $table = 'espacio_personal';
    protected $fillable = [
        'usuario_id',
        'titulo',
        'url',
    ];


    // Relación con el modelo de Usuario (User)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }



}
