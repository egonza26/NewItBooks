@extends('layouts.app')
@section('content')

<main>
	<div class="jumbotron">
		<h1>{{ $category->name }}</h1><a href="{{ action('CategoryController@edit', [$category->id]) }}" style="float:right; margin-right: 100px;">Edit</a>
	</div>
	<div class="container">
		<h2 class="text-center"><strong>Recent Blogs on {{ $category->name }}</strong></h2>
		<hr>
		@foreach ($category->blog as $blog)
			<h3><a href="{{ action('BlogController@show', [$blog->id]) }}">{{ $blog->title }}</a></h3>
		@endforeach
	</div>
</main>

@endsection
