@if(count(\Cart::getContent()) > 0)
    @foreach(\Cart::getContent() as $item)
        <li class="list-group-item">
            <div class="contenedor-thumnail">
                <div class="img-thumnail">
                    <img src="{{asset('/imagenes/'.$item->image) }}">
                </div>
                <div class="info-thumnail">
                    <b>{{$item->name}}</b>
                    <br><small>Cantidad: {{$item->quantity}}</small>
                </div>
                <div class="precio-thumnail">
                    <p>S/. {{ \Cart::get($item->id)->getPriceSum() }}</p>
                </div>
                <div class="detalle-acciones">
                    <form class="detalle-acciones" action="{{ route('cart.update') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                            <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}"
                                    id="quantity" name="quantity" style="width: 40px; margin-right: 10px;">
                            <button class="btn btn-secondary btn-sm"><img src="{{asset('/img/editar.png')}}" alt="editar"></button>
                        </div>
                    </form>
                    <form class="detalle-acciones" action="{{ route('cart.remove') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                        <button class="btn btn-dark btn-sm"><img src="{{asset('/img/basura.png')}}" alt="eliminar"></button>
                    </form>
                </div>
            </div>
            <hr>
        </li>
    @endforeach
    <br>
    <li class="list-group-item">
        <div class="row">
            <div class="derecha">
                <p>Total: S/. {{ \Cart::getTotal() }}</p>
            </div>
            <div class="derecha">
                <form class="hide" action="{{ route('cart.index') }}">
                    <button class="btn btn-primario">Ver Carrito</button>
                </form>
                <form action="{{ route('cart.clear') }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-terciario">Limpiar Carrito</button>
                </form>
            </div>
        </div>
    </li>
    <br>
    <div class="pedido-btn" style="margin: 0px;">
        <a class="btn btn-secundario" href="{{route('PlaceOrder')}}">
            Continuar con el Pedido <i class="fa fa-arrow-right"></i>
        </a>
    </div>
@else
    <li class="list-group-item">Tu carrito esta vacío</li>
@endif
