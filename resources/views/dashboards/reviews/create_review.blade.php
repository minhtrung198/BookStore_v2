@extends('dashboards.layout.index')
@section('js')
@section('content')
<form action="{{route('dashboards.reviews.store')}}" method="POST" role="form">
	<legend>Create Reviews</legend>

	@csrf

	<div class="form-group">
		<label for="">Content</label>
		<input type="text" class="form-control" name="content" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Product ID</label>
		<input type="number" class="form-control" name="product_id" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">User ID</label>
		<input type="number" class="form-control" name="user_id" placeholder="Input field">
	</div>

	<button type="submit" class="btn btn-primary" action="save">Create</button>
</form>
@endsection