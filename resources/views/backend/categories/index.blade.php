@extends('backendtemplate')

@section('title','Categories')
@section('content')
	<div class="container-fluid">
		<h2 class="d-inline-block">Categories List</h2>

		<a href="{{route('categories.create')}}" class="btn btn-outline-success btn-sm float-right">Add New</a>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th colspan="2">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $category)
				<tr>
					<td>{{$category->id}}</td>
					<td>{{$category->name}}</td>
					<td>
						<a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning"><i class='fas fa-edit'></i></a>
						<form method="post" action="{{route('categories.destroy',$category->id)}}" class="d-inline-block" onsubmit="return confirm('Are your sure?')">
							@csrf
							@method('DELETE')
						<button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection