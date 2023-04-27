function opencloseMobileMenu() {
    var links = document.getElementById('links');
    if (links.classList.contains('none')) {
        links.classList.add('flex');
        links.classList.remove('none');
    } else {
        links.classList.remove('flex');
        links.classList.add('none');
    }
}
function opencloseCartPopup() {
    var links = document.getElementById('cart_popup');
    if (links.classList.contains('none')) {
        links.classList.add('block');
        links.classList.remove('none');
    } else {
        links.classList.remove('block');
        links.classList.add('none');
    }
}
function opencloseSearchBar() {
    var links = document.getElementById('search_bar');
    if (links.classList.contains('none')) {
        links.classList.add('flex');
        links.classList.remove('none');
    } else {
        links.classList.remove('flex');
        links.classList.add('none');
    }
}

const cerrarModal = document.querySelectorAll(".closeModal");
cerrarModal.forEach(function(cerrar){
    cerrar.addEventListener('click',function(evt){
        evt.target.parentElement.parentElement.classList.toggle("hide");
    })
});

const abritModal = document.querySelectorAll(".abrir-modal");
abritModal.forEach(function(abrir){
    abrir.addEventListener('click',function(evt){
        evt.target.parentElement.previousElementSibling.classList.toggle("hide");
    })
});

const abrirCarrito = document.querySelector(".cartOpen");
const carritoDropdown = document.querySelector(".dropdown-menu");
abrirCarrito.addEventListener('click',function(){
    carritoDropdown.classList.toggle("hide");
});

const openSections = document.querySelectorAll(".openSection");
const guardarDatos = document.querySelectorAll(".btn-guardar");
openSections.forEach(function(open){
    open.addEventListener('click',function(){
        open.parentElement.nextElementSibling.classList.toggle("hide");
    })
});
guardarDatos.forEach(function(open){
    open.addEventListener('click',function(evt){
        evt.target.parentElement.classList.add("hide");
    })
});

function mostrarMetodoEntrega(opt){
    let domicilio = document.querySelector(".domicilio-info");
    let tienda = document.querySelector(".tienda-info");
    if(opt===0){  
        domicilio.classList.toggle("hide");
        if(!tienda.classList.contains("hide")){
            tienda.classList.toggle("hide");
        }
    }
    else{
        tienda.classList.toggle("hide");
        if(!domicilio.classList.contains("hide")){
            domicilio.classList.toggle("hide");
        }
    }
}

function mostrarMetodoPago(opt){
    let boleta = document.querySelector(".boleta-container");
    let factura = document.querySelector(".factura-container");
    if(opt===0){  
        boleta.classList.toggle("hide");
        if(!factura.classList.contains("hide")){
            factura.classList.toggle("hide");
        }
    }
    else{
        factura.classList.toggle("hide");
        if(!boleta.classList.contains("hide")){
            boleta.classList.toggle("hide");
        }
    }
}
function mostrarFormaPago(opt){
    let tarjeta = document.querySelector(".tarjeta-container");
    if(opt===0){  
        if(!tarjeta.classList.contains("hide")){
            tarjeta.classList.toggle("hide");
        }
    }
    else{
        tarjeta.classList.toggle("hide");
    }
}

