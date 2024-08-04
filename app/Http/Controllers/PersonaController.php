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
            'idTipoPersona' => 'required',
        ],[
            'nombre.required' => 'Campo requerido.',
            'nombre.regex' => 'Ingrese solo letras, no esta permitido otro caracteres especiales.',
            'apellido.required' => 'Campo requerido.',
            'apellido.regex' => 'Ingrese solo letras, no esta permitido otro caracteres especiales.',
            'celular.required' => 'Campo requerido.',
            'celular.numeric' => 'Ingrese solo numeros.',
            'celular.regex' => 'Ingrese un número válido.',
            'fecha_nac.required' => 'Campo requerido.',
            'idTipoPersona.required' => 'Campo requerido.'
        ]);
        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->celular = $request->celular;
        $persona->fecha_nac = $request->fecha_nac;
        $persona->idTipoPersona = $request->idTipoPersona;
        $persona->save();
        if($request->idTipoPersona == 1){
            $personal = new Personal();
            $personal->idPersona = $persona->id;
            $personal->idServicio = 0;
            $personal->idArea = 0;
            $personal->save();
            return redirect()->route('personal.edit', $personal->id);
        } else {
            $cliente = new Cliente();
            $cliente->idPersona = $persona->id;
            $cliente->recurrente = 0;
            $cliente->fuente_referencia = 'Ninguna';
            $cliente->save();
            return redirect()->route('cliente.edit', $cliente->id);
        }
    }

    public function edit ($id) {
        privilegio('persona-edit');
        $persona = Persona::findOrFail($id);
        $tipo_persona = TipoPersona::where('estado', '1')->where('id', '!=', $persona->idTipoPersona)->get();
        return view('persona.edit')->with('persona', $persona)->with('tipo_persona', $tipo_persona);
    }

    public function update (Request $request, $id) {
        privilegio('persona-update');
        $persona = Persona::findOrFail($id);
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->celular = $request->celular;
        $persona->fecha_nac = $request->fecha_nac;
        $persona->idTipoPersona = $request->idTipoPersona;
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
