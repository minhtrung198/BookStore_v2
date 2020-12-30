@extends('dashboards.layout.index')
@section('js')
@section('content')
<div class="card" style="width: 200px">
  <img src="{{asset('img/'.$products->image)}}" class="card-img-top" alt="img" height="300">
</div>
<ul class="list-group-111">
	<li class="list-group-item">Name: {{$products->name}}</li>
	<li class="list-group-item">Description: {{$products->description}}</li>
	<li class="list-group-item">Quantity: {{number_format($products->quantity)}}</li>
	<li class="list-group-item">Status:
		@if($products->status >= 1)
			Còn hàng
		@else
			Hết Hàng
		@endif
	</li>
	<li class="list-group-item"><a href="{{route('dashboards.products.list_product')}}" class="btn btn-primary">Back</a></li>
</ul>
@endsection