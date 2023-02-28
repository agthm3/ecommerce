<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
</head>

<body>

    <form action="{{ route('update_product', $product) }}" method="post" enctype="multipart/form-data">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        @method('patch')
        <label for="">Name</label>
        <input type="text" name="name" value="{{ $product->name }}" id="">
        <input type="text" name="description" value="{{ $product->description }}" id="">
        <input type="number" name="price" value="{{ $product->price }}">
        <input type="number" name="stock" value="{{ $product->stock }}">
        <img src="{{ url('storage/' . $product->image) }}" height="100px" alt="">
        <input type="file" name="image">
        <button type="submit">Update Data</button>
    </form>
    <form action="{{ route('show_product', $product) }}">
        <button type="submit">Kembali</button>
    </form>
</body>

</html>
