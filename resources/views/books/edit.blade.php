@extends('layouts.app')

@section('content')
	<div class="m-auto w-4/8 py-8">
		<div class="text-center">
			<h1 class="text-5xl uppercase bold"> Update Book</h1>
		</div>
	</div>

	<div class="flex justify-center pt-20">
		
		<form action="/books/{{$book->id}}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			@if($errors->any())
			<div class="w-4/8 m-auto text-center">
				@foreach($errors->all() as $error)
				<li class="text-red-500 list-none">
					{{ $error }}
				</li>
				@endforeach
			</div>
			@endif
			<div class="block">
				<input type="file" name="image" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400">
				
				<input type="text" name="title" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400" value="{{ $book->title }}">

				<input type="text" name="isbn" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400" value="{{ $book->isbn }}">

				<textarea name="description" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400">{{ $book->description }}</textarea>

				<input type="text" name="revision_number" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400" value="{{ $book->revision_number }}">

				<span><small class="text-gray-300">{{ $book->published_date }}</small></span>
				<input type="date" name="published_date" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400">

				<input type="text" name="publisher" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400" value="{{ $book->publisher }}">

				<input type="text" name="author" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400" value="{{ $book->author }}">

				<button type="submit" class="bg-blue-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
					Submit
				</button>
				
			</div>
		</form>
	</div>
@endsection