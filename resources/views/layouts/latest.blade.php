@php
    use App\Models\Product;
    $cards= Product::where('status', 1)->latest()->take(6)->get();
@endphp
<div class="container">
    <h1>Latest</h1>
    <div class="row justify-between">
        @foreach($cards as $card)
            <div class="col">
                <div class="card justify-items-center ">
                    <a href="product/{{$card->slug}}"><img src="{{$card->image}}" class="card-img-top  h-100"
                                                           alt="picture of a card name {{$card->name}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$card->name}}</h5>
                            <p class="card-text">{{$card->short_description}}</p>
                        </div>
                    </a>
                </div>

            </div>
        @endforeach
    </div>
</div>
