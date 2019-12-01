<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Panel Administrador</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.css" rel="stylesheet">

    <style>

    </style>

</head>
    <!--Double navigation-->
    <header class="fixed-sn mdb-skin">
        <!-- Sidebar navigation -->
        <ul id="slide-out" class="side-nav fixed sn-bg-1 custom-scrollbar">
            <br><br>
            <!-- Logo -->
            <li>
                <div class="logo-wrapper sn-ad-avatar-wrapper">
                    <div class="rgba-stylish-strong">
                        <p class="user white-text" align="center">Usuario: <?php echo $_SESSION['UserName'];?></p>
                    </div>
                </div>
            </li>
            <!--/. Logo -->

            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-user"></i> Usuarios<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="index.php?a=adminusu" class="waves-effect">Listado de usuarios</a>
                                </li>
                                <li><a href="index.php?a=abmusu&mod=1" class="waves-effect">Crear nuevo usuario</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-newspaper-o"></i> Novedades<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="index.php?a=adminnov" class="waves-effect">Listado de novedades</a>
                                </li>
                                <li><a href="index.php?a=abmnov&mod=1" class="waves-effect">Crear nueva novedad</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-photo"></i> Slider Principal<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="index.php?a=adminsli" class="waves-effect">Listado slider</a>
                                </li>
                                <li><a href="index.php?a=abmsli&mod=1" class="waves-effect">Agregar nuevo slider</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-folder"></i>Impuestos<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="index.php?a=impuestos" class="waves-effect">Listado de Impuestos</a>
                                </li>
                                <li><a href="index.php?a=impuestos&new=y" class="waves-effect">Agregar nuevos Impuestos</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-truck"></i>Envíos<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="index.php?a=envios" class="waves-effect">Listado de envíos</a>
                                </li>
                                <li><a href="index.php?a=envios&new=y" class="waves-effect">Agregar nuevo envío</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-dollar"></i> Formas de Pago<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="index.php?a=formas_pago" class="waves-effect">Listado de Formas de Pago</a>
                                </li>
                                <li><a href="index.php?a=formas_pago&new=y" class="waves-effect">Agregar nuevas formas de pago</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-newspaper-o"></i>Catálogo<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="index.php?a=catalogo" class="waves-effect">Listado de Catálogos</a>
                                </li>
                                <li><a href="index.php?a=catalogo&new=y" class="waves-effect">Agregar nuevo Catálogo</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <!--/. Side navigation links -->
            <div class="sidenav-bg mask-strong"></div>
        </ul>
        <!--/. Sidebar navigation -->

        <!--Navbar-->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar double-nav">

            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>

            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p>Panel de Administrador</p>
            </div>

            
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?a=pedidos"><i class="fa fa-server"></i> <span class="hidden-sm-down">Pedidos</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?a=productos"><i class="fa fa-shopping-bag"></i> <span class="hidden-sm-down">Productos</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?a=logout"><i class="fa fa-sign-in"></i> <span class="hidden-sm-down">Cerrar Sesión</span></a>
                </li>
            </ul> 
        </nav>
        <!--/.Navbar-->
    
    </header>

    <!-- Tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

    <script>
        // SideNav init
        $(".button-collapse").sideNav();
        var el = document.querySelector('.custom-scrollbar');
        Ps.initialize(el);
    </script>

    <script>
        new WOW().init();
    </script>

    <script>
            var option = {
                responsive: true,
            };

    </script>

</html>