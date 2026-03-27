<!DOCTYPE html>
<html>
<head>
    <title>Admin Orders</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

<h1 class="text-3xl font-bold mb-6">📦 Orders</h1>

@foreach($orders as $order)
<div class="bg-white p-6 rounded-xl shadow mb-6">

    <div class="flex justify-between mb-4">
        <div>
            <h2 class="font-bold">Customer: {{ $order->user->name }}</h2>
            <p>Status: <span class="text-blue-600">{{ $order->status }}</span></p>
        </div>
        <div class="text-right font-bold">
            ₱{{ number_format($order->total, 2) }}
        </div>
    </div>

    <div class="border-t pt-4">
        @foreach($order->items as $item)
        <div class="flex justify-between text-sm mb-2">
            <span>{{ $item->product->name }} (x{{ $item->quantity }})</span>
            <span>₱{{ number_format($item->price * $item->quantity, 2) }}</span>
        </div>
        @endforeach
    </div>

</div>
@endforeach

</body>
</html>
