@extends("layouts.master")

@section("content")

    @auth
    <?php $totalCarrito = 0;?>
        <div class="container marketing">
            <!-- START THE FEATURETTES -->
            <div style="display: flex-inline; justify-content: space-between">
                <h3 class="col-12 col-md-6 mt-3" style="text-align: left;">{{trans('idioma.cartTitle')}} (<span id="cantprodtop" value="<?= count($productos) ?>"><?= count($productos) ?></span>)</h3>
                <?php if(count($productos)>0){                    
                    echo "<a class='col-12 col-md-4 mt-2 btn btn-danger btn-lg text-white' style='display: flex; justify-content: space-evenly; align-items:center; align-self: flex-start; margin-left: auto; role='button' onclick='eliminarTodoCarrito()'>".trans('idioma.cartDropCart')." <i class='far fa-trash-alt'></i></a>";
                }  ?>
                
            </div>        
            <hr>
            <!-- START THE FEATURETTES -->      
            @foreach($productos as $producto)
            <?php
            if($producto->stock > 0){
                $totalCarrito +=  $producto->price;
            } 
            ?>
            @endforeach
            @if(count($productos) == 0)            
            <div id="mensaje">
                <h3>{{trans('idioma.cartMessageEmpty')}}</h3>
            </div>
            @else
            @foreach($productos as $producto)
            <div id="Producto{{$producto->id}}" class="col-12 producto p-1" style="display: flex; flex-wrap: wrap; justify-content: center; padding: 10px; background-color: rgba(0,0,0,0.2); box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);">
                    <a class="col" href="/productos/{{$producto->id}}"><img class="card-img-top imagen__ajustada" src="/storage/product/{{$producto->image}}" alt="{{$producto->name}}"></a>
                <div class="card-body col-md-8  text-center" style="display: flex; flex-wrap: wrap; justify-content: center">
                    @if($producto->stock == 0)
                    <h3 class=" col-12">$ <strike>{{$producto->price}}</strike></h3>                        
                    @else
                    <h3 class="col-12">$ {{$producto->price}}</h3>
                    @endif
                    @if($producto->stock == 0)
                    <h5 class="card-text col-12"><strong>{{$producto->brand}} {{$producto->name}} </strong><span style="color: red;"><b>({{trans('idioma.listWithoutUnits')}})</b></span></h5>
                    @else
                        @if($producto->stock == 1)
                        <h5 class="card-text col-12"><strong>{{$producto->brand}} {{$producto->name}} </strong><span style="color: orange;"><b>({{trans('idioma.listLastAvailable')}}!)</b></span></h5>
                        @else
                        <h5 class="card-text col-12"><strong>{{$producto->brand}} {{$producto->name}} </strong><span style="color: green;">{{$producto->stock}} {{trans('idioma.detailAvailable')}}</span></h5>
                        @endif
                    @endif
                    <p class="card-text col-12">{{$producto->description}}</p>
                    <div class="col-12 col-md-8 text-center" style="display: flex; justify-content: flex-end; align-items: center;">
                        <div class="col-2">
                            <button price="{{$producto->price}}" max="{{$producto->stock}}" class="cantidad input-group-text precio text-center" style="text-align: center;margin:auto" type="text" name="" value="1">1</button>
                        </div>
                        <div class="col-3 text-center">
                            <button style="height:38px;width:36px; margin:auto" class="text-center input-group-text sumar">+</button>
                            <button style="height:38px;width:36px;margin:auto" class="text-center input-group-text restar">-</button>
                        </div>
                        <h4 type="button" class="btn btn-light disabled">
                            Total: $<span id="totPrecCant">{{$producto->price}}</span>
                        </h4>
                    </div>
                    <a class='btn btn-danger col-12 col-md-3 text-white mt-2 eliminar btn-lg' style="display: flex; justify-content: center; align-items:center; align-self: flex-start; margin-left: auto;" <?="id=".$producto['id'] ?> role="button" price="{{$producto->price}}" onclick="eliminarCarrito({{$producto->pivot->id}},'Producto{{$producto->id}}',{{$producto->price}},'hr{{$producto->id}}')"><i class="far fa-trash-alt"></i></a>
                </div>                
            </div>
            <hr id="hr{{$producto->id}}">            
            @endforeach
            @endif
            <div class="col-12 col-md-12 bg-light btn-lg disabled d-flex" style="flex-wrap:wrap; justify-content: space-evenly" id="finalizarCompra">
                @if(count($productos) > 0)
                <a class='col-12 col-md-4 m-1 btn btn-danger btn-lg text-white' style="display: flex; justify-content: space-evenly; align-items:center;" <?="id=".$producto['id'] ?> role="button" price="{{$producto->price}}" onclick="eliminarTodoCarrito()">{{trans('idioma.cartDropCart')}} <i class="far fa-trash-alt"></i></a>

                <a class="col-12 col-md-3 m-1 btn btn-outline-info btn-lg disabled">
                Total: $<span id="total" precini="{{$totalCarrito}}" value="{{$totalCarrito}}">{{$totalCarrito}}</span>
                </a>
                @endif
                @if(count($productos) == 0)
                <a class="col-12 col-md-4 m-1 btn btn-success btn-lg text-white comprar disabled" id="btnComprarCarrito" onclick="comprarCarrito()">
                {{trans('idioma.cartWithoutProducts')}}
                </a>
                @else
                <a class="col-12 col-md-4 m-1 btn btn-success btn-lg text-white comprar" id="btnComprarCarrito" onclick="comprarCarrito()" role="button">
                {{trans('idioma.cartFinishBuy')}}
                </a>
                @endif
            </div>
        </div>           
    @include("includes.modal")
    @endauth
    @guest
        <h1>{{trans('idioma.cartGuess')}}</h1>
    @endguest
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
    <script src="/js/products_actions.js"></script>
    <script src="/js/products_more.js"></script>
@endsection

