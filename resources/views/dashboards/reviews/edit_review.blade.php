@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>Edit Reviews</h1>
<form action="{{route('dashboards.reviews.update', $reviews->id)}}" method="POST" role="form">
	
	@csrf

	@method('PUT')

	<div class="form-group">
		<label for="">Content</label>
		<input type="text" class="form-control" name="content" placeholder="Input field" value="{{$reviews->content}}">
	</div>

	<div class="form-group">
		<label for="">Product ID</label>
		<input type="number" class="form-control" name="product_id" placeholder="Input field" value="{{$reviews->product_id}}">
	</div>

	<div class="form-group">
		<label for="">User ID</label>
		<input type="number" class="form-control" name="user_id" placeholder="Input field" value="{{$reviews->user_id}}">
	</div>

	<button type="submit" class="btn btn-primary" action="update">Update</button>
</form>
@endsection