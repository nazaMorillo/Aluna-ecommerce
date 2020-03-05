@extends("layouts.master")

@section("content")
    <div class="container marketing">
        <!-- START THE FEATURETTES -->        
        <div class="card row">
            <h4 class="card-header">Encuentra lo que estás buscando</h4>
        </div>

        <div class="row">
        <?php $j=0; ?>
        @for($i= 1; $i<=6; $i++)
        <?php $j++; ?>               
            <div class="card producto col-md-4">
                <a href="#TOP" style="text-decoration: none; color: rgb(46, 46, 46);">
                    <img src="/storage/product/product-{{$j}}.jpg" class="card-img-top" alt="Producto1">

                    <div class="card-body">
                        <h3>$ {{$j}}00{{$i}}</h3>
                        <p class="card-text"> Producto{{$i}} </p>                       
                        <a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar()">Comprar</a>
                        <a class='btn btn-success col-12 col-md-12 text-white mt-2 carrito' role="button" onclick="comprar()">Agregar al carrito</a>
                    </div>
                </a>
            </div>
            @if($j== 3)
            <?php $j=0; ?>
            @endif
        @endfor
        </div>
    </div>
@endsection