<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
   
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
</head>
<body>
    <header>
        <div class="topbar">
            <div class="contacto">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                    role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                    <path fill="white"
                        d="M6.756 7.024L7.83 6.04a2 2 0 0 0 .52-2.176l-.458-1.223a1.916 1.916 0 0 0-2.354-1.16c-1.716.525-3.035 2.12-2.629 4.014c.267 1.246.778 2.81 1.746 4.474c.97 1.668 2.078 2.9 3.028 3.766c1.434 1.305 3.484.979 4.803-.251a1.899 1.899 0 0 0 .171-2.596l-.84-1.02A2 2 0 0 0 9.67 9.23l-1.388.437a6.63 6.63 0 0 1-.936-1.223a6.269 6.269 0 0 1-.59-1.421Z" />
                </svg>
                <a href="tel:01-204-2000">(01)204-2000</a>
            </div>
            <div class="locales">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                    role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1200 1200">
                    <path fill="white"
                        d="M600 0C350.178 0 147.656 202.521 147.656 452.344c0 83.547 16.353 169.837 63.281 232.031L600 1200l389.062-515.625c42.625-56.49 63.281-156.356 63.281-232.031C1052.344 202.521 849.822 0 600 0zm0 261.987c105.116 0 190.356 85.241 190.356 190.356C790.356 557.46 705.116 642.7 600 642.7s-190.356-85.24-190.356-190.356S494.884 261.987 600 261.987z" />
                </svg>
                <a href="pages/locales.html">Ubícanos</a>
            </div>
        </div>
        <div class="navbar">
            <div class="hamburguer-menu" onclick="opencloseMobileMenu()">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                    role="img" width="1.5em" height="1.5em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                    <path fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M2.75 12.25h10.5m-10.5-4h10.5m-10.5-4h10.5" />
                </svg>
            </div>
            <a class="logo" href="{{route('Main')}}">
                <img width="130px" src="{{asset('/img/Logo.png')}}" alt="Minimarket Carlitos">
            </a>
            <div class="links none" id="links">
                <a href="{{route('AllProducts')}}">Productos</a>
                <a href="pages/productos.html">Promociones</a>
                <a href="pages/locales.html">Locales</a>
                <a href="pages/productos.html">Bar Premium</a>
            </div>
            <div class="right-links">
                <div class="search">
                    <a href="#" onclick="opencloseSearchBar()">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                            width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1664 1664">
                            <path fill="white"
                                d="M1152 704q0-185-131.5-316.5T704 256T387.5 387.5T256 704t131.5 316.5T704 1152t316.5-131.5T1152 704zm512 832q0 52-38 90t-90 38q-54 0-90-38l-343-342q-179 124-399 124q-143 0-273.5-55.5t-225-150t-150-225T0 704t55.5-273.5t150-225t225-150T704 0t273.5 55.5t225 150t150 225T1408 704q0 220-124 399l343 343q37 37 37 90z" />
                        </svg>
                    </a>
                </div>
                {{-- <div id="cart-info" class="nav-info align-items-center cart-info d-flex justify-content-between mx-lg-5">
                    <span class="cart-info__icon mr-lg-3"><i class="fas fa-shopping-cart"></i></span>
                    <p class="mb-0 text-capitalize"><span id="item-count">0 </span> items - $<span class="item-total">00.00</span></p>
                </div> --}}
                <div class="cart">
                    
                    <a id="navbarDropdown" class="cartOpen"
                       role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                       <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                            width="1.5em" height="1.5em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="white"
                                d="M21.822 7.431A1 1 0 0 0 21 7H7.333L6.179 4.23A1.994 1.994 0 0 0 4.333 3H2v2h2.333l4.744 11.385A1 1 0 0 0 10 17h8c.417 0 .79-.259.937-.648l3-8a1 1 0 0 0-.115-.921z" />
                            <circle cx="10.5" cy="19.5" r="1.5" fill="white" />
                            <circle cx="17.5" cy="19.5" r="1.5" fill="white" />
                        </svg>
                        <span class="cantidad-cart">{{ \Cart::getTotalQuantity()}}</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="search-bar none" id="search_bar">
            <form class="d-flex" action="{{route('SimilarNameProducts')}}">
                <input type="text" name="nombre-buscar" placeholder=" Search..">
                <svg class="clean" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1.5em" height="1.5em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path fill="#f25c05" d="M16 2C8.2 2 2 8.2 2 16s6.2 14 14 14s14-6.2 14-14S23.8 2 16 2zm5.4 21L16 17.6L10.6 23L9 21.4l5.4-5.4L9 10.6L10.6 9l5.4 5.4L21.4 9l1.6 1.6l-5.4 5.4l5.4 5.4l-1.6 1.6z"/></svg>
                <button class="button">Buscar</button>
            </form>
            
        </div>
    </header>
    <div class="carrito">
        <div class="dropdown-menu hide dropdown-menu-right" aria-labelledby="navbarDropdown" >
            <ul class="list-group">
                @include('cart.cart-drop')
            </ul>
        </div>
    </div>
    
    {{-- <div id="cart" class="cart">
        <div class="sin-productos">
          <p style="text-align:center;">Sin productos elegidos</p>
        </div>
        <!--cart total -->
        <div class="cart-total-container d-flex justify-content-around text-capitalize mt-5">
          <h5>total</h5>
          <h5> $ <strong id="cart-total" class="font-weight-bold">00.00</strong> </h5>
        </div>
        <!--end cart total -->
        <!-- cart buttons -->
        <div class="cart-buttons-container mt-3 d-flex justify-content-between">
          <a href="" id="clear-cart" class="btn btn-outline-secondary btn-black text-uppercase">clear cart</a>
          <a href="" class="btn btn-outline-secondary text-uppercase btn-pink">checkout</a>
        </div>
        <!--end of  cart buttons -->
        <!--  -->
    </div> --}}
    <!--Inicio html en otra hoja-->

    @yield('content');
    @routes
    <!-- Fin html -->

    <footer>
        <ul class="footer-links">
            <li>
                <a class="logo" href="{{route('Main')}}">
                    <img width="130px" src="{{asset('/img/Logo.png')}}" alt="Minimarket Carlitos">
                </a>
            </li>
            <li>
                <p>Para el cliente</p>
                <ul>
                    <li><a href="#">Pago y Envío</a></li>
                    <li><a href="#">Política de privacidad</a></li>
                    <li><a href="#">Locales</a></li>
                </ul>
            </li>
            <li>
                <p>Catálogo</p>
                <ul>
                    <li><a href="#">Productos</a></li>
                    <li><a href="#">Promociones</a></li>
                    <li><a href="#">Bar Premium</a></li>
                </ul>

            </li>
            <li>
                <p>Horario de Trabajo</p>
                <ul>
                    <li>Lun - Jue (9:00am - 11pm)</li>
                    <li>Vie (9:00am - 12am)</li>
                    <li>Sáb - Dom (10:00am - 12am)</li>
                </ul>
            </li>
            <li>
                <p>Síguenos</p>
                <ul class="redes-sociales">
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" role="img" width="2em" height="2em" preserveAspectRatio="xMidYMid meet"
                            viewBox="0 0 24 24">
                            <path fill="black" fill-rule="evenodd"
                                d="M0 12.067C0 18.033 4.333 22.994 10 24v-8.667H7V12h3V9.333c0-3 1.933-4.666 4.667-4.666c.866 0 1.8.133 2.666.266V8H15.8c-1.467 0-1.8.733-1.8 1.667V12h3.2l-.533 3.333H14V24c5.667-1.006 10-5.966 10-11.933C24 5.43 18.6 0 12 0S0 5.43 0 12.067Z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" role="img" width="2em" height="2em" preserveAspectRatio="xMidYMid meet"
                            viewBox="0 0 24 24">
                            <path fill="black" fill-rule="evenodd"
                                d="M7.465 1.066C8.638 1.012 9.012 1 12 1c2.988 0 3.362.013 4.534.066c1.172.053 1.972.24 2.672.511c.733.277 1.398.71 1.948 1.27c.56.549.992 1.213 1.268 1.947c.272.7.458 1.5.512 2.67C22.988 8.639 23 9.013 23 12c0 2.988-.013 3.362-.066 4.535c-.053 1.17-.24 1.97-.512 2.67a5.396 5.396 0 0 1-1.268 1.949c-.55.56-1.215.992-1.948 1.268c-.7.272-1.5.458-2.67.512c-1.174.054-1.548.066-4.536.066c-2.988 0-3.362-.013-4.535-.066c-1.17-.053-1.97-.24-2.67-.512a5.397 5.397 0 0 1-1.949-1.268a5.392 5.392 0 0 1-1.269-1.948c-.271-.7-.457-1.5-.511-2.67C1.012 15.361 1 14.987 1 12c0-2.988.013-3.362.066-4.534c.053-1.172.24-1.972.511-2.672a5.396 5.396 0 0 1 1.27-1.948a5.392 5.392 0 0 1 1.947-1.269c.7-.271 1.5-.457 2.67-.511Zm8.98 1.98c-1.16-.053-1.508-.064-4.445-.064c-2.937 0-3.285.011-4.445.064c-1.073.049-1.655.228-2.043.379c-.513.2-.88.437-1.265.822a3.412 3.412 0 0 0-.822 1.265c-.151.388-.33.97-.379 2.043c-.053 1.16-.064 1.508-.064 4.445c0 2.937.011 3.285.064 4.445c.049 1.073.228 1.655.379 2.043c.176.477.457.91.822 1.265c.355.365.788.646 1.265.822c.388.151.97.33 2.043.379c1.16.053 1.507.064 4.445.064c2.938 0 3.285-.011 4.445-.064c1.073-.049 1.655-.228 2.043-.379c.513-.2.88-.437 1.265-.822c.365-.355.646-.788.822-1.265c.151-.388.33-.97.379-2.043c.053-1.16.064-1.508.064-4.445c0-2.937-.011-3.285-.064-4.445c-.049-1.073-.228-1.655-.379-2.043c-.2-.513-.437-.88-.822-1.265a3.413 3.413 0 0 0-1.265-.822c-.388-.151-.97-.33-2.043-.379Zm-5.85 12.345a3.669 3.669 0 0 0 4-5.986a3.67 3.67 0 1 0-4 5.986ZM8.002 8.002a5.654 5.654 0 1 1 7.996 7.996a5.654 5.654 0 0 1-7.996-7.996Zm10.906-.814a1.337 1.337 0 1 0-1.89-1.89a1.337 1.337 0 0 0 1.89 1.89Z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>
                </ul>
            </li>
        </ul>
    </footer>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('/js/app.js')}}"></script>
</body>
</html>