
@extends('dashboard.components.master')
@section('page')
<h1 class="h2">Edit Blog Document</h1>
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
                    <h4>Edit a Blog</h4>
                </div>
                <form action="{{route('blog.update',$blog->slug)}}" method="POST" enctype="multipart/form-data" id="update">
                    @csrf
                    @method('PUT')
                <div class="card-body">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name">
                            @if($errors->has('name'))
                                <code>{{$errors->first('name')}}</code>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Blog Title</label>
                            <input type="text" class="form-control" name="title">
                            @if($errors->has('title'))
                                <code>{{$errors->first('title')}}</code>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea type="text" class="form-control" name="content" rows="4" cols="50"></textarea>
                            @if($errors->has('description'))
                                <code>{{$errors->first('description')}}</code>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Short Content</label>
                            <textarea type="text" class="form-control" name="short_content" rows="4" cols="50"></textarea>
                            @if($errors->has('short_content'))
                                <code>{{$errors->first('short_content')}}</code>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Long Content</label>
                            <textarea type="text" class="form-control" name="long_content" rows="4" cols="50"></textarea>
                            @if($errors->has('long_content'))
                                <code>{{$errors->first('long_content')}}</code>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>SubCategory</label>
                            <select class="form-select" name="subcategory_id">
                                @php
                                    use App\Models\SubNavBar;
                                    $subnavbars = SubNavBar::where('status',1)->where('type','blog')->get();
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
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                </form>
                    <div class="card-footer">
                        <a class="btn btn-outline-dark" href="{{route('blog')}}">Back</a>
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
                                    <form action="{{route('blog.delete',$blog->slug)}}" method="POST" id="delete">
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
