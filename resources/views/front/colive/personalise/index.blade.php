@extends('front.layouts.app')

@section('css')

@endsection
@section('content')
    <section class="top-space all-review-tab h-auto">
		<div class="colive-card-listing-filter-wrapper min-height-section">
			<div class="container">
				<div class="row py-4">
					<div  class="sidetabs col-md-4 clearfix pt-md-0 pt-5 ">
						<a href="javascript:void(0)" class="closetabBtn d-md-none d-block mb-3" id="closeSideTab">
							<i class="far fa-times-circle"></i>
						</a>
					  	<div class="card-listing-filter-tab pt-md-0">
							<ul class="nav nav-tabs" role='tab-list'>
								<li class="nav-item">
									<a href="#coWorkerTab" data-toggle='tab' class="nav-link active text-uppercase text-muted n-bold f-9 tab-clicked" data-tab_clicked ="coWorkerTab">
										ACTIVITES
									</a>
								</li>
								<li class="nav-item">
									<a href="#meetingTab" data-toggle='tab' class="nav-link text-uppercase text-muted n-bold f-9 tab-clicked" data-tab_clicked ="meetingTab">
										PROFILE
									</a>
								</li>
							</ul>
							<div class="tab-content pt-lg-3">
								<div class="tab-pane show active" id="coWorkerTab">
									<div class="px-3">
										<div class="row mb-2">
											<div class="col-md-9 text-left align-self-center">
												<h6 class="mb-0 text-uppercase text-live-text n-bold f-9 tab-clicked">RIPPLE PATEL</h6>
											</div>
											<div class="col-md-3 text-right">
												<a href="#">
													<img src="{{url('/img/co-living/edit-icon.png')}}" alt="edit icon" class="edit-icon">
												</a>
											</div>
										</div>
										<div class="row">
											<div class="col-md-9 text-left align-self-center">
												<h6 class="mb-0 text-live-text r-lightItalic f-8 tab-clicked">Male ( 27 )</h6>
												<h6 class="mb-0 text-live-text r-lightItalic f-8 tab-clicked">Architect ( Single )</h6>
											</div>
											<div class="col-md-3 text-right align-self-center">
												<a href="#" class="mb-0 text-live-text r-lightItalic f-8 tab-clicked">
													Edit
												</a>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 mx-auto ">
												<img src="{{url('/img/co-living/avator-profile.svg')}}" alt="avator-profile" class="w-100">
											 </div>
										</div>
									</div>
									<div class="nav flex-column nav-pills pt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
									  	<button class="nav-link active mb-1 mt-2 pt-2" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
									  		<div class="row mb-2">
												<div class="col-md-10 text-left align-self-center">
													<h6 class="mb-0 text-uppercase text-live-text n-bold f-9 tab-clicked">GENERAL INFORMATION</h6>
												</div>
												<div class="col-md-2 text-right">
													<a href="#">
														<img src="{{url('/img/co-living/edit-icon.png')}}" alt="edit icon" class="edit-icon">
													</a>
												</div>
											</div>
											<div class="row">
												<div class="col-md-10 text-left align-self-center">
													<h6 class="mb-0 text-live-text r-lightItalic f-8 tab-clicked">Completion Status : 100.00</h6>
													<h6 class="mb-0 text-live-text r-boldItalic f-8 tab-clicked">Unmarried, 27 Years Old</h6>
												</div>
												<div class="col-md-2 text-right align-self-center">
													<a href="#" class="mb-0 text-live-text r-lightItalic f-8 tab-clicked">
														Edit
													</a>
												</div>
											</div>
									  	</button>
									  	<button class="nav-link my-1 pt-2" id="v-pills-profile-tab" data-toggle="pill" data-target="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
									  		<div class="row mb-2">
												<div class="col-md-10 text-left align-self-center">
													<h6 class="mb-0 text-uppercase text-live-text n-bold f-9 tab-clicked">LOCATION PREFERENCE</h6>
												</div>
												<div class="col-md-2 text-right">
													<a href="#">
														<img src="{{url('/img/co-living/edit-icon.png')}}" alt="edit icon" class="edit-icon">
													</a>
												</div>
											</div>
											<div class="row">
												<div class="col-md-10 text-left align-self-center pr-0">
													<h6 class="mb-0 text-live-text r-lightItalic f-8 tab-clicked">Completion Status : 100.00</h6>
													<h6 class="mb-0 text-live-text r-boldItalic f-8 tab-clicked">15 Minutes ( One Way ) by Private Car / Motorbike</h6>
												</div>
												<div class="col-md-2 text-right align-self-center">
													<a href="#" class="mb-0 text-live-text r-lightItalic f-8 tab-clicked">
														Edit
													</a>
												</div>
											</div>
									  	</button>
									  	<button class="nav-link my-1 pt-2" id="v-pills-messages-tab" data-toggle="pill" data-target="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
									  		<div class="row mb-2">
												<div class="col-md-10 text-left align-self-center">
													<h6 class="mb-0 text-uppercase text-live-text n-bold f-9 tab-clicked">SPATIAL PREFERENCE</h6>
												</div>
												<div class="col-md-2 text-right">
													<a href="#">
														<img src="{{url('/img/co-living/edit-icon.png')}}" alt="edit icon" class="edit-icon">
													</a>
												</div>
											</div>
											<div class="row">
												<div class="col-md-10 text-left align-self-center">
													<h6 class="mb-0 text-live-text r-lightItalic f-8 tab-clicked">Completion Status : 100.00</h6>
													<h6 class="mb-0 text-live-text r-boldItalic f-8 tab-clicked">03 People sharing Living, Kitchen, Dining, Toilet</h6>
												</div>
												<div class="col-md-2 text-right align-self-center">
													<a href="#" class="mb-0 text-live-text r-lightItalic f-8 tab-clicked">
														Edit
													</a>
												</div>
											</div>
									  	</button>
									  	<button class="nav-link mt-1 pt-2" id="v-pills-settings-tab" data-toggle="pill" data-target="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
									  		<div class="row mb-2">
												<div class="col-md-10 text-left align-self-center">
													<h6 class="mb-0 text-uppercase text-live-text n-bold f-9 tab-clicked">SOCIAL PREFERENCE</h6>
												</div>
												<div class="col-md-2 text-right">
													<a href="#">
														<img src="{{url('/img/co-living/edit-icon.png')}}" alt="edit icon" class="edit-icon">
													</a>
												</div>
											</div>
											<div class="row">
												<div class="col-md-10 text-left align-self-center">
													<h6 class="mb-0 text-live-text r-lightItalic f-8 tab-clicked">Completion Status : 100.00</h6>
													<h6 class="mb-0 text-live-text r-boldItalic f-8 tab-clicked">Social Network = Professional Network</h6>
												</div>
												<div class="col-md-2 text-right align-self-center">
													<a href="#" class="mb-0 text-live-text r-lightItalic f-8 tab-clicked">
														Edit
													</a>
												</div>
											</div>
										</button>
									</div>
								</div>
								<div class="tab-pane" id="meetingTab">
								</div>
								
								
							</div>
						</div>
						
						
					</div>
					<div id="main" class="main col-md-8 pt-md-0 pt-5 d-flex flex-column">
						<div class="row">
							<div class="col-md-8">
								<h2 class="n-bold f-24 text-muted mb-0 ">PERSONALISE</h2>
								<p class="r-lightItalic f-9 text-body mb-0">Create your <strong>2.0 Avatar</strong> and get personalised recommendations from <strong>TH2.0 </strong></p> 
							</div>
							<div class="col-md-4 text-right">
								<img src="{{url('img/co-living/qr-code.svg')}}" alt="qr-code" class="text-right qr-code">
							</div>
						</div>
						<div class="tab-content mt-auto" id="v-pills-tabContent">
						  	<div class="tab-pane fade show active mt-auto" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
						  		<label class="n-bold f-14 text-black">TH2.0 ID</label>
								<div class="input-group mb-3 position-relative w-50">
									<input class="form-control rounded-9 commonClass mb-0" aria-label="Input group example" id="email" name="email" type="email" value="satishglondhe@gmail.com">
									<div id="email_verify_div">
										<div class="input-group-append btn-warning email_verify" style="cursor: pointer;" id="email_verify">                                            
		                                    <svg xmlns="http://www.w3.org/2000/svg" width="87.283" height="22.41" viewBox="0 0 87.283 22.41">
											  <g id="Group_487" data-name="Group 487" transform="translate(-574.48 -216.291)">
											    <rect id="Rectangle_109" data-name="Rectangle 109" width="87.273" height="22.4" transform="translate(574.485 216.296)" fill="#f7981d" stroke="#020303" stroke-miterlimit="10" stroke-width="0.01"/>
											    <text id="CHECK" transform="translate(598.936 231.701)" fill="#fff" font-size="10" font-family="SegoeUI, Segoe UI" style="isolation: isolate"><tspan x="0" y="0">CHECK</tspan></text>
											  </g>
											</svg>
		                                </div>
		                            </div>
								</div>
								<div class="mb-2 mt-4">
						  			<h4 class="mb-3 r-boldItalic f-9 text-body">General Information</h4>
						  		</div>
								<form class="register-form">
							  		<div class="form-group">
							  			<input type="text" name="Name" class=" w-100 form-control" placeholder="Name">
							  		</div>
							  		<div class="form-group">
							  			<input type="text" name="Surname" class=" w-100 form-control" placeholder="Surname">
							  		</div>
							  		<div class="form-group">
							  			<input type="text" name="gmail" class=" w-100 form-control" placeholder="Gmail">
							  		</div>
							  		<div class="form-group">
							  			<input type="text" name="Date of Birth" class=" w-100 form-control" placeholder="Date of Birth">
							  		</div>
							  		<div class="form-group">
								  		<select name="cars" class="custom-select  w-100 form-control mb-0">
										    <option selected>Gender</option>
										    <option value="volvo">Male</option>
										    <option value="fiat">Female</option>
										</select>
									</div>
									<div class="form-group">
								  		<select name="cars" class="custom-select  w-100 form-control mb-0">
										    <option selected>Profession</option>
										    <option value="volvo">Student</option>
										    <option value="fiat">Employee</option>
										</select>
									</div>
									<div class="form-group">
								  		<select name="cars" class="custom-select  w-100 form-control mb-0">
										    <option selected>Marital status</option>
										    <option value="volvo">Unmarried</option>
										    <option value="fiat">Married</option>
										</select>
									</div>
									<div class="form-group">
							  			<input type="text" name="Phone" class=" w-100 form-control" placeholder="Phone">
							  		</div>
							  		<div class="form-group">
							  			<input type="text" name="Country" class=" w-100 form-control" placeholder="Country, City">
							  		</div>
							  		<div class="form-group">
							  			<input type="text" name="Hometown" class=" w-100 form-control" placeholder="Hometown (Country, City)">
							  		</div>
								</form>
						  	</div>
						  	<div class="tab-pane fade mt-auto" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						  		<div class="mb-2 mt-4">
						  			<h4 class="mb-3 r-boldItalic f-9 text-body">Provide your current work location to find TH2.0 Locations near your workspace</h4>
						  		</div>
						  		<form class="register-form">
							  		<div class="form-group">
							  			<input type="text" name="NMIMS" class=" w-100 form-control" placeholder="NMIMS , Juhu, Mumbai">
							  		</div>
							  		<div class="mb-2 mt-4 ml-5">
							  			<h4 class="mb-3 r-boldItalic f-9 text-body">AND / OR</h4>
							  		</div>
							  		<div class="form-group">
							  			<input type="text" name="Andheri" class=" w-100 form-control" placeholder="Andheri, Vile Parle, Bandra">
							  		</div>
							  		<div class="mb-2 mt-5">
							  			<h4 class="mb-3 r-boldItalic f-9 text-body">Preferred mode of Commute</h4>
							  		</div>
							  		<div class="row py-2 pr-4 mb-2 ">
							  			<div class="col-md-4 text-center">
							  				<div class="form-check-inline">
												<label class="form-check-label">
												  	<img src="{{url('/img/co-living/car.svg')}}" alt="lifestyle" class="mb-2"><br>	
												    <input type="radio" class="form-check-input" name="optradio"><br>
												    <span class="r-lightItalic f-9 text-body r-lightItalic f-9 text-body">Private Car / Motorbike</span>
												</label>
											</div>
							  			</div>
							  			<div class="col-md-3 text-center">
							  				<div class="form-check-inline">
												<label class="form-check-label">
												  	<img src="{{url('/img/co-living/train.svg')}}" alt="lifestyle" class="mb-2"><br>	
												    <input type="radio" class="form-check-input" name="optradio"><br>
												    <span class="r-lightItalic f-9 text-body r-lightItalic f-9 text-body">Public Transport</span>
												</label>
											</div>
							  			</div>
							  			<div class="col-md-2 text-center">
							  				<div class="form-check-inline">
												<label class="form-check-label">
												  	<img src="{{url('/img/co-living/bycycle.svg')}}" alt="lifestyle" class="mb-2"><br>	
												    <input type="radio" class="form-check-input" name="optradio"><br>
												    <span class="r-lightItalic f-9 text-body r-lightItalic f-9 text-body">Bike</span>
												</label>
											</div>
							  			</div>
							  			<div class="col-md-3 text-center">
							  				<div class="form-check-inline">
												<label class="form-check-label">
												  	<img src="{{url('/img/co-living/walk.svg')}}" alt="lifestyle" class="mb-2"><br>	
												    <input type="radio" class="form-check-input" name="optradio"><br>
												    <span class="r-lightItalic f-9 text-body r-lightItalic f-9 text-body">Walk</span>
												</label>
											</div>
							  			</div>
		  							</div>
		  							<div class="no-of-people mb-5 mt-5">
										<h6 class="mb-3 r-boldItalic f-9 text-light"><strong>Preferred Time of daily commute ( One Way )</strong></h6>
										<div class="d-flex">
											<span class="circle minus nop_click"><img src="{{url('/img/add-filter-list/minus.jpg')}}" alt="" class="w-100"/></span>
											<h4 class="px-4 f-16 mb-0 mt-1" id="no-of-people">0 Minutes</h4>
											<span class="circle plus nop_click"><img src="{{url('/img/add-filter-list/plus.jpg')}}" alt="" class="w-100" /></span>
											<input type="hidden" id="s_number_of_people" value="0">
										</div>
									</div>
								</form>
						  	</div>
						  	<div class="tab-pane fade mt-auto" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
						  		<div class="row pt-4">
						  			<div class="col-md-6">
						  				<div class="special-preference px-3 py-2" >
						  					<h6 class="f-14 r-boldItalic text-colive-dark mb-3">About</h6>
						  					<P class="f-13 r-lightItalic text-colive-dark">TH2.0 aims to revolutionize the way a user could dwell in cities. A user could make his / her personal space matrix and pay as per desired / required space. Hence, efficient and economincal use of space.</P>
						  					<h6 class="f-14 r-boldItalic text-colive-dark mb-3">How to create a personal space matrix ?</h6>
						  					<ol class="pl-3">
						  						<li class="f-13 r-italic text-colive-dark">Choose the <strong class="r-boldItalic">required size</strong> and elements of the house (You could choose only one size for each element)</li>
						  						<li class="f-13 r-italic text-colive-dark">Choose the spaces you could<strong class="r-boldItalic">Share to split your house rent.</strong> (You could choose more than one space to share)</li>
						  					</ol>
						  					<P class="f-13 r-lightItalic text-colive-dark">(Your preferences would help us recommend the personalised listings)</P>
						  					<h6 class="f-14 r-boldItalic text-colive-dark mb-0">House Elements</h6>
						  					<ul class="pl-1">
						  						<li class="f-13 r-boldItalic text-colive-dark">LIV : Living Room</li>
						  						<li class="f-13 r-boldItalic text-colive-dark">KIT : Kitchen</li>
						  						<li class="f-13 r-boldItalic text-colive-dark">DIN : Dinning</li>
						  						<li class="f-13 r-boldItalic text-colive-dark">BED : Bedroom</li>
						  						<li class="f-13 r-boldItalic text-colive-dark">TOI : Toilet</li>
						  					</ul>
						  					<h6 class="f-14 r-boldItalic text-colive-dark mb-0">Size Guide <span class="r-lightItalic">(Sizes could vary for Toilet)</span></h6>
						  					<ul class="pl-1">
						  						<li class="f-13 r-lightItalic text-colive-dark">XS (Extra Small) : Less than 5 Sq.M.</li>
						  						<li class="f-13 r-lightItalic text-colive-dark">S (Small) : 05 - 10 Sq.M.</li>
						  						<li class="f-13 r-lightItalic text-colive-dark">M (Medium) : 10 - 15 Sq.M.</li>
						  						<li class="f-13 r-lightItalic text-colive-dark">L (Large) : 15 - 20 Sq.M.</li>
						  						<li class="f-13 r-lightItalic text-colive-dark">XL (Extra Large) : 20 Sq.M. and above</li>
						  					</ul>
						  					<h6 class="f-14 r-boldItalic text-colive-dark mt-3">Share : Mark the House Elements <span class="r-lightItalic">you could share with your community Members (Sharing Partners)</span></h6>
						  				</div>
						  			</div>
						  			<div class="col-md-6">
						  				<h6 class="f-14 r-boldItalic text-colive-dark mb-3">Space Matrix</h6>
						  				<P class="f-13 r-lightItalic text-colive-dark">Choose your desired / required house element and their sizes as per your daily use.</P>
						  				<table class="table table-bordered first-table">
											<thead class="border-left-0">
											    <tr>
											      <th scope="col" class="border-left-0 border-top-0"></th>
											      <th scope="col" class="f-14 r-boldItalic text-colive-dark">LIV</th>
											      <th scope="col" class="f-14 r-boldItalic text-colive-dark">KIT</th>
											      <th scope="col" class="f-14 r-boldItalic text-colive-dark">DIN</th>
											      <th scope="col" class="f-14 r-boldItalic text-colive-dark">BED</th>
											      <th scope="col" class="f-14 r-boldItalic text-colive-dark">TOI</th>
											    </tr>
											</thead>
											<tbody>
											    <tr>
											      	<th scope="row" class="f-14 r-boldItalic text-colive-dark text-center">XS</th>
											      	<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="LIV"><br>
															</label>
														</div>
													</td>
													<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="KIT"><br>
															</label>
														</div>
													</td>
													<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="DIN"><br>
															</label>
														</div>
													</td>
													<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="BED"><br>
															</label>
														</div>
													</td>
													<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="TOI"><br>
															</label>
														</div>
													</td>
											    </tr>
											    <tr>
											      	<th scope="row" class="f-14 r-boldItalic text-colive-dark text-center">S</th>
											      	<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="LIV"><br>
															</label>
														</div>
													</td>
											      	<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="KIT"><br>
															</label>
														</div>
													</td>
													<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="DIN"><br>
															</label>
														</div>
													</td>
													<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="BED"><br>
															</label>
														</div>
													</td>
													<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="TOI"><br>
															</label>
														</div>
													</td>
											    </tr>
											    <tr>
											      	<th scope="row" class="f-14 r-boldItalic text-colive-dark text-center">M</th>
											      	<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="LIV"><br>
															</label>
														</div>
													</td>
											      	<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="KIT"><br>
															</label>
														</div>
													</td>
													<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="DIN"><br>
															</label>
														</div>
													</td>
													<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="BED"><br>
															</label>
														</div>
													</td>
													<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="TOI"><br>
															</label>
														</div>
													</td>
											    </tr>
											    <tr>
											      	<th scope="row" class="f-14 r-boldItalic text-colive-dark text-center">L</th>
											      	<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="LIV"><br>
															</label>
														</div>
													</td>
											      	<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="KIT"><br>
															</label>
														</div>
													</td>
													<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="DIN"><br>
															</label>
														</div>
													</td>
													<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="BED"><br>
															</label>
														</div>
													</td>
													<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="TOI"><br>
															</label>
														</div>
													</td>
											    </tr>
											    <tr>
											      	<th scope="row" class="f-14 r-boldItalic text-colive-dark text-center">XL</th>
											      	<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="LIV"><br>
															</label>
														</div>
													</td>
											      	<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="KIT"><br>
															</label>
														</div>
													</td>
													<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="DIN"><br>
															</label>
														</div>
													</td>
													<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="BED"><br>
															</label>
														</div>
													</td>
													<td class="f-14 r-boldItalic text-colive-dark text-center mx-auto">
												      	<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="TOI"><br>
															</label>
														</div>
													</td>
											    </tr>
											</tbody>
										</table>
										<table class="table table-bordered ">
											<thead class="border-left-0">
											    <tr>
											      	<th scope="col" class="f-14 r-boldItalic text-colive-dark px-2 share-column">Share</th>
											      	<th scope="col" class="f-14 r-boldItalic text-colive-dark text-center">
											      		<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="Share"><br>
															</label>
														</div>
													</th>
											      	<th scope="col" class="f-14 r-boldItalic text-colive-dark text-center">
											      		<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="Share"><br>
															</label>
														</div>
											      	</th>
											      	<th scope="col" class="f-14 r-boldItalic text-colive-dark text-center">
											      		<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="Share"><br>
															</label>
														</div>
											      	</th>
											      	<th scope="col" class="f-14 r-boldItalic text-colive-dark text-center ">
											      		<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="Share"><br>
															</label>
														</div>
											      	</th>
											      	<th scope="col" class="f-14 r-boldItalic text-colive-dark text-center">
											      		<div class="form-check-inline mx-auto">
															<label class="form-check-label">
															    <input type="radio" class="form-check-input mr-0" name="Share"><br>
															</label>
														</div>
											      	</th>
											    </tr>
											</thead>
										</table>
										<div class="no-of-people mb-5 mt-5">
											<h6 class="mb-3 r-boldItalic f-9 text-colive-dark"><strong>Maximum Community size / House Sharing members</strong></h6>
											<p class="f-13 r-lightItalic text-colive-dark">Community Including yourself as a sharing Member</p>
											<div class="d-flex">
												<span class="circle minus nop_click"><img src="{{url('/img/add-filter-list/minus.jpg')}}" alt="" class="w-100"/></span>
												<h4 class="px-4 f-14 mb-0 mt-1 r-bold" id="no-of-people">0 Minutes</h4>
												<span class="circle plus nop_click"><img src="{{url('/img/add-filter-list/plus.jpg')}}" alt="" class="w-100" /></span>
												<input type="hidden" id="s_number_of_people" value="0">
											</div>
										</div>
						  			</div>
						  		</div>
						  	</div>
						  	<div class="tab-pane fade mt-auto" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
						  		<div class="row pt-4">
						  			<div class="col-md-6">
						  				<div class="special-preference px-3 py-2" >
						  					<h6 class="f-14 r-boldItalic text-colive-dark mb-3">Search and Rate your Professional Interests</h6>
						  					<form class="register-form">
										  		<div class="form-group">
										  			<input type="text" name="intrest" class=" w-100 form-control" placeholder="Search your Interest">
										  		</div>
										  	</form>
						  					<div class="row mt-3">
						  						<div class="col-md-3">
						  							<h6 class="f-14 r-boldItalic text-colive-dark mb-3">Interest</h6>
						  						</div>
						  						<div class="col-md-9">
						  							<h6 class="f-14 r-boldItalic text-colive-dark mb-3 text-center">Rating</h6>
						  						</div>
						  					</div>
						  					<div class="row">
						  						<div class="col-md-5">
						  							<h6 class="f-14 r-italic text-colive-dark mb-2">Adventure</h6>
						  						</div>
						  						<div class="col-md-7 text-center">
						  							<div class="row mx-auto mx-auto">
								     					<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Adventure">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
									     				<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Adventure">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Adventure">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Adventure">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Adventure">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Adventure">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Adventure">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Adventure">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Adventure">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Adventure">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
													</div>
						  						</div>
						  					</div>
						  					<div class="row">
						  						<div class="col-md-5">
						  							<h6 class="f-14 r-italic text-colive-dark mb-2">Cooking</h6>
						  						</div>
						  						<div class="col-md-7 text-center">
						  							<div class="row mx-auto mx-auto">
								     					<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Cooking">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
									     				<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Cooking">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Cooking">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Cooking">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Cooking">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Cooking">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Cooking">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Cooking">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Cooking">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Cooking">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
													</div>
						  						</div>
						  					</div>
						  					<div class="row">
						  						<div class="col-md-5">
						  							<h6 class="f-14 r-italic text-colive-dark mb-2">Design</h6>
						  						</div>
						  						<div class="col-md-7 text-center">
						  							<div class="row mx-auto mx-auto">
								     					<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
									     				<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
													</div>
						  						</div>
						  					</div>
						  					<div class="row">
						  						<div class="col-md-5">
						  							<h6 class="f-14 r-italic text-colive-dark mb-2">Architecture</h6>
						  						</div>
						  						<div class="col-md-7 text-center">
						  							<div class="row mx-auto mx-auto">
								     					<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Architecture">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
									     				<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Architecture">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Architecture">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Architecture">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Architecture">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Architecture">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Architecture">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Architecture">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Architecture">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Architecture">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
													</div>
						  						</div>
						  					</div>
						  					<div class="row">
						  						<div class="col-md-5">
						  							<h6 class="f-14 r-italic text-colive-dark mb-2">Technology</h6>
						  						</div>
						  						<div class="col-md-7 text-center">
						  							<div class="row mx-auto mx-auto">
								     					<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Technology">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
									     				<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Technology">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Technology">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Technology">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Technology">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Technology">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Technology">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Technology">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Technology">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Technology">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
													</div>
						  						</div>
						  					</div>
						  					<div class="row">
						  						<div class="col-md-5">
						  							<h6 class="f-14 r-italic text-colive-dark mb-2">Entrepreneur</h6>
						  						</div>
						  						<div class="col-md-7 text-center">
						  							<div class="row mx-auto mx-auto">
								     					<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Entrepreneur">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
									     				<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Entrepreneur">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Entrepreneur">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Entrepreneur">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Entrepreneur">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Entrepreneur">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Entrepreneur">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Entrepreneur">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Entrepreneur">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Entrepreneur">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
													</div>
						  						</div>
						  					</div>
						  					<div class="row">
						  						<div class="col-md-5">
						  							<h6 class="f-14 r-italic text-colive-dark mb-2">Fashion Design</h6>
						  						</div>
						  						<div class="col-md-7 text-center">
						  							<div class="row mx-auto mx-auto">
								     					<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Fashion-Design">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
									     				<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Fashion-Design">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Fashion-Design">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Fashion-Design">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Fashion-Design">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Fashion-Design">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" checked="checked" name="Fashion-Design">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Fashion-Design">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Fashion-Design">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
															<input type="checkbox" name="Fashion-Design">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
													</div>
						  						</div>
						  					</div>
						  				</div>
						  			</div>
						  			<div class="col-md-6">
						  				<h6 class="f-14 r-boldItalic text-colive-dark mb-3">Privacy Level</h6>
						  				<div class="row">
						  					<div class="col-md-4 text-center">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													  	<img src="{{url('/img/co-living/social.png')}}" alt="lifestyle" class="mb-2 privacy-level"><br>	
													    <input type="radio" class="form-check-input" name="PrivacyLevel"><br>
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Social</span>
													</label>
												</div>
						  					</div>
						  					<div class="col-md-4 text-center">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													  	<img src="{{url('/img/co-living/Fairly-Social.png')}}" alt="lifestyle" class="mb-2 privacy-level"><br>	
													    <input type="radio" class="form-check-input" name="PrivacyLevel"><br>
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Fairly Social</span>
													</label>
												</div>
						  					</div>
						  					<div class="col-md-4 text-center">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													  	<img src="{{url('/img/co-living/Private.png')}}" alt="lifestyle" class="mb-2 privacy-level"><br>	
													    <input type="radio" class="form-check-input" name="PrivacyLevel"><br>
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Private</span>
													</label>
												</div>
						  					</div>
						  				</div>
						  				<h6 class="f-14 r-boldItalic text-colive-dark mb-3 mt-4">Hygeine Level</h6>
						  				<div class="row">
						  					<div class="col-md-3 text-center pr-0">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													  	<img src="{{url('/img/co-living/Very-Clean.png')}}" alt="lifestyle" class="mb-2 Hygeine-Level"><br>	
													    <input type="radio" class="form-check-input" name="HygeineLevel"><br>
													    <span class="r-lightItalic f-13 text-colive-dark text-colive-dark">Very Clean</span>
													</label>
												</div>
						  					</div>
						  					<div class="col-md-2 text-center pr-0">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													  	<img src="{{url('/img/co-living/Clean.png')}}" alt="lifestyle" class="mb-2 Hygeine-Level"><br>	
													    <input type="radio" class="form-check-input" name="HygeineLevel"><br>
													    <span class="r-lightItalic f-13 text-colive-dark text-colive-dark">Clean</span>
													</label>
												</div>
						  					</div>
						  					<div class="col-md-5 text-center pr-0">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													  	<img src="{{url('/img/co-living/Sometimes-Messy.png')}}" alt="lifestyle" class="mb-2 Hygeine-Level"><br>	
													    <input type="radio" class="form-check-input" name="HygeineLevel"><br>
													    <span class="r-lightItalic f-13 text-colive-dark  text-colive-dark">Sometimes Messy</span>
													</label>
												</div>
						  					</div>
						  					<div class="col-md-2 text-center">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													  	<img src="{{url('/img/co-living/Messy.png')}}" alt="lifestyle" class="mb-2 Hygeine-Level"><br>	
													    <input type="radio" class="form-check-input" name="HygeineLevel"><br>
													    <span class=" text-colive-dark r-lightItalic f-13 text-colive-dark">Messy</span>
													</label>
												</div>
						  					</div>
						  				</div>
						  				<h6 class="f-14 r-boldItalic text-colive-dark mb-3 mt-5">Community Member Type</h6>
						  				<ul class="pl-0" style="list-style-type: none;">
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Community-Member">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Single Men</span>
													</label>
												</div>
						  					</li>
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Community-Member">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Single Women</span>
													</label>
												</div>
						  					</li>
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Community-Member">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Couple (Straight)</span>
													</label>
												</div>
						  					</li>
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Community-Member">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Couple (Gay, Lesbian)</span>
													</label>
												</div>
						  					</li>
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Community-Member">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Single Dad</span>
													</label>
												</div>
						  					</li>
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Community-Member">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Single Mom</span>
													</label>
												</div>
						  					</li>
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Community-Member">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Senior Citizen</span>
													</label>
												</div>
						  					</li>
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Community-Member">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Family</span>
													</label>
												</div>
						  					</li>
						  				</ul>
						  				<h6 class="f-14 r-boldItalic text-colive-dark mb-3 mt-5">Acceptance Level</h6>
						  				<ul class="pl-0" style="list-style-type: none;">
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Acceptance-Level">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Open to Guests / Friends / People at home</span>
													</label>
												</div>
						  					</li>
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Acceptance-Level">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Open to drinking at home</span>
													</label>
												</div>
						  					</li>
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Acceptance-Level">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Open to have pets at home</span>
													</label>
												</div>
						  					</li>
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Acceptance-Level">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Open to smoking at home</span>
													</label>
												</div>
						  					</li>
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Acceptance-Level">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Open for gathering events at home</span>
													</label>
												</div>
						  					</li>
						  				</ul>
						  				<h6 class="f-14 r-boldItalic text-colive-dark mb-3 mt-5">Lifestyle Balance (Priorities and Networks which Matters)</h6>
						  				<ul class="pl-0" style="list-style-type: none;">
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Lifestyle-Balance">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Only Professional Networks</span>
													</label>
												</div>
						  					</li>
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Lifestyle-Balance">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Professional Networks > Social Networks</span>
													</label>
												</div>
						  					</li>
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Lifestyle-Balance">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Social Network = Professional Network</span>
													</label>
												</div>
						  					</li>
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Lifestyle-Balance">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Social Networks > Professional Networks</span>
													</label>
												</div>
						  					</li>
						  					<li class="mb-2">
						  						<div class="form-check-inline">
													<label class="form-check-label">
													    <input type="radio" class="form-check-input" name="Lifestyle-Balance">
													    <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Only Social Networks</span>
													</label>
												</div>
						  					</li>
						  					
						  				</ul>
						  			</div>
						  		</div>
						  	</div>
						</div>
						
					</div>
				</div>
				<div class="row pb-4">
					<div  class="col-md-4 clearfix pt-md-0 pt-5 ">
						<button type="button" class="btn btn-primary n-bold f-14 my-3 w-100 rounded-0">SAVE AND QUIT</button>
					</div>
					<div class="col-md-8 pt-md-0 pt-5">
						<button type="button" class="btn btn-primary n-bold f-14 my-3 w-100 rounded-0">SAVE AND CONTINUE</button>
					</div>
				</div>
			</div>
		</div>
    </section>
@endsection

@section('js')
<script >
	$('.minus').click(function() {
			var num = parseInt($(this).prev('h4').text());
			if(num !== 0) {
				var getNum = parseInt($(this).prev('h4').text());
				var addOne = 1;
				var addition = parseInt(getNum) - 1;
				$(this).prev('h4').text(addition);
				return false;
			};
		});
		$('.plus').click(function() {
			var num = parseInt($(this).next('h4').text());
			var getNum = parseInt($(this).next('h4').text());
			var addOne = 1;
			var addition = parseInt(getNum) + 1;
			$(this).next('h4').text(addition);
			return false;
		});
</script>
	
@endsection
