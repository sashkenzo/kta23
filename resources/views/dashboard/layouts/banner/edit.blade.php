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
                <form action="{{route('change.banner.update',$banner->id)}}" method="POST" enctype="multipart/form-data" id="update">
                    @csrf
                    @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <p><img height="100" src="{{asset($banner->image)}}" alt="Preview of a banner"></p>
                        <label>Banner</label>
                        <input type="file" class="form-control" name="image">
                        @if($errors->has('image'))
                            <code>{{$errors->first('image')}}</code>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$banner->name}}">
                        @if($errors->has('name'))
                            <code>{{$errors->first('name')}}</code>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <input type="text" class="form-control" name="content" value="{{$banner->content}}">
                        @if($errors->has('content'))
                            <code>{{$errors->first('content')}}</code>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>button url</label>
                        <input type="text" class="form-control" name="button_url" value="{{$banner->button_url}}">
                        @if($errors->has('button_url'))
                            <code>{{$errors->first('button_url')}}</code>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Button Url text</label>
                        <input type="text" class="form-control" name="button_url_text" value="{{$banner->button_url_text}}">
                        @if($errors->has('button_url_text'))
                            <code>{{$errors->first('button_url_text')}}</code>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Status: {{$banner->status}}</label>
                        <select class="form-control" name="status" >
                            <option {{$banner->status == 1 ? 'selected': ''}}value='1'>Active</option>
                            <option {{$banner->status == 0 ? 'selected': ''}}value='0'>inactive</option>
                        </select>
                    </div>
                </div>
                </form>
                <div class="card-footer">
                    <a class="btn btn-outline-dark" href="{{route('change.banner')}}">Back</a>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-line">
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
                                    <form action="{{route('change.banner.delete',$banner->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-outline-success">Accept</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
