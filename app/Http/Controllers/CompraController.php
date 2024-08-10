<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\Detallecompra;
use App\Models\Producto;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        privilegio('compra-index');
        if (isset($request->compra)) {
            $compras = Compra::where('id', "$request->compra")->where('estado', '1')->orderBy('id', 'DESC')->paginate(10);
        } else {
            $compras = Compra::where('estado', '1')->orderBy('id', 'DESC')->paginate(10);
        }
        return view('compra.index')->with('compras', $compras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        privilegio('compra-create');
        $compras = Session::put('productos', []);
        $compras = Compra::where('estado', '1')->get();
        $proveedores = Proveedor::where('estado', '1')->get();
        return view('compra.create')->with('compras', $compras)->with('proveedores', $proveedores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        privilegio('compra-store');
        $request->validate([
            'id_proveedor' => 'required',
        ],[
            'id_proveedor.required' => 'Campo requerido.',
        ]);
        $compra = new Compra();
        $compra->id_usuario = $request->id_usuario;
        $compra->id_proveedor = $request->id_proveedor;
        $compra->created_at = $request->fecha;
        $compra->save();
        $productos = Session::get('productos');
        
        foreach ($productos as $producto) {
            $detallecompra = new Detallecompra();
            $detallecompra->id_compra = $compra->id;
            $detallecompra->nombre = $producto->nombre;
            $detallecompra->cantidad = $producto->cantidad;
            $detallecompra->precio = $producto->precio_compra;
            $detallecompra->subtotal = $producto->precio_compra * $producto->cantidad;
            $detallecompra->save();
            
            
            $registro = Producto::findOrFail($producto->id);
            $registro->cantidad += $producto->cantidad;;
            $registro->update();
        }
        return redirect()->route('compra.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        privilegio('compra-show');
        $compra = Compra::findOrFail($id);
        $detalles = Detallecompra::where('id_compra', $compra->id)->get();
        return view('compra.show')->with('compra', $compra)->with('detalles', $detalles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        privilegio('compra-delete');
        $compra = Compra::findOrFail($id);
        $compra->estado = '0';
        $compra->update();
        return redirect()->route('compra.index');
    }
}
