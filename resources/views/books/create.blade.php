@extends('layouts.app')

@section('content')
	<div class="m-auto w-4/8 py-8">
		<div class="text-center">
			<h1 class="text-5xl uppercase bold"> Create Book</h1>
		</div>
	</div>

	<div class="flex justify-center pt-20">
		
		<form action="/books" method="POST" enctype="multipart/form-data">
			@csrf
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

				<input type="text" name="title" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400" placeholder="Book title...">

				<input type="text" name="isbn" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400" placeholder="ISBN...">

				<textarea name="description" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400" placeholder="Description"></textarea>

				<input type="text" name="revision_number" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400" placeholder="Revision number...">

				<input type="date" name="published_date" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400" placeholder="Published Date...">

				<input type="text" name="publisher" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400" placeholder="Publisher...">

				<input type="text" name="author" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400" placeholder="Author...">

				<button type="submit" class="bg-blue-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
					Submit
				</button>
				
			</div>
		</form>
	</div>
@endsection