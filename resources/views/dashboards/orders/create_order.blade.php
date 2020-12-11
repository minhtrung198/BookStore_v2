@extends('dashboards.layout.index')
@section('js')
@section('content')
<form action="{{route('dashboards.orders.store')}}" method="POST" role="form">
	<legend>Create Orders</legend>
	@csrf
	<div class="form-group">
		<label for="">Status</label>
		<input type="text" class="form-control" name="status" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">User ID</label>
		<input type="number" class="form-control" name="user_id" placeholder="Input field">
	</div>

	<button type="submit" class="btn btn-primary" action="save">Create</button>
</form>
@endsection