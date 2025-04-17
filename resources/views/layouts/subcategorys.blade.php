@extends('layouts.master')
@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Product Images -->
        <div class="col-md-6 mb-4">
            @php
            if($product[0]->image){
            echo "<img src='".url($product[0]->image)."' alt='Product' class='img-fluid rounded mb-3 product-image ' id='mainImage'>'";
            echo "<div class='d-flex justify-content-between'>";
            echo "<img src='".url($product[0]->image)."' alt='Thumbnail 1' class='thumbnail rounded active ' onclick='changeImage(event, this.src)'>";
                }
                if($product[0]->image_2)
                    {echo "<img src='".url($product[0]->image_2)."' alt='Thumbnail 2' class='thumbnail rounded ' onclick='changeImage(event, this.src)'>";}
                if($product[0]->image_3)
                    {echo "<img src='".url($product[0]->image_3)."' alt='Thumbnail 3' class='thumbnail rounded ' onclick='changeImage(event, this.src)'>";}
                   if($product[0]->image_4)
                    {echo "<img src='".url($product[0]->image_4)."' alt='Thumbnail 4' class='thumbnail rounded ' onclick='changeImage(event, this.src)'>";}

                @endphp
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h2 class="mb-3">{{$product[0]->name}}</h2>
            <p class="text-muted mb-4">Sold by: {{$product[0]->user_id}}</p>
            <div class="mb-3">
                <span class="h4 me-2">{{$product[0]->price}}</span>
            </div>
            <div class="mt-4">
                <h5>Features:</h5>
                <ul>
                    <li>{{$product[0]->category_id}}</li>
                    <li>{{$product[0]->subcategory_id}}</li>
                    <li>{{$product[0]->brand_id}}</li>
                </ul>
            </div>
            <div class="mt-4">
                <h5>Description:</h5>
            <p class="mb-4"> {{$product[0]->description}}</p>
            </div>
            <button class="btn btn-primary btn-lg mb-3 me-2 text-align-center">Contact
            </button>

        </div>
    </div>
</div>

<script>
    function changeImage(event, src) {
        document.getElementById('mainImage').src = src;
        document.querySelectorAll('.thumbnail').forEach(thumb => thumb.classList.remove('active'));
        event.target.classList.add('active');
    }
</script>
@endsection
