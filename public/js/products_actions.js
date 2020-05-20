function agregarCarrito(productid){
    $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/agregarProducto',
                type:'POST',
                data:{productid},
                success: function(response){
                    let cantCarrito = document.getElementById('cantCarrito');
                    cantCarrito.setAttribute('value',parseInt(cantCarrito.getAttribute('value')) + 1);
                    cantCarrito.innerHTML = parseInt(cantCarrito.getAttribute('value'));    
                    console.log("productoAgregado");
            },error: function (e) {
                console.log(e);
            }
        });
            if(window.location.href.split("/")[3] == "listado"){
                document.getElementById(productid).removeAttribute("class");
                document.getElementById(productid).setAttribute("class","btn btn-secondary mt-2 col-12 col-md-12 text-white disabled");
                document.getElementById(productid).innerHTML = "Agregado al carrito";
            }else if(window.location.href.split("/")[3] == "productos"){
                document.getElementById(productid).removeAttribute("class");
                document.getElementById(productid).setAttribute("class","btn btn-lg btn-secondary col-12 col-md-3");
                document.getElementById(productid).innerHTML = "Agregado al carrito";
            }
           
    });
}

function eliminarCarrito(productid, divprodid,precioProd,hrprod){
    $(document).ready(function(){
        console.log("usuario "+productid);
        console.log(divprodid);
        console.log(precioProd);
        if(precioProd==0){
            var cantidad =  0;
        }else{
            var cantidad = document.querySelector("#"+divprodid).querySelector(".cantidad").getAttribute("value");
        }
        console.log(cantidad);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/eliminarProducto',
            type: 'POST',
            data: { productid },
            success: function (response) {
                console.log('productoEliminado');
            },
            error: function () {
                console.log("error!!!!");
            }
        });
        $('#'+divprodid).hide();
        $('#'+hrprod).hide();
        let cantCarrito = document.getElementById('cantCarrito');
        cantCarrito.setAttribute('value',parseInt(cantCarrito.getAttribute('value')) - 1);
        cantCarrito.innerHTML = parseInt(cantCarrito.getAttribute('value'));  
        var resultado = (parseFloat(document.getElementById("total").innerHTML) - parseFloat((precioProd*parseFloat(cantidad)))).toFixed(2);
        console.log(resultado);
        document.getElementById("total").innerHTML = resultado;
        document.getElementById("total").setAttribute('value', resultado);
        document.getElementById("cantprodtop").innerHTML = parseInt(document.getElementById("cantprodtop").innerHTML) - 1;
        document.getElementById("cantprodtop").setAttribute("value",parseInt(document.getElementById("cantprodtop").innerHTML) - 1);
    });
}

function comprarCarrito(){
    $(document).ready(function(){
        console.log("Comprando el carrito");
        activarVentanaEmergente("Carrito!!!");
    });
}

function comprar(productid) {
    $(document).ready(function () {
        console.log("Comprando el producto: " + productid);
        activarVentanaEmergente(productid);
    });
}

let errores = [];
let numCard = document.getElementById('numCard');
let valid = document.getElementById('valid');
let codeCard = document.getElementById('codeCard');

function required(input) {
    let res = false;
    let message = input.name + " es un campo obligatorio";
    if (input.value == "") {
        input.classList.add('error');
        console.log(message);
    } else { input.classList.remove("error"); res = true; }
    return res;
}

function validateNumb(input) {
    let res = false;
    let message = input.name + " debe contener valores numéricos";
    if (isNaN(input.value)) {
        input.classList.add('error');
        console.log(message);
    } else { input.classList.remove("error"); res = true; }
    return res;
}

function validateMax(input, cant) {
    let res = false;
    let message = input.name + " debe contener " + cant + " números";
    if (input.value.length != cant) {
        input.classList.add('error');
        console.log(message);
    } else { input.classList.remove("error"); res = true; }
    return res;
}

function validateNow(input) {
    let res = false;
    let date = new Date();
    let arrayDate = input.value.split('-');
    let anio = parseInt(arrayDate[0]);
    let mes = parseInt(arrayDate[1]);
    let message = "Lo siento su tarjeta está vencída";
    if (anio < date.getFullYear() || (anio === date.getFullYear() && mes <= date.getMonth() + 1)) {
        input.classList.add('error');
        console.log(message);
    } else { input.classList.remove("error"); res = true; }
    return res;
}

function validate() {
    [numCard, valid, codeCard].forEach((input, i) => {
        input.onblur = function () {
            // required(this)?console.log(this.value+"Entro por true"+required(this)):console.log(this.value+"Entro por false"+required(this));
            // required(this)?errores[i]=0:errores[i]++;
            switch (i) {
                case 0:
                    required(this) ? errores[i] = 0 : errores[i]++;
                    validateNumb(this) ? errores[i] = 0 : errores[i]++;
                    validateMax(this, 16) ? errores[i] = 0 : errores[i]++;
                    break;
                case 1:
                    validateNow(this);
                    required(this) ? errores[i] = 0 : errores[i]++;
                    break;
                case 2:
                    required(this) ? errores[i] = 0 : errores[i]++;
                    validateNumb(this) ? errores[i] = 0 : errores[i]++;
                    validateMax(this, 3) ? errores[i] = 0 : errores[i]++;
                    break;
            }
        }
    });

    btnCerrarPopup.onclick = function () {
        errores = [];
        [numCard, valid, codeCard].forEach((input, i) => {
            input.inputfocused.value = "";

        });
    }

       
}

function activarVentanaEmergente(productid) {
    var overlay = document.getElementById('overlay'),
        popup = document.getElementById('popup'),
        btnCerrarPopup = document.getElementById('btn-cerrar-popup'),
        descripcion = document.querySelector('.popup > h4');

    overlay.classList.add('active');
    popup.classList.add('active');

    btnCerrarPopup.onclick = () => {
        overlay.classList.remove('active');
        popup.classList.remove('active');
    };


    if (productid != undefined) {
        descripcion.innerHTML = "Completa los datos para confirmar la compra<br>Producto Cod: #" + productid;
    }
    console.log("Vemos errores fuera de btnConfirmar");
    console.log(validate());
    // errores == 0 ? realizarCompra(productid) : activarVentanaEmergente(productid);
    let btnConfirmar = document.getElementById('btn-confirmar');
    btnConfirmar.onclick = (e) => {
        //console.log("Vemos errores dentro de click btnConfirmar");
        console.log(errores[0] == 0 && errores[1] == 0 && errores[2] == 0);
        e.preventDefault();
        if (errores[0] == 0 && errores[1] == 0 && errores[2] == 0) {
            realizarCompra(productid);
            confirm("Su compra se realizó con éxito! Envío a Siempre viva 1234 en 4 días");
        }

    };


}


function realizarCompra(productid) {

    alert(productid);
    // fetch('/nuevaCompra/' + productid + '/' + 1)
    //     .then(response => response)
    //     .then(data => {
    //         console.log("Acá pongo la data :" + data);
    //         for (let elemento in data) {
    //             console.log(data.elemento + " : " + elemento);
    //         }

    //     })
    // .catch(error => {
    //     console.log("Se encontro el siguiente error: " + error);
    //     ul.innerHTML = "<p style='color:red;'>No es posible cargar las peliculas, intente en otro momento</p>";
    // });

}
console.log(window.location.href.split("/")); 