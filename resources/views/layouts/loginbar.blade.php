<nav class="navbar navbar-expand-md sticky-top border-bottom">
    <div class="container">
        <div class="row container col-md-9 col-sm-9 col-9 col-lg-9">
            <div class="col col-md-12">
                <form class="d-flex" role="search">
                    <input class="form-control me-2 col-md" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success col-md-3" type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="row container col-md-3 col-sm-3 col-3 col-lg-3">
            @csrf
            @if (Route::has('login'))
                @auth
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <div class="col col-md-6 col-sm-6 col-6 col-lg-6" >
                        <a class="nav-link" href="{{ route('login') }}">
                            <svg height="24" width="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M352 96l64 0c17.7 0 32 14.3 32 32l0 256c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l64 0c53 0 96-43 96-96l0-256c0-53-43-96-96-96l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm-9.4 182.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L242.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/></svg></a>
                        </div>
                        <div class="col col-md-6 col-sm-6 col-6 col-lg-6">
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">
                            <svg height="24" width="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM504 312l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                        </a>
                        </div>
                    @endif
                @endauth
             @endif


            </div>
        </div>


</nav>
