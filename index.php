<?php 
session_start();
error_reporting(0);
// header("Content-Type: text/html;charset=utf-8");
// setlocale(LC_CTYPE, 'es');
date_default_timezone_set('America/Argentina/Buenos_Aires');

if(isset($_GET['sec'])){$sec=$_GET['sec'];}else{$sec="inicio";}

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>All-Market</title>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
    <meta charset="utf-8">
    <meta name="author" content="Cattaneo Alexis, Martinez Lucio, Morillo Nazareno"/>
    <meta name="keywords" content="comercio, ecommerce, compra, comprar, producto, carrito, confiable, calidad" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700|Montserrat:400,700&display=swap">
    <script src="https://kit.fontawesome.com/0fbb5c7ed7.js" crossorigin="anonymous"></script> -->
  </head>

  <body>
    <header>
       <?php
      //  $_SESSION['completarCorrectos']['nombre']=null;
      // $_SESSION['completarCorrectos']['nombre']='Nazareno';
      if (isset($_SESSION['completarCorrectos']['nombre']) ){
          include_once("plugins/user-navbar.php");
          echo "<br>";
       }else{
          include_once("plugins/navbar.php");
       }
       ?>       
    </header>

    <main role="main">
      <?php 
      	// CARGO CONTENIDO DEL SITIO
      switch($sec){
        case "inicio": include_once("section/home.php"); break;
        case "home": include_once("section/home.php"); break;
        case "autogestion": include_once("section/autogestion.php"); break;				
        case "ayuda": include_once("section/ayuda.php"); break;
        case "registro": include_once("section/registro.php"); break;
        case "login": include_once("section/login.php"); break;
        case "perfil": include_once("section/perfil.php"); break;
        case "listado": include_once("section/listado.php"); break;
        case "producto": include_once("section/producto.php"); break;
        case "contacto": include_once("section/contacto.php"); break;
        case "salir": include_once("admin/core/logout.php"); break;
        case "carrito": include_once("section/carrito.php"); break;
        default: include_once("section/home.php");
      }
      
      ?>
    </main>
    <?php include_once('plugins/footer.php');?>    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-production-3_4_1.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="js/kit-fontawesome.js"></script>
  </body>
</html>