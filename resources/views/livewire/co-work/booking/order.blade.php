<div>
    @php
		$coWorkSpace = $cwsBooking->cws;
	@endphp
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
																	<p>{{$coWorkSpace->address['pin_code'] ?? ''}}</p>
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
													@foreach($coWorkSpace->cwsBookings()->where('status', 'Success')->where('start_date', '>', now()->subMonth(3))->get() as $coWorkSpaceBooking)  
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
																				<p class="r-boldItalic f-12 head-description mb-0">Private Office <span class="r-lightItalic">({{ $coWorkSpaceBooking->cws->size['priave_offices']['types'][$coWorkSpaceBooking->sharedDeskBooking->office_id]['name'] }})</span></p>
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
																				<p class="r-boldItalic f-12 head-description mb-0">Meeting Rooms <span class="r-lightItalic">({{ $coWorkSpaceBooking->cws->size['meeting_rooms']['types'][$coWorkSpaceBooking->meetingRoomBooking->meeting_room_id]['name'] }})</span></p>
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
						<div class="detail-container bg-white">
						{{-- <div class="detail-container bg-white" style="height: calc(100vh - 70px)"> --}}
							<div class="px-lg-3 px-2 pt-lg-3 pt-3">
								<h6 class="mb-2 r-boldItalic f-9 text-light"><strong>Duration</strong></h6>
								{{-- <p class="r-lightItalic f-9 text-light">26.04.2019 <span class="px-2">|</span> 26.05.2019</p> --}}
								<div class="d-flex mb-lg-3 mb-4 justify-content-between ">
									<div class="start-date border p-2 w-50 mr-2">
										<h6 class="r-boldItalic f-9 text-light">Starting Date: </h6>
										<h5 class="n-bold f-24 text-dark mb-0">{{date('d',strtotime($cwsBooking->start_date))}}</h5>
										<p class="r-lightItalic f-9 text-light mb-0">{{date('F Y',strtotime($cwsBooking->start_date))}}</p>
									</div>
									@if($cwsBooking->sharedDeskBooking)
										<div class="end-date border p-2 w-50 ml-2">
											<h6 class="r-boldItalic f-9 text-light">Ending Date: </h6>

											<h5 class="n-bold f-24 text-dark mb-0">{{date('d',strtotime($cwsBooking->sharedDeskBooking->duration, strtotime($cwsBooking->start_date)))}}</h5>
											<p class="r-lightItalic f-9 text-light mb-0">{{date('F Y',strtotime($cwsBooking->sharedDeskBooking->duration, strtotime($cwsBooking->start_date)))}}</p>
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
                                                    @if($cwsBooking->sharedDeskBooking)
														<div class="d-flex justify-content-between flex-row ">
															<div class="mb-1">
																<h6 class="r-boldItalic f-9 text-light mb-0">Shared Desks</h6>
																<p class="r-boldItalic f-9 ">Number of Desks: {{$cwsBooking->sharedDeskBooking->no_of_desk}}</p>
															</div>
															<div>
																<h6 class="r-boldItalic f-9 text-light">{{$cwsBooking->currency}} {{$cwsBooking->sharedDeskBooking->price}}</h6>
															</div>
														</div>
														<div class="d-flex justify-content-between flex-row ">
															<div class="mb-1">
																<h6 class="r-boldItalic f-9 text-light mb-0">Duration</h6>
																<p class="r-boldItalic f-9 ">Duration: {{$cwsBooking->sharedDeskBooking->duration}}</p>
															</div>
														</div>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if($cwsBooking->dedicatedDeskBooking)
                                                    <div class="d-flex justify-content-between flex-row ">
                                                        <div class="mb-1">
                                                            <h6 class="r-boldItalic f-9 text-light mb-0">Dedicated Desks</h6>
                                                            <p class="r-boldItalic f-9 ">Number of Desks: {{$cwsBooking->dedicatedDeskBooking->no_of_desk}}</p>
                                                        </div>
                                                        <div>
                                                            <h6 class="r-boldItalic f-9 text-light">&#8377; {{$cwsBooking->dedicatedDeskBooking->price}} </h6>
                                                        </div>
                                                    </div>
													<div class="d-flex justify-content-between flex-row ">
														<div class="mb-1">
															<h6 class="r-boldItalic f-9 text-light mb-0">Duration</h6>
															<p class="r-boldItalic f-9 ">Duration: {{$cwsBooking->dedicatedDeskBooking->duration}}</p>
														</div>
													</div>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if($cwsBooking->privateOfficeBooking)
                                                    <div class="d-flex justify-content-between flex-row ">
                                                        <div class="mb-1">
                                                            <h6 class="r-boldItalic f-9 text-light mb-0">Private Offices</h6>
                                                            <p class="r-boldItalic f-9 ">Number of Offices: {{ $cwsBooking->privateOfficeBooking->no_of_offices }}</p>
                                                        </div>
                                                        <div>
                                                            <h6 class="r-boldItalic f-9 text-light">&#8377; {{$cwsBooking->privateOfficeBooking->price}}</h6>
                                                        </div>
                                                    </div>
													<div class="d-flex justify-content-between flex-row ">
														<div class="mb-1">
															<h6 class="r-boldItalic f-9 text-light mb-0">Duration</h6>
															<p class="r-boldItalic f-9 ">Duration: {{$cwsBooking->privateOfficeBooking->duration}}</p>
														</div>
													</div>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if($cwsBooking->meetingRoomBooking)
                                                    <div class="d-flex justify-content-between flex-row ">
                                                        <div class="mb-1">
                                                            <h6 class="r-boldItalic f-9 text-light mb-0">Meeting Room</h6>
                                                            <p class="r-boldItalic f-9 ">Number of Meeting Rooms: {{ $cwsBooking->meetingRoomBooking->no_of_meeting_rooms }}</p>
                                                        </div>
                                                        <div>
                                                            <h6 class="r-boldItalic f-9 text-light">&#8377; {{$cwsBooking->meetingRoomBooking->price}}</h6>
                                                        </div>
                                                    </div>
													<div class="d-flex justify-content-between flex-row ">
														<div class="mb-1">
															<h6 class="r-boldItalic f-9 text-light mb-0">Duration</h6>
															<p class="r-boldItalic f-9 ">Duration: {{$cwsBooking->meetingRoomBooking->duration}}</p>
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
                                                            <h6 class="r-boldItalic f-9 text-light">{{ $cwsBooking->check_in_time }}</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="row ">
                                                <div class="col-sm-8 pr-sm-0">
                                                    <input type="text" name="promo-code" placeholder="Enter promo code" class="w-100 form-control bg-white py-3 px-4 rounded-0">
                                                </div>
                                                <div class="col-sm-4 pt-sm-0 pt-3 pl-2 appliedBtn">
                                                    <button type="button" class="btn btn-success n-bold f-9 rounded-0 mx-auto text-center justify-content-center w-100 apply-code" id="apply-code">Apply</button>
                                                </div>
                                            </div>
                                            <div class="total pt-lg-4">
                                            @if($cwsBooking->sharedDeskBooking()->count() > 0)
                                                @if(strpos($cwsBooking->sharedDeskBooking->duration, 'Months') !== false)
													<h6 class="r-boldItalic f-9 text-light w-100">Commitment</h6> 
													<select wire:model="paymentType" class="form-control">
														<option value="Monthly">Monthly</option>
														@if($this->cwsBooking->sharedDeskBooking->duration == '3 Months')
														<option value="All">Quarterly</option>
														@elseif($this->cwsBooking->sharedDeskBooking->duration == '6 Months')
														<option value="All">Half Yearly</option>
														@elseif($this->cwsBooking->sharedDeskBooking->duration == '12 Months')
														<option value="All">Yearly</option>
														@else
														<option value="All">All</option>
														@endif
													<select>
                                                @endif
                                            @elseif($cwsBooking->dedicatedDeskBooking()->count() > 0)
												@if(strpos($cwsBooking->dedicatedDeskBooking->duration, 'Months') !== false)
													<h6 class="r-boldItalic f-9 text-light w-100">Commitment</h6> 
													<select wire:model="paymentType" class="form-control">
														<option value="Monthly">Monthly</option>
														@if($this->cwsBooking->dedicatedDeskBooking->duration == '3 Months')
														<option value="All">Quarterly</option>
														@elseif($this->cwsBooking->dedicatedDeskBooking->duration == '6 Months')
														<option value="All">Half Yearly</option>
														@elseif($this->cwsBooking->dedicatedDeskBooking->duration == '12 Months')
														<option value="All">Yearly</option>
														@else
														<option value="All">All</option>
														@endif
													<select>
                                                @endif
                                            @elseif($cwsBooking->privateOfficeBooking()->count() > 0)
												@if(strpos($cwsBooking->privateOfficeBooking->duration, 'Months') !== false)
													<h6 class="r-boldItalic f-9 text-light w-100">Commitment</h6> 
													<select wire:model="paymentType" class="form-control">
														<option value="Monthly">Monthly</option>
														@if($this->cwsBooking->privateOfficeBooking->duration == '3 Months')
														<option value="All">Quarterly</option>
														@elseif($this->cwsBooking->privateOfficeBooking->duration == '6 Months')
														<option value="All">Half Yearly</option>
														@elseif($this->cwsBooking->privateOfficeBooking->duration == '12 Months')
														<option value="All">Yearly</option>
														@else
														<option value="All">All</option>
														@endif
													<select>
												@endif
											@elseif($cwsBooking->meetingRoomBooking()->count() > 0)
												@if(strpos($cwsBooking->meetingRoomBooking->duration, 'Months') !== false)
													<h6 class="r-boldItalic f-9 text-light w-100">Commitment</h6> 
													<select wire:model="paymentType" class="form-control">
														<option value="Monthly">Monthly</option>
														@if($this->cwsBooking->meetingRoomBooking->duration == '3 Months')
														<option value="All">Quarterly</option>
														@elseif($this->cwsBooking->meetingRoomBooking->duration == '6 Months')
														<option value="All">Half Yearly</option>
														@elseif($this->cwsBooking->meetingRoomBooking->duration == '12 Months')
														<option value="All">Yearly</option>
														@else
														<option value="All">All</option>
														@endif
													<select>
												@endif
                                            @endif
                                            </div>
                                            <div class="total d-flex justify-content-between pt-lg-4">
                                                <h6 class="r-boldItalic f-16 text-success">Total</h6>
                                                <h6 class="r-boldItalic f-16 text-success">{{ $cwsBooking->currency }} <span class="total-amount">{{ $totalAmount }}</span></h6>
                                            </div>
                                            <div class="pt-lg-3">
												@if($cwsBooking->currency == 'INR')
													<button type="button" wire:click="makePayment()" class="btn btn-success n-bold f-9 rounded-0 w-100"> Book Now</button>
												@else
													{!! Form::open(['route' => 'co-work-space.payment']) !!}
														{!! Form::hidden('promo_code',null,['id' => 'promo_code']) !!}
														{!! Form::hidden('promo_code_type',null,['id' => 'promo_code_type']) !!}
														{!! Form::hidden('promo_code_discount',null,['id' => 'promo_code_discount']) !!}
														{!! Form::hidden('bookingId',$cwsBooking->id) !!}
														{!! Form::hidden('coWorkSpaceId',$cwsBooking->cws_id) !!}
														{!! Form::hidden('price', $cwsBooking->total, ['class' => 'total-amount', 'wire:model' => 'totalAmount']) !!}
														{!! Form::hidden('title', 'Booking Co-working space') !!}
														<button type="submit" class="btn btn-success n-bold f-9 rounded-0 w-100"> Book Now</button>
													{!! Form::close() !!}
												@endif
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
	@if($cwsBooking->currency == 'INR')
		{!! Form::open(['route' => 'razorpay.payment.store', 'id' => 'razorpay-form']) !!}
			{!! Form::hidden('razorpay_payment_id', null, ['id' => 'razorpay_payment_id']) !!}
			{!! Form::hidden('cwsPaymentId', null, ['id' => 'co_work_space_payment_id']) !!}
			{!! Form::hidden('bookingId', $cwsBooking->id, ['id' => 'booking_id']) !!}
			{!! Form::hidden('coWorkSpaceId', $coWorkSpace->id, ['id' => 'co_work_space_id']) !!}
			{!! Form::hidden('amount', $cwsBooking->amount, ['id' => 'amount']) !!}
			{!! Form::hidden('currency', 'INR') !!}
		{!! Form::close() !!}
	@endif
</div>
