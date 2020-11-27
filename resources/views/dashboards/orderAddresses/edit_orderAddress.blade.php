@extends('dashboards.layout.master')
@section('content')
<h1>Edit OrderAddresses</h1>
<form action="{{route('dashboards.orderAddresses.update', $orderAddresses->id)}}" method="POST" role="form">
	
	@csrf

	@method('PUT')

	<div class="form-group">
		<label for="">Email</label>
		<input type="email" class="form-control" name="email" placeholder="Input field" value="{{$orderAddresses->email}}">
	</div>

	<div class="form-group">
		<label for="">Notes</label>
		<input type="text" class="form-control" name="notes" placeholder="Input field" value="{{$orderAddresses->notes}}">
	</div>

	<div class="form-group">
		<label for="">Phone</label>
		<input type="text" class="form-control" name="phone" placeholder="Input field" value="{{$orderAddresses->phone}}">
	</div>

	<div class="form-group">
		<label for="">Order ID</label>
		<input type="number" class="form-control" name="order_id" placeholder="Input field" value="{{$orderAddresses->order_id}}">
	</div>

	<button type="submit" class="btn btn-primary" action="update">Update</button>
</form>
@endsection