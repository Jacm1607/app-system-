<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Privilegio;
use App\Models\Rol;
use Illuminate\Support\Facades\DB;

class PrivilegioController extends Controller
{
    public function __construct () {
    }
    
    public function index (Request $request) {
        if ($this->role('privilegio-index') > 0) {
           if (isset($request->privilegio)) {
            $privilegios = Privilegio::where('nombre', 'LIKE', "%$request->privilegio%")->where('estado', '1')->get();
            } else {
                $privilegios = Privilegio::where('estado', '1')->get();
            }
            return view('privilegio.index')->with('privilegios', $privilegios);
        } else {
            abort(403);
        }
    }

    public function create() {
        if ($this->role('privilegio-create') > 0) {
            return view('privilegio.create');
        } else {
            abort(403);
        }
    }

    public function store(Request $request) {
        if ($this->role('privilegio-store') > 0) {
            $request->validate([
            'nombre' => 'required|unique:privilegios,nombre|max:255',
            ],[
                'nombre.unique' => 'Este nombre ya esta siendo usado.',
                'nombre.required' => 'Campo requerido.'
            ]);
            $privilegio = new Privilegio();
            $privilegio->nombre = $request->nombre;
            $privilegio->slug = $this->createSlug($request->nombre);
            $privilegio->save();
            return redirect()->route('privilegio.index');
        } else {
            abort(403);
        }
    }

    public function edit ($id) {
        if ($this->role('privilegio-edit') > 0) {
            $privilegio = Privilegio::findOrFail($id);
            return view('privilegio.edit')->with('privilegio', $privilegio);
        } else {
            abort(403);
        }
    }

    public function update (Request $request, $id) {
        if ($this->role('privilegio-update') > 0) {
            $privilegio = Privilegio::findOrFail($id);
            $privilegio->nombre = $request->nombre;
            $privilegio->slug = $this->createSlug($request->nombre);
            $privilegio->update();
            return redirect()->route('privilegio.index');
        } else {
            abort(403);
        }
    }

    public function delete ($id) {
        if ($this->role('privilegio-delete') > 0) {
            $privilegio = Privilegio::findOrFail($id);
            $privilegio->estado = '0';
            $privilegio->update();
            return redirect()->route('privilegio.index');
        } else {
            abort(403);
        }
    }
    
    function createSlug($string) {
        $string = str_replace(' ', '-', $string);
        $string = strtolower($string);
        $string = preg_replace('/[^a-z0-9\-]/', '', $string);
        return $string;
    }
    
    function role($slug) {
        $resultados = DB::table('roles as r')
        ->join('rol_privilegio as rp', 'r.id', '=', 'rp.idRol')
        ->join('privilegios as p', 'rp.idPrivilegio', '=', 'p.id')
        ->where('p.slug', $slug)
        ->count();
        return $resultados;
    }
}
