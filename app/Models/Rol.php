<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Rol extends Model
{
    use HasFactory;
    protected $table = "roles";
    protected $fillable = ['nombre', 'estado'];

    /**
     * The privilegios that belong to the Rol
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function privilegios(): BelongsToMany
    {
        return $this->belongsToMany(Privilegio::class, 'rol_privilegio', 'idRol', 'idPrivilegio');
    }
}
