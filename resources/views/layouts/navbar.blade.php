<nav class="navbar navbar-expand-md bg-dark sticky-top border-bottom" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand d-md-none" href="#">
            <svg class="bi" width="24" height="24"><use xlink:href="#aperture"/></svg>
            Kullapood
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
                <ul class="navbar-nav flex-grow-1 justify-content-between">
                    <li class="nav-item"><a class="nav-link" href="#">
                            <svg class="bi" width="24" height="24"><use xlink:href="#aperture"/></svg>
                        </a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Kuld</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Hõbe</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Enterprise</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Support</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                    @csrf
                    @if (Route::has('login'))
                        @auth
                            <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                        @else
                            <a class="nav-link"href="{{ route('login') }}">Log in</a>

                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    @endif
                    <form class="d-flex " role="search">
                        <input class="form-control me-2 sm:hidden" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success sm:hidden" type="submit">Search</button>
                    </form>

                </ul>
            </div>
        </div>
    </div>
</nav>
