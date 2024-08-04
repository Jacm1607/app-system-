<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = ['idTipoPersona', 'nombre', 'apellido', 'celular', 'ci', 'fecha_nac', 'estado'];
    
    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'idPersona', 'id');
    }
    
    public function personal()
    {
        return $this->hasOne(Personal::class, 'idPersona', 'id');
    }
    
       public function tipo()
    {
        return $this->hasOne(TipoPersona::class, 'id', 'idTipoPersona');
    }
}
