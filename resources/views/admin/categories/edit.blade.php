  @extends('layouts.admin')


@section('content')

	<h1>Edit Categories</h1>

	<div class="container">


		{!! Form::model($category, ['method' => 'PATCH', 'action' => ['AdminPostsCategories@update', $category->id], 'files' => true]) !!}

		<div class="form-grup">

			{!! Form::label('name', 'Name') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}

		</div>

 
		<div class="form-group">

			{!! Form::submit('Update Category', ['class' => 'btn btn-primary']) !!}

		</div>

		{!! Form::close() !!}


	</div>


	{!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsCategories@destroy', $category->id]]) !!}

	<div class="form-group">

		{!! Form::submit('Delete Category', ['class' => 'btn btn-danger']) !!}

	</div>

	{!! Form::close() !!}





@stop