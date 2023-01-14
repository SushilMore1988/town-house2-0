<div>
    {{-- {!! Form::open( [ 'route' =>'co-work-space.booking', 'id' => 'booking_form'] ) !!} --}}
	<form wire:submit.prevent="store()">
		<div class="px-md-4 px-2">
			<h6 class="r-boldItalic f-9 text-light"><strong>Duration</strong> {{-- {{ $booking_date .' - '. $check_in_time }} --}}</h6>
			<div class="d-flex mb-4 justify-content-between">
				<div class="start-date w-50">
					<div class="d-flex justify-content-between startDateError">
						<h6 class="r-boldItalic f-9 text-light">Starting Date: </h6>
						{!! Form::hidden('coWorkSpaceId', $coWorkSpace->id) !!}
						{!! Form::hidden('userId', Auth::id()) !!}
						{!! Form::hidden('currency', 'INR') !!}
						{!! Form::hidden('bookingDate', null, ['id' =>"booking-start-date", 'wire:model' => 'booking_date']) !!}
						<a href="#" class="button tiny" data-date="" id="dp4" data-date-format="yyyy-mm-dd">
							<img src="{{url('/img/SVG_Cowork/calendor-icon.svg')}}" alt="calender" />
						</a>
					</div>
					<h5 class="n-bold f-24 text-dark" id="b-day">{{ $booking_day }}</h5>
					<p class="r-lightItalic f-9 text-light" id="b-month-year">{{ "$booking_month $booking_year" }}</p>
				</div>
				<div class="end-date w-50 " >
					<div class="d-flex justify-content-between">
						<h6 class="r-boldItalic f-9 text-light">Time: </h6>
					</div>
					<div class='input-group date d-flex'>
						{!! Form::text('meeting_room_check_in_time', '00:00', [ 'class' => 'n-bold text-dark common-field-input number to-time-picker', 'style' => 'border: 0px; width: 70px; display: inline-block; font-size: 14px; padding: 0px']) !!}
					</div>
					@if($errors->has('bookingDate')) 
						<div class="text-danger mt-1">	
							{{ $errors->first('bookingDate') }}
						</div>
					@endif
				</div>
			</div>
		</div>
		<div class="space-preference mb-4" id = "total-value">
			<h6 class="r-boldItalic f-9 text-light pb-3 pt-3 px-md-4 px-2">Space Preference</h6>
			<div class="formAccordian-first-cls" id="formAccordian-first">
				{{-- Shared Desk Start --}}
				@if($coWorkSpace->size['shared_desk']['for_listing'] > 0)
                    <div class="card px-0 border-0 shadow-none pt-0" id="shared-desk">
                        <div class="card-header green-btn p-0 border-bottom ">
                            <a class="bg-color mr-2 w-100 r-boldItalic f-9 text-left text-dark border main-anch px-md-4 px-2 d-flex {{ $is_active_accordion == 'shared' ? '' : 'collapsed' }} align-self-center position-relative py-3 booking-tab-pane border-0 text-uppecase" data-toggle="collapse" href="#" wire:click="$set('is_active_accordion', 'shared')" aria-expanded="{{ $is_active_accordion == 'shared' ? 'true' : 'false' }}">
                                <div class="row w-100">
                                    <div class="col-7 pr-0">
                                        <span class="align-self-center f-9 rounded-0 r-boldItalic f-9">Shared Desks </span>
                                    </div>
                                    <div class="col-2 pl-0 pr-0">
                                        <i class="fas fa-info-circle" title="Book shared (hot seats) desks."></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="py-3 px-md-4 px-2 collapse {{ $is_active_accordion == 'shared' ? 'show' : '' }}" id="shared" data-parent='#formAccordian-first'>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-12 col-sm-8">
                                            <p class="text-justify f-8 r-boldItalic mb-0"><i>Capacity</i> : {{ empty($coWorkSpace->size) ? null : $coWorkSpace->size['shared_desk']['for_listing']}} </p>
                                            {{-- <p class="text-justify f-8 r-boldItalic ">Size : {{ empty($coWorkSpace->size) ? null : $coWorkSpace->size['size_in_sqft']}} <span class= "r-lightItalic"> sqft </span></p> --}}
                                        </div>
                                    </div>
                                    <p class="text-justify f-8 r-boldItalic"><i>Duration {{ $sharedSpace }}</i></p>
                                    @foreach($coWorkSpace->size['shared_desk']['pricing'] as $key => $value)
                                        @if(!empty($coWorkSpace->size['shared_desk']['pricing'][$key]))
											<div class="row mb-3 mb-lg-0">
												<div class="col-lg-6 col-md-12 col-6">
													<label wire:click="onSharedDeskClick('{{ $key }}')" class="container-2 r-lightItalic f-8 check-label ">{{$key}}
														<input name="shared_desk_booking" wire:model="shared_desk_booking" type="radio" value="{{$key}}">
														<span class="checkmark"></span>
													</label>
												</div>
												<div class="col-lg-6 col-md-12 col-6">
													<label class="container-2 r-lightItalic f-8 check-label"> {{empty($coWorkSpace->size['currency']) ? null : Symfony\Component\Intl\Currencies::getSymbol($coWorkSpace->size['currency']) }} {{empty($coWorkSpace->gst) ? $value : ($value+($value*$tax->tax/100))}}</label>
												</div>
											</div>
                                        @endif
                                    @endforeach

									@error('shared_desk_booking')
										<span class="shared_error text-danger">
											{{ $message }}
										</span>
									@enderror
                                    <div class="row pt-3">
                                        <div class="col-lg-6 col-md-12 col-sm-8">	
                                            <p class="text-justify f-8 r-lightItalic">Preferred Space</p>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-4  text-right text-sm-left pl-sm-0 align-self-center clearfix">
                                        </div>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-lg-6 col-md-12 col-sm-8 align-self-center">	
                                            <p class="text-left f-8 r-boldItalic align-self-center mb-0">Number of Shared Desk</p>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-4  text-right pl-sm-0 align-self-center clearfix">
                                            <div class="no-of-people float-right">
                                                <div class="d-flex increment">
                                                    <span wire:click="minusSharedDeskCountBooking" class="circle"><img src="{{url('front/img/add-filter-list/minus.jpg')}}" alt="" /></span>
                                                    <span id="shared-count" class="px-2 num r-boldItalic f-8 mt-1">{{ $shared_desk_booking_count }}</span>
                                                    <span wire:click="plusSharedDeskCountBooking" class="circle"><img src="{{url('front/img/add-filter-list/plus.jpg')}}" alt="" /></span>
                                                </div>
                                            </div>
                                        </div>

										@error('shared_desk_booking_count')
										<span class=" text-danger">
											{{ $message }}
										</span>
										@enderror
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
				@endif
				{{-- Shared Desk End --}}

				@if($coWorkSpace->size['dedicated_desk']['for_listing'] > 0)
                    <div class="card px-0 border-0 shadow-none" id="dedicated-desk">
                        <div class="card-header green-btn p-0 border-bottom">
                            <a href="#" class="bg-color mr-2 w-100 r-boldItalic f-9 text-left text-dark border main-anch {{ $is_active_accordion == 'dedicated' ? '' : 'collapsed' }} px-md-4 px-2 d-flex align-self-center position-relative py-3 booking-tab-pane border-0 text-uppecase" aria-expanded="true" data-toggle="collapse" wire:click="$set('is_active_accordion', 'dedicated')" aria-expanded="{{ $is_active_accordion == 'dedicated' ? 'true' : 'false' }}">
                                <!-- <span class="align-self-center text-uppercase f-9 rounded-0">Dedicated Desks <i class="fas fa-info-circle pl-2"></i></span> -->
                                <div class="row w-100">
                                    <div class="col-7 pr-0">
                                        <span class="align-self-center f-9 rounded-0 r-boldItalic f-9">Dedicated Desks</span>
                                    </div>
                                    <div class="col-2 pl-0 pr-0">
                                        <i class="fas fa-info-circle" title="Book dedicated desk"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <span class="dedicated_error "></span>
                        <div class="py-3 px-md-4 px-2 collapse {{ $is_active_accordion == 'dedicated' ? 'show' : '' }}" id="dedicated" data-parent='#formAccordian-first'>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-12 col-sm-8">
                                            <p class="text-justify f-8 r-boldItalic mb-0">Capacity : {{ empty($coWorkSpace->size) ? null : $coWorkSpace->size['dedicated_desk']['for_listing']}} </p>
                                            <p class="text-justify f-8 r-boldItalic ">Size : {{ empty($coWorkSpace->size) ? null : $coWorkSpace->size['size_in_sqft']}} <span class= "r-lightItalic"> sqft </span></p>
                                        </div>
                                    </div>
                                    <p class="text-justify f-8 r-boldItalic"><i>Duration</i></p>
                                    @foreach($coWorkSpace->size['dedicated_desk']['pricing'] as $key => $value)
                                        @if(!empty($coWorkSpace->size['dedicated_desk']['pricing'][$key]))
                                            <div class="row mb-3 mb-lg-0">
                                                <div class="col-lg-6 col-md-12 col-6">
                                                    <label wire:click="onDedicatedDeskClick('{{ $key }}')" class="container-2 r-lightItalic f-8 check-label">{{$key}} 
                                                        <input wire:model="dedicated_desk_booking" type="radio" name="dedicatedRadio" value="{{$key}}" data-price ="{{empty($coWorkSpace->gst) ? $value : ($value+($value*$tax->tax/100))}}">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-6">
                                                    <label class="container-2 r-lightItalic f-8 check-label">{{ Symfony\Component\Intl\Currencies::getSymbol($coWorkSpace->size['currency']) }} {{empty($coWorkSpace->gst) ? $value : ($value+($value*$tax->tax/100))}} 
                                                    </label>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
									@error('dedicated_desk_booking')
										<span class=" text-danger">
											{{ $message }}
										</span>
									@enderror
                                    <div class="row pt-3">
                                        <div class="col-lg-6 col-md-12 col-sm-8">	
                                            <p class="text-justify f-8 r-lightItalic">Preferred Space</p>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-4  text-right text-sm-left pl-sm-0 align-self-center clearfix">
                                            {{-- <p class="text-justify f-8 r-lightItalic float-right">Number of Desks</p> --}}
                                        </div>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-lg-6 col-md-12 col-sm-8 align-self-center">
                                            <p class="text-justify f-8 r-boldItalic align-self-center mb-0">Number of Dedicated Desk</p>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-4  text-right text-sm-left pl-sm-0 align-self-center clearfix">
                                            <div class="no-of-people float-right">
                                                <div class="d-flex increment">
                                                    <span wire:click="minusDedicatedDeskCountBooking" class="circle"><img src="{{url('front/img/add-filter-list/minus.jpg')}}" alt="" /></span>
                                                    <span id="dedicated-count" class="px-2 num r-boldItalic f-8 mt-1">{{ $dedicated_desk_booking_count }}</span>
                                                    <span wire:click="plusDedicatedDeskCountBooking" class="circle"><img src="{{url('front/img/add-filter-list/plus.jpg')}}" alt="" /></span>
                                                </div>
                                            </div>
                                        </div>
										@error('dedicated_desk_booking_count')
										<span class=" text-danger">
											{{ $message }}
										</span>
										@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				@endif

				@if($coWorkSpace->size['private_offices']['for_listing'] > 0 && !empty($coWorkSpace->size['private_offices']['types']))
					<div class="card px-0 border-0 shadow-none" id='private-desk'>
						<div class="card-header green-btn p-0 border-bottom bg-light">
							<a href="#" class="bg-color mr-2 w-100 r-boldItalic f-9 text-left text-dark border main-anch {{ $is_active_accordion == 'private' ? '' : 'collapsed' }} px-md-4 px-2 d-flex align-self-center position-relative py-3 booking-tab-pane border-0 text-uppecase" data-toggle='collapse' wire:click="$set('is_active_accordion', 'private')" aria-expanded="{{ $is_active_accordion == 'private' ? 'true' : 'false' }}">
								<div class="row w-100">
									<div class="col-7 pr-0">
										<span class="align-self-center f-9 rounded-0 r-boldItalic f-9">Private Offices  </span>
									</div>
									<div class="col-2 pl-0 pr-0">
										<i class="fas fa-info-circle "></i>
									</div>
								</div>
							</a>
						</div>
						<span class="private_office_error "></span>
						<div class="py-3 px-md-4 px-2 collapse {{ $is_active_accordion == 'private' ? 'show' : '' }}" id="private" data-parent='#formAccordian-first'> 
							<div class="card-body">
								<div class="container">
									<div class="row PT-3">
										<div class="col-lg-12 col-md-12 col-sm-8">
											<p class="text-justify f-8 r-lightItalic">Private, Lockable and secure office space to accommodate terms of all sizes.</p>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<select wire:model="private_office" name="private_office" class="common-field w-100 form-control" style="border: 1px solid #f4f4f5; padding: 0px 8px;">
												<option value="">Select Office</option>
													@foreach($coWorkSpace->size['private_offices']['types'] as $key => $value)
														<option value="{{ $key }}">{{ $coWorkSpace->size['private_offices']['types'][$key]['name'] }}</option>
													@endforeach
											</select>
										</div>
									</div>
									<p class="text-justify f-8 r-boldItalic"><i>Duration</i></p>
									@if($private_office != null)
										@foreach($coWorkSpace->size['private_offices']['types'][$private_office]['pricing'] as $key => $value)
											<div class="row mb-3 mb-lg-0 pop private_{{$private_office}}">
												<div class="col-lg-6 col-md-12 col-6">
													<label  class="container-2 r-lightItalic f-8 check-label ">{{$key}} 
														<input type="radio" name="privateRadio" value="{{$key}}" wire:model="private_office_booking">
														<span class="checkmark"></span>
													</label>
												</div>
												<div class="col-lg-6 col-md-12 col-6">
													<label class="container-2 r-lightItalic f-8 check-label"><span class="private_one_month"></span> {{ Symfony\Component\Intl\Currencies::getSymbol($coWorkSpace->size['currency']) }} {{empty($coWorkSpace->gst) ? $value : ($value+($value*$tax->tax/100))}}
													</label>
												</div>
											</div>
										@endforeach
									@endif
									@error('private_office_booking')
										<span class=" text-danger">
											{{ $message }}
										</span>
									@enderror
									<div class="row pt-1">
										<div class="col-lg-6 col-md-12 col-sm-8 align-self-center">	
											<p class="text-left f-8 r-boldItalic align-self-center mb-0">Number of Offices</p>
										</div>
										<div class="col-lg-6 col-md-12 col-sm-4  text-right pl-sm-0 align-self-center clearfix">
											<div class="no-of-people float-right">
												<div class="d-flex increment">
													<span wire:click="minusPrivateOfficeCountBooking" class="circle shared-minus minusCount"><img src="{{url('front/img/add-filter-list/minus.jpg')}}" alt="" /></span>
													<span id="shared-count" class="px-2 num r-boldItalic f-8 mt-1">{{ $private_office_booking_count }}</span>
													<span wire:click="plusPrivateOfficeCountBooking" class="circle shared-plus plusCount"><img src="{{url('front/img/add-filter-list/plus.jpg')}}" alt="" /></span>
												</div>
											</div>
										</div>
										@error('private_office_booking_count')
											<span class=" text-danger">
												{{ $message }}
											</span>
										@enderror
									</div>
								</div>
							</div>
						</div>
					</div>
				@endif

				@if($coWorkSpace->size['meeting_rooms']['for_listing'] > 0)
					<div class="card px-0 border-0 shadow-none" id='meeting-desk'>
						<div class="card-header green-btn p-0 border-bottom-0">
							<a href="#" class="bg-color mr-2 w-100 r-boldItalic f-9 text-left text-dark border main-anch {{ $is_active_accordion == 'meeting-room' ? '' : 'collapsed' }} px-md-4 px-2 d-flex align-self-center position-relative py-3 booking-tab-pane border-0 text-uppecase" data-toggle='collapse' wire:click="$set('is_active_accordion', 'meeting-room')" aria-expanded="{{ $is_active_accordion == 'meeting-room' ? 'true' : 'false' }}">
								<div class="row w-100">
									<div class="col-7 pr-0">
										<span class="align-self-center f-9 rounded-0 r-boldItalic f-9">Meeting Rooms </span>
									</div>
									<div class="col-2 pl-0 pr-0">
										<i class="fas fa-info-circle "></i>
									</div>
								</div>
							</a>
						</div>
						<span class="meeting_room_error "></span>
						<div class="py-3 px-md-4 px-2 collapse {{ $is_active_accordion == 'meeting-room' ? 'show' : '' }}" id="meeting-room" data-parent='#formAccordian-first'> 
							<div class="card-body">
								<div class="container">
									<div class="row PT-3">
									<div class="col-lg-12 col-md-12 col-sm-8">
										<p class="text-justify f-8 r-lightItalic">Private,Lockable and secure office space to accommodate terms of all sizes.</p>
									</div>
									</div>
									<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<select wire:model="meeting_room" name="meetingRoomId" class="common-field w-100 form-control" style="border: 1px solid #f4f4f5; padding: 0px 8px;">
											<option value="">Select Room</option>
											@if($coWorkSpace->size['meeting_rooms']['types_for_listing'] > 0)
												@foreach($coWorkSpace->size['meeting_rooms']['types'] as $key => $type)
													<option value="{{ $key }}">{{ $type['name'] }}</option>
												@endforeach
											@endif
										</select>
									</div>
									</div>
									<p class="text-justify f-8 r-boldItalic"><i>Duration</i></p>
									@if($meeting_room != null)
										@foreach($coWorkSpace->size['meeting_rooms']['types'][$meeting_room]['pricing'] as $timeline => $price)
											<div class="row mb-3 mb-lg-0">
												<div class="col-lg-6 col-md-12 col-6">
												<label class="container-2 r-lightItalic f-8 check-label">{{$timeline}}
													<input wire:model="meeting_room_booking" type="radio" name="meetingRadio" class="meetingRadio" value="{{$timeline}}">
													<span class="checkmark"></span>
												</label>
												</div>
												<div class="col-lg-6 col-md-12 col-6">
												<label class="container-2 r-lightItalic f-8 check-label" ><span class="meeting_one_hour"></span> {{ Symfony\Component\Intl\Currencies::getSymbol($coWorkSpace->size['currency']) }} {{empty($coWorkSpace->gst) ? $price : ($price+($price*$tax->tax/100))}}
												</label>
												</div>
											</div>
										@endforeach
									@endif
									@error('meeting_room_booking')
										<span class=" text-danger">
											{{ $message }}
										</span>
									@enderror
									<div class="row pt-1">
										<div class="col-lg-6 col-md-12 col-sm-8 align-self-center">	
											<p class="text-left f-8 r-boldItalic align-self-center mb-0">Number of Offices</p>
										</div>
										<div class="col-lg-6 col-md-12 col-sm-4  text-right pl-sm-0 align-self-center clearfix">
											<div class="no-of-people float-right">
												<div class="d-flex increment">
													<span wire:click="minusMeetingRoomCountBooking" class="circle shared-minus minusCount"><img src="{{url('front/img/add-filter-list/minus.jpg')}}" alt="" /></span>
													<span id="shared-count" class="px-2 num r-boldItalic f-8 mt-1">{{ $meeting_room_booking_count }}</span>
													<span wire:click="plusMeetingRoomCountBooking" class="circle shared-plus plusCount"><img src="{{url('front/img/add-filter-list/plus.jpg')}}" alt="" /></span>
												</div>
											</div>
										</div>
										@error('meeting_room_booking_count')
											<span class=" text-danger">
												{{ $message }}
											</span>
										@enderror
									</div>
								</div>
							</div>
						</div>
					</div>
				@endif

				<div class="px-md-4 px-2 pt-4">
					<div class="row pt-3">
						<div class="col-sm-8 col-8">
							<h6 class="total mb-0 r-boldItalic f-16 text-success">
								Total
							</h6>
							<p class="exclude-tax r-lightItalic f-8 text-light">Excluding Taxes & Discounts*</p>
						</div>
						<div class="col-sm-4 col-4 pl-sm-0">
							<div class="no-of-people mb-4 ">
								<h6 class="mb-3 total r-boldItalic f-16 text-success">
									<span class="total-amount" id="total-check">{{ $total_amount }}</span> {{ $coWorkSpace->size['currency']}}
								</h6>
								
							</div>
						</div>
					</div>
					<div>			
						@if(session()->has('error'))
							<p class="alert alert-danger time-out-alert">{{session()->get('error')}}</p>
						@endif
					</div>
					<div class="row pt-2">
						<div class="text-danger mt-1 mx-3" id="book-now-error"></div>
						<div class="col-12 text-center">
							@auth
							<button type="submit" class="bookNow btn btn-success n-bold f-9 rounded-0 mx-auto text-center justify-content-center d-block w-100" >Continue & Pay</button>
							@else 
							<a href="{{ route('login') }}" class="btn btn-success n-bold f-9 rounded-0 mx-auto text-center justify-content-center d-block w-100">Continue & Pay</a>
							@endauth
						</div>			
					</div>
				</div>
			</div>
		</div>
	{!! Form:: close() !!}
</div>
