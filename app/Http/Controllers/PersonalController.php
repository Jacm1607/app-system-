<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Servicio;
use App\Models\Persona;
use App\Models\Area;
use PDF;

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
            $personales = Personal::where('estado', '1')->orderBy('id', 'desc')->paginate(10);
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
        $servicios = Servicio::where('estado', '1')->where('id', '!=', $personal->id_servicio)->get();
        $areas = Area::where('estado', '1')->where('id', '!=', $personal->id_area)->get();
        return view('personal.edit')->with('personal', $personal)->with('servicios', $servicios)->with('areas', $areas);
    }
    
    public function update (Request $request, $id) {
        //privilegio('cliente-update');
        $request->validate([
            'id_persona' => 'required',
            'id_servicio' => 'required',
        ],[
            'id_persona.required' => 'Campo requerido.',
            //'id_persona.unique' => 'Personal ya registrado.',
            'id_servicio.required' => 'Campo requerido.',
        ]);
        $personal = Personal::findOrFail($id);
        $personal->id_persona = $request->id_persona;
        $personal->id_servicio = $request->id_servicio;
        $personal->id_area = $request->id_area;
        $personal->update();
        return redirect()->route('personal.index');
    }
    
    public function store(Request $request) {
        $request->validate([
            'id_persona' => 'required|unique:personales,id_persona',
            'id_servicio' => 'required',
        ],[
            'id_persona.required' => 'Campo requerido.',
            'id_persona.unique' => 'Personal ya registrado.',
            'id_servicio.required' => 'Campo requerido.',
        ]);
        $personal = new Personal();
        $personal->id_persona = $request->id_persona;
        $personal->id_servicio = $request->id_servicio;
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
   public function pdf() {
        $personal = Personal::where('estado', '1')->get();
        //dd($personal);
        $data = [
            'title' => 'REPORTE DE PERSONAL',
            'user' => auth()->user()->persona->nombre . ' ' . auth()->user()->persona->apellido,
            'personales' => $personal
        ];
        
        $pdf = Pdf::loadView('pdf.personal', $data);
        return $pdf->stream('reporte.pdf');
    }
}
