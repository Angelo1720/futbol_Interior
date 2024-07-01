<?php

namespace App\Http\Controllers;

use App\Enum\Divisionales;
use App\Http\Controllers\Controller;
use App\Models\Campeonato;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        // Read value
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
        $totalRecords = Campeonato::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Campeonato::select('count(*) as allcount')
            ->whereRaw('LOWER("nombre") LIKE ?', ['%' . $searchValue . '%'])
            ->count();

        // Fetch records
        $records = Campeonato::orderBy($columnName, $columnSortOrder)
            ->whereRaw('LOWER("nombre") LIKE ?', ['%' . $searchValue . '%'])
            ->select('campeonatos.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $nombre = $record->nombre;
            $division = $record->division;
            $tipoCampeonato = $record->tipoCampeonato;

            $data_arr[] = array(
                "id" => $id,
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
        try {
            $request->validate([
                'nameCampeonato' => ['required', 'unique:campeonatos,nombre', 'string', 'max:100']
            ]);

            $tipoCampeonato = $request->has('tipoCampeonato') ? true : false;

            Campeonato::create([
                'nombre' => $request['nameCampeonato'],
                'division' => $this->asignarDivisional($request['divisional']),
                'tipoCampeonato' => $tipoCampeonato
            ]);

            return redirect()->route('campeonatos')->with('success', 'Campeonato ingresado correctamente.');
        } catch (ValidationException $e) {
            Log::error('Error al ingresar campeonato: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function edit($id)
    {
        $campeonato = Campeonato::findOrFail($id);
        return view('campeonatos.edit', compact('campeonato'));
    }

    public function update(Request $request, $id)
    {
        $campeonato = Campeonato::findOrFail($id);

        try {
            $request->validate([
                'nameCampeonato' => ['required', 'unique:campeonatos,nombre,' . $id, 'string', 'max:100']
            ]);

            $campeonato->nombre = $request->input('nameCampeonato');
            $campeonato->division = $this->asignarDivisional($request->input('divisional'));

            $campeonato->save();

            if (Auth::user()) {
                return redirect()->route('campeonatos')->with('success', 'Campeonato actualizado correctamente.');
            }
        } catch (ValidationException $e) {
            Log::error('Error al actualizar campeonato: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function delete($id)
    {
        if ($id != null && $id > 0) {
            $campeonato = Campeonato::find($id);
            if (!$campeonato) {
                return redirect()->route('home')->with('error', 'Campeonato no encontrado.');
            }
            $campeonato->delete();
            return redirect()->route('campeonatos')->with('success', 'Campeonato eliminado correctamente.');
        } else {
            return redirect()->route('home')->with('error', 'Id de Campeonato no válido.');
        }
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

    public function listadoCampeonatos(Request $request)
    {
        if ($request->anyFilled('buscador')) {
            $search = strtolower($request->input('buscador'));
            try {
                $campeonatos = Campeonato::whereRaw('LOWER("nombre") LIKE ?', ['%' . $search . '%'])->orderBy('nombre', 'asc')->paginate(8);
            } catch (ValidationException $th) {
                return redirect()->back()->withErrors($th->errors());
            }
        } else {
            $campeonatos = Campeonato::orderBy('nombre', 'asc')->paginate(8);
        }
        return view('campeonatos.listadoCampeonatos', compact('campeonatos'));
    }

    public function divisionA(Request $request)
    {
        if ($request->anyFilled('buscador')) {
            $search = strtolower($request->input('buscador'));
            try {
                $campeonatosDivA = Campeonato::whereRaw('LOWER("nombre") LIKE ?', ['%' . $search . '%'])
                    ->where('division', 'Primera "A"')
                    ->orderBy('nombre', 'asc')
                    ->paginate(8);
            } catch (ValidationException $th) {
                return redirect()->back()->withErrors($th->errors());
            }
        } else {
            $campeonatosDivA = Campeonato::where('division', 'Primera "A"')->orderBy('nombre', 'asc')->paginate(8);
        }
        return view('campeonatos.campeonatosDivA', compact('campeonatosDivA'));
    }

    public function divisionB(Request $request)
    {
        if ($request->anyFilled('buscador')) {
            $search = strtolower($request->input('buscador'));
            try {
                $campeonatosDivB = Campeonato::whereRaw('LOWER("nombre") LIKE ?', ['%' . $search . '%'])
                    ->where('division', 'Segunda "B"')
                    ->orderBy('nombre', 'asc')
                    ->paginate(8);
            } catch (ValidationException $th) {
                return redirect()->back()->withErrors($th->errors());
            }
        } else {
            $campeonatosDivB = Campeonato::where('division', 'Segunda "B"')->orderBy('nombre', 'asc')->paginate(8);
        }
        return view('campeonatos.campeonatosDivB', compact('campeonatosDivB'));
    }

    public function divisionC(Request $request)
    {
        if ($request->anyFilled('buscador')) {
            $search = strtolower($request->input('buscador'));
            try {
                $campeonatosDivC = Campeonato::whereRaw('LOWER("nombre") LIKE ?', ['%' . $search . '%'])
                    ->where('division', 'Tercera "C"')
                    ->orderBy('nombre', 'asc')
                    ->paginate(8);
            } catch (ValidationException $th) {
                return redirect()->back()->withErrors($th->errors());
            }
        } else {
        $campeonatosDivC = Campeonato::where('division', 'Tercera "C"')->orderBy('nombre', 'asc')->paginate(8);
        } 
        return view('campeonatos.campeonatosDivC', compact('campeonatosDivC'));
    }
}
