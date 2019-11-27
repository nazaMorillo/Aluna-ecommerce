<?php 
    session_start();
    if(isset($_SESSION['messagerror']['returnsearch'])){
        if ($_SESSION['messagerror']['returnsearch'] != "") {
            echo '<span class="messagerror">'.$_SESSION['messagerror']['returnsearch'].'</span>';
        }
    }   
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All-Markert</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0fbb5c7ed7.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Montserrat:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="index.html">All Market</a>
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Estoy buscando..." aria-label="Search">
                <a class="btn btn-outline-success my-2 my-sm-0" href="carrito.html"
                    style="border:none; border-radius: 100px;"><img width="45px" src="images/carrito.png" alt="search"
                        title="Carrito"></a>
            </form>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ayuda.html">Ayuda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registro.php">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php">Login </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.html">Contacto</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main role="main"  style="margin-top: 40px;">
        <section class="text-center container mt-3">
            <h1 id="contact">INICIO SECCIÓN</h1>
            <div class="star-navy">
                <i class="fa fa-star"></i>
            </div>
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <form class="text-center mb-3" action="loginProceso.php" method="post">
                        <div class="form-group column d-flex flex-column">
                            <label for="exampleInputEmail1 col-sm-12">Correo electronico</label>
                            <span class="row"><input 
                            <?php 
                                    if (isset($_COOKIE['email'])) {
                                        echo "value='".$_COOKIE['email']."' ";
                                    }
                                    elseif (isset($_SESSION['completarCorrectos']['email'])) {
                                        echo "value='".$_SESSION['completarCorrectos']['email']."' ";
                                    }
                            ?>
                             type="email" name="email" class="form-control col-12" id="exampleInputEmail1"
                                    aria-describedby="emailHelp"></span>
                            <?php
                                if(isset($_SESSION['messagerror']['email'])){
                                    if ($_SESSION['messagerror']['email'] != "") {
                                        echo '<span class="messagerror">'.$_SESSION['messagerror']['email'].'</span>';
                                    }
                                }    
                            ?>
                        </div>
                        <div class="form-group column">
                            <label for="exampleInputPassword1 col-sm-12 col-md-6">Contraseña</label>
                            <span class="row"><input 
                            <?php 
                                    if (isset($_COOKIE['password'])) {
                                        echo "value='".$_COOKIE['password']."' ";
                                    }
                                    elseif (isset($_SESSION['completarCorrectos']['password'])) {
                                        echo "value='".$_SESSION['completarCorrectos']['password']."' ";
                                    }
                            ?>
                             type="password" name="password" class="form-control col-12"
                                    id="exampleInputPassword1"></span>
                            <?php
                                if(isset($_SESSION['messagerror']['password'])){
                                    if ($_SESSION['messagerror']['password'] != "") {
                                        echo '<span class="messagerror">'.$_SESSION['messagerror']['password'].'</span>';
                                    }
                                }    
                            ?>
                        </div>
                        <label><input type="checkbox" name="recordarUsuario" value="marcado"></input> Recordarme</label><br>
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
        </section>
        <footer class="bg-azul text-center">
            <!-- <div class="row">
                <div class="col-sm-12">
                    <div class="brands d-flex justify-content-center">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter "></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-dribbble"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div> -->
            <div class="bg-azul-oscuro copy">
                Copyright &copy; 2019 - All-Markert
            </div>
        </footer>
    </main>
<?php 
    session_destroy();   
?>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>

</html>
