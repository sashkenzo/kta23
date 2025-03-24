<div class="container">
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
                @foreach($bannercarousels as $bannercarousel)
                    @if($bannercarousels[0] == $bannercarousel)
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide {{$bannercarousel->serial}}"></button>
                    @else
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{$bannercarousel->serial-1}}" aria-label="Slide{{$bannercarousel->serial}}"></button>            @endif
              @endforeach
        </div>
        <div class="carousel-inner">
                @foreach($bannercarousels as $bannercarousel)
                    @if($bannercarousels[0] == $bannercarousel)
                    <div class="carousel-item active">
                        <a href="{{$bannercarousel->button_url}}">
                        <img class="img rounded-4" style="width: 100%; height: 100%" src="{{$bannercarousel->image}}" alt="first pic of banner-carousel"></a>
                           </div>
                    @else
                    <div class="carousel-item">
                        <a href="{{$bannercarousel->button_url}}">
                        <img class="img rounded-4" style=" width: 100%; height: 100%" src="{{$bannercarousel->image}}" alt="pics of banner-carousel"></a>
                           </div>
                @endif
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
