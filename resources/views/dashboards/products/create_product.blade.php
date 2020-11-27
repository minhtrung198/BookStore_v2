@extends('dashboards.layout.master')
@section('content')
<form action="{{route('dashboards.products.store')}}" method="POST" role="form">
	<legend>Create Products</legend>
	@csrf
	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Description</label>
		<input type="text" class="form-control" name="description" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Quantity</label>
		<input type="number" class="form-control" name="quantity" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">image</label>
		<input type="file" name="image" class="form-control" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Author ID</label>
		<input type="number" class="form-control" name="author_id" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Publisher ID</label>
		<input type="number" class="form-control" name="publisher_id" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Category ID</label>
		<input type="number" class="form-control" name="category_id" placeholder="Input field">
	</div>

	<button type="submit" class="btn btn-primary" action="save">Create</button>
</form>
@endsection