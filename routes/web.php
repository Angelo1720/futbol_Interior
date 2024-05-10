<?php

use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorUsuario;
use App\Http\Controllers\EquipoController;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/usuarios', [ControladorUsuario::class, 'index'])->middleware('auth')->name('usuarios');
Route::get('/usuarios/admin/listado/', [ControladorUsuario::class, 'getUsers'])->middleware('auth')->name('usuarios.getUsers');
Route::get('/usuarios/admin/crear', [controladorUsuario::class, 'create'])->middleware('auth')->name('usuarios.create');
Route::post('/usuarios/admin/guardar', [controladorUsuario::class, 'store'])->middleware('auth')->name('usuarios.store');
Route::get('/usuarios/admin/editar/{id}', [controladorUsuario::class, 'edit'])->middleware('auth')->name('usuarios.edit');
Route::put('/usuarios/{id}', [controladorUsuario::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [controladorUsuario::class, 'delete'])->middleware('auth')->name('usuarios.eliminar');


Route::get('/equipos', [EquipoController::class, 'index'])->middleware('auth')->name('equipos');
Route::get('/equipos/admin/listado', [EquipoController::class, 'getEquipos'])->middleware('auth')->name('equipos.getEquipos');

Route::get('/equipos/admin/crear', [EquipoController::class, 'create'])->middleware('auth')->name('equipos.create');
Route::post('/equipos/admin/guardar', [EquipoController::class, 'store'])->middleware('auth')->name('equipos.store');
Route::get('/equipos/admin/editar/{id}', [EquipoController::class, 'edit'])->middleware('auth')->name('equipos.edit');
Route::put('/equipos/{id}', [EquipoController::class, 'update'])->name('equipos.update');

Route::get('/campeonatos', [CampeonatoController::class, 'index'])->middleware('auth')->name('campeonatos');
Route::get('/campeonatos/listado', [CampeonatoController::class, 'getCampeonatos'])->middleware('auth')->name('campeonatos.getCampeonatos');
Route::get('/campeonatos/crear', [CampeonatoController::class, 'create'])->middleware('auth')->name('campeonatos.create');
Route::post('/campeonatos/guardar', [CampeonatoController::class, 'store'])->middleware('auth')->name('campeonatos.store');
Route::get('/campeonatos/admin/editar/{id}', [CampeonatoController::class, 'edit'])->middleware('auth')->name('campeonatos.edit');
Route::put('/campeonatos/{id}', [CampeonatoController::class, 'update'])->name('campeonatos.update');
Route::delete('/campeonatos/{id}', [CampeonatoController::class, 'delete'])->middleware('auth')->name('campeonatos.eliminar');

require __DIR__ . '/auth.php';