<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educacion extends Model
{
    use HasFactory;
    protected $table = 'educacion';
    protected $fillable = [
        'usuario_id',
        'institucion',
        'titulo',
        'duracion',
    ];

    // Relación con el modelo de Usuario (User)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}