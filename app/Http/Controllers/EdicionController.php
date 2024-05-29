<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Campeonato;
use App\Models\Edicion;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EdicionController extends Controller
{
    public function create($idCampeonato): View
    {
        $campeonatoSeleccionado = Campeonato::findOrFail($idCampeonato);
        return view('ediciones.create', compact('campeonatoSeleccionado'));
    }

    public function index(Request $request, $idCampeonato)
    {
        $campeonatoSeleccionado = Campeonato::findOrFail($idCampeonato);
        $edicionesDelCampeonato = $campeonatoSeleccionado->ediciones;
        return view('ediciones.index', compact('edicionesDelCampeonato'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nameEdicion' => ['required', 'unique:edicion,nombre', 'string', 'max:80'],
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

    public function getEdiciones(Request $request)
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
        $totalRecords = Edicion::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Edicion::select('count(*) as allcount')
            ->leftJoin('campeonatos', 'campeonatos.id', '=', 'edicion.idCampeonato')
            ->where('nombre', 'like', '%' . $searchValue . '%')
            ->where('fechaInicio', 'like', '%' . $searchValue . '%')
            ->where('fechaFinal', 'like', '%' . $searchValue . '%')
            ->where('liguilla', 'like', '%' . $searchValue . '%')
            ->distinct()
            ->count();

        // Fetch records
        $records = Edicion::orderBy($columnName, $columnSortOrder)
            ->leftJoin('campeonatos', 'campeonatos.id', '=', 'edicion.idCampeonato')
            ->where('nombre', 'like', '%' . $searchValue . '%')
            ->orWhere('fechaInicio', 'like', '%' . $searchValue . '%')
            ->orWhere('fechaFinal', 'like', '%' . $searchValue . '%')
            ->orWhere('liguilla', 'like', '%' . $searchValue . '%')
            ->orWhere('campeonatos.nombre', 'like', '%' . $searchValue . '%')
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
            $campeonato = $record->campeonatos->pluck('nombre')->implode(', ');

            $data_arr[] = array(
                "id" => $id,
                "nombre" => $nombre,
                "fechaInicio" => $fechaInicio,
                "fechaFinal" => $fechaFinal,
                "liguilla" => $liguilla,
                "idCampeon" => $idCampeon,
                "campeonato" => $campeonato,
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
}