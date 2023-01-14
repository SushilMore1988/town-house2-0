@extends('admin.layouts.app')
@section('content')
	<div class="pb-2 border-bottom">
		<div class="form-row">
			<h1 class="col-6">Co-Work Space Schedule Tour</h1>
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
			@foreach($scheduleTours as $scheduleTour)
				<tr data-url="">
					<th> {{ $scheduleTour->id }} 	</th>
			      	<td> {{ $scheduleTour->first_name}}  {{ $scheduleTour->last_name }}</td>
			      	<td> {{ $scheduleTour->email }} </td>
			      	<td> {{ $scheduleTour->message }} </td>
			      	<td> {{ date('Y-m-d',strtotime($scheduleTour->start_date)) }} </td>
			      	<td> {{ date('h:m:s',strtotime($scheduleTour->end_date)) }} </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

