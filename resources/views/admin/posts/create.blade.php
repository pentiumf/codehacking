@extends('layouts.admin')


@section('content')

	<h1 class="text-center">Create Posts</h1>

	{!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'files' => true]) !!}

	<div class="form-grup">

		{!! Form::label('title', 'Tile') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}

	</div>

	<div class="form-grup">

		{!! Form::label('category_id', 'Category') !!}
		{!! Form::select('category_id', [ '' => 'Choose cat'] + $categories, null, ['class' => 'form-control']) !!}

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

		{!! Form::submit('Create Post', ['class' => 'btn btn-primary', 'rows'=>3]) !!}

	</div>
	{!! Form::close() !!}


	@include('includes.createError')

@stop