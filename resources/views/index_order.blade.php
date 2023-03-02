<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Order</title>
</head>

<body>
    @foreach ($orders as $order)
        <p>ID : {{ $order->id }}</p>
        <p>User : {{ $order->user->name }}</p>
        <p>{{ $order->created_at }}</p>
        <form action="{{ route('show_order', $order->id) }}" method="get">
            <button type="submit">Lihat</button>
        </form>
    @endforeach
</body>

</html>
