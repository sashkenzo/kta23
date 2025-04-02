@php
    use App\Models\Banner;
    $banners = Banner::where('status', 1)->latest()->get();

@endphp
<div class="text-start">
    @foreach ($banners->take(2) as $banner)
        <a href="{{$banner->button_url}}" class="p-2">
        <div class="card text-white">

            <img src="{{$banner->image}}" class="card-img" style="width: 100%;" alt="pic of a banner">
            <div class="card-img-overlay">
                <h5 class="card-title">{{$banner->name}}</h5>
                <p class="card-text">{{$banner->content}}</p>
            </div>
        </div>
        </a>
@endforeach
