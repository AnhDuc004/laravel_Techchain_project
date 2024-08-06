@extends('admin.layouts.master')

@section('title')
    Edit User : {{ $model->name }}
@endsection

@section('content')
    <form action="{{ route('admin.users.update', $model->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" value="{{ $model->username }}" id="name"
                        placeholder="Enter name" name="username">
                </div>
                <div class="mb-3 mt-3">
                    <label for="avatar" class="form-label">File:</label>
                    <input type="file" class="form-control" id="avatar" id="fileImage" name="avatar">
                    <img id="img" src="{{ \Storage::url($model->avatar) }}" alt="" width="50px">
                </div>

            </div>

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
@section('script-libs')
    <script>
        var fileImage = document.querySelector('#fileImage');
        var img = document.querySelector('#img');
        fileImage.addEventListener('change', function() {
            e.preventDefault();
            img.src = URL.createObjectURL(this.files[0])
        });
    </script>
@endsection
