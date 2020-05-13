@extends("layouts.master")

@section("title")
    Home
@endsection

@section("content")

    
    @include("includes.carousel")


    <div class="container marketing" style="margin: 10px 0px;">
        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
                <h3 class="col-12 col-md-8">Sobre nosotros</h3>
                <p>Nuestra plataforma nació de la necesidad de proporcionar una sistema de comercio electronico personalizado y de fácil acceso para cada persona que quiere emprender.</p>
                <a class="btn btn-secondary col-12 col-md-4" href="index.php?sec=contacto#TOP" role="button">Contactanos &raquo;</a>
            </div><!-- /.col-lg-4 -->
            <div class="col-12 col-md-10 offset-md-1">
                <h3 class="col-12 col-md-8">Catalogo de producto</h3>
                <p>Revisa nuestro catalogo de productos. Comprar en linea nunca fue tan fácil.</p>
                <a class="btn btn-secondary col-12 col-md-4" href="index.php?sec=listado#TOP" role="button">Ver Catalogo &raquo;</a>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div>
@endsection