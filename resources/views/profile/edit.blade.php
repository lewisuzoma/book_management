@extends('layouts.app')

@section('content')

<div class="container mx-auto my-5 p-5">
	<div class="w-full mx-2 h-64">
	    <!-- Update user form Section -->
	    <div class="bg-white p-3 shadow-sm rounded-sm">
	        <div class="text-gray-700">
	            <div class="grid md:grid-cols-2 text-sm">
	                <div class="grid grid-cols-2 gap-8">
	                    <div class="image overflow-hidden flex items-center">
	                        <img class="h-auto w-full mx-auto"
	                            src="{{ (!empty($user->profile_photo)) ? asset('profile_photo/'. $user->profile_photo) : 'https://thumbs.dreamstime.com/b/businessman-icon-vector-male-avatar-profile-image-profile-businessman-icon-vector-male-avatar-profile-image-182095609.jpg' }}"
	                            alt="" />
	                    </div>
	                   <div class="px-4 py-2 font-semibold">
	                   		 <form class="space-x-6 mb-5" method="POST" enctype="multipart/form-data" action="/profile/{{$user->id}}">
                            @csrf
                            @method('PUT')
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
                            <span class="text-xs text-gray-900">Change name</span>
                            <input type="text" name="name" class="block bg-gray-50 border-gray-600 text-gray-900 text-sm rounded-lg shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400" value="{{$user->name}}" required>
                          </label>

                          <label class="block">
                            <span class="text-xs text-gray-900">Change email</span>
                            <input type="email" name="email" class="block bg-gray-50 border-gray-600 text-gray-900 text-sm rounded-lg shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400" value="{{$user->email}}" required>
                          </label>

                          <label class="block text-center">
                                <button type="submit" class="block bg-blue-400 mt-2 py-1 px-2 rounded text-white text-center text-sm">
                                    Update Profile
                                </button>
                            </label>
                        </form>
	                   </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- End update user form section -->

	    <div class="my-4"></div>

	</div>
</div>
@endsection