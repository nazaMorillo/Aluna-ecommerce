<?php
//include_once("admin/data/conecciondb.php");
include_once("admin/data/PDOconnect.php");
$query = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
//$query->execute([
//    ":email" => $_SESSION['completarCorrectos']['email'];
//]);
$query->bindValue(":email",$_SESSION['completarCorrectos']['email']);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
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
            <h2>Bienvenido <?= $result[0]['name'] ?>!</h2>
            <h3>Resumen</h3>
            <p>Esta sección está vacía! Compra o vende artículos en nuestra página y así obtienes puntos de ventaja para
                adquirir oportunidades únicas!</p>
            
            <section class="container mt-3">
                <h3>Perfil</h3>
                <div class="row">
                    <!-- <div class="col-md-12"> -->
                        <form class=" mb-3" action="admin/core/actualizarPerfil.php" enctype="multipart/form-data" method="POST">
                            <div class="form-group column d-flex flex-column">
                                
                                <input  name='username' type='text'class='form-control' placeholder="Ingresa tu nombre"
                                <?= "value='" . $result[0]['name'] . "' ";?>  >
                                <?php
                                if (isset($_SESSION['registErrMsj']['username'])) {
                                    echo '<span class="messagerror">' . $_SESSION['registErrMsj']['username'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group column d-flex flex-column">
                                
                                <input <?= "value='".$result[0]['secondname']."' "  ?> name="usersecondname" type="text" class="form-control col-12" placeholder="Ingresá tu apellido" aria-describedby="emailHelp">
                                <?php
                                if (isset($_SESSION['registErrMsj']['secondname'])) {
                                    echo '<span class="messagerror">' . $_SESSION['registErrMsj']['secondname'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group column d-flex flex-column">
                                <input <?php
                                        if (isset($_SESSION['completarCorrectos']['email'])) {
                                            echo "value='" . $result[0]['email'] . "' ";
                                        }
                                        ?> name="useremail" type="email" class="form-control col-12" id="exampleInputEmail1" placeholder="Ingresa tu correo" aria-describedby="emailHelp">
                                <?php
                                if (isset($_SESSION['registErrMsj']['email'])) {
                                    echo '<span class="messagerror">' . $_SESSION['registErrMsj']['email'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group column">
                                <input name="userpassword" type="password" class="form-control col-12" id="exampleInputPassword1" placeholder="Ingresa tu contraseña" <?= "value='" . $_SESSION['completarCorrectos']['password'] . "' "; ?>>
                                <?php
                                if (isset($_SESSION['registErrMsj']['password'])) {
                                    echo '<span class="messagerror">' . $_SESSION['registErrMsj']['password'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group column">
                                <input name="userpassword" type="password" class="form-control col-12" id="rePassword1" placeholder="Ingresa nueva contraseña" <?= "value='" . $_SESSION['completarCorrectos']['password'] . "' "; ?>>
                                <?php
                                if (isset($_SESSION['registErrMsj']['password'])) {
                                    echo '<span class="messagerror">' . $_SESSION['registErrMsj']['password'] . '</span>';
                                }
                                ?>
                            </div>
                            <br>
                            <!--<div class="row">
                                <img src="pics/images.png" class="profile rounded-circle d-block col-sm-3 col-4">
                                <div class="col-xs-6 col-md-9">
                                    <input type="file" name="userimage" class="btn btn-outline-dark bg-dark col-md-12 text-white mb-1">
                                    <h6>Aun no elige una imagen</h6>
                                </div>
                            </div>-->
                            <div class="row">
                            <div id="preview"></div>
                            <img id="imagen" src="<?php 
                                if ( isset($_SESSION['foto']) ){
                                    echo $_SESSION['foto'];
                                }else echo "pics/images.png" ;
                            ?>" 
                            class="profile rounded-circle d-block col-sm-3 col-4" >
                            <div class="col-xs-6 col-md-9">
                                <h6>Seleccionar imagen</h6>
                                <input id="file" type="file" name="userimage" class="btn btn-outline-dark bg-dark col-md-12 text-white mb-1">
                                <h6>Aun no elige una imagen</h6>
                            </div>
                            </div>

                            <br>
                            <button type="reset" class="btn btn-outline-dark bg-dark col-md-12 text-white mb-2">CANCELAR</button>
                            <input type="submit" name="Submit" value="GUARDAR" class="btn btn-outline-dark bg-dark col-md-12 text-white mb-2">
                        </form>
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
<script type="text/javascript" src="admin/core/preview.js"></script>