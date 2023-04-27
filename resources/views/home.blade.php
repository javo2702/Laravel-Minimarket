@extends('templates.basics')
@section('title','Home Minimarket Carlitos')
@section('content')
    <main>
        <div class="hero">
            <div class="hero-c">
                <div class="flexbox">
                    <img width="450px" class="home-hero-1" src="{{asset('/img/home-hero-1.png')}}" alt="Minimarket Carlitos">
                    <img width="300px" class="home-hero-2" src="{{asset('/img/home-hero-2.png')}}" alt="Minimarket Carlitos">
                    <h2 class="hero-food">FOOD</h2>
                    <div class="hero-text">
                        <h2 class="hero-super">Super</h2>
                        <h2 class="hero-promociones">Promociones</h2>
                    </div>
                </div>
            </div>

        </div>
        <div class="some-products">
            <h1 class="title-home">Productos con mas demanda segun Categoria</h2>
            <div class="productos-categoria">
                <div class="nombre-categoria">
                    <h3>{{$categoria1->nomCategoria}}</h3>
                </div>
                <div class="catalogo-container">    
                    @foreach($productos1 as $producto)
                    {{-- {{$imagenurl='/imagenes/'.$producto->imagen}} --}} 
                    <div class="producto-modal hide">
                        <div class="mostrar-producto">
                            <span class="closeModal">&times</span>
                            <div class="info-producto">
                                <div class="producto-izquierda">
                                    <img src="{{asset('/imagenes/'.$producto->imagen)}}" />
                                </div>
                                <div class="producto-derecha">
                                    <p>{{$producto->nomProducto}}</p>
                                    <p>{{$producto->descProducto}}</p>
                                    <h1>S/. {{$producto->precio}}</h1>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $producto->idProducto }}" id="id" name="id">
                                        <input type="hidden" value="{{ $producto->nomProducto }}" id="name" name="name">
                                        <input type="hidden" value="{{ $producto->precio }}" id="price" name="price">
                                        <input type="hidden" value="{{ $producto->imagen }}" id="img" name="img">
                                        <input type="hidden" value="{{$producto->stock}}" id="stock" name="stock">
                                        <div>
                                            <label for="">Elija la Cantidad: </label>
                                            <input class="input-cantidad" type="number" value="1" min="1" max="{{ $producto->stock }}" id="quantity" name="quantity">
                                        </div>
                                        <button class="btn btn-secondary btn-sm" class="tooltip-test" title="Agregar al carrito">
                                            <i class="fa fa-shopping-cart"></i> Agregar al Carrito
                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="caja caja1">
                        <img src="{{asset('/imagenes/'.$producto->imagen)}}" />
                        <p>{{$producto->nomProducto}}</p>
                        <h1>S/. {{$producto->precio}}</h1>
                        <a class="button abrir-modal">Agregar</a>
                    </div>
                    @endforeach
                </div>
                <div class="ver-todos">
                    <a href="{{route('CategoryProducts',$categoria1->idCategoria)}}" class="btn btn-primario">Ver Todos</a>
                </div>
                
            </div>
            <div class="productos-categoria">
                <div class="nombre-categoria">
                    <h3>{{$categoria2->nomCategoria}}</h3>
                </div>
                <div class="catalogo-container">
                    @foreach($productos2 as $producto)
                    {{-- {{$imagenurl='/imagenes/'.$producto->imagen}} --}} 
                    <div class="producto-modal hide">
                        <div class="mostrar-producto">
                            <span class="closeModal">&times</span>
                            <div class="info-producto">
                                <div class="producto-izquierda">
                                    <img src="{{asset('/imagenes/'.$producto->imagen)}}" />
                                </div>
                                <div class="producto-derecha">
                                    <p>{{$producto->nomProducto}}</p>
                                    <p>{{$producto->descProducto}}</p>
                                    <h1>S/. {{$producto->precio}}</h1>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $producto->idProducto }}" id="id" name="id">
                                        <input type="hidden" value="{{ $producto->nomProducto }}" id="name" name="name">
                                        <input type="hidden" value="{{ $producto->precio }}" id="price" name="price">
                                        <input type="hidden" value="{{ $producto->imagen }}" id="img" name="img">
                                        <input type="hidden" value="{{$producto->stock}}" id="stock" name="stock">
                                        <div>
                                            <label for="">Elija la Cantidad: </label>
                                            <input class="input-cantidad" type="number" value="1" min="1" max="{{ $producto->stock }}" id="quantity" name="quantity">
                                        </div>
                                        <button class="btn btn-secondary btn-sm" class="tooltip-test" title="Agregar al carrito">
                                            <i class="fa fa-shopping-cart"></i> Agregar al Carrito
                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="caja caja1">
                        <img src="{{asset('/imagenes/'.$producto->imagen)}}" />
                        <p>{{$producto->nomProducto}}</p>
                        <h1>S/. {{$producto->precio}}</h1>
                        <a class="button abrir-modal">Agregar</a>
                    </div>
                    @endforeach
                </div>
                <div class="ver-todos">
                    <a href="{{route('CategoryProducts',$categoria2->idCategoria)}}" class="btn btn-primario">Ver Todos</a>
                </div>
            </div>
            
        </div>
    </main>
@endsection