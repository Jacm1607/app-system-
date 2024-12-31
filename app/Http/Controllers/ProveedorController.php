<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Persona;

class ProveedorController extends Controller
{
    public function index (Request $request) {
        privilegio('proveedor-index');
        if (isset($request->razon_social)) {
            $proveedores = Proveedor::where('razon_social', 'LIKE', "%$request->razon_social%")->where('estado', '1')->get();
        } else {
            $proveedores = Proveedor::where('estado', '1')->get();
        }
        return view('proveedor.index')->with('proveedores', $proveedores);
    }

    public function create() {
        privilegio('proveedor-create');
        return view('proveedor.create');
    }

    public function store(Request $request) {
        privilegio('proveedor-store');
        $request->validate([
            'razon_social' => 'required|unique:proveedores,razon_social|max:255',
            'nit' => 'required|unique:proveedores,nit|max:999999999999999|numeric',
        ],[
            'razon_social.unique' => 'Esta razon social ya esta siendo usada.',
            'razon_social.required' => 'Campo requerido.',
            'nit.unique' => 'Este NIT ya esta siendo usada.',
            'nit.required' => 'Campo requerido',
            'nit.max' => 'Maximo 15 caracteres.'
        ]);
        $proveedor = new Proveedor();
        $proveedor->razon_social = $request->razon_social;
        $proveedor->nit = $request->nit;
        $proveedor->save();
        return redirect()->route('proveedor.index');
    }

    public function edit ($id) {
        privilegio('proveedor-edit');
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedor.edit')->with('proveedor', $proveedor);
    }

    public function update (Request $request, $id) {
        privilegio('proveedor-update');
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->razon_social = $request->razon_social;
        $proveedor->nit = $request->nit;
        $proveedor->update();
        return redirect()->route('proveedor.index');
    }

    public function delete ($id) {
        privilegio('proveedor-delete');
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->estado = '0';
        $proveedor->update();
        return redirect()->route('proveedor.index');
    }
}
