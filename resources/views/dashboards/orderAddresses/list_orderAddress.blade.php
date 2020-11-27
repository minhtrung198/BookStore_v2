@extends('dashboards.layout.master')
@section('content')
<h1>List OrderAddresses</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Email</th>
			<th>Notes</th>
			<th>Phone</th>
			<th>Order ID</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($orderAddresses as $orderAddress)
		<tr>
			<td>{{$orderAddress->id}}</td>
			<td>{{$orderAddress->email}}</td>
			<td>{{$orderAddress->notes}}</td>
			<td>{{$orderAddress->phone}}</td>
			<td>{{$orderAddress->order_id}}</td>
			<td><a href="{{route('dashboards.orderAddresses.edit_orderAddress', $orderAddress->id)}}" class="btn btn-success">Edit</a></td>
			<td><a href="#" class="btn btn-danger">Delete</a></td>
		</tr>
		@endforeach
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td><a href="{{route('dashboards.orderAddresses.create_orderAddress')}}" class="btn btn-primary">Create</a></td>
		</tr>
	</tbody>
</table>
@endsection