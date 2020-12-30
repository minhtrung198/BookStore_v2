@extends('dashboards.layout.index')
@section('js')
@section('content')
<div class="card" style="width: 200px">
  <img src="{{asset('./img')}}/{{$users->image}}" class="card-img-top" alt="img">
</div>
<ul class="list-group-111">
	<li class="list-group-item">Role: {{$users->role->name}}</li>
	<li class="list-group-item">First Name: {{$users->first_name}}</li>
	<li class="list-group-item">Last Name: {{$users->last_name}}</li>
	<li class="list-group-item">Email: {{$users->email}}</li>
	<li class="list-group-item">Phone: {{$users->phone}}</li>
	<li class="list-group-item">Address: {{$users->address}}</li>
</ul>
<br>
<br>
<br>
<br>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Image</th>
			<th>Last Name</th>
			<th>Phone</th>
			<th>Address</th>
			<th>Product</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Purchase status</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td></td>
		</tr>
	</tbody>
</table>
@endsection