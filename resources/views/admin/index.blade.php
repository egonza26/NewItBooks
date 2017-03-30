@extends('layouts.app')
@section('content')

<main>
	<div class="jumbotron">
		<h1>Admin Dashboard</h1>
	</div>

	<div class="admin-blog-table col-sm-12">
		<h1 class="page-header">Recent Blogs</h1>
		<div class="table-responsive">
			<table class="table table-sthiped">
				<thead>
					<tr>
						<th>Blog Title</th>
						<th>Blog Content</th>
						<th>Status</th>
						<th>Settings</th>
					</tr>
					<tbody>
						@foreach ($blog as $blog)
						<tr>
							<td>{{ $blog->title }}</td>
							<td>{{ strip_tags(str_limit($blog->body, 100)) }}</td>
							<td>
								{{ Form::model($blog, ['method' => 'PATCH', 'action' => ['BlogController@publish', $blog->id]]) }}
									{!! Form::select('status', ['0' => 'Draft', '1' => 'Publish'], $blog->status, ['class' => 'btn btn-primary']) !!}</td>
									<td>{{ Form::submit('Save', ['class' => 'btn btn-success']) }}
								{{ Form::close() }}
							</td>
						</tr>
						@endforeach
					</tbody>
				</thead>
			</table>
		</div>
	</div>

	<div class="container-fluid">
		<div class="col-sm-12">
			<div class="buttons-div">
				<button class="btn btn-primary link">
					<a href="{{ url('blog/create') }}">Create Blog</a>
				</button>
				<button class="btn btn-danger link">
					<a href="{{ url('blog/bin') }}">Trashed Blog</a>
				</button>
				<button class="btn btn-success link">
					<a href="{{ url('/media') }}">Featured Images</a>
				</button>
			</div>
		</div>
	</div>

</main>

@endsection
