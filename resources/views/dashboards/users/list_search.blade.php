@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>Search users</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Avatar</th>
			<th>Email</th>
			<th>Role ID</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td><img src="{{asset('img/'.$user->image)}}" width="100"></td>
			<td><a href="{{route('dashboards.users.detail_user', $user->id)}}">{{$user->email}}</a></td>
			<td>{{$user->role->name}}</td>
		</tr>
		@endforeach
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td><a href="{{route('dashboards.users.list_user')}}" class="btn btn-primary">Trở lại</a></td>
		</tr>
	</tbody>
</table>
{{$users->links()}}
@endsection