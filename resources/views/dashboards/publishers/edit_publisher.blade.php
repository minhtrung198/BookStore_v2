@extends('dashboards.layout.index')
@section('js')
@section('content')
<form action="{{route('dashboards.publishers.update', $publishers->id)}}" method="POST" role="form">
	<legend>Edit: {{$publishers->name}}</legend>
	@csrf

	@method('PUT')

	<div class="form-group">
		<label for="">Publisher Name</label>
		<input type="text" class="form-control" name="publisher_name" placeholder="Input field" value="{{$publishers->publisher_name}}">
		@if($errors->has('publisher_name'))
		<p style="color:red">{{$errors->first('publisher_name')}}</p>
		@endif
	</div>

	<button type="submit" class="btn btn-primary" action="update">Update</button>
</form>
@endsection