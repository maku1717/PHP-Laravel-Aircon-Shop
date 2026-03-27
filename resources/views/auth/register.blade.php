<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Aircon Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body >
{{-- resources/views/auth/register.blade.php --}}

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Aircon Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    @include('layouts.navbar')

```
<div class="bg-blue-50 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">

        <!-- TITLE -->
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">
            Create Account
        </h2>

        <!-- ERROR DISPLAY -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM -->
        <form method="POST" action="{{ route('register') }}" autocomplete="off">
            @csrf

            <!-- NAME -->
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input
                    type="text"
                    name="name"
                    value=""
                    required
                    autocomplete="off"
                    class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300"
                >
            </div>

            <!-- EMAIL -->
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input
                    type="email"
                    name="email"
                    value=""
                    required
                    autocomplete="off"
                    class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300"
                >
            </div>

            <!-- PHONE -->
            <div class="mb-4">
                <label class="block text-gray-700">Phone Number</label>
                <input
                    type="text"
                    name="number"
                    value=""
                    required
                    autocomplete="off"
                    class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300"
                >
            </div>

            <!-- PASSWORD -->
            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
                <input
                    type="password"
                    name="password"
                    value=""
                    required
                    autocomplete="new-password"
                    class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300"
                >
            </div>

            <!-- CONFIRM PASSWORD -->
            <div class="mb-4">
                <label class="block text-gray-700">Confirm Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    value=""
                    required
                    autocomplete="new-password"
                    class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300"
                >
            </div>

            <!-- BUTTON -->
            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Register
            </button>

        </form>

        <!-- LOGIN LINK -->
        <p class="mt-4 text-center text-sm">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                Login
            </a>
        </p>

    </div>
</div>
```

</body>
</html>

</body>
</html>
