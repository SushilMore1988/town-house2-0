@extends('front.layouts.app')

@section('css')
		
		<link rel="stylesheet" href="{{url('front/vendor/fondation-datePicker/css/foundation-datepicker.css')}}">
		<link rel="stylesheet" href="{{url('front/vendor/datetime-picker/css/datetime-picker.css')}}">
		<link rel="stylesheet" type="text/css" href="{{url('/front/bootstrap3-datepicker/bootstrap-glyphicons.css')}}">	
@endsection

@section('content')

{{-- {{dd($booking->sharedDeskBooking)}} --}}
<section class="top-space order-review pt-3">
	<div class="container">
		<div class="row pb-4">
			<div class="col-sm-12 col-md-8 pt-md-0 pt-4">
				<h4 class="r-boldItalic f-14  check-label">Review Your Order</h4>
				<div class="banner-img-container bg-white" style="min-height: calc(100vh - 70px)">
					@if(!empty($coWorkSpace->images['cover']))
						<img src="{{ url('/img/cowork/cover/'.$coWorkSpace->images['cover']) }}" class="img-fluid w-100" alt="" />
					@endif
					<div class="text-header-container bg-white">
						<div class="text-header p-3 d-flex justify-content-between align-items-center">
							<div>
								<h2 class="n-bold f-24 text-muted mb-1 text-uppercase">{{$coWorkSpace->name}}</h2>
								<p class="r-lightItalic f-9 text-light">@if(!empty($coWorkSpace->address)){{$coWorkSpace->address['address']}}@endif</p>
							</div>
							<div class="category-type">
								{{-- <img src="./img/add-filter-list/gold.png" class="img-fluid" alt="" /> --}}
								@if($coWorkSpace->color_category == 'bronze') 
									<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-brown border-brown">
										<p class="text-black n-bold f-24 text-center align-self-center mb-0">
											{{ number_format((float)$coWorkSpace->admin_rating, 1, '.', '')}}
										</p>
									</div>
								@elseif($coWorkSpace->color_category == 'silver')
									<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
										<p class="text-black n-bold f-24 text-center align-self-center mb-0">
											{{ number_format((float)$coWorkSpace->admin_rating, 1, '.', '')}}
										</p>
									</div>
								@elseif($coWorkSpace->color_category == 'gold')
									<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-gold border-gold">
										<p class="text-black n-bold f-24 text-center align-self-center mb-0">
											{{ number_format((float)$coWorkSpace->admin_rating, 1, '.', '')}}
										</p>
									</div>
								@endif
							</div>
						</div>
						<div class="description">
							<div class="formAccordian-first-cls" id="formAccordian-second">
								<div class="card px-0 border-0 shadow-none pt-0 " id="connect-Mature">
									<div class="card-header green-btn p-0 border-bottom ">
										<a class="bg-color   mr-2 w-100  r-boldItalic f-9 text-left text-dark border main-anch collapsed px-md-4 px-2 d-flex align-self-center position-relative py-3 booking-tab-pane border-0 text-uppecase" data-toggle='collapse' href='#connect'>
											<div class="row w-100">
												<div class="col-12 pr-0">
													<h3 class="r-boldItalic f-14 head-description align-self-center rounded-0 mb-0">About {{$coWorkSpace->name}}</h3>
												</div>
											</div>
										</a>
									</div>
									
									<div class="show" id="connect" data-parent='#formAccordian-second'>
										<div class="card-body">
											<p class="r-lightItalic f-9 head-description">{{$coWorkSpace->description}}</p>

											<h3 class="r-boldItalic f-14 head-description rounded-0 mb-0 pt-2">Facilities</h3>
											
											<div class="card-body pt-2" style="padding-left: 0;">
												<ul style="list-style: none; padding: 0;">
													@foreach($coWorkSpace->facilities['facilities'] as $facility)
														@php
															$facilityValue = App\Models\CwsFacilityCategoryValue::where('id',  $facility)->first();
														@endphp 
														<li class="r-lightItalic f-9 head-description">{{$facilityValue->value}} </li>
													@endforeach
													{{-- <li class="r-lightItalic f-9 head-description">Shared Working Space</li>
													<li class="r-lightItalic f-9 head-description">Internet</li> --}}
												</ul>
											</div>

											<h3 class="r-boldItalic f-14 head-description rounded-0 mb-0 pt-2">Location</h3>
												<div class="card-body pt-2" style="padding-left: 0;">
													<ul style="list-style: none; padding: 0;">
														<li class="r-lightItalic f-9 head-description">@if(!empty($coWorkSpace->address))
																 <p class="mb-1">{{$coWorkSpace->address['address']}}</p>
																 <p>{{$coWorkSpace->address['pin_code']}}</p>
															 @endif</li>
													</ul>
												</div>
										</div>
									</div>										
								</div>
								<div class="card px-0 border-0 shadow-none pt-0 " id="Facilities">
									<div class="card-header green-btn p-0 border-bottom ">
										<a class="bg-color   mr-2 w-100  r-boldItalic f-9 text-left text-dark border main-anch collapsed px-md-4 px-2 d-flex align-self-center position-relative py-3 booking-tab-pane border-0 text-uppecase" data-toggle='collapse' href='#Facilities-detail'>
											<div class="row w-100">
												<div class="col-12 pr-0">
													<h3 class="r-boldItalic f-14 head-description align-self-center rounded-0 mb-0">Previous Bookings</h3>
												</div>
											</div>
										</a>
									</div>
									
									<div class="py-3  show" id="Facilities-detail" data-parent='#formAccordian-second'>
										<div class="card-body">
											@auth	
									@if(Auth::id() != $coWorkSpace->user_id)  
									
							     			<div class="common-form border-bottom">
							     				{{-- <div>
							     					<h6 class="r-boldItalic f-16  head-description">Your Booking History</h6>
							     					<p class="r-lightItalic f-9 head-description para">Here are your previous bookings for this venue. You could book this venue again with your previous booked seating types.</p>
							     				</div> --}}
							     				@foreach($coWorkSpace->cwsBookings as $coWorkSpaceBooking)  
													@if($coWorkSpaceBooking && $coWorkSpaceBooking->where('user_id',Auth()->user())) 			
														@if($coWorkSpaceBooking->dedicatedDeskBooking || $coWorkSpaceBooking->sharedDeskBooking || $coWorkSpaceBooking->privateOfficeBooking || $coWorkSpaceBooking->meetingRoomBooking)
									     				<div class="px-3 pt-3 pb-4 mt-2 single-book-history" id="booking_history_{{$coWorkSpaceBooking->id}}">
									     					<div class="row">
									     						<div class="col-md-6">
									     							<p class="r-lightItalic f-9 head-description para">Recent Booking : <span>{{ date('jS F Y', strtotime($coWorkSpaceBooking->start_date)) }}</span></p>
									     						</div>
									     						{{-- <div class="col-md-6 text-right">
									     							<a href="{{ route('rebooking-review', $coWorkSpaceBooking->id) }}" class="btn btn-success n-bold f-9 rounded-0 mx-auto text-center justify-content-center d-block w-100 mb-3">Book Again</a>
									     						</div> --}}
									     					</div>
									     					<p class="r-boldItalic f-9 head-description mb-0">Booked Seating Types</p>
							     							<ol type="1" class="pl-0">
							     								@if($coWorkSpaceBooking->dedicatedDeskBooking)								     						
										     						<li class="row pt-1">
							     										<div class="col-md-6 ">
								     										<p class="r-boldItalic f-12 head-description mb-0">Dedicated Desk</p>
								     									</div>
								     									<div class="col-md-3 border-right">
											     							<p class="r-lightItalic f-12 head-description mb-0">Number Of Desk : <span>{{$coWorkSpaceBooking->dedicatedDeskBooking->no_of_desk }}</span></p>
											     						</div>
											     						<div class="col-md-3 text-right">
											     							<p class="r-lightItalic f-12 head-description mb-0">Duration  : <span> {{$coWorkSpaceBooking->dedicatedDeskBooking->duration }}</span></p>
											     						</div>
								     								</li>
										     					@endif
										     					@if($coWorkSpaceBooking->sharedDeskBooking)								     						
										     						<li class="row pt-1">
							     										<div class="col-md-6 ">
								     										<p class="r-boldItalic f-12 head-description mb-0">Shared Desk</p>
								     									</div>
								     									<div class="col-md-3 border-right">
											     							<p class="r-lightItalic f-12 head-description mb-0">Number Of Desk : <span>{{$coWorkSpaceBooking->sharedDeskBooking->no_of_desk }}</span></p>
											     						</div>
											     						<div class="col-md-3 text-right">
											     							<p class="r-lightItalic f-12 head-description mb-0">Duration  : <span> {{$coWorkSpaceBooking->sharedDeskBooking->duration }}</span></p>
											     						</div>
								     								</li>
										     					@endif
										     					@if($coWorkSpaceBooking->privateOfficeBooking)								     						
										     						<li class="row pt-1">
								     									<div class="col-md-6 ">
								     										<p class="r-boldItalic f-12 head-description mb-0">Private Office <span class="r-lightItalic">(Private Office Name1)</span></p>
								     									</div>
								     									<div class="col-md-3 border-right">
											     							{{-- <p class="r-lightItalic f-12 head-description mb-0">Number Of Desk : <span>{{$coWorkSpaceBooking->privateOfficeBooking->office_id }}</span></p> --}}
											     						</div>
											     						<div class="col-md-3 text-right">
											     							<p class="r-lightItalic f-12 head-description mb-0">Duration  : <span> {{$coWorkSpaceBooking->privateOfficeBooking->duration }}</span></p>
											     						</div>
								     								</li>
										     					@endif
										     					@if($coWorkSpaceBooking->meetingRoomBooking)								     						
										     						<li class="row pt-1">
							     										<div class="col-md-6 ">
								     										<p class="r-boldItalic f-12 head-description mb-0">Meeting Rooms <span class="r-lightItalic">(Private Office Name2)</span></p>
								     									</div>
								     									<div class="col-md-3 border-right">
											     							{{-- <p class="r-lightItalic f-12 head-description mb-0">Number Of Desk : <span> {{$coWorkSpaceBooking->meetingRoomBooking->meeting_room_id }}</span></p> --}}
											     						</div>
											     						<div class="col-md-3 text-right">
											     							<p class="r-lightItalic f-12 head-description mb-0">Duration  : <span> {{$coWorkSpaceBooking->meetingRoomBooking->duration }}</span></p>
											     						</div>
								     								</li>
										     					@endif					     								
					     									</ol>
							     						</div>							     				
									     		
														@endif
													@endif
												@endforeach
							     			</div>							     		
							     	
							     	@endif
					     			@endauth
											{{-- <ul>
												@foreach($coWorkSpace->facilities['facilities'] as $facility)
													@php
														$facilityValue = App\Models\CwsFacilityCategoryValue::where('id',  $facility)->first();
													@endphp 
													<li class="r-lightItalic f-9 head-description">{{$facilityValue->value}} </li>
												@endforeach
											</ul> --}}
										</div>
									</div>
								</div>
								
							</div>
							<!-- <h3 class="r-boldItalic f-14 head-description">Connect, Mature and Experience</h3>
							<p class="r-lightItalic f-9 head-description">{{$coWorkSpace->description}}</p>
							<h3 class="r-boldItalic f-14 head-description">Facilities</h3>
							<ul>
								@foreach($coWorkSpace->facilities['facilities'] as $facility)
									@php
										$facilityValue = App\Models\CwsFacilityCategoryValue::where('id',  $facility)->first();
									@endphp 
									<li class="r-lightItalic f-9 head-description">{{$facilityValue->value}} </li>
								@endforeach
								{{-- <li class="r-lightItalic f-9 head-description">Shared Working Space</li>
								<li class="r-lightItalic f-9 head-description">Internet</li> --}}
							</ul>
							<h3 class="r-boldItalic f-14 head-description">Location</h3>
							<ul>
								
								<li class="r-lightItalic f-9 head-description">@if(!empty($coWorkSpace->address))
					     				<p>{{$coWorkSpace->address['address']}}</p>
					     				<p>{{$coWorkSpace->address['pin_code']}}</p>
				     				@endif</li>
								{{-- <li class="r-lightItalic f-9 head-description">Shared Working Space</li>
								<li class="r-lightItalic f-9 head-description">Internet</li> --}}
							</ul> -->
						</div>
						{{-- <div class="description">
							<h3 class="r-boldItalic f-14 head-description">Connect, Mature and Experience</h3>
							<p class="r-lightItalic f-9 head-description">{{$coWorkSpace->description}}</p>
							<h3 class="r-boldItalic f-14 head-description">Facilities</h3>
							<ul>
								@foreach($coWorkSpace->facilities['facilities'] as $facility)
									@php
										$facilityValue = App\Models\CwsFacilityCategoryValue::where('id',  $facility)->first();
									@endphp 
									<li class="r-lightItalic f-9 head-description">{{$facilityValue->value}} </li>
								@endforeach
								
							</ul>
							<h3 class="r-boldItalic f-14 head-description">Location</h3>
							<ul>
								
								<li class="r-lightItalic f-9 head-description">@if(!empty($coWorkSpace->address))
					     				<p>{{$coWorkSpace->address['address']}}</p>
					     				<p>{{$coWorkSpace->address['pin_code']}}</p>
				     				@endif</li>
							
							</ul>
						</div>	 --}}
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-4 pl-lg-3 pl-md-0 pt-md-0 pt-4">
				<div class="order-detail">
					<p class="r-lightItalic f-14  check-label mb-1" >Order Details</p>
				</div>
				<div class="detail-container bg-white" style="height: calc(100vh - 70px)">
					<div class="p-3">
					<h6 class="mb-2 r-boldItalic f-9 text-light"><strong>Duration</strong></h6>					
					<div class="d-flex justify-content-between">
						
 							<div class="start-date border w-50 p-2">
								<div class="d-flex justify-content-between startDateError">
									<h6 class="r-boldItalic f-9 text-light">Starting Date: </h6>
									
									{!! Form:: hidden('coWorkSpaceId',empty($coWorkSpace)? 0 : $coWorkSpace->id) !!}
									@auth
									{!! Form:: hidden('userId',Auth::user()->id)!!}
									@endauth
									{!! Form:: hidden('currency',empty($coWorkSpace->size) ? null : $coWorkSpace->size['currency'])!!}
									<a href="#" class="button tiny" data-date="2020-12-07" id="date-picker-rebook" data-date-format="yyyy-mm-dd">
										<img src="{{url('/img/SVG_Cowork/calendor-icon.svg')}}" alt="calender" style="width: 28px;" />
									</a>
								</div>
								<h5 class="n-bold f-24 text-dark" id="b-day"></h5>
								<p class="r-lightItalic f-9 text-light" id="b-month-year"></p>
								
						</div>


						{{-- @if($booking->sharedDeskBooking)
							<div class="end-date border p-2 w-50 ml-2">
								<h6 class="r-boldItalic f-9 text-light">Ending Date: </h6>

								<h5 class="n-bold f-24 text-dark mb-0">{{date('d',strtotime($booking->sharedDeskBooking->duration, strtotime($booking->start_date)))}}</h5>
								<p class="r-lightItalic f-9 text-light mb-0">{{date('F Y',strtotime($booking->sharedDeskBooking->duration, strtotime($booking->start_date)))}}</p>
							</div>
						@endif --}}
					</div>
					</div>
					@if ($errors->has('bookingDate')) 
						<div class="text-danger p-3">	
							{{ $errors->first('bookingDate') }}
						</div>
					@endif
					<div class="formAccordian-first-cls pt-4" id="formAccordian-first">
						<div class="card px-0 border-0 shadow-none pt-0 " id="shared-desk">
							<div class="card-header green-btn p-0 border-bottom ">
								<a class="bg-color   mr-2 w-100  r-boldItalic f-9 text-left text-dark border main-anch collapsed px-md-4 px-2 d-flex align-self-center position-relative py-3 booking-tab-pane border-0 text-uppecase" data-toggle='collapse' href='#shared'>
									<div class="row w-100">
										<div class="col-12 pr-0">
											<h6 class="align-self-center f-9 rounded-0 r-boldItalic f-9"><strong>Choosen Seats/ Packages</strong></h6>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="p-3  show" id="shared" data-parent='#formAccordian-first'>
						<ul class="pl-1">
							<li>
								@if($booking->sharedDeskBooking)
								<div class="d-flex justify-content-between flex-row ">
									<div class="mb-1">
										<h6 class="r-boldItalic f-9 text-light mb-0">Shared Desks</h6>
										<p class="r-boldItalic f-9 ">Number of Desks: {{$booking->sharedDeskBooking->no_of_desk}}</p>
									</div>
									<div>
										<h6 class="r-boldItalic f-9 text-light">{{$booking->currency}} {{$booking->sharedDeskBooking->price}}</h6>
									</div>
								</div>
								<span class="shared_error"></span>
								@endif
							</li>
							<li>
								@if($booking->dedicatedDeskBooking)
								<div class="d-flex justify-content-between flex-row ">
									<div class="mb-1">
										<h6 class="r-boldItalic f-9 text-light mb-0">Dedicated Desks</h6>
										<p class="r-boldItalic f-9 ">Number of Desks: {{$booking->dedicatedDeskBooking->no_of_desk}}</p>
									</div>
									<div>
										<h6 class="r-boldItalic f-9 text-light">&#8377; {{$booking->dedicatedDeskBooking->price}} </h6>
									</div>
								</div>
								<span class="dedicated_error"></span>
								@endif
							</li>
							<li>
								@if($booking->privateOfficeBooking)
								<div class="d-flex justify-content-between flex-row ">
									<div class="mb-1">
										<h6 class="r-boldItalic f-9 text-light mb-0">Private Offices</h6>
										{{-- <p class="r-boldItalic f-9 ">Number of Offices: 01</p> --}}
									</div>
									<div>
										<h6 class="r-boldItalic f-9 text-light">&#8377; {{$booking->privateOfficeBooking->price}}</h6>
									</div>
								</div>
								<span class="private_office_error"></span>
								@endif
							</li>
							<li>
								@if($booking->meetingRoomBooking)
								<div class="d-flex justify-content-between flex-row ">
									<div class="mb-1">
										<h6 class="r-boldItalic f-9 text-light mb-0">Meeting Room</h6>
										{{-- <p class="r-boldItalic f-9 ">Number of Offices: 01</p> --}}
									</div>
									<div>
										<h6 class="r-boldItalic f-9 text-light">&#8377; {{$booking->meetingRoomBooking->price}}</h6>
									</div>
								</div>
								<span class="meeting_room_error"></span>
								@endif
							</li>
							<li>
								<div class="d-flex justify-content-between flex-row ">
									<div class="mb-1">
										<h6 class="r-boldItalic f-9 text-light mb-0">Check in time</h6>
										{{-- <p class="r-boldItalic f-9 ">Number of Offices: 01</p> --}}
									</div>
									<div>
										<h6 class="r-boldItalic f-9 text-light">9:00 am</h6>
									</div>
								</div>
							</li>
						</ul>
						<div class="total d-flex justify-content-between pt-lg-4">
							<h6 class="r-boldItalic f-16 text-success">Total</h6>
							<h6 class="r-boldItalic f-16 text-success">{{ $booking->currency }} {{ $booking->total }}</h6>
						</div>
						<div class="pt-lg-3">
							{!! Form::open(['route' => 'co-work-space.payment', 'id' => 'booking_form']) !!}
							<!-- <button type="button" class="btn green-btn"></button> -->
							{!! Form::hidden('coWorkSpaceId',$booking->cws_id) !!}
							{!! Form::hidden('bookingId',$booking->id) !!}
							{!! Form::hidden('price', $booking->total) !!}
							{!! Form::hidden('is_rebook', 1) !!}

							{!! Form:: hidden('bookingDate',null,['id' =>"booking-start-date" ]) !!}


							{{-- {!! Form::hidden('bookingDate', '2020/12/16') !!} --}}
							{!! Form::hidden('title', 'Booking Co-working space') !!}
							<button type="submit" class="btn btn-success n-bold f-9 rounded-0 w-100">Order Again</button>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
	
@endsection

@section('js')
	
    
    <script type="text/javascript" src="{{url('front/vendor/fondation-datePicker/js/foundation-datepicker.js')}}"></script>
	 <script src="{{url('front/vendor/datetime-picker/js/moment.js')}}" type="text/javascript" ></script>
	<script src="{{url('front/vendor/datetime-picker/js/datetime-picker.js')}}" type="text/javascript" ></script>
	<script type="text/javascript">
		mlist = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
			$('#date-picker-rebook').fdatepicker({
					startDate: new Date(),
				}).on('changeDate', function (ev) {
					$('#booking-start-date').val($('#date-picker-rebook').data('date'));
					var today = new Date(ev.date);
					var day = today.getDate();
					var month = mlist[today.getMonth()];
					var year = today.getFullYear();
					$('#b-day').html(day);
					$('#b-month-year').html(month +' '+year);
					$('#date-picker-rebook').fdatepicker('hide');
			});
	</script>
@endsection