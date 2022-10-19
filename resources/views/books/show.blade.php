@extends('layouts.app')

@section('content')
	<div class="m-auto w-4/5 py-24">
		<div class="text-center mb-8">
			<h1 class="text-5xl uppercase bold">{{ $book->title }}</h1>
		</div>
	
		<div class="text-center py-10">
			<div class="m-auto">
				<span class="uppercase text-blue-500 font-bold text-xs italic px-5">
					Author: {{ $book->author }}
				</span>
				<span class="uppercase text-blue-500 font-bold text-xs italic">
					Published: {{ $book->published_date }}
				</span>

				<p class="text-lg text-gray-700 py-6">
					{{ $book->description }}
				</p>
				<!--  -->
				<hr class="mt-4 mb-8">
			</div>
		</div>
	</div>
@endsection