const inputObligatorios = document.querySelectorAll(".obligatorio");
const camposObligatorios = document.querySelectorAll(".campo-oligatorio");
const habilitarBtnconfirmacion = document.querySelector(".habilitar-confirmacion");
inputObligatorios.forEach(input=>{
    input.addEventListener('change',function(){
        if(input.value===""){
            if(input.nextElementSibling.classList.contains("hide"))
                input.nextElementSibling.classList.remove("hide");
        }
        else{
            if(!input.nextElementSibling.classList.contains("hide"))
                input.nextElementSibling.classList.add("hide");
        }
            
    });
    /*input.addEventListener('click',function(){
        if(input.value==="")
            input.nextElementSibling.classList.remove("hide");
        else{
            if(!input.nextElementSibling.classList.contains("hide"))
                input.nextElementSibling.classList.toggle("hide");
        }
    });*/
});
habilitarBtnconfirmacion.addEventListener('click',function(){
    //Validar info personal
    const inputsInfo = document.querySelectorAll(".personal .obligatorio");
    const obligatoriosInputsInfo = document.querySelectorAll(".personal .campo-oligatorio");
    let cantidadInfo = 0;
    for(let i=0;i<inputsInfo.length;i++){
        if(inputsInfo[i].value===""){
            if(obligatoriosInputsInfo[i].classList.contains("hide"))
                obligatoriosInputsInfo[i].classList.toggle("hide");
            cantidadInfo++;
        }
        if(cantidadInfo>0){
            if(document.querySelector(".personal").classList.contains("hide")){
                document.querySelector(".personal").classList.remove("hide")
            }
        }
    }
    const radioEntrega = document.querySelectorAll(".entrega .obligatorio");
    const inputsdomicilio = document.querySelectorAll(".domicilio .obligatorio");
    const obligatoriosInputsDomicilio = document.querySelectorAll(".domicilio .campo-oligatorio");
    const inputsRecojo = document.querySelectorAll(".recojo .obligatorio");
    const obligatoriosInputsRecojo = document.querySelectorAll(".recojo .campo-oligatorio");
    let cantidadEntrega = 0;
    radioEntrega.forEach(function(radio){
        radio.addEventListener('click',function(){
            if(radioEntrega[0].checked){
                if(!radio.parentElement.parentElement.parentElement.children[2].classList.contains("hide")){
                    obligatoriosInputsRecojo.forEach(function(campo){
                        if(!campo.classList.contains("hide"))
                            campo.classList.toggle("hide");
                    });
                    radio.parentElement.parentElement.parentElement.children[2].classList.toggle("hide");
                }
            }
            else{
                if(!radio.parentElement.parentElement.parentElement.children[1].classList.contains("hide")){
                    obligatoriosInputsDomicilio.forEach(function(campo){
                        if(!campo.classList.contains("hide"))
                            campo.classList.toggle("hide");
                    });
                    radio.parentElement.parentElement.parentElement.children[1].classList.toggle("hide");
                }
            }
            if(!radioEntrega[0].parentElement.parentElement.children[2].classList.contains("hide")){
                radioEntrega[0].parentElement.parentElement.children[2].classList.toggle("hide")
            }
        });
    });
    if(radioEntrega[0].checked){
        for(let i=0;i<inputsdomicilio.length;i++){
            if(inputsdomicilio[i].value===""){
                if(obligatoriosInputsDomicilio[i].classList.contains("hide"))
                    obligatoriosInputsDomicilio[i].classList.toggle("hide");
                cantidadEntrega++;
            }
            if(cantidadEntrega>0){
                if(document.querySelector(".domicilio").classList.contains("hide")){
                    document.querySelector(".domicilio").classList.toggle("hide");
                }
            }
        }
    }
    else{
        if(radioEntrega[1].checked){
            for(let i=0;i<inputsRecojo.length;i++){
                if(inputsRecojo[i].value===""){
                    if(obligatoriosInputsRecojo[i].classList.contains("hide"))
                        obligatoriosInputsRecojo[i].classList.toggle("hide");
                    cantidadEntrega++;
                }
                if(cantidadEntrega>0){
                    if(document.querySelector(".recojo").classList.contains("hide")){
                        document.querySelector(".recojo").classList.toggle("hide");
                    }
                }
            }
        }
        else{
            radioEntrega[0].parentElement.parentElement.children[2].classList.toggle("hide");
            if(document.querySelector(".entrega").parentElement.classList.contains("hide")){
                document.querySelector(".entrega").parentElement.classList.toggle("hide");
            }
        }
    } 
    
    const radioPago = document.querySelectorAll(".pago .obligatorio");
    const inputsBoleta = document.querySelectorAll(".boleta .obligatorio");
    const obligatorioInputsBoleta = document.querySelectorAll(".boleta .campo-oligatorio");
    const inputsFactura = document.querySelectorAll(".factura .obligatorio");
    const obligatorioInputsFactura = document.querySelectorAll(".boleta .campo-oligatorio");
    let cantidadPago =0;
    radioPago.forEach(function(radio){
        radio.addEventListener('click',function(){
            if(radioPago[0].checked){
                if(!radio.parentElement.parentElement.parentElement.children[2].classList.contains("hide")){
                    obligatorioInputsFactura.forEach(function(campo){
                        if(!campo.classList.contains("hide"))
                            campo.classList.toggle("hide");
                    });
                    radio.parentElement.parentElement.parentElement.children[2].classList.toggle("hide");
                }
            }
            else{
                if(!radio.parentElement.parentElement.parentElement.children[1].classList.contains("hide")){
                    obligatorioInputsBoleta.forEach(function(campo){
                        if(!campo.classList.contains("hide"))
                            campo.classList.toggle("hide");
                    });
                    radio.parentElement.parentElement.parentElement.children[1].classList.toggle("hide");
                }
            }
            if(!radioPago[0].parentElement.parentElement.children[2].classList.contains("hide")){
                radioPago[0].parentElement.parentElement.children[2].classList.toggle("hide")
            }
        });
    });
    if(radioPago[0].checked){
        for(let i=0;i<inputsBoleta.length;i++){
            if(inputsBoleta[i].value===""){
                if(obligatorioInputsBoleta[i].classList.contains("hide"))
                    obligatorioInputsBoleta[i].classList.toggle("hide");
                cantidadPago++;
            }
            if(cantidadPago>0){
                if(document.querySelector(".boleta").classList.contains("hide")){
                    document.querySelector(".boleta").classList.remove("hide")
                }
            }
        }
    }
    else{
        if(radioPago[1].checked){
            for(let i=0;i<inputsFactura.length;i++){
                if(inputsFactura[i].value===""){
                    if(obligatorioInputsFactura[i].classList.contains("hide"))
                        obligatorioInputsFactura[i].classList.toggle("hide");
                    cantidadPago++;
                }
                if(cantidadPago>0){
                    if(document.querySelector(".factura").classList.contains("hide")){
                        document.querySelector(".factura").classList.remove("hide")
                    }
                }
            }
        }
        else{
            radioPago[0].parentElement.parentElement.children[2].classList.toggle("hide");
            if(document.querySelector(".pago").parentElement.classList.contains("hide")){
                document.querySelector(".pago").parentElement.classList.toggle("hide");
            }
        }
    }
    const radioFormaPago = document.querySelectorAll(".formapago .obligatorio");
    const inputsTarjeta = document.querySelectorAll(".tarjeta .obligatorio");
    const obligatorioInputsTarjeta = document.querySelectorAll(".tarjeta .campo-oligatorio");
    let cantidadTarjeta = 0;
    radioFormaPago.forEach(function(radio){
        radio.addEventListener('click',function(){
            if(radioFormaPago[0].checked){
                if(!radio.parentElement.parentElement.parentElement.children[1].classList.contains("hide")){
                    obligatorioInputsTarjeta.forEach(function(campo){
                        if(!campo.classList.contains("hide"))
                            campo.classList.toggle("hide");
                    });
                    radio.parentElement.parentElement.parentElement.children[1].classList.toggle("hide");
                }
            }
            if(!radioFormaPago[0].parentElement.parentElement.children[2].classList.contains("hide")){
                radioFormaPago[0].parentElement.parentElement.children[2].classList.toggle("hide")
            }
        });
    });
    if(radioFormaPago[0].checked){
    }
    else{
        if(radioFormaPago[1].checked){
            for(let i=0;i<inputsTarjeta.length;i++){
                if(inputsTarjeta[i].value===""){
                    if(obligatorioInputsTarjeta[i].classList.contains("hide"))
                        obligatorioInputsTarjeta[i].classList.toggle("hide");
                    cantidadTarjeta++;
                }
                if(cantidadTarjeta>0){
                    if(document.querySelector(".tarjeta").classList.contains("hide")){
                        document.querySelector(".tarjeta").classList.remove("hide")
                    }
                }
            }
        }
        else{
            radioFormaPago[0].parentElement.parentElement.children[2].classList.toggle("hide");
            if(document.querySelector(".formapago").parentElement.classList.contains("hide")){
                document.querySelector(".formapago").parentElement.classList.toggle("hide");
            }
        }
    }
    if(cantidadInfo===0&&cantidadEntrega===0&&cantidadPago===0&&cantidadTarjeta==0){
        document.querySelector(".btn-confirmacion").disabled = false;
        document.querySelector(".mensaje-2").classList.toggle("hide");
        if(!document.querySelector(".mensaje-1").classList.contains("hide")){
            document.querySelector(".mensaje-1").classList.toggle("hide");
        }
    }
    else{
        if(!document.querySelector(".mensaje-2").classList.contains("hide")){
            document.querySelector(".mensaje-2").classList.toggle("hide");
        }
        document.querySelector(".mensaje-1").classList.toggle("hide");
    }
        
        
});



