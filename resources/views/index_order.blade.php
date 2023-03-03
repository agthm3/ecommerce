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
        @if ($order->is_paid == true)
            <p>Terbayar</p>
        @else
            Belum Bayar

            <a href="{{ url('storage/' . $order->payment_receipt) }}" height="100px" alt="">Lihat resi</a>
            <form action="{{ route('confirm_payment', $order) }}" method="post">
                @csrf
                @method('post')
                <button type="submit" name="is_paid">Konfirmasi</button>
            </form>
        @endif
        <hr>
    @endforeach
</body>

</html>
