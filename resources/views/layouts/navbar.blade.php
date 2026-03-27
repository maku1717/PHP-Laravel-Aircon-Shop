<nav class="bg-gradient-to-r from-blue-500 via-cyan-400 to-teal-400">
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-3 flex justify-between items-center">

        <!-- Logo -->
        <a href="{{ url('/') }}" class="text-lg md:text-xl font-bold">
            ❄️ CoolBreeze Aircon
        </a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center space-x-6">
            <a href="{{ route('home') }}" class="hover:text-yellow-300">Home</a>
            {{-- <a href="#" class="hover:text-yellow-300">Services</a> --}}
            <a href="{{ route('products') }}" class="hover:text-yellow-300">Products</a>

            @auth
                <a href="{{ route('cart.index') }}" class="hover:text-yellow-300">My Cart</a>

                {{-- ✅ ADMIN ONLY --}}
                 @if(auth()->user()->is_admin)
                <a href="{{ route('admin.orders') }}" class="hover:text-yellow-300">
                 Orders
                </a>
                @endif

                <span class="font-semibold">Hi, {{ auth()->user()->name }}</span>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-red-300">Logout</button>
                </form>


            @else
                <a href="{{ route('login') }}" class="hover:text-yellow-300">Login</a>
                <a href="{{ route('register') }}" class="hover:text-yellow-300">Register</a>
            @endauth
        </div>

        <!-- Mobile Button -->
        <button id="menuBtn" class="md:hidden text-2xl focus:outline-none">
            ☰
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden px-6 pb-4 space-y-3 bg-blue-500">

        <a href="{{ route('home') }}" class="block hover:text-yellow-300">Home</a>
        <a href="#" class="block hover:text-yellow-300">Services</a>
        <a href="{{ route('products') }}" class="block hover:text-yellow-300">Products</a>

        @auth
            <span class="block font-semibold">Hi, {{ auth()->user()->name }}</span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="hover:text-red-300">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block hover:text-yellow-300">Login</a>
            <a href="{{ route('register') }}" class="block hover:text-yellow-300">Register</a>
        @endauth

    </div>
</nav>

<!-- SCRIPT -->
<script>
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
