<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Cart</title>
</head>

<body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    @php
        $total_price = 0;
    @endphp

    @foreach ($carts as $cart)
        <img src="{{ url('/storage' . $cart->product->image) }}" height="100px" alt="">
        <p>Name : {{ $cart->product->name }}</p>
        <p>Amount : {{ $cart->amount }}</p><br>
        <form action="{{ route('update_cart', $cart) }}" method="post">
            @csrf
            @method('patch')
            <input type="number" name="amount" value="{{ $cart->amount }}">
            <button type="submit"> Update Amount</button>
        </form>
        <form action="{{ route('delete_cart', $cart) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit"> Hapus</button>
        </form>
        @php
            $total_price = $total_price + $cart->product->price * $cart->amount;
        @endphp
    @endforeach
    <p>Total Harga Rp{{ number_format($total_price) }}</p>
    <form action="{{ route('index_product') }}">
        <button type="submit">Kembali</button>
    </form>
    <form action="{{ route('checkout') }}" method="post">
        @csrf
        @method('post')
        <button type="submit">Checkout</button>
    </form>
</body>

</html>
