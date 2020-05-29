@extends("layouts.master")

@section("title")
Home
@endsection

@section("content")


@include("includes.carousel")

<center class="col">
    <img style="max-width: 600px; width:100%; margin: 5% 0px;" src="{{{ asset('storage/pics/imagotipo-allmarket.png') }}}" alt="Allmarket">
</center>
<div class="container marketing" style="margin: 10px 0px;">


    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <h3 class="col-12 col-md-8">{{ trans('idioma.home1t') }}</h3>
            <p>{{ trans('idioma.home1p') }}</p>
            <a class="btn btn-secondary col-12 col-md-4" href="/contacto" role="button">{{ trans('idioma.home1a') }} &raquo;</a>
        </div><!-- /.col-lg-4 -->
        <div class="col-12 col-md-10 offset-md-1">
            <h3 class="col-12 col-md-8">{{ trans('idioma.home2t') }}</h3>
            <p>{{ trans('idioma.home2p') }}</p>
            <a class="btn btn-secondary col-12 col-md-4" href="/listado" role="button">{{ trans('idioma.home2a') }} &raquo;</a>
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
>>>>>>> allmarket_naza
                console.log(e);
            }
        });
    };
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
    
@endauth
@endsection