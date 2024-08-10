<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = ['id_tipo_persona', 'nombre', 'apellido', 'celular', 'ci', 'fecha_nac', 'estado'];
    
    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id_persona', 'id');
    }
    
    public function personal()
    {
        return $this->hasOne(Personal::class, 'id_persona', 'id');
    }
    
       public function tipo()
    {
        return $this->hasOne(TipoPersona::class, 'id', 'id_tipo_persona');
    }
}
