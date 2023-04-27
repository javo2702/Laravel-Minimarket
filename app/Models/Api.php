<?php

namespace App\Models;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    use HasFactory;
    private $baseurl;
    public function __construct()
    {
        $this->baseurl = env("API_ENDPOINT");
        $this->client = new Client([
            'base_uri' => $this->baseurl,
            'timeout' => 20.0,
        ]);
    }
    public function obtenerProductos(){
        $response = $this->client->request('GET', "productos");
        $data = json_decode($response->getBody());
        return $data;
    }
    public function obtenerProductosCategoria($id){
        $response = $this->client->request('GET', "productos?idCategoria=$id");
        $data = json_decode($response->getBody());
        return $data;
    }
    public function obtenerProductosNombre($nombre){
        $response = $this->client->request('GET', "productos?Nombre=$nombre");
        $data = json_decode($response->getBody());
        return $data;
    }
    public function obtenerProducto($id){
        $response = $this->client->request('GET', "productos/$id");
        $data = json_decode($response->getBody());
        return $data;
    }
    // public function obtenerStock($id){
    //     $response = $this->client->request('GET', "productos/$id");
    //     $data = json_decode($response->getBody());
    //     return $data->stock;
    // }
    public function actualizarStock($id,$cantidad){
        $response = $this->client->request('PUT', "productos/$id",['json'=> $cantidad]);
        $data = json_decode($response->getBody());
        //return $data->stock;
    }
}
