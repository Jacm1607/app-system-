<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class TablaDetalleVenta extends Component
{
    protected $listeners = ['render' => 'render'];
    public function render() {
        $total = 0;
        $servicios = Session::get('servicios');
        foreach ($servicios as $servicio) {
            $total += $servicio->subtotal;
        }
        return view('livewire.tabla-detalle-venta', compact('servicios', 'total'));
    }
    
    public function removerUsuario($id) {
        // dd($id);
        $servicios = Session::get('servicios');
        $servicios = array_filter($servicios, function ($servicio) use ($id) { return $servicio->id != $id; });
        Session::put('servicios', $servicios);
        
        $id_servicios = Session::get('id_servicios');
        $indice = array_search($id, $id_servicios);

        if ($indice !== false) {
            unset($id_servicios[$indice]);
        }
        
        Session::put('id_servicios', $id_servicios);
        
        $this->emit('render');
        $this->emit('getServices');
    }
}
