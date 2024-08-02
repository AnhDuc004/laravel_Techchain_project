@extends('admin.layouts.master')

@section('title')
    Detail User : {{ $model->fullname }}
@endsection

@section('content')
    <table class="table">
        <tr>
            <th>Full Name</th>
            <th>Gmail</th>
            <th>Avatar</th>
            <th>Role</th>
        </tr>

        <tr>
            <td>{{ $model->username }}</td>
            <td>{{ $model->email }}</td>
            <td> <img src="{{ asset('/storage/' . $model->avatar) }}" style="border-radius: 10px " width="50px"></td>
            <td>{{ $model->role }}</td>
        </tr>

    </table>
@endsection
