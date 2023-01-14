@extends('admin.layouts.app')

@section('css')
	
	<link rel="stylesheet" type="text/css" href="{{url('/plugins/DataTables/datatables.min.css')}}">
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
			<h1 class="col-6">User Listing</h1>
			{{-- <div class="col-sm-6 text-right">
				<a href="create-membership.html" class="form-group">
					<button type="button" class="btn">Add User</button>
				</a>
			</div> --}}
		</div>
	</div>
	<table class="my-4 display patient-table table table-bordered table-hover" id="data_table">
		<thead>
			<tr>
				<th scope="col">Sr. No.</th>
			    <th scope="col">Name</th>
			    <th scope="col">Email</th>
			    <th scope="col">Contact</th>
			    <th scope="col">CoWorkSpace</th>
			    <th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr data-url="patient-details.html">
					<th scope="row">{{$loop->index +1}}</th>
			      	<td> {{$user->fname .' '.$user->lname}}</td>
			      	<td> {{$user->email}} </td>
			      	<td> {{$user->phone}} </td>
			      	<td>
			      		{{-- <a href="javascript:void(0)"><i class="fas fa-pencil-alt"></i></a> --}}
			      		<a href="{{ route('admin.user-co-work-spaces',$user->id)}}"> {{ count($user->cws) }} </a>
			      	</td>
			      	<td>
			      		@if($user->trashed())
			      			<i class="fa fa-lock user-status" data-user_id="{{ $user->id }}" data-status="un-block" aria-hidden="true">Unblock</i>
			      		@else	
			      			<i class="fa fa-unlock-alt user-status" data-user_id="{{ $user->id }}" data-status="block" aria-hidden="true">Block</i>
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

		
		$('.user-status').on('click', function(){ 
			var status = $(this).data('status'); 
			var user_id = $(this).data('user_id'); 
			$.ajax({
				url : '{{ url('admin/user/status') }}/'+user_id+'/'+status,
				type: 'GET',
				success: function(data){
					toastr.success(data.message);
					window.location.reload();
				},
			});
		})
	</script>
@endsection