@extends('dashboards.layout.index')
@section('js')
@section('content')
<form action="{{route('dashboards.roles.store')}}" method="POST" role="form">
	<legend>Create Roles</legend>
	@csrf
	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name" placeholder="Input field">
		@if($errors->has('name'))
		<p style="color:red">{{$errors->first('name')}}</p>
		@endif
	</div>

	<button type="submit" class="btn btn-danger" action="save">Create</button>
</form>
@endsection