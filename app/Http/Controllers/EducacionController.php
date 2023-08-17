<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Educacion;
use Illuminate\Support\Facades\Auth;


class EducacionController extends Controller
{
    //
    public function añadirEducacion(Request $request)
    {
        // Validar el formulario de añadir experiencia
        $request->validate([
            'institucion' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'duracion' => 'required|string|max:20',
        ]);
    
        // Procesar el formulario y guardar la experiencia en la base de datos
        Educacion::create([
            'institucion' => $request->input('institucion'),
            'titulo' => $request->input('titulo'),
            'duracion' => $request->input('duracion'),
            'usuario_id' => Auth::id(), // Asignar el ID del usuario logueado como clave foránea
        ]);
    
        // Redirigir a la página de perfil con un mensaje de éxito
        return redirect()->route('perfil')->with('success', 'Educación añadida exitosamente.');
    }
}
