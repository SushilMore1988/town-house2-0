@extends('admin.layouts.app')
@section('content')
	<div class="pb-2 border-bottom">
		<div class="form-row">
			<h1 class="col-6">Price Setting List</h1>
			<div class="col-sm-6 text-right">
				<button type="button" class="btn" data-toggle="modal" data-target="#createModal">Create</button>
			</div>
		</div>
	</div>
	@if(session()->has('message'))
		 <p class="alert alert-success time-out-alert">{{session()->get('message')}}</p>
	@elseif(session()->has('error'))
		 <p class="alert alert-danger time-out-alert">{{session()->get('error')}}</p>
	@endif
	<table class="my-4 display patient-table table table-bordered table-hover" id="data_table">
		<thead>
			<tr>
				<th scope="col" >Sr. No.</th>
				<th scope="col" >Type</th>
				<th scope="col" >Price</th>
				<th scope="col" >Action</th>
			    
			</tr>
		</thead>
		<tbody>
			@foreach($priceSettings as $priceSetting)
				<tr data-url="patient-details.html">
					<th scope="row">{{$loop->index+1}}</th>
			      	<td> {{$priceSetting->type}}</td>
			      	<td> {{$priceSetting->price}}</td>
			      	<td>
			      		<a href="{{route('admin.price-setting.destroy',$priceSetting->id)}}"><i class="fas fa-trash-alt"></i></a>
			      		<button type="button" data-toggle="modal" data-target="#editModal" data-id="{{ $priceSetting->id }}" data-type="{{ $priceSetting->type }}" data-price="{{ $priceSetting->price }}" class=" btn editPrice">Edit </button>
			      	</td>	
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection

@section('js')
	<script type="text/javascript">
	</script>
@endsection