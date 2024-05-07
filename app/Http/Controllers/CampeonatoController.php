<?php

namespace App\Http\Controllers;

use App\Enum\Divisionales;
use App\Http\Controllers\Controller;
use App\Models\Campeonato;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CampeonatoController extends Controller
{
    public function create(): View
    {
        return view('campeonatos.create');
    }

    public function index(Request $request)
    {
        $campeonatos = Campeonato::orderBy('nombre', 'asc')->get();
        return view('campeonatos.index', compact('campeonatos'));
    }
    public function getCampeonatos(Request $request)
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
        $totalRecords = Campeonato::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Campeonato::select('count(*) as allcount')->where('nombre', 'like', '%' . $searchValue . '%')->where('division', 'like', '%' . $searchValue . '%')->where('tipoCampeonato', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = Campeonato::orderBy($columnName, $columnSortOrder)
            ->where('nombre', 'like', '%' . $searchValue . '%')->where('division', 'like', '%' . $searchValue . '%')->where('tipoCampeonato', 'like', '%' . $searchValue . '%')
            ->select('campeonatos.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
            $nombre = $record->nombre;
            $division = $record->division;
            $tipoCampeonato = $record->tipoCampeonato;

            $data_arr[] = array(
                "nombre" => $nombre,
                "division" => $division,
                "tipoCampeonato" => $tipoCampeonato
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

        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        if ($request->division == "DivA") {
            $campeonatoDiv = Divisionales::DivA;
        } elseif ($request->division == "DivB") {
            $campeonatoDiv = Divisionales::DivB;
        } else {
            $campeonatoDiv = Divisionales::DivC;
        }

        $tipoCampeonato = $request->has('tipoCampeonato') ? '1' : '0';

        $campe = Campeonato::create([
            'nombre' => $request['name'],
            'division' => $campeonatoDiv,
            'tipo_campeonato' => $tipoCampeonato
        ]);
        dd($campe);

        return redirect()->route('campeonatos')->with('success', 'Campeonato ingresado correctamente.');
    }
}