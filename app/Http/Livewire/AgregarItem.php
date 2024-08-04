<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Models\Servicio;
use App\Models\Personal;

class AgregarItem extends Component
{
    protected $listeners = ['getServices' => 'getServices'];
    
    public $idServicio = '';
    public $idPersona = '';
    public $idServicios = [];
    public $personas = [];
    public $buttonDisabled = true;
    
    public $cantidad;
    public $servicios;
    public $servicio;
    
    protected $rules = [
        'cantidad' => 'required|numeric|min:1|max:10',
        'idPersona' => 'required',
    ];
    
    protected $messages = [
        'cantidad.required' => 'La cantidad es requerida.',
        'cantidad.numeric' => 'Ingrese un numero valido.',
        'cantidad.min' => 'Valor minimo 1.',
        'cantidad.max' => 'Valor maximo 10.',
        'idPersona.required' => 'Campo requerido.',
    ];
    
    public function mount () {
        Session::forget('id_servicios');
        $this->cantidad = 1;
        $this->servicio = Servicio::where('estado','1')->first();
        $this->getServices();
        // $this->servicios = Servicio::where('estado','1')->get();
    }
    
    public function getServices() {
        $this->idServicios = Session::get('id_servicios') ?? $this->idServicios;
        // dd(Session::get('id_servicios'));
        $this->servicios = Servicio::where('estado','1')->whereNotIn('id', $this->idServicios)->get();
    }
    
    public function render()
    {
        return view('livewire.agregar-item');
    }
    
    public function updatedIdServicio() {
        $objetoSeleccionado = Servicio::find($this->idServicio);
        $personasObj = Personal::where('estado', '1')->where('idServicio', "$objetoSeleccionado->id")->get();
        //dd($personasObj);
        $this->personas = $personasObj;
        //dd($this->personas);
        $this->servicio = $objetoSeleccionado;
        $this->buttonDisabled = false;
    }
    
    public function save() {
         $this->validate();
        $__servicio = $this->servicio;
        // dd($__servicio);
        array_push($this->idServicios, $__servicio->id);
        Session::put('id_servicios', $this->idServicios);
        $__servicio->cantidad = $this->cantidad;
        $__servicio->persona = $this->idPersona;
        $__servicio->subtotal = $__servicio->precio * $this->cantidad;
        $servicio_ = json_decode($__servicio);
        $__servicios = Session::get('servicios');
        array_push($__servicios, $servicio_);
        Session::put('servicios', $__servicios);
        $this->emit('render');
        $this->getServices();
        $this->personas = [];
        $this->buttonDisabled = true;
        $this->cantidad = 1;
    }
}
