<?php

namespace App\Http\Controllers;

use App\Models\Edicion;
use App\Models\Equipo;
use App\Models\Partido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        $edicion = Edicion::find($idEdicion);
        try {
            $request->validate([
                'fechaPartido' => ['required', 'date', 'max:16'],
                'nroJornada' => ['required', 'integer'],
                'nombreJornada' => ['string', 'max:40'],
                'nomEquipoLocal' => ['required', 'string'],
                'nomEquipoVisitante' => ['required', 'string'],
                'dataEquipoLocal' => ['required', 'json'],
                'dataEquipoVisitante' => ['required', 'json']
            ]);

            Partido::create([
                'idEdicion' => $idEdicion,
                'fecha' => $request->input('fechaPartido'),
                'nroJornada' => $request->input('nroJornada'),
                'nombreJornada' => $request->input('nombreJornada'),
                'nomEquipoLocal' => $request->input('nomEquipoLocal'),
                'nomEquipoVisitante' => $request->input('nomEquipoVisitante'),
                'dataEquipoLocal' => $request->input('dataEquipoLocal'),
                'dataEquipoVisitante' => $request->input('dataEquipoVisitante')
            ]);
            if (Auth::user()) {
                return redirect()->route('ediciones.edit', ['idEdicion' => $edicion->id])->with('success', 'Partido creado correctamente.');
            }
        } catch (ValidationException $e) {
            Log::error('Error al crear partido: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
