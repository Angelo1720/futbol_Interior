<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ControladorUsuario extends Controller
{

    public function create()
    {
        $roles = Role::orderBy('id', 'asc')->get();
        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user->rol_id == 1) {
            $user->assignRole('admin_Liga');
        } elseif ($user->rol_id == 2) {
            $user->assignRole('admin_Equipo');
        } else {
            $user->assignRole('usuario');
        }

        if (auth()->user()) {
            return redirect()->route('usuarios')->with('success', 'Usuario ingresado correctamente.');
        }
    }
    public function index(Request $request)
    {
        $usuarios = User::orderBy('id', 'asc')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function getUsers(Request $request)
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
        $totalRecords = User::select('count(*) as allcount')->count();
        $totalRecordswithFilter = User::select('count(*) as allcount')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('users.name', 'like', '%' . $searchValue . '%')
            ->orWhere('users.email', 'like', '%' . $searchValue . '%')
            ->orWhere('roles.name', 'like', '%' . $searchValue . '%')
            ->distinct()
            ->count();


        // Fetch records
        $records = User::orderBy($columnName, $columnSortOrder)
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('users.name', 'like', '%' . $searchValue . '%')
            ->orWhere('users.email', 'like', '%' . $searchValue . '%')
            ->orWhere('roles.name', 'like', '%' . $searchValue . '%')
            ->select('users.*')
            ->distinct()
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $name = $record->name;
            $email = $record->email;
            $roles = $record->roles->pluck('name')->implode(', ');

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "roles" => $roles
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
        $usuario = User::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        try {
            if ($request->filled('password')) {
                $reglas = [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                    'password_confirmation' => ['required'],
                ];

                $request->validate($reglas);

                $usuario->name = $request->input('name');
                $usuario->email = $request->input('email');

                $usuario->password = Hash::make($request->input('password'));
            } else {
                $reglas = [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                ];
                $request->validate($reglas);

                $usuario->name = $request->input('name');
                $usuario->email = $request->input('email');


            }
            $usuario->save();

            if (Auth::user()) {
                return redirect()->route('usuarios')->with('success', 'Usuario actualizado correctamente.');
            }

        } catch (\Throwable $th) {
            Log::error('Error al actualizar usuario: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Se produjo un error al actualizar el usuario. Por favor, inténtelo de nuevo.');
        }
    }

    public function delete($id)
    {
        if ($id != null && $id > 0) {
            $usuario = User::find($id);
            if (!$usuario) {
                return redirect()->route('home')->with('error', 'Usuario no encontrado.');
            }
            $usuario->delete();
            return redirect()->route('usuarios')->with('success', 'Usuario eliminado correctamente.');
        } else {
            return redirect()->route('home')->with('error', 'Id de usuario no válido.');
        }
    }

}