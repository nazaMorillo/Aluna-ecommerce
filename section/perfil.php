<?php
include_once("modifUsuarioProceso");
session_start();
?>
<section>
    <div class="row container mt-3 mx-auto">
        <div class="col-12 col-md-3" style="margin-top: 15px; margin-bottom: 5px;">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">Resumen</a>
                <a href="#" class="list-group-item list-group-item-action">Perfil</a>
                <a href="#" class="list-group-item list-group-item-action">Compras</a>
                <a href="#" class="list-group-item list-group-item-action">Ventas</a>
                <a href="#" class="list-group-item list-group-item-action">Configuración</a>
            </div>
        </div>
        <div class="col-12 col-md-6" style="margin-top: 15px; margin-bottom: 5px;">
            <h2>Bienvenido <?php echo $_SESSION['nombreSesion']?>!</h2>
            <h3>Resumen</h3>
            <p>Esta sección está vacía! Compra o vende artículos en nuestra página y así obtienes puntos de ventaja para
                adquirir oportunidades únicas!</p>

            <section class="container mt-3">
                <h3>Perfil</h3>
                <div class="row">
                    <!-- <div class="col-md-12"> -->
                        <form class=" mb-3" action="admin/core/modifUsuarioProceso.php" enctype="multipart/form-data" method="POST">
                            <div class="form-group column d-flex flex-column">

                                <input  name='username' type='text'class='form-control' placeholder="Ingresa tu nombre"
                                <?php
                                if (!isset($_GET["noCompletar"]) && isset($_SESSION['nombreSesion'])) {
                                            echo "value='" . $_SESSION['nombreSesion'] . "' ";
                                        }elseif (isset($_SESSION['completarCorrectos']['nombre'])) {
                                            echo "value='" . $_SESSION['completarCorrectos']['nombre'] . "' ";
                                        }
                                ?>
                                >
                                <?php
                                if (isset($_GET['nameVacio'])) {
                                    echo '<span class="messagerror">' . $_GET['nameVacio'] . '</span>';
                                } elseif (isset($_GET['nameMin'])) {
                                    echo '<span class="messagerror">' . $_GET['nameMin'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group column d-flex flex-column">

                                <input <?php
                                        if (!isset($_GET["noCompletar"]) && isset($_SESSION['apellidoSesion'])) {
                                            echo "value='" . $_SESSION['apellidoSesion'] . "' ";
                                        }elseif (isset($_SESSION['completarCorrectos']['secondname'])) {
                                            echo "value='" . $_SESSION['completarCorrectos']['secondname'] . "' ";
                                        }
                                        ?> name="usersecondname" type="text" class="form-control col-12" placeholder="Ingresá tu apellido" aria-describedby="emailHelp">
                                <?php
                                if (isset($_GET['secondNameVacio'])) {
                                    echo '<span class="messagerror">' . $_GET['secondNameVacio'] . '</span>';
                                } elseif (isset($_GET['nameMin'])) {
                                    echo '<span class="messagerror">' . $_GET['secondNameMin'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group column d-flex flex-column">
                                <input <?php
                                        if (!isset($_GET["noCompletar"]) && isset($_SESSION['emailSesion'])) {
                                            echo "value='" . $_SESSION['emailSesion'] . "' ";
                                        }elseif (isset($_SESSION['completarCorrectos']['email'])) {
                                            echo "value='" . $_SESSION['completarCorrectos']['email'] . "' ";
                                        }
                                        ?> name="useremail" type="email" class="form-control col-12" id="exampleInputEmail1" placeholder="Ingresa tu correo" aria-describedby="emailHelp">
                                <?php
                                if (isset($_GET['emailVacio'])) {
                                    echo '<span class="messagerror">' . $_GET['emailVacio'] . '</span>';
                                } elseif (isset($_GET['emailVal'])) {
                                    echo '<span class="messagerror">' . $_GET['emailVal'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group column">
                                <input name="userpassword" type="password" class="form-control col-12" id="exampleInputPassword1" placeholder="Ingresa tu contraseña">
                                <?php
                                if (isset($_GET['passVacia'])) {
                                    echo '<span class="messagerror">' . $_GET['passVacia'] . '</span>';
                                } elseif (isset($_GET['passMin'])) {
                                    echo '<span class="messagerror">' . $_GET['passMin'] . '</span>';
                                } elseif (isset($_GET['passSame'])) {
                                    echo '<span class="messagerror">' . $_GET['passSame'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group column">
                                <input name="userpassword2" type="password" class="form-control col-12" id="rePassword1" placeholder="Ingresa nueva contraseña">
                                <?php
                                if (isset($_GET['passVacia2'])) {
                                    echo '<span class="messagerror">' . $_GET['passVacia2'] . '</span>';
                                } elseif (isset($_GET['passMin2'])) {
                                    echo '<span class="messagerror">' . $_GET['passMin2'] . '</span>';
                                } elseif (isset($_GET['passSame2'])) {
                                    echo '<span class="messagerror">' . $_GET['passSame2'] . '</span>';
                                }
                                ?>
                            </div>
                            <br>
                            <div class="row">
                                <img src= "<?php echo $_SESSION['fotoSesion'] ?>" class="profile rounded-circle d-block col-sm-3 col-4">
                                <div class="col-xs-6 col-md-9">
                                    <input type="file" name="userimage" class="btn btn-outline-dark bg-dark col-md-12 text-white mb-1">
                                    <h6>Aun no elige una imagen</h6>
                                </div>
                            </div>
                            <br>
                            <button type="reset" class="btn btn-outline-dark bg-dark col-md-12 text-white mb-2">CANCELAR</button>
                            <input type="submit" name="Submit" value="GUARDAR" class="btn btn-outline-dark bg-dark col-md-12 text-white mb-2">
                        </form>
<?php
if (isset($_GET["errores"])) {
    session_destroy();
}
?>
                    <!-- </div> -->
                </div>
            </section>
            <h3>Compras</h3>
            <p>Esta sección está vacía! Compra artículos en nuestra página y así obtienes puntos de ventaja para adquirir
                ofertas y beneficios únicos!</p>
            <h3>Ventas</h3>
            <p>Esta sección está vacía! Vende artículos en nuestra página y así obtienes puntos de ventaja para adquirir
                ofertas y beneficios únicos!</p>
        </div>
    </div>
</section>

