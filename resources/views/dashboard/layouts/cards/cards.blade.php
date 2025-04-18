@php
    use App\Models\Cards;
    $cards= Cards::where('status', 1)->latest()->take(6)->get();
@endphp

<!-- Features Section -->
@if ($cards != null)
<section class="features-section">
    <div class="container justify-between">
        <h2 class="text-center">Features</h2>
        <div class="row">
            @foreach($cards as $card)
            <div class="col">
                <div class="feature-box">
                    <img src="{{$card->image}}" style="height:60px" class="img"
                         alt="picture of a card name {{$card->name}}">
                    <h4 class="feature-title">{{$card->name}}</h4>
                    <p class="feature-description">{{$card->content}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
