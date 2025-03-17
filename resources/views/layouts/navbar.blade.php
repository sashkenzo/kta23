<nav class="navbar navbar-expand-md sticky-top border-bottom">
    <div class="container">
        <a class="navbar-brand d-md-none" href="#">
            <h2>kullapood</h2>
        </a>
               <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasLabel">KullaPood</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav flex-grow-1">
                    <li class="nav-item"><a class="nav-link" href="#">
                            <svg class="bi" width="24" height="24"><use xlink:href="#aperture"/></svg>
                        </a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Kuld</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Hõbe</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Enterprise</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Support</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                    <div class="col"></div>
                    @csrf
                    @if (Route::has('login'))
                        @auth
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Profile
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{route('profile.edit')}}">Settings</a></li>
                                    <form method="POST" action="{{route('logout')}}">
                                    @csrf
                                    <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                            this.closest('form').submit()">Sign Out</a></li>
                                    </form>
                                </ul>
                            </div>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Log in</a></li>

                            @if (Route::has('register'))
                                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    @endif

                </ul>
            </div>
        </div>
    </div>

    <div class="row container-fluid">
        <div class="col">
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    </div>
    </div>
</nav>
