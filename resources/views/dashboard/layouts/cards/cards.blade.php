@php
    use App\Models\Cards;
    $cards= Cards::where('status', 1)->latest()->take(6)->get();
@endphp
<div class="container">
    <h2>Why us?</h2>
    <div class="row justify-between">
        @foreach($cards as $card)
            <div class="col">
                <div class="card justify-items-center" style="width: 8rem;">
                    <img src="{{$card->image}}" class="card-img-top h-100"
                         alt="picture of a card name {{$card->name}}">
                        <div class="card-body">
                        <h5 class="card-title">{{$card->name}}</h5>
                        <p class="card-text">{{$card->content}}</p>
                        </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
