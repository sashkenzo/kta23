@extends('layouts.master')
@section('content')
    <section class="product-store position-relative">
        <div class="container">
            <h2 class="text-center">Search</h2>
            <div class="row">
                @foreach($products as $product)
                    <div class="product-card position-relative col-6 col-md-4 col-lg-3">
                        <a href="../product/{{$product->slug}}">
                            <div class="image-holder">

                                <img src="{{url($product->image)}}" alt="product-item" class="img-fluid">
                            </div>
                            <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                <h3 class="card-title text-uppercase">
                                    {{$product->name}}
                                </h3></div>
                            <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                <span class="item-price text-primary">{{$product->price}}€</span>

                            </div></a>
                    </div>
                @endforeach
                {{$products->links()}}
            </div>
        </div>
    </section>






@endsection


