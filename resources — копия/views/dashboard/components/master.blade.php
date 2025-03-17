@extends('layouts.master')

@section('cfrs')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('dashboard.components.sidemenu')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>
                @yield('section')

            </main>
        </div>
    </div>

@endsection
