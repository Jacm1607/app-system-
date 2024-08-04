<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index (Request $request) {
        privilegio('producto-index');
        if (isset($request->producto)) {
            $productos = Producto::where('nombre', 'LIKE', "%$request->producto%")->where('estado', '1')->get();
        } else {
            $productos = Producto::where('estado', '1')->get();
        }
        return view('producto.index')->with('productos', $productos);
    }

    public function create() {
        privilegio('producto-create');
        return view('producto.create');
    }

    public function store(Request $request) {
        privilegio('producto-store');
        $request->validate([
            'nombre' => 'required|unique:productos,nombre|max:255',
            'cantidad' => 'required|numeric|min:1',
            'precio_compra' => 'required|between:0,99999999.99'
        ],[
            'nombre.unique' => 'Este nombre ya esta siendo usado.',
            'nombre.required' => 'Campo requerido.',
            'cantidad.required' => 'Campo requerido.',
            'cantidad.numeric' => 'Ingrese un numero.',
            'cantidad.min' => 'Valor minimo 1.',
            'precio_compra.required' => 'Campo requerido.',
            'precio_compra.between' => 'Rango no permitido.',
        ]);
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->precio_compra = $request->precio_compra;
        $producto->cantidad = $request->cantidad;
        $producto->save();
        return redirect()->route('producto.index');
    }

    public function edit ($id) {
        privilegio('producto-edit');
        $producto = Producto::findOrFail($id);
        return view('producto.edit')->with('producto', $producto);
    }

    public function update (Request $request, $id) {
        privilegio('producto-update');
        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->precio_compra = $request->precio_compra;
        $producto->cantidad = $request->cantidad;
        $producto->update();
        return redirect()->route('producto.index');
    }

    public function delete ($id) {
        privilegio('producto-delete');
        $producto = Producto::findOrFail($id);
        $producto->estado = '0';
        $producto->update();
        return redirect()->route('producto.index');
    }
}
