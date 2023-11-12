<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    public function index (Request $request) {
        if (isset($request->area)) {
            $areas = Area::where('nombre', 'LIKE', "%$request->area%")->where('estado', '1')->get();
        } else {
            $areas = Area::where('estado', '1')->get();
        }
        return view('area.index')->with('areas', $areas);
    }

    public function create() {
        return view('area.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|unique:areas,nombre|max:255',
        ],[
            'nombre.unique' => 'Este nombre ya esta siendo usado.',
            'nombre.required' => 'Campo requerido.'
        ]);
        $area = new Area();
        $area->nombre = $request->nombre;
        $area->save();
        return redirect()->route('area.index');
    }

    public function edit ($id) {
        $area = Area::findOrFail($id);
        return view('area.edit')->with('area', $area);
    }

    public function update (Request $request, $id) {
        $area = Area::findOrFail($id);
        $area->nombre = $request->nombre;
        $area->update();
        return redirect()->route('area.index');
    }

    public function delete ($id) {
        $area = Area::findOrFail($id);
        $area->estado = '0';
        $area->update();
        return redirect()->route('area.index');
    }
}
