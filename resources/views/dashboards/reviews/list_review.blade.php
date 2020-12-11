@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>List Reviews</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Content</th>
			<th>Product ID</th>
			<th>User ID</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($reviews as $review)
		<tr>
			<td>{{$review->id}}</td>
			<th>{{$review->content}}</th>
			<th>{{$review->product_id}}</th>
			<th>{{$review->user_id}}</th>
			<th><a href="{{route('dashboards.reviews.edit_review', $review->id)}}" class="btn btn-success">Edit</a></th>
			<td><a href="#" class="btn btn-danger">Delete</a></td>
		</tr>
		@endforeach
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td><a href="{{route('dashboards.reviews.create_review')}}" class="btn btn-primary">Create</a></td>
		</tr>
	</tbody>
</table>
@endsection