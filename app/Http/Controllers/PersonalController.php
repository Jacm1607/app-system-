<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Servicio;
use App\Models\Persona;
use App\Models\Area;

class PersonalController extends Controller
{
    public function index (Request $request) {
        // privilegio('personal-index');
        if (isset($request->personal)) {
            $search = true;
            $personales = Persona::where('nombre', 'LIKE', "%$request->personal%")->orWhere('apellido', 'LIKE', "%$request->personal%")
            //->where('estado', '1')
            ->get();
            //dd($personales[0]->personal->servicio);
        } else {
            $search = false;
            $personales = Personal::where('estado', '1')->get();
        }
        return view('personal.index')->with('personales', $personales)->with('search', $search);
    }
    
    public function create(Persona $persona) {
        $areas = Area::where('estado', '1')->get();
        $servicios = Servicio::where('estado', '1')->get();
        return view('personal.create')->with('servicios', $servicios)->with('persona', $persona)->with('areas', $areas);
    }
    
    public function edit ($id) {
        //privilegio('cliente-edit');
        $personal = Personal::findOrFail($id);
        $servicios = Servicio::where('estado', '1')->where('id', '!=', $personal->idServicio)->get();
        $areas = Area::where('estado', '1')->where('id', '!=', $personal->idArea)->get();
        return view('personal.edit')->with('personal', $personal)->with('servicios', $servicios)->with('areas', $areas);
    }
    
    public function update (Request $request, $id) {
        //privilegio('cliente-update');
        $request->validate([
            'idPersona' => 'required',
            'idServicio' => 'required',
        ],[
            'idPersona.required' => 'Campo requerido.',
            //'idPersona.unique' => 'Personal ya registrado.',
            'idServicio.required' => 'Campo requerido.',
        ]);
        $personal = Personal::findOrFail($id);
        $personal->idPersona = $request->idPersona;
        $personal->idServicio = $request->idServicio;
        $personal->idArea = $request->idArea;
        $personal->update();
        return redirect()->route('personal.index');
    }
    
    public function store(Request $request) {
        $request->validate([
            'idPersona' => 'required|unique:personales,idPersona',
            'idServicio' => 'required',
        ],[
            'idPersona.required' => 'Campo requerido.',
            'idPersona.unique' => 'Personal ya registrado.',
            'idServicio.required' => 'Campo requerido.',
        ]);
        $personal = new Personal();
        $personal->idPersona = $request->idPersona;
        $personal->idServicio = $request->idServicio;
        $personal->save();
        return redirect()->route('personal.index');
    }
    
    public function delete ($id) {
        //privilegio('cliente-delete');
        $personal = Personal::findOrFail($id);
        $personal->estado = '0';
        $personal->update();
        return redirect()->route('personal.index');
    }
}
