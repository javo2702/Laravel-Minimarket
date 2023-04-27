<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function cart()  {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        //return view('cart.cart')->with(['cartCollection' => $cartCollection]);;
        return redirect()->route('AllProducts');
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        //return redirect()->route('cart.index')->with('success_msg', 'Producto Eliminado del Carrito!');
        return redirect()->route('AllProducts')->with('success_msg', 'Producto Eliminado del Carrito!');
    }

    public function add(Request$request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $request->img,
            'stock' => $request->stock
        ));
        //return redirect()->route('cart.index')->with('success_msg', 'Producto Agregado al Carrito!');
        return redirect()->route('AllProducts')->with('success_msg', 'Producto Agregado al Carrito!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        //return redirect()->route('cart.index')->with('success_msg', 'Carrito actualizado!');
        return redirect()->route('AllProducts')->with('success_msg', 'Carrito actualizado!');
    }

    public function clear(){
        \Cart::clear();
        //return redirect()->route('cart.index')->with('success_msg', 'Carrito limpiado!');
        return redirect()->route('AllProducts')->with('success_msg', 'Carrito limpiado!');
    }

}
