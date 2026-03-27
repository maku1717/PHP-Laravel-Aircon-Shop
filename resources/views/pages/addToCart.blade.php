<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

@include('layouts.navbar')

<!-- ================= CART PAGE ================= -->
<section class="py-10">
    <div class="max-w-7xl mx-auto px-6">

        <h1 class="text-2xl md:text-3xl font-bold mb-8 text-gray-800">
            Your Cart
        </h1>

        <div class="grid lg:grid-cols-3 gap-8">

            <!-- ================= CART ITEMS ================= -->
            <div class="lg:col-span-2 space-y-6">

                @forelse($cartItems as $item)
                <div class="bg-white rounded-xl shadow p-4 flex flex-col sm:flex-row gap-4 items-center">

                    <!-- IMAGE -->
                    <img src="{{ $item->product->image }}" class="w-28 h-28 object-cover rounded-lg">

                    <!-- DETAILS -->
                    <div class="flex-1 text-center sm:text-left">
                        <h2 class="font-semibold text-lg">
                            {{ $item->product->name }}
                        </h2>

                        <p class="text-blue-600 font-bold mt-1">
                            ₱{{ number_format($item->product->price, 2) }}
                        </p>
                    </div>

               <!-- QUANTITY -->
<div class="flex items-center gap-2">

    <!-- DECREASE -->
    <form action="{{ route('cart.decrease', $item->product->id) }}" method="POST">
        @csrf
        <button type="submit" class="bg-gray-200 px-3 py-1 rounded">-</button>
    </form>

    <span class="px-3">{{ $item->quantity }}</span>

    <!-- INCREASE -->
    <form action="{{ route('cart.increase', $item->product->id) }}" method="POST">
        @csrf
        <button type="submit" class="bg-gray-200 px-3 py-1 rounded">+</button>
    </form>

</div>

                    <!-- SUBTOTAL -->
                    <div class="text-right">
                        <p class="font-bold text-gray-800">
                            ₱{{ number_format($item->product->price * $item->quantity, 2) }}
                        </p>

                      <form action="{{ route('cart.remove', $item->product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-500 text-sm hover:underline mt-2">
                         Remove
                        </button>
</form>
                    </div>

                </div>
                @empty
                <div class="bg-white p-10 rounded-xl shadow text-center">
                    <p class="text-gray-500">Your cart is empty 😢</p>
                </div>
                @endforelse

            </div>

            <!-- ================= SUMMARY ================= -->
            <div class="bg-white rounded-xl shadow p-6 h-fit">

                <h2 class="text-xl font-bold mb-4">
                    Order Summary
                </h2>

                <div class="space-y-3 text-gray-700">
                    <div class="flex justify-between">
                        <span>Subtotal</span>
                        <span>₱{{ number_format($subtotal, 2) }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Shipping</span>
                        <span>₱0.00</span>
                    </div>

                    <div class="border-t pt-3 flex justify-between font-bold text-lg">
                        <span>Total</span>
                        <span class="text-blue-600">₱{{ number_format($subtotal, 2) }}</span>
                    </div>
                </div>

                <!-- CHECKOUT BUTTON -->
               <form action="{{ route('checkout.paymongo') }}" method="POST">
                @csrf
                <button class="mt-6 w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
                Pay with GCash
                </button>
                </form>

                <!-- CONTINUE SHOPPING -->
                <a href="{{ route('products') }}"
                   class="block mt-4 text-center text-blue-600 hover:underline">
                    ← Continue Shopping
                </a>

            </div>

        </div>

    </div>
</section>

@include('layouts.footer')

</body>
</html>
