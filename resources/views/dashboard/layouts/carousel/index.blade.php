@extends('dashboard.components.master')
@section('page')
<h1 class="h2">Carousel</h1>
@endsection
@section('section')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-outline-success" href="{{route('change.carousel.create')}}">Create</a>
                </div>
                <div class="card-body">
                    {{$dataTable->table()}}
                </div>
            </div>
        </div>
    </div
@endsection

@push('scripts')
{{$dataTable->scripts(attributes:['type'=>'module'])}}

@endpush
