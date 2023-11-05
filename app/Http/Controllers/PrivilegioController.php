<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Privilegio;

class PrivilegioController extends Controller
{
    public function index (Request $request) {
        if (isset($request->privilegio)) {
            $privilegios = Privilegio::where('nombre', 'LIKE', "%$request->privilegio%")->where('estado', '1')->get();
        } else {
            $privilegios = Privilegio::where('estado', '1')->get();
        }
        return view('privilegio.index')->with('privilegios', $privilegios);
    }

    public function create() {
        return view('privilegio.create');
    }

    public function store(Request $request) {
        $privilegio = new Privilegio();
        $privilegio->nombre = $request->nombre;
        $privilegio->save();
        return redirect()->route('privilegio.index');
    }

    public function edit ($id) {
        $privilegio = Privilegio::findOrFail($id);
        return view('privilegio.edit')->with('privilegio', $privilegio);
    }

    public function update (Request $request, $id) {
        $privilegio = Privilegio::findOrFail($id);
        $privilegio->nombre = $request->nombre;
        $privilegio->update();
        return redirect()->route('privilegio.index');
    }

    public function delete ($id) {
        $privilegio = Privilegio::findOrFail($id);
        $privilegio->estado = '0';
        $privilegio->update();
        return redirect()->route('privilegio.index');
    }
}
