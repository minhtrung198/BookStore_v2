@extends('dashboards.layout.index')
@section('js')
@section('content')
<form action="{{route('dashboards.orders.store')}}" method="POST" role="form">
	<legend>Create Orders</legend>
	@csrf
	<div class="form-group">
		<label for="">Status</label>
		<input type="text" class="form-control" name="status" placeholder="Input field">
		@if($errors->has('status'))
		<p style="color: red">{{$errors->first('status')}}</p>
		@endif
	</div>

	<div class="form-group">
		<label for="">Quantity</label>
		<input type="number" class="form-control" name="quantity" placeholder="Input field">
		@if($errors->has('quantity'))
		<p style="color: red">{{$errors->first('quantity')}}</p>
		@endif
	</div>

	<div class="form-group">
		<label for="">Price</label>
		<input type="text" class="form-control" name="price" placeholder="Input field">
		@if($errors->has('price'))
		<p style="color: red">{{$errors->first('price')}}</p>
		@endif
	</div>

	<div class="form-group">
		<label for="">Discount</label>
		<input type="text" class="form-control" name="discount" placeholder="Input field">
		@if($errors->has('discount'))
		<p style="color: red">{{$errors->first('discount')}}</p>
		@endif
	</div>

<br>
	<button type="submit" class="btn btn-danger" action="save">Create</button>
</form>
@endsection