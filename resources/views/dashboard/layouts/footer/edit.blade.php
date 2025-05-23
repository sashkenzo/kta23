@extends('dashboard.components.master')
@section('page')
<h1 class="h2">Edit item for Footer Row</h1>
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
                    <h4>edit footer row</h4>
                </div>
                <form action="{{route('change.footer.update',$footer->id)}}" method="POST" enctype="multipart/form-data" id="update">
                    @csrf
                    @method('PUT')
                <div class="card-body">
                    <div class="card-body">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{$footer->name}}">
                            @if($errors->has('name'))
                                <code>{{$errors->first('name')}}</code>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Status : {{$footer->status}}</label>
                            <select class="form-control" name="status">
                                <option {{$footer->status == 1 ? 'selected': ''}} value="1">Active</option>
                                <option {{$footer->status == 0 ? 'selected': ''}} value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                </form>
                    <div class="card-footer">
                        <a class="btn btn-outline-dark" href="{{route('change.footer')}}">Back</a>
                        <button form="delete" type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-line">
                        Delete
                    </button>
                    <button form="update" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#create-new-line">
                        Update
                    </button>
                    </div>
                    <div class="modal fade" id="create-new-line" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    confirm update
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                                    <button form="update" type="submit" class="btn btn-outline-success">Accept</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="delete-line" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Confirm delete
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{route('change.footer.delete',$footer->id)}}" method="POST" id="delete">
                                        @csrf
                                        @method('DELETE')
                                    <button form="delete" type="submit" class="btn btn-outline-success">Accept</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
