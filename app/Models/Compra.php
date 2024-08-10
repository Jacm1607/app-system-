<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    
    protected $fillable = ['idProveedor', 'idUsuario', 'estado'];
    
        public function proveedor()
    {
        return $this->hasOne(Proveedor::class, 'id', 'idProveedor');
    }
}
