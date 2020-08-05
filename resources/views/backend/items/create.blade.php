@extends('backendtemplate')

@section('title','Items')
@section('content')
<div class="container-fluid">
	<h2>Items Create Form</h2>
	
	{{--Must show related input errors --}}

		@if ($errors->any())
    		<div class="alert alert-danger">
        		<ul>
            	@foreach ($errors->all() as $error)
                	<li>{{ $error }}</li>
            	@endforeach
        	</ul>
    		</div>
	}
	}
@endif

<form method="post" action="{{route('items.store')}}" enctype="multipart/form-data">
	@csrf
	<div class="form-group row">
		<div class="col-sm-2">
			<label>CodeNo:</label>
		</div>
			<div class="col-sm-10">
				<input type="text"  class="form-control" name="codeno" id="inputCodeno">
			</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-2">
			<label>Name:</label>
		</div>
			<div class="col-sm-10">
				<input type="text"  class="form-control" name="name" id="inputName">
			</div>
		
	</div>
	<div class="form-group row">
		<div class="col-sm-2">
		
			<label>Photo:</label>
		</div>
			<div class="col-sm-10">
				<input type="file"  class="form-control" name="photo" id="inputPhoto">
			</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-2">
			<label>Price:</label>
		</div>
			<div class="col-sm-10">
				<input type="text"  class="form-control" name="price" id="inputPrice">
			</div>
		
	</div>
	<div class="form-group row">
		<div class="col-sm-2">
			<label>Discount:</label>
		</div>
			<div class="col-sm-10">
				<input type="text"  class="form-control" name="discount" id="inputDiscount" value="0">
			</div>
		
	</div>
	<div class="form-group row">
		<div class="col-sm-2">
			<label>Description:</label></div>
			<div class="col-sm-10">
				<textarea name="description" id="inputDescription" class="form-control"></textarea>
			</div>
		
	</div>
	<div class="form-group row">
		<label for="inputBrand" class="col-sm-2 col-form-label">Brand:</label>
		<div class="col-sm-10">
			<select name="brand" class="form-control">
				<optgroup label="Choose Brand">
					@foreach($brands as $brand)
					<option value="{{$brand->id}}">{{$brand->name}}</option>
					@endforeach
				</optgroup>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="inputSubcategory" class="col-sm-2 col-form-label">Subcategory:</label>
		<div class="col-sm-10">
			<select name="subcategory" class="form-control">
				<optgroup label="Choose Subcategory">
					@foreach($subcategories as $subcategory)
					<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
					@endforeach
				</optgroup>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<input type="submit" name="btnsubmit" value="Save" class="btn btn-outline-primary">
	</div>
</form>
</div>
@endsection