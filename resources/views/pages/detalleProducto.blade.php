@extends("layouts.master")

@section("content")
<div class="container marketing">
    <!-- START THE FEATURETTES -->
    <div class="card row">

        <h4 class="card-header">Detalle producto {{$producto->id}}</h4>
    </div>
@auth
<?php $enCarrito = false ?>
                @foreach($productosAgregados as $productoAgregado)
                    @if($producto->id == $productoAgregado->id)
                    <?php $enCarrito = true ?>
                    @endif
                @endforeach
    @if($producto->stock == 0)
    <div class="row producto">
        <div class="card mb-3 ml-auto  col-md-12">
            <div class="row no-gutters">
                <div class="col-md-7 col-lg-8">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" style="max-width:350px;" alt="Producto{{$producto->id}}">
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="card-body">
                        <h4 class="card-title">{{$producto->name}}</h4>
                        <h5 class="card-title col-md-6">$ {{$producto->price}}</h5>
                        <p class="card-text col-md-6"><small class="text-muted">Stock: {{$producto->stock}}</small></p>
                    </div>
                </div>
                <div class="col-md-12" style="padding:20px; display: flex; flex-wrap: wrap; justify-content: space-between;">
                    <a id="{{$producto->id}}" class="btn btn-lg bg-black col-12 col-md-3 text-white disabled" style="font-size: 0.8em;" href="#" role="button">Sin unidades</a>
                    <a class="btn btn-lg btn-alert col-12 col-md-3" style="font-size: 0.8em; box-shadow: black 1px 1px 3px;" href="/listado" role="button">Ver Listado</a>
                </div>
            </div>
        </div>
    </div>
    @elseif($producto->stock == 1 and $enCarrito == false)
    <div class="row producto">
        <div class="card mb-3 ml-auto  col-md-12">
            <div class="row no-gutters">
                <div class="col-md-7 col-lg-8">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" style="max-width:350px;" alt="Producto{{$producto->id}}">
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="card-body">
                        <h4 class="card-title">{{$producto->name}} (Último disponible!)</h4>
                        <h5 class="card-title col-md-6">$ {{$producto->price}}</h5>
                        <p class="card-text col-md-6"><small class="text-muted">Stock: {{$producto->stock}}</small></p>
                    </div>
                </div>
                <div class="col-md-12" style="padding:20px; display: flex; flex-wrap: wrap; justify-content: space-between;">

                    <a class="btn btn-lg btn-primary col-12 col-md-3" style="font-size: 0.8em;" href="#" role="button" onclick="comprar({{$producto->id}})">Comprar</a>


                    <a id="{{$producto->id}}" class="btn btn-lg btn-success col-12 col-md-3" style="font-size: 0.8em;" href="#" role="button" onclick="agregarCarrito({{$producto->id}})">Agregar al carrito</a>
                    <a class="btn btn-lg btn-alert col-12 col-md-3" style="font-size: 0.8em; box-shadow: black 1px 1px 3px;" href="/listado" role="button">Ver Listado</a>
                </div>
            </div>
        </div>
    </div>
    @elseif($producto->stock == 1 and $enCarrito == true)
    <div class="row producto">
        <div class="card mb-3 ml-auto  col-md-12">
            <div class="row no-gutters">
                <div class="col-md-7 col-lg-8">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" style="max-width:350px;" alt="Producto{{$producto->id}}">
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="card-body">
                        <h4 class="card-title">{{$producto->name}} (Último disponible!)</h4>
                        <h5 class="card-title col-md-6">$ {{$producto->price}}</h5>
                        <p class="card-text col-md-6"><small class="text-muted">Stock: {{$producto->stock}}</small></p>
                    </div>
                </div>
                <div class="col-md-12" style="padding:20px; display: flex; flex-wrap: wrap; justify-content: space-between;">
                    <a class="btn btn-lg btn-primary col-12 col-md-3" style="font-size: 0.8em;" href="#" role="button" onclick="comprar({{$producto->id}})">Comprar</a>
                    <a id="{{$producto->id}}" class="btn btn-lg btn-secondary col-12 col-md-3" style="font-size: 0.8em;" href="#" role="button">Agregado al carrito</a>
                    <a class="btn btn-lg btn-alert col-12 col-md-3" style="font-size: 0.8em; box-shadow: black 1px 1px 3px;" href="/listado" role="button">Ver Listado</a>
                </div>
            </div>
        </div>
    </div>
    @elseif($enCarrito == true)
    <div class="row producto">
        <div class="card mb-3 ml-auto  col-md-12">
            <div class="row no-gutters">
                <div class="col-md-7 col-lg-8">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" style="max-width:350px;" alt="Producto{{$producto->id}}">
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="card-body">
                        <h4 class="card-title">{{$producto->name}}</h4>
                        <h5 class="card-title col-md-6">$ {{$producto->price}}</h5>
                        <p class="card-text col-md-6"><small class="text-muted">Stock: {{$producto->stock}}</small></p>
                    </div>
                </div>
                <div class="col-md-12" style="padding:20px; display: flex; flex-wrap: wrap; justify-content: space-between;">
                    <a class="btn btn-lg btn-primary col-12 col-md-3" style="font-size: 0.8em;" href="#" role="button">Comprar</a>
                    <a id="{{$producto->id}}" class="btn btn-lg btn-secondary col-12 col-md-3" style="font-size: 0.8em;" href="#" role="button">Agregado al carrito</a>
                    <a class="btn btn-lg btn-alert col-12 col-md-3" style="font-size: 0.8em; box-shadow: black 1px 1px 3px;" href="/listado" role="button">Ver Listado</a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row producto">
        <div class="card mb-3 ml-auto  col-md-12">
            <div class="row no-gutters">
                <div class="col-md-7 col-lg-8">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" style="max-width:350px;" alt="Producto{{$producto->id}}">
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="card-body">
                        <h4 class="card-title">{{$producto->name}}</h4>
                        <h5 class="card-title col-md-6">$ {{$producto->price}}</h5>
                        <p class="card-text col-md-6"><small class="text-muted">Stock: {{$producto->stock}}</small></p>
                    </div>
                </div>
                <div class="col-md-12" style="padding:20px; display: flex; flex-wrap: wrap; justify-content: space-between;">
                    <a class="btn btn-lg btn-primary col-12 col-md-3" style="font-size: 0.8em;" href="#" role="button" onclick="comprar({{$producto->id}})">Comprar</a>


                    <a id="{{$producto->id}}" class="btn btn-lg btn-success col-12 col-md-3" style="font-size: 0.8em;" href="#" role="button" onclick="agregarCarrito({{$producto->id}})">Agregar al carrito</a>
                    <a class="btn btn-lg btn-alert col-12 col-md-3" style="font-size: 0.8em; box-shadow: black 1px 1px 3px;" href="/listado" role="button">Ver Listado</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endauth

