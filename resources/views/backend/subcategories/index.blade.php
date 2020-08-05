@extends('backendtemplate')
@section('title','Subcategories')

@section('content')

<div class="container-fluid">
	<h2 class="d-inline-block">Subcategories List</h2>
	<a href="{{route('subcategories.create')}}" class="btn btn-success float-right btn-sm">Add New</a>
	<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      
      <th scope="col">Name</th>
      
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($subcategories as $subcategory)
    <tr>
      <td>{{$subcategory->id}}</td><!-- table's column name -->
      <td>{{$subcategory->name}}</td>
      
      <td>
      	<a href="{{route('subcategories.edit',$subcategory->id)}}" class="btn btn-warning"><i class='fas fa-edit'></i></a>
            <form method="post" action="{{route('subcategories.destroy',$subcategory->id)}}" class="d-inline-block" onsubmit="return confirm('Are your sure?')">
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