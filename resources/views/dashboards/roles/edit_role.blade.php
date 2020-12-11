@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>Edit: {{$roles->name}}</h1>
<form action="{{route('dashboards.roles.update', $roles->id)}}" method="POST" role="form">
	
	@csrf

	@method('PUT')

	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name" placeholder="Input field" value="{{$roles->name}}">
	</div>

	<button type="submit" class="btn btn-primary" action="update">Update</button>
</form>
@endsection