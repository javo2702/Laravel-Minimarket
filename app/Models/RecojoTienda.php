<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecojoTienda extends Model
{
    use HasFactory;
    protected $table = 'recojotienda';
    public $timestamps = false;
    protected $fillable = [
        'idMetodo',
        'fechaRecojo'
    ];
}
