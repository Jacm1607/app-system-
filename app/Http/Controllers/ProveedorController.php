<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Persona;

class ProveedorController extends Controller
{
    public function index () {
        $proveedores = Proveedor::where('estado', '1')->get();
        return view('proveedor.index')->with('proveedores', $proveedores);
    }

    public function create() {
        $personas = Persona::where('estado', '1')->get();
        return view('proveedor.create')->with('personas', $personas);
    }

    public function store(Request $request) {
        $proveedor = new Proveedor();
        $proveedor->idPersona = $request->idPersona;
        $proveedor->razon_social = $request->razon_social;
        $proveedor->empresa = $request->empresa;
        $proveedor->save();
        return redirect()->route('proveedor.index');
    }

    public function edit ($id) {
        $proveedor = Proveedor::findOrFail($id);
        $personas = Persona::where('estado', '1')->where('id', '!=', $proveedor->idPersona)->get();
        return view('proveedor.edit')->with('proveedor', $proveedor)->with('personas', $personas);
    }

    public function update (Request $request, $id) {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->idPersona = $request->idPersona;
        $proveedor->razon_social = $request->razon_social;
        $proveedor->empresa = $request->empresa;
        $proveedor->update();
        return redirect()->route('proveedor.index');
    }

    public function delete ($id) {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->estado = '0';
        $proveedor->update();
        return redirect()->route('proveedor.index');
    }
}
