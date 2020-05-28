@extends("layouts.master")

@section('content')
<main role="main">
      <section>
    <div class="row container mt-3 mx-auto">
        <div class="col-12 col-md-3" style="margin-top: 15px; margin-bottom: 5px;">
        </div>
        <div class="col-12 col-md-6" style="margin-top: 15px; margin-bottom: 5px;">
            <h2>{{trans('idioma.perfilTitle')}} {{Auth::user()->name}}!</h2>
            <section class="container mt-3">
                <h4>{{trans('idioma.perfilTitle2')}}</h4>
                <div class="row">
                    <!-- <div class="col-md-12"> -->
                        <form class=" mb-3" action="/actualizarPerfil" enctype="multipart/form-data" method="post">
                        @csrf
                            <div class="form-group column d-flex flex-column">
                                
                                <input name="username" type="text" class="form-control" placeholder="Ingresa tu nombre" value="{{Auth::user()->name}}">
                                <span class="messagerror"></span>                            </div>
                            <div class="form-group column d-flex flex-column">
                                
                                <input value="{{Auth::user()->surname}}" name="usersecondname" type="text" class="form-control col-12" placeholder="Ingresá tu apellido" aria-describedby="emailHelp">
                                <span class="messagerror"></span>                            </div>
                            <div class="form-group column d-flex flex-column">
                                <input value="{{Auth::user()->email}}" name="useremail" type="email" class="form-control col-12 disabled" id="exampleInputEmail1" placeholder="Ingresa tu correo" aria-describedby="emailHelp" disabled>
                                <span class="messagerror"></span>                            </div>
                            <div class="form-group column">
                                <input name="userpassword" type="password" class="form-control col-12" id="passwordToAuth" placeholder="Ingresa tu contraseña">
                                <span class="messagerror"></span>                            </div>
                           
                            <div class="row">
                            <div id="preview"></div>
                            <!--<img id="imagen" src="/storage/{{Auth::user()->avatar}}" class="profile rounded-circle d-block col-sm-3 col-4">-->
                            <div id="previewImage" class="rounded-circle" style="height:102px;width:102px;background-size:cover;background-position:center;margin-left: 15px;margin-right: 15px;background-image:url('/storage/{{Auth::user()->avatar}}')"></div>
                            <div class="col-xs-6 col-md-9">
                                <h6>{{trans('idioma.perfilSelectImage')}}</h6>
                                <input id="file" type="file" name="userimage" class="btn btn-outline-dark bg-dark col-md-12 text-white mb-1">
                                                                <h6 id="unselectimage">{{trans('idioma.perfilDontChooseYet')}}</h6>
                            </div>
                            </div>

                            <br>
                            <button id="resetear" type="reset" class="btn btn-outline-dark bg-dark col-md-12 text-white mb-2">{{trans('idioma.perfilCancel')}}</button>
                            <input type="submit" id="guardarPerfil" name="guardarPerfil" value="{{trans('idioma.perfilSave')}}" class="btn btn-outline-dark bg-dark col-md-12 text-white mb-2">
                        </form>
                    <!-- </div> -->
                </div>
            </section>
            <h3>{{trans('idioma.perfilBuy')}}</h3>
            <p>{{trans('idioma.perfilBuyText')}}</p>
        </div>
        <div class="col-12 col-md-3" style="margin-top: 15px; margin-bottom: 5px;">
        <div id="preview2" class="rounded-circle" style="height:102px;width:102px;background-size:cover;background-position:center;margin-left: 15px;margin-right: 15px;"></div>
        </div>
    </div>
</section>
</main>
@endsection

@section("agregarCarritoGuess")
@auth
<?php session_start(); ?>
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

@section("scripts")
<script src="/js/perfil.js"></script>
@endsection