<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = ['idServicio', 'nombre', 'apellido', 'celular', 'ci', 'fecha_nac', 'estado'];
    
       public function servicio()
    {
        return $this->hasOne(Servicio::class, 'id', 'idServicio');
    }
}
