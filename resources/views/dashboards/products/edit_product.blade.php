@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>Edit: {{$products->name}}</h1>
<form action="{{route('dashboards.products.update', $products->id)}}" method="POST" role="form">
	
	@csrf

	@method('PUT')

	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name" placeholder="Input field" value="{{$products->name}}">
	</div>

	<div class="form-group">
		<label for="">Description</label>
		<input type="text" class="form-control" name="description" placeholder="Input field" value="{{$products->description}}">
	</div>

	<div class="form-group">
		<label for="">Quantity</label>
		<input type="number" class="form-control" name="quantity" placeholder="Input field" value="{{$products->quantity}}">
	</div>

	<div class="form-group">
		<label for="">Price</label>
		<input type="number" class="form-control" name="price" placeholder="Input field" value="{{$products->price}}">
	</div>

	<div class="form-group">
		<label for="">image</label>
		<input type="file" name="image" class="form-control" placeholder="Input field" value="{{$products->image}}">
	</div>

	<div class="form-group">
		<label for="">Author ID</label>
		<input type="number" class="form-control" name="author_id" placeholder="Input field" value="{{$products->author_id}}">
	</div>

	<div class="form-group">
		<label for="">Publisher ID</label>
		<input type="number" class="form-control" name="publisher_id" placeholder="Input field" value="{{$products->publisher_id}}">
	</div>

	<div class="form-group">
		<label for="">Category ID</label>
		<input type="number" class="form-control" name="category_id" placeholder="Input field" value="{{$products->category_id}}">
	</div>

	<button type="submit" class="btn btn-primary" action="update">Update</button>
</form>
@endsection