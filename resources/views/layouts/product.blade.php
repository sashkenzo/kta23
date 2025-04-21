@extends('layouts.master')
@php
$subnavbars = App\Models\SubNavBar::where('id',$product[0]->subcategory_id)->get();
$userid= App\Models\User::where('id',$product[0]->user_id)->get();
$images=['image','image_2','image_3','image_4'];
$i=1;
@endphp
@section('content')
<div class="container">

    <div class="row">
        <!-- Product Images -->
        <div class="col-md-6 mb-4">
            @if ($product[0]->image)
            <img src='{{url($product[0]->image)}}' alt='Product' class='img-fluid rounded mb-3 product-image ' id='mainImage'>
                <div class='d-flex justify-content-between'>
                    @foreach($images as $image)
                        <img src='{{url($product[0]->$image)}}' alt='Thumbnail {{$i}}' class='thumbnail rounded active ' onclick='changeImage(event, this.src)'>
                        @php($i+=1)
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h2 class="mb-3">{{$product[0]->name}}</h2>
            <p class="text-muted mb-4">Sold by: {{$userid[0]->name}}</p>
            <div class="mb-3">
                <span class="h4 me-2">Price: {{round($product[0]->price,2)}} euro</span>
            </div>
            <div class="mt-4">
                <h5>Type:</h5>
                <ul>
                    <li>{{$subnavbars->name}}</li>
                </ul>
            </div>
            <div class="mt-4">
                <h5>Description:</h5>
            <p class="mb-4"> {{$product[0]->description}}</p>
            </div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create-new-line">
                Contact
            </button>
            <div class="modal fade" id="create-new-line" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Contact
                            @if($userid[0]->email)
                            Email: {{$userid[0]->email}}<br>
                            @endif
                            @if($userid[0]->phone)
                            Phone: {{$userid[0]->phone}}<br>

                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
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
