@extends('front.layouts.app')

@section('css')

<link rel="stylesheet" type="text/css" href="{{url('front/vendor/slick-slider/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('front/vendor/slick-slider/css/slick-theme.css')}}">
<link rel="stylesheet" href="{{url('front/vendor/fondation-datePicker/css/foundation-datepicker.css')}}">
<link rel="stylesheet" href="{{url('front/vendor/datetime-picker/css/datetime-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('/front/bootstrap3-datepicker/bootstrap-glyphicons.css')}}">	

<link rel="stylesheet" href="{{url('front/vendor/custome-scroll/css/scroll.css')}}">

<style>
       /* Set the size of the div element that contains the map */
      #mapName {
        height: 250px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
       .section:hover{
       		background: #f2f2f2;       		
       }
       .section{
       		padding: 0 15px;
       }
       .glyphicon{
       	    width: 35px !important;
		    height: 35px !important;
		    line-height: 30px !important;
		    border: 1px solid #ccc;
		    border-radius: 50% !important;
		    text-align: center;
       }
       .bootstrap-datetimepicker-widget.dropdown-menu {
		    display: block;
		    margin: 2px 0;
		    padding: 4px;
		    width: 20em;
		    border-radius: 17px;
		}
		.bootstrap-datetimepicker-widget .timepicker-hour, .bootstrap-datetimepicker-widget .timepicker-minute, .bootstrap-datetimepicker-widget .timepicker-second {
		    font-family: "nevis-bold", sans-serif;
		}
		.separator{
			width: 5px !important;
			font-family: "nevis-bold", sans-serif;
		}
		.bootstrap-datetimepicker-widget button[data-action] {
		    padding: 6px;
		    color: #fff;
    		background-color: #00A651;
    		border-color: #00A651;
    		font-family: "nevis-bold", sans-serif;
		}
		.bootstrap-datetimepicker-widget.dropdown-menu.pull-right:before {
		    left: auto;
		    right: 31px;
		}
		.bootstrap-datetimepicker-widget.dropdown-menu.pull-right:after {
		    left: auto;
		    right: 31px;
		}
		.longEnough {
		 	/*max-height: calc(100vh - 538px);*/
		  overflow: auto;
		  /*height: 100%;*/
		}
		.scrolling-container::-webkit-scrollbar {
		  width: 8px;

		}

		/* Track */
		.scrolling-container::-webkit-scrollbar-track {
		  box-shadow: inset 0 0 5px #bfbfbf; 
		  border-radius: 10px;
		  background: #fff;
		  width: 5px;
		  margin-right: 5px;
		}
		 
		/* Handle */
		.scrolling-container::-webkit-scrollbar-thumb {
		  background: #ccc; 
		  border-radius: 10px;
		}

		/* Handle on hover */
		.scrolling-container::-webkit-scrollbar-thumb:hover {
		  background: #ccc; 
		}

    </style>

