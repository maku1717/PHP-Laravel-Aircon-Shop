<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aircon Shop Banner</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50">
    @include('layouts.navbar')
    <!-- Hero Image Section -->
<div class="h-[75vh] w-full relative">
    <img
        src="https://www.houseopedia.com/wp-content/uploads/2024/08/No-Ducts-No-Sweat-Finding-the-Right-Ductless-Air-Conditioner-for-Your-Home.jpeg"
        alt="Aircon Banner"
        class="w-full h-full object-cover"
    >

    {{-- <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
        <h1 class="text-white text-4xl md:text-5xl font-bold">
            ❄️ CoolBreeze Aircon Services & Sales
        </h1>
    </div> --}}
</div>

<!-- Banner Section -->
<section class="bg-gray-50 py-20">

    <div class="max-w-7xl mx-auto px-6">

        <!-- Title + Rating -->
        <div class="text-center mb-16">

            {{-- <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                ❄️ CoolBreeze Aircon Services & Sales
            </h1> --}}

            <p class="text-gray-600 text-lg max-w-2xl mx-auto mb-6">
                We sell and service all types of air conditioners for homes and businesses.
                Enjoy professional installation, maintenance, and repair services.
            </p>

            <!-- Rating -->
            <div class="flex justify-center items-center">
                <div class="text-yellow-400 text-2xl">
                    ★★★★★
                </div>
                <span class="ml-3 text-gray-500 text-sm">
                    4.9 / 5 from 120 happy customers
                </span>
            </div>

        </div>

        <!-- Aircon Types -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">

            <!-- Wall Mounted -->
            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl transition">
                <img src="https://cdn-icons-png.flaticon.com/512/1046/1046857.png"
                     class="w-24 mx-auto mb-4" alt="Wall Mounted AC">
                <h3 class="text-blue-600 font-semibold text-lg">Wall Mounted</h3>
                <p class="text-sm text-gray-500 mt-1">Perfect for bedrooms</p>
            </div>

            <!-- Window Type -->
            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl transition">
                <img src="https://cdn-icons-png.flaticon.com/512/2933/2933820.png"
                     class="w-24 mx-auto mb-4" alt="Window Type AC">
                <h3 class="text-blue-600 font-semibold text-lg">Window Type</h3>
                <p class="text-sm text-gray-500 mt-1">Affordable cooling solution</p>
            </div>

            <!-- Portable -->
            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl transition">
                <img src="https://cdn-icons-png.flaticon.com/512/427/427735.png"
                     class="w-24 mx-auto mb-4" alt="Portable AC">
                <h3 class="text-blue-600 font-semibold text-lg">Portable AC</h3>
                <p class="text-sm text-gray-500 mt-1">Easy to move anywhere</p>
            </div>

            <!-- Cassette Type -->
            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl transition">
                <img src="https://cdn-icons-png.flaticon.com/512/1046/1046873.png"
                     class="w-24 mx-auto mb-4" alt="Cassette AC">
                <h3 class="text-blue-600 font-semibold text-lg">Cassette Type</h3>
                <p class="text-sm text-gray-500 mt-1">Ideal for offices</p>
            </div>

        </div>

        <!-- Buttons -->
        <div class="text-center mt-14">

            <a href="#"
               class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold shadow hover:bg-blue-700 mr-4 transition">
                Book Service
            </a>

            <a href="{{ route('products') }}"
               class="border border-blue-600 text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-600 hover:text-white transition">
                View Products
            </a>

        </div>

    </div>

</section>

<!-- Featured Aircon Products -->
<!-- FEATURED PRODUCTS -->
<section class="py-20 bg-gradient-to-b from-gray-100 to-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">
                Featured Air Conditioners
            </h2>
            <p class="text-gray-600">
                Random picks every refresh 🔥
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            @foreach($featuredProducts as $product)
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <img src="{{ $product->image }}"
                     class="w-full h-48 object-cover hover:scale-105 transition">

                <div class="p-5">

                    <h3 class="font-semibold text-gray-800">
                        {{ $product->name }}
                    </h3>

                    <p class="text-blue-600 font-bold mt-2 text-lg">
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

<!-- FAQ Section -->
<section class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-6">

        <!-- Title -->
        <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-12">
            Frequently Asked Questions
        </h2>

        <div class="space-y-6">

            <!-- Question 1 -->
            <details class="bg-blue-50 p-5 rounded-lg shadow cursor-pointer">
                <summary class="font-semibold text-lg text-gray-800">
                    How often should I clean my air conditioner?
                </summary>
                <p class="mt-3 text-gray-600">
                    It is recommended to clean your air conditioner every 3–6 months
                    to maintain good cooling performance and prevent dust buildup.
                </p>
            </details>

            <!-- Question 2 -->
            <details class="bg-blue-50 p-5 rounded-lg shadow cursor-pointer">
                <summary class="font-semibold text-lg text-gray-800">
                    Do you offer aircon installation services?
                </summary>
                <p class="mt-3 text-gray-600">
                    Yes, we provide professional installation services for window,
                    split type, and cassette air conditioners.
                </p>
            </details>

            <!-- Question 3 -->
            <details class="bg-blue-50 p-5 rounded-lg shadow cursor-pointer">
                <summary class="font-semibold text-lg text-gray-800">
                    How long does aircon servicing take?
                </summary>
                <p class="mt-3 text-gray-600">
                    Standard aircon cleaning usually takes around 30 minutes to 1 hour
                    depending on the aircon type and condition.
                </p>
            </details>

            <!-- Question 4 -->
            <details class="bg-blue-50 p-5 rounded-lg shadow cursor-pointer">
                <summary class="font-semibold text-lg text-gray-800">
                    Do you provide warranty for your products?
                </summary>
                <p class="mt-3 text-gray-600">
                    Yes, most of our air conditioners come with a manufacturer warranty
                    and we also provide service guarantees.
                </p>
            </details>

        </div>

    </div>
</section>

@include('layouts.footer')

</body>
</html>
