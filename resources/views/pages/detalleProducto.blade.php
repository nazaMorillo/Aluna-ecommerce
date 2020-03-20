@extends("layouts.master")

@section("content")
<div class="container marketing">
    <!-- START THE FEATURETTES -->
    <div class="card row">

        <h4 class="card-header">Detalle producto {{$producto->id}}</h4>
    </div>

    <div class="row producto">
        <div class="card mb-3 ml-auto  col-md-12" style="max-width: 1080px;">
            <div class="row no-gutters">
                <div class="col-md-7 col-lg-8">
                    <img src="/{{$producto->image}}" class="card-img-top" style="max-width:350px;" alt="Producto{{$producto->id}}">
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="card-body">
                        <h4 class="card-title">{{$producto->produc_name}}</h4>
                        <h5 class="card-title col-md-6">$ {{$producto->price}}</h5>
                        <p class="card-text col-md-6"><small class="text-muted">Stock: {{$producto->stock}}</small></p>

                    </div>
                </div>
                <div class="col-md-12" style="padding:20px; display: flex; flex-wrap: wrap; justify-content: space-between;">

                    <a class="btn btn-lg btn-secondary col-12 col-md-3" style="font-size: 0.8em; width: 33%; margin: 5px 0;" href="inicio.html" role="button">COMPRAR</a>                    
                    <a class="btn btn-lg btn-information col-12 col-md-3" style="font-size: 0.8em; width: 33%; margin: 5px 0; box-shadow: black 1px 1px 3px;" href="/listado" role="button">SEGUIR VIENDO PRODUCTOS</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection