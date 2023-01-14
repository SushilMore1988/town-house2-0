@extends('admin.layouts.app')
@section('content')
	<div class=" pt-3 pb-2 border-bottom">
		<div class="form-row py-4">
			<h1 class="col-6">Co-Live Amenity Categories</h1>
			<a href="{{ route('admin.amenity-category.create') }}" class="btn btn-success">Create Amenity Category</a>
		</div>
        @if(session()->has('message'))
            <p class="alert alert-success time-out-alert">{{session()->get('message')}}</p>
        @elseif(session()->has('error'))
            <p class="alert alert-danger time-out-alert">{{session()->get('error')}}</p>
        @endif
	</div>
	<table class="my-4 display patient-table table table-bordered table-hover" id="data_table">
		<thead>
			<tr>
				<th scope="col">	Sr. No. 			</th>
			    <th scope="col">	Category			</th>
			    <th scope="col">	Action				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)
				<tr>
					<th scope="row">{{$category->id}}</th>
					<td> {{$category->name}} 	</td>
			      	<td>
			      		<a href="{{route('admin.amenity-category.edit',$category->id)}}"><i class="fas fa-pencil-alt"></i></a>
			      		<a href="#" onclick="confirm('Do you want to delete this?') ? $('#form-{{$category->id}}').submit() : ''"><i class="fas fa-trash-alt"></i></a>
                        {!! Form::open(['route' => [ 'admin.amenity-category.destroy', $category->id ], 'id' => 'form-'.$category->id] ) !!}
                            @method('delete')
                        {!! Form::close() !!}
			      	</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

