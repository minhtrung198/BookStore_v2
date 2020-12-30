@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>List products</h1>
<div class="search">
	<form action="{{route('dashboards.products.search')}}" method="get">
		@csrf
		<input type="text" placeholder="Search" name="search" value="{{old('name')}}">
		<button type ="submit"><i class="fa fa-search"></i></button>
	</form>
</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Image</th>
			<th>Name</th>
			<th>AuthorID</th>
			<th>PublisherID</th>
			<th>CategoryID</th>
			<th>Price</th>
			<th>Restore</th>
			<th>Permanently Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $product)
		<tr>
			<td><a href="{{route('dashboards.products.detail_product', $product->id)}}"><img src="{{asset('img/'.$product->image)}}" width="100"></a></td>
			<td><a href="#">{{$product->name}}</a></td>
			<td><a href="#">{{$product->author_name}}</a></td>
			<td><a href="#">{{$product->publisher_name}}</a></td>
			<td><a href="#">{{$product->category_name}}</a></td>
			<td>{{number_format($product->price)}} VNĐ</td>
			<td>
				<form action="{{route('dashboards.products.restore', $product->name)}}" method="POST" role="form">
					@csrf
					@method('PUT')
					<button type="submit" class="btn btn-danger">Restore</button>
				</form></td>
				<td><form action="{{route('dashboards.products.force', $product->name)}}" method="POST" role="form">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">Permanently Delete</button>
				</form>
			</td>
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
			<td>&nbsp</td>
		</tr>
	</tbody>
</table>
{{$products->links()}}
@endsection