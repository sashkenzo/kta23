<nav class="navbar">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="icon-link"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2ZM12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM15.8329 7.33748C16.0697 7.17128 16.3916 7.19926 16.5962 7.40381C16.8002 7.60784 16.8267 7.92955 16.6587 8.16418C14.479 11.2095 13.2796 12.8417 13.0607 13.0607C12.4749 13.6464 11.5251 13.6464 10.9393 13.0607C10.3536 12.4749 10.3536 11.5251 10.9393 10.9393C11.3126 10.5661 12.9438 9.36549 15.8329 7.33748ZM17.5 11C18.0523 11 18.5 11.4477 18.5 12C18.5 12.5523 18.0523 13 17.5 13C16.9477 13 16.5 12.5523 16.5 12C16.5 11.4477 16.9477 11 17.5 11ZM6.5 11C7.05228 11 7.5 11.4477 7.5 12C7.5 12.5523 7.05228 13 6.5 13C5.94772 13 5.5 12.5523 5.5 12C5.5 11.4477 5.94772 11 6.5 11ZM8.81802 7.40381C9.20854 7.79433 9.20854 8.4275 8.81802 8.81802C8.4275 9.20854 7.79433 9.20854 7.40381 8.81802C7.01328 8.4275 7.01328 7.79433 7.40381 7.40381C7.79433 7.01328 8.4275 7.01328 8.81802 7.40381ZM12 5.5C12.5523 5.5 13 5.94772 13 6.5C13 7.05228 12.5523 7.5 12 7.5C11.4477 7.5 11 7.05228 11 6.5C11 5.94772 11.4477 5.5 12 5.5Z"></path></svg></span>
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
                    @if(Auth::user()->role=='super' or Auth::user()->role=='admin' )
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Manage Nav Blog Items
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="@if(Auth::user()->role=='admin')
                            {{route('change.blog')}}
                        @else
                            {{route('mod.blog')}}
                       @endif">Blog</a></li>
                            </ul>
                        </li>
                    </ul>
                    @endif
                    @if(Auth::user()->role=='admin' or Auth::user()->role='super')
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Menu
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Messages</a></li>
                                    <li><a class="dropdown-item" href="{{route('product')}}">Your Products</a></li>
                                </ul>
                            </li>
                        </ul>
                    @endif
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 border-top mt-2">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Account</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('profile.edit')}}">Settings</a></li>
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                                this.closest('form').submit()">Sign Out</a></li>
                            </form>
                        </ul>

                </ul>
            </div>
        </div>
        <div class="col col-11 text-center">@yield('page')</div>
    </div>
</nav>

