@extends("layouts.master")

@section("content")
<div class="container">
<h2 id="contact">INICIO SESIÓN</h2>
    <div class="star-navy">
        <i class="fa fa-star"></i>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form class="text-center mb-3" action="admin/core/loginProceso.php" method="post">
                <div class="form-group">
                    <label for=" " class="col-sm-12">Correo electronico</label>
                    <input type="email" name="email" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-12">Contraseña</label>
                    <input type="password" name="password" class="form-control col-12" id="">
                </div>
                <label><input type="checkbox" name="recordarUsuario" value="marcado"></input> Recordarme</label><br><br>
                <input type="submit" name="Submit" value="Enviar" class="btn btn-outline-dark bg-dark col-md-6 text-white mb-2"></input>
            </form>
        </div>
    </div>
    <h2 class="text-center">ó</h2>
    <div class="btn text-center container row bg-dark text-white mb-2">
        <i class="fab fa-facebook float-left"></i><a href="#" class="nav-link text-white">INGRESA CON
            FACEBOOK</a>
    </div>
    <div class="btn text-center container row bg-dark btn-outline-dark text-white mb-2">
        <i class="fab fa-twitter float-left"></i><a href="#" class="nav-link text-white">INGRESA CON TWITTER</a>
    </div>
    <div class="btn text-center text-white container row bg-dark mb-2">
        <i class="fab fa-google float-left"></i><a href="#" class="nav-link text-white">INGRESA CON GOOGLE</a>
    </div>
</div>

@endsection