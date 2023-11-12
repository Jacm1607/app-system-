<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Persona;

class ClienteController extends Controller
{
    public function index (Request $request) {
        if (isset($request->cliente)) {
            $clientes = Cliente::where('razon_social', 'LIKE', "%$request->cliente%")->where('estado', '1')->get();
        } else {
            $clientes = Cliente::where('estado', '1')->get();
        }
        return view('cliente.index')->with('clientes', $clientes);
    }

    public function create() {
        $personas = Persona::where('estado', '1')->get();
        return view('cliente.create')->with('personas', $personas);
    }

    public function store(Request $request) {
        $request->validate([
            'idPersona' => 'required',
            'razon_social' => 'required|unique:clientes,razon_social|max:255',
            'nit' => 'required|unique:clientes,razon_social|max:255',
        ],[
            'idPersona.required' => 'Campo requerido.',
            'razon_social.unique' => 'Esta razon social ya esta siendo usada.',
            'razon_social.required' => 'Campo requerido.',
            'nit.unique' => 'Este NIT ya esta siendo usada.',
            'nit.required' => 'Campo requerido.'
        ]);
        $cliente = new Cliente();
        $cliente->idPersona = $request->idPersona;
        $cliente->razon_social = $request->razon_social;
        $cliente->nit = $request->nit;
        $cliente->save();
        return redirect()->route('cliente.index');
    }

    public function edit ($id) {
        $cliente = Cliente::findOrFail($id);
        $personas = Persona::where('estado', '1')->where('id', '!=', $cliente->idPersona)->get();
        return view('cliente.edit')->with('cliente', $cliente)->with('personas', $personas);
    }

    public function update (Request $request, $id) {
        $cliente = Cliente::findOrFail($id);
        $cliente->idPersona = $request->idPersona;
        $cliente->razon_social = $request->razon_social;
        $cliente->nit = $request->nit;
        $cliente->update();
        return redirect()->route('cliente.index');
    }

    public function delete ($id) {
        $cliente = Cliente::findOrFail($id);
        $cliente->estado = '0';
        $cliente->update();
        return redirect()->route('cliente.index');
    }
}
