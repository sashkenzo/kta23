@extends('dashboard.components.master')
@section('page')
<h1 class="h2">New User</h1>
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
                    <h4>New User</h4>
                </div>
                <form action="{{route('change.users.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" inputmode="email">
                        @if($errors->has('name'))
                            <code>{{$errors->first('name')}}</code>
                        @endif
                    </div>
                    <div class="form-group">
                    <label>Email</label>
                        <input type="text" class="form-control" name="email" inputmode="email">
                        @if($errors->has('email'))
                            <code>{{$errors->first('email')}}</code>
                       @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" inputmode="email">
                        @if($errors->has('password'))
                            <code>{{$errors->first('password')}}</code>
                        @endif
                        </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" inputmode="email">
                        @if($errors->has('password_confirmation'))
                            <code>{{$errors->first('password_confirmation')}}</code>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control " name="role">
                            <option value="admin">admin</option>
                            <option value="super">super</option>
                            <option value="user">user</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control " name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                </form>

                </div>
                <div class="card-footer">
                    <a class="btn btn-outline-dark" href="{{route('change.users')}}">Back</a>

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
        </div>
    </div>
@endsection
