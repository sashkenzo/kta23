@extends('dashboard.components.master')
@section('page')
<h1 class="h2">Edit item for Navbar</h1>
@endsection
@section('section')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Edit a Card</h4>
                </div>
                <form action="{{route('change.cards.update',$product->slug)}}" method="POST" enctype="multipart/form-data" id="update">
                    @csrf
                    @method('PUT')
                <div class="card-body">
                    <div class="card-body">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 form-group">

                                    @if($product->image)
                                        <label>Image 1</label>
                                    <p><img height="100" src="{{url($product->image)}}" alt="Preview of a cards picture"></p>
                                    <input type="file" class="form-control" name="image">
                                    @if($errors->has('image'))
                                        <code>{{$errors->first('image')}}</code>
                                    @endif
                                    @endif
                                </div>
                                <div class="col-6 form-group">
                                    @if($product->image_2)
                                        <p><img height="100" src="{{url($product->image_2)}}" alt="Preview of a cards picture"></p>
                                        <label>Image 2</label>
                                    <input type="file" class="form-control" name="image_2">
                                    @if($errors->has('image_2'))
                                        <code>{{$errors->first('image_2')}}</code>
                                    @endif
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label>Image 3</label>
                                    @if($product->image_3)
                                        <p><img height="100" src="{{url($product->image_3)}}" alt="Preview of a cards picture"></p>
                                        <input type="file" class="form-control" name="image_3">
                                    @if($errors->has('image_3'))
                                        <code>{{$errors->first('image_3')}}</code>
                                    @endif
                                </div>
                                <div class="col-6 form-group">
                                    <label>Image 4</label>
                                    @if($product->image_4)
                                        <p><img height="100" src="{{url($product->image_4)}}" alt="Preview of a cards picture"></p>


                                        <input type="file" class="form-control" name="image_4">
                                    @if($errors->has('image_4'))
                                        <code>{{$errors->first('image_4')}}</code>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name">
                                @if($errors->has('name'))
                                    <code>{{$errors->first('name')}}</code>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description">
                                @if($errors->has('description'))
                                    <code>{{$errors->first('description')}}</code>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Short Description</label>
                                <input type="text" class="form-control" name="short_description">
                                @if($errors->has('short_description'))
                                    <code>{{$errors->first('short_description')}}</code>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>SubCategory</label>
                                <select class="form-select" name="subcategory_id">
                                    @php
                                        use App\Models\SubNavBar;
                                        $subnavbars = SubNavBar::where('status',1)->where('type','product')->get();
                                    @endphp
                                    @foreach($subnavbars as $subnavbar){
                                    <option value='{{$subnavbar->id}}'>{{$subnavbar->name}}</option>
                                    @endforeach

                                </select>
                                @if($errors->has('subcategory_id'))
                                    <code>{{$errors->first('subcategory_id')}}</code>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>price</label>
                                <input type="number" class="form-control" name="price" >
                                @if($errors->has('price'))
                                    <code>{{$errors->first('price')}}</code>
                                @endif
                            </div>

                            <div class="form-group">
                            <label>Status : {{$cards->status}}</label>
                            <select class="form-control" name="status">
                                <option {{$cards->status == 1 ? 'selected': ''}} value='1'>1</option>
                                <option {{$cards->status == 0 ? 'selected': ''}} value='0'>0</option>
                            </select>
                        </div>
                    </div>
                </div>
                </form>
                    <div class="card-footer">
                        <a class="btn btn-outline-dark" href="{{route('change.cards')}}">Back</a>
                        <button form="delete" type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-line">
                        Delete
                    </button>
                    <button form="update" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#create-new-line">
                        Update
                    </button>
                    </div>
                    <div class="modal fade" id="create-new-line" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    confirm update
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                                    <button form="update" type="submit" class="btn btn-outline-success">Accept</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="delete-line" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Confirm delete
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{route('change.cards.delete',$cards->id)}}" method="POST" id="delete">
                                        @csrf
                                        @method('DELETE')
                                    <button form="delete" type="submit" class="btn btn-outline-success">Accept</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
