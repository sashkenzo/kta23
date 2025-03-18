@extends('dashboard.components.master')
@section('page')
<h1 class="h2">Edit item for Carousel</h1>
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
                    <h4>New Carousel</h4>
                </div>
                <form action="{{route('change.carousel.update',$carousel->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <p><img height="100" src="{{asset($carousel->name)}}" alt="Preview of a banner"></p>
                        <label>Banner</label>
                        <input type="file" class="form-control" name="name">
                        @if($errors->has('name'))
                            <code>{{$errors->first('name')}}</code>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>TItle</label>
                        <input type="text" class="form-control" name="title" value="{{$carousel->title}}">
                        @if($errors->has('title'))
                            <code>{{$errors->first('title')}}</code>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="type" value="{{$carousel->type}}">
                        @if($errors->has('type'))
                            <code>{{$errors->first('type')}}</code>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Starting Price</label>
                        <input type="text" class="form-control" name="price" value="{{$carousel->price}}">
                        @if($errors->has('price'))
                            <code>{{$errors->first('price')}}</code>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Button Url</label>
                        <input type="text" class="form-control" name="button_url" value="{{$carousel->button_url}}">
                        @if($errors->has('button_url'))
                            <code>{{$errors->first('button_url')}}</code>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Serial</label>
                        <input type="text" class="form-control" name="serial" value="{{$carousel->serial}}">
                        @if($errors->has('serial'))
                            <code>{{$errors->first('serial')}}</code>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Status: {{$carousel->status}}</label>
                        <select class="form-control" name="status" >
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-outline-dark" href="{{route('change.carousel')}}">Back</a>
                    <a class="btn btn-outline-danger" href="{{route('change.carousel.delete',$carousel->id)}}">Delete</a>
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#create-new-line">
                        Update
                    </button>
                    <div class="modal fade" id="create-new-line" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Check twice!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-outline-success">Accept</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <form action="{{route('change.carousel.delete',$carousel->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger" type="submit"> delete </button>
                </form>


            </div>
        </div>
    </div>
@endsection
