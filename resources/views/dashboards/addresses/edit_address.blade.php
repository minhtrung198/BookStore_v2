@extends('dashboards.layout.master')
@section('content')
<h1>Edit: {{$addresses->name}}</h1>
<form action="{{route('dashboards.addresses.update', $addresses->id)}}" method="POST" role="form">
	
	@csrf

	@method('PUT')

	<div class="form-group">
		<label for="">Street</label>
		<input type="text" class="form-control" name="street" placeholder="Input field" value="{{$addresses->street}}">
	</div>

	<div class="form-group">
		<label for="">State</label>
		<input type="text" class="form-control" name="state" placeholder="Input field" value="{{$addresses->state}}">
	</div>

	<div class="form-group">
		<label for="">City</label>
		<input type="text" class="form-control" name="city" placeholder="Input field" value="{{$addresses->city}}">
	</div>

	<div class="form-group">
		<label for="">Country</label>
		<input type="text" class="form-control" name="country" placeholder="Input field" value="{{$addresses->country}}">
	</div>

	<div class="form-group">
		<label for="">Zip code</label>
		<input type="text" class="form-control" name="zip_code" placeholder="Input field" value="{{$addresses->zip_code}}">
	</div>
	<button type="submit" class="btn btn-primary" action="update">Update</button>
</form>
@endsection