// (function(){
//     llenarListaCarrito();
// })();

/*
const agregarCarrito = document.querySelectorAll(".agregar-carrito");
agregarCarrito.forEach(item => {
    item.addEventListener('click', function(evt){
        //document.querySelector(".sin-productos").style = "display: none;"
        if(evt.target.parentElement.classList.contains("store")){
            //console.log(item.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.src);
            //let fullPath = item.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.src;
            //let path = fullPath.slice(fullPath.indexOf("img")+3);
            let producto = [];
            //producto.img = `img-cart${path}`;
            let nombreProducto = item.parentElement
                                .children[2].textContent;
            producto.nombre = nombreProducto;
            let cantidad = item.parentElement.children[4].value;
            producto.cantidad = cantidad;
            let precioProducto = item.parentElement
                                .children[3].textContent;

            producto.precio = parseFloat(precioProducto.slice(precioProducto.indexOf("S")+3).trim())*parseInt(cantidad);
            
            let cartProducto = document.createElement("DIV");
            cartProducto.classList.add(
                "cart-item",
            );
            //<img src="${producto.img}" class="" style="width:100%" id="item-img" alt="">
            cartProducto.innerHTML =
            `<div class="cart-item-left">
                <div class="cantidad">
                    <p class="cantidad-elegida">${producto.cantidad}</p>
                </div>
                <div class="price">
                    S/. <span id="cart-item-price" class="cart-item-price" class="mb-0">${producto.precio}</span>
                </div>
            </div>
            <div class="cart-item-right">
                <p class="product-title">${producto.nombre}</p>
                <svg class="cart-item-remove" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1.5em" height="1.5em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path fill="#f25c05" d="M360 184h-8c4.4 0 8-3.6 8-8v8h304v-8c0 4.4 3.6 8 8 8h-8v72h72v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80h72v-72zm504 72H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zM731.3 840H292.7l-24.2-512h487l-24.2 512z"/></svg>
            </div>
            `;
            const carrito = document.querySelector("#cart_popup");
            const totales = document.querySelector(".cart-total");
            carrito.insertBefore(cartProducto,totales);
            alert("producto agregado");
            sumarTotales();
            llenarListaCarrito();
                console.log(user)
            //document.querySelector(".regresar").submit();
            let ruta = route('BackProducts');
            //document.location.href = ruta;
            /*
            $.ajax({
                type: "POST",
                url: ruta,
                headers:{
                    'X-CSRF-TOKEN' : $('[name="_token"]').val()
                },
                data:listaProductosCarrito,
                dataType:"json",
                success:function(response) {
                     console.log(response);
                    // if (data.success == 'incidencias hecho') {
                    //     alert('hechos');
                    // }
                    // //errores
                    // if (data.errors != "" && data.errors != null) {
                    // }
                }
            })
        }
    });
});

function llenarListaCarrito(){
    items = document.querySelectorAll(".cart-item");
    listaProductosCarrito = []
    items.forEach(function(item){
        console.log(item);
        let producto ={
             "nombre": item.children[1].children[0].textContent,
             "cantidad": item.children[0].children[0].children[0].textContent,
             "total": item.children[0].children[1].children[0].textContent
        }
        listaProductosCarrito.push(producto);
    });
}

const eliminarProductosCarrito = document.querySelectorAll(".cart-item-remove");
eliminarProductosCarrito.forEach(function(producto){
    producto.addEventListener('click',function(){
        producto.parentElement.parentElement.remove();
        sumarTotales();
    });
});



function sumarTotales(){
    const totales = document.querySelectorAll("#cart-item-price");
    let sumaTotales = 0;
    totales.forEach(function(total){
        sumaTotales = sumaTotales + parseFloat(total.textContent);
    });
    if(sumaTotales < 1){
        //document.querySelector(".sin-productos").style = "display: block;";
        document.querySelector("#cart-total").textContent = "00.00";
        document.querySelector("#item-count").textContent = "0";
        //document.querySelector(".item-total").textContent = "00.00";
    }
    else{
        sumaTotales = sumaTotales.toFixed(2);
        document.querySelector("#cart-total").textContent = sumaTotales;
        document.querySelector("#item-count").textContent = totales.length;
        //document.querySelector(".item-total").textContent = sumaTotales;
    }  
};
function btnLimpiar(){
    const elementosBorrar = document.querySelectorAll(".cart-item");
    let contador = elementosBorrar.length;
    elementosBorrar.forEach(function(item){
        item.remove();
        contador--;
    });
    if(contador===0){
        //document.querySelector(".sin-productos").style = "display: block;"
        document.querySelector("#cart-total").textContent = "00.00";
        document.querySelector("#item-count").textContent = "0";
        //document.querySelector(".item-total").textContent = "00.00";
    }
}*/
