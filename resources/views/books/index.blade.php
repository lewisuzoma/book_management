@extends('layouts.app')

@section('content')
	<div class="m-auto w-4/5 py-24">
		<div class="text-center mb-8">
			<h1 class="text-5xl uppercase bold">Books</h1>
		</div>
	
	<div class="pt-10">
		<a href="books/create" class="border-b-2 pb-2 border-dotted italic text-blue-700"> Add a new book</a>
	</div>

		<div class="w-full py-10">
			<div class="grid grid-cols-3 gap-6">
				@foreach ($books as $book)
					<div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
					  <img class="w-full" src="{{asset('images/'. $book->image_path)}}" alt="" style="height:300px;">
					  <div class="px-6 py-4">
					    <div class="font-bold text-xl mb-2 hover:text-gray-400"><a href="/books/{{ $book->id }}">{{ $book->title }}</a></div>
					    <p class="text-gray-700 text-base">
					      {{ $book->description }}
					    </p>
					  </div>
					  <div class="px-3 pt-4 pb-2">
					    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $book->author }}</span>
					    <!-- <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">genre</span> -->

					  </div>
					  <div class="px-6 pt-4 pb-2 inline-block">
					  	<span>
					  		<a href="/books/{{$book->id}}/edit" class="text-lg text-blue-700 mr-2 mb-2">Edit</a>
					  	</span>

					  	<form action="/books/{{$book->id}}" method="POST" class="float-right">
							@csrf
							@method('delete')
							<button type="submit" class="text-lg text-red-700">
								Delete
							</button>
						</form>
					  </div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection