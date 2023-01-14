@extends('admin.layouts.app')
@section('content')
<div class="pb-2 border-bottom">
		<div class="form-row">
			<h1 class="col-6">Develop Property</h1>
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
				<th scope="col">Sr. No.</th>
			    <th scope="col">Name</th>
			    <th scope="col">Email</th>
			    <th scope="col">Phone</th>
			    <th scope="col">City</th>
			    <th scope="col">Role</th>
			    <th scope="col">Service</th>
			    <th scope="col">Address</th>
			    <th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($develops as $develop)
				<tr data-url="">
					<th scope="row">{{$loop->index+1}}</th>
			      	<td> {{$develop->name}}</td>
			      	<td> {{$develop->email}} </td>
			      	<td> {{$develop->phone}} </td>
			      	<td> {{$develop->city}} </td>
			      	<td> {{$develop->role}} </td>
			      	<td> {{$develop->service}} </td>
			      	<td> {{$develop->address}} </td>
			      	<td> 
			      		<button type="button" class="btn btn-success developButton" data-value="{{ $develop->id }}">Add Feedback</button> 
			      		<button type="button" class="btn btn-success">View Feedback</button>
			      	</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="modal" id="feedbackModal">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h4 class="modal-title">Feedback</h4>
	      		</div>
	      		{!! Form::open(['route' => 'admin.feedback']) !!}
	      			{!! Form::hidden('develop_id', null, ['id' =>'develop_id']) !!}
			      	<div class="modal-body">
		        		<div class="form-group">
		        			<label for="">Feedback (Maximum 500 characters)</label>
		        			{!! Form::textarea('feedback', null, ['rows' => 3]) !!}
			  				@if($errors->has('feedback')) 
					  			<div class="text-danger mt-1">	
									{{ $errors->first('feedback') }}
								</div>
							@endif
		        		</div>
		      		</div>
		      		<div class="modal-footer">
		        		<button type="submit" class="btn btn-danger">Submit</button>
		      		</div>
		      	{!! Form::close() !!}	
	    	</div>
	  	</div>
	</div>
@endsection

@section('js')
	<script type="text/javascript">
		$('.developButton').on('click', function(){
			$('#develop_id').val($(this).data('value'));
			$('#feedbackModal').show();
		});

	</script>
	@if($errors->has('feedback')) {  
		<script src=""> 
		$('#feedbackModal').show();
			
		</script>
	@endif
@endsection