@extends('backendtemplate')

@section('title','Brands')
@section('content')
<div class="container-fluid">
	<h2>Brands Create Form</h2>
	
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

<form method="post" action="{{route('brands.store')}}" enctype="multipart/form-data">
	@csrf
	
	<div class="form-group row">
		<label for="inputBrand" class="col-sm-2 col-form-label">Name:</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputName" name="name">
				@error('name')
					<span class="text-danger">{{ $message }}</span>
				@enderror
		</div>
	</div>
	<div class="form-group row">
		<label for="inputPhoto" class="col-sm-2 col-form-label">Photo:</label>
		<div class="col-sm-10">
			<input type="file" class="form-control-file" id="inputPhoto" name="photo">
				@error('photo')
					<span class="text-danger">{{ $message }}</span>
				@enderror
		</div>
	</div>
	
	<div class="form-group row">
		<input type="submit" name="btnsubmit" value="Save" class="btn btn-outline-primary">
	</div>
</form>
</div>
@endsection