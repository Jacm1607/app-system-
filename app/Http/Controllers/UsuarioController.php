<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Persona;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index (Request $request) {
        privilegio('usuario-index');
        if (isset($request->email)) {
            $usuarios = User::where('email', 'LIKE', "%$request->email%")->where('estado', '1')->get();
        } else {
            $usuarios = User::where('estado', '1')->get();
        }
        return view('usuario.index')->with('usuarios', $usuarios);
    }

    public function create() {
        privilegio('usuario-create');
        $personas = Persona::where('estado', '1')->get();
        $roles = Rol::where('estado', '1')->get();
        return view('usuario.create')->with('personas', $personas)->with('roles', $roles);
    }

    public function store(Request $request) {
        privilegio('usuario-store');
        $request->validate([
            'id_persona' => 'required',
            'email' => 'required|email|unique:users,email',
        ],[
            'id_persona.required' => 'Campo requerido.',
            'email.unique' => 'Este email ya esta siendo usado.',
            'email.required' => 'Campo requerido.',
            'email.email' => 'Ingrese en formato email.',
        ]);
        $usuario = new User();
        $usuario->id_persona = $request->id_persona;
        $usuario->id_rol = $request->id_rol;
        $usuario->email = $request->email;
        $usuario->name = $request->email;
        $usuario->password = Hash::make('12345678');
        $usuario->save();
        return redirect()->route('usuario.index');
    }

    public function edit ($id) {
        privilegio('usuario-edit');
        $usuario = User::findOrFail($id);
        $personas = Persona::where('estado', '1')->where('id', '!=', $usuario->id_persona)->get();
        $roles = Rol::where('estado', '1')->where('id', '!=', $usuario->id_rol)->get();
        return view('usuario.edit')->with('usuario', $usuario)->with('personas', $personas)->with('roles', $roles);
    }

    public function update (Request $request, $id) {
        privilegio('usuario-update');
        $usuario = User::findOrFail($id);
        $usuario->id_persona = $request->id_persona;
        $usuario->id_rol = $request->id_rol;
        $usuario->email = $request->email;
        $usuario->name = $request->email;
        $usuario->update();
        return redirect()->route('usuario.index');
    }

    public function delete ($id) {
        privilegio('usuario-delete');
        $usuario = User::findOrFail($id);
        $usuario->estado = '0';
        $usuario->update();
        return redirect()->route('usuario.index');
    }
    
    public function reset_password ($id) {
        //privilegio('usuario-reset-password');
        $usuario = User::findOrFail($id);
        $usuario->password = Hash::make('12345678**');
        $usuario->update();
        return redirect()->route('usuario.index');
    }
}
