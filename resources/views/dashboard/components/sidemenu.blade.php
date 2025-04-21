<nav class="navbar">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span></button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                @if(Auth::user()->role=='admin')
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 align-items-center  ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle link-dark " data-bs-toggle="dropdown" aria-expanded="false">
                            Manage Homepage Items
                        </a>
                        <ul class="dropdown-menu">
                            <li><label class="mx-3">Navigation</label></li>
                            <li><a class="dropdown-item" href="{{route('change.navs')}}">--> Category's</a></li>
                            <li><a class="dropdown-item" href="{{route('change.subnavs')}}">--> Sub-Categorys</a></li>
                            <li><label class="mx-3">Banners</label></li>
                            <li><a class="dropdown-item" href="{{route('change.bannercarousel')}}">--> Carousel banner</a></li>
                            <li><a class="dropdown-item" href="{{route('change.banner')}}">--> Banner</a></li>
                            <li><a class="dropdown-item" href="{{route('change.cards')}}">--> Cards</a></li>
                            <li><label class="mx-3">Footer</label></li>
                            <li><a class="dropdown-item" href="{{route('change.footer')}}">--> Bottom Row</a></li>
                            <li><a class="dropdown-item" href="{{route('change.footerlogo')}}">--> Image</a></li>
                            <li><label class="mx-3">Users</label></li>
                            <li><a class="dropdown-item" href="{{route('change.users')}}">--> Users</a></li>

                        </ul>
                    </li>
                </ul>
                @endif

                    @if(Auth::user()->status==1)
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle link-dark" data-bs-toggle="dropdown" aria-expanded="false">
                                    Menu
                                </a>
                                <ul class="dropdown-menu">
                                    @if(Auth::user()->role=='super' or Auth::user()->role=='admin')
                                    <li><a class="dropdown-item" href="{{route('blog')}}">Blog</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="#">Messages</a></li>
                                    <li><a class="dropdown-item" href="{{route('product')}}">Your Products</a></li>
                                </ul>
                            </li>
                        </ul>
                    @endif
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle link-dark" data-bs-toggle="dropdown" aria-expanded="false">
                    Account</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('profile.edit')}}">Settings</a></li>
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                                this.closest('form').submit()">Sign Out</a></li>
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col col-11 text-center">@yield('page')</div>
    </div>
</nav>

