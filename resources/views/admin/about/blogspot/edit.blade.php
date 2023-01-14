@extends('admin.layouts.app')

@section('title', 'TH2-0 | Edit Blog Spot')

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
			          <h1>Edit BlogSpot</h1>
			        </div>
	      		</div>
	    	</div>
	    </section>

	    <section class="content">
	    	<div class="row">
	      		<div class="col-12">
	        		<div class="card">
	          			<div class="card-header">
	            			<h3 class="card-title">Edit BlogSpot</h3>
	          			</div>
				        <div class="card-body">
				            {!! Form::model($blogSpot, ['route'=> ['admin.about.blogspot.update',$blogSpot->id]]) !!}
					  			<div class="row">
						  			<div class="form-group col-md-12">
						  				<label>Code</label>
						  				{!! Form::text('title', null, ['class' => 'form-control']) !!}
						  				@if ($errors->has('title')) <span class="invalid-feedback d-block" role="alert"><strong>{{ $errors->first('title') }}</strong></span> @endif
						  			</div>
					  				
						  			<div class="form-group col-md-12 py-2">
						  				<label>Discount</label>
						  				{!! Form::text('written_by', null, ['class' => 'form-control ']) !!}
						  				@if ($errors->has('written_by')) <span class="invalid-feedback d-block" role="alert"><strong>{{ $errors->first('written_by') }}</strong></span> @endif
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
	
	<script type="text/javascript">
		setTimeout(function() {
		    $('#successMessage').fadeOut('fast');
		}, 10000);
		$(function () {
		    // Summernote
		    $('.textarea').summernote()
		});

	</script>
@endsection