@extends('dashboards.layout.master')
@section('content')
<h1>List users</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Email Verified At</th>
			<th>Password</th>
			<th>Role ID</th>
			<th>Address ID</th>
			<th>Image</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{$user->id}}</td>
			<td>{{$user->first_name}}</td>
			<td>{{$user->last_name}}</td>
			<td>{{$user->phone}}</td>
			<td>{{$user->email}}</td>
			<td>{{$user->email_verified_at}}</td>
			<td>{{$user->password}}</td>
			<td>{{$user->role_id}}</td>
			<td>{{$user->address_id}}</td>
			<td><img src="{{asset('img/'.$user->image)}}" width="100"></td>
			<td><a href="{{route('dashboards.users.edit_user', $user->id)}}" class="btn btn-success">Edit</a></td>
			<td><a href="#" class="btn btn-danger">Delete</a></td>
		</tr>
		@endforeach
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td><a href="{{route('dashboards.users.create_user')}}" class="btn btn-primary">Create</a></td>
		</tr>
	</tbody>
</table>
@endsection