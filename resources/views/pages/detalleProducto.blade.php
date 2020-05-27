@extends("layouts.master")

@section("content")

<div class="container marketing">
    <!-- START THE FEATURETTES -->
    <div class="card row">
        <h4 class="card-header">Detalle de {{$producto->brand}} {{$producto->name}}</h4>
    </div>
    @auth
    <?php $enCarrito = false ?>
    @foreach($productosAgregados as $productoAgregado)
    @if($producto->id == $productoAgregado->id)
    <?php $enCarrito = true ?>
    @endif
    @endforeach

    <div id="Producto{{$producto->id}}" class="col-12 producto p-1" style="display: flex; flex-wrap: wrap; justify-content: center; margin-bottom: 2em; background-color: rgba(0,0,0,0.2); box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);">
        <a class="col" href="/productos/{{$producto->id}}"><img class="card-img-top imagen__ajustada" src="/storage/product/{{$producto->image}}" alt="{{$producto->name}}"></a>
        <div class="card-body col-md-8  text-center" style="display: flex; flex-wrap: wrap; justify-content:space-around">
            @if($producto->stock == 0)
            <h3 class=" col-12">$ <strike>{{$producto->price}}</strike></h3>
            @else
            <h3 class="col-12">$ {{$producto->price}}</h3>
            @endif
            @if($producto->stock == 0)
            <h5 class="card-text col-12"><strong>{{$producto->brand}} {{$producto->name}} </strong><span style="color: red;"><b style="font-size: 0.9rem">( Sin unidades disponibles )</b></span></h5>
            @else
            @if($producto->stock == 1)
            <h5 class="card-text col-12"><strong>{{$producto->brand}} {{$producto->name}} </strong><span style="color: darkorange;"><b style="font-size: 0.9rem">( Último disponible! )</b></span></h5>
            @else
            <h5 class="card-text col-12"><strong>{{$producto->brand}} {{$producto->name}}10 </strong><span style="color: green;">{{$producto->stock}} disponibles</span></h5>
            @endif
            @endif
            <p class="card-text col-12">Descripción : {{$producto->description}}</p>
            <div class="col-12 col-md-10 text-center" style="display: flex; justify-content: center; align-items: center;  margin-bottom: 10px">
                <div class="col-2" style="display: flex; justify-content: flex-end; padding:0px;">
                    <button price="{{$producto->price}}" max="{{$producto->stock}}" class="cantidad input-group-text precio" type="text" name="" value="1">1</button>
                </div>
                <div class="col-2" style="display: flex; flex-direction:column; align-items: center;">
                    <button style="height:38px;width:36px;" class=" input-group-text sumar">+</button>
                    <button style="height:38px;width:36px;" class=" input-group-text restar">-</button>
                </div>
                <h4 type="button" class="btn btn-light disabled">
                    Total: $<span id="totPrecCant">{{$producto->price}}</span>
                </h4>
            </div>

            @if($producto->stock == 0)
            <a class="btn btn-lg btn-primary col-12 col-md-5 col-lg-3 m-1 disabled" style="font-size: 0.8em;" href="#" role="button" onclick="comprar({{$producto->id}})">Comprar</a>
            @else
            <a class="btn btn-lg btn-primary col-12 col-md-5 col-lg-3 m-1" style="font-size: 0.8em;" href="#" role="button" onclick="comprar({{$producto->id}})">Comprar</a>
            @endif
            @if($enCarrito == true)
            <a class="btn btn-lg btn-success col-12 col-md-5 col-lg-3 m-1 disabled" style="font-size: 0.8em;" href="#" role="button" id="{{$producto->id}}">Agregado al carrito</a>
            @else
            <a class="btn btn-lg btn-success col-12 col-md-5 col-lg-3 m-1" style="font-size: 0.8em;" href="#" role="button" onclick="agregarCarrito({{$producto->id}})" id="{{$producto->id}}">Agregar al carrito</a>
            @endif

            <a class="btn btn-lg btn-outline-primary col-12 col-md-12 col-lg-3 m-1" style="font-size: 0.8em; background-color:floralwhite;" href="/listado" role="button">Volver al Catálogo</a>
        </div>

    </div>
    @endauth

    @guest
    <?php $enCarrito = false ?>

    <div id="Producto{{$producto->id}}" class="col-12 producto p-1" style="display: flex; flex-wrap: wrap; justify-content: center; padding: 10px; background-color: rgba(0,0,0,0.2); box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);">
        <a class="col" href="/productos/{{$producto->id}}"><img class="card-img-top imagen__ajustada" src="/storage/product/{{$producto->image}}" alt="{{$producto->name}}"></a>
        <div class="card-body col-md-8  text-center" style="display: flex; flex-wrap: wrap; justify-content:space-around">
            @if($producto->stock == 0)
            <h3 class=" col-12">$ <strike>{{$producto->price}}</strike></h3>
            @else
            <h3 class="col-12">$ {{$producto->price}}</h3>
            @endif
            @if($producto->stock == 0)
            <h5 class="card-text col-12"><strong>{{$producto->brand}} {{$producto->name}} </strong><span style="color: red;"><b style="font-size: 0.9rem">( Sin unidades disponibles )</b></span></h5>
            @else
            @if($producto->stock == 1)
            <h5 class="card-text col-12"><strong>{{$producto->brand}} {{$producto->name}} </strong><span style="color: darkorange;"><b style="font-size: 0.9rem">( Último disponible! )</b></span></h5>
            @else
            <h5 class="card-text col-12"><strong>{{$producto->brand}} {{$producto->name}}10 </strong><span style="color: green;">{{$producto->stock}} disponibles</span></h5>
            @endif
            @endif
            <p class="card-text col-12">Descripción : {{$producto->description}}</p>
            <div class="col-12 col-md-10 text-center" style="display: flex; justify-content: center; align-items: center;  margin-bottom: 10px">
                <div class="col-2" style="display: flex; justify-content: flex-end; padding:0px;">
                    <button price="{{$producto->price}}" max="{{$producto->stock}}" class="cantidad input-group-text precio" type="text" name="" value="1">1</button>
                </div>
                <div class="col-2" style="display: flex; flex-direction:column; align-items: center;">
                    <button style="height:38px;width:36px;" class=" input-group-text sumar">+</button>
                    <button style="height:38px;width:36px;" class=" input-group-text restar">-</button>
                </div>
                <h4 type="button" class="btn btn-light disabled">
                    Total: $<span id="totPrecCant">{{$producto->price}}</span>
                </h4>
            </div>

            @if($producto->stock == 0)
            <a class="btn btn-lg btn-primary col-12 col-md-5 col-lg-3 m-1 disabled" style="font-size: 0.8em;" href="#" role="button" onclick="comprar({{$producto->id}})">Comprar</a>
            @else
            <a class="btn btn-lg btn-primary col-12 col-md-5 col-lg-3 m-1" style="font-size: 0.8em;" href="#" role="button" onclick="comprar({{$producto->id}})">Comprar</a>
            @endif
            @if($enCarrito == true)
            <a class="btn btn-lg btn-success col-12 col-md-5 col-lg-3 m-1 disabled" style="font-size: 0.8em;" href="/login" role="button" onclick="agregarDesdeLoguin({{$producto->id}})" id="{{$producto->id}}">Agregado al carrito</a>
            @else
            <a class="btn btn-lg btn-success col-12 col-md-5 col-lg-3 m-1" style="font-size: 0.8em;" href="/login" role="button" onclick="agregarDesdeLoguin({{$producto->id}})" id="{{$producto->id}}">Agregar al carrito</a>
            @endif

            <a class="btn btn-lg btn-outline-primary col-12 col-md-12 col-lg-3 m-1" style="font-size: 0.8em; background-color:floralwhite;" href="/listado" role="button">Volver al Catálogo</a>
        </div>

    </div>



    @endguest
    @include("includes.modal")
    @endsection

    <!-- <script src="/js/products_actions.js"></script> -->
    <!-- <script src="/js/products_more.js"></script> -->
    @section("scripts")

    <script>
        
        window.onload = function() {
            document.querySelector("form").reset();
            document.querySelector('.sumar').addEventListener("click", function() {
                let boton = this.parentNode.parentNode.querySelector(".cantidad");
                if(parseInt(boton.getAttribute("max")) > parseInt(boton.innerHTML)){
                  let precioFinal = this.parentNode.parentNode.querySelector("#totPrecCant");
                  boton.innerHTML = parseInt(boton.innerHTML) + 1;
                  boton.setAttribute("value",parseInt(boton.innerHTML));
                  precioFinal.innerHTML = (boton.getAttribute("price") * boton.getAttribute("value")).toFixed(2);
                }	
            });
            
            function agregarDesdeLoguin(id) {
            console.log("El id es: " + id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/agregarCarritoLoguin',
                type: 'POST',
                data: {
                    id
                },
                success: function(response) {
                    console.log(response);
                    location.href = "/login";
                },
                error: function(e) {
                    console.log(e);
                }
            });
        }
        }
    </script>
    <script src="/js/products_actions.js"></script>
    <!-- <script src="/js/products_more.js"></script> -->
    @endsection