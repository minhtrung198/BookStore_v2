@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>List orderDetails</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Discount</th>
			<th>Order ID</th>
			<th>Product ID</th>
			<th>Edit</th>
			<th>Delete</th>			
		</tr>
	</thead>
	<tbody>
		@foreach($orderDetails as $orderDetail)
		<tr>
			<td>{{$orderDetail->id}}</td>
			<td>{{$orderDetail->quantity}}</td>
			<td>{{$orderDetail->price}} VNĐ</td>
			<td>{{$orderDetail->discount}} VNĐ</td>
			<td>{{$orderDetail->order_id}}</td>
			<td>{{$orderDetail->product_id}}</td>
			<td><a href="{{route('dashboards.orderDetails.edit_orderDetail', $orderDetail->id)}}" class="btn btn-success">Edit</a></td>
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
			<td>&nbsp</td>
			<td><a href="{{route('dashboards.orderDetails.create_orderDetail')}}" class="btn btn-primary">Create</a></td>
		</tr>
	</tbody>
</table>
@endsection