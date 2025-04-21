@php
    use App\Models\Cards;
    $cards= Cards::where('status', 1)->latest()->take(4)->get();
@endphp

<section class="padding-large ">
    <div class="container">
        <div class="row">
            @foreach($cards as $card)
            <div class="col-lg-3 col-md-6 pb-3">
                <div class="icon-box d-flex">
                    <div class="icon-box-icon pe-3 pb-3">
                        <img src="{{$card->image}}" width="50px" height="50px" alt="picture of a card name {{$card->name}}">
                    </div>
                    <div class="icon-box-content">
                        <h3 class="card-title text-uppercase text-dark">{{$card->name}}</h3>
                        <p>{{$card->content}}</p>
                    </div>
                </div>
            </div>


            @endforeach
        </div>
    </div>
</section>
