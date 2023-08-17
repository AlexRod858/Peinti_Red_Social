<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publicacion extends Model
{
    use HasFactory;
    protected $table = 'publicaciones';

    protected $fillable = [
        'usuario_id',
        'foto',
        'titulo',
        'medidas',
        'descripcion',
        'fecha',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // /////////////////////////
    // public function getPublicacionUrl()
    // {
    //     return route('publicacion.show', $this->id);
    // }
}
