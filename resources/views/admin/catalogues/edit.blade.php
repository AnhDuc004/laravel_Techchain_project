@extends('admin.layouts.master')

@section('title')
    Edit Catalogues : {{$model->name}}
@endsection

@section('content')

    <form action="{{ route('admin.catalogues.update', $model->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" value="{{$model->name}}" id="name" placeholder="Enter name" name="name">
                </div>
                <div class="mb-3 mt-3">
                    <label for="cover" class="form-label">File:</label>
                    <input type="file" class="form-control" id="cover" name="cover">
                    <img src="{{ \Storage::url($model->cover) }}" alt="" width="50px">
                </div>
                    
            </div>
            <div class="col-md-6">
                <div class="form-check mb-3">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="1"
                        @if($model->is_active)
                            checked
                        @endif
                         checked name="is_active"> Is Active
                    </label>
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection