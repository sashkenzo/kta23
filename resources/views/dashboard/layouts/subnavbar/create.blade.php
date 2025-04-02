@php


@endphp

@extends('dashboard.components.master')
@section('page')
<h1 class="h2">Sub-Category's of Navbar</h1>
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
                        <h4>New Sub-category</h4>
                    </div>
                    <form action="{{route('change.subnavs.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Parent Category</label>
                                    <select class="form-select" id="inputGroupSelect01" name="navbar_id">
                                        @foreach($navs as $nav)
                                            <option value={{$nav->id}}>{{$nav->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if($errors->has('navbar_id'))
                                    <code>{{$errors->first('navbar_id')}}</code>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name">
                                @if($errors->has('name'))
                                    <code>{{$errors->first('name')}}</code>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Type of page</label>
                                <select class="form-control" name="type">
                                    <option value="blog">Blog</option>
                                    <option value="product">Product</option>
                                    <option value="graphic">Graphic</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-outline-dark" href="{{route('change.subnavs')}}">Back</a>

                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#create-new-line">
                                Create
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
        </div>
    </div
@endsection
