@extends('admin.layouts.app')

@section('title', 'TH2-0 | Create Promo Code')

@section('css')
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{url('/admin/plugins/summernote/summernote-bs4.css')}}">
	

@endsection

@section('content')
	<div class="content-wrapper">
	    <section class="content-header">
	    	<div class="container-fluid">
	        	<div class="row mb-2">
			        <div class="col-sm-6">
			          <h1>Create New Promo Code</h1>
			        </div>
	      		</div>
	    	</div>
	    </section>

	    <section class="content">
	    	<div class="row">
	      		<div class="col-12">
	        		<div class="card">
	          			<div class="card-header">
	            			<h3 class="card-title">Create New Promo Code</h3>
	          			</div>
				        <div class="card-body">
				            {!! Form::open(['route'=>'admin.promo-codes.store']) !!}
					  			<div class="row">
						  			<div class="form-group col-md-12">
						  				<label>Code</label>
						  				{!! Form::text('code', null, ['class' => 'form-control']) !!}
						  				@if ($errors->has('code')) <span class="invalid-feedback d-block" role="alert"><strong>{{ $errors->first('code') }}</strong></span> @endif
						  			</div>
					  				<div class="form-group col-md-12">
						  				<label>Code For</label>
						  				{!! Form::select('code_for', ['cws_listing' => 'CoWork Space Listing', 'cws_booking' => 'CoWork Space Booking'], null, ['class' => 'form-control']) !!}
						  				@if ($errors->has('code_for')) <span class="invalid-feedback d-block" role="alert"><strong>{{ $errors->first('code_for') }}</strong></span> @endif
						  			</div>
					  				<div class="form-group col-md-12">
						  				<label>Discount Type</label>
						  				{!! Form::select('discount_type', ['Percentage' => 'Percentage', 'Money' => 'Money'], null, ['class' => 'form-control']) !!}
						  				@if ($errors->has('discount_type')) <span class="invalid-feedback d-block" role="alert"><strong>{{ $errors->first('discount_type') }}</strong></span> @endif
						  			</div>
						  			<div class="form-group col-md-12 py-2">
						  				<label>Discount</label>
						  				{!! Form::text('discount', null, ['class' => 'form-control ']) !!}
						  				@if ($errors->has('discount')) <span class="invalid-feedback d-block" role="alert"><strong>{{ $errors->first('discount') }}</strong></span> @endif
						  			</div>
						  			<div class="form-group col-md-12 py-2">
						  				<label>Status</label>
						  				<select name="status" class="form-control">
						  					<option value="Active">Active</option>
						  					<option value="InActive">InActive</option>
						  				</select>
						  				@if ($errors->has('status')) <span class="invalid-feedback d-block" role="alert"><strong>{{ $errors->first('status') }}</strong></span> @endif
						  			</div>
						  			<div class="form-group col-md-12 py-2">
						  				<div class="clearfix">
						  					<button class="btn btn-primary float-left">Submit</button>
					  					</div>
						  			</div>
						  		</div>
				  			{!! Form::close() !!}
	        			</div>
		        	</div>
		    	</div>
	    	</div>
		</section>
	</div>
@endsection

@section('js')
	<script type="text/javascript" src="{{url('/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
	<script src="{{ url('admin/plugins/toastr/toastr.min.js') }}"></script>
	
	
	<script type="text/javascript">
		setTimeout(function() {
		    $('#successMessage').fadeOut('fast');
		}, 10000);
		$(function () {
		    // Summernote
		    $('.textarea').summernote()
		});

	  	@if(Session::has('success'))
			toastr.success("{{ Session::get('msg') }}", "success!");
		@endif

		@if(Session::has('error'))
			toastr.error("{{ Session::get('msg') }}");
		@endif
	</script>
@endsection