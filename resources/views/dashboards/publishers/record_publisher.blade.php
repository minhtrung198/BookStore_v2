@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>List Publishers</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Publisher Name</th>
			<th>Restore</th>
			<th>Permanently Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($publishers as $publisher)
		<tr>
			<td>{{$publisher->publisher_name}}</td>
			<td><form action="{{route('dashboards.publishers.restore', $publisher->id)}}" method="POST" role="form">
				@csrf
				@method('PUT')
				<button type="submit" class="btn btn-danger">Restore</button>
			</form></td>
			<td><form action="{{route('dashboards.publishers.force', $publisher->id)}}" method="POST" role="form">
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