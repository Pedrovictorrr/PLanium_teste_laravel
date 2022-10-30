<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{route("home")}}">Planium</a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                        href="{{route("home")}}">Planos</a></li>
                <li class="nav-item mx-0 mx-lg-1">  
                     @if (Route::has('login'))
                   
                        @auth
                            <a href="{{ url('/home') }}" class="nav-link py-3 px-0 px-lg-3 rounded">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link py-3 px-0 px-lg-3 rounded">Log in</a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link py-3 px-0 px-lg-3 rounded">Register</a>
                            @endif
                        @endauth
                @endif
    </li>
          
            </ul>
        </div>
    </div>
</nav>