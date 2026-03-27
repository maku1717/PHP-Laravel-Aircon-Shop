<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aircon Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

@include('layouts.navbar')

<!-- ================= HERO / ADVERTISEMENT (AUTO CAROUSEL) ================= -->
<section class="py-10 md:py-14 bg-gradient-to-r from-blue-500 via-cyan-400 to-teal-400">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-10">

        <!-- TEXT -->
        <div class="text-center md:text-left">
            <h1 class="text-2xl md:text-4xl font-bold mb-4">
                Stay Cool This Summer
            </h1>
            <p class="mb-6 text-sm md:text-lg">
                Get the best deals on air conditioners and air purifiers.
            </p>
            {{-- <button class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">
                Shop Now
            </button> --}}
        </div>

        <!-- AUTO SLIDER -->
        <div class="relative w-full overflow-hidden rounded-xl shadow-lg">
            <div id="carousel" class="flex transition-transform duration-700">

                <img src="{{ asset('images/brands/sleep_happier-feb2026-1005x390.jpg') }}"
                     class="w-full flex-shrink-0 object-cover">

                <img src="{{ asset('images/brands/coolsummer_1005x390.jpg') }}"
                     class="w-full flex-shrink-0 object-cover">

                <img src="{{ asset('images/brands/1005x390_ab_homepage.jpg') }}"
                     class="w-full flex-shrink-0 object-cover">

            </div>
        </div>

    </div>
</section>

<!-- ================= CATEGORY SECTION ================= -->
{{-- <section class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-xl md:text-2xl font-bold mb-6 text-gray-800">
            Shop by Category
        </h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 md:gap-6 text-center">

            <div class="bg-blue-50 p-4 md:p-6 rounded-xl hover:shadow-lg hover:-translate-y-1 transition cursor-pointer">
                ❄️ Window Type
            </div>

            <div class="bg-blue-50 p-4 md:p-6 rounded-xl hover:shadow-lg hover:-translate-y-1 transition cursor-pointer">
                🧊 Split Type
            </div>

            <div class="bg-blue-50 p-4 md:p-6 rounded-xl hover:shadow-lg hover:-translate-y-1 transition cursor-pointer">
                🏢 Package Type
            </div>

            <div class="bg-blue-50 p-4 md:p-6 rounded-xl hover:shadow-lg hover:-translate-y-1 transition cursor-pointer">
                🌿 Air Purifier
            </div>

            <div class="bg-blue-50 p-4 md:p-6 rounded-xl hover:shadow-lg hover:-translate-y-1 transition cursor-pointer">
                🔥 New Arrival
            </div>

        </div>
    </div>
</section> --}}

<!-- ================= PRODUCTS ================= -->
@foreach($categories as $cat => $products)
<section class="py-10">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-xl md:text-2xl font-bold mb-6 text-gray-800">
            {{ $cat }}
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach($products as $product)
            <div class="bg-white rounded-xl shadow hover:shadow-2xl hover:-translate-y-1 transition overflow-hidden">

                <a href="{{ route('products.show', $product->id) }}" class="block overflow-hidden">
    <img src="{{ $product->image }}"
         class="w-full h-40 md:h-44 object-cover hover:scale-110 transition duration-300">
</a>

                <div class="p-4">
                    <h3 class="font-semibold text-sm md:text-lg">
                        {{ $product->name }}
                    </h3>

                    <p class="text-blue-600 font-bold mt-2 text-sm md:text-lg">
                        ₱{{ number_format($product->price, 2) }}
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
@endforeach

<!-- ================= PROMO ================= -->
<section class="py-10 md:py-14 bg-gradient-to-r from-blue-500 via-cyan-400 to-teal-400">
    <div class="max-w-7xl mx-auto px-6">

        <div class="bg-white/90 backdrop-blur rounded-xl shadow-xl overflow-hidden flex flex-col md:flex-row items-center">

            <img src="{{ asset('images/brands/500x192_snpl.jpg') }}"
                 class="w-full md:w-1/2 h-48 md:h-64 object-cover">

            <div class="p-6 md:p-8 text-center md:text-left">
                <h2 class="text-xl md:text-3xl font-bold text-gray-800 mb-4">
                    Summer Sale Up to 40% OFF ☀️
                </h2>
                <p class="text-gray-700 mb-6 text-sm md:text-base">
                    Upgrade your home with energy-efficient air conditioners at unbeatable prices.
                </p>
                <button class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 shadow-md">
                    Shop Deals
                </button>
            </div>

        </div>

    </div>
</section>

<!-- ================= SHOP BY BRAND (UNCHANGED) ================= -->
<section class="py-14 bg-white">
    <div class="max-w-7xl mx-auto">

        <h2 class="text-2xl font-bold mb-10 text-center text-gray-800">
            Shop by Brand
        </h2>

        <div class="flex justify-center items-center gap-6 md:gap-10 flex-wrap">

            <img src="{{ asset('images/brands/Condura.png') }}" class="h-16 sm:h-20 md:h-24 lg:h-28 xl:h-30 w-auto mb-2 hover:opacity-70 transition">
            <img src="{{ asset('images/brands/Kolin.png') }}" class="h-16 sm:h-20 md:h-24 lg:h-28 xl:h-30 w-auto mb-2 hover:opacity-70 transition">
            <img src="{{ asset('images/brands/Samsung-sb.png') }}" class="h-16 sm:h-20 md:h-24 lg:h-28 xl:h-30 w-auto mb-2 hover:opacity-70 transition">
            <img src="{{ asset('images/brands/LG-sb.png') }}" class="h-16 sm:h-20 md:h-24 lg:h-28 xl:h-30 w-auto mb-2 hover:opacity-70 transition">
            <img src="{{ asset('images/brands/Midea.png') }}" class="h-16 sm:h-20 md:h-24 lg:h-28 xl:h-30 w-auto mb-2 hover:opacity-70 transition">
            <img src="{{ asset('images/brands/Carrier.png') }}" class="h-16 sm:h-20 md:h-24 lg:h-28 xl:h-30 w-auto mb-2 hover:opacity-70 transition">
            <img src="{{ asset('images/brands/Panasonic.png') }}" class="h-16 sm:h-20 md:h-24 lg:h-28 xl:h-30 w-auto mb-2 hover:opacity-70 transition">
            <img src="{{ asset('images/brands/tcl.png') }}" class="h-16 sm:h-20 md:h-24 lg:h-28 xl:h-30 w-auto mb-2 hover:opacity-70 transition">

        </div>

</section>

@include('layouts.footer')

<!-- ================= AUTO CAROUSEL SCRIPT ================= -->
<script>
    let index = 0;
    const carousel = document.getElementById('carousel');
    const totalSlides = carousel.children.length;

    setInterval(() => {
        index = (index + 1) % totalSlides;
        carousel.style.transform = `translateX(-${index * 100}%)`;
    }, 3000); // change every 3 seconds
</script>

</body>
</html>
