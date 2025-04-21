@php
    use App\Models\Banner2Carousel;
    $bannercarousels = Banner2Carousel::where('status', 1)->latest()->get();
@endphp

<section class="position-relative overflow-hidden bg-light-blue">
    <div class="swiper main-swiper">
        <div class="swiper-wrapper">
            @foreach($bannercarousels as $bannercarousel)
            <div class="swiper-slide">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-6">
                            <div class="banner-content">
                                <h1 class="display-2 text-uppercase text-dark pb-5">{{$bannercarousel->content}}</h1>
                                <a href="{{$bannercarousel->button_url}}" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">{{$bannercarousel->button_url_text}}</a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="image-holder">
                                <img class="h-400" src="{{url($bannercarousel->image)}}" alt="banner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
