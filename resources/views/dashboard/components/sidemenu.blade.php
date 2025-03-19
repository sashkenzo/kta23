<nav class="navbar">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                @if(Auth::user()->role=='admin')
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage web items
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">LoginBar</a></li>

                            <li><a class="dropdown-item" href="{{route('change.navbar')}}">NavBar</a></li>

                            <li><a class="dropdown-item" href="{{route('change.subnavbar')}}">SubNavBar</a></li>

                            <li><a class="dropdown-item" href="{{route('change.carousel')}}">Carousel</a></li>

                            <li><a class="dropdown-item" href="{{route('change.banner')}}">Banner</a></li>

                            <li><a class="dropdown-item" href="#">Cards</a></li>

                            <li><a class="dropdown-item" href="#">Footer</a></li>
                        </ul>
                    </li>
                </ul>
                @endif
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 border-top mt-2">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Account</a>
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
                </ul>
            </div>
        </div>
        <div class="col col-11 text-center">@yield('page')</div>
    </div>
</nav>

