@extends('layouts.admin')


@section('content')

	<h1 class="text-center">Posts</h1>

	@if(Session::has('deleted_post'))

		<p>{{session('deleted_post')}}</p>

	@endif

	<div class="container">
	 
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Id</th>
	        <th>Owner</th>
	        <th>Category Id</th>
	        <th>Photo</th>
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
			        <td><a href="{{ route('posts.edit', $post->id) }}">{{$post->user->name}}</a><td>
			        <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
			        <td><img height="50px" width="40px " src="/images/{{$post->photo ? $post->photo->file : 'No Photo'}}"></td>
			        <td>{{$post->title}}</td>
			        <td>{{str_limit($post->body, 7)}}</td>
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