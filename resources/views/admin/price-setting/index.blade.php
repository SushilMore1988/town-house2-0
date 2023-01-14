@extends('admin.layouts.app')
@section('content')
	<div class="pb-2 border-bottom">
		<div class="form-row">
			<h1 class="col-6">TH2-0 Commission</h1>
			<div class="col-sm-6 text-right">
				{{-- <button type="button" class="btn" data-toggle="modal" data-target="#createModal">Create</button> --}}
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

	<div class="pb-2 border-bottom">
		<div class="form-row">
			<h1 class="col-6">Taxes</h1>
			<div class="col-sm-6 text-right">
				<button type="button" class="btn" data-toggle="modal" data-target="#createTaxModal">Create New Tax</button>
			</div>
		</div>
	</div>

	<table class="my-4 display patient-table table table-bordered table-hover" id="data_table">
		<thead>
			<tr>
				<th scope="col" >Sr. No.</th>
				<th scope="col" >Name</th>
				<th scope="col" >Tax</th>
				<th scope="col" >Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($taxes as $tax)
				<tr data-url="patient-details.html">
					<th scope="row">{{$loop->index+1}}</th>
			      	<td> {{$tax->name}}</td>
			      	<td> {{$tax->tax}}</td>
			      	<td>
			      		<a href="javascript:void(0);" data-id="{{$tax->id}}" class="deleteTax"><i class="fas fa-trash-alt"></i></a>
			      		<button type="button" data-toggle="modal" data-target="#editTaxModal" data-id="{{ $tax->id }}" data-name="{{ $tax->name }}" data-tax="{{ $tax->tax }}" class="btn editTaxModal" data-route="{{route('admin.taxes.update', $tax->id)}}">Edit </button>
						{!! Form::open(['method' => 'delete', 'route' => ['admin.taxes.destroy',$tax->id], 'id' => 'tax-destroy-form-'.$tax->id]) !!}
						{!! Form::close() !!}
			      	</td>	
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="pb-2 border-bottom">
		<div class="form-row">
			<h1 class="col-6">Service Charges</h1>
			<div class="col-sm-6 text-right">
				{{-- <button type="button" class="btn" data-toggle="modal" data-target="#createTaxModal">Create New Tax</button> --}}
			</div>
		</div>
	</div>

	<table class="my-4 display patient-table table table-bordered table-hover" id="data_table">
		<thead>
			<tr>
				<th scope="col" >Sr. No.</th>
				<th scope="col" >Charges(in percentage)</th>
				<th scope="col" >Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th scope="row">1</th>
				<td> {{$serviceCharges->charges}}</td>
				<td>
					<button type="button" data-toggle="modal" data-target="#editServiceChargesModal" class="btn editTaxModal">Edit </button>
				</td>	
			</tr>
		</tbody>
	</table>

	<div class="modal" id="createTaxModal">
		<div class="modal-dialog ">
		  <div class="modal-content">
				<div class="modal-header">
				  <h4 class="modal-title">Create New Tax</h4>
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				{!! Form::open(['route' => 'admin.taxes.store']) !!}
					<div class="modal-body">
					  <div class="form-group">
						  <label>Name</label>
						  {!! Form::text('name', null, ['class' => 'form-control']) !!}
						  @if($errors->has('name') && $errors->first('from') == 'createTaxModal')
							  <span class="text text-danger" >
								  <strong>{{ $errors->first('name') }}</strong>
							  </span> 
						  @endif	
					  </div>

					  <div class="form-group">
						  <label>Tax</label>
						  {!! Form::text('tax', null, ['class' => 'form-control']) !!}
						  @if($errors->has('tax') && $errors->first('from') == 'createTaxModal')
							  <span class="text text-danger" >
								  <strong>{{ $errors->first('tax') }}</strong>
							  </span> 
						  @endif	
					  </div>
					</div>
					<div class="modal-footer">
					  <button type="submit" class="btn btn-success">Submit</button>
					</div>
				{!! Form::close() !!}	
		  </div>
		</div>
  	</div>

	<div class="modal" id="editTaxModal">
		<div class="modal-dialog ">
		<div class="modal-content">
				<div class="modal-header">
				<h4 class="modal-title">Edit New Tax</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				{!! Form::open(['method' => 'patch', 'route' => ['admin.taxes.update', 1], 'id' => 'updateTaxForm' ]) !!}
					<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						{!! Form::text('name', null, ['class' => 'form-control', 'id' => "edit-name"]) !!}
						@if($errors->has('name') && $errors->first('from') == 'editTaxModal')
							<span class="text text-danger" >
								<strong>{{ $errors->first('name') }}</strong>
							</span> 
						@endif	
					</div>
					<div class="form-group">
						<label>Tax</label>
						{!! Form::text('tax', null, ['class' => 'form-control', 'id' => 'edit-tax']) !!}
						@if($errors->has('tax') && $errors->first('from') == 'editTaxModal')
							<span class="text text-danger" >
								<strong>{{ $errors->first('tax') }}</strong>
							</span> 
						@endif	
					</div>
					</div>
					<div class="modal-footer">
					<button type="submit" class="btn btn-success">Submit</button>
					</div>
				{!! Form::close() !!}	
		</div>
		</div>
	</div>


	<div class="modal" id="editServiceChargesModal">
		<div class="modal-dialog ">
		<div class="modal-content">
				<div class="modal-header">
				<h4 class="modal-title">Edit Service Charges</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				{!! Form::open(['method' => 'patch', 'route' => ['admin.service-charges.update', $serviceCharges->id], 'id' => 'updateTaxForm' ]) !!}
					<div class="modal-body">
						<div class="form-group">
							<label>Charges</label>
							{!! Form::text('charges', $serviceCharges->charges, ['class' => 'form-control', 'id' => "edit-charges"]) !!}
							@if($errors->has('charges') && $errors->first('from') == 'editServiceChargesModal')
								<span class="text text-danger" >
									<strong>{{ $errors->first('charges') }}</strong>
								</span> 
							@endif	
						</div>
					</div>
					<div class="modal-footer">
					<button type="submit" class="btn btn-success">Submit</button>
					</div>
				{!! Form::close() !!}	
		</div>
		</div>
	</div>
	
	<div class="modal" id="createModal">
	  	<div class="modal-dialog ">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h4 class="modal-title">Create Price</h4>
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	      		</div>
	      		{!! Form::open(['route' => 'admin.price-setting.store']) !!}
		      		<div class="modal-body">
		        		<div class="form-group">
		        			<label>Type</label>
		        			<select class="form-control" name="type">
		        				<option value="percentage">percentage</option>
		        				<option value="price">price</option>
		        			</select>
		        		</div>
		        		<div class="form-group">
		        			<label>Value</label>
		        			{!! Form::text('price', null, ['class' => 'form-control']) !!}
		        			@if($errors->has('price') && $errors->first('from') == 'createModal')
		        				<span class="text text-danger" >
		        					<strong>{{ $errors->first('price') }}</strong>
		        				</span> 
		        			@endif	
		        		</div>
		      		</div>
			      	<div class="modal-footer">
		        		<button type="submit" class="btn btn-success">Submit</button>
		      		</div>
		      	{!! Form::close() !!}	
	    	</div>
	  	</div>
	</div>

	<div class="modal" id="editModal">
	  	<div class="modal-dialog ">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h4 class="modal-title">Edit Price</h4>
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	      		</div>
	      		{!! Form::open(['route' => 'admin.price-setting.update']) !!}
	      			{!! Form::hidden('price_setting_id', null, ['id' => 'price_setting_id']) !!}
		      		<div class="modal-body">
		        		<div class="form-group">
		        			<label>Type</label>
		        			<select class="form-control" name="type" id="type">
		        				<option value="percentage">percentage</option>
		        				<option value="price">price</option>
		        			</select>
		        		</div>
		        		<div class="form-group">
		        			<label>Value</label>
		        			{!! Form::text('price', null, ['class' => 'form-control', 'id' => 'price']) !!}
		        			@if($errors->has('price') && $errors->first('from') == 'editModal')
		        				<span class="text text-danger" >
		        					<strong>{{ $errors->first('price') }}</strong>
		        				</span> 
		        			@endif	
		        		</div>
		      		</div>
			      	<div class="modal-footer">
		        		<button type="submit" class="btn btn-success">Submit</button>
		      		</div>
		      	{!! Form::close() !!}	
	    	</div>
	  	</div>
	</div>

