<nav class="navbar bg-white shadow-sm">
    
    <a class="btn btn-primary btn-lg active" role="button" aria-pressed="true" href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            Cerrar Session
    </a>
        
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>