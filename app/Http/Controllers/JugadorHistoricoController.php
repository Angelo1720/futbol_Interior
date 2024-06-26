<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Imagen;
use App\Models\Jugador_Historico;
use App\Rules\NoSpacesInFilename;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class JugadorHistoricoController extends Controller
{
    public function create(): View
    {
        return view('jugadores_historicos.create');
    }

    public function index(Request $request)
    {
        $historicos = Jugador_Historico::orderBy('nombre', 'asc')->get();
        return view('jugadores_historicos.index', compact('historicos'));
    }

    public function getHistoricos(Request $request)
    {
        ## Read value
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
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Jugador_Historico::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Jugador_Historico::select('count(*) as allcount')->where('nombre', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = Jugador_Historico::orderBy($columnName, $columnSortOrder)
            ->where('nombre', 'like', '%' . $searchValue . '%')
            ->select('jugadores_historicos.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $nombre = $record->nombre;
            $apellido = $record->apellido;
            $fechaNacimiento = $record->fechaNacimiento;

            $data_arr[] = array(
                "id" => $id,
                "nombre" => $nombre,
                "apellido" => $apellido,
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

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => ['required', 'string', 'max:40'],
                'apellido' => ['required', 'string', 'max:40'],
                'fechaNacimiento' => ['required', 'string', 'max:40'],
                'historia' => ['required', 'string', 'max:1000'],
                'imgJugador' => ['file', 'mimes:jpeg,png,jpg', 'max:2048', new NoSpacesInFilename]
            ]);
            $jugadorNuevo = Jugador_Historico::create([
                'nombre' => $request['nombre'],
                'apellido' => $request['apellido'],
                'fechaNacimiento' => $request['fechaNacimiento'],
                'historia' => $request['historia'],

            ]);

            if ($request->hasFile('imgJugador') && $request->file('imgJugador')->isValid()) {
                try {
                    $image = base64_encode(file_get_contents($request->file('imgJugador')->getRealPath()));
                    $imagen = Imagen::Create([
                        'nombreImg' => "Historico_" . $request->file('imgJugador')->getClientOriginalName(),
                        'equipo_id' => null,
                        'base64' => $image
                    ]);
                    $jugadorNuevo->idPortada = $imagen->id;
                    $jugadorNuevo->save();
                } catch (\Throwable $th) {
                    throw $th;
                }
            }

            if (Auth::user()) {
                return redirect()->route('historicos')->with('success', 'Jugador histórico ingresado correctamente.');
            }
        } catch (ValidationException $e) {
            Log::error('Error al crear jugador: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function edit($id)
    {
        $historico = Jugador_Historico::findOrFail($id);
        return view('jugadores_historicos.edit', compact('historico'));
    }

    public function update(Request $request, $id)
    {
        $historico = Jugador_Historico::findOrFail($id);
        try {
            $request->validate([
                'nombre' => ['required', 'string', 'max:40'],
                'apellido' => ['required', 'string', 'max:40'],
                'fechaNacimiento' => ['required', 'string', 'max:40'],
                'historia' => ['required', 'string', 'max:1000'],
                'imgJugador' => ['file', 'mimes:jpeg,png,jpg', 'max:2048', new NoSpacesInFilename]
            ]);
            $historico->nombre = $request->input('nombre');
            $historico->apellido = $request->input('apellido');
            $historico->fechaNacimiento = $request->input('fechaNacimiento');
            $historico->historia = $request->input('historia');
            $historico->save();

            if ($request->hasFile('imgJugador') && $request->file('imgJugador')->isValid()) {
                if ($historico->idPortada == null) {
                    try {
                        $image = base64_encode(file_get_contents($request->file('imgJugador')->getRealPath()));
                        $imagen = Imagen::Create([
                            'nombreImg' => "Historico_" . $request->file('imgJugador')->getClientOriginalName(),
                            'equipo_id' => null,
                            'base64' => $image
                        ]);
                        $historico->idPortada = $imagen->id;
                        $historico->save();
                    } catch (\Throwable $th) {
                        throw $th;
                    }
                } else {
                    $image = base64_encode(file_get_contents($request->file('imgJugador')->getRealPath()));
                    $imagen = Imagen::findOrFail($historico->idPortada);
                    $imagen->nombreImg = "Historico_ " . $request->file('imgJugador')->getClientOriginalName();
                    $imagen->base64 = $image;
                    $imagen->save();
                    $historico->save();
                }
            }

            if ($request->has('BORRARimgPortada')) {
                $imagen = Imagen::findOrFail($request->input('BORRARimgPortada'));
                $historico->idPortada = null;
                $historico->save();
                $imagen->delete();
            }

            if (Auth::user()) {
                return redirect()->route('historicos')->with('success', 'Jugador histórico actualizado correctamente.');
            }
        } catch (ValidationException $e) {
            Log::error('Error al actualizar jugador: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function delete($id)
    {
        if ($id != null && $id > 0) {
            $historico = Jugador_Historico::findOrFail($id);
            if (!$historico) {
                return redirect()->route('historicos')->with('error', 'Jugador histórico no encontrado.');
            }
            if ($historico->idPortada != null && $historico->idPortada > 0) {
                $idImagenABorrar = $historico->idPortada;
                $historico->idPortada = null;
                $historico->save();
                $imagen = Imagen::findOrFail($idImagenABorrar);
                $imagen->delete();
            }
            $historico->delete();
        }
        if (Auth::user()) {
            return redirect()->route('historicos')->with('success', 'Jugador histórico eliminado correctamente.');
        }
    }

    public function listadoHistoricos(){
        $historicos = Jugador_Historico::orderBy('nombre', 'asc')->paginate(4);
        return view('jugadores_historicos.listadoHistoricos', compact('historicos'));
    }
}
