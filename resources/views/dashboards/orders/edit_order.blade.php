@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>Edit Orders</h1>
<form action="{{route('dashboards.orders.update', $orders->id)}}" method="POST" user="form">
	
	@csrf

	@method('PUT')

	<div class="form-group">
		<label for="">Status</label>
		<input type="text" class="form-control" name="status" placeholder="Input field" value="{{$orders->status}}">
		@if($errors->has('status'))
		<p style="color: red">{{$errors->first('status')}}</p>
		@endif
	</div>

	<div class="form-group">
		<label for="">Quantity</label>
		<input type="number" class="form-control" name="quantity" placeholder="Input field" value="{{$orders->quantity}}">
		@if($errors->has('quantity'))
		<p style="color: red">{{$errors->first('quantity')}}</p>
		@endif
	</div>

	<div class="form-group">
		<label for="">Price</label>
		<input type="text" class="form-control" name="price" placeholder="Input field" value="{{$orders->price}}">
		@if($errors->has('price'))
		<p style="color: red">{{$errors->first('price')}}</p>
		@endif
	</div>

	<div class="form-group">
		<label for="">Discount</label>
		<input type="text" class="form-control" name="discount" placeholder="Input field" value="{{$orders->discount}}">
		@if($errors->has('discount'))
		<p style="color: red">{{$errors->first('discount')}}</p>
		@endif
	</div>

	<button type="submit" class="btn btn-primary" action="update">Update</button>
</form>
@endsection