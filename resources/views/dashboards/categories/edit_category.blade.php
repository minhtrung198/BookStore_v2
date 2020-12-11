@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>Edit: {{$categories->name}}</h1>
<form action="{{route('dashboards.categories.update', $categories->id)}}" method="POST" role="form">
	
	@csrf

	@method('PUT')

	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name" placeholder="Input field" value="{{$categories->name}}">
	</div>

	<div class="form-group">
		<label for="">Parent ID</label>
		<input type="number" class="form-control" name="parent_id" placeholder="Input field" value="{{$categories->parent_id}}">
	</div>

	<button type="submit" class="btn btn-primary" action="update">Update</button>
</form>
@endsection