@extends('admin.layouts.app')

@section('title', 'TH2-0 | Create Terms And Condition')

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
			          <h1>Create New Terms and Condition</h1>
			        </div>
	      		</div>
	    	</div>
	    </section>

	    <section class="content">
	    	<div class="row">
	      		<div class="col-12">
	        		<div class="card">
	          			<div class="card-header">
	            			<h3 class="card-title">Create New Terms and Condition</h3>
	          			</div>
				        <div class="card-body">
				            {!! Form::open(['route'=> ['admin.about.term.store']]) !!}
					  			<div class="row">
						  			<div class="form-group col-md-12">
						  				<label>Title</label>
						  				{!! Form::text('title', null, ['class' => 'form-control']) !!}
						  				@if ($errors->has('title')) <span class="invalid-feedback d-block" role="alert"><strong>{{ $errors->first('title') }}</strong></span> @endif
						  			</div>
					  				
						  			<div class="form-group col-md-12 py-2">
						  				<label>Category</label>
						  				{!! Form::text('category', null, ['class' => 'form-control ']) !!}
						  				@if ($errors->has('category')) 
						  					<span class="invalid-feedback d-block" role="alert">
						  						<strong>{{ $errors->first('category') }}</strong>
						  					</span> 
					  					@endif
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