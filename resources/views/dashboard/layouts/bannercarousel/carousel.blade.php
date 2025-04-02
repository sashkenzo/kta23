@php
    use App\Models\Banner2Carousel;
    $bannercarousels = Banner2Carousel::where('status', 1)->latest()->get();
@endphp


    <div id="banner2carautoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        @foreach($bannercarousels as $bannercarousel)
            @if($bannercarousels[0] == $bannercarousel)
                <div class="carousel-item active">
                    <a href="{{$bannercarousel->button_url}}">
                        <img class="img" style="height:auto; width: auto;" src="{{$bannercarousel->image}}" alt="first pic of banner-carousel"></a>
                </div>
        @else
            <div class="carousel-item">
                <a href="{{$bannercarousel->button_url}}">
                    <img class="img" style="margin:auto; width: 100%;" src="{{$bannercarousel->image}}" alt="pics of banner-carousel"></a>
            </div>
        @endif
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#banner2carautoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#banner2carautoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>

