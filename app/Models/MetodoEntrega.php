<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoEntrega extends Model
{
    use HasFactory;
    protected $table = 'metodoentrega';
    public $timestamps = false;
    protected $fillable = [
        'tipoMetodo'
    ];
}
