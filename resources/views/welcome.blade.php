<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <header class="py-6">
        <div class="container mx-auto flex justify-between items-center px-6">
            <div>
                <a href="{{ url('/') }}" class="text-3xl font-extrabold tracking-wide text-gray-900 no-underline hover:text-gray-400">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            
            <nav class="space-x-300 text-gray-400 text-sm sm:text-base">
                <ul class="flex">
                    @guest
                    <li><a href="{{ url('/') }}" class="text-sm block px-2 py-4"> Home</a></li>
                    <li><a href="{{ url('/books') }}" class="text-sm block px-2 py-4"> Books</a></li>
                    <li><a href="{{ route('login') }}" class="text-sm block px-2 py-4"> Login</a></li>
                    <li><a href="{{ route('register') }}" class="text-sm block px-2 py-4"> Register</a></li>
                    @endguest
                    @auth
                    <li><a href="{{ url('/') }}" class="text-sm block px-2 py-4"> Home</a></li>
                    <li><a href="{{ url('/books') }}" class="text-sm block px-2 py-4"> Books</a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>
    <!-- Hero Section -->
    <section class="bg-gray-100 dark:bg-gray-900 h-auto mt-10">
        <div class="container flex flex-col-reverse md:flex-row items-center px-6 mx-auto space-y-0 md:space-y-0 md:flex-row">
            <!-- Left Item -->
            <div class="flex flex-col mb-32 space-y-12 md:w-1/2">
                <h3 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Book Library</h3>
                <p class="max-w-2xl mb-6 font-light text-gray-500 leading-normal tracking-wide lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>
                <div class="flex justify-center md:justify-start">
                    <a href="{{ route('register') }}" class="p-3 px-6 pt-2 text-white bg-gray-900 rounded-full baseline hover:bg-gray-500">Get Started</a>
                </div>
            </div>
            <!-- Image -->
            <div class="md:w-1/2 md:flex md:justify-end md:items-start">
                <img src="{{ asset('images/hero-img.png') }}" alt="hero" class="m-0">
            </div>                
        </div>
    </section>
</body>
</html>
