@extends('templates.basics')
@section('title','Pedido')
@section('content')
    <main>
    <h2 class="centrar-titulo">Registrar Pedido</h2>
    <section class="contenedor-pedido">
        <div class="formulario-pedido">
              <form action="{{ route('SendOrder') }}" method="POST">
                {{ csrf_field() }}
                <div class="info-personal form-section">
                    <div class="content">
                        <h4>Datos Personales</h4>
                        <span class="openSection"><img src="{{asset('/img/ordenar-abajo.png')}}" alt=""></span>
                    </div>
                    <div class="contenido hide personal">
                        <label for="nombres">Nombres:</label>
                        <input class="obligatorio" type="text" name="nombres" id="nombres" placeholder="Ingrese sus Nombres">
                        <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                        <label for="apellidos">Apellidos:</label>
                        <input class="obligatorio" type="text" name="apellidos" id="apellidos" placeholder="Ingrese sus Apellidos">
                        <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                        <label for="correo">Correo:</label>
                        <input class="obligatorio" type="email" name="correo" id="correo" placeholder="Ingrese sus Correo electronico">
                        <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                        <label for="telefono">Telefono:</label>
                        <input class="obligatorio" type="text" name="telefono" id="telefono" maxlength="9" placeholder="Ingrese su numero telefonico" pattern="[0-9]+" maxlength="9" minlength="9">
                        <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                        <label class="ultimo"></label>
                        <a class="btn-guardar">Guardar Datos</a>
                    </div>
                </div>
                <div class="detalle-pedido hide form-section">
                    <div class="content">
                        <h4>Detalles del Pedido</h4>
                        <span class="openSection"><img src="{{asset('/img/ordenar-abajo.png')}}" alt=""></span>
                    </div>
                    <div class="contenido hide">
                        <ul class="lista-productos-carrito">
                        @foreach(\Cart::getContent() as $item)
                          <li class="producto-escogido juntar">
                            <div class="escogido-contenedor">
                              <img src="{{asset('/imagenes/'.$item->image) }}">
                              <div class="escogido-info">
                                <p class="texto-negrita">{{$item->name}}</p>
                                <p>Cantidad: {{$item->quantity}}</p>
                                <p>S/. <span class="precio-producto">{{ \Cart::get($item->id)->getPriceSum() }}</span></p>
                              </div>
                            </div>
                          </li>
                          <hr>
                        @endforeach
                        </ul>
                        <a class="btn-guardar">Guardar</a>
                    </div>
                </div>
                <div class="metodo-entrega form-section">
                    <div class="content">
                        <h4>Metodo de Entrega</h4>
                        <span class="openSection"><img src="{{asset('/img/ordenar-abajo.png')}}" alt=""></span>
                    </div>
                    <div class="contenido hide">
                        <div class="juntar entrega">
                            <div class="juntar">
                                <input class="obligatorio" onchange="mostrarMetodoEntrega(0)" type="radio" name="entrega" value="delivery">
                                <label for="entrega">Envio a Domicilio</label>
                            </div>
                            <div class="juntar">
                                <input class="obligatorio" onchange="mostrarMetodoEntrega(1)" type="radio" name="entrega" value="recojotienda">
                                <label for="entrega">Recojo en Tienda</label>
                            </div>
                            <p class="campo-oligatorio hide">*Debe seleccionar una opcion</p>
                        </div>
                        <div class="domicilio-info hide domicilio">
                            <label for="direccion">Direccion</label>
                            <input class="obligatorio" type="text" name="direccion" id="direccion" placeholder="Ingrese su direccion">
                            <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                            <label for="referencia">Referencia:</label>
                            <input class="obligatorio" type="text" name="referencia" id="referencia" placeholder="Ingrese referencia a su direccion">
                            <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                        </div>
                        <div class="tienda-info hide recojo">
                            <label for="fechaRecojo">Fecha de Recojo</label>
                            <input class="obligatorio" type="date" name="fechaRecojo" id="fechaRecojo">
                            <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                            <label for="horaRecojo">Hora de Recojo</label>
                            <input class="obligatorio" type="time" name="horaRecojo" id="horaRecojo">
                            <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                        </div>
                        <label class="ultimo"></label>
                        <a class="btn-guardar">Guardar</a>
                    </div>
                </div>
                <div class="metodo-pago form-section">
                    <div class="content">
                       <h4>Informacion de Facturacion</h4>
                       <span class="openSection"><img src="{{asset('/img/ordenar-abajo.png')}}" alt=""></span>
                    </div>
                    <div class="contenido hide">
                        <div class="juntar pago">
                            <div class="juntar">
                                <input class="obligatorio" onchange="mostrarMetodoPago(0)" type="radio" name="metodopago" value="boleta">
                                <label for="boleta">Pago con Boleta</label>
                            </div>
                            <div class="juntar">
                                <input class="obligatorio" onchange="mostrarMetodoPago(1)" type="radio" name="metodopago" value="factura">
                                <label for="factura">Pago con Factura</label>
                            </div>
                            <p class="campo-oligatorio hide">*Debe seleccionar una opcion</p>
                        </div>
                        
                        <div class="boleta-container hide boleta">
                            <label for="documentoidentidad">Tipo de documento de identidad</label>
                            <select class="obligatorio" name="documentoidentidad" id="documentoidentidad">
                                <option value="" unselected>Seleccione un tipo de documento</option>
                                <option value="dni">DNI</option>
                                <option value="carnet">Carnet de extranjeria</option>
                                <option value="pasaporte">Pasaporte</option>
                            </select>
                            <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                            <label for="numerodocumento">Numero de Documento:</label>
                            <input class="obligatorio" type="number" name="numerodocumento" id="numerodocumento" placeholder="Ingrese el numero de documento">
                            <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                        </div>
                        <div class="factura-container hide factura">
                            <label for="direccion-factura">Direccion de la Facturacion</label>
                            <input class="obligatorio" type="text" name="direccion-factura" id="direccion-factura" placeholder="Ingrese la Direccion de Facturacion">
                            <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                            <label for="ruc">RUC:</label>
                            <input class="obligatorio" type="number" name="ruc" id="ruc" placeholder="Ingrese su RUC">
                            <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                            <label for="razonsocial">Razon Social o Nombre</label>
                            <input class="obligatorio" type="text" name="razonsocial" id="razonsocial" placeholder="Ingrese razon social o nombre">
                            <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                        </div>
                        <label class="ultimo"></label>
                        <a class="btn-guardar">Guardar</a>
                    </div>
                </div>
                <div class="forma-pago form-section">
                    <div class="content">
                        <h4>Forma de pago</h4>
                        <span class="openSection"><img src="{{asset('/img/ordenar-abajo.png')}}" alt=""></span>
                    </div>
                    <div class="contenido hide">
                        <div class="juntar formapago">
                            <div class="juntar">
                                <input class="obligatorio" onchange="mostrarFormaPago(0)" type="radio" name="formapago" id="efectivo" value="efectivo">
                                <label for="efectivo">Efectivo</label>
                            </div>
                            <div class="juntar">
                                <input class="obligatorio" onchange="mostrarFormaPago(1)" type="radio" name="formapago" id="tarjeta" value="tarjeta">
                                <label for="tarjeta">Tarjeta</label>
                            </div>
                            <p class="campo-oligatorio hide">*Debe seleccionar una opcion</p>
                        </div>
                        <div class="tarjeta-container hide tarjeta">
                            <p>Tarjetas de credito o debito</p>
                            <img src="/img/Tarjetas.png" alt="tarjetas aceptadas">
                            <div class="columnas-2">
                                <div class="">
                                    <label for="nombretitular">Nombre del titular:</label>
                                    <input class="obligatorio" type="text" name="nombretitular" id="nombretitular" placeholder="Ingrese nombre del titular">
                                    <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                                </div>
                                <div class="">
                                    <label for="numerotarjeta">Numero de Tarjeta:</label>
                                    <input class="obligatorio" type="number" name="numerotarjeta" id="numerotarjeta" placeholder="Ingrese numero de tarjeta">
                                    <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                                </div>
                            </div>
                            <div class="columnas-2">
                                <div class="">
                                    <label for="">Fecha de expiracion</label>
                                    <div class="juntar">
                                        <select class="obligatorio" name="mes" id="mes">
                                            <option value="">Mes</option>
                                            <option value="0">Enero</option>
                                            <option value="1">Febrero</option>
                                            <option value="2">Marzo</option>
                                            <option value="3">Abril</option>
                                            <option value="4">Mayo</option>
                                            <option value="5">Junio</option>
                                            <option value="6">Julio</option>
                                            <option value="7">Agosto</option>
                                            <option value="8">Setiembre</option>
                                            <option value="9">Octubre</option>
                                            <option value="10">Noviembre</option>
                                            <option value="11">Diciembre</option>
                                        </select>
                                        <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                                        <input class="obligatorio" type="number" name="anio" id="anio" placeholder="Año">
                                        <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                                    </div>
                                </div>
                                <div class="">
                                    <label for="codigo">Codigo de seguridad</label>
                                    <input class="obligatorio" type="number" name="codigo" id="codigo" placeholder="3 Digitos">
                                    <p class="campo-oligatorio hide">*Este campo es obligatorio</p>
                                </div>
                            </div>
                        </div>
                        <label class="ultimo"></label>
                        <a class="btn-guardar">Guardar</a>
                    </div>
                </div>
                <a class="habilitar-confirmacion btn btn-terciario">Validar Formulario</a>
                <div class="mensaje-confirmacion">
                    <button class="btn-confirmacion" disabled="true">Confirmar pedido</button>
                    <p class="mensaje-1 hide">Debe llenar todos los campos <br> para poder Confirmar el pedido</p>
                    <p class="mensaje-2 hide">Ya puede Confirmar el pedido</p>
                </div>
                
              </form>
        </div>
        <div class="resumen-pedido">
            <h3>Resumen del Pedido</h3>
            <ul class="lista-productos">
            @foreach(\Cart::getContent() as $item)
              <li class="producto-escogido">
                    <div class="escogido-contenedor">
                      <img src="{{asset('/imagenes/'.$item->image) }}">
                      <div class="escogido-info">
                          <p>{{$item->name}}</p>
                          <p>Cantidad: {{$item->quantity}}</p>
                          <p>S/. <span class="precio-producto">{{ \Cart::get($item->id)->getPriceSum() }}</span></p>
                      </div>
                    </div>
                    <div class="detalle-acciones resumen">
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
                </li>
                <hr>
            @endforeach
            </ul>
            <ul>
                <li>Subtotal: S/. <span class="subtotal">{{ \Cart::getTotal() }}</span></li>
                <li>IGV: <span class="igv">Incluido</span></li>
                <li>Total: S/. <span class="total">{{ \Cart::getTotal() }}</span></li>
            </ul>
        </div>
    </section>
    </main>
@endsection