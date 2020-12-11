@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>Edit User</h1>

<form action="{{route('dashboards.users.update', $users->email)}}" method="POST" role="form">
	
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

	<!-- <div class="form-group">
		<label for="">Email Verified At</label>
		<input type="email" class="form-control" name="email_verified_at" placeholder="Input field" value="{{$users->email_verified_at}}">
	</div> -->

	<div class="form-group">
		<label for="">Password</label>
		<input type="password" class="form-control" name="password" placeholder="Input field" value="{{$users->password}}">
	</div>

	<div class="form-group">
		<label for="">Address</label>
		<input type="text" class="form-control" name="address" placeholder="Input field" value="{{$users->address}}">
	</div>

	<select name="role_id" id="inputRole_id" class="form-control" required="required">
		<option value="">Select</option>
		@foreach($roles as $role)
		<option value="{{$role->id}}"><span class="badge badge-secondary">{{$role->name}}</span></option>
		@endforeach
	</select>

	<div class="form-group">
		<label for="">Avatar</label>
		<input type="file" class="form-control" name="image" placeholder="Input field" value="{{$users->image}}">
	</div>

	<button type="submit" class="btn btn-primary" action="update">Update</button>
</form>

@endsection