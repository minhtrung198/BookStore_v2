@extends('dashboards.layout.index')
@section('js')
@section('content')
<form action="{{route('dashboards.authors.store')}}" method="POST" role="form">
	<legend>Create Authors</legend>
	@csrf
	<div class="form-group">
		<label for="">Author Name</label>
		<input type="text" class="form-control" name="author_name" placeholder="Input field" value="{{old('author_name')}}">
		@if($errors->has('author_name'))
		<p style="color:red">{{$errors->first('author_name')}}</p>
		@endif
	</div>

	<button type="submit" class="btn btn-danger" action="save">Create</button>
</form>
@endsection