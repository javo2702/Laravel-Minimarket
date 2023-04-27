<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesPedido extends Model
{
    use HasFactory;
    protected $table = 'detallepedido';
    public $timestamps = false;
    protected $fillable = [
        'idPedido',
        'idProducto',
        'cantidad'
    ];
}
