@extends('dashboards.layout.master')
@section('content')
<h1>Edit User</h1>
<form action="{{route('dashboards.users.update', $users->id)}}" method="POST" role="form">
	
	@csrf

	@method('PUT')

	<div class="form-group">
		<label for="">First Name</label>
		<input type="text" class="form-control" name="first_name" placeholder="Input field" value="{{$users->first_name}}">
	</div>

	<div class="form-group">
		<label for="">Last Name</label>
		<input type="text" class="form-control" name="last_name" placeholder="Input field" value="{{$users->last_name}}">
	</div>

	<div class="form-group">
		<label for="">Phone</label>
		<input type="text" class="form-control" name="phone" placeholder="Input field" value="{{$users->phone}}">
	</div>

	<div class="form-group">
		<label for="">Email</label>
		<input type="email" class="form-control" name="email" placeholder="Input field" value="{{$users->email}}">
	</div>

	<div class="form-group">
		<label for="">Email Verified At</label>
		<input type="email" class="form-control" name="email_verified_at" placeholder="Input field" value="{{$users->email_verified_at}}">
	</div>

	<div class="form-group">
		<label for="">Password</label>
		<input type="password" class="form-control" name="password" placeholder="Input field" value="{{$users->password}}">
	</div>

	<div class="form-group">
		<label for="">Role ID</label>
		<input type="number" class="form-control" name="role_id" placeholder="Input field" value="{{$users->role_id}}">
	</div>

	<div class="form-group">
		<label for="">Address ID</label>
		<input type="number" class="form-control" name="address_id" placeholder="Input field" value="{{$users->address_id}}">
	</div>

	<div class="form-group">
		<label for="">Avatar</label>
		<input type="file" class="form-control" name="avatar" placeholder="Input field" value="{{$users->avatar}}">
	</div>

	<button type="submit" class="btn btn-primary" action="update">Update</button>
</form>
@endsection