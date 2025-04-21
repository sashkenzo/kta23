@php
    use App\Models\Product;
    $products= Product::where('status', 1)->latest()->simplePaginate(12);
@endphp

<div class="container">
    <div class="row justify-between">
        @foreach($products as $product)
            <div class="col">
                <div class="card justify-items-center ">
                    <a href="product/{{$product->slug}}"><img src="{{$product->image}}" class="card-img-top  h-100"
                                                           alt="picture of a card name {{$product->name}}">
                        <div class="card-body">
                            <h4 class="card-title">{{$product->name}}</h4>
                            <p class="card-text">{{$product->short_description}}</p>
                        </div>
                    </a>
                </div>

            </div>
        @endforeach
        {{$products->links()}}
    </div>
</div>
