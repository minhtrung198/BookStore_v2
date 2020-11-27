@extends('dashboards.layout.master')
@section('content')
<form action="{{route('dashboards.users.store')}}" method="POST" role="form">
	<legend>Create Users</legend>
	@csrf
	<div class="form-group">
		<label for="">First Name</label>
		<input type="text" class="form-control" name="first_name" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Last Name</label>
		<input type="text" class="form-control" name="last_name" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Phone</label>
		<input type="text" class="form-control" name="phone" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Email</label>
		<input type="email" class="form-control" name="email" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Email Verified At</label>
		<input type="email" class="form-control" name="email_verified_at" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Password</label>
		<input type="password" class="form-control" name="password" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Role ID</label>
		<input type="number" class="form-control" name="role_id" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Address ID</label>
		<input type="number" class="form-control" name="address_id" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Image</label>
		<input type="file" class="form-control" name="image" placeholder="Input field">
	</div>

	<button type="submit" class="btn btn-primary" action="save">Create</button>
</form>
@endsection