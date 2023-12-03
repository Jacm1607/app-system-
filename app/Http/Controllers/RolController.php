<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
use App\Models\Privilegio;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
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
        if ($this->role('rol-index') > 0) {
            if (isset($request->nombre)) {
                $roles = Rol::where('nombre', 'LIKE', "%$request->nombre%")->where('estado', '1')->get();
            } else {
                $roles = Rol::where('estado', '1')->get();
            }
            return view('rol.index')->with('roles', $roles);
        } else {
            abort(403);
        }
    }

    public function create() {
        if ($this->role('rol-create') > 0) {
            $privilegios = Privilegio::where('estado', '1')->get();
            return view('rol.create')->with('privilegios', $privilegios);
        } else {
            abort(403);
        }
    }

    public function store(Request $request) {
        if ($this->role('rol-store') > 0) {
            $request->validate([
                'nombre' => 'required|unique:roles,nombre|max:255',
            ],[
                'nombre.unique' => 'Este nombre ya esta siendo usado.',
                'nombre.required' => 'Campo requerido.'
            ]);
            $rol = new Rol();
            $rol->nombre = $request->nombre;
            $rol->save();
            $rol->privilegios()->attach($request->idPrivilegio);
            return redirect()->route('rol.index');
        } else {
            abort(403);
        }
    }

    public function edit ($id) {
        if ($this->role('rol-edit') > 0) {
            $privilegios = Privilegio::where('estado', '1')->get();
            $rol = Rol::findOrFail($id);
            return view('rol.edit')->with('rol', $rol)->with('privilegios', $privilegios);
        } else {
            abort(403);
        }
    }

    public function update (Request $request, $id) {
        if ($this->role('rol-update') > 0) {
            $rol = Rol::findOrFail($id);
            $rol->nombre = $request->nombre;
            $rol->update();
            $rol->privilegios()->detach();
            $rol->privilegios()->attach($request->idPrivilegio);
            return redirect()->route('rol.index');
        } else {
            abort(403);
        }
    }

    public function delete ($id) {
        if ($this->role('rol-delete') > 0) {
            $rol = Rol::findOrFail($id);
            $rol->estado = '0';
            $rol->update();
            return redirect()->route('rol.index');
        } else {
            abort(403);
        }
    }
}
