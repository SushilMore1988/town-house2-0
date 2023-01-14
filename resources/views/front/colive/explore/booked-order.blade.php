@extends('front.layouts.app')

@section('css')
	
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
						<div class="text-header-container py-3 bg-white">
							<div class="text-header d-flex justify-content-between align-items-center mb-2 px-3">
								<div class="align-self-center">
									<h2 class="n-bold f-24 text-muted mb-1 text-uppercase">{{$coWorkSpace->name}}</h2>
									<p class="r-lightItalic f-9 text-light">@if(!empty($coWorkSpace->address)){{$coWorkSpace->address['address']}}@endif</p>
								</div>
								<div class="category-type mt-0 align-self-center">
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


												<div class="common-form my-4 py-3 border-bottom" id="facilities">
													<h6 class="pb-1 r-boldItalic f-16  head-description">Facilities</h6>
												<div class="space-preference mb-4">
													{{-- <h6 class="pb-1 r-boldItalic f-12  head-description">Essentials</h6> --}}
													<ul class="d-flex  flex-wrap mb-0">
														@foreach($coWorkSpace->facilities['facilities'] as $facility)
															@php
																$facilityValue = App\Models\CwsFacilityCategoryValue::where('id',  $facility)->first();
															@endphp 
															@if($facilityValue)
															<li class="text-center ml-1 my-3 facility-list">
																@if($facilityValue->icon_image)
																	<img src="{{url('/img/cowork/facility-icon/'.$facilityValue->icon_image)}}" style="height: 30px;"> 
																@else
																	<img src="{{url('/img/cowork/facility-icon/desk.svg')}}" style="height: 30px;"> 	
																@endif
																<p class=" text-light pt-2 mb-2">{{$facilityValue->value}} </p>
															</li>
															@endif
														@endforeach
													</ul>
													{{-- <h6 class="pb-1 pt-2 r-boldItalic f-12  head-description">Seating</h6>
													<ul class="d-flex  flex-wrap mb-0">
														
														<li class="text-center ml-1 facility-list">
															<img src="{{url('front/img/add-filter-list/shared-desk.jpg')}}"> 
															<p class=" text-light mb-2">standing desk</p>
														</li>
													</ul>
													<h6 class="pb-1 pt-2 r-boldItalic f-12  head-description">Relax zone</h6>
													<ul class="d-flex  flex-wrap mb-0">
														
														<li class="text-center ml-1 facility-list">
															<img src="{{url('front/img/add-filter-list/shared-desk.jpg')}}"> 
															<p class=" text-light mb-2">standing desk</p>
														</li>
													</ul> --}}
												</div>
												</div>


												{{-- <h3 class="r-boldItalic f-14 head-description rounded-0 mb-0 pt-2">Facilities</h3> --}}
												
												{{-- <div class="card-body pt-2" style="padding-left: 0;">
													<ul style="list-style: none; padding: 0;">
														@foreach($coWorkSpace->facilities['facilities'] as $facility)
															@php
																$facilityValue = App\Models\CwsFacilityCategoryValue::where('id',  $facility)->first();
															@endphp 
															@if($facilityValue)
																<li class="r-lightItalic f-9 head-description">{{$facilityValue->value}} </li>
															@endif
														@endforeach
													
													</ul>
												</div> --}}

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
								{{-- <h3 class="r-boldItalic f-14 head-description">Connect, Mature and Experience</h3>
								<p class="r-lightItalic f-9 head-description">{{$coWorkSpace->description}}</p>
								<h3 class="r-boldItalic f-14 head-description">Facilities</h3>
								<ul>
									@foreach($coWorkSpace->facilities['facilities'] as $facility)
										@php
											$facilityValue = App\Models\CwsFacilityCategoryValue::where('id',  $facility)->first();
										@endphp 
										<li class="r-lightItalic f-9 head-description">{{$facilityValue->value}} </li>
									@endforeach
									<li class="r-lightItalic f-9 head-description">Shared Working Space</li>
									<li class="r-lightItalic f-9 head-description">Internet</li> 
								</ul>
								<h3 class="r-boldItalic f-14 head-description">Location</h3>
								<ul>
									
									<li class="r-lightItalic f-9 head-description">@if(!empty($coWorkSpace->address))
											<p>{{$coWorkSpace->address['address']}}</p>
											<p>{{$coWorkSpace->address['pin_code']}}</p>
										@endif</li>
								<li class="r-lightItalic f-9 head-description">Shared Working Space</li>
									<li class="r-lightItalic f-9 head-description">Internet</li>
								</ul> --}}
							</div>	
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-4 pl-lg-3 pl-md-0 pt-md-0 pt-4">
						<div class="order-detail">
							<p class="r-lightItalic f-14  check-label mb-1" >Order Details</p>
						</div>
					<!-- <div class="h-100"> -->
						<div class="detail-container  bg-white" style="height: calc(100vh - 70px)">
							<div class="px-lg-3 px-2 pt-lg-3 pt-3">
								<h6 class="mb-2 r-boldItalic f-9 text-light"><strong>Duration</strong></h6>
								{{-- <p class="r-lightItalic f-9 text-light">26.04.2019 <span class="px-2">|</span> 26.05.2019</p> --}}
								<div class="d-flex mb-lg-3 mb-4 justify-content-between ">
									<div class="start-date border p-2 w-50 mr-2">
										<h6 class="r-boldItalic f-9 text-light">Starting Date: </h6>
										<h5 class="n-bold f-24 text-dark mb-0">{{date('d',strtotime($booking->start_date))}}</h5>
										<p class="r-lightItalic f-9 text-light mb-0">{{date('F Y',strtotime($booking->start_date))}}</p>
									</div>
									@if($booking->sharedDeskBooking)
										<div class="end-date border p-2 w-50 ml-2">
											<h6 class="r-boldItalic f-9 text-light">Ending Date: </h6>

											<h5 class="n-bold f-24 text-dark mb-0">{{date('d',strtotime($booking->sharedDeskBooking->duration, strtotime($booking->start_date)))}}</h5>
											<p class="r-lightItalic f-9 text-light mb-0">{{date('F Y',strtotime($booking->sharedDeskBooking->duration, strtotime($booking->start_date)))}}</p>
										</div>
									@endif
								</div>
								{{-- <h6 class="mb-2 r-boldItalic f-9 text-light"><strong>Applied Discounts</strong></h6>
								<div class="input-group mb-lg-5 mb-3 w-100">
									<input type="text" class="form-control border-right-0" placeholder="Discounts Code" />
									<div class="input-group-prepend bg-white">
										<button class="input-group-text btn bg-white border-left-0 r-lightItalic f-9 text-success">Apply</button>
									</div>
								</div> --}}
							</div>
							
							<div class="formAccordian-first-cls" id="formAccordian-first">
								<div class="card px-0 border-0 shadow-none pt-0 " id="shared-desk">
									<div class="card-header green-btn p-0 border-bottom ">
										<a class="bg-color   mr-2 w-100  r-boldItalic f-9 text-left text-dark border main-anch collapsed px-md-4 px-2 d-flex align-self-center position-relative py-3 booking-tab-pane border-0 text-uppecase" data-toggle='collapse' href='#shared'>
											
											<div class="row w-100">
												<div class="col-12 pr-0">
													<span class="align-self-center f-9 rounded-0 r-boldItalic f-9">Choosen Seats/ Packages</span>
												</div>
												
											</div>
											<!-- <span class="align-self-center text-uppercase f-9 rounded-0">Shared Desks <i class="fas fa-info-circle pl-2"></i></span> -->
										</a>
									</div>
									<span class="shared_error "></span>
									<div class="py-3  show" id="shared" data-parent='#formAccordian-first'>
										<div class="card-body">
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

													{{-- <li class="mb-3">
														<div class="d-flex justify-content-between flex-row ">
															<div class="mb-1">
																<h6 class="r-boldItalic f-9 text-light">Private Offices <i class="r-lightItalic">(Free)</i></h6>
																
															</div>
															<div>
																<h6 class="r-boldItalic f-9 text-light">&#8377; 0</h6>
															</div>
														</div>
													</li> --}}
													{{-- <li class="mb-3">
														<div class="d-flex justify-content-between flex-row ">
															<div class="mb-1">
																<h6 class="r-boldItalic f-9 text-light">18% GST</h6>
															</div>
															<div>
																<h6 class="r-boldItalic f-9 text-light">&#8377; 5760</h6>
															</div>
														</div>
													</li> --}}
													{{-- <li class="mb-3">
														<div class="d-flex justify-content-between flex-row ">
															<div class="mb-1">
																<h6 class="r-boldItalic f-9 text-light mb-0">Applied Discounts</h6>
																<p class="r-boldItalic f-9 ">(None)</p>
															</div>
															<div>
																<h6 class="r-boldItalic f-9 text-light">&#8377; 0</h6>
															</div>
														</div>
													</li> --}}
												</ul>
												<div class="row ">
													<div class="col-sm-8 pr-sm-0">
														<input type="text" name="promo-code" placeholder="Enter promo code" class="w-100 form-control bg-white py-3 px-4 rounded-0">
													</div>
													<div class="col-sm-4 pt-sm-0 pt-3 pl-2 appliedBtn">
														<button type="button" class="btn btn-success n-bold f-9 rounded-0 mx-auto text-center justify-content-center w-100 apply-code" id="apply-code">Apply</button>
													</div>
												</div>
												<div class="total d-flex justify-content-between pt-lg-4">
													<h6 class="r-boldItalic f-16 text-success">Total</h6>
													<h6 class="r-boldItalic f-16 text-success">{{ $booking->currency }} <span class="total-amount">{{ $booking->total }}</span></h6>
												</div>
												<div class="pt-lg-3">
													{!! Form::open(['route' => 'co-work-space.payment']) !!}
													<!-- <button type="button" class="btn green-btn"></button> -->
													{!! Form::hidden('promo_code',null,['id' => 'promo_code']) !!}
													{!! Form::hidden('promo_code_type',null,['id' => 'promo_code_type']) !!}
													{!! Form::hidden('promo_code_discount',null,['id' => 'promo_code_discount']) !!}
													{!! Form::hidden('bookingId',$booking->id) !!}
													{!! Form::hidden('coWorkSpaceId',$coWorkSpace->id) !!}
													{!! Form::hidden('price', $booking->total, ['class' => 'total-amount']) !!}
													{!! Form::hidden('title', 'Booking Co-working space') !!}
													<button type="submit" class="btn btn-success n-bold f-9 rounded-0 w-100"> Book Now</button>
													{!! Form::close() !!}
												</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<!-- </div> -->
				</div>
			</div>
		</div>
	</section>
	
