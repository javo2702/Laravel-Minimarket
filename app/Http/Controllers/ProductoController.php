<?php

namespace App\Http\Controllers;
use App\Models\Api;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductoController extends Controller
{
    public function index(){
        $api = new Api();
        $productos = $api->obtenerProductos();
        $categorias = $this->obtenerCategorias();
        return view('products.index',compact('productos','categorias'));
    }
    public function mostrarProducto($id){
        $api = new Api();
        $producto = $api->obtenerProducto($id);
        return view('products.show',compact('producto'));
    }
    public function mostrarProductosCategoria($id){
        $api = new Api();
        $productos = $api->obtenerProductosCategoria($id);
        $categorias = $this->obtenerCategorias();
        return view('products.index',compact('productos','categorias'));
    }
    public function mostrarProductosNombre(Request $req){
        $api = new Api();
        $productos = $api->obtenerProductosNombre($req->input('nombre-buscar'));
        $categorias = $this->obtenerCategorias();
        return view('products.index',compact('productos','categorias'));
    }
    private function obtenerCategorias(){
        $categorias = Categoria::all();
        return $categorias;
    }
}
