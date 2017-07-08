@extends('layouts.admin')


@section('content')

	<h1 class="text-center">Edit Post</h1>

	{!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id],  'files' => true]) !!}

	<div class="form-grup">

		{!! Form::label('title', 'Tile') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}

	</div>

	<div class="form-grup">

		{!! Form::label('category_id', 'Category') !!}
		{!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

	</div>

	<div class="form-grup">

		{!! Form::label('photo_id', 'Photo') !!}
		{!! Form::file('photo_id', null) !!}

	</div>

	<div class="form-grup">

		{!! Form::label('body', 'Description') !!}
		{!! Form::textarea('body', null, ['class' => 'form-control']) !!}

	</div>


	<div class="form-group">

		{!! Form::submit('Update Post', ['class' => 'btn btn-primary', 'rows'=>3]) !!}

	</div>
	{!! Form::close() !!}



	{!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}

	<div class="form-group">

		{!! Form::submit('Delete Post', ['class' => 'btn btn-danger']) !!}

	</div>

	{!! Form::close() !!}


	@include('includes.createError')

@stop 