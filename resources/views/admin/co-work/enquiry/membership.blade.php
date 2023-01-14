@extends('admin.layouts.app')
@section('content')
	<div class="pb-2 border-bottom">
		<div class="form-row">
			<h1 class="col-6">Co-Work Space Membership Enquiries</h1>
		</div>
	</div>
	<table class="my-4 display patient-table table table-bordered table-hover" id="data_table">
		<thead>
			<tr>
				<th scope="col">Sr. No.</th>
			    <th scope="col">Name</th>
			    <th scope="col">Email</th>
			    <th scope="col">Message</th>
			    <th scope="col">Start Date</th>
			    <th scope="col">End Date</th>
			</tr>
		</thead>
		<tbody>
			@foreach($memberShipEnquiries as $enquiry)
				<tr data-url="">
					<th> {{ $enquiry->id }} 	</th>
			      	<td> {{ $enquiry->first_name}}  {{ $enquiry->last_name }}</td>
			      	<td> {{ $enquiry->email }} </td>
			      	<td> {{ $enquiry->message }} </td>
			      	<td> {{ date('Y-m-d',strtotime($enquiry->start_date)) }} </td>
			      	<td> {{ date('Y-m-d',strtotime($enquiry->end_date)) }} </td>
			      	<td>
			      	</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

