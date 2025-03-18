@extends('layouts.master')
@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('dashboard.components.sidemenu')
            <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                </div>
                <div class="container">
                @yield('section')
                </div>
            </main>
        </div>
    </div>

@endsection
