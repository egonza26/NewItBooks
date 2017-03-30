@extends('layouts.app')
@section('content')

<main>
	<div class="jumbotron">
		<h1>Blog Categories</h1>
	</div>
	<div class="container">
		<div class="col-sm-11 col-sm-offset-1">
			@foreach ($categories as $category)
				@if ($category->blog->count() > 0)
					<h3><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></h3>
					<hr>
				@endif
			@endforeach	
		</div>
		
	</div>
</main>

@endsection
