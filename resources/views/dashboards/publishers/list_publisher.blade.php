@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>List Publishers</h1>
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
		@foreach($publishers as $publisher)
		<tr>
			<td>{{$publisher->id}}</td>
			<td>{{$publisher->name}}</td>
			<td><a href="{{route('dashboards.publishers.edit_publisher', $publisher->id)}}" class="btn btn-success">Edit</a></td>
			<td><a href="#" class="btn btn-danger">Delete</a></td>
		</tr>
		@endforeach
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td><a href="{{route('dashboards.publishers.create_publisher')}}" class="btn btn-primary">Create</a></td>
		</tr>
	</tbody>
</table>
@endsection