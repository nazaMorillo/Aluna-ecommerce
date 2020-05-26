
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="
    padding-bottom: 9px;
    padding-top: 9px;
">
    <a class="navbar-brand" href="/"><img width="35px" src="{{{ asset('storage/pics/isotipo-Allmarket.png') }}}" alt="Allmarket"></a>
    <form class="form-inline mt-2 mt-md-0" style="width: 64%;">
        <input autocomplete="off" id="search" class="form-control mr-sm-2" type="text" placeholder="Estoy buscando..." aria-label="Search">
        <i id="busquedaAvanzada" class="fas fa-chevron-down btn btn-outline-success my-2 my-sm-0 mr-2" style="color:white;border-width:0px"></i>
        @auth
        <a id="carrito" style="height: 42px;" class="btn btn-outline-success my-2 my-sm-0" href="http://localhost:8000/carrito">
        <img width="35px" height="30px" src="/storage/pics/carrito.png" alt="Carrito" title="Carrito">
        <div class="rounded-circle" style="padding:0px; margin:0px; background-color:rgba(40, 167, 69, 1); border:solid 1px white ;width:20px;height:20px;text-align:center;position:relative;left:11px;top:-34px"><span class="text-white" style="font-weight: bold;position:relative;top:-5px;width:18px;height:18px text-align:center" id="cantCarrito"></span></div>
        </a>
        @endauth
        @guest
        <a id="carrito" class="btn btn-outline-success my-2 my-sm-0" href="/login"><img width="35px" src="/storage/pics/carrito.png" alt="search" title="Carrito"></a>
        @endguest
    </form>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="/">Inicio</a><span class="sr-only">(current)</span>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/listado">Catalogo</a>
            </li>
            
            
            
            
              {{--  {{ dd(auth()->user()->esadmin) }}    --}}
            @auth                
            
                @if (auth()->user()->esadmin == 1)                    
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="/ajax-crud">Gestion</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="/gestion">Gestion</a>
                            </li>                
                @else 


                             <li class="nav-item"> 
                                <a class="nav-link" href="/ayuda">Ayuda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contacto">Contacto</a>
                            </li>

              @endif

            @endauth

            @guest
                
                            <li class="nav-item">
                                <a class="nav-link" href="/ayuda">Ayuda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contacto">Contacto</a>
                            </li> 

            @endguest
        
            
                        @if (Route::has('login'))
            <!-- <div class="top-right links"> -->
            @auth
            <!-- solo aparece si el usuario está logeado -->
            <li class="nav-item">
                <a class="nav-link" href="/perfil" style="display: flex; padding:0px">
                <div class="rounded-circle" style="background-image:url('/storage/{{Auth::user()->avatar}}');height:40px;width:40px;background-size:cover;background-position:center"></div>
                    <p class="nav-link" style="margin:0px;"><b>{{Auth::user()->name}}</b></p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Salir</a>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>


            @else
            <li class="nav-item">
                <!-- <a class="nav-link" href="#">Login </a> -->
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <!-- <a class="nav-link" href="#">Registro</a> -->
                <a class="nav-link" href="{{ route('register') }}">Registro</a>
            </li>
            @endif
            @endauth
            @guest
            <!-- <li class="nav-item">
                    <a href="*" class="nav-link">No estás logueado</a>
                </li>             -->
            @endguest
            @endif
        </ul>
    </div>





</nav>