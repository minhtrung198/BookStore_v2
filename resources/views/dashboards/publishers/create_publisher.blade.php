@extends('dashboards.layout.index')
@section('js')
@section('content')
<form action="{{route('dashboards.publishers.store')}}" method="POST" role="form">
	<legend>Create Publishers</legend>
	@csrf
	<div class="form-group">
		<label for="">Publisher Name</label>
		<input type="text" class="form-control" name="publisher_name" placeholder="Input field">
		@if($errors->has('publisher_name'))
		<p style="color:red">{{$errors->first('publisher_name')}}</p>
		@endif
	</div>

	<button type="submit" class="btn btn-danger" action="save">Create</button>
</form>
@endsection