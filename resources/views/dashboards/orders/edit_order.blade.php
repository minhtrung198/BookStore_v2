@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>Edit Orders</h1>
<form action="{{route('dashboards.orders.update', $orders->id)}}" method="POST" role="form">
	
	@csrf

	@method('PUT')

	<div class="form-group">
		<label for="">Status</label>
		<input type="text" class="form-control" name="status" placeholder="Input field" value="{{$orders->status}}">
	</div>

	<div class="form-group">
		<label for="">User ID</label>
		<input type="number" class="form-control" name="user_id" placeholder="Input field" value="{{$orders->user_id}}">
	</div>

	<button type="submit" class="btn btn-primary" action="update">Update</button>
</form>
@endsection