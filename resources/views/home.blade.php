@extends("layouts.master")

@section("title")
Home
@endsection

@section("content")


@include("includes.carousel")

<center>
    <img src="{{{ asset('storage/pics/imagotipo-allmarket.png') }}}" alt="Allmarket">
</center>
<div class="container marketing" style="margin: 10px 0px;">


    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <h3 class="col-12 col-md-8">Sobre nosotros</h3>
            <p>Nuestra plataforma nació de la necesidad de proporcionar una sistema de comercio electronico personalizado y de fácil acceso para cada persona que quiere emprender.</p>
            <a class="btn btn-secondary col-12 col-md-4" href="/contacto" role="button">Contactanos &raquo;</a>
        </div><!-- /.col-lg-4 -->
        <div class="col-12 col-md-10 offset-md-1">
            <h3 class="col-12 col-md-8">Catalogo de producto</h3>
            <p>Revisa nuestro catalogo de productos. Comprar en linea nunca fue tan fácil.</p>
            <a class="btn btn-secondary col-12 col-md-4" href="/listado" role="button">Ver Catalogo &raquo;</a>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div>
@endsection

@section("agregarCarritoGuess")
@auth
<?php session_start(); ?>
<<<<<<< HEAD
@if(isset($_SESSION['Producto']))
<script>
    console.log("seee");

    function agregarCarritoGuess(productid) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/agregarProducto',
            type: 'POST',
            data: {
                productid
            },
            success: function(response) {
                console.log("productoAgregado");
            },
            error: function(e) {
=======
    @if(isset($_SESSION['Producto']))
    <script>console.log("versiesta..");
function agregarCarritoGuess(productid){
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
            },error: function (e) {
>>>>>>> allmarket_alexis_definitiveBranch
                console.log(e);
            }
        });
    };
<<<<<<< HEAD
    agregarCarritoGuess(<?php echo $_SESSION['Producto'] ?>);
</script>
@endif
<?php session_destroy(); ?>
=======
function verSiEstaCart(productid){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url:'/agregarSiNoCart',
        type:'POST',
        data:{productid},
        success: function(response){  
            console.log(response);
            if(response == 'true'){
                agregarCarritoGuess(productid);
                    $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/cantCarrito",
                        type: "GET",
                        success: function (response) {												
                            console.log(parseInt(response));
                            document.getElementById('cantCarrito').setAttribute('value',parseInt(response));
                            document.getElementById('cantCarrito').innerHTML = parseInt(response);
                            },
                        error: function (e) {
                            console.log(e);
                        }
                    });
            }else{
                console.log("Ya está en el carrito");
                $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/cantCarrito",
                        type: "GET",
                        success: function (response) {												
                            console.log(parseInt(response));
                            document.getElementById('cantCarrito').setAttribute('value',parseInt(response));
                            document.getElementById('cantCarrito').innerHTML = parseInt(response);
                            },
                        error: function (e) {
                            console.log(e);
                        }
                    });
            }
        },
        error: function (e) {
            console.log(e);
        }
    });
};
    verSiEstaCart(<?php echo $_SESSION['Producto'] ?>);
        </script>
    @else
    <script>
    $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/cantCarrito",
                        type: "GET",
                        success: function (response) {												
                            console.log(parseInt(response));
                            document.getElementById('cantCarrito').setAttribute('value',parseInt(response));
                            document.getElementById('cantCarrito').innerHTML = parseInt(response);
                            },
                        error: function (e) {
                            console.log(e);
                        }
                    });
    </script>
    @endif
    <?php session_destroy(); ?>
    
>>>>>>> allmarket_alexis_definitiveBranch
@endauth
@endsection