@endsection

@section('js')
	
	<script type="text/javascript">
		$(document).on('click', '.apply-code', function(){
		if(!$('input[type=text][name=promo-code]').val()){
		toastr.error('Please enter promo code!', 'Error!');
		return false;
		}
		var code = $('input[type=text][name=promo-code]').val();
		$.ajax({
		url : '{{ url('/apply-code') }}/'+code,
		type : 'GET',
		success: function(data) { 
			if(data.status == 'success'){
			$('#apply-code').hide();
			$('.appliedBtn').append('<button type="button" class="btn btn-success n-bold f-9 rounded-0 mx-auto pr-2 text-center justify-content-center w-100">Applied</button>');
			promo_code = data.code;
			$('#promo_code').val(promo_code);
			discount = data.discount;
			discount_type = data.discount_type;
			if(discount_type == "Money"){
				total = $(".total-amount").val() - discount;
				$(".total-amount").text(total);
				$(".total-amount").val(total);
			}else{
				total = ($("input[type=hidden][name=price]").val() - ((($("input[type=hidden][name=price]").val() * discount) / 100)));
				$(".total-amount").text(total);
				$("input[type=hidden][name=price]").val(total);
			}
			$('#promo_code_type').val(data.discount_type);
			$('#promo_code_discount').val(discount);
			toastr.success('Promo code applied successfully', 'Success!');

			}else{
			toastr.error('Please check promo code!', 'Error!');
			}
				},
				error: function(data){
				toastr.error('Error in applying promo code!', 'Error!');
				}
		});
	});
	</script>
@endsection