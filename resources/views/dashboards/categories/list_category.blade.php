@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>List Categories</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Parent ID</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($categories as $category)
		<tr>
			<td>{{$category->id}}</td>
			<td>{{$category->name}}</td>
			<td>{{$category->parent_id}}</td>
			<td><a href="{{route('dashboards.categories.edit_category', $category->id)}}" class="btn btn-success">Edit</a></td>
			<td><a href="#" class="btn btn-danger">Delete</a></td>
		</tr>
		@endforeach
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td><a href="{{route('dashboards.categories.create_category')}}" class="btn btn-primary">Create</a></td>
		</tr>
	</tbody>
</table>
@endsection