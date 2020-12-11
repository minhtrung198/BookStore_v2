@extends('dashboards.layout.index')
@section('js')
@section('content')
<div class="card" style="width: 18rem;">
  <img src="{{asset('./img')}}/{{$users->image}}" class="card-img-top" alt="img">
  <div class="card-body">
    <h5 class="card-title">{{$users->email}}</h5>
  </div>
</div>
<ul class="list-group-111">
	<li class="list-group-item">{{$users->first_name}}</li>
	<li class="list-group-item">{{$users->last_name}}</li>
	<li class="list-group-item">{{$users->phone}}</li>
	<li class="list-group-item">{{$users->address}}</li>
	<li class="list-group-item">NUll</li>
	<li class="list-group-item">NUll</li>
	<li class="list-group-item">NUll</li>
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