@extends('dashboards.layout.index')
@section('js')
@section('content')
<div class="card" style="width: 18rem;">
  <img src="./img/review-1.jpg" class="card-img-top" alt="img">
  <div class="card-body">
    <h5 class="card-title">{{$products->name}}</h5>
  </div>
</div>
<ul class="list-group-111">
	<li class="list-group-item">{{$product->description}}</li>
	<li class="list-group-item">{{$products->quantity}}</li>
	<li class="list-group-item">{{$users->price}}VNĐ</li>
	<li class="list-group-item">NUll</li>
	<li class="list-group-item">NUll</li>
	<li class="list-group-item">NUll</li>
	<li class="list-group-item">NUll</li>
</ul>
<!-- <table class="table table-hover">
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
		@foreach($users as $user)
		<tr>
			<td><img src="{{asset('./img')}}/{{$user->image}}" alt="img"></td>
			<td>Jenny Loren</td>
			<td>324134324</td>
			<td>Atlanta 6th street</td>
			<td>Feminist Book</td>
			<td>1</td>
			<td>$356.99</td>
			<td>order processing</td>
		</tr>
		@endforeach
	</tbody>
</table> -->
@endsection