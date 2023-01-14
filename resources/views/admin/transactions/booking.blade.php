@extends('admin.layouts.app')
@section('content')
	<div class="pb-2 border-bottom">
		<div class="form-row">
			<h1 class="col-6">CoworkSpace Booking Payment List</h1>
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
			    <th scope="col">Status</th>
			    <th scope="col">Payment_for</th>
			    <th scope="col">Amount</th>
			    <th scope="col">Txn ID</th>
			    <th scope="col">Name</th>
			    <th scope="col">Email</th>
			    <th scope="col">Phone</th>
			    <th scope="col">Date</th>
			</tr>
		</thead>
		<tbody>
			@foreach($bookingPayments as $bookingPayment)
				<tr data-url="patient-details.html">
					<th scope="row">{{$loop->index + 1}}</th>
			      	<td> {{$bookingPayment->status}}</td>
			      	<td> {{$bookingPayment->payment_for}} </td>
			      	<td> {{$bookingPayment->amount}} </td>
			      	<td> {{$bookingPayment->txnid}} </td>
			      	<td> {{$bookingPayment->firstname}} </td>
			      	<td> {{$bookingPayment->email}} </td>
			      	<td> {{$bookingPayment->phone}} </td>
			      	<td> {{$bookingPayment->dated}} </td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection