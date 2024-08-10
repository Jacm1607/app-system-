<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_cliente', 'id_usuario', 'estado'];
    
        public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id', 'id_cliente');
    }
}
