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
        console.log("usuario "+productid);
        console.log(divprodid);
        var cantidad = document.querySelector("#"+divprodid).querySelector(".cantidad").getAttribute("value");
        console.log(cantidad);
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
        var resultado = (parseFloat(document.getElementById("total").innerHTML) - parseFloat((precioProd*parseFloat(cantidad)))).toFixed(2);
        console.log(resultado);
        document.getElementById("total").innerHTML = resultado;
        document.getElementById("cantprodtop").setAttribute("value",parseInt(document.getElementById("cantprodtop").innerHTML) - 1);
        document.getElementById("cantprodtop").innerHTML = parseInt(document.getElementById("cantprodtop").innerHTML) - 1;
    });
}

function comprar(productid){
    $(document).ready(function(){
        console.log("Comprando el producto: "+productid);
        console.log(document.querySelector("#Producto"+productid).querySelector(".cantidad").getAttribute("value"));
    });
}

console.log(window.location.href.split("/"));