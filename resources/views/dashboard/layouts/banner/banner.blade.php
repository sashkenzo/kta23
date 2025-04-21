@php
    use App\Models\Banner;
    $banners = Banner::where('status', 1)->latest()->get();

@endphp
@foreach ($banners->take(1) as $banner)
<section class="bg-light-blue overflow-hidden mt-5 padding-xlarge" style="background-image: url({{$banner->image}});background-position: right; background-repeat: no-repeat;">
    <div class="row d-flex flex-wrap align-items-center">
        <div class="col-md-6 col-sm-12">
            <div class="text-content offset-4 padding-medium">
                <h3>{{$banner->content}}</h3>
                <h2 class="display-2 pb-5 text-uppercase text-dark">{{$banner->name}}</h2>
                <a href="{{$banner->button_url}}" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">{{$banner->button_url_text}}</a>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
        </div>
    </div>
</section>
@endforeach
