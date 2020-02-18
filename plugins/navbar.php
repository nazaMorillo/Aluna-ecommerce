<?php


if($sec=="inicio"){$inicio='active';}else{$inicio='';}
if($sec=="home"){$home='active';}else{$home='';}
if($sec=="listado"){$catalogo='active';}else{$catalogo='';}
if($sec=="ayuda"){$ayuda='active';}else{$ayuda='';}
if($sec=="registro"){$registro='active';}else{$registro='';}
if($sec=="login"){$login='active';}else{$login='';}
if($sec=="contacto"){$contacto='active';}else{$contacto='';}

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
            <li class="nav-item ">
                <a class="nav-link <?=$home ?>" href="index.php?sec=home#TOP">Home</a><span class="sr-only">(current)</span>
            </li>
            <li class="nav-item ">
                <a class="nav-link <?=$catalogo?>" href="index.php?sec=listado#TOP">Catalogo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$ayuda ?>" href="index.php?sec=ayuda#TOP">Ayuda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$registro ?>" href="index.php?sec=registro#TOP">Registro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$login ?>" href="index.php?sec=login#TOP">Login </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$contacto ?>" href="index.php?sec=contacto#TOP">Contacto</a>
            </li>
        </ul>
    </div>
</nav>