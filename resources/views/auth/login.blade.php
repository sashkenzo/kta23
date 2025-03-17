@extends('layouts.master')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="card mb-3">
            <div class="card-body">
                <div class="row mb-7">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col">
                        <input type="email" class="form-control" id="email" name="email">
                        @if($errors->has('email'))
                            <code>{{$errors->first('email')}}</code>
                        @endif
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col">
                            <input type="password" class="form-control" id="password" name="password">
                            @if($errors->has('password'))
                                <code>{{$errors->first('password')}}</code>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </div>
        </div>
    </form>
@endsection
