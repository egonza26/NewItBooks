@extends('layouts.app')
@section('content')

@include('partials.meta-dynamic')

<main>
	<article>

		<div class="col-sm-12 text-center">
			@if ($blog->photo)
				<img class="img-responsive featured_image" src="/images/{{ $blog->photo ? $blog->photo->photo : '' }}" alt="{{ str_limit($blog->title, 50) }}">
			@endif		
		</div>

		<div class="jumbotron">
			<div class="row">
				<div class="col-sm-8">
					<h1>{{ $blog->title }}</h1>
				</div>
			</div>
			<div class="row">
				<a href="{{ action('BlogController@edit', [$blog->id]) }}" style="float:right; margin-right: 100px;">Edit</a>		
			</div>
		</div>
		<div class="container-fluid">
			<div class="col-sm-8 col-sm-offset-2">
				<p>{!! $blog->body !!}</p>
				@foreach ($blog->category as $category)
					<p><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></p>
				@endforeach			
			</div>
		</div>	
	</article>
</main>

@endsection
