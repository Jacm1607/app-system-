<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Persona;

class ClienteController extends Controller
{
    public function index (Request $request) {
        privilegio('cliente-index');
        if (isset($request->cliente)) {
            $search = true;
            $clientes = Persona::where('nombre', 'LIKE', "%$request->cliente%")->orWhere('apellido', 'LIKE', "%$request->cliente%")->get();
        } else {
            $search = false;
            $clientes = Cliente::where('estado', '1')->get();
        }
        return view('cliente.index')->with('clientes', $clientes)->with('search', $search);
    }

    public function create() {
        privilegio('cliente-create');
        $personas = Persona::where('estado', '1')->get();
        return view('cliente.create')->with('personas', $personas);
    }

    public function store(Request $request) {
        privilegio('cliente-store');
        $request->validate([
            'id_persona' => 'required|unique:clientes,id_persona',
            'recurrente' => 'required|boolean',
            'fuente_referencia' => 'regex:/^[a-zA-Z]+$/u|max:255',
        ],[
            'id_persona.required' => 'Campo requerido.',
            'id_persona.unique' => 'Cliente registrado.',
            'recurrente.required' => 'Campo requerido.',
            'fuente_referencia.regex' => 'Solo se admite letras.'
        ]);
        $cliente = new Cliente();
        $cliente->id_persona = $request->id_persona;
        $cliente->recurrente = $request->recurrente;
        $cliente->fuente_referencia = $request->fuente_referencia ?? 'Ninguna';
        $cliente->save();
        return redirect()->route('cliente.index');
    }

    public function edit ($id) {
        privilegio('cliente-edit');
        $cliente = Cliente::findOrFail($id);
        $personas = Persona::where('estado', '1')->where('id', '!=', $cliente->id_persona)->get();
        return view('cliente.edit')->with('cliente', $cliente)->with('personas', $personas);
    }

    public function update (Request $request, $id) {
        privilegio('cliente-update');
        $request->validate([
            'id_persona' => 'required',
            'recurrente' => 'required|boolean',
            'fuente_referencia' => 'regex:/^[a-zA-Z]+$/u|max:255',
        ],[
            'id_persona.required' => 'Campo requerido.',
            //'id_persona.unique' => 'Cliente registrado.',
            'recurrente.required' => 'Campo requerido.',
            'fuente_referencia.regex' => 'Solo se admite letras.'
        ]);
        $cliente = Cliente::findOrFail($id);
        $cliente->id_persona = $request->id_persona;
        $cliente->recurrente = $request->recurrente;
        $cliente->fuente_referencia = $request->fuente_referencia ?? 'Ninguna';
        $cliente->update();
        return redirect()->route('cliente.index');
    }

    public function delete ($id) {
        privilegio('cliente-delete');
        $cliente = Cliente::findOrFail($id);
        $cliente->estado = '0';
        $cliente->update();
        return redirect()->route('cliente.index');
    }
}
