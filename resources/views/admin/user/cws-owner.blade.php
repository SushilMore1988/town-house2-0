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
			<h1 class="col-6">CoWorkSpace Owner Listing</h1>
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
			    <th >Name</th>
			    <th scope="col">Email</th>
			    <th scope="col">Phone</th>
			</tr>
		</thead>
		<tbody>
			@foreach($owners as $owner)
				<tr data-url="patient-details.html">
					<th scope="row">{{$loop->index +1}}</th>
			      	<td> {{$owner->fname .' '.$owner->lname}}</td>
			      	<td> {{$owner->email}} </td>
			      	<td> {{$owner->phone}} </td>
			      	
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
	</script>
@endsection