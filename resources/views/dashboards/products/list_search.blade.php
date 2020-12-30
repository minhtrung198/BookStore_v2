@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>Search products</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Image</th>
			<th>Name</th>
			<th>AuthorID</th>
			<th>PublisherID</th>
			<th>CategoryID</th>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $product)
		<tr>
			<td><img src="{{asset('img/'.$product->image)}}" width="100"></td>
			<td>{{$product->name}}</td>
			<td>{{$product->author->author_name}}</td>
			<td>{{$product->publisher->publisher_name}}</td>
			<td><a href="#">{{$product->category->category_name}}</a></td>
		</tr>
		@endforeach
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td><a href="{{route('dashboards.products.list_product')}}" class="btn btn-primary">Trở lại</a></td>
		</tr>
	</tbody>
</table>
{{$products->links()}}
@endsection