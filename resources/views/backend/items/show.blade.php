@extends('backendtemplate')

@section('title','Items')
@section('content')
<div class="container-fluid">
	<h2>Items Detail</h2>
	<div class="row">
		<div class="col-md-4">
			<img src="{{asset($item->photo)}}" class="img-fluid">
		</div>
		<div class= "col-md-8">
			<table class='table table-bordered'>
				<tbody>
					<tr>
						<td>Product Name:</td>
						<td>{{$item->name}}</td>
						</tr>
						<tr>
							<td>Product Code:</td>
							<td>{{$item->codeno}}</td>
						</tr>
						<tr>
							<td>Product Price:</td>
							<td>{{$item->price}}</td>
						</tr>
						<tr>
							<td>Description:</td>
							<td>{{$item->description}}</td>
						</tr>
						</tbody>
							</table>
						</div>
					</div>
				</div>
				@endsection