@endsection
@section('content')
<section class="top-space all-review-tab h-auto">
		<div class="big-back-img">
			<div class="diffrent-tab-home-slider bg-color slick-initialized slick-slider">
				<div class="slick-list draggable">
					<div class="slick-track" style="opacity: 1; width: 1349px; transform: translate3d(0px, 0px, 0px);">
						<div class="diffrent-tab-home-slider-item slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 1349px;" tabindex="0">
							<div class="slider-background" style="background-image: url('../img/card-banner.png')">
							</div>
							<!-- <img src="http://127.0.0.1:8000/img/cowork/cover/1608196804qKfcI.jpeg" class="w-100 h-auto mx-auto" alt=""> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="border-top border-bottom">
			<div class="container">
				<div class="text-header d-flex justify-content-between align-items-center py-sm-0 py-3">
					<div class="align-self-center d-flex flex-column my-4">
						<h2 class="n-bold f-24 text-muted mb-1 text-uppercase">THE THIRD SPACE</h2>
						<p class="r-lightItalic f-9 text-light mb-0">Bhimpore Gram panchayat Office, Bhimpore, Daman, Daman and Diu, India</p>
					</div>
					<div class="category-type align-self-center">
						<div class="ratings align-self-center d-flex justify-content-center bg-silver border-silver">
							<p class="text-black n-bold f-20 text-center align-self-center mb-0">
								3.0
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="bg-color explore-tabs">
		<div class="container pb-5">
			<div class="row">
				<div class="col-md-8 pt-5 scroll-container">
					<div class="tab-wrapper ">
						<ul class="d-sm-flex bg-white pl-0 mb-0">
							<li class="flex-fill text-center border-left-0 text-bold nav-item" id="a_overview"> <span class="common-tab-btn head-description f-16">Overview</span> </li>
							<li class="flex-fill text-center nav-item" id="a_facilities"> <span class="common-tab-btn head-description f-16">Facilities</span> </li>
							<li class="flex-fill text-center nav-item" id="a_location"> <span class="common-tab-btn head-description f-16">Location</span> </li>
							<li class="flex-fill text-center nav-item" id="a_reviews"> <span class="common-tab-btn head-description f-16">Reviews</span> </li>
							<li class="flex-fill text-center nav-item" id="a_community"> <span class="common-tab-btn head-description f-16">Community</span> </li>
						</ul>
						<div class="pr-1 bg-white py-2 explore-content">
							<div class="scrolling-content">
								<div class="scrolling-container pl-2 w-100 content  pt-3 pb-5 h-100 ">
									<!-- <div class="scrolling-container pl-2 w-100 content longEnough mCustomScrollbar" data-mcs-theme="dark"> -->
									<div class="scrolling ">
										<div class="common-form my-4 py-3 border-bottom" id="overview">
											<h6 class="pb-1 r-boldItalic f-16  head-description">Connect, Mature and Experience</h6>
											<p class="r-lightItalic f-9 head-description para text-justify"> Ripp Studio is a design studio focusing on inventive methods of design and fabrication. A space open for individuals of various professions to share and collaborate. This is a private studio which facilitates small scale amenities with comfortable working and ambiance.</p>
											<div>
												<ul class="list-inline"> </ul>
											</div>
										</div>
										<div class="common-form my-4 py-3 border-bottom" id="facilities">
											<h6 class="pb-1 r-boldItalic f-16  head-description">Facilities</h6>
											<div class="space-preference mb-4">
												<ul class="d-flex  flex-wrap mb-0">
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/1612598167.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Wifi </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/1609057657.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Air Conditioning </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/1609059107.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Bean Bags </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/1609058481.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Ergonomic Chairs </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/desk.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Workshops </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/desk.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Outdoor Terraces </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/1609059710.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Lounge/ Chill-Out Area </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/1609059418.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Kitchen/Pantry </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/1612598355.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Podcasting Room </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/1609059886.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Printer </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/desk.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Event Space for Rent </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/desk.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Virtual Office </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/desk.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Office Stationery </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/desk.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">24/7 Access </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/1609060359.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">PS/ XBOX Gaming Room </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/1609058972.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Free Parking on Premise </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/1609058402.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Bike Parking </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/1609058696.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Free Drinking Water </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/desk.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Tea or Coffee </p>
													</li>
													<li class="text-center ml-1 my-3 facility-list"> <img src="{{ url('/img/cowork/facility-icon/1609058734.svg ') }}" style="height: 30px;">
														<p class=" text-light pt-2 mb-2">Hot Beverages </p>
													</li>
												</ul>
											</div>
										</div>
										<div class="common-form my-4 py-3 border-bottom" id="location">
											<h6 class="r-boldItalic f-16  head-description">Location</h6>
											<p class="pb-0 mb-0">Bhimpore Gram panchayat Office, Bhimpore, Daman, Daman and Diu, India</p>
											<p>396210</p>
											<div id="mapName" style="position: relative; overflow: hidden;">
												<div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
													<div class="gm-style" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;">
														<div tabindex="0" aria-label="Map" aria-roledescription="map" role="group" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;">
															<div style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);">
																<div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
																	<div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
																		<div style="position: absolute; z-index: 986; transform: matrix(1, 0, 0, 1, -248, -181);">
																			<div style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px;">
																				<div style="width: 256px; height: 256px;"></div>
																			</div>
																			<div style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px;">
																				<div style="width: 256px; height: 256px;"></div>
																			</div>
																			<div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;">
																				<div style="width: 256px; height: 256px;"></div>
																			</div>
																			<div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;">
																				<div style="width: 256px; height: 256px;"></div>
																			</div>
																			<div style="position: absolute; left: 512px; top: 0px; width: 256px; height: 256px;">
																				<div style="width: 256px; height: 256px;"></div>
																			</div>
																			<div style="position: absolute; left: 512px; top: 256px; width: 256px; height: 256px;">
																				<div style="width: 256px; height: 256px;"></div>
																			</div>
																			<div style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px;">
																				<div style="width: 256px; height: 256px;"></div>
																			</div>
																			<div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;">
																				<div style="width: 256px; height: 256px;"></div>
																			</div>
																		</div>
																	</div>
																</div>
																<div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div>
																<div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div>
																<div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;">
																	<div style="position: absolute; left: 0px; top: 0px; z-index: -1;">
																		<div style="position: absolute; z-index: 986; transform: matrix(1, 0, 0, 1, -248, -181);">
																			<div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 256px;"></div>
																			<div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 256px;"></div>
																			<div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 0px;"></div>
																			<div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 0px;"></div>
																			<div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 512px; top: 0px;"></div>
																			<div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 512px; top: 256px;"></div>
																			<div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 256px;"></div>
																			<div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 0px;"></div>
																		</div>
																	</div>
																	<div style="width: 27px; height: 43px; overflow: hidden; position: absolute; left: -14px; top: -43px; z-index: 0;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi2.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 27px; height: 43px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
																</div>
																<div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
																	<div style="position: absolute; z-index: 986; transform: matrix(1, 0, 0, 1, -248, -181);">
																		<div style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i11508!3i7241!4i256!2m3!1e0!2sm!3i545271118!3m12!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0&amp;key=AIzaSyAjDLRNg0HB3jgYjZt3HDTqZ0KFEiobAYc&amp;token=80645" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
																		<div style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i11507!3i7241!4i256!2m3!1e0!2sm!3i545271118!3m12!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0&amp;key=AIzaSyAjDLRNg0HB3jgYjZt3HDTqZ0KFEiobAYc&amp;token=72667" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
																		<div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i11507!3i7240!4i256!2m3!1e0!2sm!3i545271070!3m12!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0&amp;key=AIzaSyAjDLRNg0HB3jgYjZt3HDTqZ0KFEiobAYc&amp;token=51515" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
																		<div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i11508!3i7240!4i256!2m3!1e0!2sm!3i545271070!3m12!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0&amp;key=AIzaSyAjDLRNg0HB3jgYjZt3HDTqZ0KFEiobAYc&amp;token=59493" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
																		<div style="position: absolute; left: 512px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i11509!3i7240!4i256!2m3!1e0!2sm!3i545271082!3m12!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0&amp;key=AIzaSyAjDLRNg0HB3jgYjZt3HDTqZ0KFEiobAYc&amp;token=75319" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
																		<div style="position: absolute; left: 512px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i11509!3i7241!4i256!2m3!1e0!2sm!3i545271106!3m12!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0&amp;key=AIzaSyAjDLRNg0HB3jgYjZt3HDTqZ0KFEiobAYc&amp;token=80775" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
																		<div style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i11506!3i7241!4i256!2m3!1e0!2sm!3i545271118!3m12!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0&amp;key=AIzaSyAjDLRNg0HB3jgYjZt3HDTqZ0KFEiobAYc&amp;token=64689" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
																		<div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i11506!3i7240!4i256!2m3!1e0!2sm!3i545271070!3m12!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0&amp;key=AIzaSyAjDLRNg0HB3jgYjZt3HDTqZ0KFEiobAYc&amp;token=43537" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
																	</div>
																</div>
															</div>
															<div class="gm-style-pbc" style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;">
																<p class="gm-style-pbt"></p>
															</div>
															<div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;">
																<div style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);">
																	<div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div>
																	<div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div>
																	<div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;">
																		<div tabindex="-1" style="width: 27px; height: 43px; overflow: hidden; position: absolute; touch-action: none; left: -14px; top: -43px; z-index: 0;"><img alt="" src="https://maps.gstatic.com/mapfiles/transparent.png" draggable="false" usemap="#gmimap0" style="width: 27px; height: 43px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
																			<map name="gmimap0" id="gmimap0">
																				<area log="miw" coords="13.5,0,4,3.75,0,13.5,13.5,43,27,13.5,23,3.75" shape="poly" tabindex="-1" title="" style="cursor: pointer; touch-action: none;">
																			</map>
																		</div>
																	</div>
																	<div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div>
																</div>
															</div>
														</div>
														<iframe aria-hidden="true" frameborder="0" tabindex="-1" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;"></iframe>
														<div style="pointer-events: none; width: 100%; height: 100%; box-sizing: border-box; position: absolute; z-index: 1000002; opacity: 0; border: 2px solid rgb(26, 115, 232);"></div>
														<div>
															<div class="gmnoprint" style="margin: 10px; z-index: 0; position: absolute; cursor: pointer; left: 0px; top: 0px;">
																<div class="gm-style-mtc" style="float: left; position: relative;">
																	<button draggable="false" title="Show street map" aria-label="Show street map" type="button" aria-pressed="true" style="background: none padding-box rgb(255, 255, 255); display: table-cell; border: 0px; margin: 0px; padding: 0px 17px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; direction: ltr; overflow: hidden; text-align: center; height: 40px; vertical-align: middle; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; font-size: 18px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; min-width: 35px; font-weight: 500;" id="68205226-3C52-4D72-9F80-9CE2CACAD06B" aria-expanded="false">Map</button>
																	<ul role="menu" aria-labelledby="68205226-3C52-4D72-9F80-9CE2CACAD06B" style="background-color: white; list-style: none; padding: 2px; margin: 0px; z-index: -1; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; position: absolute; left: 0px; top: 40px; text-align: left; display: none;">
																		<li tabindex="-1" role="menuitemcheckbox" aria-label="Show street map with terrain" draggable="false" title="Show street map with terrain" aria-checked="false" style="color: black; font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 18px; background-color: rgb(255, 255, 255); padding: 5px 8px 5px 5px; direction: ltr; text-align: left; white-space: nowrap;"><span><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%203H5c-1.11%200-2%20.9-2%202v14c0%201.1.89%202%202%202h14c1.11%200%202-.9%202-2V5c0-1.1-.89-2-2-2zm-9%2014l-5-5%201.41-1.41L10%2014.17l7.59-7.59L19%208l-9%209z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 1em; width: 1em; transform: translateY(0.15em); display: none;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%205v14H5V5h14m0-2H5c-1.1%200-2%20.9-2%202v14c0%201.1.9%202%202%202h14c1.1%200%202-.9%202-2V5c0-1.1-.9-2-2-2z%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 1em; width: 1em; transform: translateY(0.15em);"></span>
																			<label style="cursor: inherit;">Terrain</label>
																		</li>
																	</ul>
																</div>
																<div class="gm-style-mtc" style="float: left; position: relative;">
																	<button draggable="false" title="Show satellite imagery" aria-label="Show satellite imagery" type="button" aria-pressed="false" style="background: none padding-box rgb(255, 255, 255); display: table-cell; border: 0px; margin: 0px; padding: 0px 17px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; direction: ltr; overflow: hidden; text-align: center; height: 40px; vertical-align: middle; color: rgb(86, 86, 86); font-family: Roboto, Arial, sans-serif; font-size: 18px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; min-width: 64px;" id="DADA4B7A-E6F7-4CCB-B0A5-1E2723CBE720" aria-expanded="false">Satellite</button>
																	<ul role="menu" aria-labelledby="DADA4B7A-E6F7-4CCB-B0A5-1E2723CBE720" style="background-color: white; list-style: none; padding: 2px; margin: 0px; z-index: -1; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; position: absolute; right: 0px; top: 40px; text-align: left; display: none;">
																		<li tabindex="-1" role="menuitemcheckbox" aria-label="Show imagery with street names" draggable="false" title="Show imagery with street names" aria-checked="true" style="color: black; font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 18px; background-color: rgb(255, 255, 255); padding: 5px 8px 5px 5px; direction: ltr; text-align: left; white-space: nowrap;"><span><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%203H5c-1.11%200-2%20.9-2%202v14c0%201.1.89%202%202%202h14c1.11%200%202-.9%202-2V5c0-1.1-.89-2-2-2zm-9%2014l-5-5%201.41-1.41L10%2014.17l7.59-7.59L19%208l-9%209z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 1em; width: 1em; transform: translateY(0.15em);"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%205v14H5V5h14m0-2H5c-1.1%200-2%20.9-2%202v14c0%201.1.9%202%202%202h14c1.1%200%202-.9%202-2V5c0-1.1-.9-2-2-2z%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 1em; width: 1em; transform: translateY(0.15em); display: none;"></span>
																			<label style="cursor: inherit;">Labels</label>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div></div>
														<div></div>
														<div></div>
														<div>
															<button draggable="false" title="Toggle fullscreen view" aria-label="Toggle fullscreen view" type="button" class="gm-control-active gm-fullscreen-control" style="background: none rgb(255, 255, 255); border: 0px; margin: 10px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; top: 0px; right: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"></button>
														</div>
														<div></div>
														<div></div>
														<div></div>
														<div></div>
														<div>
															<div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="40" controlheight="153" style="margin: 10px; user-select: none; position: absolute; bottom: 167px; right: 40px;">
																<div class="gmnoprint" controlwidth="40" controlheight="40" style="display: none; position: absolute;">
																	<div style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; width: 40px; height: 40px;">
																		<button draggable="false" title="Rotate map clockwise" aria-label="Rotate map clockwise" type="button" class="gm-control-active" style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; left: 0px; top: 0px; overflow: hidden; width: 40px; height: 40px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20width%3D%2224%22%3E%0A%20%20%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22%2F%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 20px; height: 20px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20width%3D%2224%22%3E%0A%20%20%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22%2F%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 20px; height: 20px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20width%3D%2224%22%3E%0A%20%20%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22%2F%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 20px; height: 20px;"></button>
																		<div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); display: none;"></div>
																		<button draggable="false" title="Rotate map counterclockwise" aria-label="Rotate map counterclockwise" type="button" class="gm-control-active" style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; left: 0px; top: 0px; overflow: hidden; width: 40px; height: 40px; transform: scaleX(-1);"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20width%3D%2224%22%3E%0A%20%20%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22%2F%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 20px; height: 20px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20width%3D%2224%22%3E%0A%20%20%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22%2F%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 20px; height: 20px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20width%3D%2224%22%3E%0A%20%20%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22%2F%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 20px; height: 20px;"></button>
																		<div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); display: none;"></div>
																		<button draggable="false" title="Tilt map" aria-label="Tilt map" type="button" class="gm-tilt gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; top: 0px; left: 0px; overflow: hidden; width: 40px; height: 40px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;"></button>
																	</div>
																</div>
																<div class="gm-svpc" dir="ltr" title="Drag Pegman onto the map to open Street View" controlwidth="40" controlheight="40" style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; width: 40px; height: 40px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: none; position: absolute; left: 0px; top: 0px;">
																	<div style="position: absolute; left: 50%; top: 50%;"></div>
																	<div style="position: absolute; left: 50%; top: 50%;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2223%22%20height%3D%2238%22%20viewBox%3D%220%200%2023%2038%22%3E%0A%3Cpath%20d%3D%22M16.6%2C38.1h-5.5l-0.2-2.9-0.2%2C2.9h-5.5L5%2C25.3l-0.8%2C2a1.53%2C1.53%2C0%2C0%2C1-1.9.9l-1.2-.4a1.58%2C1.58%2C0%2C0%2C1-1-1.9v-0.1c0.3-.9%2C3.1-11.2%2C3.1-11.2a2.66%2C2.66%2C0%2C0%2C1%2C2.3-2l0.6-.5a6.93%2C6.93%2C0%2C0%2C1%2C4.7-12%2C6.8%2C6.8%2C0%2C0%2C1%2C4.9%2C2%2C7%2C7%2C0%2C0%2C1%2C2%2C4.9%2C6.65%2C6.65%2C0%2C0%2C1-2.2%2C5l0.7%2C0.5a2.78%2C2.78%2C0%2C0%2C1%2C2.4%2C2s2.9%2C11.2%2C2.9%2C11.3a1.53%2C1.53%2C0%2C0%2C1-.9%2C1.9l-1.3.4a1.63%2C1.63%2C0%2C0%2C1-1.9-.9l-0.7-1.8-0.1%2C12.7h0Zm-3.6-2h1.7L14.9%2C20.3l1.9-.3%2C2.4%2C6.3%2C0.3-.1c-0.2-.8-0.8-3.2-2.8-10.9a0.63%2C0.63%2C0%2C0%2C0-.6-0.5h-0.6l-1.1-.9h-1.9l-0.3-2a4.83%2C4.83%2C0%2C0%2C0%2C3.5-4.7A4.78%2C4.78%200%200%2C0%2011%202.3H10.8a4.9%2C4.9%2C0%2C0%2C0-1.4%2C9.6l-0.3%2C2h-1.9l-1%2C.9h-0.6a0.74%2C0.74%2C0%2C0%2C0-.6.5c-2%2C7.5-2.7%2C10-3%2C10.9l0.3%2C0.1%2C2.5-6.3%2C1.9%2C0.3%2C0.2%2C15.8h1.6l0.6-8.4a1.52%2C1.52%2C0%2C0%2C1%2C1.5-1.4%2C1.5%2C1.5%2C0%2C0%2C1%2C1.5%2C1.4l0.9%2C8.4h0Zm-10.9-9.6h0Zm17.5-.1h0Z%22%20style%3D%22fill%3A%23333%3Bopacity%3A0.7%3Bisolation%3Aisolate%22%2F%3E%0A%3Cpath%20d%3D%22M5.9%2C13.6l1.1-.9h7.8l1.2%2C0.9%22%20style%3D%22fill%3A%23ce592c%22%2F%3E%0A%3Cellipse%20cx%3D%2210.9%22%20cy%3D%2213.1%22%20rx%3D%222.7%22%20ry%3D%220.3%22%20style%3D%22fill%3A%23ce592c%3Bopacity%3A0.5%3Bisolation%3Aisolate%22%2F%3E%0A%3Cpath%20d%3D%22M20.6%2C26.1l-2.9-11.3a1.71%2C1.71%2C0%2C0%2C0-1.6-1.2H5.7a1.69%2C1.69%2C0%2C0%2C0-1.5%2C1.3l-3.1%2C11.3a0.61%2C0.61%2C0%2C0%2C0%2C.3.7l1.1%2C0.4a0.61%2C0.61%2C0%2C0%2C0%2C.7-0.3l2.7-6.7%2C0.2%2C16.8h3.6l0.6-9.3a0.47%2C0.47%2C0%2C0%2C1%2C.44-0.5h0.06c0.4%2C0%2C.4.2%2C0.5%2C0.5l0.6%2C9.3h3.6L15.7%2C20.3l2.5%2C6.6a0.52%2C0.52%2C0%2C0%2C0%2C.66.31h0l1.2-.4a0.57%2C0.57%2C0%2C0%2C0%2C.5-0.7h0Z%22%20style%3D%22fill%3A%23fdbf2d%22%2F%3E%0A%3Cpath%20d%3D%22M7%2C13.6l3.9%2C6.7%2C3.9-6.7%22%20style%3D%22fill%3A%23cf572e%3Bopacity%3A0.6%3Bisolation%3Aisolate%22%2F%3E%0A%3Ccircle%20cx%3D%2210.9%22%20cy%3D%227%22%20r%3D%225.9%22%20style%3D%22fill%3A%23fdbf2d%22%2F%3E%0A%3C%2Fsvg%3E%0A" aria-label="Street View Pegman Control" style="height: 30px; width: 30px; position: absolute; transform: translate(-50%, -50%); pointer-events: none;"><img src="data:image/svg+xml,%3Csvg%20width%3D%2224px%22%20height%3D%2238px%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20viewBox%3D%220%200%2024%2038%22%3E%0A%3Cpath%20d%3D%22M22%2C26.6l-2.9-11.3a2.78%2C2.78%2C0%2C0%2C0-2.4-2l-0.7-.5a6.82%2C6.82%2C0%2C0%2C0%2C2.2-5%2C6.9%2C6.9%2C0%2C0%2C0-13.8%2C0%2C7%2C7%2C0%2C0%2C0%2C2.2%2C5.1l-0.6.5a2.55%2C2.55%2C0%2C0%2C0-2.3%2C2s-3%2C11.1-3%2C11.2v0.1a1.58%2C1.58%2C0%2C0%2C0%2C1%2C1.9l1.2%2C0.4a1.63%2C1.63%2C0%2C0%2C0%2C1.9-.9l0.8-2%2C0.2%2C12.8h11.3l0.2-12.6%2C0.7%2C1.8a1.54%2C1.54%2C0%2C0%2C0%2C1.5%2C1%2C1.09%2C1.09%2C0%2C0%2C0%2C.5-0.1l1.3-.4a1.85%2C1.85%2C0%2C0%2C0%2C.7-2h0Zm-1.2.9-1.2.4a0.61%2C0.61%2C0%2C0%2C1-.7-0.3l-2.5-6.6-0.2%2C16.8h-9.4L6.6%2C21l-2.7%2C6.7a0.52%2C0.52%2C0%2C0%2C1-.66.31h0l-1.1-.4a0.52%2C0.52%2C0%2C0%2C1-.31-0.66v0l3.1-11.3a1.69%2C1.69%2C0%2C0%2C1%2C1.5-1.3h0.2l1-.9h2.3a5.9%2C5.9%2C0%2C1%2C1%2C3.2%2C0h2.3l1.1%2C0.9h0.2a1.71%2C1.71%2C0%2C0%2C1%2C1.6%2C1.2l2.9%2C11.3a0.84%2C0.84%2C0%2C0%2C1-.4.7h0Z%22%20style%3D%22fill%3A%23333%3Bfill-opacity%3A0.2%22%2F%3E%22%0A%3C%2Fsvg%3E%0A%0A" aria-label="Pegman is on top of the Map" style="display: none; height: 30px; width: 30px; position: absolute; transform: translate(-50%, -50%); pointer-events: none;"><img src="data:image/svg+xml,%3Csvg%20width%3D%2240px%22%20height%3D%2250px%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20viewBox%3D%220%200%2040%2050%22%3E%0A%3Cpath%20d%3D%22M34.00%2C-30.40l-2.9-11.3a2.78%2C2.78%2C0%2C0%2C0-2.4-2l-0.7-.5a6.82%2C6.82%2C0%2C0%2C0%2C2.2-5%2C6.9%2C6.9%2C0%2C0%2C0-13.8%2C0%2C7%2C7%2C0%2C0%2C0%2C2.2%2C5.1l-0.6.5a2.55%2C2.55%2C0%2C0%2C0-2.3%2C2s-3%2C11.1-3%2C11.2v0.1a1.58%2C1.58%2C0%2C0%2C0%2C1%2C1.9l1.2%2C0.4a1.63%2C1.63%2C0%2C0%2C0%2C1.9-.9l0.8-2%2C0.2%2C12.8h11.3l0.2-12.6%2C0.7%2C1.8a1.54%2C1.54%2C0%2C0%2C0%2C1.5%2C1%2C1.09%2C1.09%2C0%2C0%2C0%2C.5-0.1l1.3-.4a1.85%2C1.85%2C0%2C0%2C0%2C.7-2h0Zm-1.2.9-1.2.4a0.61%2C0.61%2C0%2C0%2C1-.7-0.3l-2.5-6.6-0.2%2C16.8h-9.4L18.60%2C-36.00l-2.7%2C6.7a0.52%2C0.52%2C0%2C0%2C1-.66.31h0l-1.1-.4a0.52%2C0.52%2C0%2C0%2C1-.31-0.66v0l3.1-11.3a1.69%2C1.69%2C0%2C0%2C1%2C1.5-1.3h0.2l1-.9h2.3a5.9%2C5.9%2C0%2C1%2C1%2C3.2%2C0h2.3l1.1%2C0.9h0.2a1.71%2C1.71%2C0%2C0%2C1%2C1.6%2C1.2l2.9%2C11.3a0.84%2C0.84%2C0%2C0%2C1-.4.7h0Zm1.2%2C59.1-2.9-11.3a2.78%2C2.78%2C0%2C0%2C0-2.4-2l-0.7-.5a6.82%2C6.82%2C0%2C0%2C0%2C2.2-5%2C6.9%2C6.9%2C0%2C0%2C0-13.8%2C0%2C7%2C7%2C0%2C0%2C0%2C2.2%2C5.1l-0.6.5a2.55%2C2.55%2C0%2C0%2C0-2.3%2C2s-3%2C11.1-3%2C11.2v0.1a1.58%2C1.58%2C0%2C0%2C0%2C1%2C1.9l1.2%2C0.4a1.63%2C1.63%2C0%2C0%2C0%2C1.9-.9l0.8-2%2C0.2%2C12.8h11.3l0.2-12.6%2C0.7%2C1.8a1.54%2C1.54%2C0%2C0%2C0%2C1.5%2C1%2C1.09%2C1.09%2C0%2C0%2C0%2C.5-0.1l1.3-.4a1.85%2C1.85%2C0%2C0%2C0%2C.7-2h0Zm-1.2.9-1.2.4a0.61%2C0.61%2C0%2C0%2C1-.7-0.3l-2.5-6.6-0.2%2C16.8h-9.4L18.60%2C24.00l-2.7%2C6.7a0.52%2C0.52%2C0%2C0%2C1-.66.31h0l-1.1-.4a0.52%2C0.52%2C0%2C0%2C1-.31-0.66v0l3.1-11.3a1.69%2C1.69%2C0%2C0%2C1%2C1.5-1.3h0.2l1-.9h2.3a5.9%2C5.9%2C0%2C1%2C1%2C3.2%2C0h2.3l1.1%2C0.9h0.2a1.71%2C1.71%2C0%2C0%2C1%2C1.6%2C1.2l2.9%2C11.3a0.84%2C0.84%2C0%2C0%2C1-.4.7h0Z%22%20style%3D%22fill%3A%23333%3Bfill-opacity%3A0.2%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M15.40%2C38.80h-4a1.64%2C1.64%2C0%2C0%2C1-1.4-1.1l-3.1-8a0.9%2C0.9%2C0%2C0%2C1-.5.1l-1.4.1a1.62%2C1.62%2C0%2C0%2C1-1.6-1.4l-1.1-13.1%2C1.6-1.3a6.87%2C6.87%2C0%2C0%2C1-3-4.6A7.14%2C7.14%200%200%2C1%202%204a7.6%2C7.6%2C0%2C0%2C1%2C4.7-3.1%2C7.14%2C7.14%2C0%2C0%2C1%2C5.5%2C1.1%2C7.28%2C7.28%2C0%2C0%2C1%2C2.3%2C9.6l2.1-.1%2C0.1%2C1c0%2C0.2.1%2C0.5%2C0.1%2C0.8a2.41%2C2.41%2C0%2C0%2C1%2C1%2C1s1.9%2C3.2%2C2.8%2C4.9c0.7%2C1.2%2C2.1%2C4.2%2C2.8%2C5.9a2.1%2C2.1%2C0%2C0%2C1-.8%2C2.6l-0.6.4a1.63%2C1.63%2C0%2C0%2C1-1.5.2l-0.6-.3a8.93%2C8.93%2C0%2C0%2C0%2C.5%2C1.3%2C7.91%2C7.91%2C0%2C0%2C0%2C1.8%2C2.6l0.6%2C0.3v4.6l-4.5-.1a7.32%2C7.32%2C0%2C0%2C1-2.5-1.5l-0.4%2C3.6h0Zm-10-19.2%2C3.5%2C9.8%2C2.9%2C7.5h1.6V35l-1.9-9.4%2C3.1%2C5.4a8.24%2C8.24%2C0%2C0%2C0%2C3.8%2C3.8h2.1v-1.4a14%2C14%2C0%2C0%2C1-2.2-3.1%2C44.55%2C44.55%2C0%2C0%2C1-2.2-8l-1.3-6.3%2C3.2%2C5.6c0.6%2C1.1%2C2.1%2C3.6%2C2.8%2C4.9l0.6-.4c-0.8-1.6-2.1-4.6-2.8-5.8-0.9-1.7-2.8-4.9-2.8-4.9a0.54%2C0.54%2C0%2C0%2C0-.4-0.3l-0.7-.1-0.1-.7a4.33%2C4.33%2C0%2C0%2C0-.1-0.5l-5.3.3%2C2.2-1.9a4.3%2C4.3%2C0%2C0%2C0%2C.9-1%2C5.17%2C5.17%2C0%2C0%2C0%2C.8-4%2C5.67%2C5.67%2C0%2C0%2C0-2.2-3.4%2C5.09%2C5.09%2C0%2C0%2C0-4-.8%2C5.67%2C5.67%2C0%2C0%2C0-3.4%2C2.2%2C5.17%2C5.17%2C0%2C0%2C0-.8%2C4%2C5.67%2C5.67%2C0%2C0%2C0%2C2.2%2C3.4%2C3.13%2C3.13%2C0%2C0%2C0%2C1%2C.5l1.6%2C0.6-3.2%2C2.6%2C1%2C11.5h0.4l-0.3-8.2h0Z%22%20style%3D%22fill%3A%23333%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M3.35%2C15.90l1.1%2C12.5a0.39%2C0.39%2C0%2C0%2C0%2C.36.42l0.14%2C0%2C1.4-.1a0.66%2C0.66%2C0%2C0%2C0%2C.5-0.4l-0.2-3.8-3.3-8.6h0Z%22%20style%3D%22fill%3A%23fdbf2d%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M5.20%2C28.80l1.1-.1a0.66%2C0.66%2C0%2C0%2C0%2C.5-0.4l-0.2-3.8-1.2-3.1Z%22%20style%3D%22fill%3A%23ce592b%3Bfill-opacity%3A0.25%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M21.40%2C35.70l-3.8-1.2-2.7-7.8L12.00%2C15.5l3.4-2.9c0.2%2C2.4%2C2.2%2C14.1%2C3.7%2C17.1%2C0%2C0%2C1.3%2C2.6%2C2.3%2C3.1v2.9m-8.4-8.1-2-.3%2C2.5%2C10.1%2C0.9%2C0.4v-2.9%22%20style%3D%22fill%3A%23e5892b%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M17.80%2C25.40c-0.4-1.5-.7-3.1-1.1-4.8-0.1-.4-0.1-0.7-0.2-1.1l-1.1-2-1.7-1.6s0.9%2C5%2C2.4%2C7.1a19.12%2C19.12%2C0%2C0%2C0%2C1.7%2C2.4h0Z%22%20style%3D%22fill%3A%23cf572e%3Bopacity%3A0.6%3Bisolation%3Aisolate%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M14.40%2C37.80h-3a0.43%2C0.43%2C0%2C0%2C1-.4-0.4l-3-7.8-1.7-4.8-3-9%2C8.9-.4s2.9%2C11.3%2C4.3%2C14.4c1.9%2C4.1%2C3.1%2C4.7%2C5%2C5.8h-3.2s-4.1-1.2-5.9-7.7a0.59%2C0.59%2C0%2C0%2C0-.6-0.4%2C0.62%2C0.62%2C0%2C0%2C0-.3.7s0.5%2C2.4.9%2C3.6a34.87%2C34.87%2C0%2C0%2C0%2C2%2C6h0Z%22%20style%3D%22fill%3A%23fdbf2d%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M15.40%2C12.70l-3.3%2C2.9-8.9.4%2C3.3-2.7%22%20style%3D%22fill%3A%23ce592b%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M9.10%2C21.10l1.4-6.2-5.9.5%22%20style%3D%22fill%3A%23cf572e%3Bopacity%3A0.6%3Bisolation%3Aisolate%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M12.00%2C13.5a4.75%2C4.75%2C0%2C0%2C1-2.6%2C1.1c-1.5.3-2.9%2C0.2-2.9%2C0s1.1-.6%2C2.7-1%22%20style%3D%22fill%3A%23bb3d19%22%3E%3C%2Fpath%3E%0A%3Ccircle%20cx%3D%227.92%22%20cy%3D%228.19%22%20r%3D%226.3%22%20style%3D%22fill%3A%23fdbf2d%22%3E%3C%2Fcircle%3E%0A%3Cpath%20d%3D%22M4.70%2C13.60a6.21%2C6.21%2C0%2C0%2C0%2C8.4-1.9v-0.1a8.89%2C8.89%2C0%2C0%2C1-8.4%2C2h0Z%22%20style%3D%22fill%3A%23ce592b%3Bfill-opacity%3A0.25%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M21.20%2C27.20l0.6-.4a1.09%2C1.09%2C0%2C0%2C0%2C.4-1.3c-0.7-1.5-2.1-4.6-2.8-5.8-0.9-1.7-2.8-4.9-2.8-4.9a1.6%2C1.6%2C0%2C0%2C0-2.17-.65l-0.23.15a1.68%2C1.68%2C0%2C0%2C0-.4%2C2.1s2.3%2C3.9%2C3.1%2C5.3c0.6%2C1%2C2.1%2C3.7%2C2.9%2C5.1a0.94%2C0.94%2C0%2C0%2C0%2C1.24.49l0.16-.09h0Z%22%20style%3D%22fill%3A%23fdbf2d%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M19.40%2C19.80c-0.9-1.7-2.8-4.9-2.8-4.9a1.6%2C1.6%2C0%2C0%2C0-2.17-.65l-0.23.15-0.3.3c1.1%2C1.5%2C2.9%2C3.8%2C3.9%2C5.4%2C1.1%2C1.8%2C2.9%2C5%2C3.8%2C6.7l0.1-.1a1.09%2C1.09%2C0%2C0%2C0%2C.4-1.3%2C57.67%2C57.67%2C0%2C0%2C0-2.7-5.6h0Z%22%20style%3D%22fill%3A%23ce592b%3Bfill-opacity%3A0.25%22%3E%3C%2Fpath%3E%0A%3C%2Fsvg%3E%0A" aria-label="Street View Pegman Control" style="display: none; height: 40px; width: 40px; position: absolute; transform: translate(-60%, -45%); pointer-events: none;"></div>
																</div>
																<div class="gmnoprint" controlwidth="40" controlheight="81" style="position: absolute; left: 0px; top: 72px;">
																	<div draggable="false" style="user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 40px; height: 81px;">
																		<button draggable="false" title="Zoom in" aria-label="Zoom in" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23333%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23111%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"></button>
																		<div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); top: 0px;"></div>
																		<button draggable="false" title="Zoom out" aria-label="Zoom out" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"></button>
																	</div>
																</div>
															</div>
														</div>
														<div>
															<div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;">
																<a target="_blank" rel="noopener" href="https://maps.google.com/maps?ll=20.453629,72.860665&amp;z=14&amp;t=m&amp;hl=en-GB&amp;gl=US&amp;mapclient=apiv3" title="Open this area in Google Maps (opens a new window)" style="position: static; overflow: visible; float: none; display: inline;">
																	<div style="width: 66px; height: 26px; cursor: pointer;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google4.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></div>
																</a>
															</div>
														</div>
														<div></div>
														<div>
															<div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 167px; bottom: 0px; width: 86px;">
																<div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px;">
																	<div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
																		<div style="width: 1px;"></div>
																		<div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
																	</div>
																	<div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="text-decoration: none; cursor: pointer; display: none;">Map Data</a><span>Map data ©2021</span></div>
																</div>
															</div>
															<div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 96px; bottom: 0px;">
																<div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
																	<div style="width: 1px;"></div>
																	<div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
																</div>
																<div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-GB_US/help/terms_maps.html" target="_blank" rel="noopener" style="text-decoration: none; cursor: pointer; color: rgb(0, 0, 0);">Terms of Use</a></div>
															</div>
															<div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;">
																<div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
																	<div style="width: 1px;"></div>
																	<div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
																</div>
																<div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_blank" rel="noopener" title="Report errors in the road map or imagery to Google" dir="ltr" href="https://www.google.com/maps/@20.4536293,72.8606654,14z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); text-decoration: none; position: relative;">Report a map error</a></div>
															</div>
															<div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;">
																<div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(0, 0, 0); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2021</div>
															</div>
														</div>
														<div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 300px; height: 180px; position: absolute; left: 188px; top: 35px;">
															<div style="padding: 0px 0px 10px; font-size: 16px; box-sizing: border-box;">Map Data</div>
															<div style="font-size: 13px;">Map data ©2021</div>
															<button draggable="false" title="Close" aria-label="Close" type="button" class="gm-ui-hover-effect" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; top: 0px; right: 0px; width: 37px; height: 37px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%206.41L17.59%205%2012%2010.59%206.41%205%205%206.41%2010.59%2012%205%2017.59%206.41%2019%2012%2013.41%2017.59%2019%2019%2017.59%2013.41%2012z%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="pointer-events: none; display: block; width: 13px; height: 13px; margin: 12px;"></button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="common-form my-4 py-3 review-tab" id="reviews">
											<h6 class="pb-3 r-boldItalic f-16  head-description">TH2.0 Review Board</h6>
											<div class="row">
												<div class="col-lg-7 pr-0">
													<div class="row">
														<div class="col-5">
															<p class="r-lightItalic f-8 head-description mb-2">Desk Quality</p>
														</div>
														<div class="col-7 px-0">
															<div class="row">
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" checked="checked" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" checked="checked" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" checked="checked" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" checked="checked" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" checked="checked" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" checked="checked" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" checked="checked" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-5">
															<p class="r-lightItalic f-8 head-description mb-2">Facilities</p>
														</div>
														<div class="col-7 px-0">
															<div class="row">
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" checked="checked" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" checked="checked" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" checked="checked" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" checked="checked" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" checked="checked" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" checked="checked" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" checked="checked" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="7" disabled="" name="" type="checkbox" value="7"> <span class="checkmark checkbox-checkmark"></span> </label>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-5">
															<p class="r-lightItalic f-8 head-description mb-2">Work Comfort</p>
														</div>
														<div class="col-7 px-0">
															<div class="row">
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="6" disabled="" checked="checked" name="" type="checkbox" value="6"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="6" disabled="" checked="checked" name="" type="checkbox" value="6"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="6" disabled="" checked="checked" name="" type="checkbox" value="6"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="6" disabled="" checked="checked" name="" type="checkbox" value="6"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="6" disabled="" checked="checked" name="" type="checkbox" value="6"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="6" disabled="" checked="checked" name="" type="checkbox" value="6"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="6" disabled="" name="" type="checkbox" value="6"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="6" disabled="" name="" type="checkbox" value="6"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="6" disabled="" name="" type="checkbox" value="6"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="6" disabled="" name="" type="checkbox" value="6"> <span class="checkmark checkbox-checkmark"></span> </label>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-5">
															<p class="r-lightItalic f-8 head-description mb-2">Ambience</p>
														</div>
														<div class="col-7 px-0">
															<div class="row">
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" checked="checked" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" checked="checked" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" checked="checked" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" checked="checked" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" checked="checked" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" checked="checked" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" checked="checked" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" checked="checked" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-5">
															<p class="r-lightItalic f-8 head-description mb-2">Cleanliness</p>
														</div>
														<div class="col-7 px-0">
															<div class="row">
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="0" disabled="" name="" type="checkbox" value="0"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="0" disabled="" name="" type="checkbox" value="0"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="0" disabled="" name="" type="checkbox" value="0"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="0" disabled="" name="" type="checkbox" value="0"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="0" disabled="" name="" type="checkbox" value="0"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="0" disabled="" name="" type="checkbox" value="0"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="0" disabled="" name="" type="checkbox" value="0"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="0" disabled="" name="" type="checkbox" value="0"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="0" disabled="" name="" type="checkbox" value="0"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="0" disabled="" name="" type="checkbox" value="0"> <span class="checkmark checkbox-checkmark"></span> </label>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-5">
															<p class="r-lightItalic f-8 head-description mb-2">Surrounding</p>
														</div>
														<div class="col-7 px-0">
															<div class="row">
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" checked="checked" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" checked="checked" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" checked="checked" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" checked="checked" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" checked="checked" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" checked="checked" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" checked="checked" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" checked="checked" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
																<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
																	<input class="admin-checkbox" data-no="8" disabled="" name="" type="checkbox" value="8"> <span class="checkmark checkbox-checkmark"></span> </label>
															</div>
														</div>
													</div>
													<p class="r-boldItalic f-8  head-description mb-0"></p>
												</div>
												<div class="col-lg-5 category-type">
													<div class="d-flex flex-column justify-content-center">
														<div class="ratings align-self-center d-flex justify-content-center bg-silver border-silver">
															<p class="text-black n-bold f-20 text-center align-self-center mb-0"> 3.0 </p>
														</div>
														<p class="r-boldItalic f-8  head-description mb-0 text-center">Category : <span class="r-lightItalic">Silver</span></p>
													</div>
													<div class="r-boldItalic f-8  head-description mb-0 pt-5 text-center">
														<p>Vibrant and Open</p>
													</div>
												</div>
											</div>
											<div class="row mx-0 mt-3"> </div>
										</div>
										<div class="common-form my-4 py-3 border-bottom" id="location">
											<h6 class="r-boldItalic f-16  head-description mb-3">CHOOSE YOUR COMMUNITY</h6>
											
											<div id="accordion" class="myaccordion">
												<div class="card border-0">
												    <div class="card-header collapsed p-0 border-0" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
												    	<div class="bg-success p-2 community-details ">
															<div class="d-flex justify-content-between flex-column flex-lg-row ">
																<div class="card-text-left-box d-flex flex-column w-100">
																	
																	<h4 class="n-bold text-white f-14 text-uppercase">COMMUNITY NETWORK INDEX : 9.0</h4>
																	
																	<div class="card-prices mt-auto pr-3">
																		<p class="r-lightItalic f-8 text-white mb-0">Size :<span > 2 People</span> </p>
																		<p class="r-lightItalic f-8 text-white mb-0">Type :<span > Fairly Social</span> </p>
																		<p class="r-lightItalic f-8 text-white mb-0">Interests :<span >  Football, Cooking, Nightlife</span> </p>
																	</div>
																</div> 
																<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-self-center"> 
																	<img src="{{url('/img/co-living/cards/two-grp.svg')}}" class="grp-img">
																</div>
																<div class="align-self-center pl-3 d-flex">
																	<span class="fa-stack fa-sm text-white align-self-center">
															            <!-- <i class="fas fa-circle fa-stack-2x"></i> -->
															            <i class="fas fa-chevron-circle-up f-20 fa-stack-2x"></i>
															            <!-- <i class="fas fa-plus fa-stack-1x fa-inverse"></i> -->
															            <i class="fas fa-chevron-circle-down f-20 fa-stack-1x fa-inverse"></i>
															        </span>
															        <div class="align-self-center">
																        <p class="r-boldItalic f-9 text-white pl-3 tell-detail change-status mb-0">Details</p>
																        <p class="r-boldItalic f-9 text-white pl-3 tell-hide change-status d-none mb-0">Hide</p>
																    </div>
															        <a href="#" class="btn btn-white n-bold f-9 bg-white text-light border d-inline-block ml-3 rounded-0">SELECT</a>
																</div>

																
															</div>
														</div>
												      
												    </div>
												    <div id="collapseOne" class="collapse pb-4" aria-labelledby="headingOne" data-parent="#accordion">
												      	<div class="card-body">
												      		<div class="row">
												      			<div class="col-md-6">
												      				<div class="card border-0">
												      					<div class="media px-3 py-2">
																		  <div class="media-body">
																		    <h5 class="mt-0 n-bold f-20 text-live-text">MEMBER (1)</h5>
																		    <p class="r-lightItalic f-9 text-live-text">Nic Name</p>
																		    <p class="r-lightItalic f-9 text-live-text">Profession</p>
																		    <p class="r-lightItalic f-9 text-live-text">Age : 27</p>
																		    <p class="r-lightItalic f-9 text-live-text mb-0">Male</p>
																		  </div>
																		  <img class="ml-3" src="{{url('/img/co-living/Group 2369.png')}}" alt="Generic placeholder image">
																		</div>
																	  
																	  <div class="card-body px-0 py-0">
																	    	<div class="bg-success p-2">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">LOCATION PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	    	<div class="bg-yellow p-2 mt-1">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">SPATIAL PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	    	<div class="bg-danger p-2 mt-1">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">SOCIAL PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	  </div>
																	</div>
												      			</div>
												      			<div class="col-md-6">
												      				<div class="card border-0">
												      					<div class="media px-3 py-2">
																		  <div class="media-body">
																		    <h5 class="mt-0 n-bold f-20 text-live-text">MEMBER (2)</h5>
																		    <p class="r-lightItalic f-9 text-live-text">Nic Name</p>
																		    <p class="r-lightItalic f-9 text-live-text">Profession</p>
																		    <p class="r-lightItalic f-9 text-live-text">Age : 27</p>
																		    <p class="r-lightItalic f-9 text-live-text mb-0">Male</p>
																		  </div>
																		  <img class="ml-3" src="{{url('/img/co-living/Group 2369.png')}}" alt="Generic placeholder image">
																		</div>
																	  
																	  <div class="card-body px-0 py-0">
																	    	<div class="bg-success p-2">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">LOCATION PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	    	<div class="bg-yellow p-2 mt-1">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">SPATIAL PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	    	<div class="bg-danger p-2 mt-1">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">SOCIAL PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	  </div>
																	</div>
												      			</div>
												      		</div>
												        
												      	</div>
												    </div>
												</div>
												<div class="card mt-1 border-0">
												    <div class="card-header collapsed p-0 border-0" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												    	<div class="bg-success p-2 community-details ">
															<div class="d-flex justify-content-between flex-column flex-lg-row ">
																<div class="card-text-left-box d-flex flex-column w-100">
																	
																	<h4 class="n-bold text-white f-14 text-uppercase">COMMUNITY NETWORK INDEX : 7.5</h4>
																	
																	<div class="card-prices mt-auto pr-3">
																		<p class="r-lightItalic f-8 text-white mb-0">Size :<span > 3 People</span> </p>
																		<p class="r-lightItalic f-8 text-white mb-0">Type :<span > Fairly Social</span> </p>
																		<p class="r-lightItalic f-8 text-white mb-0">Interests :<span >  Football, Cooking, Nightlife</span> </p>
																	</div>
																</div> 
																<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-self-center"> 
																	<img src="{{url('/img/co-living/cards/three-grp.svg')}}" class="grp-img">
																</div>
																<div class="align-self-center pl-3 d-flex">
																	<span class="fa-stack fa-sm text-white align-self-center">
															            <!-- <i class="fas fa-circle fa-stack-2x"></i> -->
															            <i class="fas fa-chevron-circle-up f-20 fa-stack-2x"></i>
															            <!-- <i class="fas fa-plus fa-stack-1x fa-inverse"></i> -->
															            <i class="fas fa-chevron-circle-down f-20 fa-stack-1x fa-inverse"></i>
															        </span>
															        <div class="align-self-center">
																        <p class="r-boldItalic f-9 text-white pl-3 tell-detail change-status mb-0">Details</p>
																        <p class="r-boldItalic f-9 text-white pl-3 tell-hide change-status d-none mb-0">Hide</p>
																    </div>
															        <a href="#" class="btn btn-white n-bold f-9 bg-white text-light border d-inline-block ml-3 rounded-0">SELECT</a>
																</div>

																
															</div>
														</div>
												      
												    </div>
												    <div id="collapseTwo" class="collapse pb-4" aria-labelledby="headingTwo" data-parent="#accordion">
												      	<div class="card-body">
												      		<div class="row">
												      			<div class="col-md-6">
												      				<div class="card border-0">
												      					<div class="media px-3 py-2">
																		  <div class="media-body">
																		    <h5 class="mt-0 n-bold f-20 text-live-text">MEMBER (1)</h5>
																		    <p class="r-lightItalic f-9 text-live-text">Nic Name</p>
																		    <p class="r-lightItalic f-9 text-live-text">Profession</p>
																		    <p class="r-lightItalic f-9 text-live-text">Age : 27</p>
																		    <p class="r-lightItalic f-9 text-live-text mb-0">Male</p>
																		  </div>
																		  <img class="ml-3" src="{{url('/img/co-living/Group 2369.png')}}" alt="Generic placeholder image">
																		</div>
																	  
																	  <div class="card-body px-0 py-0">
																	    	<div class="bg-success p-2">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">LOCATION PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	    	<div class="bg-yellow p-2 mt-1">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">SPATIAL PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	    	<div class="bg-danger p-2 mt-1">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">SOCIAL PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	  </div>
																	</div>
												      			</div>
												      			<div class="col-md-6">
												      				<div class="card border-0">
												      					<div class="media px-3 py-2">
																		  <div class="media-body">
																		    <h5 class="mt-0 n-bold f-20 text-live-text">MEMBER (2)</h5>
																		    <p class="r-lightItalic f-9 text-live-text">Nic Name</p>
																		    <p class="r-lightItalic f-9 text-live-text">Profession</p>
																		    <p class="r-lightItalic f-9 text-live-text">Age : 27</p>
																		    <p class="r-lightItalic f-9 text-live-text mb-0">Male</p>
																		  </div>
																		  <img class="ml-3" src="{{url('/img/co-living/Group 2369.png')}}" alt="Generic placeholder image">
																		</div>
																	  
																	  <div class="card-body px-0 py-0">
																	    	<div class="bg-success p-2">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">LOCATION PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	    	<div class="bg-yellow p-2 mt-1">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">SPATIAL PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	    	<div class="bg-danger p-2 mt-1">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">SOCIAL PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	  </div>
																	</div>
												      			</div>
												      		</div>
												        
												      	</div>
												    </div>
												</div>
												<div class="card mt-1 border-0">
												    <div class="card-header collapsed p-0 border-0" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
												    	<div class="bg-yellow p-2 community-details ">
															<div class="d-flex justify-content-between flex-column flex-lg-row ">
																<div class="card-text-left-box d-flex flex-column w-100">
																	
																	<h4 class="n-bold text-live-text f-14 text-uppercase">COMMUNITY NETWORK INDEX : 7.0</h4>
																	
																	<div class="card-prices mt-auto pr-3">
																		<p class="r-lightItalic f-8 text-live-text mb-0">Size :<span > 3 People</span> </p>
																		<p class="r-lightItalic f-8 text-live-text mb-0">Type :<span > Fairly Social</span> </p>
																		<p class="r-lightItalic f-8 text-live-text mb-0">Interests :<span >  Football, Cooking, Nightlife</span> </p>
																	</div>
																</div> 
																<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-self-center"> 
																	<img src="{{url('/img/co-living/cards/five-grp.svg')}}" class="grp-img">
																</div>
																<div class="align-self-center pl-3 d-flex">
																	<span class="fa-stack fa-sm text-white align-self-center">
															            <!-- <i class="fas fa-circle fa-stack-2x"></i> -->
															            <i class="fas fa-chevron-circle-up f-20 fa-stack-2x"></i>
															            <!-- <i class="fas fa-plus fa-stack-1x fa-inverse"></i> -->
															            <i class="fas fa-chevron-circle-down f-20 fa-stack-1x fa-inverse"></i>
															        </span>
															        <div class="align-self-center">
																        <p class="r-boldItalic f-9 text-live-text pl-3 tell-detail change-status mb-0">Details</p>
																        <p class="r-boldItalic f-9 text-live-text pl-3 tell-hide change-status d-none mb-0">Hide</p>
																    </div>
															        <a href="#" class="btn btn-white n-bold f-9 bg-white text-light border d-inline-block ml-3 rounded-0">SELECT</a>
																</div>

																
															</div>
														</div>
												      
												    </div>
												    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
												      	<div class="card-body">
												      		<div class="row">
												      			<div class="col-md-6">
												      				<div class="card border-0">
												      					<div class="media px-3 py-2">
																		  <div class="media-body">
																		    <h5 class="mt-0 n-bold f-20 text-live-text">MEMBER (1)</h5>
																		    <p class="r-lightItalic f-9 text-live-text">Nic Name</p>
																		    <p class="r-lightItalic f-9 text-live-text">Profession</p>
																		    <p class="r-lightItalic f-9 text-live-text">Age : 27</p>
																		    <p class="r-lightItalic f-9 text-live-text mb-0">Male</p>
																		  </div>
																		  <img class="ml-3" src="{{url('/img/co-living/Group 2369.png')}}" alt="Generic placeholder image">
																		</div>
																	  
																	  <div class="card-body px-0 py-0">
																	    	<div class="bg-success p-2">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">LOCATION PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	    	<div class="bg-yellow p-2 mt-1">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">SPATIAL PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	    	<div class="bg-danger p-2 mt-1">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">SOCIAL PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	  </div>
																	</div>
												      			</div>
												      			<div class="col-md-6">
												      				<div class="card border-0">
												      					<div class="media px-3 py-2">
																		  <div class="media-body">
																		    <h5 class="mt-0 n-bold f-20 text-live-text">MEMBER (2)</h5>
																		    <p class="r-lightItalic f-9 text-live-text">Nic Name</p>
																		    <p class="r-lightItalic f-9 text-live-text">Profession</p>
																		    <p class="r-lightItalic f-9 text-live-text">Age : 27</p>
																		    <p class="r-lightItalic f-9 text-live-text mb-0">Male</p>
																		  </div>
																		  <img class="ml-3" src="{{url('/img/co-living/Group 2369.png')}}" alt="Generic placeholder image">
																		</div>
																	  
																	  <div class="card-body px-0 py-0">
																	    	<div class="bg-success p-2">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">LOCATION PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	    	<div class="bg-yellow p-2 mt-1">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">SPATIAL PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	    	<div class="bg-danger p-2 mt-1">
																	    		<div class="clearfix">
																	    			<p class="n-bold f-9 text-white float-left mb-0">SOCIAL PREFERENCE</p>
																	    			<p class="n-bold f-9 text-white float-right mb-0">5.0</p>
																	    		</div>
																	    	</div>
																	  </div>
																	</div>
												      			</div>
												      		</div>
												        
												      	</div>
												    </div>
												</div>
											</div>
											
											
											
										</div>
										<div class="padding-bottom"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class=""> -->
				<div id="mySidenavTabs" class="card-listing-filter-wrapper  pt-md-5 pt-5 col-md-4">
					<div class="card-listing-filter-tab pt-md-0 h-100">
						<ul class="nav nav-tabs" role="tab-list">
							<li class="nav-item h-auto pt-0"> <a href="#coWorker" data-toggle="tab" class="nav-link active text-uppercase text-muted n-bold f-9">
										BOOKING
									</a> </li>
							<li class="nav-item"> <a href="#meeting" data-toggle="tab" class="nav-link text-uppercase text-muted n-bold f-9">
										ENQUIRY
									</a> </li>
						</ul>
						<div class="tab-content px-0">
							@include('front.colive.explore.booking-tab')
							@include('front.colive.explore.enquiry-tab')
						</div>
					</div>
				</div>
				<!-- </div> -->
			</div>
		</div>
	</section>
