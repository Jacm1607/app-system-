<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
    public function index (Request $request) {
        privilegio('servicio-index');
        if (isset($request->servicio)) {
            $servicios = Servicio::where('nombre', 'LIKE', "%$request->servicio%")->where('estado', '1')->get();
        } else {
            $servicios = Servicio::where('estado', '1')->get();
        }
        return view('servicio.index')->with('servicios', $servicios);
    }

    public function create() {
        privilegio('servicio-create');
        return view('servicio.create');
    }

    public function store(Request $request) {
        privilegio('servicio-store');
        $request->validate([
            'nombre' => 'required|unique:servicios,nombre|max:255',
            'precio' => 'required|numeric',
        ],[
            'nombre.unique' => 'Este nombre ya esta siendo usado.',
            'nombre.required' => 'Campo requerido.',
            'precio.required' => 'Campo requerido.',
            'precio.numeric' => 'Ingresa números.'
        ]);
        $servicio = new Servicio();
        $servicio->nombre = $request->nombre;
        $servicio->precio = $request->precio;//Rinomodelacion
        $servicio->save();
        return redirect()->route('servicio.index');
    }

    public function edit ($id) {
        privilegio('servicio-edit');
        $servicio = Servicio::findOrFail($id);
        return view('servicio.edit')->with('servicio', $servicio);
    }

    public function update (Request $request, $id) {
        privilegio('servicio-show');
        $servicio = Servicio::findOrFail($id);
        $servicio->nombre = $request->nombre;
        $servicio->precio = $request->precio;
        $servicio->update();
        return redirect()->route('servicio.index');
    }

    public function delete ($id) {
        privilegio('servicio-delete');
        $servicio = Servicio::findOrFail($id);
        $servicio->estado = '0';
        $servicio->update();
        return redirect()->route('servicio.index');
    }
}
