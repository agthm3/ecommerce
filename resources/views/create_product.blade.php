<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
</head>

<body>

</body>
<form action="{{ route('store_product') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <br>
    <input type="text" name="description" placeholder="Description">
    <br>
    <input type="text" name="price" placeholder="Price">
    <br>
    <input type="text" name="stock" placeholder="Stock">
    <br>
    <input type="file" name="image">
    <button type="submit">Submit Image</button>
</form>

</html>
