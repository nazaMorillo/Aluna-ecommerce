<?php
// include_once("plugins/componentes.php");


// if(!segunHoraDia() ){
//     $saludo = segunHoraDia();
//     echo "entre por hora del día";
// }else{
//     $saludo = "Bienvenido ";
//     echo "entre por bienvenida";
// }

if($sec=="inicio"){$inicio='active';}else{$inicio='';}
if($sec=="home"){$home='active';}else{$home='';}
if($sec=="listado"){$catalogo='active';}else{$catalogo='';}
if($sec=="ayuda"){$ayuda='active';}else{$ayuda='';}
if($sec=="perfil"){$perfil='active';}else{$perfil='';}
if($sec=="contacto"){$contacto='active';}else{$contacto='';}

$saludo = "Bienvenido ";
if (isset($_SESSION['nombre']) ){
    $nombreUsuario = $_SESSION['nombre'];
}else{
    $nombreUsuario = 'Usuario';
}
if ( isset($_SESSION['foto']) ){
    $urlAvatar= $_SESSION['foto'];
}else{
    $urlAvatar= "pics/genericAvatar.png";
}
?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php">A-M</a>
    <form class="form-inline mt-2 mt-md-0" style="width: 65%;">
        <input style="max-width: 150px!important;" class="form-control mr-sm-2" type="text" placeholder="Estoy buscando..." aria-label="Search">
        <a class="btn btn-outline-success my-2 my-sm-0" href="index.php?sec=carrito#TOP" style="border:none; border-radius: 100px;"><img width="35px" src="pics/carrito.png" alt="search" title="Carrito"></a>
    </form>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item" style="margin: 0px 10px 0px 10px;">
                <a class="nav-link" href="index.php?sec=perfil#TOP" style="display: flex; flex-wrap: nowrap;">
                    <span class="rounded-circle border border-primary" style="background-image: url('<?=$urlAvatar?>'); background-size: cover;  width:42px; height: 42px;"></span>
                    <!-- <img width="42px" height="42px" src="<?=$urlAvatar?>" alt="avatar"> -->
                    <h6 style="margin: 0px 5px;" ><?php echo $saludo.'<br>'.$nombreUsuario; ?></h6>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link <?=$home ?>" href="index.php?sec=home#TOP">Home</a><span class="sr-only">(current)</span>
            </li>
            <li class="nav-item ">
                <a class="nav-link <?=$catalogo?>" href="index.php?sec=listado#TOP">Catalogo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$ayuda; ?>" href="index.php?sec=ayuda#TOP">Ayuda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$perfil; ?>" href="index.php?sec=perfil#TOP">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$contacto; ?>" href="index.php?sec=contacto#TOP">Contacto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$salir; ?>" href="index.php?sec=salir#TOP">Salir</a>
            </li>
        </ul>
    </div>
</nav>
