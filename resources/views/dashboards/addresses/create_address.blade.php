@extends('dashboards.layout.master')
@section('content')
<form action="{{route('dashboards.addresses.store')}}" method="POST" role="form">
	<legend>Create Addresses</legend>
	@csrf
	<div class="form-group">
		<label for="">Street</label>
		<input type="text" class="form-control" name="street" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">State</label>
		<input type="text" class="form-control" name="state" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">City</label>
		<input type="text" class="form-control" name="city" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Country</label>
		<input type="text" class="form-control" name="country" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Zip code</label>
		<input type="text" class="form-control" name="zip_code" placeholder="Input field">
	</div>

	<button type="submit" class="btn btn-primary" action="save">Create</button>
</form>
@endsection