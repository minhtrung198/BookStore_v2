@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>List Roles</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($roles as $role)
		<tr>
			<td>{{$role->id}}</td>
			<td>{{$role->name}}</td>
			<td><a href="{{route('dashboards.roles.edit_role', $role->id)}}" class="btn btn-success">Edit</a></td>
			<td>
				<form action="{{route('dashboards.roles.destroy', $role->id)}}" method="POST" role="form" class="role">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">Delete</button>
				</form>
			</td>
		</tr>
		@endforeach
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td><a href="{{route('dashboards.roles.create_role')}}" class="btn btn-primary">Create</a></td>
		</tr>
	</tbody>
</table>
@endsection