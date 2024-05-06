<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Enum\Divisionales;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EquipoController extends Controller
{
    public function create(): View 
    {
        return view('equipos.create');
    }
    
    public function store(Request $request) {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'fechaFundacion' => ['required', 'string', 'max:10'],
            'nameCancha' => ['required', 'string', 'max:255'],
        ]);
        //dd($request->all());
        //dd($request->fecha);
        $equipoDiv;
        if ($request->divisional == "DivA") {
            $equipoDiv = Divisionales::DivA;
        } elseif ($request->divisional == "DivB") {
            $equipoDiv = Divisionales::DivB;
        } else {
            $equipoDiv = Divisionales::DivC;
        }     

        Equipo::create([
            'nombre' => $request['name'],
            'fechaFundacion' => $request['fechaFundacion'],
            'nomCancha' => $request['nameCancha'],
            'divisional' => $equipoDiv,
        ]);
        
        // Separar la fecha en año, mes y día
        //list($ano, $dia, $mes) = explode('-', $request->fecha);
        // Establecer la fecha manualmente
        //$fechaact = Carbon::create($ano, $mes, $dia);
        return redirect()->route('equipos')->with('success', 'Equipo ingresado correctamente.');
    }

    public function index(Request $request)
    {
        $equipos = Equipo::orderBy('nombre', 'asc')->get();
        return view('equipos.index', compact('equipos'));
    }
    public function getEquipos(Request $request)
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
        $totalRecords = Equipo::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Equipo::select('count(*) as allcount')->where('nombre', 'like', '%' . $searchValue . '%')->where('divisional', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = Equipo::orderBy($columnName, $columnSortOrder)
            ->where('nombre', 'like', '%' . $searchValue . '%')->where('divisional', 'like', '%' . $searchValue . '%')
            ->select('equipos.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
            $nombre = $record->nombre;
            $divisional = $record->divisional;

            $data_arr[] = array(
                "nombre" => $nombre,
                "divisional" => $divisional
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
