<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Personal;
use App\Models\Cliente;
use App\Models\Servicio;
use App\Models\TipoPersona;
use PDF;

class PersonaController extends Controller
{
    public function index (Request $request) {
        privilegio('persona-index');
        if (isset($request->persona)) {
            $personas = Persona::where('nombre', 'LIKE', "%$request->persona%")->where('estado', '1')->get();
        } else {
            $personas = Persona::where('estado', '1')->get();
        }
        return view('persona.index')->with('personas', $personas);
    }

    public function create() {
        privilegio('persona-create');
        $tipo_persona = TipoPersona::where('estado', '1')->get();
        return view('persona.create')->with('tipo_persona',  $tipo_persona);
    }

    public function store(Request $request) {
        privilegio('persona-store');
        $request->validate([
            'nombre' => 'required|regex:/^[a-zA-Z\s]*$/',
            'apellido' => 'required|regex:/^[a-zA-Z\s]*$/',
            'celular' => 'required|numeric|regex:/^[67]\d{7}$/',
            'fecha_nac' => 'required',
            'id_tipo_persona' => 'required',
        ],[
            'nombre.required' => 'Campo requerido.',
            'nombre.regex' => 'Ingrese solo letras, no esta permitido otro caracteres especiales.',
            'apellido.required' => 'Campo requerido.',
            'apellido.regex' => 'Ingrese solo letras, no esta permitido otro caracteres especiales.',
            'celular.required' => 'Campo requerido.',
            'celular.numeric' => 'Ingrese solo numeros.',
            'celular.regex' => 'Ingrese un número válido.',
            'fecha_nac.required' => 'Campo requerido.',
            'id_tipo_persona.required' => 'Campo requerido.'
        ]);
        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->celular = $request->celular;
        $persona->fecha_nac = $request->fecha_nac;
        $persona->id_tipo_persona = $request->id_tipo_persona;
        $persona->save();
        if($request->id_tipo_persona == 1){
            $personal = new Personal();
            $personal->id_persona = $persona->id;
            $personal->id_servicio = 0;
            $personal->id_area = 0;
            $personal->save();
            return redirect()->route('personal.edit', $personal->id);
        } else {
            $cliente = new Cliente();
            $cliente->id_persona = $persona->id;
            $cliente->recurrente = 0;
            $cliente->fuente_referencia = 'Ninguna';
            $cliente->save();
            return redirect()->route('cliente.edit', $cliente->id);
        }
    }

    public function edit ($id) {
        privilegio('persona-edit');
        $persona = Persona::findOrFail($id);
        $tipo_persona = TipoPersona::where('estado', '1')->where('id', '!=', $persona->id_tipo_persona)->get();
        return view('persona.edit')->with('persona', $persona)->with('tipo_persona', $tipo_persona);
    }

    public function update (Request $request, $id) {
        privilegio('persona-update');
        $persona = Persona::findOrFail($id);
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->celular = $request->celular;
        $persona->fecha_nac = $request->fecha_nac;
        $persona->id_tipo_persona = $request->id_tipo_persona;
        $persona->update();
        return redirect()->route('persona.index');
    }

    public function delete ($id) {
        privilegio('persona-delete');
        $persona = Persona::findOrFail($id);
        $persona->estado = '0';
        $persona->update();
        return redirect()->route('persona.index');
    }
    
    public function pdf() {
        $personas = Persona::where('estado', '1')->get();
        $data = [
            'title' => 'REPORTE DE PERSONAS',
            'personas' => $personas
        ];
        
        $pdf = Pdf::loadView('pdf.persona', $data);
        return $pdf->stream('reporte.pdf');
    }
}
