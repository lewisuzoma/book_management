@extends('layouts.app')

@section('content')
	<div class="m-auto w-4/5 py-24">
		<div class="text-center mb-8">
			<h1 class="text-5xl uppercase bold">Books</h1>
		</div>
	
	<div class="pt-10">
		<a href="books/create" class="border-b-2 pb-2 border-dotted italic text-blue-700"> Add a new book</a>
	</div>

		<div class="w-5/6 py-10">
			@foreach ($books as $book)
			<div class="m-auto">
				<span class="uppercase text-blue-500 font-bold text-xs italic">
					{{ $book->author }}
				</span>
				<h2 class="text-gray-700 text-5xl hover:text-gray-400">
					<a href="/books/{{ $book->id }}">{{ $book->title }}</a>
				</h2>
				<p class="text-lg text-gray-700 py-6">
					{{ $book->description }}
				</p>
				<div>
					<a href="/books/{{$book->id}}/edit" class="text-lg text-blue-700">Edit</a>
				</div>
				<form action="/books/{{$book->id}}" method="POST">
					@csrf
					@method('delete')
					<button type="submit" class="text-lg text-red-700">
						Delete
					</button>
				</form>
				<hr class="mt-4 mb-8">
			</div>
			@endforeach
		</div>
	</div>
@endsection