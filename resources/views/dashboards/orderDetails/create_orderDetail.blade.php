@extends('dashboards.layout.index')
@section('js')
@section('content')
<form action="{{route('dashboards.orderDetails.store')}}" method="POST" role="form">
	<legend>Create OrderDetails</legend>
	@csrf
	<div class="form-group">
		<label for="">Quantity</label>
		<input type="number" class="form-control" name="quantity" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Price</label>
		<input type="text" class="form-control" name="price" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Discount</label>
		<input type="text" class="form-control" name="discount" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Order ID</label>
		<input type="number" class="form-control" name="order_id" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Product ID</label>
		<input type="number" class="form-control" name="product_id" placeholder="Input field">
	</div>

	<button type="submit" class="btn btn-primary" action="save">Create</button>
</form>
@endsection