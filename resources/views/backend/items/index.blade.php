@extends('backendtemplate')

@section('title','Items')
@section('content')
	<div class="container-fluid">
		<h2 class="d-inline-block">Items List</h2>

		<a href="{{route('items.create')}}" class="btn btn-outline-success btn-sm float-right">Add New</a>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>CodeNo</th>
					<th>Name</th>
					<th>Price</th>
					<th colspan="2">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($items as $item)
				<tr>
					<td>{{$item->id}}</td>
					<td>{{$item->codeno}}
						<a href="{{route('items.show',$item->id)}}">
							<span class="badge badge-primary ml-2"><i class="fas fa-eye"></i></span>
						</a>
						<a href="#" class="detailBtn" data-photo="{{asset($item->photo)}}" data-name="{{$item->name}}" data-codeno="{{$item->codeno}}" data-price="{{$item->price}}" data-descripiton="{{$item->descripiton}}"><span class="badge badge-primary ml-2"><i class="fas fa-eye"></i></span></a>
					</td>
					<td>{{$item->name}}</td>
					<td>{{$item->price}}</td>
					<td>
						<a href="{{route('items.edit',$item->id)}}" class="btn btn-warning"><i class='fas fa-edit'></i></a>
						<form method="post" action="{{route('items.destroy',$item->id)}}" class="d-inline-block" onsubmit="return confirm('Are your sure?')">
							@csrf
							@method('DELETE')
						<input type="submit" class="btn btn-danger">
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="modal" id="detailModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title name"></h4>
				</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<img src="" class="img-fluid itemImg w-100 d-block">
							</div>
							<div class="col-md-6 content">
								
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary" data-dismiss="modal">Close</button>
					</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.detailBtn').click(function(){
				var name=$(this).data('name');
				var photo=$(this).data('photo');
				var codeno=$(this).data('codeno');
				var price=$(this).data('price');
				var description=$(this).data('description');

				$('.itemImg').attr('src',photo);
				$('.name').text(name);
				$('.content').html(`<p>${codeno}</p>
									<p>${price}</p>
									<p>${description}</p>`);

				$('#detailModal').modal('show');
			})
		})
	</script>
@endsection