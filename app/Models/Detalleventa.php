<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalleventa extends Model
{
    use HasFactory;
    
    protected $fillable = ['idVenta', 'nombre', 'personal', 'cantidad', 'precio', 'subtotal', 'estado'];
}
