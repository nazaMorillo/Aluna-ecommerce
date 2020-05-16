@extends("layouts.master")

@section('content')
<main role="main">
      <section>
    <div class="row container mt-3 mx-auto">
        <div class="col-12 col-md-3" style="margin-top: 15px; margin-bottom: 5px;">
            <!--<div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">Resumen</a>
                <a href="#" class="list-group-item list-group-item-action">Perfil</a>
                <a href="#" class="list-group-item list-group-item-action">Compras</a>
                <a href="#" class="list-group-item list-group-item-action">Ventas</a>
                <a href="#" class="list-group-item list-group-item-action">Configuración</a>
            </div>-->
        </div>
        <div class="col-12 col-md-6" style="margin-top: 15px; margin-bottom: 5px;">
            <h2>Bienvenido {{Auth::user()->name}}!</h2>
            <section class="container mt-3">
                <h4>Modificar datos</h4>
                <div class="row">
                    <!-- <div class="col-md-12"> -->
                        <form class=" mb-3" action="/actualizarPerfil" enctype="multipart/form-data" method="post">
                        @csrf
                            <div class="form-group column d-flex flex-column">
                                
                                <input name="username" type="text" class="form-control" placeholder="Ingresa tu nombre" value="{{Auth::user()->name}}">
                                <span class="messagerror"></span>                            </div>
                            <div class="form-group column d-flex flex-column">
                                
                                <input value="{{Auth::user()->surname}}" name="usersecondname" type="text" class="form-control col-12" placeholder="Ingresá tu apellido" aria-describedby="emailHelp">
                                <span class="messagerror"></span>                            </div>
                            <div class="form-group column d-flex flex-column">
                                <input value="{{Auth::user()->email}}" name="useremail" type="email" class="form-control col-12 disabled" id="exampleInputEmail1" placeholder="Ingresa tu correo" aria-describedby="emailHelp">
                                <span class="messagerror"></span>                            </div>
                            <div class="form-group column">
                                <input name="userpassword" type="password" class="form-control col-12" id="passwordToAuth" placeholder="Ingresa tu contraseña">
                                <span class="messagerror"></span>                            </div>
                            <!--<div class="row">
                                <img src="pics/images.png" class="profile rounded-circle d-block col-sm-3 col-4">
                                <div class="col-xs-6 col-md-9">
                                    <input type="file" name="userimage" class="btn btn-outline-dark bg-dark col-md-12 text-white mb-1">
                                    <h6>Aun no elige una imagen</h6>
                                </div>
                            </div>-->
                            <div class="row">
                            <div id="preview"></div>
                            <!--<img id="imagen" src="/storage/{{Auth::user()->avatar}}" class="profile rounded-circle d-block col-sm-3 col-4">-->
                            <div id="previewImage" class="rounded-circle" style="height:102px;width:102px;background-size:cover;background-position:center;margin-left: 15px;margin-right: 15px;background-image:url('/storage/{{Auth::user()->avatar}}')"></div>
                            <div class="col-xs-6 col-md-9">
                                <h6>Seleccionar imagen</h6>
                                <input id="file" type="file" name="userimage" class="btn btn-outline-dark bg-dark col-md-12 text-white mb-1">
                                                                <h6 id="unselectimage">Aun no elige una imagen</h6>
                            </div>
                            </div>

                            <br>
                            <button id="resetear" type="reset" class="btn btn-outline-dark bg-dark col-md-12 text-white mb-2">CANCELAR</button>
                            <input type="submit" id="guardarPerfil" name="guardarPerfil" value="GUARDAR" class="btn btn-outline-dark bg-dark col-md-12 text-white mb-2">
                        </form>
                    <!-- </div> -->
                </div>
            </section>
            <h3>Compras</h3>
            <p>Esta sección está vacía! Cuando compres artículos en nuestra página podrás visualizar el historial aquí.</p>
        </div>
        <div class="col-12 col-md-3" style="margin-top: 15px; margin-bottom: 5px;">
        <div id="preview2" class="rounded-circle" style="height:102px;width:102px;background-size:cover;background-position:center;margin-left: 15px;margin-right: 15px;"></div>
            <!--<div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">Resumen</a>
                <a href="#" class="list-group-item list-group-item-action">Perfil</a>
                <a href="#" class="list-group-item list-group-item-action">Compras</a>
                <a href="#" class="list-group-item list-group-item-action">Ventas</a>
                <a href="#" class="list-group-item list-group-item-action">Configuración</a>
            </div>-->
        </div>
    </div>
</section>
</main>
@endsection
@section("scripts")
<script src="/js/perfil.js"></script>
@endsection