@guest
<?php $enCarrito = false ?>
                
    @if($enCarrito == true)
    @elseif($producto->stock == 0)
    <div class="row producto">
        <div class="card mb-3 ml-auto  col-md-12">
            <div class="row no-gutters">
                <div class="col-md-7 col-lg-8">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" style="max-width:350px;" alt="Producto{{$producto->id}}">
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="card-body">
                        <h4 class="card-title">{{$producto->name}}</h4>
                        <h5 class="card-title col-md-6">$ {{$producto->price}}</h5>
                        <p class="card-text col-md-6"><small class="text-muted">Stock: {{$producto->stock}}</small></p>
                    </div>
                </div>
                <div class="col-md-12" style="padding:20px; display: flex; flex-wrap: wrap; justify-content: space-between;">
                    <a id="{{$producto->id}}" class="btn btn-lg bg-black col-12 col-md-3 text-white disabled" style="font-size: 0.8em;" href="#" role="button">Sin unidades</a>
                    <a class="btn btn-lg btn-alert col-12 col-md-3" style="font-size: 0.8em; box-shadow: black 1px 1px 3px;" href="/listado" role="button">Ver Listado</a>
                </div>
            </div>
        </div>
    </div>
    @elseif($producto->stock == 1)
    <div class="row producto">
        <div class="card mb-3 ml-auto  col-md-12">
            <div class="row no-gutters">
                <div class="col-md-7 col-lg-8">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" style="max-width:350px;" alt="Producto{{$producto->id}}">
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="card-body">
                        <h4 class="card-title">{{$producto->name}} (Último disponible!)</h4>
                        <h5 class="card-title col-md-6">$ {{$producto->price}}</h5>
                        <p class="card-text col-md-6"><small class="text-muted">Stock: {{$producto->stock}}</small></p>
                    </div>
                </div>
                <div class="col-md-12" style="padding:20px; display: flex; flex-wrap: wrap; justify-content: space-between;">
                    <a class="btn btn-lg btn-primary col-12 col-md-3" style="font-size: 0.8em;" href="/login" role="button" onclick="comprar({{$producto->id}})">Comprar</a>

                    <a id="{{$producto->id}}" class="btn btn-lg btn-success col-12 col-md-3" style="font-size: 0.8em;" href="/login" role="button">Agregar al carrito</a>
                    <a class="btn btn-lg btn-alert col-12 col-md-3" style="font-size: 0.8em; box-shadow: black 1px 1px 3px;" href="/listado" role="button">Ver Listado</a>
                </div>
            </div>
        </div>
    </div>    
    @else
    <div class="row producto">
        <div class="card mb-3 ml-auto  col-md-12">
            <div class="row no-gutters">
                <div class="col-md-7 col-lg-8">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top" style="max-width:350px;" alt="Producto{{$producto->id}}">
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="card-body">
                        <h4 class="card-title">{{$producto->name}}</h4>
                        <h5 class="card-title col-md-6">$ {{$producto->price}}</h5>
                        <p class="card-text col-md-6"><small class="text-muted">Stock: {{$producto->stock}}</small></p>
                    </div>
                </div>
                <div class="col-md-12" style="padding:20px; display: flex; flex-wrap: wrap; justify-content: space-between;">
                    <a class="btn btn-lg btn-primary col-12 col-md-3" style="font-size: 0.8em;" href="/login" role="button" onclick="comprar({{$producto->id}})">Comprar</a>
                   

                    <a id="{{$producto->id}}" class="btn btn-lg btn-success col-12 col-md-3" style="font-size: 0.8em;" href="/login" role="button">Agregar al carrito</a>
                    <a class="btn btn-lg btn-alert col-12 col-md-3" style="font-size: 0.8em; box-shadow: black 1px 1px 3px;" href="/listado" role="button">Ver Listado</a>
                </div>
            </div>
        </div>
    </div>
    @endif
  
@endguest
@include("includes.modal") 
@endsection

@section("scripts")
    <script src="/js/products_actions.js"></script>
    <script type="text/javascript">

        window.onload = function(){
            document.querySelector("form").reset();
        }
        
    </script>
@endsection
