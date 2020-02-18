<?php
session_start();
if (isset($_SESSION['registErrExistMsj'])) {
    if ($_SESSION['registErrExistMsj'] != "") {
        echo '<span class="messagerror  text-danger">' . $_SESSION['registErrExistMsj'] . '</span>';
    }
}
?>
<section class="text-center container mt-3">
    <h2 id="contact">REGISTRO</h2>
    <div class="star-navy">
        <i class="fa fa-star"></i>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form class="text-left mb-3" action="admin/core/registroProceso.php" enctype="multipart/form-data" method="POST">
                <div class="form-group column d-flex flex-column">
                    <label for="exampleInputEmail1 col-sm-12">Nombre *</label>
                    <input <?php
                                                if (isset($_SESSION['completarCorrectos']['nombre'])) {
                                                    echo "value='" . $_SESSION['completarCorrectos']['nombre'] . "' ";
                                                }
                                                ?> name='username' type='text' class='form-control' placeholder='Ingresá tu nombre' aria-describedby='emailHelp'>
                    <?php
                    if (isset($_SESSION['registErrMsj']['username'])) {
                        echo '<span class="messagerror text-danger">' . $_SESSION['registErrMsj']['username'] . '</span>';
                    }
                    ?>
                </div>
                <div class="form-group column d-flex flex-column">
                    <label for="exampleInputEmail1 col-sm-12">Apellido *</label>
                    <input <?php
                                                if (isset($_SESSION['completarCorrectos']['secondname'])) {
                                                    echo "value='" . $_SESSION['completarCorrectos']['secondname'] . "' ";
                                                }
                                                ?> name="usersecondname" type="text" class="form-control col-12" placeholder="Ingresá tu apellido" aria-describedby="emailHelp">
                    <?php
                    if (isset($_SESSION['registErrMsj']['secondname'])) {
                        echo '<span class="messagerror text-danger">' . $_SESSION['registErrMsj']['secondname'] . '</span>';
                    }
                    ?>
                </div>
                <div class="form-group column d-flex flex-column">
                    <label for="exampleInputEmail1 col-sm-12">Correo electronico *</label>
                    <input <?php
                                                if (isset($_SESSION['completarCorrectos']['email'])) {
                                                    echo "value='" . $_SESSION['completarCorrectos']['email'] . "' ";
                                                }
                                                ?> name="useremail" type="email" class="form-control col-12" id="exampleInputEmail1" placeholder="Ingresa tu correo" aria-describedby="emailHelp">
                    <?php
                    if (isset($_SESSION['registErrMsj']['email'])) {
                        echo '<span class="messagerror text-danger">' . $_SESSION['registErrMsj']['email'] . '</span>';
                    }
                    ?>
                </div>
                <div class="form-group column">
                    <label for="exampleInputPassword1 col-sm-12 col-md-6">Contraseña *</label>
                    <input <?php
                                                if (isset($_SESSION['completarCorrectos']['password'])) {
                                                    echo "value='" . $_SESSION['completarCorrectos']['password'] . "' ";
                                                }
                                                ?> name="userpassword" type="password" class="form-control col-12" id="exampleInputPassword1" placeholder="Ingresa tu contraseña">
                    <?php
                    if (isset($_SESSION['registErrMsj']['password'])) {
                        echo '<span class="messagerror text-danger">' . $_SESSION['registErrMsj']['password'] . '</span>';
                    }
                    ?>
                </div>
                <label><input type="checkbox" name="recordarUsuario" value="marcado"> Recordarme</label><br>
                <div class="row">
                    <img src="pics/images.png" class="profile rounded-circle d-block col-sm-3 col-4" >
                    <div class="col-xs-6 col-md-9">
                        <h6>Seleccionar imagen</h6>
                        <input type="file" name="userimage" class="btn btn-outline-dark bg-dark col-md-12 text-white mb-1">
                        <h6>Aun no elige una imagen</h6>
                    </div>
                </div>
                <br>
                <button type="reset" class="btn btn-outline-dark bg-dark col-md-12 text-white mb-2">CANCELAR</button>
                <input type="submit" name="Submit" value="GUARDAR" class="btn btn-outline-dark bg-dark col-md-12 text-white mb-2">
            </form>
<?php
if (isset($errores)) {
    session_destroy();
}
    
?>
        </div>
    </div>
</section>
