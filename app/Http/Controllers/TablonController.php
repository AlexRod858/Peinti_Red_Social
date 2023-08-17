<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tablon;


class TablonController extends Controller
{
    //

    public function enviarMensaje(Request $request)
    {
        // Validar el formulario de envío de mensaje
        $request->validate([
            'mensaje' => 'required|string|max:255',
            'usuario_id_receptor' => 'required', // Asegúrate de que el ID del usuario receptor existe en la tabla de usuarios
        ]);

        // Obtener el ID del usuario emisor (el usuario logueado)
        $usuario_id_emisor = auth()->user()->id;

        // Crear el mensaje en el tablón
        Tablon::create([
            'mensaje' => $request->input('mensaje'),
            'usuario_id_emisor' => $usuario_id_emisor,
            'usuario_id_receptor' => $request->input('usuario_id_receptor'),
        ]);

        $usuario_id_receptor = $request->input('usuario_id_receptor');

        // Redirigir a la página del perfil con un mensaje de éxito
        return redirect()->route('verperfil', ['id' => $usuario_id_receptor])
            ->with('success', 'Mensaje enviado exitosamente.');
    }
}
