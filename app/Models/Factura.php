<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $table = 'factura';
    public $timestamps = false;
    protected $fillable = [
        'idComprobante',
        'numeroRuc',
        'direccion',
        'nombre_RazonSocial'
    ];
}
