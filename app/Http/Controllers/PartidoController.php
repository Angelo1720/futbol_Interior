<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function create($idEdicion)
    {
        //$edicion = Edicion::find($idEdicion);
        return view('partido.create', compact('edicion'));
    }
}
