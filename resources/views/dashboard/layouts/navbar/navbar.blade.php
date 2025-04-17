@php
$navs=\App\Models\Navbar::where('top',1)
->where('status', 1)
->with([
    'subcategorys' => function ($query) {
    $query->where('status',1);}
])->get();
@endphp


<nav class="navbar">
    <div class="container">
        <div class="row container col-md-12 text-center">
            @foreach($navs as $nav)
                @php
                    $subnavs = App\Models\SubNavBar::where('navbar_id',$nav->id)->count();
                @endphp
                @if($subnavs>0)
            <div class="col justify-between">
             <div class="dropdown">
                <label class="nav-item dropdown-toggle" data-bs-toggle="dropdown">
                 {{$nav->name}}
                </label>
                <ul class="dropdown-menu text-center">
                    @foreach($nav->subcategorys as $subnav)
                        <li><a class="dropdown-item" href="{{url('cat/'.$subnav->slug)}}">{{$subnav->name}}</a></li>
                    @endforeach

                </ul>
            </div>
            </div>
                    @endif
            @endforeach
        </div>
    </div>
</nav>
