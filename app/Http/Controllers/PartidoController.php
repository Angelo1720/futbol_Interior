<?php

namespace App\Http\Controllers;

use App\Models\Edicion;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PartidoController extends Controller
{
    public function create($idEdicion)
    {
        $edicion = Edicion::find($idEdicion);
        $equiposParticipantes = $edicion->equiposParticipantes();
        $equiposJugadores = Equipo::traerJugadores();
        return view('partidos.create', compact('edicion', 'equiposParticipantes', 'equiposJugadores'));
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
