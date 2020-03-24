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
                <a href="/producto/{{$producto->id}}" style="text-decoration: none; color: rgb(46, 46, 46);">
                    <img src="/storage/product/{{$producto->image}}" class="card-img-top img-thumbnail" alt="Producto1" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h3>$ {{$producto->price}}</h3>
                        <p class="card-text" > Producto : {{$producto->name}}<br>Stock : {{$producto->stock}}</p>
                        @auth
                        <!-- <h1> User Id : {{Auth::user()->id}}</h1>                   -->
                        <a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar()">Comprar</a>
                        <a class='btn btn-success col-12 col-md-12 text-white mt-2 carrito' role="button" href="/carrito/{{Auth::user()->id}}/{{$producto->id}}">Agregar al carrito</a>
                        @endauth
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