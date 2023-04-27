<?php

namespace App\Http\Controllers;
use App\Models\Api;
use App\Models\boleta;
use App\Models\Cliente;
use App\Models\comprobante;
use App\Models\Factura;
use App\Models\Pedido;
use App\Models\MetodoEntrega;
use App\Models\delivery;
use App\Models\DetallesPedido;
use App\Models\RecojoTienda;

use Carbon\Carbon;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function show()
    {
        // $api = new Api();
        // $request = $api->actualizarStock(5,"-10");
        return view('sales.pedido');
    }
    public function registrar(Request $req)
    {
        $idCliente = $this->llenarCliente($req);
        $idComprob = $this->llenarComprobante($req);
        $idMetodo = $this->llenarMetodoEntrega($req);
        $montoTotal = \Cart::getTotal();
        $estadoPedido = "Por entregar";
        $fechaPedido = Carbon::now()->toDateString();
        $pedido = Pedido::create([
            'idCliente' => $idCliente,
            'idComprobante' => $idComprob,
            'idMetodo' => $idMetodo,
            'montoTotal' => $montoTotal,
            'estadoPedido' => $estadoPedido,
            'fechaPedido' => $fechaPedido,
            'formapago' => $req->input('formapago')
        ]);
        $idPedido = Pedido::latest('idPedido')->first()->idPedido;
        $this->llenarDetalles($idPedido);
        \Cart::clear();
        return redirect()->route('Main');
    }
    private function llenarDetalles($idPedido){
        $api = new Api();
        foreach(\Cart::getContent() as $item){
            $api->actualizarStock($item->id,$item->quantity);
            $detalle = DetallesPedido::create([
                'idPedido' => $idPedido,
                'idProducto'=> $item->id,
                'cantidad' => $item->quantity
            ]);
        }
    }
    private function llenarCliente(Request $req){
        $apellidos = explode(" ",$req->input('apellidos'));
        $cliente = Cliente::create([
            'nomCliente' => $req->input('nombres'),
            'apPatCliente' => $apellidos[0],
            'apMatCliente' => $apellidos[1],
            'telefono' => $req->input('telefono'),
            'email' => $req->input('correo')
        ]);
        return Cliente::latest('idCliente')->first()->idCliente;

    }
    
    private function llenarComprobante(Request $req){
        $comprobante = comprobante::create([
            'tipoComprobante'=>$req->input('metodopago')
        ]);
        $idComprobante = comprobante::latest('idComprobante')->first()->idComprobante;
        if($req->input('metodopago')=="boleta"){
            $boleta = boleta::create([
                'idComprobante' => $idComprobante,
                'tipoDocumento' => $req->input('documentoidentidad'),
                'numDocumento' => $req->input('numerodocumento')
            ]);            
        }
        else{
            $factura = Factura::create([
                'idComprobante' => $idComprobante,
                'numeroRuc'=> $req->input('ruc'),
                'direccion'=> $req->input('direccion-factura'),
                'nombre_RazonSocial'=> $req->input('razonsocial')
            ]);
        }
        return $idComprobante;
    }


    private function llenarMetodoEntrega(Request $req) {
        $metodoEntrega = MetodoEntrega::create([
            'tipoMetodo'=>$req->input('entrega')
        ]);
        $idMetodo = MetodoEntrega::latest('idMetodo')->first()->idMetodo;
        if($req->input('entrega')=="delivery"){
            $delivery = delivery::create([
                'idMetodo' => $idMetodo,
                'fechaEntrega' => Carbon::now()->toDateString(),
                'direccion' => $req->input('direccion')
            ]);            
        }
        else{
            $recojoTienda = RecojoTienda::create([
                'idMetodo' => $idMetodo,
                'fechaRecojo' => $req->input('fechaRecojo')." ".$req->input('horaRecojo')
            ]);
        }
        return $idMetodo;
    }

    
}
