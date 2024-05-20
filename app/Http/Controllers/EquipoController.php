<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Enum\Divisionales;
use App\Models\Imagen;
use App\Rules\NoSpacesInFilename;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class EquipoController extends Controller
{
    public function create(): View
    {
        return view('equipos.create');
    }
    public function asignarDivisional($divsRequest)
    {
        if ($divsRequest == "DivA") {
            $equipoDiv = Divisionales::DivA;
        } elseif ($divsRequest == "DivB") {
            $equipoDiv = Divisionales::DivB;
        } else {
            $equipoDiv = Divisionales::DivC;
        }

        return $equipoDiv;
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'unique:equipos,nombre', 'string', 'max:255'],
                'fechaFundacion' => ['required', 'string', 'max:10'],
                'nameCancha' => ['max:255'],
            ]);
            Equipo::create([
                'nombre' => $request['name'],
                'fechaFundacion' => $request['fechaFundacion'],
                'nomCancha' => $request['nameCancha'] == null ? 'NO' : $request['nameCancha'],
                'divisional' => $this->asignarDivisional($request['divisional']),
            ]);

            // Separar la fecha en año, mes y día
            //list($ano, $dia, $mes) = explode('-', $request->fecha);
            // Establecer la fecha manualmente
            //$fechaact = Carbon::create($ano, $mes, $dia);
            if (Auth::user()) {
                return redirect()->route('equipos')->with('success', 'Equipo ingresado correctamente.');
            }
        } catch (ValidationException $e) {
            Log::error('Error al crear equipo: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
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
            $id = $record->id;
            $nombre = $record->nombre;
            $divisional = $record->divisional;

            $data_arr[] = array(
                "id" => $id,
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
    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        return view('equipos.edit', compact('equipo'));
    }

    public function update(Request $request, $id)
    {
        $equipo = Equipo::findOrFail($id);
        try {
            $request->validate([
                'name' => ['required', 'unique:equipos,nombre,' . $id, 'string', 'max:60'],
                'fechaFundacion' => ['required', 'string', 'max:10'],
                'nameCancha' => ['max:255'],
                'cantidadTitulos' => ['required', 'integer'],
                'imgEscudo' => ['file', 'mimes:jpeg,png,jpg', 'max:2048', new NoSpacesInFilename] // Asegúrate de tener esta validación
            ]);
            $equipo->nombre = $request->input('name');
            $equipo->fechaFundacion = $request->input('fechaFundacion');
            $equipo->nomCancha = $request->input('nameCancha') == null ? 'NO' : $request->input('nameCancha');
            $equipo->divisional = $this->asignarDivisional($request->input('divisional'));
            $equipo->cantidadTitulos = $request->input('cantidadTitulos');
            $equipo->participa = $request->has('participa');
            $equipo->save();


            // Manejar la imagen si se proporciona
            if ($request->hasFile('imgEscudo') && $request->file('imgEscudo')->isValid()) {
                if ($equipo->idEscudo == null) {
                    try {
                        $image = base64_encode(file_get_contents($request->file('imgEscudo')->getRealPath()));
                        // Guardar la imagen y asignar idEscudo al equipo
                        $imagen = Imagen::Create([
                            'nombreImg' => "Escudo_" . $request->file('imgEscudo')->getClientOriginalName(),
                            'equipo_id' => $equipo->id,
                            'base64' => $image
                        ]);
                        $equipo->idEscudo = $imagen->id;
                        // Volver a guardar el equipo con el idEscudo actualizado
                        $equipo->save();
                    } catch (\Throwable $th) {
                        throw $th;
                    }
                } else {
                    // Actualizar la imagen
                    $image = base64_encode(file_get_contents($request->file('imgEscudo')->getRealPath()));
                    $imagen = Imagen::findOrFail($equipo->idEscudo);
                    $imagen->nombreImg = "Escudo_" . $request->file('imgEscudo')->getClientOriginalName();
                    $imagen->base64 = $image;
                    $imagen->save();
                }
            }

            if (Auth::user()) {
                return redirect()->route('equipos')->with('success', 'Equipo actualizado correctamente.');
            }
        } catch (ValidationException $e) {
            Log::error('Error al actualizar equipo: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
