@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>List users</h1>
<div class="search">
	<form action="{{route('dashboards.users.search')}}" method="get">
		@csrf
		<input type="text" placeholder="Search" name="search" value="{{old('first_name')}}">
		<button type ="submit"><i class="fa fa-search"></i></button>
	</form>
</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Avatar</th>
			<th>Email</th>
			<th>Role ID</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td><a href="{{route('dashboards.users.detail_user', $user->id)}}"><img src="{{asset('img/'.$user->image)}}" width="100"></a></td>
			<td><a href="{{route('dashboards.users.detail_user', $user->id)}}">{{$user->email}}</a></td>
			<td>{{$user->name}}</td>
			<td><form action="{{route('dashboards.users.restore', $user->email)}}" method="POST" role="form">
				@csrf
				@method('PUT')
				<button type="submit" class="btn btn-danger">Restore</button>
			</form></td>
			<td><form action="{{route('dashboards.users.force', $user->email)}}" method="POST" role="form">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Permanetly Delete</button>
			</form></td>
		</tr>
		@endforeach
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
		</tr>
	</tbody>
</table>
{{$users->links()}}
@endsection