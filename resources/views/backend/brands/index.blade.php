@extends('backendtemplate')

@section('title','Brands')
@section('content')
	<div class="container-fluid">
		<h2 class="d-inline-block">Brands List</h2>

		<a href="{{route('brands.create')}}" class="btn btn-outline-success btn-sm float-right">Add New</a>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th colspan="2">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($brands as $brand)
				<tr>
					<td>{{$brand->id}}</td>
					<td>{{$brand->name}}</td>
					<td>
						<a href="{{route('brands.edit',$brand->id)}}" class="btn btn-warning"><i class='fas fa-edit'></i></a>
						<form method="post" action="{{route('brands.destroy',$brand->id)}}" class="d-inline-block" onsubmit="return confirm('Are your sure?')">
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