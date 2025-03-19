<div class="container">
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
                @foreach($carousels as $carousel)
                    @if($carousels[0] == $carousel)
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide {{$carousel->serial}}"></button>
                    @else
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{$carousel->serial-1}}" aria-label="Slide{{$carousel->serial}}"></button>            @endif
              @endforeach
        </div>
        <div class="carousel-inner">
                @foreach($carousels as $carousel)
                    @if($carousels[0] == $carousel)
                    <div class="carousel-item active">
                        <img align="middle"  height="750" src="{{$carousel->image}}">
                            <div class="container">
                                <div class="carousel-caption text-start">
                                <h1>{{$carousel->name}}</h1>
                                <p class="opacity-75">{{$carousel->content}}</p>
                                <p><a class="btn btn-lg btn-primary" href="{{$carousel->button_url}}">{{$carousel->button_url_text}}</a></p>
                                </div>
                            </div>
                           </div>
                    @else
                    <div class="carousel-item">
                        <img align="middle" height="750" src="{{$carousel->image}}">
                            <div class="container">
                                <div class="carousel-caption text-start">
                                <h1>{{$carousel->name}}</h1>
                                <p class="opacity-75">{{$carousel->content}}</p>
                                <p><a class="btn btn-lg btn-primary" href="{{$carousel->button_url}}">{{$carousel->button_url_text}}</a></p>
                                </div>
                            </div>
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
