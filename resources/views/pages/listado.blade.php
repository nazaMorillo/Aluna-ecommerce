@extends("layouts.master")

@section("content")

    <div class="container marketing">
        <!-- START THE FEATURETTES -->        
        <div class="card row">
            <h4 class="card-header">Encuentra lo que estás buscando</h4>
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

                        <a id="{{$producto->id}}" class='btn bg-black col-12 col-md-12 text-white mt-2 carrito disabled' role="button">Sin unidades</a>

                        <!--Fin Agregar al Carrito-->
                    </div>
                
            </div>
                @elseif($producto->stock == 1 && $enCarrito == false)
                    <div class="card producto col-md-3" id="Producto{{$producto->id}}">
                <a href="/productos/{{$producto->id}}" style="text-decoration: none; color: rgb(46, 46, 46);">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" alt="{{$producto->id}}" class="card-img-top img-thumbnail" alt="Producto1" style="height: 200px; object-fit: cover;"></a>

                    <div class="card-body">
                        <h3>$ {{$producto->price}}</h3>
                        <p class="card-text"> {{$producto->name}} (Último disponible!)</p>
                        <!--Función Comprar-->                       

                        <a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar({{$producto->id}})">Comprar</a>


                        <!--Fin Función Comprar-->
                        <!--Agregar al Carrito-->

                        <a id="{{$producto->id}}" class='btn btn-success col-12 col-md-12 text-white mt-2 carrito' role="button" onclick="agregarCarrito({{$producto->id}})">Agregar al carrito</a>


                        <!--Fin Agregar al Carrito-->
                    </div>
                
            </div>
                @elseif($producto->stock == 1 && $enCarrito == true)
                    <div class="card producto col-md-3" id="Producto{{$producto->id}}">
                <a href="/productos/{{$producto->id}}" style="text-decoration: none; color: rgb(46, 46, 46);">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" alt="{{$producto->id}}" class="card-img-top img-thumbnail" alt="Producto1" style="height: 200px; object-fit: cover;"></a>

                    <div class="card-body">
                        <h3>$ {{$producto->price}}</h3>
                        <p class="card-text"> {{$producto->name}} (Último disponible!)</p>
                        <!--Función Comprar-->                       

                        <a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar({{$producto->id}})">Comprar</a>


                        <!--Fin Función Comprar-->
                        <!--Agregar al Carrito-->

                        <a id="{{$producto->id}}" class='btn btn-secondary col-12 col-md-12 text-white mt-2 carrito disabled' role="button">Agregado al carrito</a>

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

                        <a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar({{$producto->id}})">Comprar</a>


                        <!--Fin Función Comprar-->
                        <!--Agregar al Carrito-->

                        <a id="{{$producto->id}}" class='btn btn-secondary col-12 col-md-12 text-white mt-2 carrito disabled' role="button">Agregado al carrito</a>

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

                        <a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar({{$producto->id}})">Comprar</a>


                        <!--Fin Función Comprar-->
                        <!--Agregar al Carrito-->

                        <a id="{{$producto->id}}" class='btn btn-success col-12 col-md-12 text-white mt-2 carrito' role="button" onclick="agregarCarrito({{$producto->id}})">Agregar al carrito</a>


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

                        <a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar({{$producto->id}})">Comprar</a>


                        <!--Fin Función Comprar-->
                        <!--Agregar al Carrito-->

                        <a id="{{$producto->id}}" class='btn btn-secondary col-12 col-md-12 text-white mt-2 carrito disabled' role="button">Agregado al carrito</a>

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

                        <a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" href="/login">Comprar</a>

                        <!--Fin Función Comprar-->
                        <!--Agregar al Carrito-->

                        <!--<a id="{{$producto->id}}" class='btn btn-success col-12 col-md-12 text-white mt-2 carrito' role="button" onclick="agregarCarrito({{$producto->id}})">Agregar al carrito</a>-->

                        <a id="{{$producto->id}}" class='btn btn-success col-12 col-md-12 text-white mt-2 carrito' role="button" href="/login">Agregar al carrito</a>

                        <!--Fin Agregar al Carrito-->
                    </div>
                
            </div>
                    @endif
        @endforeach
        <div class="mx-auto">{{$productos->links()}}</div>
        </div>
        @endguest
    </div>
    


@endsection

@section("scripts")
    <script src="/js/products_actions.js"></script>
@endsection