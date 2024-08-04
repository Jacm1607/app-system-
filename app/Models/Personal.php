<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    
    protected $fillable = ['idPersona', 'idArea', 'idServicio', 'estado'], 
    $table = 'personales';
    
    public function persona()
    {
        return $this->hasOne(Persona::class, 'id', 'idPersona');
    }
    public function servicio()
    {
        return $this->hasOne(Servicio::class, 'id', 'idServicio');
    }
    
    public function area()
    {
        return $this->hasOne(Area::class, 'id', 'idArea');
    }
}
