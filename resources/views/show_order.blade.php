<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Order</title>
</head>

<body>
    <p>ID : {{ $order->id }}</p>
    <p>user : {{ $order->user->name }}</p>
    @foreach ($order->transactions as $transaction)
        <p>Nama produk : {{ $transaction->product->name }}</p>
        <p>Amount : {{ $transaction->amount }}</p>
    @endforeach
</body>

</html>
