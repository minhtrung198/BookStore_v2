@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>Edit OrderDetails</h1>
<form action="{{route('dashboards.orderDetails.update', $orderDetails->id)}}" method="POST" role="form">
	
	@csrf

	@method('PUT')

	<div class="form-group">
		<label for="">Quantity</label>
		<input type="number" class="form-control" name="quantity" placeholder="Input field" value="{{$orderDetails->quantity}}">
	</div>

	<div class="form-group">
		<label for="">Price</label>
		<input type="text" class="form-control" name="price" placeholder="Input field" value="{{$orderDetails->price}}">
	</div>

	<div class="form-group">
		<label for="">Discount</label>
		<input type="text" class="form-control" name="discount" placeholder="Input field" value="{{$orderDetails->discount}}">
	</div>

	<div class="form-group">
		<label for="">Order ID</label>
		<input type="number" class="form-control" name="order_id" placeholder="Input field" value="{{$orderDetails->order_id}}">
	</div>

	<div class="form-group">
		<label for="">Product ID</label>
		<input type="number" class="form-control" name="product_id" placeholder="Input field" value="{{$orderDetails->product_id}}">
	</div>

	<button type="submit" class="btn btn-primary" action="update">Update</button>
</form>
@endsection