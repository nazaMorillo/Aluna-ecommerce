<?php
// include_once("plugins/componentes.php");
?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.html">All Market</a>
    <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Estoy buscando..." aria-label="Search">
        <a class="btn btn-outline-success my-2 my-sm-0" href="carrito.php" style="border:none; border-radius: 100px;"><img width="45px" src="images/carrito.png" alt="search" title="Carrito"></a>
    </form>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ayuda.html">Ayuda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="registro.html">Registro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.html">Login </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contacto.html">Contacto</a>
            </li>
        </ul>
    </div>
</nav>