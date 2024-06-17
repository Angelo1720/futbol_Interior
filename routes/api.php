<?php

use App\Http\Controllers\EquipoController;
use App\Models\ClientToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/generateToken', function (Request $request) {
    $clientToken = ClientToken::create([
        'tokenable_id' => null, // Set to null for client tokens
        'name' => 'client-token',
        'token' => 'your-client-token', // Generate a unique token for each client
    ]);
    return $clientToken;
});

Route::get('/listadoEquipos', [EquipoController::class, 'apiListadoEquipos']);