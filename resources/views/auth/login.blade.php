@extends('layouts.master')

@section('content')

        <div class="container align-items-center mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Login</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}" id="login">
                    @csrf
                        <div class="row mb-3">
                            <div class="form-group col-md-3">
                                <label for="email" class="col-form-label">Email</label>
                            </div>
                            <div class="form-group col-md-9">
                                <input name="email" type="email" id="email" class="form-control" inputmode="email">
                                @if($errors->has('email'))
                                    <code>{{$errors->first('email')}}</code>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-group col-md-3">
                                <label for="password" class="col-form-label" inputmode="email">Password</label>
                            </div>
                            <div class="form-group col-md-9">
                                <input name="password" type="password" id="password" class="form-control" aria-describedby="passwordHelpInline">
                                @if($errors->has('password'))
                                    <code>{{$errors->first('password')}}</code>
                                @endif
                            </div>
                        </div>
                    <button style="float: right;" type="submit" class="btn btn-primary m-2">Sign in</button>
                </form>
                    <a href="{{ route('register') }}" style="float: right;" class="btn btn-secondary m-2">Register</a>
            <!----TODO add a forgot password backend
                    <a href="#" style="float: right;" type="submit" class="btn btn-outline-warning m-2">Forgot password</a>----->
                </div>
            </div>
        </div>

@endsection

