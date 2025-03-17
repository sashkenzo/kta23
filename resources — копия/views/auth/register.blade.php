@extends('layouts.master')

@section('cfsr')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="card mb-3">
            <div class="card-body">
                <div class="row mb-7">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col">
                        <input type="email" class="form-control" id="email" name="email">
                        @if($errors->has('email'))
                            <code>{{$errors->first('email')}}</code>
                        @endif
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col">
                            <input type="password" class="form-control" id="password" name="password">
                            @if($errors->has('password'))
                                <code>{{$errors->first('password')}}</code>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            @if($errors->has('password'))
                                <code>{{$errors->first('password')}}</code>
                            @endif
                        </div>
                    </div>
                    <a href="{{ route('login') }}">'Already registered?'</a>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </div>
    </form>
@endsection
