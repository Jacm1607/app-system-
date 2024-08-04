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
            'idPersona' => 'required|unique:clientes,idPersona',
            'recurrente' => 'required|boolean',
            'fuente_referencia' => 'regex:/^[a-zA-Z]+$/u|max:255',
        ],[
            'idPersona.required' => 'Campo requerido.',
            'idPersona.unique' => 'Cliente registrado.',
            'recurrente.required' => 'Campo requerido.',
            'fuente_referencia.regex' => 'Solo se admite letras.'
        ]);
        $cliente = new Cliente();
        $cliente->idPersona = $request->idPersona;
        $cliente->recurrente = $request->recurrente;
        $cliente->fuente_referencia = $request->fuente_referencia ?? 'Ninguna';
        $cliente->save();
        return redirect()->route('cliente.index');
    }

    public function edit ($id) {
        privilegio('cliente-edit');
        $cliente = Cliente::findOrFail($id);
        $personas = Persona::where('estado', '1')->where('id', '!=', $cliente->idPersona)->get();
        return view('cliente.edit')->with('cliente', $cliente)->with('personas', $personas);
    }

    public function update (Request $request, $id) {
        privilegio('cliente-update');
        $request->validate([
            'idPersona' => 'required',
            'recurrente' => 'required|boolean',
            'fuente_referencia' => 'regex:/^[a-zA-Z]+$/u|max:255',
        ],[
            'idPersona.required' => 'Campo requerido.',
            //'idPersona.unique' => 'Cliente registrado.',
            'recurrente.required' => 'Campo requerido.',
            'fuente_referencia.regex' => 'Solo se admite letras.'
        ]);
        $cliente = Cliente::findOrFail($id);
        $cliente->idPersona = $request->idPersona;
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
