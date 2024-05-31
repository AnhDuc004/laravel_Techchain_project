<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show {{ $category->name}}</title>
</head>
<body>
    <ul>
        @foreach($category->toArray() as $column => $value)
            <li>{{ $column }}: {{ $value }}</li>
        @endforeach
    </ul>
</body>
</html>