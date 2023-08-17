<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    protected $table = 'mensajes';

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
}
