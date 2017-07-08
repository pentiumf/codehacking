@extends('layouts.admin')


@section('content')

	<h1 class="text-center">Posts</h1>

	<div class="container">
	 
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Id</th>
	        <th>Owner</th>
	        <th>Category Id</th>
	        <th>Photo Id</th>
	        <th>Title</th>
	        <th>Body</th>
	        <th>Created At</th>
	        <th>Updated At</th>
	      </tr>
	    </thead>
	    <tbody>

	    	@if ($posts)

	    	@foreach ($posts as $post) {

	    		<tr>
			        <td>{{$post->id}}</td> 
			        <td>{{$post->user->name}}</td>
			        <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
			        <td><img height="50px" width="80px " src="/images/{{$post->photo ? $post->photo->file : 'No Photo'}}"></td>
			        <td>{{$post->title}}</td>
			        <td>{{$post->body}}</td>
			        <td>{{$post->updated_at->diffForHumans()}}</td>
			        <td>{{$post->created_at->diffForHumans()}}</td>
			      </tr> 

	    	}

	    	@endforeach

	      	@endif

	    </tbody>
	  </table>

	</div>

@stop