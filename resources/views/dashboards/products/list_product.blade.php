@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>List products</h1>
<div class="sort">
    <form action="{{route('dashboards.products.sort')}}" method="post">
        @csrf
        <select name="sort" id="sort" class="form-control">
            <option value="{{Request::url()}}?sort_by=none">--Sort--</option>
            <option value="{{Request::url()}}?sort_by=increment">--Ascending--</option>
            <option value="{{Request::url()}}?sort_by=decrease">--Decrease--</option>
            <option value="{{Request::url()}}?sort_by=new">--New Product--</option>
            <option value="{{Request::url()}}?sort_by=name">--Sort By Name--</option>
        </select>
    </form>
</div>
<div class="but1">
	<a href="{{route('dashboards.products.create_product')}}" class="btn btn-danger">Create</a>
	<a href="{{route('dashboards.products.record_product')}}" class="btn btn-info">Record</a>
</div>
<div class="search">
	<form action="{{route('dashboards.products.search')}}" method="get">
		@csrf
		<input type="text" placeholder="Search" name="search" value="{{old('name')}}" require="required">
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
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $product)
		<tr>
			<td><a href="{{route('dashboards.products.detail_product', $products->id)}}"><img src="{{asset('img/'.$product->image)}}" width="100" height="150"></a></td>
			<td><a href="#">{{$product->name}}</a></td>
			<td><a href="#">{{$product->author->name}}</a></td>
			<td><a href="#">{{$product->publisher->name}}</a></td>
			<td><a href="#">{{$product->category->name}}</a></td>
			<td>{{number_format($product->price)}} VNĐ</td>
			<td>
				<a href="{{route('dashboards.products.edit_product', $product->id)}}">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
			  			<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
			  			<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
					</svg>
				</a>
			</td>
			<td>
				<form action="{{route('dashboards.products.destroy', $product->id)}}" method="POST" role="form">
					@csrf
					@method('DELETE')
					<button class="btn">
						<svg xmlns="http://www.w3.org/2000/svg" width="40" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
							<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
							<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
						</svg>
					</button>
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
<br>
{{$products->links()}}
@endsection