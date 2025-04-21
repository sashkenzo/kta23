
@extends('layouts.master')
@section('content')
    <div class="container my-2">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <h1 class="text-center">{{$catName}}</h1>
                    <div class="card">
                        @foreach($contents as $content)
                <div class="card-header">
                    <h4>{{$content->name}}</h4>
                </div>
                <div class="card-body">
                    <p> {{$content->name}}</p>
                </div>
                        @endforeach
            </div>
        </div>

    </div>
    </div>

@endsection

