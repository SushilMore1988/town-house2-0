<div class="tab-pane px-0" id="meeting">
	<div class="unic-form diffrent-tab pb-4">
		<div class="side-pane">
			<div class="px-md-4 px-2">
				<div class="mb-4">
					<h6 class="mb-3 r-boldItalic f-9 head-description">Timing</h6>
					<p class="mb-2 r-lightItalic f-8 head-description">Monday to Friday : (07:00 AM to 07:00 PM ) </p>
					<p class="mb-2 r-lightItalic f-8 head-description">Satuday : (07:00 AM to 07:00 PM )</p>
					<p class="mb-2 r-lightItalic f-8 head-description">Sunday : ( to )</p>
				</div>
				<div class="d-flex mb-4 justify-content-between">
					<div>
						<h6 class="mb-2 r-boldItalic f-9 head-description">Special Attribute</h6>
						<p class="mb-2 r-lightItalic f-8 head-description"></p>
						<p>An Exciting Indoor, Outdoor working experience and an open table setting at its best!</p>
						<p></p>
					</div>
					<div class="end-date time-tab" style="max-height: 125px;">
						<div class="d-flex">
							<h6 class="r-boldItalic f-9 head-description mb-1">Office Hours: </h6> </div>
						<h5 class="n-bold f-24 text-dark mb-0">24</h5>
						<p class="r-lightItalic f-8 head-description">Hrs</p>
					</div>
				</div>
			</div>
			<div class="formAccordian-first-cls" id="formAccordian">
				<div class="card px-0 border-0 shadow-none pt-0 ">
					<div class="card-header green-btn p-0 border-bottom">
						<a class="bg-color   mr-2 w-100  r-boldItalic f-9 text-left text-dark border main-anch collapsed px-md-4 px-2 d-flex align-self-center position-relative py-3 booking-tab-pane border-0 text-uppecase" data-toggle="collapse" href="#collapseOne"> <span class="align-self-center f-9 rounded-0">Message Us</span> </a>
					</div>
					<div class="collapse show py-3 px-md-4 px-2" id="collapseOne" data-parent="#formAccordian">
						<form method="POST" action="http://127.0.0.1:8000/explore/ripp-studio-private-limited-6" accept-charset="UTF-8" id="message_us_form">
							<input name="_token" type="hidden" value="U9g9zq5nAGe6lDXZ8HHsqBGWmPEkPRqCFXeLS2Yu">
							<div class="card-body">
								<div id="msg" class="alert alert-secondary d-none"> </div>
								<div class="form-group">
									<input id="first_name" placeholder="First Name" class="w-100 form-control px-2" required="true" name="first_name" type="text"> <span class="text-danger mt-1" id="first_name_error"></span> </div>
								<div class="form-group">
									<input id="last_name" placeholder="Last Name" class="w-100 form-control px-2" required="" name="last_name" type="text"> <span class="text-danger mt-1" id="last_name_error"></span> </div>
								<div class="form-group">
									<input id="email" placeholder="Email" class="w-100 form-control px-2" required="" name="email" type="email"> <span class="text-danger mt-1" id="email_error"></span> </div>
								<div class="form-group mb-0">
									<textarea id="enquiry_message" placeholder="Message" rows="10" class="w-100 form-control px-2 pb-0" required="" name="message" cols="50"></textarea> <span class="text-danger mt-1" id="message_error"></span> </div>
								<button type="button" id="enquiry" class="btn btn-success n-bold f-9 rounded-0 mx-auto text-center justify-content-center mr-2 w-100">
									<div class="spinner-border spinner-border-sm d-none mr-2" role="status" id="spinner"> <span class="sr-only">Loading...</span> </div>Send Request </button>
							</div>
						</form>
					</div>
				</div>
				<div class="card px-0 border-0 shadow-none">
					<div class="card-header green-btn p-0 border-bottom">
						<a href="#collapseTwo" class="bg-color   mr-2 w-100  r-boldItalic f-9 text-left text-dark border main-anch collapsed px-md-4 px-2 d-flex align-self-center position-relative py-3 booking-tab-pane border-0 text-uppecase" data-toggle="collapse"> <span class="align-self-center f-9 rounded-0">Membership Enquiry</span> </a>
					</div>
					<div class="collapse py-3 px-md-4 px-2" id="collapseTwo" data-parent="#formAccordian">
						<div class="card-body">
							<div id="membership_msg" class="alert alert-secondary d-none"> </div>
							<div class="form-group">
								<input id="membership_first_name" placeholder="First Name" class="w-100 form-control px-2" required="" name="membership_first_name" type="text"> <span class="text-danger mt-1" id="membership_first_name_error"></span> </div>
							<div class="form-group">
								<input id="membership_last_name" placeholder="Last Name" class="w-100 form-control px-2" required="" name="membership_last_name" type="text"> <span class="text-danger mt-1" id="membership_last_name_error"></span> </div> <span class="text-danger mt-1" id="membership_last_name_error"></span>
							<div class="form-group">
								<input id="membership_email" placeholder="Email" class="w-100 form-control px-2" required="" name="membership_email" type="email"> <span class="text-danger mt-1" id="membership_email_error"></span> </div>
							<h6 class="r-boldItalic f-9 text-light"><strong>Duration</strong></h6>
							<div class="d-flex mb-4 justify-content-between">
								<div class="start-date w-50">
									<div class="d-flex justify-content-between">
										<input id="me-start-date-val" required="" name="start_date" type="hidden">
										<h6 class="r-boldItalic f-9 text-light">Starting Date: </h6>
										<a href="#" class="button tiny" id="me-start-date" data-date-format="yyyy-mm-dd" data-date=""> <img src="http://127.0.0.1:8000/front/img/add-filter-list/calender.jpg" alt="calender"> </a>
									</div>
									<div id="startDate"></div>
									<h5 class="n-bold f-24 text-dark" id="me-start-day"></h5>
									<p class="r-lightItalic f-9 text-light" id="me-start-month-year"> </p>
								</div>
								<div class="end-date w-50">
									<div class="d-flex justify-content-between">
										<input type="hidden" id="me-end-date-val" name="end_date">
										<h6 class="r-boldItalic f-9 text-light">End Date: </h6>
										<a href="#" class="button tiny" id="me-end-date" data-date-format="yyyy-mm-dd"> <img src="http://127.0.0.1:8000/front/img/add-filter-list/calender.jpg" alt="calender"> </a>
									</div>
									<div id="endDate"></div>
									<h5 class="n-bold f-24 text-dark" id="me-end-day"></h5>
									<p class="r-lightItalic f-9 text-light" id="me-end-month-year"></p>
								</div>
							</div>
							<div> <span class="text-danger mt-1" id="membership_start_date_error"></span> </div>
							<div> <span class="text-danger mt-1" id="membership_end_date_error"></span> </div>
							<div class="form-group mb-0">
								<div class="form-group mb-0">
									<textarea id="membership_message" placeholder="Any Specific Requirement/ Message" rows="3" class="w-100 form-control px-2" required="" name="membership_message" cols="50"></textarea> <span class="text-danger mt-1" id="membership_message_error"></span> </div>
							</div>
							<button type="button" id="member-ship" class="btn btn-success n-bold f-9 rounded-0 mx-auto text-center justify-content-center mr-2 w-100">
								<div class="spinner-border spinner-border-sm d-none mr-2" role="status" id="member-spinner"> <span class="sr-only">Loading...</span> </div>Send Request </button>
						</div>
					</div>
				</div>
				<div class="card px-0 border-0 shadow-none">
					<div class="card-header green-btn p-0 border-bottom-0">
						<a href="#collapseThree" class="bg-color   mr-2 w-100  r-boldItalic f-9 text-left text-dark border main-anch collapsed px-md-4 px-2 d-flex align-self-center position-relative py-3 booking-tab-pane border-0 text-uppecase" data-toggle="collapse"> <span class="align-self-center f-9 rounded-0">Schedule a Tour</span> </a>
					</div>
					<div class="collapse py-3 px-md-4 px-2" id="collapseThree" data-parent="#formAccordian">
						<div class="card-body">
							<div id="schedule_tour_msg" class="alert alert-secondary d-none"> </div>
							<div class="form-group">
								<input id="schedule_tour_first_name" placeholder="First Name" class="w-100 form-control px-2" required="" name="schedule_tour_first_name" type="text"> <span class="text-danger mt-1" id="schedule_tour_first_name_error"></span> </div>
							<div class="form-group">
								<input id="schedule_tour_last_name" placeholder="Last Name" class="w-100 form-control px-2" required="" name="schedule_tour_last_name" type="text"> <span class="text-danger mt-1" id="schedule_tour_last_name_error"></span> </div>
							<div class="form-group">
								<input id="schedule_tour_email" placeholder="Email" class="w-100 form-control px-2" required="" name="schedule_tour_email" type="email"> <span class="text-danger mt-1" id="schedule_tour_email_error"></span> </div>
							<div class="form-group mb-0">
								<textarea id="schedule_tour_message" placeholder="Message" rows="3" class="w-100 form-control px-2" required="" name="schedule_tour_message" cols="50"></textarea> <span class="text-danger mt-1" id="schedule_tour_message_error"></span> </div>
							<h6 class="r-boldItalic f-9 text-light"><strong>Duration</strong></h6>
							<div class="d-flex mb-4 justify-content-between">
								<div class="start-date w-50">
									<div class="d-flex justify-content-between">
										<input type="hidden" id="schedule-tour-date-val" name="">
										<h6 class="r-boldItalic f-9 text-light">Date: </h6>
										<a href="#" class="button tiny" id="schedule-tour-date" data-date-format="yyyy-mm-dd" data-date="2012-02-20"> <img src="http://127.0.0.1:8000/front/img/add-filter-list/calender.jpg" alt="calender"> </a>
									</div>
									<div id="startDate"></div>
									<h5 class="n-bold f-24 text-dark" id="schedule-tour-day"></h5>
									<p class="r-lightItalic f-9 text-light" id="schedule-tour-month-year"></p>
								</div>
								<div class="end-date w-50 dropleft" id="time-picker">
									<div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<div class="d-flex">
											<h6 class="r-boldItalic f-9 head-description mb-1">Time: </h6> </div>
										<h5 class="n-bold f-24 text-dark mb-0" id="timeInHrs"></h5>
										<p class="r-lightItalic f-8 head-description">Hrs</p>
									</div>
									<div class="dropdown-menu px-2 text-center py-1 "> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">1</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">2</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">3</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">4</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">5</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">6</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">7</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">8</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">9</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">10</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">11</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">12</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">13</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">14</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">15</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">16</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">17</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">18</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">19</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">20</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">21</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">22</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">23</span></a> <a class="dropdown-item n-bold f-14 text-dark mb-0 py-0 selectedTime"><span class="find-time">24</span></a> </div>
								</div>
							</div> <span class="text-danger mt-1" id="schedule_tour_date_error"></span> <span class="text-danger mt-1" id="schedule_tour_time_error"></span>
							<button type="button" id="schedule-tour" class="btn btn-success n-bold f-9 rounded-0 mx-auto text-center justify-content-center mr-2 w-100">
								<div class="spinner-border spinner-border-sm d-none mr-2" role="status" id="schedule-tour-spinner"> <span class="sr-only">Loading...</span> </div> Send Request</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>