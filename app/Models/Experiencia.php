<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    use HasFactory;
    protected $table = 'experiencia';
    protected $fillable = [
        'usuario_id',
        'empresa',
        'rol',
        'duracion',
    ];

    // Relación con el modelo de Usuario (User)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}