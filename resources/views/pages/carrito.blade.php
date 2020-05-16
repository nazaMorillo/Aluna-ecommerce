@extends("layouts.master")

@section("content")


    @auth
    <?php $totalCarrito = 0;?>
        <div class="container marketing">
            <!-- START THE FEATURETTES -->        

                <h3 style="text-align: left;">Carrito (<span id="cantprodtop" value="<?= count($productos) ?>"><?= count($productos) ?></span>)</h3>


           <div class="container marketing text-center">
            <!-- START THE FEATURETTES -->      
            @foreach($productos as $producto)
            <?php
            if($producto->stock > 0){
                $totalCarrito +=  $producto->price;
            } 
            ?>
            @endforeach
            @if(count($productos) == 0)
            <h3>No tienes productos en el carrito, puedes ir al catálogo o escribir en la barra de búsqueda lo que deseas encontrar</h3>
            @else
            @foreach($productos as $producto)
            @if($producto->stock == 0)
           <div id="Producto{{$producto->id}}" class="col-12 producto" style="display: flex; flex-wrap: wrap; padding: 10px 0px;">
                <a class="col-md-7" href="/productos/{{$producto->id}}"><img class="card-img-top " src="/storage/product/{{$producto->image}}" alt="" style="max-width:450px"></a>
                <div class="card-body col-md-5">
                    <!-- <div  class=" col-12"> -->
                        <h3 class=" col-12">$ <strike>{{$producto->price}}</strike></h3>
                        <p class="card-text col-12">{{$producto->name}}</p>
                    <!-- </div> -->
                    
                    <a class='btn col-12 col-md-12 text-white mt-2 comprar bg-black disabled' <?="id=".$producto['id'] ?> role="button" price="{{$producto->price}}">Sin unidades</a>
                    <a class='btn btn-danger col-12 col-md-12 text-white mt-2 eliminar' <?="id=".$producto['id'] ?> role="button" price="{{$producto->price}}" onclick="eliminarCarrito({{$producto->pivot->id}},'Producto{{$producto->id}}',0)">Eliminar</a>
                </div>

            </div>            
            @elseif($producto->stock == 1)
           <div id="Producto{{$producto->id}}" class="col-12 producto" style="display: flex; flex-wrap: wrap; padding: 10px 0px;">
                <a class="col-md-7" href="/productos/{{$producto->id}}"><img class="card-img-top " src="/storage/product/{{$producto->image}}" alt="" style="max-width:450px"></a>
                <div class="card-body col-md-5">
                    <!-- <div  class=" col-12"> -->
                        <h3 class=" col-12">$ {{$producto->price}}</h3>
                        <p class="card-text col-12">{{$producto->name}} (Último disponible!)</p>
                    <!-- </div> -->

                    <div class="col-12 text-center" style="display: flex; justify-content: flex-end;">
                        <button price="{{$producto->price}}" class="cantidad input-group-text precio col-2 text-center" style="text-align: center;" type="text" name="" value="1">1</button>
                        <button type="button" class="btn btn-light disabled col">Total: $<span id="totPrecCant">{{$producto->price}}</span></button>
                    </div>
                    <!--<a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' <?="id=".$producto['id'] ?> role="button" price="{{$producto->price}}" onclick="comprar({{$producto->id}})" >Comprar</a>-->
                    <a class='btn btn-danger col-12 col-md-12 text-white mt-2 eliminar' <?="id=".$producto['id'] ?> role="button" price="{{$producto->price}}" onclick="eliminarCarrito({{$producto->pivot->id}},'Producto{{$producto->id}}',{{$producto->price}})">Eliminar</a>
                </div>

            </div>            
            @else  
           <div id="Producto{{$producto->id}}" class="col-12 producto" style="display: flex; flex-wrap: wrap; padding: 10px 0px;">
                <a class="col-md-7" href="/productos/{{$producto->id}}"><img class="card-img-top " src="/storage/product/{{$producto->image}}" alt="" style="max-width:450px"></a>
                <div class="card-body col-md-5">
                    <!-- <div  class=" col-12"> -->
                        <h3 class=" col-12">$ {{$producto->price}}</h3>
                        <p class="card-text col-12">{{$producto->name}}</p>
                    <!-- </div> -->

                    <div class="col-12 text-center" style="display: flex; justify-content: flex-end;">
                        <button price="{{$producto->price}}" max="{{$producto->stock}}" class="cantidad input-group-text precio col-2 text-center" style="text-align: center;" type="text" name="" value="1">1</button>
                        <div class="col-2 text-center">
                            <button class="col-12 text-center input-group-text sumar">+</button>
                            <button class="col-12 text-center input-group-text restar">-</button>
                        </div>
                        <button type="button" class="btn btn-light disabled col">Total: $<span id="totPrecCant">{{$producto->price}}</span></button>
                    </div>
                    <!--<a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' <?="id=".$producto['id'] ?> role="button" price="{{$producto->price}}" onclick="comprar({{$producto->id}})" >Comprar</a>-->
                    <a class='btn btn-danger col-12 col-md-12 text-white mt-2 eliminar' <?="id=".$producto['id'] ?> role="button" price="{{$producto->price}}" onclick="eliminarCarrito({{$producto->pivot->id}},'Producto{{$producto->id}}',{{$producto->price}})">Eliminar</a>
                </div>
            </div>
            @endif
            @endforeach
            @endif
        </div>
        </div>
        <div class="col-sm-12 mt-3 bg-light">
                <a class="btn bg-dark disabled text-white col-10 mt-2"><h2>Total: <span id="total" precini="{{$totalCarrito}}" value="{{$totalCarrito}}">{{$totalCarrito}}</span></h2></a>
                <a class='btn btn-success col-1 text-white mt-2 comprar' id="btnComprarCarrito" onclick="comprarCarrito()" >Comprar</a>
            </div>
            @include("includes.modal")
    @endauth
    @guest
        <h1>Debes loguearte para utilizar el carrito</h1>
    @endguest
@endsection

@section("scripts")
    <script src="/js/products_actions.js"></script>
    <script src="/js/products_more.js"></script>
@endsection

