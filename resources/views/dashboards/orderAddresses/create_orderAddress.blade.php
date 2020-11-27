@extends('dashboards.layout.master')
@section('content')
<form action="{{route('dashboards.orderAddresses.store')}}" method="POST" role="form">
	<legend>Create Orders</legend>
	@csrf
	<div class="form-group">
		<label for="">Email</label>
		<input type="email" class="form-control" name="email" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Notes</label>
		<input type="text" class="form-control" name="notes" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Phone</label>
		<input type="text" class="form-control" name="phone" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Order ID</label>
		<input type="number" class="form-control" name="order_id" placeholder="Input field">
	</div>

	<button type="submit" class="btn btn-primary" action="save">Create</button>
</form>
@endsection