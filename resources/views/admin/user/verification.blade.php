@extends('admin.layouts.app')

@section('css')
	
	<link rel="stylesheet" type="text/css" href="{{url('/plugins/DataTables/datatables.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('/plugins/DataTables/DataTablesCSV/css/buttons.dataTables.min.css')}}"/>
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
	<div class="pb-2 border-bottom">
		<div class="form-row">
			<h1 class="col-6">User Verification Listing</h1>
		</div>
	</div>
	<table class="my-4 display patient-table table table-bordered table-hover" id="data_table">
		<thead>
			<tr>
				<th scope="col">Sr. No.</th>
			    <th >Name</th>
			    <th scope="col">Contact</th>
			    <th scope="col">Selfie</th>
				<th scope="col">Government ID-1</th>
				<th scope="col">Government ID-2</th>
			</tr>
		</thead>
		<tbody>
			@foreach($userVerifications as $userVerification)
				<tr data-url="patient-details.html">
					<th scope="row">{{$loop->index +1}}</th>
			      	<td> {{$userVerification->fname .' '.$userVerification->lname}}</td>
			      	<td> {{$userVerification->email}} <br> {{$userVerification->phone}}</td>
			      	<td> 
				      	@if(!empty($userVerification->images) && $userVerification->images['selfie']['name'] != null)
				      		<a title="ImageName" class="pop" target="_blank" href="{{ url("/img/user/selfie/".$userVerification->images['selfie']['name']) }}">
				      			<i class="fa fa-eye"></i>
				      		</a><br/>
				      	@endif 
				      	@if(!empty($userVerification->images) && $userVerification->images['selfie']['is_approved'] == 'Pending Approval')
					      	<select name="status" class="form-control mt-3 status" data-id="{{$userVerification->id}}" data-type="selfie" >
					      		<option value="1" {{ $userVerification->images['selfie']['is_approved'] == 1 ? 'selected="selected"' : '' }}>Approve</option>
					      		<option value="0" {{ $userVerification->images['selfie']['is_approved'] == 0 ? 'selected="selected"' : '' }}>Reject</option>
					      		<option value="pending_approval" {{ $userVerification->images['selfie']['is_approved'] == 'Pending Approval' ? 'selected="selected"' : '' }}>Pending Approval</option>
					      	</select>
				      	@elseif(empty($userVerification->images) || $userVerification->images['selfie']['is_approved'] == null)
				      		Not uploaded
				      	@else
				      		@if(!empty($userVerification->images) && $userVerification->images['selfie']['is_approved'] == 1)
				      			<button type="button" class="btn btn-success mt-3">Approved</button>
				      		@else
				      			<button type="button" class="btn btn-danger mt-3">Rejected</button>
				      		@endif
				      	@endif
				    </td>
		          	<td> 
						  {{-- {{dd($userVerification->images['government_id'][0]['name'])}} --}}
				      	@if(!empty($userVerification->images) && !empty($userVerification->images['government_id'][0]['name'] ))
				      		<a title="ImageName" class="pop" target="_blank" href="{{ url("/img/user/government-id/".$userVerification->images['government_id'][0]['name']) }}">
				      			<i class="fa fa-eye"></i>
				      		</a><br/>
				      	@endif 
				      	@if(!empty($userVerification->images) && !empty($userVerification->images['government_id'][0]['is_approved']) && $userVerification->images['government_id'][0]['is_approved'] == 'Pending Approval')
					      	<select name="status" class="form-control mt-3 status" data-id="{{$userVerification->id}}" data-type="government_id1">
					      		<option value="1" {{ $userVerification->images['government_id'][0]['is_approved'] == 1 ? 'selected="selected"' : '' }}>Approve</option>
					      		<option value="0" {{ $userVerification->images['government_id'][0]['is_approved'] == 0 ? 'selected="selected"' : '' }}>Reject</option>
					      		<option value="pending_approval" {{ $userVerification->images['government_id'][0]['is_approved'] == 'Pending Approval' ? 'selected="selected"' : '' }}>Pending Approval</option>
					      	</select>
				      	@elseif(empty($userVerification->images) || empty($userVerification->images['government_id'][0]['is_approved']))
				      		Not uploaded
				      	@else
				      		@if(!empty($userVerification->images) && $userVerification->images['government_id'][0]['is_approved'] == 1)
				      			<button type="button" class="btn btn-success mt-3">Approved</button>
				      		@else
				      			<button type="button" class="btn btn-danger mt-3">Rejected</button>
				      		@endif
				      	@endif
				    </td>
					<td> 
						@if(!empty($userVerification->images) && !empty($userVerification->images['government_id'][1]['name']))
							<a title="ImageName" class="pop" target="_blank" href="{{ url("/img/user/government-id/".$userVerification->images['government_id'][1]['name']) }}">
								<i class="fa fa-eye"></i>
							</a><br/>
						@endif 
						@if(!empty($userVerification->images) && !empty($userVerification->images['government_id'][1]['is_approved']) && $userVerification->images['government_id'][1]['is_approved'] == 'Pending Approval')
							<select name="status" class="form-control mt-3 status" data-id="{{$userVerification->id}}" data-type="government_id2">
								<option value="1" {{ $userVerification->images['government_id'][1]['is_approved'] == 1 ? 'selected="selected"' : '' }}>Approve</option>
								<option value="0" {{ $userVerification->images['government_id'][1]['is_approved'] == 0 ? 'selected="selected"' : '' }}>Reject</option>
								<option value="pending_approval" {{ $userVerification->images['government_id'][1]['is_approved'] == 'Pending Approval' ? 'selected="selected"' : '' }}>Pending Approval</option>
							</select>
						@elseif(empty($userVerification->images) || empty($userVerification->images['government_id'][1]['is_approved']))
							Not uploaded
						@else
							@if(!empty($userVerification->images) && $userVerification->images['government_id'][1]['is_approved'] == 1)
								<button type="button" class="btn btn-success mt-3">Approved</button>
							@else
								<button type="button" class="btn btn-danger mt-3">Rejected</button>
							@endif
						@endif
				  </td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection

@section('js')
	<script type="text/javascript" src="{{url('/plugins/DataTables/datatables.min.js')}}"></script>
	
	
	<script type="text/javascript">
		$(document).ready(function() {
			    // Setup - add a text input to each footer cell
			    var filterIndexes = [ 1, 2, 3 ];
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
			        dom: 'Bfrtip',
		            buttons: [
		                'excel', 'pdf', 'print'
		            ]
			    } );
			} );

		$(document).on('change', '.status', function(){
		 	$.ajax({
				dataType: 'json',
				url : '{{ url('admin/user/verify') }}/'+$(this).val()+'/'+$(this).data('id')+'/'+$(this).data('type'),
				type : 'get',
				success: function(data) { 
					if (data.message == "success") {
						// $('.successMsg').append('<div class="alert alert-success">Status Changed Successfully!</div>'); 
						// alert(data.message);
						//window.location.reload();
						toastr.success('Status Changed Successfully');

					} else {
					    alert("Error in changing status.");
					}
		        }
			});
			 
		});
	</script>
@endsection