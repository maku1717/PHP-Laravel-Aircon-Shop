{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aircon Services & Sales</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    @include('layouts.navbar')

{{-- resources/views/auth/login.blade.php --}}

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aircon Services & Sales</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>


```
<div class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">

        <!-- HEADER -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-blue-600">Aircon Services & Sales</h1>
            <p class="text-gray-500 mt-2">Sign in to continue</p>
        </div>

        <!-- SESSION ERROR -->
        @if(session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- LOGIN FORM -->
        <form method="POST" action="{{ route('login') }}" autocomplete="off">
            @csrf

            <!-- EMAIL -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">
                    Email
                </label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value=""
                    required
                    autofocus
                    autocomplete="off"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                >

                @error('email')
                    <span class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">
                    Password
                </label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    value=""
                    required
                    autocomplete="new-password"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror"
                >

                @error('password')
                    <span class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- REMEMBER ME -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-gray-700 text-sm">
                    Remember Me
                </label>
            </div>

            <!-- LOGIN BUTTON -->
            <div>
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Login
                </button>
            </div>

            <!-- REGISTER LINK -->
            <div class="mt-6 text-center">
                <p class="text-gray-600 text-sm">
                    Don't have an account?
                    <a href="{{ route('register') }}"
                       class="text-blue-600 font-medium hover:underline">
                        Sign Up
                    </a>
                </p>
            </div>

        </form>

    </div>
</div>
```

</body>
</html>

</div>
</body>
</html>
