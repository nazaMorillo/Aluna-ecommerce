
    
    
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

                @if (Route::has('login'))
                <!-- <div class="top-right links"> -->                
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="#">Login </a> -->
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <!-- <a class="nav-link" href="#">Registro</a> -->
                            <a  class="nav-link" href="{{ route('register') }}">Registro</a>
                        </li>                            
                        @endif
                    @endauth
                <!-- </div> -->
            @endif
                
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
            </ul>
        </div>
           

            
        
        
    </nav>