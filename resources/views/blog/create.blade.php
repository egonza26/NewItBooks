@extends('layouts.app')
@section('content')

<main>
	<div class="jumbotron">
		<h1>Create a blog post</h1>
	</div>
	<div></div>
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2">
			{!! Form::open(['method' => 'POST', 'action' => 'BlogController@store']) !!}
				<div class="form-group">
					{!! Form::label("title", "Title:") !!}
			    	{!! Form::text("title", null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label("body", "Body:") !!}
					{!! Form::textarea("body", null, ['class' => 'form-control']) !!}
				</div>
			    <div class="form-group">
			    	{!! Form::submit("Create a Blog", ['class' => 'btn btn-primary']) !!}
			    </div>
			{!! Form::close() !!}
		</div>
	</div>
</main>

@endsection
