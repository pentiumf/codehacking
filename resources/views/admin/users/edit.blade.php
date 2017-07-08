 @extends('layouts.admin')

@section('content')

	<h1>Edit User</h1>


	<div class="col-sm-3">

		 <img src="/images/{{$user->photo ? $user->photo->file : 'No Photo'}}" class="img-responsive img-rounded">

	</div>



	{!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}





	<div class="form-grup">

		{!! Form::label('name', 'Name') !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}

	</div>

	<div class="form-grup">

		{!! Form::label('email', 'Email') !!}
		{!! Form::email('email', null, ['class' => 'form-control']) !!}

	</div>

	<div class="form-grup">

		{!! Form::label('role_id', 'Role') !!}
		{!! Form::select('role_id', [''=>'Choose Option'] + $roles, null, ['class' => 'form-control']) !!}

	</div>

	<div class="form-grup">

		{!! Form::label('is_active', 'Status') !!}
		{!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class' => 'form-control']) !!}

	</div>

	<div class="form-grup">

		{!! Form::label('photo_id', 'Photo') !!}
		{!! Form::file('photo_id', null, ['class' => 'form-control']) !!}

	</div>

	<div class="form-grup">

		{!! Form::label('password', 'Password') !!}
		{!! Form::password('password', ['class' => 'form-control']) !!}

	</div>



	<div class="form-group">

		{!! Form::submit('Edit User', ['class' => 'btn btn-primary']) !!}

	</div>
	{!! Form::close() !!}



	{!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}

	<div class="form-group">

		{!! Form::submit('Delete User', ['class' => 'btn btn-danger']) !!}

	</div>

	{!! Form::close() !!}








 



	@include('includes.createError')





@stop 