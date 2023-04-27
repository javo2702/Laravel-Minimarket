<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\ProductoModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $id1 = random_int(1,3);
        $id2 = random_int(4,6);
        $productos1 = ProductoModel::where('idCategoria',$id1)->take(4)->get();
        $productos2 = ProductoModel::where('idCategoria',$id2)->take(4)->get();
        $categoria1 = Categoria::where('idCategoria',$id1)->first();
        $categoria2 = Categoria::where('idCategoria',$id2)->first();
        return view('home',compact('productos1','productos2','categoria1','categoria2'));
    }
}
