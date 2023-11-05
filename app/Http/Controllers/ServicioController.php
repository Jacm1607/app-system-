<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
    public function index (Request $request) {
        if (isset($request->servicio)) {
            $servicios = Servicio::where('nombre', 'LIKE', "%$request->servicio%")->where('estado', '1')->get();
        } else {
            $servicios = Servicio::where('estado', '1')->get();
        }
        return view('servicio.index')->with('servicios', $servicios);
    }

    public function create() {
        return view('servicio.create');
    }

    public function store(Request $request) {
        $servicio = new Servicio();
        $servicio->nombre = $request->nombre;
        $servicio->save();
        return redirect()->route('servicio.index');
    }

    public function edit ($id) {
        $servicio = Servicio::findOrFail($id);
        return view('servicio.edit')->with('servicio', $servicio);
    }

    public function update (Request $request, $id) {
        $servicio = Servicio::findOrFail($id);
        $servicio->nombre = $request->nombre;
        $servicio->update();
        return redirect()->route('servicio.index');
    }

    public function delete ($id) {
        $servicio = Servicio::findOrFail($id);
        $servicio->estado = '0';
        $servicio->update();
        return redirect()->route('servicio.index');
    }
}
