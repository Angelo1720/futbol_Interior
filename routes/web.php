<?php

use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorUsuario;
use App\Http\Controllers\EdicionController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorHistoricoController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PartidoController;

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
    return view('dashboard');
})->name('dashboard');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

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

Route::get('/ediciones/crear/{idCampeonato}', [EdicionController::class, 'create'])->middleware('auth')->name('ediciones.create');
Route::get('/ediciones/{idCampeonato}', [EdicionController::class, 'index'])->middleware('auth')->name('ediciones.index');
Route::post('/ediciones/guardar', [EdicionController::class, 'store'])->middleware('auth')->name('ediciones.store');
Route::get('/ediciones/admin/editar/{id}', [EdicionController::class, 'edit'])->middleware('auth')->name('ediciones.edit');
Route::get('/ediciones/listado/{idCampeonato}', [EdicionController::class, 'getEdiciones'])->middleware('auth')->name('ediciones.getEdiciones');
Route::get('/ediciones/campeon/{idCampeonato}', [EdicionController::class, 'getEdicionesConCampeon'])->middleware('auth')->name('ediciones.getEdicionesConCampeon');
Route::post('/ediciones/setEdicionEquipo/{idEdicion}', [EdicionController::class, 'setEdicion_Equipo'])->middleware('auth')->name('ediciones.setEdicionEquipo');
Route::get('/ediciones/admin/editarInfo/{id}', [EdicionController::class, 'editInfo'])->middleware('auth')->name('ediciones.editInfo');
Route::put('/ediciones/{id}', [EdicionController::class, 'update'])->name('ediciones.update');
Route::delete('/ediciones/{id}', [EdicionController::class, 'deleteEdicion_Equipo'])->middleware('auth')->name('ediciones.deleteEdicionEquipo');

Route::get('/historicos', [JugadorHistoricoController::class, 'index'])->middleware('auth')->name('historicos');
Route::get('/historicos/admin/listado', [JugadorHistoricoController::class, 'getHistoricos'])->middleware('auth')->name('historicos.getHistoricos');
Route::get('/historicos/crear', [JugadorHistoricoController::class, 'create'])->middleware('auth')->name('historicos.create');
Route::post('/historicos/guardar', [JugadorHistoricoController::class, 'store'])->middleware('auth')->name('historicos.store');
Route::get('/historicos/admin/editar/{id}', [JugadorHistoricoController::class, 'edit'])->middleware('auth')->name('historicos.edit');
Route::put('/historicos/{id}', [JugadorHistoricoController::class, 'update'])->name('historicos.update');
Route::delete('/historicos/{id}', [JugadorHistoricoController::class, 'delete'])->middleware('auth')->name('historicos.eliminar');
Route::get('/listadoHistoricos', [JugadorHistoricoController::class, 'listadoHistoricos'])->name('historicos.guest');
Route::get('/ediciones/admin/editarInfo/{id}', [EdicionController::class, 'editInfo'])->middleware('auth')->name('ediciones.editInfo');
Route::put('/ediciones/{id}', [EdicionController::class, 'update'])->name('ediciones.update');
Route::delete('/ediciones/{id}', [EdicionController::class, 'deleteEdicion_Equipo'])->middleware('auth')->name('ediciones.deleteEdicionEquipo');

Route::get('/partidos/crear/{idEdicion}', [PartidoController::class, 'create'])->middleware('auth')->name('partidos.create');
Route::post('/partidos/guardar/{idEdicion}', [PartidoController::class, 'store'])->middleware('auth')->name('partidos.store');

Route::get('/jugadores/crear/{idEquipo}', [JugadorController::class, 'create'])->middleware('auth')->name('jugadores.create');
Route::post('/jugadores/guardar/{idEquipo}', [JugadorController::class, 'store'])->middleware('auth')->name('jugadores.store');
Route::get('/jugadores/{id}', [JugadorController::class, 'index'])->middleware('auth')->name('jugadores.index');
Route::get('/jugadores/admin/listado{idEquipo}', [JugadorController::class, 'getJugadores'])->middleware('auth')->name('jugadores.getJugadores');
Route::get('/jugadores/admin/editar/{id}', [JugadorController::class, 'edit'])->middleware('auth')->name('jugadores.edit');
Route::post('/jugadores/setJugadorEquipo/{idEquipo}', [JugadorController::class, 'setJugador_Equipo'])->middleware('auth')->name('jugadores.setJugadorEquipo');
Route::delete('/jugadores/deleteJugadorEquipo/{id}', [JugadorController::class, 'deleteJugador_Equipo'])->middleware('auth')->name('jugadores.deleteJugadorEquipo');
Route::get('/jugadores/admin/editar/{id}', [JugadorController::class, 'edit'])->middleware('auth')->name('jugadores.edit');
Route::put('/jugadores/{id}', [JugadorController::class, 'update'])->name('jugadores.update');

Route::get('/listadoEquipos', [EquipoController::class, 'listadoEquipos'])->name('equipos.guest');
Route::get('/listadoCampeonatos', [CampeonatoController::class, 'listadoCampeonatos'])->name('campeonatos.guest');
Route::get('/campeonatosDivision-A', [CampeonatoController::class, 'divisionA'])->name('div-A.guest');
Route::get('/campeonatosDivision-B', [CampeonatoController::class, 'divisionB'])->name('div-B.guest');
Route::get('/campeonatosDivision-C', [CampeonatoController::class, 'divisionC'])->name('div-C.guest');

require __DIR__ . '/auth.php';