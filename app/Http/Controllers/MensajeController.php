<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    /////////////////////////////////////////////////
    /////////////////////////////////////////////////
    ////////////////  M E N S A J E S  //////////////
    /////////////////////////////////////////////////


    public function mensajes()
    {
        // Obtener el usuario logueado
        $user = Auth::user();

        // Obtener la información asociada al usuario
        $nombre = $user->name;
        $apellido1 = $user->apellido1;

        $idsUsuariosEmisor = Mensaje::where('usuario_id_emisor', $user->id)
            ->distinct()
            ->pluck('usuario_id_receptor');

        $idsUsuariosReceptor = Mensaje::where('usuario_id_receptor', $user->id)
            ->distinct()
            ->pluck('usuario_id_emisor');

        $idsUsuarios = $idsUsuariosEmisor->merge($idsUsuariosReceptor)->unique();

        $chatsAbiertos = User::whereIn('id', $idsUsuarios)->get();


        // Obtener los mensajes de cada conversación
        foreach ($chatsAbiertos as $usuario) {
            $conversacion = Mensaje::where(function ($query) use ($user, $usuario) {
                $query->where('usuario_id_emisor', $user->id)
                    ->where('usuario_id_receptor', $usuario->id);
            })->orWhere(function ($query) use ($user, $usuario) {
                $query->where('usuario_id_emisor', $usuario->id)
                    ->where('usuario_id_receptor', $user->id);
            })->get();

            $usuario->conversacion = $conversacion;
        }

        return view('mensajes', compact('nombre', 'apellido1', 'chatsAbiertos'));
    }

    /////////////////////////////////////////////////
    /////////////////////////////////////////////////
    //
    public function verMensajesConUsuario($id)
    {
        // Obtén los mensajes entre el usuario logueado y el usuario con el ID proporcionado
        $mensajes = Mensaje::where(function ($query) use ($id) {
            $query->where('usuario_id_emisor', auth()->user()->id)
                ->where('usuario_id_receptor', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('usuario_id_emisor', $id)
                ->where('usuario_id_receptor', auth()->user()->id);
        })->get();

        // Obtén la información del usuario con el ID proporcionado
        $usuario = User::findOrFail($id);


        // Obtener el usuario logueado
        $user = Auth::user();

        // Obtener la información asociada al usuario
        $nombre = $user->name;
        $apellido1 = $user->apellido1;

        // Obtener los IDs de usuarios con los que el usuario logueado tiene conversaciones
        $idsUsuarios = Mensaje::where('usuario_id_emisor', $user->id)
            ->orWhere('usuario_id_receptor', $user->id)
            ->distinct()
            ->pluck('usuario_id_emisor')
            ->merge(Mensaje::where('usuario_id_receptor', $user->id)
                ->distinct()
                ->pluck('usuario_id_receptor'))
            ->unique();

        // Obtener los usuarios correspondientes a los IDs de usuario
        $chatsAbiertos = User::whereIn('id', $idsUsuarios)->get();

        // Obtener los mensajes de cada conversación
        foreach ($chatsAbiertos as $usuario) {
            $conversacion = Mensaje::where(function ($query) use ($user, $usuario) {
                $query->where('usuario_id_emisor', $user->id)
                    ->where('usuario_id_receptor', $usuario->id);
            })->orWhere(function ($query) use ($user, $usuario) {
                $query->where('usuario_id_emisor', $usuario->id)
                    ->where('usuario_id_receptor', $user->id);
            })->get();

            $usuario->conversacion = $conversacion;
        }

        return view('chat', compact('usuario', 'mensajes', 'chatsAbiertos'));
    }
}
