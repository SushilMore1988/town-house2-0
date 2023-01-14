<div class="tab-pane show active px-0" id="coWorker">
	<form method="POST" action="http://127.0.0.1:8000/co-work-space/booking" accept-charset="UTF-8" id="booking_form">
		<input name="_token" type="hidden" value="U9g9zq5nAGe6lDXZ8HHsqBGWmPEkPRqCFXeLS2Yu">
		<div class="px-md-4 px-2">
			<h6 class="r-boldItalic f-9 text-light"><strong>Duration</strong></h6>
			<div class="d-flex mb-4 justify-content-between">
				<div class="start-date w-50">
					<div class="d-flex justify-content-between startDateError">
						<h6 class="r-boldItalic f-9 text-light">Starting Date: </h6>
						<input id="booking-start-date" name="bookingDate" type="hidden">
						<input name="coWorkSpaceId" type="hidden" value="6">
						<input name="currency" type="hidden" value="INR">
						<a href="#" class="button tiny" data-date="" id="dp4" data-date-format="yyyy-mm-dd"> <img src="http://127.0.0.1:8000/img/SVG_Cowork/calendor-icon.svg" alt="calender"> </a>
					</div>
					<h5 class="n-bold f-24 text-dark" id="b-day">11</h5>
					<p class="r-lightItalic f-9 text-light" id="b-month-year">March 2021</p>
				</div>
				<div class="end-date w-50 ">
					<div class="d-flex justify-content-between">
						<h6 class="r-boldItalic f-9 text-light">Time: </h6>
						<!-- <img src="./img/add-filter-list/calender.jpg" alt="calender" /> --></div>
					<div class="input-group date d-flex">
						<input class="n-bold text-dark common-field-input number to-time-picker" style="border: 0px; width: 70px; display: inline-block; font-size: 14px; padding: 0px" name="meeting_room_check_in_time" type="text" value="00:00"> </div>
				</div>
			</div>
		</div>
		<!-- <div class="px-md-4 px-2"> -->
		<div class="space-preference mb-4" id="total-value">
			<h6 class="r-boldItalic f-9 text-light pb-3 pt-3 px-md-4 px-2">Space Preference </h6>
			<div class="formAccordian-first-cls" id="formAccordian-first">
				<div class="card px-0 border-0 shadow-none" id="dedicated-desk">
					<div class="card-header green-btn p-0 border-bottom">
						<a href="#dedicated" class="bg-color   mr-2 w-100  r-boldItalic f-9 text-left text-dark border main-anch collapsed px-md-4 px-2 d-flex align-self-center position-relative py-3 booking-tab-pane border-0 text-uppecase" aria-expanded="true" data-toggle="collapse">
							<!-- <span class="align-self-center text-uppercase f-9 rounded-0">Dedicated Desks <i class="fas fa-info-circle pl-2"></i></span> -->
							<div class="row w-100">
								<div class="col-7 pr-0"> <span class="align-self-center f-9 rounded-0 r-boldItalic f-9">Dedicated Desks  </span> </div>
								<div class="col-2 pl-0 pr-0"> <i class="fas fa-info-circle" title="Book dedicated desk"></i> </div>
							</div>
						</a>
					</div> <span class="dedicated_error "></span>
					<div class="py-3 px-md-4 px-2 show collapse" id="dedicated" data-parent="#formAccordian-first">
						<div class="card-body">
							<div class="container">
								<div class="row">
									<div class="col-lg-8 col-md-12 col-sm-8">
										<p class="text-justify f-8 r-boldItalic mb-0">Capacity : 4 </p>
										<p class="text-justify f-8 r-boldItalic ">Size : 590 <span class="r-lightItalic"> sqft </span></p>
									</div>
								</div>
								<p class="text-justify f-8 r-boldItalic"><i>Duration</i></p>
								<div class="row mb-3 mb-lg-0">
									<div class="col-lg-6 col-md-12 col-6">
										<label class="container-2 r-lightItalic f-8 check-label">1 Day
											<input type="radio" name="dedicatedRadio" value="1 Day" data-price="500"> <span class="checkmark"></span> </label>
									</div>
									<div class="col-lg-6 col-md-12 col-6">
										<label class="container-2 r-lightItalic f-8 check-label">₹ 500 </label>
									</div>
								</div>
								<div class="row mb-3 mb-lg-0">
									<div class="col-lg-6 col-md-12 col-6">
										<label class="container-2 r-lightItalic f-8 check-label">1 Week
											<input type="radio" name="dedicatedRadio" value="1 Week" data-price="1000"> <span class="checkmark"></span> </label>
									</div>
									<div class="col-lg-6 col-md-12 col-6">
										<label class="container-2 r-lightItalic f-8 check-label">₹ 1000 </label>
									</div>
								</div>
								<div class="row mb-3 mb-lg-0">
									<div class="col-lg-6 col-md-12 col-6">
										<label class="container-2 r-lightItalic f-8 check-label">1 Month
											<input type="radio" name="dedicatedRadio" value="1 Month" data-price="5000"> <span class="checkmark"></span> </label>
									</div>
									<div class="col-lg-6 col-md-12 col-6">
										<label class="container-2 r-lightItalic f-8 check-label">₹ 5000 </label>
									</div>
								</div>
								<div class="row mb-3 mb-lg-0">
									<div class="col-lg-6 col-md-12 col-6">
										<label class="container-2 r-lightItalic f-8 check-label">3 Months
											<input type="radio" name="dedicatedRadio" value="3 Months" data-price="12000"> <span class="checkmark"></span> </label>
									</div>
									<div class="col-lg-6 col-md-12 col-6">
										<label class="container-2 r-lightItalic f-8 check-label">₹ 12000 </label>
									</div>
								</div>
								<div class="row mb-3 mb-lg-0">
									<div class="col-lg-6 col-md-12 col-6">
										<label class="container-2 r-lightItalic f-8 check-label">6 Months
											<input type="radio" name="dedicatedRadio" value="6 Months" data-price="20000"> <span class="checkmark"></span> </label>
									</div>
									<div class="col-lg-6 col-md-12 col-6">
										<label class="container-2 r-lightItalic f-8 check-label">₹ 20000 </label>
									</div>
								</div>
								<div class="row mb-3 mb-lg-0">
									<div class="col-lg-6 col-md-12 col-6">
										<label class="container-2 r-lightItalic f-8 check-label">12 Months
											<input type="radio" name="dedicatedRadio" value="12 Months" data-price="35000"> <span class="checkmark"></span> </label>
									</div>
									<div class="col-lg-6 col-md-12 col-6">
										<label class="container-2 r-lightItalic f-8 check-label">₹ 35000 </label>
									</div>
								</div>
								<div class="row pt-3">
									<div class="col-lg-6 col-md-12 col-sm-8">
										<p class="text-justify f-8 r-lightItalic">Preferred Space</p>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-4  text-right text-sm-left pl-sm-0 align-self-center clearfix"> </div>
								</div>
								<div class="row pt-1">
									<div class="col-lg-6 col-md-12 col-sm-8 align-self-center">
										<p class="text-justify f-8 r-boldItalic align-self-center mb-0">Number of Dedicated Desk</p>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-4  text-right text-sm-left pl-sm-0 align-self-center clearfix">
										<div class="no-of-people float-right">
											<div class="d-flex increment"> <span class="circle dedicated-minus minusCount"><img src="http://127.0.0.1:8000/front/img/add-filter-list/minus.jpg" alt=""></span> <span id="dedicated-count" class="px-2 num r-boldItalic f-8 mt-1">
									0</span> <span class="circle dedicated-plus plusCount"><img src="http://127.0.0.1:8000/front/img/add-filter-list/plus.jpg" alt=""></span>
												<input id="dedicated-desk-count" name="dedicatedDeskCount" type="hidden" value="0">
												<input id="db-dedicated-count" name="dedicatedCount" type="hidden" value="4"> </div>
										</div>
									</div>
								</div>
								<input id="dedicated_desk_price" name="selectedDedicatedPrice" type="hidden"> </div>
						</div>
					</div>
				</div>
				<div class="px-md-4 px-2 pt-4">
					<div class="row pt-3">
						<div class="col-sm-8 col-8">
							<h6 class="total mb-0 r-boldItalic f-16 text-success">Total</h6>
							<p class="exclude-tax r-lightItalic f-8 text-light">Excluding Taxes &amp; Discounts*</p>
						</div>
						<div class="col-sm-4 col-4 pl-sm-0">
							<div class="no-of-people mb-4 ">
								<h6 class="mb-3 total r-boldItalic f-16 text-success">
		
									<span class="total-amount" id="total-check">0.0</span> INR</h6>
								<input class="total-amount" name="totalAmount" type="hidden"> </div>
						</div>
					</div>
					<div> </div>
					<div class="row pt-2">
						<div class="text-danger mt-1 mx-3" id="book-now-error"></div>
						<div class="col-12 text-center"> <a href="http://127.0.0.1:8000/login" class="btn btn-success n-bold f-9 rounded-0 mx-auto text-center justify-content-center d-block w-100">Continue &amp; Pay</a> </div>
					</div>
				</div>
			</div>
			<!-- </div> -->
		</div>
	</form>
</div>