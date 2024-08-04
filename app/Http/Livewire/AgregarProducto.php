<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Models\Producto;

class AgregarProducto extends Component
{
    protected $listeners = ['getProducts' => 'getProducts'];
     
    public $idProducto = '';
    public $idProductos = [];
    public $buttonDisabled = true;
    
    public $cantidad;
    public $productos;
    public $producto;
    
    protected $rules = [
        'cantidad' => 'required|numeric|min:1',
    ];
    
    protected $messages = [
        'cantidad.required' => 'La cantidad es requerida.',
        'cantidad.numeric' => 'Ingrese un numero valido.',
        'cantidad.min' => 'Valor minimo 1.',
    ];
    
    public function mount() {
        Session::forget('id_productos');
        $this->cantidad = 1;
        $this->producto = Producto::where('estado','1')->first();
        $this->getProducts();
    }
    
    public function getProducts() {
        $this->idProductos = Session::get('id_productos') ?? $this->idProductos;
        $this->productos = Producto::where('estado','1')->whereNotIn('id', $this->idProductos)->get();
    }
    
     public function updatedIdProducto() {
        $objetoSeleccionado = Producto::find($this->idProducto);
        $this->producto = $objetoSeleccionado;
        $this->buttonDisabled = false;
    }
    
    public function render()
    {
        return view('livewire.agregar-producto');
    }
    
    public function save() {
        $this->validate();
        $__producto = $this->producto;
        // dd($__producto);
        array_push($this->idProductos, $__producto->id);
        Session::put('id_productos', $this->idProductos);
        $__producto->cantidad = $this->cantidad;
        $__producto->subtotal = $__producto->precio_compra * $this->cantidad;
        $producto_ = json_decode($__producto);
        $__productos = Session::get('productos');
        array_push($__productos, $producto_);
        Session::put('productos', $__productos);
        $this->emit('render');
        $this->getProducts();
        $this->buttonDisabled = true;
    }
}
