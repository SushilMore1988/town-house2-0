@extends('admin.layouts.app')
@section('content')
	<div class=" pt-3 pb-2 border-bottom">
		<div class="form-row py-4">
			<h1 class="col-6">CoWorkSpace Listing</h1>
			<a href="{{ route('admin.facilities') }}" class="btn btn-success">Create Facility</a>
		</div>
	</div>
	<table class="my-4 display patient-table table table-bordered table-hover" id="data_table">
		<thead>
			<tr>
				<th scope="col">	Sr. No. 			</th>
			    <th scope="col">	Category			</th>
			    <th scope="col">	Facility Name		</th>
			    <th scope="col">	Icon				</th>
			    <th scope="col">	Rating Value		</th>
			    <th scope="col">	Action				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($facilities as $facility)
				<tr>
					<th scope="row">{{$facility->id}}</th>
					<td> {{$facility->cwsFacilityCategory->name}} 	</td>
			      	<td> {{$facility->value}} 	</td>
			      	<td>
			      		<img src="{{url('img/cowork/facility-icon/'.$facility->icon_image)}}" class="student-img mx-auto"  alt="" />
			      	</td>
			      	<td> {{$facility->rating_category}} </td>
			      	<td>
			      		<a href="{{route('admin.facility.edit',$facility->id)}}"><i class="fas fa-pencil-alt"></i></a>
			      		<a href="{{route('admin.facility.destroy',$facility->id)}}"><i class="fas fa-trash-alt"></i></a>
			      	</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

