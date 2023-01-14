@extends('admin.layouts.app')

@section('title', 'TH2-0 | Promo Codes')

@section('css')
  	<link rel="stylesheet" href="{{ url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
	
@endsection

@section('content')
	<div class="content-wrapper">
	    <section class="content-header">
	    	<div class="container-fluid">
	        	<div class="row mb-2">
			        <div class="col-sm-6">
			          <h1>Promo Codes</h1>
			        </div>
	      		</div>
	    	</div>
	    </section>

	    <section class="content">
	    	<div class="row">
	      		<div class="col-12">
	        		<div class="card">
	          			<div class="card-header">
	            			<h3 class="card-title">Promo Code List</h3>
	            			<a href="{{route('admin.promo-codes.create')}}" class="btn btn-primary float-right">Create New Promo Code</a>
	          			</div>
				        <div class="card-body">
				            <table id="example2" class="table table-bordered table-hover">
				                <thead>
					                <tr>
										<th>Sr No.</th>
										<th>Code</th>
										<th>Discount</th>
										<th>Status</th>
										<th>Actions</th>
									</tr>
					            </thead>
				                <tbody>
				                	@foreach($promoCodes as $promoCode)
					                	<tr>
					                		<th>{{$loop->index + 1}}</th>
					                		<td>{{$promoCode->code}}</td>
					                		<td>{{$promoCode->discount_type == 'Percentage' ? $promoCode->discount.' %' : '₹'.$promoCode->discount}}</td>
					                		<td>{{$promoCode->status}}</td>
					                		<td>
					                			<a href="{{route('admin.promo-codes.edit', $promoCode->id)}}" class="btn edit-btn"><i class="fas fa-pencil-alt"></i></a>
					                			<button  class="btn edit-btn delete-package" data-package_id="{{$promoCode->id}}"><i class="far fa-trash-alt"></i></button>
					                			{!! Form::model($promoCode, ['method' => 'delete', 'id' => 'delete-package-'.$promoCode->id, 'route' => ['admin.promo-codes.destroy', $promoCode->id]]) !!}
					                				{{ Form::hidden('id', $promoCode->id) }}
					                			{!! Form::close() !!}
					                		</td>
					                	</tr>
				                	@endforeach
				                </tbody>
			            	</table>
	        			</div>
		        	</div>
		    	</div>
	    	</div>
		</section>
	</div>
@endsection

@section('js')
	<script src="{{ url('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
	
	
	<script type="text/javascript">
		$(function () {
		    $("#example1").DataTable();
		    $('#example2').DataTable({
		      "paging": true,
		      "lengthChange": false,
		      "searching": false,
		      "ordering": true,
		      "info": true,
		      "autoWidth": false,
		    });
		  });

		setTimeout(function() {
		    $('#successMessage').fadeOut('fast');
		}, 10000);
		$(document).on('click', '.delete-package', function(){
			if(confirm("You will not revert promo code again. Do you want to delete this promo code?")){
	            $('#delete-package-'+$(this).data('package_id')).submit();
	        }
		});

	</script>
@endsection