@extends('dashboard.components.master')

@section('page')
    <h1 class="h2">Profile</h1>
@endsection

@section('section')
    <div class="container">
    @if(Auth::user()->role =='admin')
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4>{{Auth::user()->role}}-account</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        This is a {{Auth::user()->role}}-account be carefull!
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-12 mt-4">
            <div class="card">
                <form method="POST" action="{{route('profile.updateProfile')}}" class="needs-validation" novalidate="" enctype="multipart/form-data" id="profile">
                    @csrf
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12" id="profile">
                                <label>Name</label>
                                <input type="text" name="name" value="{{Auth::user()->name}}" id="profile" class="form-control">
                                    @if($errors->has('name'))
                                    <code>{{$errors->first('name')}}</code>
                                    @endif
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Phone</label>
                                <input type="tel" name="phone" id="profile" value="{{Auth::user()->phone}}" class="form-control">
                                    @if($errors->has('phone'))
                                    <code>{{$errors->first('phone')}}</code>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    <button id="profile" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#edit-user-info">
                        Change
                    </button>
                    <div class="modal fade" id="edit-user-info" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure to edit profile info?
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



    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-12 mt-4">
            <div class="card">
                <form id="email" method="POST" action="{{route('profile.updateEmail')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4>Edit Email</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Old Email</label>
                                <input id="email" type="email" class="form-control" name="current_email" value="{{Auth::user()->email}}">
                                @if($errors->has('current_email'))
                                    <code>{{$errors->first('current_email')}}</code>
                                @endif
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>New Email</label>
                                <input id="email" type="email" name="email" class="form-control">
                                @if($errors->has('email'))
                                    <code>{{$errors->first('email')}}</code>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button id="email" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#edit-user-email">
                            Change
                        </button>
                        <div class="modal fade" id="edit-user-email" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to edit profile email?
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
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-12 mt-4">
            <div class="card">
                <form id="pwd" method="POST" action="{{route('profile.updatePassword')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4>Edit Password</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Current Password</label>
                                <input  id="pwd" type="password" name="current_password" class="form-control">
                                @if($errors->has('current_password'))
                                    <code>{{$errors->first('current_password')}}</code>
                                @endif

                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>New Password</label>
                                <input  id="pwd" type="password"  name="password" class="form-control">
                                @if($errors->has('password'))
                                    <code>{{$errors->first('password')}}</code>
                                @endif
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Confirm Password</label>
                                <input  id="pwd" type="password"  name="password_confirmation" class="form-control">
                                @if($errors->has('password_confirmation'))
                                    <code>{{$errors->first('password_confirmation')}}</code>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button id="pwd" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#edit-user-email">
                            Change
                        </button>
                        <div class="modal fade" id="edit-user-email" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to edit profile password?
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
