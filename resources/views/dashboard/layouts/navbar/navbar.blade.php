@php
$navs=\App\Models\Navbar::where('top',1)
->where('status', 1)
->with([
    'subcategorys' => function ($query) {
    $query->where('status',1);}
])->get();

    $footerlogos= App\Models\FooterLogo::where('status',1)->latest()->take(1)->get();

@endphp
<header>
    <nav id="header-nav" class="navbar navbar-expand-md px-3 mb-3 text-black">
        <div class="container-fluid">
            @foreach($footerlogos as $footerlogo)
            <a class="logo" href="{{$footerlogo->homelink}}">
                <img src="{{url($footerlogo->image)}}" class="logo" height="50px" width="150px" alt="{{$footerlogo->homelink}}">
            </a>
            @endforeach
            <button class="navbar-toggler d-flex d-md-none order-3 p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
                <div class="offcanvas-header px-4 pb-0">
                    @foreach($footerlogos as $footerlogo)
                    <a class="logo" href="{{$footerlogo->homelink}}">
                        <img src="{{url($footerlogo->image)}}" class="logo" height="50px" width="150px" alt="{{$footerlogo->homelink}}">
                    </a>
                    @endforeach
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdNavbar"></button>
                </div>
                <div class="offcanvas-body">
                    <ul id="navbar" class="navbar-nav text-uppercase justify-content-end align-items-center flex-grow-1 pe-3">
                        @foreach($navs as $nav)
                        <li class="nav-item dropdown">
                            <a class="nav-link me-4 dropdown-toggle link-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">{{$nav->name}}</a>
                            <ul class="dropdown-menu">
                                @foreach($nav->subcategorys as $subnav)
                                <li>
                                    <a href="{{url('cat/'.$subnav->slug)}}" class="dropdown-item">{{$subnav->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                            <li class="nav-item dropdown">
                                @include('layouts.loginbar')
                            </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
