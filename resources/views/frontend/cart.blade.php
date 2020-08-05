@extends('frontendtemplate')

@section('title','Cart')

@section('content')
	<div class="container">
		<h4>Cart Page</h4>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Name/Photo</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Sub Total</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						Item One
						<img src="" class="img-fluid">
					</td>
					<td>100</td>
					<td>2</td>
					<td>300</td>
				</tr>
			</tbody>
		</table>
	</div>
@endsection

@section('script')
	<script type="text/javascript" src="{{asset('frontendtemplate/js/custom.js')}}"></script>
@endsection