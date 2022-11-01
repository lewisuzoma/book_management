@extends('layouts.app')

@section('content')
	<div class="container m-auto w-4/5 py-24">
		<div class="text-center mb-8">
			<h1 class="text-5xl uppercase bold">Books</h1>
		</div>
@if(Auth::user() && Auth::user()->role_id == 1)
	<div class="pt-10">
		<a href="books/create" class="border-b-2 pb-2 border-dotted italic text-blue-700"> Add a new book</a>
	</div>
@endif
		<div class="container w-full py-10">
			<div class="grid gap-6 md:grid-cols-3">
				@foreach ($books as $book)
					<div class="max-w-sm rounded overflow-hidden shadow-lg bg-white sm:w-full">
					  <img class="w-full" src="{{asset('images/'. $book->image_path)}}" alt="" style="height:300px;">
					  <div class="px-6 py-4">
					    <div class="font-bold text-xl mb-2 hover:text-gray-400"><a href="/books/{{ $book->id }}">{{ $book->title }}</a> 
						</div>
						<span class="bg-green-100 text-green-800 text-xs font-semibold inline-flex items-center px-2.5 py-0.5 mb-2 rounded dark:bg-green-200 dark:text-green-900">
							<svg class="mr-1 w-3 h-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M19 20H17.1717L12.7072 15.5354C12.3166 15.1449 11.6835 15.1449 11.2929 15.5354L6.82843 20L5 20V7C5 5.34315 6.34315 4 8 4H16C17.6569 4 19 5.34314 19 7V20ZM17 7C17 6.44772 16.5523 6 16 6H8C7.44772 6 7 6.44772 7 7V17L9.87873 14.1212C11.0503 12.9497 12.9498 12.9497 14.1214 14.1212L17 16.9999V7Z" fill="currentColor"></path></svg>
							{{ $book->genre->name }}
						</span>
					    <p class="text-gray-700 text-base">
					      
					    {{ \Illuminate\Support\Str::limit($book->description, 50, $end='...') }}
					    </p>
					  </div>
					  <div class="px-3 pt-4 pb-2">
					    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $book->author }}</span>
					  </div>
					  @if(isset(Auth::user()->id) && Auth::user()->id == $book->user_id)
						  <div class="px-5 pt-2 pb-3 inline-block">
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
					  @endif
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection