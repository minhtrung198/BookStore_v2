@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>Edit: {{$publishers->name}}</h1>
<form action="{{route('dashboards.publishers.update', $publishers->id)}}" method="POST" role="form">
	
	@csrf

	@method('PUT')

	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name" placeholder="Input field" value="{{$publishers->name}}">
	</div>

	<button type="submit" class="btn btn-primary" action="update">Update</button>
</form>
@endsection