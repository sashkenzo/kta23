@extends('layouts.master')
@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="container align-items-center">
        <div class="card mb-3">
            <div class="card-header">
                <h4>Register</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3 ">
                    <label for="name" class="col-md-3 col-form-label">Name</label>
                    <div class="col col-md-9">
                        <input class="form-control" id="name" name="name">
                        @if($errors->has('name'))
                            <code>{{$errors->first('name')}}</code>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-3 col-form-label">Email</label>
                    <div class="col col-md-9">
                        <input type="email" class="form-control" id="email" name="email">
                        @if($errors->has('email'))
                            <code>{{$errors->first('email')}}</code>
                        @endif
                    </div>
                </div>
                    <div class="row mb-3">
                        <label for="password" class="col-md-3 col-form-label">Password</label>
                        <div class="col col-md-9">
                            <input type="password" class="form-control" id="password" name="password">
                            @if($errors->has('password'))
                                <code>{{$errors->first('password')}}</code>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password_confirmation" class="col-md-3 col-form-label">Confirm Password</label>
                        <div class="col col-md-9">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            @if($errors->has('password'))
                                <code>{{$errors->first('password')}}</code>
                            @endif
                        </div>
                    </div>
                <button style="float: right;" type="submit" class="btn btn-primary">Register</button>
                    <a style="float: left;" href="{{ route('login') }}">'Already registered?'</a>

                </div>
            </div>
        </div>
        </div>
    </form>
@endsection
