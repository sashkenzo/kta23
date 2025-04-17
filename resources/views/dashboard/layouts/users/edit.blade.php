@extends('dashboard.components.master')
@section('page')
<h1 class="h2">Edit User</h1>
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
                    <h4>Edit User</h4>
                </div>
                <form action="{{route('change.users.update',$users->id)}}" method="POST" enctype="multipart/form-data" id="update">
                    @csrf
                    @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Email : {{$users->email}}</label>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$users->name}}">
                        @if($errors->has('name'))
                            <code>{{$errors->first('name')}}</code>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Role: {{$users->role}}</label>
                        <select class="form-control" name="role" >
                            <option {{$users->role == 'admin' ? 'selected': ''}} value='admin'>Admin</option>
                            <option {{$users->role == 'super' ? 'selected': ''}} value='super'>Super</option>
                            <option {{$users->role == 'user' ? 'selected': ''}} value='user'>User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status: {{$users->status}}</label>
                        <select class="form-control" name="status" >
                            <option {{$users->status == 1 ? 'selected': ''}} value='1'>Active</option>
                            <option {{$users->status == 0 ? 'selected': ''}} value='0'>inactive</option>
                        </select>
                    </div>
                </div>
                </form>
                <div class="card-footer">
                    <a class="btn btn-outline-dark" href="{{route('change.users')}}">Back</a>
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
                                    <form action="{{route('change.users.delete',$users->id)}}" method="POST">
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
