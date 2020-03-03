<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>
        @yield("titulo")
    </title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">A-M</a>
        <form class="form-inline mt-2 mt-md-0" style="width: 65%;">
            <input id="search" class="form-control mr-sm-2" type="text" placeholder="Estoy buscando..." aria-label="Search">
            <a id="carrito" class="btn btn-outline-success my-2 my-sm-0" href="#"><img width="35px" src="/storage/pics/carrito.png" alt="search" title="Carrito"></a>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="#">Home</a><span class="sr-only">(current)</span>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Catalogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ayuda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>
    <section>
        @yield("principal")
    </section>

    <footer class="bg-azul text-center">
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
        <div class="bg-azul-oscuro copy">
            Copyright &copy; 2019 - All Markert
        </div>
    </footer>
    
    <script src="js/jquery-production-3_4_1.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="js/kit-fontawesome.js"></script>
</body>
</html>