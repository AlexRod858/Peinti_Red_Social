<?php

use Illuminate\Support\Facades\Route;
// 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExperienciaController;
use App\Http\Controllers\EducacionController;
use App\Http\Controllers\TablonController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\Espacio_PersonalController;
use App\Models\Espacio_personal;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});



Route::get('/dashboard', [UserController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// EMPEZAMOS
/////////////////////////////////////
/////////////////////////////////////
Route::get('/perfil', [UserController::class, 'perfil'])
    ->middleware(['auth', 'verified'])
    ->name('perfil');

Route::post('/actualizar_foto', [ProfileController::class, 'updatePhoto'])
    ->middleware(['auth', 'verified'])
    ->name('actualizar_foto');
//
/////////////////////////////////////
/////////////////////////////////////


/////////////////////////////////////
/////////////////////////////////////
Route::get('/gente', [UserController::class, 'gente'])
    ->middleware(['auth', 'verified'])
    ->name('gente');
//
Route::delete('/eliminar-amigo/{id}', [UserController::class, 'eliminarAmigo'])
    ->middleware(['auth', 'verified'])
    ->name('eliminar_amigo');
//
Route::post('/enviar-solicitud/{id}', [UserController::class, 'enviarSolicitudAmistad'])
    ->middleware(['auth', 'verified'])
    ->name('enviar_solicitud_amistad');
/////////////////////////////////////
/////////////////////////////////////
Route::get('/obras', [PublicacionController::class, 'obras'])
    ->middleware(['auth', 'verified'])
    ->name('obras');
/////////////////////////////////////
/////////////////////////////////////
Route::post('/añadir_experiencia', [ExperienciaController::class, 'añadirExperiencia'])
    ->middleware(['auth', 'verified'])
    ->name('añadir_experiencia');
//
Route::post('/añadir_educacion', [EducacionController::class, 'añadirEducacion'])
    ->middleware(['auth', 'verified'])
    ->name('añadir_educacion');
/////////////////////////////////////
/////////////////////////////////////
Route::get('/perfil/{id}', [UserController::class, 'verPerfil'])
    ->middleware(['auth', 'verified'])
    ->name('verperfil');
/////////////////////////////////////
/////////////////////////////////////
Route::post('/enviar-mensaje', [TablonController::class, 'enviarMensaje'])
    ->middleware(['auth', 'verified'])
    ->name('enviar_mensaje');
/////////////////////////////////////
/////////////////////////////////////
/////////////////////////////////////
/////////////////////////////////////

Route::get('/publicacion/{id}', [PublicacionController::class, 'verPublicacion'])
    ->middleware(['auth', 'verified'])
    ->name('ver_publicacion');

/////////////////////////////////////
/////////////////////////////////////
/////////////////////////////////////
/////////////////////////////////////
Route::post('/actualizar-estado', [UserController::class, 'actualizarEstado'])->name('actualizar-estado');
//
// Route::get('/show', function () {
//     return view('show');
// })->middleware(['auth', 'verified'])->name('show');

// ////////////////
require __DIR__ . '/auth.php';
