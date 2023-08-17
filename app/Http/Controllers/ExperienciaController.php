<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Experiencia;


class ExperienciaController extends Controller
{
    //

    public function añadirExperiencia(Request $request)
    {
        // Validar el formulario de añadir experiencia
        $request->validate([
            'rol' => 'required|string|max:255',
            'empresa' => 'required|string|max:255',
            'duracion' => 'required|string|max:255',
        ]);
    
        // Procesar el formulario y guardar la experiencia en la base de datos
        Experiencia::create([
            'rol' => $request->input('rol'),
            'empresa' => $request->input('empresa'),
            'duracion' => $request->input('duracion'),
            'usuario_id' => Auth::id(), // Asignar el ID del usuario logueado como clave foránea
        ]);
    
        // Redirigir a la página de perfil con un mensaje de éxito
        return redirect()->route('perfil')->with('success', 'Experiencia añadida exitosamente.');
    }
}
