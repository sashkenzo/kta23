
<div class="container text-start">
    @foreach ($banners->take(1) as $banner)

        <div class="card text-white my-5">
            <img src="{{$banner->image}}" class="card-img" style="width: 100%; height: 100%" alt="pic of a banner">
            <div class="card-img-overlay">
                <h5 class="card-title">{{$banner->name}}</h5>
                <p class="card-text">{{$banner->content}}</p>
                <a class="btn btn-primary" href="{{$banner->button_url}}">{{$banner->button_url_text}}</a>
            </div>
        </div>
@endforeach
