@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>List Authors</h1>
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
		@foreach($authors as $author)
		<tr>
			<td>{{$author->id}}</td>
			<td>{{$author->name}}</td>
			<td><a href="{{route('dashboards.authors.edit_author', $author->id)}}" class="btn btn-success">Edit</a></td>
			<td><a href="#" class="btn btn-danger">Delete</a></td>
		</tr>
		@endforeach
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td><a href="{{route('dashboards.authors.create_author')}}" class="btn btn-primary">Create</a></td>
		</tr>
	</tbody>
</table>
@endsection