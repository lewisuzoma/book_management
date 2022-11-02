@extends('layouts.app')

@section('content')

<div class="container flex justify-center mx-auto my-5 p-5">
	<div class="w-5/12  mx-2">
	    <!-- Update user form Section -->
	    <div class="bg-white p-3 shadow-sm rounded-sm">
	        <div class="text-gray-700">
	            <div class="grid text-sm">
	                   
	                   <div class="px-4 py-2 font-semibold">
	                   		 <form class="space-x-6 mb-5" method="POST" enctype="multipart/form-data" action="/profile">
                            @csrf
                            @method('post')
                            @if($errors->any())
                            <div class="w-4/8 m-auto text-center mb-2">
                                @foreach($errors->all() as $error)
                                <li class="text-red-500 list-none text-sm">
                                    {{ $error }}
                                </li>
                                @endforeach
                            </div>
                            @endif
                          <label class="block">
                            <span class="text-xs text-gray-900">Choose profile photo</span>
                            <input type="file" class="block bg-gray-50 border-gray-600 text-gray-900 text-sm rounded-lg shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400
                            " accept="image/*" name="profile_photo" />
                          </label>

                          <label class="block">
                            <span class="text-xs text-gray-900">Enter name</span>
                            <input type="text" name="name" class="block bg-gray-50 border-gray-600 text-gray-900 text-sm rounded-lg shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400" required>
                          </label>

                          <label class="block">
                            <span class="text-xs text-gray-900">Enter email</span>
                            <input type="email" name="email" class="block bg-gray-50 border-gray-600 text-gray-900 text-sm rounded-lg shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400" required>
                          </label>

                          <label class="block">
                            <span class="text-xs text-gray-900">Enter password</span>
                            <input type="password" name="password" class="block bg-gray-50 border-gray-600 text-gray-900 text-sm rounded-lg shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400" required>
                          </label>

                          <label class="block text-center">
                                <button type="submit" class="block bg-blue-400 mt-2 py-1 px-2 rounded text-white text-center text-sm">
                                    Create User
                                </button>
                            </label>
                        </form>
	                   </div>
	            </div>
	        </div>
	    </div>
	    <!-- End update user form section -->

	    <div class="my-4"></div>

	</div>
</div>

@endsection