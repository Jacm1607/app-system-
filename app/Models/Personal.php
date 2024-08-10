<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_persona', 'id_area', 'id_servicio', 'estado'], 
    $table = 'personales';
    
    public function persona()
    {
        return $this->hasOne(Persona::class, 'id', 'id_persona');
    }
    public function servicio()
    {
        return $this->hasOne(Servicio::class, 'id', 'id_servicio');
    }
    
    public function area()
    {
        return $this->hasOne(Area::class, 'id', 'id_area');
    }
}
