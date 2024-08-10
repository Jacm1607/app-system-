<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Servicio;
use App\Models\Cliente;
use App\Models\Detalleventa;
use Illuminate\Support\Facades\Session;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        privilegio('venta-index');
        if (isset($request->venta)) {
            $ventas = Venta::where('id', "$request->venta")->where('estado', '1')->orderBy('id', 'DESC')->paginate(10);
        } else {
            $ventas = Venta::where('estado', '1')->orderBy('id', 'DESC')->paginate(10);
        }
        return view('venta.index')->with('ventas', $ventas);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        privilegio('venta-create');
        $servicios = Session::put('servicios', []);
        $servicios = Servicio::where('estado', '1')->get();
        $clientes = Cliente::where('estado', '1')->get();
        return view('venta.create')->with('servicios', $servicios)->with('clientes', $clientes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        privilegio('venta-store');
        $request->validate([
            'id_cliente' => 'required',
        ],[
            'id_cliente.required' => 'Campo requerido.',
        ]);
        $venta = new Venta();
        $venta->id_usuario = $request->id_usuario;
        $venta->id_cliente = $request->id_cliente;
        $venta->created_at = $request->fecha;
        $venta->save();
        $servicios = Session::get('servicios');
        
        foreach ($servicios as $servicio) {
            $detalleventa = new Detalleventa();
            $detalleventa->id_venta = $venta->id;
            $detalleventa->nombre = $servicio->nombre;
            $detalleventa->personal = $servicio->persona;
            $detalleventa->cantidad = $servicio->cantidad;
            $detalleventa->precio = $servicio->precio;
            $detalleventa->subtotal = $servicio->precio * $servicio->cantidad;
            $detalleventa->save();
        }
        return redirect()->route('venta.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        privilegio('venta-show');
        $venta = Venta::findOrFail($id);
        $detalles = Detalleventa::where('id_venta', $venta->id)->get();
        return view('venta.show')->with('venta', $venta)->with('detalles', $detalles);
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
        privilegio('venta-delete');
        $venta = Venta::findOrFail($id);
        $venta->estado = '0';
        $venta->update();
        return redirect()->route('venta.index');
    }
    
}
