<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorUsuario;

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
Route::get('/usuarios/admin/crear', [controladorUsuario::class, 'create'])->name('usuarios.create');
Route::post('/usuarios/admin/guardar', [controladorUsuario::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/admin/{id}/editar', [controladorUsuario::class, 'edit'])->middleware('auth')->name('usuarios.edit');


require __DIR__ . '/auth.php';