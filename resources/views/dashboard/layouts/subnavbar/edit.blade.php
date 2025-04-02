@extends('dashboard.components.master')
@section('page')
<h1 class="h2">Edit Sub-category</h1>
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
                    <h4>Edit Sub-category</h4>
                </div>
                <form action="{{route('change.subnavs.update',$subnav->id)}}" method="POST" enctype="multipart/form-data" id="update">
                    @csrf
                    @method('PUT')
                <div class="card-body">
                    <div class="card-body">
                        @if($errors)
                            <code>{{$errors->first()}}</code>
                        @endif
                            <div class="form-group">
                                <label>Parent Category : {{$navs[($subnav->navbar_id)-1]->name}}</label>
                                <select class="form-select" id="inputGroupSelect01" name="navbar_id">
                                    @foreach($navs as $nav)
                                        <option {{$nav->id == $subnav->navbar_id ? 'selected':''}} value={{$nav->id}}>{{$nav->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{$subnav->name}}">
                            @if($errors->has('name'))
                                <code>{{$errors->first('name')}}</code>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Type of page | Current : {{$subnav->type}}</label>
                            <select class="form-control" name="type">
                                <option value="blog">Blog</option>
                                <option value="product">Product</option>
                                <option value="graphic">Graphic</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status | Current : {{$subnav->status == 1 ? 'Active': 'Inactive'}}</label>
                            <select class="form-control" name="status">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </div>
                    </div>
                </div>
                </form>
                    <div class="card-footer">
                        <a class="btn btn-outline-dark" href="{{route('change.subnavs')}}">Back</a>
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
                                    <form action="{{route('change.subnavs.delete',$subnav->id)}}" method="POST" id="delete">
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
