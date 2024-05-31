<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Category</title>
</head>
<body>
    <h1 style="text-align: center">List Category</h1>
    <a href="{{ route('categories.create')}}">Add Category</a>
    @if(session('msg')) 
        <h2>{{ session('msg') }}</h2>
    @endif
    <table>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>CREATED AT</th>
            <th>UPDATED AT</th>
            <th>ACTION</th>
        </tr>

        @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    <a href="{{ route('categories.show', $item)}}">Show</a>
                    <a href="{{ route('categories.edit', $item)}}">Edit</a>

                    <form action="{{ route('categories.destroy', $item) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" 
                                onclick="return confirm('Chắc chắn xóa không?')" >Delete</button>
                    </form>
                    

                </td>
            </tr>
        @endforeach
    </table>
    {{ $data->links()}}
</body>
</html>