<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilegio extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'slug', 'estado'];

    /**
     * The roles that belong to the Privilegio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Rol::class, 'rol_privilegio', 'id_rol', 'id_privilegio');
    }
}
