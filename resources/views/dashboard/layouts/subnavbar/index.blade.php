@extends('dashboard.components.master')
@section('page')
<h1 class="h2">Subcategory for category's in Navigation</h1>
@endsection
@section('section')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            @if (session('status'))
                <div class="alert alert-{{session('success')}}">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-outline-success" href="{{route('change.subnavs.create')}}">Create</a>
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
