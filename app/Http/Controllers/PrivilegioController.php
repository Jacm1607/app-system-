<?php

namespace App\Http\Controllers;

use RolPriv;
use Illuminate\Http\Request;
use App\Models\Privilegio;
use App\Models\Rol;
use Illuminate\Support\Facades\DB;

class PrivilegioController extends Controller
{
    public function __construct () {
    }
    
    public function index (Request $request) {
        privilegio('privilegio-index');
       if (isset($request->privilegio)) {
        $privilegios = Privilegio::where('nombre', 'LIKE', "%$request->privilegio%")->where('estado', '1')->paginate(999);
        } else {
            $privilegios = Privilegio::where('estado', '1')->orderBy('nombre', 'asc')->paginate(10);
        }
        return view('privilegio.index')->with('privilegios', $privilegios);
    }

    public function create() {
        privilegio('privilegio-create');
        return view('privilegio.create');
    }

    public function store(Request $request) {
        privilegio('privilegio-store');
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
    }

    public function edit ($id) {
        privilegio('privilegio-edit');
        $privilegio = Privilegio::findOrFail($id);
        return view('privilegio.edit')->with('privilegio', $privilegio);
    }

    public function update (Request $request, $id) {
        privilegio('privilegio-update');
        $privilegio = Privilegio::findOrFail($id);
        $privilegio->nombre = $request->nombre;
        $privilegio->slug = $this->createSlug($request->nombre);
        $privilegio->update();
        return redirect()->route('privilegio.index');
    }

    public function delete ($id) {
        privilegio('privilegio-delete');
        $privilegio = Privilegio::findOrFail($id);
        $privilegio->estado = '0';
        $privilegio->update();
        return redirect()->route('privilegio.index');
    }
    
    function createSlug($string) {
        $string = str_replace(' ', '-', $string);
        $string = strtolower($string);
        $string = preg_replace('/[^a-z0-9\-]/', '', $string);
        return $string;
    }
}
