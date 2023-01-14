@extends('admin.layouts.app')
@section('content')
	<div class=" pt-3 pb-2 border-bottom">
		<div class="form-row py-4">
			<h1 class="col-6">Co-Work Space Packages Listing</h1>
			<a href="{{ route('admin.co-work-space.packages.create') }}" class="btn btn-success">Create Packages</a>
		</div>
	</div>
	<table class="my-4 display patient-table table table-bordered table-hover" id="data_table">
		<thead>
			<tr>
				<th scope="col">	Sr. No. 			</th>
			    <th scope="col">	Package Name			</th>
			    <th scope="col">	Amount		</th>
			    {{-- <th scope="col">	Icon				</th> --}}
			    <th scope="col">	Validity		</th>
			    <th scope="col">	Action				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($packages as $amenity)
				<tr>
					<th scope="row">{{$amenity->id}}</th>
					<td> {{$amenity->package_name}} 	</td>
			      	<td> {{$amenity->amount}} 	</td>
			      	{{-- <td>
			      		<img src="{{url('img/amenity/'.$amenity->icon_image)}}" class="student-img mx-auto"  alt="" />
			      	</td> --}}
			      	<td> {{$amenity->validity}} </td>
			      	<td>
			      		<a href="{{route('admin.co-work-space.packages.edit',$amenity->id)}}"><i class="fas fa-pencil-alt"></i></a>
			      		<a href="#" onclick="confirm('Do you want to delete this?') ? $('#form-{{$amenity->id}}').submit() : ''"><i class="fas fa-trash-alt"></i></a>
                        {!! Form::open(['route' => [ 'admin.co-work-space.packages.destroy', $amenity->id ], 'id' => 'form-'.$amenity->id] ) !!}
                            @method('delete')
                        {!! Form::close() !!}
			      	</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

