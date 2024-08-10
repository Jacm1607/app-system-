<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_proveedor', 'id_usuario', 'estado'];
    
        public function proveedor()
    {
        return $this->hasOne(Proveedor::class, 'id', 'id_proveedor');
    }
}
