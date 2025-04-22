
<div class="container my-4">
    <div class="row justify-between">
        @if($latest)
        <div class="display-header d-flex justify-content-between pb-3">
            <h2 class="display-7 text-dark text-uppercase">Latest</h2>
        </div>
        @endif
        <div class="swiper product-watch-swiper">
            <div class="swiper-wrapper">
            @foreach($products as $product)
                <div class="swiper-slide">
                    <a href="product/{{$product->slug}}">
                    <div class="product-card position-relative">
                        <div class="image-holder">
                            <img src="{{$product->image}}" alt="{{$product->name}}" class="img-fluid">
                        </div>
                        <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                            <h3 class="card-title text-uppercase">{{$product->name}}</h3>
                        </div>
                        <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                            <span class="item-price text-primary">{{$product->price}} euro</span>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
