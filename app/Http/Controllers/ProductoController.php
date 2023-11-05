<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index () {
        $productos = Producto::where('estado', '1')->get();
        return view('producto.index')->with('productos', $productos);
    }

    public function create() {
        return view('producto.create');
    }

    public function store(Request $request) {
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
