@extends('layouts.app')
@section('content')

@include('partials.meta-static')

<main>
	<div class="jumbotron">
		<h1>Latest blog post</h1>
	</div>
	<div class="container-fluid">
		<div class="col-sm-8 col-sm-offset-2">
			@foreach ($blogs as $blog)
				<article>
					<h2><a href="{{ action('BlogController@show', [$blog->id]) }}">{{ $blog->title }}</a></h2>
					<p>{{ $blog->body }}</p>
				</article>
				<hr>
			@endforeach
		</div>

	</div>
</main>

@endsection
