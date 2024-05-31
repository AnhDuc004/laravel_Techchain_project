<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Category</title>
</head>
<body>
    <h1>Add Category</h1>
    <form action="{{ route('categories.store') }}" method="post">
        @csrf

        <label for="name">Name</label>
        <input type="text" name="name" id="name">

        <button type="submit">Save</button>
    </form>
</body>
</html>