<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class TablaDetalleCompra extends Component
{
    protected $listeners = ['render' => 'render'];
    public function render() {
        $total = 0;
        $productos = Session::get('productos');
        foreach ($productos as $producto) {
            $total += $producto->subtotal;
        }
        return view('livewire.tabla-detalle-compra', compact('productos', 'total'));
    }
    
    public function removerProducto($id) {
        $productos = Session::get('productos');
        $productos = array_filter($productos, function ($producto) use ($id) { return $producto->id != $id; });
        Session::put('productos', $productos);
        
        $id_productos = Session::get('id_productos');
        $indice = array_search($id, $id_productos);

        if ($indice !== false) {
            unset($id_productos[$indice]);
        }
        
        Session::put('id_productos', $id_productos);
        
        $this->emit('render');
        $this->emit('getProducts');
    }
}
