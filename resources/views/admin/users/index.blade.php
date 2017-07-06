@extends('layouts.admin')


@section('content')

	<h1>Users</h1>

	<div class="container">
	 
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Id</th>
	        <th>Photo</th>
	        <th>name</th>
	        <th>Email</th>
	        <th>Created</th>
	        <th>Updated</th>
	        <th>Status</th>
	        <th>Role</th>
	      </tr>
	    </thead>
	    <tbody>

	    	@if ($users)

	    	@foreach ($users as $user) {

	    		<tr>
			        <td>{{$user->id}}</td> 
			        <td><img height="50px" width="50px " src="/images/{{$user->photo ? $user->photo->file : 'No Photo'}}"></td>
			        <td><a href="{{route('users.edit',  $user->id)}}">{{$user->name}}</a></td>
			        <td>{{$user->email}}</td>
			        <td>{{$user->created_at->diffForHumans()}}</td>
			        <td>{{$user->updated_at->diffForHumans()}}</td>
			        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
			        <td>{{$user->role->name}}</td>
			      </tr> 

	    	}

	    	@endforeach

	      	@endif

	    </tbody>
	  </table>

	</div>

@stop 