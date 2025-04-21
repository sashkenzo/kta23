@php
    $footers= App\Models\Footer::where('status', 1)->latest()->get();

    $footerlogos= App\Models\FooterLogo::where('status',1)->latest()->take(1)->get();

$footernavs=\App\Models\Navbar::where('bottom',1)->where('status', 1)
->with([
    'subcategorys' => function ($query) {
    $query->where('status',1);}
])->get();
@endphp

<footer id="footer" class="overflow-hidden border-top">
    <div class="container mt-2">
        <div class="row">
            <div class="footer-top-area">
                <div class="row d-flex flex-wrap justify-content-between">
                    <div class="col-lg-3 col-sm-6 pb-3">
                        <div class="footer-menu">
                            @foreach($footerlogos as $footerlogo)
                                <img href="{{$footerlogo->homelink}}" height="50" width="150" src="{{url($footerlogo->image)}}" alt="footer logo">
                            <p>{{$footerlogo->content}}</p>
                            @endforeach
                                <!---social-links
                            <div class="social-links">
                                <ul class="d-flex list-unstyled">
                                    <li>
                                        <a href="#">
                                            <svg class="facebook">
                                                <use xlink:href="#facebook" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg class="instagram">
                                                <use xlink:href="#instagram" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg class="twitter">
                                                <use xlink:href="#twitter" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg class="linkedin">
                                                <use xlink:href="#linkedin" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg class="youtube">
                                                <use xlink:href="#youtube" />
                                            </svg>

                                    </li>
                                </ul>
                            </div></a>--->
                        </div>
                    </div>
                    @foreach($footernavs as $footernav)
                        @php
                            $subnavs = App\Models\SubNavBar::where('navbar_id',$footernav->id)->count();
                        @endphp
                            <div class="col-lg-2 col-sm-6 pb-3">
                                <div class="footer-menu text-uppercase">
                                    <h5 class="widget-title pb-2">{{$footernav->name}}</h5>
                                    <ul class="menu-list list-unstyled text-uppercase">
                                        @foreach($footernav->subcategorys as $footersubnav)
                                        <li class="menu-item pb-2">
                                            <a href="{{url('cat/'.$footersubnav->slug)}}">{{$footersubnav->name}}</a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    <div class="copyright bg-light mt-2 border-top">
        @foreach($footers as $footer)
            <p class="text-center">{{$footer->name}}</p>
        @endforeach
    </div>
</footer>
