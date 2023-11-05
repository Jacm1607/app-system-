<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    public function index (Request $request) {
        if (isset($request->persona)) {
            $personas = Persona::where('nombre', 'LIKE', "%$request->persona%")->where('estado', '1')->get();
        } else {
            $personas = Persona::where('estado', '1')->get();
        }
        return view('persona.index')->with('personas', $personas);
    }

    public function create() {
        return view('persona.create');
    }

    public function store(Request $request) {
        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->celular = $request->celular;
        $persona->fecha_nac = $request->fecha_nac;
        $persona->save();
        return redirect()->route('persona.index');
    }

    public function edit ($id) {
        $persona = Persona::findOrFail($id);
        return view('persona.edit')->with('persona', $persona);
    }

    public function update (Request $request, $id) {
        $persona = Persona::findOrFail($id);
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->celular = $request->celular;
        $persona->fecha_nac = $request->fecha_nac;
        $persona->update();
        return redirect()->route('persona.index');
    }

    public function delete ($id) {
        $persona = Persona::findOrFail($id);
        $persona->estado = '0';
        $persona->update();
        return redirect()->route('persona.index');
    }
}
