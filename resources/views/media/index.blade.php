@extends('layouts.app')
@section('content')

<main>
	<div class="jumbotron">
		<h1>Featured Images</h1>
	</div>
	<div class="container img-container">
		<div class="col-sm-11 col-sm-offset-1">
			@foreach ($photos as $photo)
				<li>
					<img height="100" src="/images/{{ $photo->photo }}" alt="">
					{{ Form::open(['method' => 'Delete', 'action' => ['PhotosController@destroy', $photo->id]]) }}
						{!! Form::submit("Delete Photo", ['class' => 'btn btn-danger']) !!}
					{{ Form::close()}}
				</li>
			@endforeach	
		</div>
		
	</div>
</main>

@endsection