@endsection

@section('js')
	<script type="text/javascript">
		@if($errors->first('from') == 'createModal')
			$(document).ready(function(){
			    $('#createModal').modal({show: true});
			});
		@endif

		@if($errors->first('from') == 'editModal')
			$(document).ready(function(){
			    $('#editModal').modal({show: true});
			});
		@endif

		@if($errors->first('from') == 'editServiceChargesModal')
			$(document).ready(function(){
			    $('#editServiceChargesModal').modal({show: true});
			});
		@endif

		@if($errors->first('from') == 'editTaxModal')
			$(document).ready(function(){
			    $('#editTaxModal').modal({show: true});
			});
		@endif

		@if($errors->first('from') == 'createTaxModal')
			$(document).ready(function(){
			    $('#createTaxModal').modal({show: true});
			});
		@endif

		@if($errors->first('from') == 'editServiceChargesModal')
			$(document).ready(function(){
			    $('#editServiceChargesModal').modal({show: true});
			});
		@endif

		$('.editPrice').on('click', function(){ 
			$('#price_setting_id').val($(this).data('id'));
			$('#price').val($(this).data('price'));
		});

		$(document).on('click', '.deleteTax', function(){
			if(confirm('Do you want to delete this tax?')){
				$('#tax-destroy-form-'+$(this).data('id')).submit();
			}
		});

		$(document).on('click', '.editTaxModal', function(){
			$('#updateTaxForm').prop('action', $(this).data('route'));
			$('#edit-name').val($(this).data('name'));
			$('#edit-tax').val($(this).data('tax'));
		});
	</script>
@endsection