<?php

namespace App\Http\Controllers;

use App\Models\Edicion;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PartidoController extends Controller
{
    public function create($idEdicion)
    {
        $edicion = Edicion::find($idEdicion);
        return view('partidos.create', compact('edicion'));
    }

    public function store(Request $request, $idEdicion)
    {
        try {
            $request->validate([
                'fecha' => ['required', 'string', 'max:10'],
                'nroJornada' => ['required', 'integer'],
                'nombreJornada' => ['string', 'max:80'],
            ]);
        } catch (\Throwable $th) {
            
        }
    }
}
