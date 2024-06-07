<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
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
        try {
            $request->validate([
                'nameUsuario' => ['required', 'unique:users,name', 'string', 'max:40'],
                'emailUsuario' => ['required', 'string', 'email', 'max:60', 'unique:users,email'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'name' => $request->nameUsuario,
                'email' => $request->emailUsuario,
                'password' => Hash::make($request->password),
            ]);
            if ($request->rol == 1) {
                $user->assignRole('admin_Liga');
            } elseif ($request->rol == 2) {
                $user->assignRole('admin_Equipo');
            } else {
                $user->assignRole('usuario');
            }

            if (auth()->user()) {
                return redirect()->route('usuarios')->with('success', 'Usuario ingresado correctamente.');
            }
        } catch (ValidationException $e) {
            Log::error('Error al crear usuario: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
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
                $request->validate([
                    'name' => ['required', 'unique:users,name,' . $id, 'string', 'max:40'],
                    'email' => ['required', 'unique:users,email,' . $id, 'string', 'email', 'max:60'],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                    'password_confirmation' => ['required'],
                ]);

                $usuario->name = $request->input('nameUsuario');
                $usuario->email = $request->input('emailUsuario');

                $usuario->password = Hash::make($request->input('password'));
            } else {
                $request->validate([
                    'nameUsuario' => ['required', 'unique:users,name,' . $id, 'string', 'max:40'],
                    'emailUsuario' => ['required', 'unique:users,email,' . $id, 'string', 'email', 'max:60'],
                ]);

                $usuario->name = $request->input('nameUsuario');
                $usuario->email = $request->input('emailUsuario');
            }
            $usuario->save();

            if (Auth::user()) {
                return redirect()->route('usuarios')->with('success', 'Usuario actualizado correctamente.');
            }
        } catch (ValidationException $e) {
            Log::error('Error al actualizar usuario: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
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
