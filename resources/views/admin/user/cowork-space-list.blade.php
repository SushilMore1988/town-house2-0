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
	<div class=" pt-3 pb-2 border-bottom">
		<div class="form-row py-4">
			<h1 class="col-6">CoWorkSpace Listing</h1>
		</div>
	</div>
	<table class="my-4 display patient-table table table-bordered table-hover" id="data_table">
		<thead>
			<tr>
				<th scope="col">Sr. No.</th>
				<th scope="col">User Name</th>
			    <th scope="col">Cover Image </th>
			    <th scope="col">CoWorkSpace Name </th>
			    <th scope="col">Email</th>
			    <th scope="col">Contact</th>
			    <th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($coWorkSpaces as $coWorkSpace)
				<tr>
					<th scope="row">{{$loop->index + 1}}</th>
					<th> {{$coWorkSpace->User->fname.' '.$coWorkSpace->User->lname}}</th>
					{{-- <a href="{{ route('front.explore',$coWorkSpace->slug)}}" > --}}
			      	<td>
			      		@if(!empty($coWorkSpace->images['cover']))
			      			<img src="{{url('img/cowork/cover/'.$coWorkSpace->images['cover'])}}" class="student-img mx-auto"  />
			      		@endif
			      	</td>
			      	<td>
			      		<a target="_blank" href="{{ route('front.explore',$coWorkSpace->slug)}}">{{$coWorkSpace->name}}</a>
			      	</td>
			      	<td> {{$coWorkSpace->contact_details['email_id']}} </td>
			      	<td> {{$coWorkSpace->contact_details['phone']}} </td>
			      {{-- </a> --}}
			      	<td>
			      		<a href="{{route('admin.co-work-space.destroy',$coWorkSpace->id)}}"><i class="fas fa-trash-alt"></i></a>
			      		{{-- <a href="{{route('admin.co-work-space.master.index',$coWorkSpace->id)}}"> Add Master </a> --}}
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
	</script>
@endsection

