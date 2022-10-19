<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<!-- <title>{{ config('app_name')}}</title> -->
</head>
<body class="bg-gradient-to-r from-gray-100 to-gray-200">
<div class="header-2">

  <nav class="bg-white py-2 md:py-4">
    <div class="container px-4 mx-auto md:flex md:items-center">

      <div class="flex justify-between items-center">
        <a href="#" class="font-bold text-xl text-indigo-600">BlM</a>
        <button class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden" id="navbar-toggle">
          <i class="fas fa-bars"></i>
        </button>
      </div>

      <div class="hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
        <a href="/" class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded {{(request()->is('')) ? 'bg-indigo-600' : ''}}">Home</a>
        <a href="/books" class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300 {{(request()->is('books*')) ? 'bg-indigo-600' : ''}}">Books</a>
        <a href="#" class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-transparent rounded hover:bg-indigo-100 hover:text-indigo-700 transition-colors duration-300">Login</a>
        <a href="#" class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-solid border-indigo-600 rounded hover:bg-indigo-600 hover:text-white transition-colors duration-300 mt-1 md:mt-0 md:ml-1">Signup</a>
      </div>
    </div>
  </nav>

  <!-- <div class="bg-indigo-100 py-6 md:py-12">
    <div class="container px-4 mx-auto">

      <div class="text-center max-w-2xl mx-auto">
        <h1 class="text-3xl md:text-4xl font-medium mb-2">Get the header you needed for your awesome website.</h1>
        <button class="bg-indigo-600 text-white py-2 px-6 rounded-full text-xl mt-6">Get Started</button>
        <div class="mt-4">
          <img src="//via.placeholder.com/1000x785/fff?text=iMac+Mockup" alt="mockup" class="d-block max-w-full rounded shadow-md">
        </div>
      </div>

    </div>
  </div> -->

</div>
 @yield('content');
</body>
</html>