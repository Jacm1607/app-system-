<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index (Request $request) {
        if (isset($request->producto)) {
            $productos = Producto::where('nombre', 'LIKE', "%$request->producto%")->where('estado', '1')->get();
        } else {
            $productos = Producto::where('estado', '1')->get();
        }
        return view('producto.index')->with('productos', $productos);
    }

    public function create() {
        return view('producto.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|unique:productos,nombre|max:255',
        ],[
            'nombre.unique' => 'Este nombre ya esta siendo usado.',
            'nombre.required' => 'Campo requerido.'
        ]);
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->save();
        return redirect()->route('producto.index');
    }

    public function edit ($id) {
        $producto = Producto::findOrFail($id);
        return view('producto.edit')->with('producto', $producto);
    }

    public function update (Request $request, $id) {
        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->update();
        return redirect()->route('producto.index');
    }

    public function delete ($id) {
        $producto = Producto::findOrFail($id);
        $producto->estado = '0';
        $producto->update();
        return redirect()->route('producto.index');
    }
}
