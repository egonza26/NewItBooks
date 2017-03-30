@extends('layouts.app')
@section('content')

<main>
	<div class="jumbotron">
		<h1>Create a Category</h1>
	</div>
	<div></div>
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2">
			{!! Form::open(['method' => 'POST', 'action' => 'CategoryController@store']) !!}
				<div class="form-group">
					{!! Form::label("name", "Name:") !!}
			    	{!! Form::text("name", null, ['class' => 'form-control']) !!}
				</div>
			    <div class="form-group">
			    	{!! Form::submit("Create a Category", ['class' => 'btn btn-primary']) !!}
			    </div>
			{!! Form::close() !!}
		</div>
	</div>
</main>

@endsection
