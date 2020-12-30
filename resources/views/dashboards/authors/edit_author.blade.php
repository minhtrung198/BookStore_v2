@extends('dashboards.layout.index')
@section('js')
@section('content')
<form action="{{route('dashboards.authors.update', $authors->id)}}" method="POST" role="form">
	<legend>Edit: {{$authors->name}}</legend>
	@csrf

	@method('PUT')

	<div class="form-group">
		<label for="">Author Name</label>
		<input type="text" class="form-control" name="author_name" placeholder="Input field" value="{{$authors->author_name}}">
		@if($errors->has('author_name'))
		<p style="color:red">{{$errors->first('author_name')}}</p>
		@endif
	</div>

	<button type="submit" class="btn btn-primary" action="update">Update</button>
</form>
@endsection