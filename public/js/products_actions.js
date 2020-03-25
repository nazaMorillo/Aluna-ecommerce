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
           document.getElementById(productid).removeAttribute("class");
           document.getElementById(productid).setAttribute("class","btn btn-secondary mt-2 col-12 col-md-12 text-white disabled");
           document.getElementById(productid).innerHTML = "Agregado al carrito";
    });
    console.log("luego de la funcion");
}

function eliminarCarrito(productid, divprodid){
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
    });
    console.log("Eliminando del carrito");
}