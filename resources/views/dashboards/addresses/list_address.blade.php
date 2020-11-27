@extends('dashboards.layout.master')
@section('content')
<h1>List Address</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Street</th>
			<th>State</th>
			<th>City</th>
			<th>Country</th>
			<th>Zip_code</th>
			<th>Edit</th>
			<th>Delete</th>

		</tr>
	</thead>
	<tbody>
		@foreach($addresses as $address)
		<tr>
			<td>{{$address->id}}</td>
			<td>{{$address->street}}</td>
			<td>{{$address->state}}</td>
			<td>{{$address->city}}</td>
			<td>{{$address->country}}</td>
			<td>{{$address->zip_code}}</td>
			<td><a href="{{route('dashboards.addresses.edit_address', $address->id)}}" class="btn btn-success">Edit</a></td>
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
			<td><a href="{{route('dashboards.addresses.create_address')}}" class="btn btn-primary">Create</a></td>
		</tr>
	</tbody>
</table>
@endsection