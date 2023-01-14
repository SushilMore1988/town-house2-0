@extends('admin.layouts.app')
@section('content')
	<div class="pb-2 border-bottom">
		<div class="form-row">
			<h1 class="col-6">Co-Work Space Enquiries</h1>
		</div>
	</div>
	<table class="my-4 display patient-table table table-bordered table-hover" id="data_table">
		<thead>
			<tr>
				<th scope="col">Sr. No.</th>
			    <th scope="col">Name</th>
			    <th scope="col">Email</th>
			    <th scope="col">Message</th>
			</tr>
		</thead>
		<tbody>
			@foreach($enquiries as $enquiry)
				<tr data-url="">
					<th> {{ $enquiry->id }} 	</th>
			      	<td> {{ $enquiry->first_name}}  {{ $enquiry->last_name }}</td>
			      	<td> {{ $enquiry->email }} </td>
			      	<td> {{ $enquiry->message }} </td>
			      	<td>
			      	</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection


