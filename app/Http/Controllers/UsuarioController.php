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
    function role($slug) {
        $resultados = DB::table('roles as r')
        ->join('rol_privilegio as rp', 'r.id', '=', 'rp.idRol')
        ->join('privilegios as p', 'rp.idPrivilegio', '=', 'p.id')
        ->where('p.slug', $slug)
        ->count();
        return $resultados;
    }
    
    public function index (Request $request) {
        if ($this->role('usuario-index') > 0) {
            if (isset($request->email)) {
                $usuarios = User::where('email', 'LIKE', "%$request->email%")->where('estado', '1')->get();
            } else {
                $usuarios = User::where('estado', '1')->get();
            }
            return view('usuario.index')->with('usuarios', $usuarios);
        } else {
            abort(403);
        }
    }

    public function create() {
        if ($this->role('usuario-create') > 0) {
            $personas = Persona::where('estado', '1')->get();
            $roles = Rol::where('estado', '1')->get();
            return view('usuario.create')->with('personas', $personas)->with('roles', $roles);
        } else {
            abort(403);
        }
    }

    public function store(Request $request) {
        if ($this->role('usuario-store') > 0) {
            $request->validate([
                'idPersona' => 'required',
                'email' => 'required|email|unique:users,email',
            ],[
                'idPersona.required' => 'Campo requerido.',
                'email.unique' => 'Este email ya esta siendo usado.',
                'email.required' => 'Campo requerido.',
                'email.email' => 'Ingrese en formato email.',
            ]);
            $usuario = new User();
            $usuario->idPersona = $request->idPersona;
            $usuario->idRol = $request->idRol;
            $usuario->email = $request->email;
            $usuario->name = $request->email;
            $usuario->password = Hash::make('12345678');
            $usuario->save();
            return redirect()->route('usuario.index');
        } else {
            abort(403);
        }
    }

    public function edit ($id) {
        $usuario = User::findOrFail($id);
        $personas = Persona::where('estado', '1')->where('id', '!=', $usuario->idPersona)->get();
        $roles = Rol::where('estado', '1')->where('id', '!=', $usuario->idRol)->get();
        return view('usuario.edit')->with('usuario', $usuario)->with('personas', $personas)->with('roles', $roles);
    }

    public function update (Request $request, $id) {
        $usuario = User::findOrFail($id);
        $usuario->idPersona = $request->idPersona;
        $usuario->idRol = $request->idRol;
        $usuario->email = $request->email;
        $usuario->name = $request->email;
        $usuario->update();
        return redirect()->route('usuario.index');
    }

    public function delete ($id) {
        $usuario = User::findOrFail($id);
        $usuario->estado = '0';
        $usuario->update();
        return redirect()->route('usuario.index');
    }
}
