@extends('layouts.app')
@section('content')

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
			@endforeach
		</div>
	</div>
</main>

@endsection
