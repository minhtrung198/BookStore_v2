@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>List Orders</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Status</th>
			<th>User ID</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($orders as $order)
		<tr>
			<td>{{$order->id}}</td>
			<td>{{$order->status}}</td>
			<td>{{$order->user_id}}</td>
			<td><a href="{{route('dashboards.orders.edit_order', $order->id)}}" class="btn btn-success">Edit</a></td>
			<td><a href="#" class="btn btn-danger">Delete</a></td>
		</tr>
		@endforeach
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td><a href="{{route('dashboards.orders.create_order')}}" class="btn btn-primary">Create</a></td>
		</tr>
	</tbody>
</table>
@endsection