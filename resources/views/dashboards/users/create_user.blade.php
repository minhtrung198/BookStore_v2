@extends('dashboards.layout.index')
@section('js')
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

	<!-- <div class="form-group">
		<label for="">Email Verified At</label>
		<input type="email" class="form-control" name="email_verified_at" placeholder="Input field">
	</div> -->

	<div class="form-group">
		<label for="">Password</label>
		<input type="password" class="form-control" name="password" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Address</label>
		<input type="text" class="form-control" name="address" placeholder="Input field">
	</div>

	<select name="role_id" id="inputRole_id" class="form-control" required="required">
		<option value="">Select</option>
		@foreach($roles as $role)
		<option value="{{$role->id}}"><span class="badge badge-secondary">{{ $role->name }}</span></option>
		@endforeach
	</select>

	<div class="form-group">
		<label for="">Image</label>
		<input type="file" class="form-control" name="image" placeholder="Input field">
	</div>

	<button type="submit" class="btn btn-primary" action="save">Create</button>
</form>
@endsection