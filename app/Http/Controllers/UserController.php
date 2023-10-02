<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
//
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Amistad;
use App\Models\Educacion;
use App\Models\Experiencia;
use App\Models\Reaccion;
use App\Models\Tablon;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class UserController extends Controller
{
    //

    /////////////////////////////////////////////////////
    /////////////////////////////////////////////////////
    ///////////////  D A S H B O A R D  /////////////////
    /////////////////////////////////////////////////////

    public function dashboard()
    {
        // Obtener el usuario logueado
        $user = Auth::user();

        // Obtener la información asociada al usuario
        $nombre = $user->name;
        $apellido1 = $user->apellido1;
        $apellido2 = $user->apellido2;
        $invitaciones = $user->invitaciones;
        $estado = $user->estado;
        $visitas = $user->num_visitas;
        $fotoperfil = $user->fotoperfil;

        // Obtener los estudios y experiencias asociados al usuario
        $estudios = $user->educacion;
        $experiencias = $user->experiencia;

        // Obtener las relaciones de amistad del usuario actual donde él es el emisor o receptor y el estado es 'aceptada'
        $amigosComoEmisor = Amistad::where('usuario_id_emisor', $user->id)
            ->where('estado', 'aceptada')
            ->pluck('usuario_id_receptor');

        $amigosComoReceptor = Amistad::where('usuario_id_receptor', $user->id)
            ->where('estado', 'aceptada')
            ->pluck('usuario_id_emisor');

        // Combinar los IDs de amigos
        $amigosIDs = $amigosComoEmisor->merge($amigosComoReceptor);

        // Obtener la fecha hace una semana a partir de la fecha actual
        $haceUnaSemana = Carbon::now()->subWeek();

        // Obtener las publicaciones de los amigos del usuario realizadas en la última semana
        $publicacionesAmigos = Publicacion::whereIn('usuario_id', $amigosIDs)
            // ->where('created_at', '>=', $haceUnaSemana)
            ->orderByDesc('created_at')
            ->get();
        ////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////
        $amigosdeamigoComoEmisor = Amistad::whereIn('usuario_id_emisor', $amigosIDs)
            ->where('estado', 'aceptada')
            ->where('usuario_id_receptor', '!=', $user->id) // Excluir el ID del usuario actual
            ->pluck('usuario_id_receptor');

        $amigosdeamigoComoReceptor = Amistad::whereIn('usuario_id_receptor', $amigosIDs)
            ->where('estado', 'aceptada')
            ->where('usuario_id_emisor', '!=', $user->id) // Excluir el ID del usuario actual
            ->pluck('usuario_id_emisor');

        // Combinar los IDs de amigos
        $amigosDeAmigosIds = $amigosdeamigoComoEmisor->merge($amigosdeamigoComoReceptor);
        // Obtener los datos completos de los amigos de amigos
        $amigosDeAmigos = User::whereIn('id', $amigosDeAmigosIds)->get();
        ////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////

        $me_gusta = Reaccion::all();
        $favorito = Reaccion::all();
        ////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////
        // dd($amigosIDs);
        return view('dashboard', compact('nombre', 'apellido1', 'apellido2', 'invitaciones', 'estado', 'visitas', 'estudios', 'experiencias', 'publicacionesAmigos', 'amigosDeAmigos', 'fotoperfil','me_gusta','favorito'));
    }



    public function enviarSolicitudAmistad($id)
    {
        // Obtener el usuario logueado
        $user = auth()->user();

        // Verificar si ya existe una solicitud de amistad pendiente entre el usuario logueado y el receptor
        $solicitudExistente = Amistad::where(function ($query) use ($user, $id) {
            $query->where('usuario_id_emisor', $user->id)
                ->where('usuario_id_receptor', $id);
        })->orWhere(function ($query) use ($user, $id) {
            $query->where('usuario_id_emisor', $id)
                ->where('usuario_id_receptor', $user->id);
        })->exists();

        // Si no existe una solicitud pendiente, crear una nueva solicitud
        if (!$solicitudExistente) {
            Amistad::create([
                'usuario_id_emisor' => $user->id,
                'usuario_id_receptor' => $id,
                'estado' => 'pendiente',
            ]);

            // Redirigir a la página del perfil con un mensaje de éxito
            return redirect()->route('verperfil', ['id' => $id])
                ->with('success', 'Solicitud de amistad enviada exitosamente.');
        }

        // Si ya existe una solicitud pendiente, redirigir a la página del perfil sin realizar cambios
        return redirect()->route('dashboard')
            ->with('error', 'Error al enviar la solicitud de amistad. La solicitud ya existe.');
    }

    /////////////////////////////////////////////////////
    /////////////////////////////////////////////////////
    /////////////////////////////////////////////////////
    /////////////////////////////////////////////////////
    public function actualizarEstado(Request $request)
    {
        $user = Auth::user();
        $user->estado = $request->input('estado');
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Estado actualizado correctamente');
    }


    /////////////////////////////////////////////////////
    /////////////////////////////////////////////////////
    /////////////////  P E R F I L  /////////////////////
    /////////////////////////////////////////////////////


    public function perfil(Request $request)
    {

        // Obtener el usuario logueado
        $user = Auth::user();
        // $userAmigo = User::find($id);
        // Obtener la información asociada al usuario
        $nombre = $user->name;
        $apellido1 = $user->apellido1;
        $apellido2 = $user->apellido2;
        $estado = $user->estado;
        $fotoperfil = $user->fotoperfil;

        // Obtener los estudios y experiencias asociados al usuario
        $experiencias = Experiencia::whereIn('usuario_id', [$user->id])->get();
        $educaciones = Educacion::whereIn('usuario_id', [$user->id])->get();
        $tablones = Tablon::whereIn('usuario_id_receptor', [$user->id])->get();
        ///
        // $mensajesTablon = Tablon::where('usuario_id_receptor', $userAmigo->id)
        //     ->with('emisor') // Cargar la relación 'emisor' para evitar consultas adicionales
        //     ->get();

        return view('perfil', compact('nombre', 'apellido1', 'apellido2', 'estado', 'experiencias', 'educaciones', 'tablones', 'fotoperfil'));
    }



    /////////////////////////////////////////////////
    /////////////////////////////////////////////////
    //////////////////  G E N T E  //////////////////
    /////////////////////////////////////////////////

    public function gente()
    {
        // Obtener el usuario logueado
        $user = Auth::user();

        // Obtener los IDs de los amigos en los que el usuario logueado es receptor
        $amigosReceptorIDs = Amistad::where('usuario_id_receptor', $user->id)
            ->where('estado', 'aceptada')
            ->pluck('usuario_id_emisor')
            ->toArray();

        // Obtener los IDs de los amigos en los que el usuario logueado es emisor
        $amigosEmisorIDs = Amistad::where('usuario_id_emisor', $user->id)
            ->where('estado', 'aceptada')
            ->pluck('usuario_id_receptor')
            ->toArray();

        // Combinar los dos arrays de IDs de amigos
        $amigosIDs = array_unique(array_merge($amigosReceptorIDs, $amigosEmisorIDs));

        // Obtener los usuarios que son amigos del usuario logueado
        $amigos = User::whereIn('id', $amigosIDs)->get();


        // dd($amigos);

        return view('gente', compact('amigos'));
    }

    public function eliminarAmigo($id)
    {
        // Obtener el usuario logueado
        $user = auth()->user();

        // Buscar la amistad entre el usuario logueado y el amigo a eliminar
        $amistad = Amistad::where(function ($query) use ($user, $id) {
            $query->where('usuario_id_emisor', $user->id)
                ->where('usuario_id_receptor', $id);
        })->orWhere(function ($query) use ($user, $id) {
            $query->where('usuario_id_emisor', $id)
                ->where('usuario_id_receptor', $user->id);
        })->first();

        // Verificar si la amistad existe
        if ($amistad) {
            // Eliminar la amistad
            $amistad->delete();

            // Redirigir a la página del perfil con un mensaje de éxito
            return redirect()->route('perfil', ['id' => $id])
                ->with('success', 'Amigo eliminado exitosamente.');
        }

        // Si la amistad no existe, redirigir a la página del perfil sin realizar cambios
        return redirect()->route('perfil', ['id' => $id])
            ->with('error', 'Error al eliminar amigo. La amistad no existe.');
    }


    /////////////////////////////////////////////////
    /////////////////////////////////////////////////
    /////////////////////////////////////////////////
    /////////////////////////////////////////////////
    /////////  P E R F I L E S  A J E N O S  ////////
    /////////////////////////////////////////////////
    /////////////////////////////////////////////////
    /////////////////////////////////////////////////
    /////////////////////////////////////////////////



    public function verPerfil($id)
    {
        /////////////////////////////////
        // Obtener el usuario logueado
        $user = Auth::user();


        // Obtener el usuario correspondiente al ID proporcionado
        $userAmigo = User::find($id);
        // Verificar si el usuario existe
        if (!$userAmigo) {
            abort(404); // Mostrar página de error 404 si el usuario no existe
        }
        // Incrementar el contador de visitas
        $userAmigo->increment('num_visitas');

        // Obtener la información asociada al usuario
        $miFotoperfil = $user->fotoperfil;
        $fotoperfil = $userAmigo->fotoperfil;
        $nombre = $userAmigo->name;
        $apellido1 = $userAmigo->apellido1;
        $apellido2 = $userAmigo->apellido2;
        $estado = $userAmigo->estado;

        // Obtener los estudios y experiencias asociados al usuario
        $experiencias = Experiencia::whereIn('usuario_id', [$userAmigo->id])
            ->get();
        $educaciones = Educacion::whereIn('usuario_id', [$userAmigo->id])
            ->get();
        $mensajesTablon = Tablon::where('usuario_id_receptor', $userAmigo->id)
            ->with('emisor') // Cargar la relación 'emisor' para evitar consultas adicionales
            ->get();

        // Pasar el usuario a la vista para mostrar sus datos en el perfil
        return view('perfil_ajeno', compact('userAmigo', 'nombre', 'apellido1', 'apellido2', 'estado', 'experiencias', 'educaciones', 'mensajesTablon', 'miFotoperfil', 'fotoperfil'));
    }
}
