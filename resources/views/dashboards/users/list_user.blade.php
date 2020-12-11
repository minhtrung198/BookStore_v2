@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>List users</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Ảnh đại diện </th>
			<th>Email</th>
			<th>Role ID</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{$user->id}}</td>
			<td><img src="{{asset('img/'.$user->image)}}" width="100"></td>
			<td><a href="{{route('dashboards.users.detail_user', $user->email)}}">{{$user->email}}</a></td>
			<td>{{$user->name}}</td>
			<td><a href="{{route('dashboards.users.edit_user', $user->email)}}" class="btn btn-success">Sửa</a></td>
			<td><form action="{{route('dashboards.users.destroy', $user->id)}}" method="POST" role="form">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Xóa</button>
			</form></td>
		</tr>
		@endforeach
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td><a href="{{route('dashboards.users.create_user')}}" class="btn btn-primary">Tạo mới</a></td>
		</tr>
	</tbody>
</table>
@endsection