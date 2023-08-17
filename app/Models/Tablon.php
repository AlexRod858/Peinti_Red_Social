<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablon extends Model
{
    use HasFactory;

    protected $table = 'tablon';

    protected $fillable = [
        'usuario_id_receptor',
        'usuario_id_emisor',
        'mensaje',
    ];

    public function receptor()
    {
        return $this->belongsTo(User::class, 'usuario_id_receptor');
    }

    public function emisor()
    {
        return $this->belongsTo(User::class, 'usuario_id_emisor');
    }

    // public function publicacion()
    // {
    //     return $this->belongsTo(Publicacion::class);
    // }
}
