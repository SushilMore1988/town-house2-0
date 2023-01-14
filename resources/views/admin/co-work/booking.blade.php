@extends('admin.layouts.app')

@section('content')
	<div class="pb-2 border-bottom">
		<div class="form-row">
			<h1 class="col-6">Co-Work Space Booking List</h1>
		</div>
	</div>
	<table class="my-4 display patient-table table table-bordered table-hover" id="data_table">
		<thead>
			<tr>
				<th scope="col">Sr. No.</th>
			    <th scope="col">User Name</th>
			    <th scope="col">CoWorkSpace Name</th>
			    <th scope="col">Created On</th>
			    <th scope="col">Booking Start Date</th>
			    <th scope="col">Transaction Id</th>
			    <th scope="col">Status</th>
			    <th scope="col">Amount</th>
			</tr>
		</thead>
		<tbody>
			@foreach($bookings as $booking)
				<tr >
					<td scope="row">{{($bookings->perPage() * ($bookings->currentPage() - 1)+$loop->index+1)}}</td>
					{{-- @if($bookings->currentPage() == 1)
					<td scope="row">{{1 + $loop->index}}</td>
					@else
					<td scope="row">{{ $bookings->currentPage() + $loop->index + 9}}</td>
					@endif --}}
			      	<td> {{ $booking->user->fname}} {{ $booking->user->lname}} </td>
			      	<td> <a href="{{route('front.explore',$booking->cws->slug)}}"> {{ $booking->cws->name}} </a></td>
			      	<td> {{ $booking->created_at->format('jS F Y')}} </td>
			      	<td> {{ date('jS F Y', strtotime($booking->start_date)) }} </td>
			      	
			      	<td> @if($booking->cwsPayment) {{ $booking->cwsPayment->txnid}} @else Not Applied @endif</td>
			      	<td> @if($booking->cwsPayment) {{ $booking->cwsPayment->status}} @else Not Applied @endif</td>
			      	
			      	<td> {{ $booking->total}} </td>
			      	</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="float-right">
	{{ $bookings->links('vendor.pagination.bootstrap-4') }}
	{{-- {{ $bookings->links('vendor.pagination.bootstrap-4') }} --}}
	</div>
@endsection

