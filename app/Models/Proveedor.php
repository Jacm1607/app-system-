<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedores';
    protected $fillable = ['idPersona', 'razon_social', 'empresa', 'estado'];

    public function persona()
    {
        return $this->hasOne(Persona::class, 'id', 'idPersona');
    }
}
