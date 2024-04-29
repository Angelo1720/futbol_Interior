<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EquipoController extends Controller
{
    public function create(): View 
    {
        return view('equipo.create');
    }
    
    public function store(Request $request) {

        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'escudo' => ['required', 'string', 'max:255'],
            'fechaFundacion' => ['required', 'date', 'max:255'],
            'nomCancha' => ['required', 'string', 'max:255'],
            'latitudCancha' => ['required', 'string', 'max:255'],
            'longitudCancha' => ['required', 'string', 'max:255'],
            'divisional' => ['required', 'string', 'max:255'],
            'cantidadTitulos' => ['required', 'string', 'max:255'],
        ]);


        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->escudo = $request->escudo;
        $equipo->fechaFundacion = $request->fechaFundacion;
        $equipo->nomCancha = $request->nomCancha;
        $equipo->latitudCancha = $request->latitudCancha;
        $equipo->longitudCancha = $request->longitudCancha;
        $equipo->divisional = $request->divisional;
        $equipo->cantidadTitulos = $request->cantidadTitulos;
        $equipo->save();
        return redirect()->route('equipo.index');
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
        $totalRecordswithFilter = Equipo::select('count(*) as allcount')->where('nombre', 'like', '%' . $searchValue . '%')->where('divisionales', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = Equipo::orderBy($columnName, $columnSortOrder)
            ->where('nombre', 'like', '%' . $searchValue . '%')->where('divisionales', 'like', '%' . $searchValue . '%')
            ->select('equipo.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
            $nombre = $record->nombre;
            $divisionales = $record->divisionales;

            $data_arr[] = array(
                "nombre" => $nombre,
                "divisionales" => $divisionales
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
