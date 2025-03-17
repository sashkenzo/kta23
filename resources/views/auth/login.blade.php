@extends('layouts.master')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="container align-items-center">
        <div class="card">
            <div class="card-header">
                <h4>Login</h4>
            </div>
            <div class="card-body">
                        <div class="row mb-3">
                            <div class="form-group col-md-3">
                                <label for="email" class="col-form-label">Email</label>
                            </div>
                            <div class="form-group col-md-9">
                                <input name="email" type="email" id="email" class="form-control">
                                @if($errors->has('email'))
                                    <code>{{$errors->first('email')}}</code>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-group col-md-3">
                                <label for="password" class="col-form-label">Password</label>
                            </div>
                            <div class="form-group col-md-9">
                                <input name="password" type="password" id="password" class="form-control" aria-describedby="passwordHelpInline">
                                @if($errors->has('password'))
                                    <code>{{$errors->first('password')}}</code>
                                @endif
                            </div>
                        </div>
                    <button style="float: right;" type="submit" class="btn btn-primary ">Sign in</button>
                </div>
            </div>
        </div>
        </div>
    </form>
@endsection

