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
    @php
        $total_price = 0;
    @endphp
    @foreach ($order->transactions as $transaction)
        <p>Nama produk : {{ $transaction->product->name }}</p>
        <p>Amount : {{ $transaction->amount }}</p>
        @php
            $total_price = $total_price + $transaction->product->price * $transaction->amount;
        @endphp
    @endforeach
    <p>Total Transaksi ini adalah: Rp{{ number_format($total_price) }}</p>
    @if ($order->is_paid == false && $order->payment_receipt == null)
        <form action="{{ route('submit_payment_receipt', $order) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <label for="">Masukkan Resi</label>
            <input type="file" name="payment_receipt">
            <button type="submit">Kirim Resi</button>
        </form>
    @endif
</body>

</html>
