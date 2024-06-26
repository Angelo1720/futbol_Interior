<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Campeonato;
use App\Models\Edicion;
use App\Models\Edicion_Equipo;
use App\Models\Equipo;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class EdicionController extends Controller
{
    public function create($idCampeonato): View
    {
        $campeonatoSeleccionado = Campeonato::findOrFail($idCampeonato);
        return view('ediciones.create', compact('campeonatoSeleccionado'));
    }

    public function index(Request $request, $idCampeonato)
    {
        try{
            $campeonatoSeleccionado = Campeonato::findOrFail($idCampeonato);
            $edicionesDelCampeonato = $campeonatoSeleccionado->ediciones;
            return view('ediciones.index', compact('edicionesDelCampeonato'), compact('campeonatoSeleccionado'));
        }catch(ValidationException $e){
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
        
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nameEdicion' => ['required', 'string', 'max:80'],
                'fechaInicio' => ['max:10'],
                'fechaFinal' => ['max:10'],
            ]);

            Edicion::create([
                'nombre' => $request['nameEdicion'],
                'fechaInicio' => $request['fechaInicio'],
                'fechaFinal' => $request['fechaFinal'],
                'idCampeonato' => $request['campeonatoId'],
                'liguilla' => $request->has('liguilla') ? true : false,
            ]);

            if (Auth::user()) {
                return redirect()->route('ediciones.index', ['idCampeonato' => $request->input('campeonatoId')])->with('success', 'Edicion ingresada correctamente.');
            }
        } catch (ValidationException $e) {
            Log::error('Error al crear edicion: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function getEdiciones(Request $request, $idCampeonato)
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
        $searchValue = $idCampeonato; // Search value

        // Total records
        $totalRecords = Edicion::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Edicion::select('count(*) as allcount')
            ->leftJoin('campeonatos', 'campeonatos.id', '=', 'edicion.idCampeonato')
            ->where('idCampeonato', $searchValue)
            ->distinct()
            ->count();

        // Fetch records
        $records = Edicion::orderBy($columnName, $columnSortOrder)
            ->leftJoin('campeonatos', 'campeonatos.id', '=', 'edicion.idCampeonato')
            ->where('idCampeonato', $searchValue)
            ->select('edicion.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();


        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $nombre = $record->nombre;
            $fechaInicio = $record->fechaInicio;
            $fechaFinal = $record->fechaFinal;
            $liguilla = $record->liguilla;
            $idCampeon = $record->idCampeon;

            $data_arr[] = array(
                "id" => $id,
                "nombre" => $nombre,
                "fechaInicio" => $fechaInicio,
                "fechaFinal" => $fechaFinal,
                "liguilla" => $liguilla,
                "idCampeon" => $idCampeon
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

    public function getEdicionesConCampeon(Request $request, $idCampeonato)
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
        $searchValue = strtolower($search_arr['value']); // Search value

        // Total records
        $totalRecords = Edicion::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Edicion::select('count(*) as allcount')
            ->leftJoin('campeonatos', 'campeonatos.id', '=', 'edicion.idCampeonato')
            ->leftJoin('equipos', 'equipos.id', '=', 'edicion.idCampeon')
            ->where('idCampeonato', $idCampeonato)
            ->whereRaw('LOWER(edicion."nombre") LIKE ?', ['%' . $searchValue . '%'])
            ->distinct()
            ->count();

        // Fetch records
        $records = Edicion::orderBy($columnName, $columnSortOrder)
            ->leftJoin('campeonatos', 'campeonatos.id', '=', 'edicion.idCampeonato')
            ->leftJoin('equipos', 'equipos.id', '=', 'edicion.idCampeon')
            ->where('idCampeonato', $idCampeonato)
            ->whereRaw('LOWER(edicion."nombre") LIKE ?', ['%' . $searchValue . '%'])
            ->select('edicion.*', 'equipos.nombreCorto as nombreCampeon')
            ->skip($start)
            ->take($rowperpage)
            ->get();


        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $nombre = $record->nombre;
            $fechaInicio = $record->fechaInicio;
            $fechaFinal = $record->fechaFinal;
            $liguilla = $record->liguilla;
            $idCampeon = $record->idCampeon;
            $nombreCampeon = $record->nombreCampeon;

            $data_arr[] = array(
                "id" => $id,
                "nombre" => $nombre,
                "fechaInicio" => $fechaInicio,
                "fechaFinal" => $fechaFinal,
                "liguilla" => $liguilla,
                "idCampeon" => $idCampeon,
                "nombreCampeon" => $nombreCampeon

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

    public function edit(Request $request, $idEdicion)
    {
        $edicion = Edicion::findOrFail($idEdicion);
        $campeonato = Campeonato::findOrFail($edicion->idCampeonato);
        $equiposParticipantes = $edicion->equiposParticipantes();
        $equiposNOparticipantes = $edicion->equiposNOparticipantes();
        $partidosOrdenados = $edicion->getPartidosOrdenados();
        $partidosPorJornada = $partidosOrdenados->groupBy('nroJornada');
        return view('ediciones.edit', compact('edicion', 'equiposParticipantes', 'equiposNOparticipantes', 'campeonato', 'partidosPorJornada'));
    }

    public function setEdicion_Equipo(Request $request, $idEdicion) 
    {
        try {
            $request->validate([
                'edicion-equipo' => ['required']
            ]);
            $edicionEquipos = $request->input('edicion-equipo', []);

            if(!empty($edicionEquipos)) {
                foreach ($edicionEquipos as $equipoId) {
                    Edicion_Equipo::create([
                        'idEdicion' => $idEdicion,
                        'idEquipo' => $equipoId,	
                    ]);
                }
            }
            if (Auth::user()) {
                return redirect()->route('ediciones.edit', ['id' => $idEdicion])->with('success', 'Equipo/s añadidos correctamente.');
            }
        } catch (ValidationException $e) {
            Log::error('Error al agregar equipo: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
    
    public function deleteEdicion_Equipo(Request $request, $idEdicion)
    {
        try {
            Edicion_Equipo::where('idEquipo', $request->idEquipo)->where('idEdicion', $idEdicion)->delete();
            return response()->json(['success' => true]);
        } catch (ValidationException $e) {
            Log::error('Error al eliminar equipo: ' . $e->getMessage());
        }
    }
    public function editInfo($idEdicion)
    {   
        $edicion = Edicion::findOrFail($idEdicion);
        return view('ediciones.editInfo', compact('edicion'));
    }

    public function update(Request $request, $idEdicion)
    {
        $edicion = Edicion::findOrFail($idEdicion);
        try {
            $request->validate([
                'nameEdicion' => ['required', 'string', 'max:80'],
                'fechaInicio' => ['max:10'],
                'fechaFinal' => ['max:10'],
            ]);
            $fechaInicio = $request->input('fechaInicio');
            $fechaFinal = $request->input('fechaFinal');

            $carbonFechaInicio = Carbon::parse($fechaInicio);
            $carbonFechaFinal = Carbon::parse($fechaFinal);
            if ($carbonFechaInicio->isBefore($carbonFechaFinal)) {
                $edicion->nombre = $request->input('nameEdicion');
                $edicion->fechaInicio = $request->input('fechaInicio');
                $edicion->fechaFinal = $request->input('fechaFinal');
                $edicion->save();
            } else {
                return redirect()->back()->withErrors(['fechaInicio' => 'La fecha de inicio no puede ser menor a la de final.']);
            }
            if (Auth::user()) {
                return redirect()->route('ediciones.edit', ['id' => $idEdicion])->with('success', 'Edición editada correctamente.');
            }
        } catch (ValidationException $e) {
            Log::error('Error al editar edicion: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}