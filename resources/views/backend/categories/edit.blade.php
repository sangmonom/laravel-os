@extends('backendtemplate')

@section('title','Categories')
@section('content')
<div class="container-fluid">
	<h2>Category Edit Form</h2>
	
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

<form method="post" action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	
	<div class="form-group row">
		<label for="inputName" class="col-sm-2 col-form-label">Name:</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputName" name="name" value="{{$category->name}}">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-2">
		
			<label>Photo:</label>
		</div>
			<div class="col-sm-10">
				<input type="file"  class="form-control" name="photo" id="inputPhoto">
				<img src="{{asset($category->photo)}}" width="100">
			</div>
	</div>
	
	<div class="form-group row">
		<input type="submit" name="btnsubmit" value="Update" class="btn btn-outline-primary">
	</div>
</form>
</div>
@endsection

