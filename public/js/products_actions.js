function agregarCarrito(productid) {
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/agregarProducto',
            type: 'POST',
            data: { productid },
            success: function (response) {
                console.log("productoAgregado");
            }
        });
        if (window.location.href.split("/")[3] == "listado") {
            document.getElementById(productid).removeAttribute("class");
            document.getElementById(productid).setAttribute("class", "btn btn-secondary mt-2 col-12 col-md-12 text-white disabled");
            document.getElementById(productid).innerHTML = "Agregado al carrito";
        } else if (window.location.href.split("/")[3] == "productos") {
            document.getElementById(productid).removeAttribute("class");
            document.getElementById(productid).setAttribute("class", "btn btn-lg btn-secondary col-12 col-md-3");
            document.getElementById(productid).innerHTML = "Agregado al carrito";
        }

    });
}

function eliminarCarrito(productid, divprodid, precioProd) {
    $(document).ready(function () {
        console.log(productid);
        console.log(divprodid);
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
        $('#' + divprodid).hide();
        var resultado = document.getElementById("total").innerHTML - precioProd;
        console.log(resultado);
        document.getElementById("total").innerHTML = resultado.toFixed(2);
        document.getElementById("cantprodtop").setAttribute("value", parseInt(document.getElementById("cantprodtop").innerHTML) - 1);
        document.getElementById("cantprodtop").innerHTML = parseInt(document.getElementById("cantprodtop").innerHTML) - 1;
    });
}

function comprar(productid) {
    $(document).ready(function () {
        console.log("comprar() producto: " + productid);
        let overlay = document.getElementById('overlay');
        let popup = document.getElementById('popup');
        let btnCerrarPopup = document.getElementById('btn-cerrar-popup');
        let descripcion = document.querySelector('.popup > h4');
        let btnConfirmar = document.getElementById('btn-confirmar');
        // activarVentanaEmergente(productid);
    });
}


// let numCard = document.getElementById('numCard');
// let valid = document.getElementById('valid');
// let codeCard = document.getElementById('codeCard');
// let errorNC = 0;
// let errorVD = 0;
// let errorCC = 0;


// function required(input) {
//     let res = false;
//     let message = input.name + " es un campo obligatorio";
//     if (input.value == "") {
//         input.classList.add('error');
//         console.log(message);
//     } else { input.classList.remove("error"); res = true; }
//     return res;
// }

// function validateNumb(input) {
//     let res = false;
//     let message = input.name + " debe contener valores numéricos";
//     if (isNaN(input.value)) {
//         input.classList.add('error');
//         console.log(message);
//     } else { input.classList.remove("error"); res = true; }
//     return res;
// }

// function validateMax(input, cant) {
//     let res = false;
//     let message = input.name + " debe contener " + cant + " números";
//     if (input.value.length != cant) {
//         input.classList.add('error');
//         console.log(message);
//     } else { input.classList.remove("error"); res = true; }
//     return res;
// }

// function validateNow(input) {
//     let res = false;
//     let date = new Date();
//     let arrayDate = input.value.split('-');
//     let anio = parseInt(arrayDate[0]);
//     let mes = parseInt(arrayDate[1]);
//     let message = "Lo siento su tarjeta está vencída";
//     if (anio < date.getFullYear() || (anio === date.getFullYear() && mes <= date.getMonth() + 1)) {
//         input.classList.add('error');
//         console.log(message);
//     } else { input.classList.remove("error"); res = true; }
//     return res;
// }

function validate() {
    console.log("Dentro de función validate()");
    // numCard.onblur = function () {
    //     if (!required(this) || !validateNumb(this) || !validateMax(this, 16)) { errorNC++; } else { errorNC = 0; }
    // }
    // valid.onblur = function () {
    //     if (!required(this) || !validateNow(this)) { errorVD++; } else { errorVD = 0; }
    // }

    // codeCard.onblur = function () {
    //     if (!required(this) || !validateNumb(this) || !validateMax(this, 3)) { errorCC++; } else { errorCC = 0; }
    // }
    // let errores = [errorNC, errorVD, errorCC];
    // return (errores[0] == 0 && errores[1] == 0 && errores[2] == 0);
}

function activarVentanaEmergente(productid) {
    console.log("Estoy activarVentanaEmergente() ", poductid);


    // if (productid != undefined) {
    //     descripcion.innerHTML = "Completa los datos para confirmar la compra<br>Producto Cod: #" + productid;
    // }

    // overlay.classList.add('active');
    // popup.classList.add('active');

    // btnCerrarPopup.onclick = () => {
    //     overlay.classList.remove('active');
    //     popup.classList.remove('active');
    // };

    // btnConfirmar.onclick = (e) => {
    //     console.log("Vemos errores dentro de click btnConfirmar");
    //     console.log(validate());
    //     e.preventDefault();
    //     if (validate()) {
    //         realizarCompra(productid);
    //         confirm("Su compra se realizó con éxito! Envío a Siempre viva 1234 en 4 días");
    //         overlay.classList.remove('active');
    //         popup.classList.remove('active');
    //     } else {
    //         alert("Complete correctamente los campos requeridos");
    //     }
    // };
}


function realizarCompra(productid) {

    alert("Estoy en realizarCompra() : " + productid);
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