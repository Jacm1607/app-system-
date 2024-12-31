<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
use App\Models\Privilegio;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    
    public function index (Request $request) {
        privilegio('rol-index');
        if (isset($request->rol)) {
            $roles = Rol::where('nombre', 'LIKE', "%$request->rol%")->where('estado', '1')->get();
        } else {
            $roles = Rol::where('estado', '1')->get();
        }
        return view('rol.index')->with('roles', $roles);
    }

    public function create() {
        privilegio('rol-create');
        $privilegios = Privilegio::where('estado', '1')->get();
        return view('rol.create')->with('privilegios', $privilegios);
    }

    public function store(Request $request) {
        privilegio('rol-store');
        $request->validate([
            'nombre' => 'required|unique:roles,nombre|max:255',
        ],[
            'nombre.unique' => 'Este nombre ya esta siendo usado.',
            'nombre.required' => 'Campo requerido.'
        ]);
        $rol = new Rol();
        $rol->nombre = $request->nombre;
        $rol->save();
        $rol->privilegios()->attach($request->id_privilegio);
        return redirect()->route('rol.index');
    }

    public function edit ($id) {
        privilegio('rol-edit');
        $privilegios = Privilegio::where('estado', '1')->get();
        $rol = Rol::findOrFail($id);
        return view('rol.edit')->with('rol', $rol)->with('privilegios', $privilegios);
    }

    public function update (Request $request, $id) {
        privilegio('rol-update');
        $rol = Rol::findOrFail($id);
        $rol->nombre = $request->nombre;
        $rol->update();
        $rol->privilegios()->detach();
        $rol->privilegios()->attach($request->id_privilegio);
        return redirect()->route('rol.index');
    }

    public function delete ($id) {
        privilegio('rol-delete');
        $rol = Rol::findOrFail($id);
        $rol->estado = '0';
        $rol->update();
        return redirect()->route('rol.index');
    }
}
