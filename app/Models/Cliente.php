<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['idPersona', 'recurrente', 'fuente_referencia', 'estado'];

    public function persona()
    {
        return $this->hasOne(Persona::class, 'id', 'idPersona');
    }
}
