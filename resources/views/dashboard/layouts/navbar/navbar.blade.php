@php
$navbars=\App\Models\Navbar::where('status', 1)->with([
    'subcategorys' => function ($query) {
    $query->where('status',1);}
])->get();
@endphp


<nav class="navbar navbar-expand-md">
    <div class="container">
        <div class="row container col-md-12 text-center">
            @foreach($navbars as $navbar)
            <div class="col justify-between">
             <div class="dropdown">
                <label class="nav-item btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                 {{$navbar->name}}
                </label>
                <ul class="dropdown-menu text-center">
                    @foreach($navbar->subcategorys as $subcategory)
                        <li><a class="dropdown-item" href="#">{{$subcategory->name}}</a></li>
                    @endforeach

                </ul>
            </div>
            </div>
            @endforeach
        </div>
    </div>
</nav>
