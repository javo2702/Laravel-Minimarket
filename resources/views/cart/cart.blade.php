@extends('templates.basics')
@section('title','Carrito de Compras')
@section('content')
    <div class="container">
        <h3>Contenido del Carrito de Compras</h3>
        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span> 
                </button>
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors0>all() as $error)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="row justify-content-center">
            <div class="contenedor-detalles">
                <br>
                @if(\Cart::getTotalQuantity()>0)
                    <h4>{{ \Cart::getTotalQuantity()}} Producto(s) en el carrito</h4><br>
                @else
                    <h4>No Product(s) In Your Cart</h4><br>
                    <a href="/" class="btn btn-dark">Continue en la tienda</a>
                @endif
                <hr>
                @foreach($cartCollection as $item)
                    <div class="detalle-pedido-carrito">
                        <div class="imagen-carrito">
                            <img src="{{asset('/imagenes/'.$item->image)}}" />
                        </div>
                        <div class="col-lg-5">
                            <p>
                                <b>{{ $item->name }}</b><br>
                                <b>Precio: </b>S/. {{ $item->price }}<br>
                                <b>Sub Total: </b>S/. {{ \Cart::get($item->id)->getPriceSum() }}<br>
                                {{--                                <b>With Discount: </b>${{ \Cart::get($item->id)->getPriceSumWithConditions() }}--}}
                            </p>
                        </div>
                        <div class="detalle-acciones">
                            <form action="{{ route('cart.update') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                    <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}"
                                            id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                                    <button class="btn btn-secondary btn-sm" style="margin-right: 25px;">Editar</button>
                                </div>
                            </form>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                <button class="btn btn-dark btn-sm" style="margin-right: 10px;">Eliminar</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                @endforeach
                @if(count($cartCollection)>0)
                    <form class="derecha" action="{{ route('cart.clear') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-terciario btn-md">Limpiar Carrito</button> 
                    </form>
                @endif
            </div>
            @if(count($cartCollection)>0)

                <div class="monto-total">
                    <p>Monto Total: S/. {{ \Cart::getTotal() }}</p>
                </div>
                <div class="redirecciones">
                    <a href="{{route('AllProducts')}}" class="btn btn-primario">Continuar Comprando</a>
                    <a href="{{route('PlaceOrder')}}" class="btn btn-secundario">Confirmar el Pedido</a>
                </div>
            @endif
        </div>
        <br><br>
    </div>
@endsection
