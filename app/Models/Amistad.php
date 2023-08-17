<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amistad extends Model
{
    use HasFactory;

    protected $table = 'amistad';

    protected $fillable = [
        'usuario_id_receptor',
        'usuario_id_emisor',
        'estado',
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
