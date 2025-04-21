@php
    $footers= App\Models\Footer::where('status', 1)->latest()->get();

    $footerlogos= App\Models\FooterLogo::where('status',1)->latest()->take(1)->get();

$footernavs=\App\Models\Navbar::where('bottom',1)->where('status', 1)
->with([
    'subcategorys' => function ($query) {
    $query->where('status',1);}
])->get();
@endphp

<footer class="container py-5">
    <div class="row">
        <div class="col-12 col-md d-none d-sm-none d-md-block">
            @foreach($footerlogos as $footerlogo)
            <img href="{{$footerlogo->homelink}}" height="150" width="150" src="{{url($footerlogo->image)}}" alt="footer logo">
            @endforeach
        </div>
        @foreach($footernavs as $footernav)
            @php
                $subnavs = App\Models\SubNavBar::where('navbar_id',$footernav->id)->count();
             @endphp
        @if($subnavs>0)
        <div class="col-6 col-md">
            <h5>{{$footernav->name}}</h5>
            <ul class="list-unstyled text-small">
                @foreach($footernav->subcategorys as $footersubnav)
                <li><a class="link-secondary text-decoration-none" href="{{url('cat/'.$footersubnav->slug)}}">{{$footersubnav->name}}</a></li>
                @endforeach
            </ul>
        </div>
            @endif
        @endforeach
    </div>
    <div class="py-4 my-4 border-top">
    @foreach($footers as $footer)
        <p class="text-center">{{$footer->name}}</p>
    @endforeach
    </div>
</footer>
