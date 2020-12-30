@extends('dashboards.layout.index')
@section('js')
@section('content')
<form action="{{route('dashboards.products.update', $products->id)}}" method="POST" category="form">
	<legend>Edit: {{$products->name}}</legend>
	@csrf

	@method('PUT')

	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name" placeholder="Input field" value="{{$products->name}}">
		@if($errors->has('name'))
		<p style="color: red">{{$errors->first('name')}}</p>
		@endif
	</div>

	<div class="form-group">
		<label for="textarea" class="col-sm-12 control-label">Description</label>
		<div class="col-sm-12">
			<textarea name="description" id="textarea" class="form-control" rows="3" required="required" value="{{$products->description}}"></textarea>
		</div> 
		@if($errors->has('description'))
		<p style="color: red">{{$errors->first('description')}}</p>
		@endif
	</div>

	<div class="form-group">
		<label for="">Quantity</label>
		<input type="number" class="form-control" name="quantity" placeholder="Input field" value="{{$products->quantity}}">
		@if($errors->has('quantity'))
		<p style="color: red">{{$errors->first('quantity')}}</p>
		@endif
	</div>

	<div class="form-group">
		<label for="">Price</label>
		<input type="number" class="form-control" name="price" placeholder="Input field" value="{{$products->price}}">
		@if($errors->has('price'))
		<p style="color: red">{{$errors->first('price')}}</p>
		@endif
	</div>

	<div class="form-group">
		<label for="">image</label>
		<input type="file" name="image" class="form-control" placeholder="Input field" value="{{$products->image}}">
		@if($errors->has('image'))
		<p style="color: red">{{$errors->first('image')}}</p>
		@endif
	</div>

	<div class="form-group">
		<input type="status" class="form-control" name="status" placeholder="Input field" value="0" hidden>
		@if($errors->has('status'))
		<p style="color: red">{{$errors->first('status')}}</p>
		@endif
	</div>

	<select name="author_id" id="inputAuthor_id" class="form-control" required="required">
		<option value="">Select</option>
		@foreach($authors as $author)
		<option value="{{$author->id}}"><span class="badge badge-secondary">{{$author->author_name}}</span></option>
		@endforeach
		@if($errors->has('author_id'))
		<p style="color: red">{{$errors->first('author_id')}}</p>
		@endif
	</select>
<br>
	<select name="publisher_id" id="inputPublisher_id" class="form-control" required="required">
		<option value="">Select</option>
		@foreach($publishers as $publisher)
		<option value="{{$publisher->id}}"><span class="badge badge-secondary">{{$publisher->publisher_name}}</span></option>
		@endforeach
		@if($errors->has('publisher_id'))
		<p style="color: red">{{$errors->first('publisher_id')}}</p>
		@endif
	</select>
<br>
	<select name="category_id" id="inputcategory_id" class="form-control" required="required">
		<option value="">Select</option>
		@foreach($categories as $category)
		<option value="{{$category->id}}"><span class="badge badge-secondary">{{$category->category_name}}</span></option>
		@endforeach
		@if($errors->has('category_id'))
		<p style="color: red">{{$errors->first('category_id')}}</p>
		@endif
	</select>
<br>
	<button type="submit" class="btn btn-primary" action="update">Update</button>
</form>
@endsection