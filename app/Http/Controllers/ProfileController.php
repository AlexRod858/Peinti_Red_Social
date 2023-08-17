<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    //////////////////////////////////////////////////////
    //////////////////////////////////////////////////////
    ////////////// F O T O  P E R F I L //////////////////
    //////////////////////////////////////////////////////
    public function updatePhoto(Request $request)
    {
        $user = Auth::user();
    
        // Verificar si se envió una nueva foto de perfil
        if ($request->hasFile('photo')) {
            // Validar la solicitud para asegurarse de que se subió una imagen
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta las reglas de validación según tus necesidades
            ]);
    
            // Obtener el archivo de la solicitud
            $file = $request->file('photo');
            // Almacenar la imagen en la carpeta del usuario con el nombre "profile.jpg"
            $file->storeAs('public/' . $user->id, 'profile.jpg');
            // Actualizar el campo 'fotoperfil' en la tabla de usuarios con la URL completa de la imagen
            $user->fotoperfil = asset('storage/' . $user->id . '/profile.jpg');
            $user->save();
        }
    
        return redirect()->route('perfil')->with('status', 'Foto actualizada exitosamente.');
    }
    
    
}
