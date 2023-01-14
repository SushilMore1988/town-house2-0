<div class="tab-pane px-0" id="meeting">
	<div class="unic-form diffrent-tab pb-4">
		<div class="side-pane">
			<div class="px-md-4 px-2">
				<div class="mb-4">
					<h6 class="mb-3 r-boldItalic f-9 head-description">Timing</h6>
						
						{{-- @foreach($coWorkSpace->cwsOpeningHours->sortBy('id') as $workingHours) --}}
						@if($coWorkSpace->opening_hours['timing']['monday']['checked'] == 1)
							<p class="mb-2 r-lightItalic f-8 head-description">Monday to Friday  : ({{$coWorkSpace->opening_hours['timing']['monday']['from']}} to {{$coWorkSpace->opening_hours['timing']['monday']['to']}} )    </p>
							<p class="mb-2 r-lightItalic f-8 head-description">Satuday : ({{$coWorkSpace->opening_hours['timing']['saturday']['from']}} to {{$coWorkSpace->opening_hours['timing']['saturday']['to']}} )</p>
							<p class="mb-2 r-lightItalic f-8 head-description">Sunday : ({{$coWorkSpace->opening_hours['timing']['sunday']['from']}} to {{$coWorkSpace->opening_hours['timing']['sunday']['to']}} )</p>
						@endif
						{{-- @endforeach --}}
						{{-- {{dd($workingHours->from == $mondayFrom)}} --}}
							{{-- @if($workingHours->from == $mondayFrom && $workingHours->to == $mondayTo)
								<p class="mb-2 r-lightItalic f-8 head-description">Monday - {{ $workingHours->day }} :
									<span class = "r-dark ">{{ $workingHours->from}} - {{ $workingHours->to }}</span>
								</p>
							@elseif(($workingHours->from != $mondayFrom && $workingHours->from != null) || ( $workingHours->to != $mondayTo && $workingHours->to != null ))
								<p class="mb-2 r-lightItalic f-8 head-description">{{ $workingHours->day }} :
									<span class = "r-dark ">{{ $workingHours->from}} - {{ $workingHours->to }}</span>
								</p>
							@elseif( empty($workingHours->from) || empty($workingHours->to))

							@endif --}}
						{{-- @endforeach --}}

					{{-- <p class="mb-2 r-lightItalic f-8 head-description">Sunday</p> --}}
				</div>
				<div class="d-flex mb-4 justify-content-between">
					<div>
						<h6 class="mb-2 r-boldItalic f-9 head-description">Special Attribute</h6>
						<p class="mb-2 r-lightItalic f-8 head-description">{!! empty($coWorkSpace->cwsMaster)? null :$coWorkSpace->cwsMaster->special_attribute!!}</p>
						{{-- <p class="mb-2 r-lightItalic f-8 head-description">Meet up Events</p> --}}
					</div>
					<div class="end-date time-tab" style="max-height: 125px;">
						{{-- <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> --}}
							<div class="d-flex">
								<h6 class="r-boldItalic f-9 head-description mb-1">Office Hours: </h6>
							</div>
							<h5 class="n-bold f-24 text-dark mb-0">24</h5>
							<p class="r-lightItalic f-8 head-description">Hrs</p>
						{{-- </div> --}}
					</div>
				</div>
			</div>
			<div class="formAccordian-first-cls" id="formAccordian">
				<div class="card px-0 border-0 shadow-none pt-0 ">
					{{-- @if(session()->has('message'))
						 <p class="alert alert-success time-out-alert">{{session()->get('message')}}</p>
					@elseif(session()->has('error'))
						 <p class="alert alert-danger time-out-alert">{{session()->get('error')}}</p>
					@endif --}}
					
					<div class="card-header green-btn p-0 border-bottom">
						<a class="bg-color   mr-2 w-100  r-boldItalic f-9 text-left text-dark border main-anch collapsed px-md-4 px-2 d-flex align-self-center position-relative py-3 booking-tab-pane border-0 text-uppecase" data-toggle='collapse' href='#collapseOne'>
							<span class="align-self-center f-9 rounded-0">Message Us</span>
						</a>
					</div>
					<div class="collapse show py-3 px-md-4 px-2" id="collapseOne" data-parent='#formAccordian'>
						{!! Form::open( [ 'id' => 'message_us_form' ] ) !!}
							<div class="card-body">
								<div id ="msg" class="alert alert-secondary d-none">
								</div>
								<div class="form-group">
									{!! Form::text( 'first_name', null, [ 'id' => 'first_name', 'placeholder' => 'First Name' ,'class' => 'w-100 form-control px-2', 'required' =>'true']) !!}	
					  				@if ($errors->has('first_name')) 
			  							<div class="text-danger mt-1">	
											{{ $errors->first('first_name') }}
										</div>
									@endif
									<span class="text-danger mt-1" id="first_name_error"></span>
								</div>
								<div class="form-group">
									{!! Form::text( 'last_name', null, [ 'id' => 'last_name', 'placeholder' => 'Last Name' ,'class' => 'w-100 form-control px-2', 'required' =>'']) !!}	
					  				@if ($errors->has('last_name')) 
			  							<div class="text-danger mt-1">	
											{{ $errors->first('last_name') }}
										</div>
									@endif
									<span class="text-danger mt-1" id="last_name_error"></span>
								</div>
								<div class="form-group">
									{!! Form::email( 'email', null, [ 'id' => 'email', 'placeholder' => 'Email' ,'class' => 'w-100 form-control px-2', 'required' =>'']) !!}	
					  				@if (session()->has('email')) 
			  							<div class="text-danger mt-1">	
											{{ $errors->first('email') }}
										</div>
									@endif
									<span class="text-danger mt-1" id="email_error"></span>
								</div>
								<div class="form-group mb-0">
									{!! Form::textarea( 'message', null, ['id' => 'enquiry_message' , 'placeholder' => 'Message', 'rows' => "10", 'class' => 'w-100 form-control px-2 pb-0', 'required' =>'' ]) !!}	
									<span class="text-danger mt-1" id="message_error"></span>
		  							@if ($errors->has('message')) 
			  							<div class="text-danger mt-1">	
											{{ $errors->first('message') }}
										</div>
									@endif
								</div>
							<button type="button" id = 'enquiry' class="btn btn-success n-bold f-9 rounded-0 mx-auto text-center justify-content-center mr-2 w-100"> 
								<div class="spinner-border spinner-border-sm d-none mr-2" role="status" id="spinner">
									<span class="sr-only">Loading...</span> 
								</div>Send Request
							</button>
						</div> 
						{!! Form::close()!!}
					</div>
				</div>
				<div class="card px-0 border-0 shadow-none">
					<div class="card-header green-btn p-0 border-bottom">
						<a href="#collapseTwo" class="bg-color   mr-2 w-100  r-boldItalic f-9 text-left text-dark border main-anch collapsed px-md-4 px-2 d-flex align-self-center position-relative py-3 booking-tab-pane border-0 text-uppecase" data-toggle="collapse">
							<span class="align-self-center f-9 rounded-0">Membership Enquiry</span>
						</a>
					</div>
					<div class="collapse py-3 px-md-4 px-2" id="collapseTwo" data-parent='#formAccordian'>
						<div class="card-body">
							<div id ="membership_msg" class="alert alert-secondary d-none">
							</div>
							<div class="form-group">
								{!! Form::text( 'membership_first_name', null, [ 'id' => 'membership_first_name', 'placeholder' => 'First Name' ,'class' => 'w-100 form-control px-2', 'required' =>'']) !!}	
				  				{{-- @if ($errors->has('membership_first_name')) 
		  							<div class="text-danger mt-1">	
										{{ $errors->first('membership_first_name') }}
									</div>
								@endif --}}
								<span class="text-danger mt-1" id="membership_first_name_error"></span>
							</div>
							<div class="form-group">
								{!! Form::text( 'membership_last_name', null, [ 'id' => 'membership_last_name', 'placeholder' => 'Last Name' ,'class' => 'w-100 form-control px-2', 'required' =>'']) !!}	
				  				{{-- @if ($errors->has('membership_last_name')) 
		  							<div class="text-danger mt-1">	
										{{ $errors->first('membership_last_name') }}
									</div>
								@endif --}}
								<span class="text-danger mt-1" id="membership_last_name_error"></span>
							</div>
							<span class="text-danger mt-1" id="membership_last_name_error"></span>
							<div class="form-group">
								{!! Form::email( 'membership_email', null, [ 'id' => 'membership_email', 'placeholder' => 'Email' ,'class' => 'w-100 form-control px-2', 'required' =>'']) !!}	
				  				{{-- @if ($errors->has('membership_email')) 
		  							<div class="text-danger mt-1">	
										{{ $errors->first('membership_email') }}
									</div>
								@endif --}}
								<span class="text-danger mt-1" id="membership_email_error"></span>
							</div>
							<h6 class="r-boldItalic f-9 text-light"><strong>Duration</strong></h6>
							{{-- <p class="r-lightItalic f-9 text-light mb-2">26.04.2019 | 26.05.2019</p> --}}

							<div class="d-flex mb-4 justify-content-between">
								<div class="start-date w-50">
									<div class="d-flex justify-content-between">
										{{-- <input type="hidden" id="me-start-date-val" name=""> --}}
										{!! Form::hidden('start_date', null, [ 'id' => 'me-start-date-val', 'required' =>'']) !!}	
										<h6 class="r-boldItalic f-9 text-light">Starting Date: </h6>
										<a href="#" class="button tiny" id="me-start-date" data-date-format="yyyy-mm-dd" data-date="">
											<img src="{{url('front/img/add-filter-list/calender.jpg')}}" alt="calender" />
										</a> 
									</div>
									{{-- @if ($errors->has('membership_email')) 
			  							<div class="text-danger mt-1">	
											{{ $errors->first('membership_email') }}
										</div>
									@endif	 --}}
									<div id="startDate"></div>
									<h5 class="n-bold f-24 text-dark" id="me-start-day"></h5>
									<p class="r-lightItalic f-9 text-light" id="me-start-month-year"> </p>
								</div>
								
								<div class="end-date w-50">
									<div class="d-flex justify-content-between">
										<input type="hidden" id="me-end-date-val" name="end_date">
										<h6 class="r-boldItalic f-9 text-light">End Date: </h6>
										<a href="#" class="button tiny" id="me-end-date" data-date-format="yyyy-mm-dd" >
											<img src="{{url('front/img/add-filter-list/calender.jpg')}}" alt="calender" />
										</a>
									</div>
									<div id="endDate"></div>
									<h5 class="n-bold f-24 text-dark" id="me-end-day"></h5>
									<p class="r-lightItalic f-9 text-light" id="me-end-month-year"></p>
								</div>
							</div>
							<div>
								<span class="text-danger mt-1" id="membership_start_date_error"></span>
							</div>
							<div>
								<span class="text-danger mt-1" id="membership_end_date_error"></span>
							</div>
					
							<div class="form-group mb-0">
								{{-- <textarea rows="3" placeholder="Any Specific Requirement/ Message" class="w-100 form-control px-2"></textarea> --}}
								<div class="form-group mb-0">
									{!! Form::textarea( 'membership_message', null, ['id' => 'membership_message' , 'placeholder' => 'Any Specific Requirement/ Message', 'rows' => "3", 'class' => 'w-100 form-control px-2', 'required' =>'' ]) !!}	
									<span class="text-danger mt-1" id="membership_message_error"></span>
								</div>
							</div>
							<button type="button" id="member-ship" class="btn btn-success n-bold f-9 rounded-0 mx-auto text-center justify-content-center mr-2 w-100">
								<div class="spinner-border spinner-border-sm d-none mr-2" role="status" id="member-spinner">
									<span class="sr-only">Loading...</span> 
								</div>Send Request
							</button>
							
						</div>
					</div>
				</div>
				<div class="card px-0 border-0 shadow-none">
					<div class="card-header green-btn p-0 border-bottom-0">
						<a href="#collapseThree" class="bg-color   mr-2 w-100  r-boldItalic f-9 text-left text-dark border main-anch collapsed px-md-4 px-2 d-flex align-self-center position-relative py-3 booking-tab-pane border-0 text-uppecase" data-toggle='collapse'>
							<span class="align-self-center f-9 rounded-0">Schedule a Tour</span>
						</a>
					</div>
					<div class="collapse py-3 px-md-4 px-2" id="collapseThree" data-parent='#formAccordian'> 
						<div class="card-body">
							<div id ="schedule_tour_msg" class="alert alert-secondary d-none">
							</div>
							<div class="form-group">
								{!! Form::text( 'schedule_tour_first_name', null, [ 'id' => 'schedule_tour_first_name', 'placeholder' => 'First Name' ,'class' => 'w-100 form-control px-2', 'required' =>'']) !!}	
				  				{{-- @if ($errors->has('schedule_tour_first_name')) 
		  							<div class="text-danger mt-1">	
										{{ $errors->first('schedule_tour_first_name') }}
									</div>
								@endif --}}
								<span class="text-danger mt-1" id="schedule_tour_first_name_error"></span>
							</div>
							<div class="form-group">
								{!! Form::text( 'schedule_tour_last_name', null, [ 'id' => 'schedule_tour_last_name', 'placeholder' => 'Last Name' ,'class' => 'w-100 form-control px-2', 'required' =>'']) !!}	
				  			{{-- 	@if ($errors->has('schedule_tour_last_name')) 
		  							<div class="text-danger mt-1">	
										{{ $errors->first('schedule_tour_last_name') }}
									</div>
								@endif --}}
								<span class="text-danger mt-1" id="schedule_tour_last_name_error"></span>
							</div>
							<div class="form-group">
								{!! Form::email( 'schedule_tour_email', null, [ 'id' => 'schedule_tour_email', 'placeholder' => 'Email' ,'class' => 'w-100 form-control px-2', 'required' =>'']) !!}	
				  				@if ($errors->has('schedule_tour_email')) 
		  							<div class="text-danger mt-1">	
										{{ $errors->first('schedule_tour_email') }}
									</div>
								@endif
								<span class="text-danger mt-1" id="schedule_tour_email_error"></span>
							</div>
							<div class="form-group mb-0">
									{!! Form::textarea( 'schedule_tour_message', null, ['id' => 'schedule_tour_message' , 'placeholder' => 'Message', 'rows' => "3", 'class' => 'w-100 form-control px-2', 'required' =>'' ]) !!}	
		  							@if ($errors->has('schedule_tour_message')) 
			  							<div class="text-danger mt-1">	
											{{ $errors->first('schedule_tour_message') }}
										</div>
									@endif
									<span class="text-danger mt-1" id="schedule_tour_message_error"></span>
								</div>
							{{-- <div class="form-group">
								<input type="text" name="fname" placeholder="First Name" class="w-100 form-control px-2"/>
							</div>
							<div class="form-group">
								<input type="text" name="lname" placeholder="Last Name" class="w-100 form-control px-2"/>
							</div>
							<div class="form-group">
								<input type="email" name="emali" placeholder="Email" class="w-100 form-control px-2"/>
							</div>
							<div class="form-group">
								<textarea rows="3" placeholder="Message" class="w-100 form-control px-2"></textarea>
							</div> --}}
							<h6 class="r-boldItalic f-9 text-light"><strong>Duration</strong></h6>
							{{-- <p class="r-lightItalic f-9 text-light mb-2">26.04.2019 | 26.05.2019</p> --}}
							<div class="d-flex mb-4 justify-content-between">
								<div class="start-date w-50">
									<div class="d-flex justify-content-between">
										<input type="hidden" id="schedule-tour-date-val" name="">
										<h6 class="r-boldItalic f-9 text-light">Date: </h6>
										<a href="#" class="button tiny" id="schedule-tour-date" data-date-format="yyyy-mm-dd" data-date="2012-02-20">

											<img src="{{url('front/img/add-filter-list/calender.jpg')}}" alt="calender" />
										</a>
									</div>
									<div id="startDate"></div>
									<h5 class="n-bold f-24 text-dark" id="schedule-tour-day"></h5>
									<p class="r-lightItalic f-9 text-light" id="schedule-tour-month-year"></p>
								</div>
								{{-- <div class="end-date w-50" id='time-picker'>
									<div class="d-flex">
										<input type="hidden" id="time-picker-val" name="">
										<h6 class="r-boldItalic f-9 head-description mb-1">Time: </h6>
									</div>
									<h5 class="n-bold f-24 text-dark ">24</h5>
									<p class="r-lightItalic f-8 head-description">Hrs</p>
								</div> --}}
								<div class="end-date w-50 dropleft" id='time-picker'>
									<div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<div class="d-flex">
											<h6 class="r-boldItalic f-9 head-description mb-1">Time: </h6>
										</div>
										<h5 class="n-bold f-24 text-dark mb-0" id="timeInHrs"></h5>
										<p class="r-lightItalic f-8 head-description">Hrs</p>
									</div>
									<div class="dropdown-menu px-2 text-center py-1 ">
										@for($i = 1; $i <= 24 ;$i++)
											<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">{{$i}}</span></a>
										@endfor
										{{-- <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">2</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">3</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">4</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">5</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">6</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">7</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">8</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">9</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">10</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">11</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">12</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">13</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">14</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">15</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">16</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">17</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">18</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">19</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">20</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">21</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">22</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">23</a>
										<a class="dropdown-item n-bold f-14 text-dark mb-0 py-0" href="#">24</a> --}}
										{{-- <p class="r-lightItalic f-8 head-description">Hrs</p> --}}
								  	</div>
								</div>
							</div>
							<span  class="text-danger mt-1" id="schedule_tour_date_error"></span>
							<span  class="text-danger mt-1" id="schedule_tour_time_error"></span>
							<button type="button" id="schedule-tour" class="btn btn-success n-bold f-9 rounded-0 mx-auto text-center justify-content-center mr-2 w-100">
								<div class="spinner-border spinner-border-sm d-none mr-2" role="status" id="schedule-tour-spinner">
									<span class="sr-only">Loading...</span> 
								</div>
							 Send Request</button>
							
						</div>
					</div>
				</div>
				{{-- <div class="card px-0 border-0 shadow-none pb-0 mb-3">
					<div class="card-header green-btn p-0">
						<a href="#collapseFour" class="card-link btn btn-success f-9 rounded-0 mr-2 w-100  r-boldItalic f-9" data-toggle='collaspe'>
							Send Request
						</a>
					</div>
					<div class="collapse" id="collapseFour" data-parent='#formAccordian'>
						<div class="card-body">
							
						</div>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
</div>