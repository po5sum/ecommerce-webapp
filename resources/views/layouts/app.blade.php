<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>


</head>
<body class="bg-gray-100 font-sans antialiased">
    <div id="app">
        <!-- Navbar -->
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-xl font-semibold text-blue-600">
                Products
            </a>

                <a href="{{ route('cart.index') }}" class="relative inline-block text-gray-700 hover:text-blue-600 mr-2">
                    🛒 <span class="ml-1 font-medium">Cart</span>
                </a>

                <div class="space-x-4">
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium">
                                Login
                            </a>
                        @endif

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600 font-medium">
                                Register
                            </a>
                        @endif
                    @else
                        <span class="text-gray-700 font-medium">
                            {{ Auth::user()->name }}
                        </span>

                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-red-500 font-medium hover:underline">
                                Logout
                            </button>
                        </form>
                    @endguest
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="max-w-7xl mx-auto p-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
