@php
    use App\Models\Banner;
    $banners = Banner::where('status', 1)->latest()->get();

@endphp
<div class="container">
<div class="row justify-between">
    @foreach ($banners->take(6) as $banner)
        <div class="col">
            <a href="{{$banner->button_url}}" class="p-2">
                <div class="card justify-items-center text-white" style="width: 8rem;">
                    <img src="{{$banner->image}}" class="card-img h-200" style="width: 100%;" alt="pic of a banner">
                <div class="card-img-overlay">
                <h5 class="card-title">{{$banner->name}}</h5>
                <p class="card-text">{{$banner->content}}</p>
            </div>
        </div>
        </a>
        </div>
    @endforeach
        </div>
</div>

