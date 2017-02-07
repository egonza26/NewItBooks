@extends('layouts.app')
@section('content')

<main>
	<article>
		<div class="jumbotron">
			<h1>{{ $blog->title }}</h1>
		</div>
		<div class="container-fluid">
			<div class="col-sm-8 col-sm-offset-2">
				<p>{{ $blog->body }}</p>
			</div>
		</div>	
	</article>
</main>

@endsection
