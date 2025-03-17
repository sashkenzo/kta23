@extends('dashboard.components.master')

@section('section')


    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">











                <form method="POST" action="{{route('profile.update')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4>Edit Password</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Current Password</label>
                                <input type="password" name="current_password" type="text" class="form-control">
                                @if($errors->has('current_password'))
                                    <code>{{$errors->first('current_password')}}</code>
                                @endif

                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Confirm Current Password</label>
                                <input type="password"  name="current_password_confirmation" type="text" class="form-control">
                                @if($errors->has('current_password_confirmation'))
                                    <code>{{$errors->first('current_password_confirmation')}}</code>
                                @endif

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>New Password</label>
                                <input type="password"  name="password" type="text" class="form-control">
                                @if($errors->has('password'))
                                    <code>{{$errors->first('password')}}</code>
                                @endif
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Confirm Password</label>
                                <input type="password"  name="password_confirmation" type="text" class="form-control">
                                @if($errors->has('password_confirmation'))
                                    <code>{{$errors->first('password_confirmation')}}</code>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-outline-success">Change Password</button>
                    </div>
                </form>
            </div>
        </div>




@endsection
