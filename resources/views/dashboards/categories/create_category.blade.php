@extends('dashboards.layout.index')
@section('js')
@section('content')
<form action="{{route('dashboards.categories.store')}}" method="POST" role="form">
	<legend>Create Catgories</legend>
	@csrf
	<div class="form-group">
		<label for="">Category Name</label>
		<input type="text" class="form-control" name="category_name" placeholder="Input field">
		@if($errors->has('category_name'))
		<p style="color:red">{{$errors->first('category_name')}}</p>
		@endif
	</div>

	{{-- <div class="form-group">
		<label for="">Status</label>
		<input type="number" class="form-control" name="status" placeholder="Input field">
		@if($errors->has('status'))
		<p style="color:red">{{$errors->first('status')}}</p>
		@endif
	</div> --}}

	<button type="submit" class="btn btn-danger" action="save">Create</button>
</form>
@endsection