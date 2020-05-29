@extends("layouts.master")

@section("content")

    <div class="container marketing">
        <!-- START THE FEATURETTES -->        
        <div class="card row">
            <h4 class="card-header">{{trans('idioma.listTitle')}}</h4>
        </div>
        @auth

        <div class="row">

        @foreach($productos as $producto)
        <?php $enCarrito = false ?>
                @foreach($productosAgregados as $productoAgregado)
                    @if($producto->id == $productoAgregado->id)
                    <?php $enCarrito = true ?>
                    @endif
                @endforeach
                @if($producto->stock == 0)
                    <div class="card producto col-md-3" id="Producto{{$producto->id}}">
                <a href="/productos/{{$producto->id}}" style="text-decoration: none; color: rgb(46, 46, 46);">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" alt="{{$producto->id}}" class="card-img-top img-thumbnail" alt="Producto1" style="height: 200px; object-fit: cover;"></a>

                    <div class="card-body">
                        <h3>$ {{$producto->price}}</h3>
                        <p class="card-text"> {{$producto->name}}</p>

                        <!--Agregar al Carrito-->

                        <a id="{{$producto->id}}" class='btn bg-black col-12 col-md-12 text-white mt-2 carrito disabled' role="button">{{trans('idioma.listWithoutUnits')}}</a>

                        <!--Fin Agregar al Carrito-->
                    </div>
                
            </div>
                @elseif($producto->stock == 1 && $enCarrito == false)
                    <div class="card producto col-md-3" id="Producto{{$producto->id}}">
                <a href="/productos/{{$producto->id}}" style="text-decoration: none; color: rgb(46, 46, 46);">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" alt="{{$producto->id}}" class="card-img-top img-thumbnail" alt="Producto1" style="height: 200px; object-fit: cover;"></a>

                    <div class="card-body">
                        <h3>$ {{$producto->price}}</h3>
                        <p class="card-text"> {{$producto->name}} ({{trans('idioma.listLastAvailable')}}!)</p>
                        <!--Función Comprar-->                       

                        <!--<a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar({{$producto->id}})">Comprar</a>-->


                        <!--Fin Función Comprar-->
                        <!--Agregar al Carrito-->

                        <a id="{{$producto->id}}" class='btn btn-success col-12 col-md-12 text-white mt-2 carrito' role="button" onclick="agregarCarrito({{$producto->id}})">{{trans('idioma.listAddToCart')}}</a>


                        <!--Fin Agregar al Carrito-->
                    </div>
                
            </div>
                @elseif($producto->stock == 1 && $enCarrito == true)
                    <div class="card producto col-md-3" id="Producto{{$producto->id}}">
                <a href="/productos/{{$producto->id}}" style="text-decoration: none; color: rgb(46, 46, 46);">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" alt="{{$producto->id}}" class="card-img-top img-thumbnail" alt="Producto1" style="height: 200px; object-fit: cover;"></a>

                    <div class="card-body">
                        <h3>$ {{$producto->price}}</h3>
                        <p class="card-text"> {{$producto->name}} ({{trans('idioma.listLastAvailable')}}!)</p>
                        <!--Función Comprar-->                       

                        <!--<a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar({{$producto->id}})">Comprar</a>-->


                        <!--Fin Función Comprar-->
                        <!--Agregar al Carrito-->

                        <a id="{{$producto->id}}" class='btn btn-secondary col-12 col-md-12 text-white mt-2 carrito disabled' role="button">{{trans('idioma.listAddedToCart')}}</a>

                        <!--Fin Agregar al Carrito-->
                    </div>
                
            </div>
                @elseif($enCarrito == true)
                    <div class="card producto col-md-3" id="Producto{{$producto->id}}">
                <a href="/productos/{{$producto->id}}" style="text-decoration: none; color: rgb(46, 46, 46);">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" alt="{{$producto->id}}" class="card-img-top img-thumbnail" alt="Producto1" style="height: 200px; object-fit: cover;"></a>

                    <div class="card-body">
                        <h3>$ {{$producto->price}}</h3>
                        <p class="card-text"> {{$producto->name}}</p>
                        <!--Función Comprar-->                       

                        <!--<a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar({{$producto->id}})">Comprar</a>--> 


                        <!--Fin Función Comprar-->
                        <!--Agregar al Carrito-->

                        <a id="{{$producto->id}}" class='btn btn-secondary col-12 col-md-12 text-white mt-2 carrito disabled' role="button" onclick="agregarCarrito({{$producto->id}})">{{trans('idioma.listAddedToCart')}}</a>

                        <!--Fin Agregar al Carrito-->
                    </div>
                
            </div>
                    @else
                    <div class="card producto col-md-3" id="Producto{{$producto->id}}">
                <a href="/productos/{{$producto->id}}" style="text-decoration: none; color: rgb(46, 46, 46);">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" alt="{{$producto->id}}" class="card-img-top img-thumbnail" alt="Producto1" style="height: 200px; object-fit: cover;"></a>

                    <div class="card-body">
                        <h3>$ {{$producto->price}}</h3>
                        <p class="card-text"> {{$producto->name}}</p>
                        <!--Función Comprar-->                       

                        <!--<a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar({{$producto->id}})">Comprar</a>-->


                        <!--Fin Función Comprar-->
                        <!--Agregar al Carrito-->

                        <a id="{{$producto->id}}" class='btn btn-success col-12 col-md-12 text-white mt-2 carrito' role="button" onclick="agregarCarrito({{$producto->id}})">{{trans('idioma.listAddToCart')}}</a>


                        <!--Fin Agregar al Carrito-->
                    </div>
                
            </div>
                    @endif
        @endforeach
        </div>
        <div class="mx-auto">{{$productos->links()}}</div>
        </div>
        @endauth
        @guest

        <div class="row">

        @foreach($productos as $producto)
        <?php $enCarrito = false ?>
                <!--@foreach($productosAgregados as $productoAgregado)
                    @if($producto->id == $productoAgregado->id)
                    <?php $enCarrito = true ?>
                    @endif
                @endforeach-->
                @if($enCarrito == true)
                    <div style="z-index:1" class="card producto col-md-3" id="Producto{{$producto->id}}">
                <a href="/productos/{{$producto->id}}" style="text-decoration: none; color: rgb(46, 46, 46);">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" alt="{{$producto->id}}" class="card-img-top img-thumbnail" alt="Producto1" style="height: 200px; object-fit: cover;"></a>

                    <div class="card-body">
                        <h3>$ {{$producto->price}}</h3>
                        <p class="card-text"> {{$producto->name}}</p>
                        <!--Función Comprar-->                       

                        <!--<a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar({{$producto->id}})">Comprar</a>-->


                        <!--Fin Función Comprar-->
                        <!--Agregar al Carrito-->

                        <a id="{{$producto->id}}" class='btn btn-secondary col-12 col-md-12 text-white mt-2 carrito disabled' role="button">{{trans('idioma.listAddedToCart')}}</a>

                        <!--Fin Agregar al Carrito-->
                    </div>
                
            </div>
                    @elseif($producto->stock == 0)
                    <div class="card producto col-md-3" id="Producto{{$producto->id}}">
                <a href="/productos/{{$producto->id}}" style="text-decoration: none; color: rgb(46, 46, 46);">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" alt="{{$producto->id}}" class="card-img-top img-thumbnail" alt="Producto1" style="height: 200px; object-fit: cover;"></a>

                    <div class="card-body">
                        <h3>$ {{$producto->price}}</h3>
                        <p class="card-text"> {{$producto->name}}</p>
                        <!--Función Comprar-->                       

                        <!--<a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar({{$producto->id}})">Comprar</a>-->

                        <a class='btn bg-black col-12 col-md-12 text-white mt-2 carrito disabled' role="button" href="/login">{{trans('idioma.listWithoutUnits')}}</a>

                        <!--Fin Función Comprar-->
                        <!--Agregar al Carrito-->

                        <!--<a id="{{$producto->id}}" class='btn btn-success col-12 col-md-12 text-white mt-2 carrito' role="button" onclick="agregarCarrito({{$producto->id}})">Agregar al carrito</a>-->

                        <!--Fin Agregar al Carrito-->
                    </div>
                
            </div>  
                    @elseif($producto->stock == 1)
                    <div class="card producto col-md-3" id="Producto{{$producto->id}}">
                <a href="/productos/{{$producto->id}}" style="text-decoration: none; color: rgb(46, 46, 46);">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" alt="{{$producto->id}}" class="card-img-top img-thumbnail" alt="Producto1" style="height: 200px; object-fit: cover;"></a>

                    <div class="card-body">
                        <h3>$ {{$producto->price}}</h3>
                        <p class="card-text"> {{$producto->name}} ({{trans('idioma.listLastAvailable')}}!)</p>
                        <!--Función Comprar-->                       

                        <!--<a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar({{$producto->id}})">Comprar</a>-->

                        <!--<a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" href="/login">Comprar</a>-->

                        <!--Fin Función Comprar-->
                        <!--Agregar al Carrito-->

                        <!--<a id="{{$producto->id}}" class='btn btn-success col-12 col-md-12 text-white mt-2 carrito' role="button" onclick="agregarCarrito({{$producto->id}})">Agregar al carrito</a>-->

                        <a id="{{$producto->id}}" class='btn btn-success col-12 col-md-12 text-white mt-2 carrito' role="button" onclick="agregarDesdeLoguin({{$producto->id}})">{{trans('idioma.listAddToCart')}}</a>

                        <!--Fin Agregar al Carrito-->
                    </div>
                
            </div>                                      
                    @else
                    <div class="card producto col-md-3" id="Producto{{$producto->id}}">
                <a href="/productos/{{$producto->id}}" style="text-decoration: none; color: rgb(46, 46, 46);">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" alt="{{$producto->id}}" class="card-img-top img-thumbnail" alt="Producto1" style="height: 200px; object-fit: cover;"></a>

                    <div class="card-body">
                        <h3>$ {{$producto->price}}</h3>
                        <p class="card-text"> {{$producto->name}}</p>
                        <!--Función Comprar-->                       

                        <!--<a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar({{$producto->id}})">Comprar</a>-->

                        <!--<a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" href="/login">Comprar</a>-->

                        <!--Fin Función Comprar-->
                        <!--Agregar al Carrito-->

                        <!--<a id="{{$producto->id}}" class='btn btn-success col-12 col-md-12 text-white mt-2 carrito' role="button" onclick="agregarCarrito({{$producto->id}})">Agregar al carrito</a>-->

                        <a id="{{$producto->id}}" class='btn btn-success col-12 col-md-12 text-white mt-2 carrito' role="button" onclick="agregarDesdeLoguin({{$producto->id}})">{{trans('idioma.listAddToCart')}}</a>

                        <!--Fin Agregar al Carrito-->
                    </div>
                
            </div>
                    @endif
        @endforeach
        <div class="col-12">{{$productos->links()}}</div>
        </div>
        @endguest
    </div>
    @include("includes.modal")


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
    <script>
        function agregarDesdeLoguin(id){
            console.log("El id es: "+id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/agregarCarritoLoguin',
                type:'POST',
                data:{id},
                success: function(response){
                    console.log(response);
                    location.href = "/login";
            },
            error: function (e) {
                console.log(e);
            }
        });
        }
    </script>
    <script src="/js/products_actions.js"></script>
@endsection