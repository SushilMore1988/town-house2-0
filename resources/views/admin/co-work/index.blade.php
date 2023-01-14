@extends('admin.layouts.app')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{url('/plugins/DataTables/datatables.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('/plugins/DataTables/DataTablesCSV/css/buttons.dataTables.min.css')}}"/>
	
   	<style type="text/css">
	    .checked {
	      color: orange;
	    }
	</style>
	<style type="text/css">
		.dataTables_filter{
			display: block !important;
		}
		.input[type="text"]{
			width: auto;
		}
		.dataTable input[type="text"] {
			width: auto;
		}
		.table td{
			padding: 0.25rem;
		}
		.w-15{
			width: 15%;
		}
	</style>
@endsection

@section('content')

<div class="col-12 main-menu">
	<div id="successMsg"></div>
	<table class="patient-table table table-hover my-5 nowrap display" id="data_table">
		<thead>
			<th>Sr. No.</th>
		    <th>CoWorkSpace Name</th>
		    <th>Contact</th>
		    <th>Views</th>
		    <th>Subscription</th>
		    <th>Social Media URL's</th>
		    <th>Action</th>
		    <th>Add review</th>
		    <th>Delete Request by owner</th>
		</thead>
		<tbody>
			@foreach($coWorkSpaces as $coWorkSpace)
			<tr data-url="new-patient-detail.html">
		      	<td>{{$loop->index + 1}}</td>
		      	<td><a target="_blank" href="{{url('explore/'.$coWorkSpace->slug)}}">{{$coWorkSpace->name}}</a></td>
		      	<td>
		      		@if(!empty($coWorkSpace->contact_details['email_id']))
			      		{{$coWorkSpace->contact_details['email_id']}}<br>
			      	@endif	
		      		
		      		@if(!empty($coWorkSpace->contact_details['phone']))
		      			{{$coWorkSpace->contact_details['phone']}}
		      		@endif	
		      	</td>
		      	<td>{{ views($coWorkSpace)->unique()->count() }}</td>
		      	<td> 
			      	@if($coWorkSpace->cwsPackage)
				      	@php
				      		$package = App\Models\Package::where('id', $coWorkSpace->cwsPackage->package_id)->first();
				      	@endphp
			      	{{ $package->package_name }}
				    @endif
			    </td>  	
		      	<td>
		      		@if(!empty($coWorkSpace->contact_details['website']))
		      			{{ $coWorkSpace->contact_details['website'] }}<br>
		      		@endif
		      		@if(!empty($coWorkSpace->contact_details['facebook_url']))
		      			{{ $coWorkSpace->contact_details['facebook_url'] }}<br>
		      		@endif
		      		@if(!empty($coWorkSpace->contact_details['twitter_url']))
		      			{{ $coWorkSpace->contact_details['twitter_url'] }}<br>
		      		@endif
		      		@if(!empty($coWorkSpace->contact_details['instagram_url']))
		      			{{ $coWorkSpace->contact_details['instagram_url'] }}<br>
		      		@endif
		      	</td>
		      	<td> 
		      		@php
	      				$status = $coWorkSpace->is_approved;
	      				$is_approved = $coWorkSpace->is_approved;
	      				$admin_status = $coWorkSpace->admin_status;

	      			@endphp	 
		      		
					@if($is_approved == 0 && $admin_status == "Pending Approval")
						<select name="status" class="status status{{ $coWorkSpace->id }} form-control" data-value="{{$coWorkSpace->id}}" data-name="{{ $coWorkSpace->name }}">
							<option @if($status == "Pending Approval") selected="selected" @endif>Pending Approval</option>
							<option value="0" @if($status == '0') selected="selected" @endif>Reject</option>
							<option value="1" @if($status == '1') selected="selected" @endif>Approve</option>
						</select>
		      		@elseif($is_approved == "pending approval")
			      		<select name="status" class="status status{{ $coWorkSpace->id }} form-control" data-value="{{$coWorkSpace->id}}" data-name="{{ $coWorkSpace->name }}">
			      			<option @if($status == "Pending Approval") selected="selected" @endif>Pending Approval</option>
			      			<option value="0" @if($status == '0') selected="selected" @endif>Reject</option>
			      			<option value="1" @if($status == '1') selected="selected" @endif>Approve</option>
			      		</select>
			      		{{-- <select name="status" class="admin_status admin_status{{$coWorkSpace->id}} form-control d-none" data-value="{{$coWorkSpace->id}}"  data-name="{{ $coWorkSpace->name }}">
			      			<option value="Active" @if($admin_status == "Active") selected="selected" @endif>Active</option>
			      			<option value="In-active" @if($admin_status == "In-active") selected="selected" @endif>In-active</option>
			      		</select> --}}
			      	@elseif($is_approved == 1)	
			      		<select name="status" class="admin_status admin_status{{$coWorkSpace->id}} form-control" data-value="{{$coWorkSpace->id}}" data-name="{{ $coWorkSpace->name }}">
			      			<option value="Active" @if($admin_status == "Active") selected="selected" @endif>Active</option>
			      			<option value="In-active" @if($admin_status == "In-active") selected="selected" @endif>In-active</option>
			      		</select>
			      	@else	
			      		<select name="status" class="form-control">
			      			<option selected="selected">Rejected</option>
			      		</select>
			      	@endif
			      	
		      	</td>
		      	<td>
		      		<a href="{{route('admin.co-work-space.master.index',$coWorkSpace->id)}}"> Add Review </a>	
		      	</td>
		      	<td>
		      		@if($coWorkSpace->delete_request == 1)
		      			<a href="{{route('admin.co-work-space.destroy',$coWorkSpace->id)}}"><i class="fas fa-trash-alt"></i></a>
		      		@endif
		      	</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

{{-- <div class="modal" id="ratingModal">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h4 class="modal-title">Cowork space Rating</h4>
      		</div>
	      	<div class="modal-body rating-div">
	      		<label id="cwsName"> </label>
	      		<div>
	        		<span class="fa fa-star rating" data-value="1"></span>
	        		<span class="fa fa-star rating" data-value="2"></span>
	        		<span class="fa fa-star rating" data-value="3"></span>
	        		<span class="fa fa-star rating" data-value="4"></span>
	        		<span class="fa fa-star rating" data-value="5"></span>
	      		</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-success submitRating" data-dismiss="modal">Submit</button>
      		</div>
    	</div>
  	</div>
</div> --}}

@endsection

@section('js')
	<script type="text/javascript" src="{{url('/plugins/DataTables/datatables.min.js')}}"></script>
	
	
	<script type="text/javascript">

		$(document).ready(function() {
			    // Setup - add a text input to each footer cell
			    var filterIndexes = [ 1, 2, 3, 4, 5, 6, 7 ];
			    $('#data_table thead tr').clone(true).appendTo( '#data_table thead' );
			    $('#data_table thead tr:eq(1) th').each( function (i) {
			        if ($.inArray(i, filterIndexes) != -1) {
			            var title = $(this).text();
			            
			            $(this).html( '<input type="text" placeholder="" />' );
			     
			            $( 'input', this ).on( 'keyup change', function () {
			                if ( table.column(i).search() !== this.value ) {
			                    table
			                        .column(i)
			                        .search( this.value )
			                        .draw();
			                }
			            } );
			        }else{
			            $(this).html( '' );
			        }
			    } );
			    var table = $('#data_table').DataTable( {
			        orderCellsTop: true,
			        fixedHeader: true,
					scrollX: true,
			        dom: 'Bfrtip',
		            buttons: [
		                'excel', 'pdf', 'print'
		            ]
			    } );
			} );

		$('.status').on('change', function(){ 
			is_approved = $(this).val();  
			cowork_space_id = $(this).data('value');
			// $('#cwsName').html('<div class="form-group"><span class="text">Rate '+$(this).data('name')+'</span></div>');
			// if($(this).val() == 1){
			// 	$('#ratingModal').show();
			// }else{
				$.ajax({
					url : '{{ url('admin/co-work-space/status') }}/'+cowork_space_id+'/'+is_approved,
					type: 'GET',
					success: function(data){
						// $('#successMsg').append('<span class="text text-success">Status changed successfully!</span>');
						window.location.reload();
						toastr.success("Status changed successfully!!");
					},
				});
			// }
		});

		// $('.rating').on('click', function(){ 
		// 	rating = $(this).data('value'); 
		// 	$('.rating').removeClass('checked');
		// 	$(this).addClass('checked');
		// 	$(this).prevAll().addClass('checked');
		// });

		// $('.submitRating').on('click', function(){
		// 	$.ajax({
		// 		url : '{{ url('admin/co-work-space/rating') }}/'+cowork_space_id+'/'+rating,
		// 		type: 'GET',
		// 		success: function(data){
		// 			// $('#successMsg').append('<span class="text text-success">Status changed successfully!</span>');
		// 			$('.status'+cowork_space_id).addClass('d-none');
		// 			$('.admin_status'+cowork_space_id).removeClass('d-none');
		// 			toastr.success("Status changed successfully!!");
		// 			$('.rating').removeClass('checked');
		// 			$('#ratingModal').hide();

		// 		},
		// 	});

		// });

		$('.admin_status').on('change', function(){ 
			status = $(this).val();  
			cowork_space_id = $(this).data('value');
			
			$.ajax({
				url : '{{ url('admin/co-work-space/admin-status') }}/'+cowork_space_id+'/'+status,
				type: 'GET',
				success: function(data){
					// $('#successMsg').append('<span class="text text-success">Status changed successfully!</span>');
					toastr.success("Status changed successfully!!");
				},
			});
		});
	</script>	
@endsection