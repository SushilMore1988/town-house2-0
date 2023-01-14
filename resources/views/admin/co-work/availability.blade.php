@extends('admin.layouts.app')

@section('css')
	
@endsection

@section('content')
	<div class="pb-2 border-bottom">
		<div class="form-row">
			<h1 class="col-6">Co-Work Space Booking List</h1>
		</div>
	</div>
	
	<table class="my-4 display patient-table table table-bordered table-hover" id="data_table">
		<div class="alert-success" id="status-message">
		</div>
		<thead>
			<tr>
				<th scope="col">Sr. No.</th>
			    <th scope="col">CoWorkSpace Name</th>
			    <th scope="col">User Name</th>
			    <th scope="col">User Contact</th>
			    <th scope="col">Owner Name</th>
			    <th scope="col">Owner Contact</th>
			    {{-- <th scope="col">Created On</th> --}}
			    <th scope="col">Booking Start Date</th>
			    <th scope="col">Booking End Date</th>
			    <th scope="col">Amount</th>
			    <th scope="col">Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($bookings as $booking)
				<tr >
					<td scope="row">{{$loop->index + 1}}</td>
			      	<td> <a href="{{route('front.explore',$booking->cws->slug)}}"> {{ $booking->cws->name}} </a></td>
			      	<td> {{ $booking->user->fname}} {{ $booking->user->lname}} </td>
			      	<td> {{ $booking->user->phone}}<br> {{ $booking->user->email}} </td>
			      	<td> {{ $booking->cws->user->fname}} {{ $booking->cws->user->lname}} </td>
			      	<td> {{ $booking->cws->user->phone}} <br> {{ $booking->cws->user->email}} </td>
			      	{{-- <td> {{ $booking->created_at->format('jS F Y')}} </td> --}}
			      	<td> {{ date('jS F Y', strtotime($booking->start_date)) }} </td>
			      	<td> {{ date('jS F Y', strtotime($booking->start_date)) }} </td>
			      	<td> {{ $booking->total}} </td>
			      	<td>
			      		<select  name="status" class='change-status'>

						  	<option class="id-value" value="Pending" data-id="{{$booking->id}}" @if($booking->status == "Pending") selected="selected" @endif>Pending</option>
						  	<option class="id-value" value="Available" data-id="{{$booking->id}}" @if($booking->status == "Available" || $booking->status == "success") selected="selected" @endif>Available</option>
						  	<option class="id-value" value="Not Available" data-id="{{$booking->id}}" @if($booking->status == "Not Available") selected="selected" @endif>Not Available</option>
						</select>
					</td>
			      	</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
@section('js')
	
	
	<script type="text/javascript">
		$('.change-status').change(function(){
			status = $(this).val();
			bookingId =$(this).find('option').data('id');
			var formData 	= new FormData();
			formData.append('_token', '{{csrf_token()}}');
			formData.append('status', status);
			formData.append('bookingId', bookingId);
			$.ajax({
				url : '{{route('admin.change-booking-status')}}',
				data: formData,
				type: 'POST',
				processData: false,
				contentType: false,
				success: function(data){
					// $('#status-message').text(data.message);
					toastr.success(data.message);

				},
				error: function(error){
					console.log(error);
				}
			});
		});
</script>
@endsection

