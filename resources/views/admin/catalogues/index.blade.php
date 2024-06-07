@extends('admin.layouts.master')

@section('title')
    List Catalogues
@endsection

@section('content')


    <a href="{{ route('admin.catalogues.create')}}" class="btn btn-primary mb-3" style="width: 80px">Add New</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Cover</th>
            <th>Is_active</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Action</th>
        </tr>


        @foreach($data as $item)
        
        
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <img src="{{ \Storage::url($item->cover) }}" alt="" width="50px">
            </td>
            <td>{!! $item->is_active ?
             '<span class="badge bg-primary">YES</span>' : 
             '<span class="badge bg-danger">NO</span>'
                 !!}</td>
            <td>{{ $item->created_at }}</th>
            <td>{{ $item->updated_at }}</td>
            <td>
                <a href="{{ route('admin.catalogues.show', $item->id)}}" class="btn btn-info mb-3" style="width: 80px">Detail</a>
                <a href="{{ route('admin.catalogues.edit', $item->id)}}" class="btn btn-warning mb-3" style="width: 80px">Edit</a>
                <a href="{{ route('admin.catalogues.destroy', $item->id)}}" 
                    onclick="return confirm('Are you sure?')"
                    class="btn btn-danger mb-3" style="width: 80px">Delete</a>
                

            </td>
        </tr>
        @endforeach
    </table>

    {{$data->links()}}
@endsection