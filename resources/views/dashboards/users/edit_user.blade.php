@extends('dashboards.layout.index')
@section('js')
@section('content')
<form action="{{route('dashboards.users.update', $users->id)}}" method="POST" role="form">
	<legend>Edit Users</legend>
	@csrf
	@method('PUT')
	<div class="form-group">
		<label for="">First Name</label>
		<input type="text" class="form-control" name="first_name" placeholder="Input field" value="{{$users->first_name}}">
		@if($errors->has('first_name'))
		<p style="color: red">{{$errors->first('first_name')}}</p>
		@endif
	</div>

	<div class="form-group">
		<label for="">Last Name</label>
		<input type="text" class="form-control" name="last_name" placeholder="Input field" value="{{$users->last_name}}">
		@if($errors->has('last_name'))
		<p style="color: red">{{$errors->first('last_name')}}</p>
		@endif
	</div>

	<div class="form-group">
		<label for="">Phone</label>
		<input type="phone" class="form-control" name="phone" placeholder="Input field" value="{{$users->phone}}">
		@if($errors->has('phone'))
		<p style="color: red">{{$errors->first('phone')}}</p>
		@endif
	</div>

	<div class="form-group">
		<label for="">Email</label>
		<input type="email" class="form-control" name="email" placeholder="Input field" value="{{$users->email}}">
		@if($errors->has('email'))
		<p style="color: red">{{$errors->first('email')}}</p>
		@endif
	</div>

	{{-- <div class="form-group">
		<label for="">Email Verified At</label>
		<input type="email" class="form-control" name="email_verified_at" placeholder="Input field" value="{{$users->email_verified_at}}">
	</div> --}}

	<div class="form-group">
		<label for="">Password</label>
		<input type="password" class="form-control" name="password" placeholder="Input field" value="{{$users->password}}">
		@if($errors->has('password'))
		<p style="color: red">{{$errors->first('password')}}</p>
		@endif
	</div>

	<div class="form-group">
		<label for="">Address</label>
		<input type="text" class="form-control" name="address" placeholder="Input field" value="{{$users->address}}">
		@if($errors->has('address'))
		<p style="color: red">{{$errors->first('address')}}</p>
		@endif
	</div>

	<select name="role_id" id="inputRole_id" class="form-control" required="required">
		<option value="">Select</option>
		@foreach($roles as $role)
		<option value="{{$role->id}}"><span class="badge badge-secondary">{{ $role->name }}</span></option>
		@endforeach
		@if($errors->has('role_id'))
		<p style="color: red">{{$errors->first('role_id')}}</p>
		@endif
	</select>

	<div class="form-group">
		<label for="">Avatar</label>
		<input type="file" class="form-control" name="image" placeholder="Input field" value="{{$users->image}}">
		@if($errors->has('image'))
		<p style="color: red">{{$errors->first('image')}}</p>
		@endif
	</div>

	<button type="submit" class="btn btn-primary" action="update">Update</button>
</form>
@endsection