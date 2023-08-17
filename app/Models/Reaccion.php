<?php

// app/Models/Reaccion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaccion extends Model
{
    use HasFactory;
    protected $table = 'reacciones';

    protected $fillable = [
        'usuario_id',
        'publicacion_id',
        'me_gusta',
        'favoritos',
    ];

    // Relación con el modelo User (Usuario)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relación con el modelo Publicacion (Publicación)
    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class, 'publicacion_id');
    }
}
