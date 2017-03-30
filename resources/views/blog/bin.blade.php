@extends('layouts.app')
@section('content')

<main>
	<div class="jumbotron">
		<h1>Deleted blog post</h1>
	</div>
	<div class="container-fluid">
		<div class="col-sm-8 col-sm-offset-2">
			@foreach ($deletedBlogs as $blog)
				<article>
					<h2>{{ $blog->title }}</a></h2>
					<p>{{ $blog->body }}</p>
					{!! Form::open(['method' => 'GET', 'action' => ['BlogController@restore', $blog->id]]) !!}
						<div class="form-group">
							{!! Form::submit("Restore Blog", ['class' => 'btn btn-primary']) !!}
						</div>
					{!! Form::close() !!}

					{!! Form::open(['method' => 'DELETE', 'action' => ['BlogController@destroyBlog', $blog->id]]) !!}
						<div class="form-group">
							{!! Form::submit("Destroy Blog", ['class' => 'btn btn-danger']) !!}
						</div>
					{!! Form::close() !!}
				</article>
			@endforeach
		</div>
	</div>
</main>

@endsection
