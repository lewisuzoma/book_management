@extends('layouts.app')

@section('content')
	<div class="m-auto w-4/5 py-24">
		<div class="text-center">
			<h1 class="text-5xl uppercase bold">Books</h1>
		</div>
	

		<div class="w-5/6 py-18">
			@foreach ($books as $book)
			<div class="m-auto">
				<span class="uppercase text-blue-500 font-bold text-xs italic">
					{{ $book->author }}
				</span>
				<h2 class="text-gray-700 text-5xl">
					{{ $book->title }}
				</h2>
				<p class="text-lg text-gray-700 py-6">
					{{ $book->description }}
				</p>
				<hr class="mt-4 mb-8">
			</div>
			@endforeach;
		</div>
	</div>
@endsection