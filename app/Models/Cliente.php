<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['idPersona', 'razon_social', 'nit', 'estado'];

    public function persona()
    {
        return $this->hasOne(Persona::class, 'id', 'idPersona');
    }
}
