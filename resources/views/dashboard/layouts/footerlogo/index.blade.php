@extends('dashboard.components.master')
@section('page')
<h1 class="h2">Footer Logo</h1>
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
                    <div class="row">
                    <div class="col-3 col-md-3 col-lg-3">
                        <a class="btn btn-outline-success" href="{{route('change.footerlogo.create')}}">Create</a>
                    </div>
                    <div class="col-9 col-md-9 col-lg-9">
                        <label>Will only display latest footer with status "active"</label>
                    </div>
                    </div>
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
