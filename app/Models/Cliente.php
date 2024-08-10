<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['id_persona', 'recurrente', 'fuente_referencia', 'estado'];

    public function persona()
    {
        return $this->hasOne(Persona::class, 'id', 'id_persona');
    }
}
