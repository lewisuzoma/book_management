<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-blue-900 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline hover:text-gray-500">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <nav class="hidden space-x-4 text-gray-300 text-sm sm:text-base md:block">
                    @guest
                    	<a href="{{ url('/') }}" class="{{ (request()->is('/')) ? 'bg-gray-500 text-white font-semibold' : '' }} no-underline py-2 px-4 hover:bg-gray-500">Home</a>
                    	<a href="{{ url('/books') }}" class="{{ (request()->is('/books*')) ? 'bg-gray-500 text-white font-semibold' : '' }} no-underline py-2 px-4 hover:bg-gray-500">Books</a>
                        <a class="{{ (request()->is('/login')) ? 'bg-gray-500 text-white font-semibold' : '' }} no-underline py-2 px-4 hover:bg-gray-500" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="{{ (request()->is('/register')) ? 'bg-gray-500 text-white font-semibold' : '' }} no-underline py-2 px-4 hover:bg-gray-500" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <span><a href="{{ route('home') }}" class="no-underline">{{ Auth::user()->name }}</a></span>

                        <a href="{{ url('/profile') }}" class="{{ (request()->is('/profile*')) ? 'bg-gray-500 text-white font-semibold' : '' }} no-underline py-2 px-4 hover:bg-gray-500">Profile</a>

                        <a href="{{ url('/books') }}" class="{{ (request()->is('/books*')) ? 'bg-gray-500 text-white font-semibold' : '' }} no-underline py-2 px-4 hover:bg-gray-500">Books</a>
                        
                        <a href="{{ route('logout') }}"
                           class="no-underline py-2 px-4 hover:bg-gray-500"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <svg
                            class="w-6 h-6 text-gray-500"
                            x-show="!showMenu"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- mobile menu -->
            <div class="hidden mobile-menu">
                <ul class="">
                    @guest
                        <li class="{{ (request()->is('/')) ? 'bg-gray-500 text-white font-semibold' : '' }}"><a href="{{ url('/') }}" class="block text-sm px-2 py-4 hover:bg-gray-500 transition duration-300">Home</a></li>
                        <li class="{{ (request()->is('books*')) ? 'bg-gray-500 text-white font-semibold' : '' }}"><a href="{{ url('/books') }}" class="block text-sm px-2 py-4 hover:bg-gray-500 transition duration-300">Book</a></li>
                        <li class="{{ (request()->is('login')) ? 'bg-gray-500 text-white font-semibold' : '' }}"><a href="{{ route('login') }}" class="block text-sm px-2 py-4 hover:bg-gray-500 transition duration-300">{{ __('Login') }}</a></li>
                        @if (Route::has('register'))
                        <li class="{{ (request()->is('register')) ? 'bg-gray-500 text-white font-semibold' : '' }}"><a href="{{ route('register') }}" class="block text-sm px-2 py-4 hover:bg-gray-500 transition duration-300">{{ __('Register') }}</a></li>
                    @endif
                    @else
                        <span>{{ Auth::user()->name }}</span>

                        <li><a href="{{ route('logout') }}"
                           class="block text-sm px-2 py-4 no-underline hover:underline hover:bg-gray-500"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </ul>
            </div>
        </header>

        @yield('content')
    </div>
</body>
</html>
