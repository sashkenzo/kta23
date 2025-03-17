@extends('dashboard.components.master')


@section('section')

    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <form method="POST" action="{{route('profile.edit')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input name="email" type="email" class="form-control" value="{{$user->email}}" required>
                                @if($errors->has('email'))
                                    <code>{{$errors->first('email')}}</code>
                                @endif
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Confirm Email</label>
                                <input name="email_confirmation" type="email" class="form-control" value="">
                                @if($errors->has('email_confirmation'))
                                    <code>{{$errors->first('email_confirmation')}}</code>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Phone</label>
                                <input name="phone" type="tel" class="form-control" value="{{$user->phone}}">
                                @if($errors->has('phone'))
                                    <code>{{$errors->first('phone')}}</code>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-outline-success">Save Changes</button>
                    </div>

                </form>
@endsection
