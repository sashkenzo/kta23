@php
    use App\Models\Cards;
    $cards= Cards::where('status', 1)->latest()->take(4)->get();
@endphp
<div class="container">
    <div class="row justify-between">
        @foreach($cards as $card)
            <div class="col">
                <div class="card justify-items-center" style="width: 8rem;">
                    <a href="{{$card->button_url}}"><img src="{{$card->image}}" class="card-img-top"
                         alt="picture of a card name {{$card->name}}">
                        <div class="card-body">
                        <h5 class="card-title">{{$card->name}}</h5>
                        <p class="card-text">{{$card->content}}</p>
                        </div>
                    </a>
                </div>

            </div>
        @endforeach
    </div>
</div>
