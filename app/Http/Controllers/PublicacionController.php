<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Auth;



class PublicacionController extends Controller
{
    //
    /////////////////////////////////////////////////
    /////////////////////////////////////////////////
    //////////////////  O B R A S  //////////////////
    /////////////////////////////////////////////////

    public function obras()
    {
        $user = Auth::user();
        // Obtener las publicaciones del usuario logueado
        $publicaciones = Publicacion::where('usuario_id', $user->id)
            ->get();

        return view('obras', compact('publicaciones'));
    }

    /////////////////////////////////////////////////
    /////////////////////////////////////////////////
    ////////////  P U B L I C A C I O N  ////////////
    /////////////////////////////////////////////////
    public function verPublicacion($id)
    {
        $user = Auth::user();
        // Obtener la publicación correspondiente al ID proporcionado
        $publicacion = Publicacion::findOrFail($id);
        $comentario = Comentario::where('publicacion_id', $publicacion->id)
        ->get();

        return view('publicacion', compact('publicacion','comentario'));
    }
}
