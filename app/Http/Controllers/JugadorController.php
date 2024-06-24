<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Jugador;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class JugadorController extends Controller
{
    public function create($idEquipo)
    {
        $equipo = Equipo::findOrFail($idEquipo);
        return view('jugadores.create', compact('equipo'));
    }

    public function store(Request $request, $idEquipo)
    {
        try {
            $request->validate([
                'nameJugador' => ['required', 'string', 'max:40'],
                'apellidoJugador' => ['required', 'string', 'max:80'],
                'fechaNacimiento' => ['required', 'string', 'max:10'],
                'posicion' => ['required'],
            ]);
            Jugador::create([
                'idEquipo' => $idEquipo,
                'nombre' => $request['nameJugador'],
                'apellido' => $request['apellidoJugador'],
                'fechaNacimiento' => $request['fechaNacimiento'],
                'posicion' => $request['posicion'],
                'goles' => 0,
                'partidosJugados' => 0,
            ]);
            if (Auth::user()) {
                return redirect()->route('jugadores.index', ['id' => $idEquipo])->with('success', 'Jugador creado correctamente.');
            }
        } catch (ValidationException $e) {
            Log::error('Error al crear jugador: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function index(Request $request, $idEquipo)
    {
        try {
            $equipo = Equipo::findOrFail($idEquipo);
            $jugadores = $equipo->jugadores;
            $jugadoresNotInEquipo = Jugador::jugadoresNotInEquipo($idEquipo);
            return view('jugadores.index', compact('equipo', 'jugadores', 'jugadoresNotInEquipo'));
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function getJugadores(Request $request, $idEquipo)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $idEquipo; // Search value

        // Total records
        $totalRecords = Jugador::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Jugador::select('count(*) as allcount')->where('idEquipo', $searchValue)->count();

        // Fetch records
        $records = Jugador::orderBy($columnName, $columnSortOrder)
            ->where('idEquipo', $searchValue)
            ->select('jugadores.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $nombre = $record->nombre . " " . $record->apellido;
            $fechaNacimiento = $record->fechaNacimiento;
            $posicion = $record->posicion;

            $data_arr[] = array(
                "id" => $id,
                "nombre" => $nombre,
                "posicion" => $posicion,
                "fechaNacimiento" => $fechaNacimiento
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }

    public function edit($idJugador)
    {
        $jugador = Jugador::findOrFail($idJugador);
        return view('jugadores.edit', compact('jugador'));
    }

    public function update(Request $request, $idJugador)
    {
        $jugador = Jugador::findOrFail($idJugador);

        try {
            $request->validate([
                'nameJugador' => ['required', 'string', 'max:40'],
                'apellidoJugador' => ['required', 'string', 'max:40'],
                'fechaNacimiento' => ['required', 'string', 'max:10'],
                'posicion' => ['required']
            ]);
            $jugador->nombre = $request->input('nameJugador');
            $jugador->apellido = $request->input('apellidoJugador');
            $jugador->fechaNacimiento = $request->input('fechaNacimiento');
            $jugador->posicion = $request->input('posicion');
            $jugador->save();
            if (Auth::user()) {
                return redirect()->route('jugadores.index', ['id' => $jugador->idEquipo])->with('success', 'Jugador editado correctamente.');
            }
        } catch (ValidationException $e) {
            Log::error('Error al actualizar jugador: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function setJugador_Equipo(Request $request, $idEquipo)
    {
        try {
            $request->validate([
                'jugador-equipo' => ['required']
            ]);
            $jugadoresEquipo = $request->input('jugador-equipo', []);
            if (!empty($jugadoresEquipo)) {
                foreach ($jugadoresEquipo as $jugador) {
                    $player = Jugador::findOrFail($jugador);
                    $player->idEquipo = $idEquipo;
                    $player->save();
                }
            }
            if (Auth::user()) {
                return redirect()->route('jugadores.index', ['id' => $idEquipo])->with('success', 'Jugador/es añadidos correctamente.');
            }
        } catch (ValidationException $e) {
            Log::error('Error al agregar jugador/es: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function deleteJugador_Equipo($idJugador)
    {
        try {
            if ($idJugador != null && $idJugador > 0) {
                $jugador = Jugador::find($idJugador);
                $idEquipo = $jugador->idEquipo;
                $jugador->idEquipo = null;
                $jugador->save();
                if (Auth::user()) {
                    return redirect()->route('jugadores.index', ['id' => $idEquipo])->with('success', 'Jugador eliminado correctamente.');
                }
            }
        } catch (ValidationException $e) {
            Log::error('Error al quitar jugador: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
