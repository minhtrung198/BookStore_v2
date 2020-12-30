@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>List Category</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>category Name</th>
			<th>Restore</th>
			<th>Permanently Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($category as $cat)
		<tr>
			<td>{{$cat->category_name}}</td>
			<td><form action="{{route('dashboards.categories.restore', $cat->id)}}" method="POST" role="form">
				@csrf
				@method('PUT')
				<button type="submit" class="btn btn-danger">Restore</button>
			</form></td>
			<td><form action="{{route('dashboards.categories.force', $cat->id)}}" method="POST" role="form">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Permanently Delete</button>
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