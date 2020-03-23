@extends("layouts.master")

@section("content")



    @auth
        <div class="container marketing">
            <!-- START THE FEATURETTES -->        
            <div class="card row">
                <h4 class="card-header">Carrito</h4>
            </div>

            <div class="row">

            @foreach($productos as $producto)
                   
                <div class="card producto col-md-4" id="Producto{{$producto->id}}">
                    <a href="#TOP" style="text-decoration: none; color: rgb(46, 46, 46);">
                        <img src="/storage/{{$producto->image}}" class="card-img-top" alt="{{$producto->id}}">

                        <div class="card-body">
                            <h3>$ {{$producto->price}}</h3>
                            <p class="card-text">{{$producto->name}}</p>                       
                            <!--Función Comprar-->                       

                            <a id="{{$producto->id}}" class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar({{$producto->id}})">Comprar</a>


                            <!--Fin Función Comprar-->
                            <!--Agregar al Carrito-->

                            <a id="{{$producto->id}}" class='btn btn-danger col-12 col-md-12 text-white mt-2 carrito' role="button" onclick="eliminarCarrito({{$producto->id}},'Producto{{$producto->id}}')">Eliminar del carrito</a>


                            <!--Fin Agregar al Carrito-->
                        </div>
                    </a>
                </div>

            @endforeach
            </div>
        </div>
    @endauth
    @guest
        <h1>Debes loguearte para utilizar el carrito</h1>
    @endguest
@endsection

@section("scripts")
    <script src="/js/products_actions.js"></script>
@endsection

