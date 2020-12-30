@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>List Role</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Role Name</th>
			<th>Restore</th>
			<th>Permanently Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($roles as $role)
		<tr>
			<td>{{$role->name}}</td>
			<td><form action="{{route('dashboards.roles.restore', $role->id)}}" method="POST" role="form">
				@csrf
				@method('PUT')
				<button type="submit" class="btn btn-danger">Restore</button>
			</form></td>
			<td><form action="{{route('dashboards.roles.force', $role->id)}}" method="POST" role="form">
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
		</tr>
	</tbody>
</table>
@endsection