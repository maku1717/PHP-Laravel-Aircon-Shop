<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

@include('layouts.navbar')

<!-- ================= PRODUCT DETAILS ================= -->
<section class="py-10">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10">

        <!-- PRODUCT IMAGE -->
        <div class="bg-white rounded-xl shadow p-4">
            <img src="{{ $product->image }}" class="w-full h-80 object-cover rounded-lg">
        </div>

        <!-- PRODUCT INFO -->
        <div class="bg-white rounded-xl shadow p-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                {{ $product->name }}
            </h1>

            <p class="text-blue-600 text-2xl font-bold mt-4">
                ₱{{ number_format($product->price, 2) }}
            </p>

            <p class="text-gray-600 mt-4">
                {{ $product->description ?? 'High-quality energy efficient aircon perfect for your home or office.' }}
            </p>

            <!-- FEATURES -->
            <ul class="mt-6 space-y-2 text-gray-700">
                <li>✔ Energy Efficient</li>
                <li>✔ Fast Cooling Technology</li>
                <li>✔ Quiet Operation</li>
                <li>✔ Warranty Included</li>
            </ul>

            <!-- BUTTONS -->
            <div class="mt-6 flex gap-4">

                <!-- ADD TO CART -->
           @auth
<form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-full">
    @csrf
    <button type="submit"
        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 w-full">
        Add to Cart
    </button>
</form>
@else
<a href="{{ route('login') }}"
   class="block text-center bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 w-full">
    Add to Cart
</a>
@endauth

                <!-- BUY NOW -->
                <button class="bg-gray-200 px-6 py-3 rounded-lg hover:bg-gray-300 w-full">
                    Buy Now
                </button>

            </div>
        </div>

    </div>
</section>

<!-- ================= PROMO SECTION ================= -->
<section class="py-12 bg-gradient-to-r from-blue-600 to-cyan-400 text-white">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between">

        <div>
            <h2 class="text-2xl md:text-3xl font-bold mb-3">
                Summer Cooling Promo
            </h2>
            <p class="mb-4">
                Get up to 30% discount on selected air conditioners.
            </p>
        </div>

        <img src="{{ asset('images/brands/coolsummer_1005x390.jpg') }}"
             class="mt-12 md:mt-0">
    </div>
</section>

<!-- ================= ADS SECTION ================= -->
<section class="py-10">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-6">

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <img src="{{ asset('images/brands/saver3.jpg') }}" class="w-full h-40 object-cover">
            <div class="p-4">
                <h3 class="font-bold">Energy Saver Units</h3>
                <p class="text-sm text-gray-600">Save electricity with inverter tech.</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <img src="{{ asset('images/brands/saver2.webp') }}" class="w-full h-40 object-cover">
            <div class="p-4">
                <h3 class="font-bold">Smart Aircon</h3>
                <p class="text-sm text-gray-600">Control via mobile app.</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <img src="{{ asset('images/brands/saver1.jpg') }}" class="w-full h-40 object-cover">
            <div class="p-4">
                <h3 class="font-bold">Budget Friendly</h3>
                <p class="text-sm text-gray-600">Affordable cooling solutions.</p>
            </div>
        </div>

    </div>
</section>

<!-- ================= RELATED PRODUCTS ================= -->
<section class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-xl md:text-2xl font-bold mb-6 text-gray-800">
            Related Products
        </h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">

            @foreach($relatedProducts as $item)
            <div class="bg-gray-100 rounded-xl shadow hover:shadow-xl hover:-translate-y-1 transition overflow-hidden">

                <!-- IMAGE -->
                <a href="{{ route('products.show', $item->id) }}">
                    <img src="{{ $item->image }}" class="w-full h-40 object-cover">
                </a>

                <div class="p-4">
                    <h3 class="text-sm md:text-base font-semibold">
                        {{ $item->name }}
                    </h3>

                    <p class="text-blue-600 font-bold mt-2">
                        ₱{{ number_format($item->price, 2) }}
                    </p>

               <div class="mt-4 flex gap-2">

    <!-- VIEW PRODUCT -->
    <a href="{{ route('products.show', $product->id) }}"
       class="w-full text-center bg-gray-200 text-gray-800 py-2 rounded-lg hover:bg-gray-300 text-sm">
        View
    </a>

    <!-- ADD TO CART -->
@auth
<form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-full">
    @csrf
    <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 text-sm">
        Add to cart
    </button>
</form>
@else
{{-- <a href="{{ route('login') }}"
   class="w-full block text-center bg-gray-400 text-white py-2 rounded-lg text-sm">
    Login to Add to Cart
</a> --}}
@endauth

</div>
                </div>

            </div>
            @endforeach

        </div>

    </div>
</section>

@include('layouts.footer')

</body>
</html>
