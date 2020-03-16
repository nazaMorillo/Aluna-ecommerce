@extends("layouts.master")

@section("content")
    <div class="container marketing">
        <!-- START THE FEATURETTES -->        
        <div class="card row">
            <h4 class="card-header">Encuentra lo que estás buscando</h4>
        </div>

        <div class="row">
        @forelse($productos as $producto)    
        
            <div class="card producto col-6 col-4-sm col-md-4 col-lg-3">
                <a href="#TOP" style="text-decoration: none; color: rgb(46, 46, 46);">
                    <img src="{{$producto->image}}" class="card-img-top img-thumbnail" alt="Producto1">
                    <div class="card-body">
                        <h3>$ {{$producto->price}}</h3>
                        <p class="card-text"> Producto : {{$producto->produc_name}}</p>                       
                        <a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar()">Comprar</a>
                        <a class='btn btn-success col-12 col-md-12 text-white mt-2 carrito' role="button" onclick="comprar()">Agregar al carrito</a>
                    </div>
                </a>
            </div>
        @empty
        <div class="card producto col-6 col-4-sm col-md-4 col-lg-3">
            <h1>No se encontraron productos</h1>
        </div>
        @endforelse
        </div>
    </div>
    {{$productos->links()}}
@endsection