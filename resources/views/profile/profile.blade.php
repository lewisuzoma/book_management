@extends('layouts.app')

@section('content')

<div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto"
                            src="{{ (!empty(Auth::user()->profile_photo)) ? asset('profile_photo/'. Auth::user()->profile_photo) : 'https://thumbs.dreamstime.com/b/businessman-icon-vector-male-avatar-profile-image-profile-businessman-icon-vector-male-avatar-profile-image-182095609.jpg' }}"
                            alt="">
                        <form class="space-x-6 mb-5" method="POST" enctype="multipart/form-data" action="/profile/photo/{{Auth::user()->id}}">
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
                            <span class="sr-only text-xs">Choose profile photo</span>
                            <input type="file" class="block w-full text-sm text-slate-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0
                              file:text-sm file:font-semibold
                              file:bg-violet-50 file:text-violet-700
                              hover:file:bg-violet-100 file:border file:border-solid
                            " accept="image/*" name="profile_photo" required />
                          </label>

                          <label class="block text-center">
                                <button type="submit" class="block bg-blue-400 mt-2 py-1 px-2 rounded text-white text-center text-sm">
                                    Change Profile Photo
                                </button>
                            </label>
                        </form>
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1 text-center">{{ Auth::user()->name }}</h1>
                    @if(Auth::user()->role->name == 'Admin')
                        <h3 class="bg-green-500 py-1 px-2 rounded text-white text-center text-sm">Administrator</h3>
                    @else
                        <h3 class="bg-gray-600 py-1 px-2 rounded text-white text-center text-sm">Reader</h3>
                    @endif
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Status</span>
                            <span class="ml-auto"><span
                                    class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                        </li>
                        
                        <li class="flex items-center py-3">
                            <span>Member since </span>
                            <span class="ml-auto"> {{ date('M-d-Y', strtotime(Auth::user()->created_at)) }}</span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
                
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">About</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">First Name</div>
                                <div class="px-4 py-2">{{ explode(" ",Auth::user()->name)[0] }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Last Name</div>
                                <div class="px-4 py-2">{{ explode(" ",Auth::user()->name)[1] }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Gender</div>
                                <div class="px-4 py-2">Male</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Contact No.</div>
                                <div class="px-4 py-2">+2348148591503</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Current Address</div>
                                <div class="px-4 py-2">Null</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Permanant Address</div>
                                <div class="px-4 py-2">Null</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email.</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800 no-underline">{{ Auth::user()->email }}</a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Birthday</div>
                                <div class="px-4 py-2">Feb 06, 1998</div>
                            </div>
                        </div>
                    </div>
                    <button
                        class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Show
                        Full Information</button>
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

            </div>
        </div>
    </div>

@endsection