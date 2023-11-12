<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Persona;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index (Request $request) {
        if (isset($request->email)) {
            $usuarios = User::where('email', 'LIKE', "%$request->email%")->where('estado', '1')->get();
        } else {
            $usuarios = User::where('estado', '1')->get();
        }
        return view('usuario.index')->with('usuarios', $usuarios);
    }

    public function create() {
        $personas = Persona::where('estado', '1')->get();
        return view('usuario.create')->with('personas', $personas);
    }

    public function store(Request $request) {
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
        $usuario->email = $request->email;
        $usuario->name = $request->email;
        $usuario->password = Hash::make('12345678');
        $usuario->save();
        return redirect()->route('usuario.index');
    }

    public function edit ($id) {
        $usuario = User::findOrFail($id);
        $personas = Persona::where('estado', '1')->where('id', '!=', $usuario->idPersona)->get();
        return view('usuario.edit')->with('usuario', $usuario)->with('personas', $personas);
    }

    public function update (Request $request, $id) {
        $usuario = User::findOrFail($id);
        $usuario->idPersona = $request->idPersona;
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