@endsection

@section('js')
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjDLRNg0HB3jgYjZt3HDTqZ0KFEiobAYc&libraries=places&callback"></script>
	<script type="text/javascript" src="{{url('front/vendor/fondation-datePicker/js/foundation-datepicker.js')}}"></script>
	 <script src="{{url('front/vendor/datetime-picker/js/moment.js')}}" type="text/javascript" ></script>
	<script src="{{url('front/vendor/datetime-picker/js/datetime-picker.js')}}" type="text/javascript" ></script>
	<script src="{{url('front/vendor/custome-scroll/js/scroll.js')}}" type="text/javascript" ></script>
	
 	
    
	{{-- @include('front.cowork.explore.script.index-script')
	@include('front.cowork.explore.script.enquiry-script')
	@include('front.cowork.explore.script.booking-script')
	@include('front.cowork.explore.script.review-script')
	@include('front.cowork.create-listing.scripts.location-script') --}}
	<script >
		$("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
		  $(e.target)
		    .prev()
		    .find("i:last-child")
		    .toggleClass("fa-chevron-circle-up fa-chevron-circle-down");

		});
		$("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
		  $(e.target)
		    .prev()
		    .find(".change-status")
		    .toggleClass("tell-hide tell-detail");
		    
		});
	</script>
@endsection
