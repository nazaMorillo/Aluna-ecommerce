<nav class="navbar bg-white shadow-sm">
    

   

   

        <ul class="nav nav-pills">
        
            
        

                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            Cerrar Session
                    </a>
                </li>

        </ul>
        
    
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>