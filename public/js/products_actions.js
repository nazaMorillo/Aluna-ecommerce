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
                console.log("productoAgregado");
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

function eliminarCarrito(productid, divprodid,precioProd){
    $(document).ready(function(){
        console.log(productid);
        console.log(divprodid);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'/eliminarProducto',
            type:'POST',
            data:{productid},
            success: function(response){
                console.log('productoEliminado');
            },
            error:function(){ 
                console.log("error!!!!");
            }
        });
        $('#'+divprodid).hide();
        var resultado = document.getElementById("total").innerHTML - precioProd;
        console.log(resultado);
        document.getElementById("total").innerHTML = resultado.toFixed(2);
        document.getElementById("cantprodtop").setAttribute("value",parseInt(document.getElementById("cantprodtop").innerHTML) - 1);
        document.getElementById("cantprodtop").innerHTML = parseInt(document.getElementById("cantprodtop").innerHTML) - 1;
    });
}

function comprar(productid){
    $(document).ready(function(){
        console.log("Comprando el producto: "+productid);
        activarVentanaEmergente(productid);
    });
}


function activarVentanaEmergente(productid) {
    var overlay = document.getElementById('overlay'),
        popup = document.getElementById('popup'),
        btnCerrarPopup = document.getElementById('btn-cerrar-popup'),
        descripcion = document.querySelector('.popup > h4');

    overlay.classList.add('active');
    popup.classList.add('active');
    if(productid != undefined){
        descripcion.innerHTML = "Completa los datos a continuación para confirmar compra<br>Producto Cod: #"+productid;
    }    


    btnCerrarPopup.onclick= ()=>{
        overlay.classList.remove('active');
    };
    
}

console.log(window.location.href.split("/"));