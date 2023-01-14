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

		.list-group-item {
			border: 0 !important;
		}

	</style>

@endsection
@section('content')
	<section class="top-space all-review-tab h-auto">
		<div class="big-back-img">
			<div class="diffrent-tab-home-slider bg-color" >
				@if(!empty($coWorkSpace->images['cover']))
					<div class="diffrent-tab-home-slider-item"  >
						<div class="slider-background" style="background-image: url('{{url('/img/cowork/cover/'.$coWorkSpace->images['cover'])}}')">
						</div>
						<!-- <img src="{{url('/img/cowork/cover/'.$coWorkSpace->images['cover'])}}" class="w-100 h-auto mx-auto" alt=""> -->
					</div>
				@endif
				@if(!empty($coWorkSpace->images['all']))
					@foreach($coWorkSpace->images['all'] as $photo)
					<div class="diffrent-tab-home-slider-item"  >
						<div class="slider-background" style="background-image: url('{{url('/img/cowork/'.$photo)}}')">
						</div>
						{{-- <img src="{{url('/img/cowork/'.$photo)}}" class="w-auto h-100 mx-auto" alt=""> --}}
					</div>
					@endforeach
				@endif	
		{{-- 		<div class="diffrent-tab-home-slider-item">
					<img src="{{url('front/img/diffrent-tab1.png')}}" class="w-auto h-100" alt="">
				</div>
				<div class="diffrent-tab-home-slider-item">
					<img src="{{url('front/img/diffrent-tab1.png')}}" class="w-auto h-100" alt="">
				</div>
		--}}</div>
		</div>
		<div class="border-top border-bottom">
			<div class="container">
				<div class="text-header d-flex justify-content-between align-items-center py-sm-0 py-3">
					<div class="align-self-center d-flex flex-column my-4">
						<h2 class="n-bold f-24 text-muted mb-1 text-uppercase">{{$coWorkSpace->name}}</h2>
						<p class="r-lightItalic f-9 text-light mb-0">{{$coWorkSpace->type == 'private-co-work-space' ? 'Private Co-Work Space' : ($coWorkSpace->type == 'co-work-space' ? 'Co-Work Space' : ($coWorkSpace->type == 'meeting-co-work-space' ? 'Hotel/Meeting Room':''))}} / @if(!empty($coWorkSpace->address)){{$coWorkSpace->address['address']}}@endif</p>
					</div>
					<div class="category-type align-self-center">
						@if($coWorkSpace->color_category == 'bronze')
							<div class="ratings align-self-center d-flex justify-content-center bg-brown border-brown">
								<p class="text-black n-bold f-20 text-center align-self-center mb-0">
									{{ number_format($coWorkSpace->admin_rating,1)}}
								</p>
							</div>
						@elseif($coWorkSpace->color_category == 'silver')
							<div class="ratings align-self-center d-flex justify-content-center bg-silver border-silver">
								<p class="text-black n-bold f-20 text-center align-self-center mb-0">
									{{ number_format($coWorkSpace->admin_rating,1)}}
								</p>
							</div>
						@elseif($coWorkSpace->color_category == 'gold')
							<div class="ratings align-self-center d-flex justify-content-center bg-gold border-gold">
								<p class="text-black n-bold f-20 text-center align-self-center mb-0">
									{{ number_format($coWorkSpace->admin_rating,1)}}
								</p>
							</div>
							{{-- <img src="{{url('front/img/add-filter-list/bronze.jpg')}}" alt=""> --}}
							{{-- <p class="r-boldItalic f-8  head-description mb-0">Category : <span class="r-lightItalic">Gold</span></p> --}}
						@endif

						{{-- <div class="ratings align-self-center d-flex justify-content-center bg-gold border-gold">
							<p class="text-black n-bold f-26 text-center align-self-center mb-0">4.0</p>
						</div> --}}
						{{-- <div class="ratings align-self-center d-flex justify-content-center bg-brown border-brown">
							<p class="text-black n-bold f-26 text-center align-self-center mb-0">4.0</p>
						</div> --}}
						{{-- <div class="ratings align-self-center d-flex justify-content-center bg-silver border-silver">
							<p class="text-black n-bold f-26 text-center align-self-center mb-0">4.0</p>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="bg-color explore-tabs">
		<div class="container pb-5">
			<div class="row">
				<div class="col-md-8 pt-5 scroll-container" >
					<div class="tab-wrapper ">
						<ul class="d-sm-flex bg-white pl-0 mb-0">
							<li class="flex-fill text-center border-left-0 text-bold nav-item" id="a_overview">
								<span  class="common-tab-btn head-description f-16">Overview</span>
							</li>
							<li class="flex-fill text-center nav-item" id="a_facilities">
								<span  class="common-tab-btn head-description f-16">Facilities</span>
							</li>
							<li class="flex-fill text-center nav-item" id="a_location">
								<span  class="common-tab-btn head-description f-16">Location</span>
							</li>
							<li class="flex-fill text-center nav-item" id="a_reviews">
								<span  class="common-tab-btn head-description f-16">Reviews</span>
							</li>
							@auth
								@if($coWorkSpace->cwsBookings && $coWorkSpace->cwsBookings->first())
									@if(Auth::id() != $coWorkSpace->user_id)
										<li class="flex-fill text-center nav-item" id="booking_history">
											<span  class="common-tab-btn head-description f-16">Booking History</span>
										</li>
									@endif
								@endif
							@endauth
						</ul>
						<div class="pr-1 bg-white py-2 explore-content">
							<div class="scrolling-content">
								<div class="scrolling-container pl-2 w-100 content pt-3 pb-5 h-100" >
									<div class="scrolling " >
										<div class="common-form my-4 py-3 border-bottom" id="overview">
											<h6 class="pb-1 r-boldItalic f-16  head-description">About the Venue</h6>
											<div class="r-lightItalic f-9 head-description para text-justify">
											{!!$coWorkSpace->description!!}
											</div>
											<div>
												<ul class="list-group list-group-horizontal">
													@if(!empty($coWorkSpace->contact_details['website']) && $coWorkSpace->contact_details['website'] != null)
													<li class="list-group-item text-center">
														<a target="_blank" href="{{$coWorkSpace->contact_details['website']}}">
															<svg viewBox="0 0 24 24" style="height: 30;" xmlns="http://www.w3.org/2000/svg"><title/><path d="M17.3,13.35a1,1,0,0,1-.7-.29,1,1,0,0,1,0-1.41l2.12-2.12a2,2,0,0,0,0-2.83L17.3,5.28a2.06,2.06,0,0,0-2.83,0L12.35,7.4A1,1,0,0,1,10.94,6l2.12-2.12a4.1,4.1,0,0,1,5.66,0l1.41,1.41a4,4,0,0,1,0,5.66L18,13.06A1,1,0,0,1,17.3,13.35Z" fill="#464646"/><path d="M8.11,21.3a4,4,0,0,1-2.83-1.17L3.87,18.72a4,4,0,0,1,0-5.66L6,10.94A1,1,0,0,1,7.4,12.35L5.28,14.47a2,2,0,0,0,0,2.83L6.7,18.72a2.06,2.06,0,0,0,2.83,0l2.12-2.12A1,1,0,1,1,13.06,18l-2.12,2.12A4,4,0,0,1,8.11,21.3Z" fill="#464646"/><path d="M8.82,16.18a1,1,0,0,1-.71-.29,1,1,0,0,1,0-1.42l6.37-6.36a1,1,0,0,1,1.41,0,1,1,0,0,1,0,1.42L9.52,15.89A1,1,0,0,1,8.82,16.18Z" fill="#464646"/></svg>
														</a><br/>
														<span>Website</span>
													</li>
													@else
													<li class="list-group-item text-center">
														<a target="_blank" href="https://www.th2-0.com">
															<svg viewBox="0 0 24 24" style="height: 30;" xmlns="http://www.w3.org/2000/svg"><title/><path d="M17.3,13.35a1,1,0,0,1-.7-.29,1,1,0,0,1,0-1.41l2.12-2.12a2,2,0,0,0,0-2.83L17.3,5.28a2.06,2.06,0,0,0-2.83,0L12.35,7.4A1,1,0,0,1,10.94,6l2.12-2.12a4.1,4.1,0,0,1,5.66,0l1.41,1.41a4,4,0,0,1,0,5.66L18,13.06A1,1,0,0,1,17.3,13.35Z" fill="#464646"/><path d="M8.11,21.3a4,4,0,0,1-2.83-1.17L3.87,18.72a4,4,0,0,1,0-5.66L6,10.94A1,1,0,0,1,7.4,12.35L5.28,14.47a2,2,0,0,0,0,2.83L6.7,18.72a2.06,2.06,0,0,0,2.83,0l2.12-2.12A1,1,0,1,1,13.06,18l-2.12,2.12A4,4,0,0,1,8.11,21.3Z" fill="#464646"/><path d="M8.82,16.18a1,1,0,0,1-.71-.29,1,1,0,0,1,0-1.42l6.37-6.36a1,1,0,0,1,1.41,0,1,1,0,0,1,0,1.42L9.52,15.89A1,1,0,0,1,8.82,16.18Z" fill="#464646"/></svg>
														</a><br/>
														<span>Website</span>
													</li>
													@endif
													@if(!empty($coWorkSpace->contact_details['facebook_url']) && $coWorkSpace->contact_details['facebook_url'] != null)
													<li class="list-group-item text-center">
														<a target="_blank" href="{{$coWorkSpace->contact_details['facebook_url']}}">
															@php
															echo `<!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="30px" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M512,256c0,-141.385 -114.615,-256 -256,-256c-141.385,0 -256,114.615 -256,256c0,127.777 93.616,233.685 216,252.89l0,-178.89l-65,0l0,-74l65,0l0,-56.4c0,-64.16 38.219,-99.6 96.695,-99.6c28.009,0 57.305,5 57.305,5l0,63l-32.281,0c-31.801,0 -41.719,19.733 -41.719,39.978l0,48.022l71,0l-11.35,74l-59.65,0l0,178.89c122.385,-19.205 216,-125.113 216,-252.89Z" style="fill:#1877f2;fill-rule:nonzero;"/><path d="M355.65,330l11.35,-74l-71,0l0,-48.022c0,-20.245 9.917,-39.978 41.719,-39.978l32.281,0l0,-63c0,0 -29.297,-5 -57.305,-5c-58.476,0 -96.695,35.44 -96.695,99.6l0,56.4l-65,0l0,74l65,0l0,178.89c13.033,2.045 26.392,3.11 40,3.11c13.608,0 26.966,-1.065 40,-3.11l0,-178.89l59.65,0Z" style="fill:#fff;fill-rule:nonzero;"/></g></svg>`;
															@endphp
														</a><br/>
														<span>facebook</span>
													</li>
													@else
													<li class="list-group-item text-center">
														<a target="_blank" href="https://www.facebook.com/townhouse2.0">
															<!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="30px" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M512,256c0,-141.385 -114.615,-256 -256,-256c-141.385,0 -256,114.615 -256,256c0,127.777 93.616,233.685 216,252.89l0,-178.89l-65,0l0,-74l65,0l0,-56.4c0,-64.16 38.219,-99.6 96.695,-99.6c28.009,0 57.305,5 57.305,5l0,63l-32.281,0c-31.801,0 -41.719,19.733 -41.719,39.978l0,48.022l71,0l-11.35,74l-59.65,0l0,178.89c122.385,-19.205 216,-125.113 216,-252.89Z" style="fill:#1877f2;fill-rule:nonzero;"/><path d="M355.65,330l11.35,-74l-71,0l0,-48.022c0,-20.245 9.917,-39.978 41.719,-39.978l32.281,0l0,-63c0,0 -29.297,-5 -57.305,-5c-58.476,0 -96.695,35.44 -96.695,99.6l0,56.4l-65,0l0,74l65,0l0,178.89c13.033,2.045 26.392,3.11 40,3.11c13.608,0 26.966,-1.065 40,-3.11l0,-178.89l59.65,0Z" style="fill:#fff;fill-rule:nonzero;"/></g></svg>
														</a><br/>
														<span>facebook</span>
													</li>
													@endif
													@if(!empty($coWorkSpace->contact_details['twitter_url']) && $coWorkSpace->contact_details['twitter_url'] != null)
													<li class="list-group-item text-center">
														<a target="_blank" href="{{$coWorkSpace->contact_details['twitter_url']}}">
															@php
															echo `
																	<svg id="Layer_1" style="enable-background:new 0 0 1000 1000; height: 30px;" version="1.1" viewBox="0 0 1000 1000" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
																.st0{fill:#1DA1F2;}
																.st1{fill:#FFFFFF;}
																.st2{fill:none;}
															</style><title/><g><g id="Dark_Blue"><path class="st0" d="M500,0L500,0c276.1,0,500,223.9,500,500v0c0,276.1-223.9,500-500,500h0C223.9,1000,0,776.1,0,500v0    C0,223.9,223.9,0,500,0z"/></g><g id="Logo_FIXED"><path class="st1" d="M384,754c235.8,0,364.9-195.4,364.9-364.9c0-5.5,0-11.1-0.4-16.6c25.1-18.2,46.8-40.6,64-66.4    c-23.4,10.4-48.2,17.2-73.6,20.2c26.8-16,46.8-41.2,56.4-70.9c-25.2,14.9-52.7,25.5-81.4,31.1c-48.6-51.6-129.8-54.1-181.4-5.6    c-33.3,31.3-47.4,78-37.1,122.5c-103.1-5.2-199.2-53.9-264.3-134c-34,58.6-16.7,133.5,39.7,171.2c-20.4-0.6-40.4-6.1-58.2-16    c0,0.5,0,1.1,0,1.6c0,61,43,113.6,102.9,125.7c-18.9,5.1-38.7,5.9-57.9,2.2c16.8,52.2,64.9,88,119.8,89.1    c-45.4,35.7-101.5,55.1-159.2,55c-10.2,0-20.4-0.6-30.5-1.9C246.1,734,314.4,754,384,753.9"/><path class="st2" d="M500,0L500,0c276.1,0,500,223.9,500,500v0c0,276.1-223.9,500-500,500h0C223.9,1000,0,776.1,0,500v0    C0,223.9,223.9,0,500,0z"/></g></g></svg>`;
															@endphp
														</a><br/>
														<span>Twitter</span>
													</li>
													@else
													<li class="list-group-item text-center">
														<a target="_blank" href="https://twitter.com/th2-0" class="mx-auto">
															<svg id="Layer_1" style="enable-background:new 0 0 1000 1000; height: 30px;" version="1.1" viewBox="0 0 1000 1000" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
																.st0{fill:#1DA1F2;}
																.st1{fill:#FFFFFF;}
																.st2{fill:none;}
															</style><title/><g><g id="Dark_Blue"><path class="st0" d="M500,0L500,0c276.1,0,500,223.9,500,500v0c0,276.1-223.9,500-500,500h0C223.9,1000,0,776.1,0,500v0    C0,223.9,223.9,0,500,0z"/></g><g id="Logo_FIXED"><path class="st1" d="M384,754c235.8,0,364.9-195.4,364.9-364.9c0-5.5,0-11.1-0.4-16.6c25.1-18.2,46.8-40.6,64-66.4    c-23.4,10.4-48.2,17.2-73.6,20.2c26.8-16,46.8-41.2,56.4-70.9c-25.2,14.9-52.7,25.5-81.4,31.1c-48.6-51.6-129.8-54.1-181.4-5.6    c-33.3,31.3-47.4,78-37.1,122.5c-103.1-5.2-199.2-53.9-264.3-134c-34,58.6-16.7,133.5,39.7,171.2c-20.4-0.6-40.4-6.1-58.2-16    c0,0.5,0,1.1,0,1.6c0,61,43,113.6,102.9,125.7c-18.9,5.1-38.7,5.9-57.9,2.2c16.8,52.2,64.9,88,119.8,89.1    c-45.4,35.7-101.5,55.1-159.2,55c-10.2,0-20.4-0.6-30.5-1.9C246.1,734,314.4,754,384,753.9"/><path class="st2" d="M500,0L500,0c276.1,0,500,223.9,500,500v0c0,276.1-223.9,500-500,500h0C223.9,1000,0,776.1,0,500v0    C0,223.9,223.9,0,500,0z"/></g></g></svg>
														</a><br/>
														<span>Twitter</span>
													</li>
													@endif
													@if(!empty($coWorkSpace->contact_details['instagram_url']) && $coWorkSpace->contact_details['instagram_url'] != null)
													<li class="list-group-item text-center">
														<a target="_blank" href="{{$coWorkSpace->contact_details['instagram_url']}}">
															<svg id="Layer_1" style="enable-background:new 0 0 1000 1000; height: 30px;" version="1.1" viewBox="0 0 1000 1000" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
																.st00{fill:url(#SVGID_1_);}
																.st1{fill:#FFFFFF;}
															</style><linearGradient gradientUnits="userSpaceOnUse" id="SVGID_1_" x1="146.4465" x2="853.5535" y1="853.5535" y2="146.4465"><stop offset="0" style="stop-color:#FFD521"/><stop offset="5.510481e-02" style="stop-color:#FFD020"/><stop offset="0.1241" style="stop-color:#FEC01E"/><stop offset="0.2004" style="stop-color:#FCA71B"/><stop offset="0.2821" style="stop-color:#FA8316"/><stop offset="0.3681" style="stop-color:#F85510"/><stop offset="0.4563" style="stop-color:#F51E09"/><stop offset="0.5" style="stop-color:#F30005"/><stop offset="0.5035" style="stop-color:#F20007"/><stop offset="0.5966" style="stop-color:#E1003B"/><stop offset="0.6879" style="stop-color:#D30067"/><stop offset="0.7757" style="stop-color:#C70088"/><stop offset="0.8589" style="stop-color:#BF00A0"/><stop offset="0.9357" style="stop-color:#BB00AF"/><stop offset="1" style="stop-color:#B900B4"/></linearGradient><path class="st00" d="M500,1000L500,1000C223.9,1000,0,776.1,0,500v0C0,223.9,223.9,0,500,0h0c276.1,0,500,223.9,500,500v0  C1000,776.1,776.1,1000,500,1000z"/><g><path class="st1" d="M500,220.2c91.1,0,101.9,0.3,137.9,2c33.3,1.5,51.4,7.1,63.4,11.8c15.9,6.2,27.3,13.6,39.2,25.5   c11.9,11.9,19.3,23.3,25.5,39.2c4.7,12,10.2,30.1,11.8,63.4c1.6,36,2,46.8,2,137.9s-0.3,101.9-2,137.9   c-1.5,33.3-7.1,51.4-11.8,63.4c-6.2,15.9-13.6,27.3-25.5,39.2c-11.9,11.9-23.3,19.3-39.2,25.5c-12,4.7-30.1,10.2-63.4,11.8   c-36,1.6-46.8,2-137.9,2s-101.9-0.3-137.9-2c-33.3-1.5-51.4-7.1-63.4-11.8c-15.9-6.2-27.3-13.6-39.2-25.5   c-11.9-11.9-19.3-23.3-25.5-39.2c-4.7-12-10.2-30.1-11.8-63.4c-1.6-36-2-46.8-2-137.9s0.3-101.9,2-137.9   c1.5-33.3,7.1-51.4,11.8-63.4c6.2-15.9,13.6-27.3,25.5-39.2c11.9-11.9,23.3-19.3,39.2-25.5c12-4.7,30.1-10.2,63.4-11.8   C398.1,220.5,408.9,220.2,500,220.2 M500,158.7c-92.7,0-104.3,0.4-140.7,2.1c-36.3,1.7-61.1,7.4-82.9,15.9   C254,185.3,234.9,197,216,216c-19,19-30.6,38-39.4,60.5c-8.4,21.7-14.2,46.5-15.9,82.9c-1.7,36.4-2.1,48-2.1,140.7   c0,92.7,0.4,104.3,2.1,140.7c1.7,36.3,7.4,61.1,15.9,82.9C185.3,746,197,765.1,216,784c19,19,38,30.6,60.5,39.4   c21.7,8.4,46.5,14.2,82.9,15.9c36.4,1.7,48,2.1,140.7,2.1s104.3-0.4,140.7-2.1c36.3-1.7,61.1-7.4,82.9-15.9   C746,814.7,765.1,803,784,784c19-19,30.6-38,39.4-60.5c8.4-21.7,14.2-46.5,15.9-82.9c1.7-36.4,2.1-48,2.1-140.7   s-0.4-104.3-2.1-140.7c-1.7-36.3-7.4-61.1-15.9-82.9C814.7,254,803,234.9,784,216c-19-19-38-30.6-60.5-39.4   c-21.7-8.4-46.5-14.2-82.9-15.9C604.3,159.1,592.7,158.7,500,158.7L500,158.7z"/><path class="st1" d="M500,324.7c-96.8,0-175.3,78.5-175.3,175.3S403.2,675.3,500,675.3S675.3,596.8,675.3,500   S596.8,324.7,500,324.7z M500,613.8c-62.8,0-113.8-50.9-113.8-113.8S437.2,386.2,500,386.2c62.8,0,113.8,50.9,113.8,113.8   S562.8,613.8,500,613.8z"/><circle class="st1" cx="682.2" cy="317.8" r="41"/></g></svg>
														</a><br/>
														<span>Instagram</span>
													</li>
													@else
													<li class="list-group-item text-center">
														<a target="_blank" href="https://www.instagram.com/th2.0_technology">
															<svg id="Layer_1" style="enable-background:new 0 0 1000 1000; height: 30px;" version="1.1" viewBox="0 0 1000 1000" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
																.st00{fill:url(#SVGID_1_);}
																.st1{fill:#FFFFFF;}
															</style><linearGradient gradientUnits="userSpaceOnUse" id="SVGID_1_" x1="146.4465" x2="853.5535" y1="853.5535" y2="146.4465"><stop offset="0" style="stop-color:#FFD521"/><stop offset="5.510481e-02" style="stop-color:#FFD020"/><stop offset="0.1241" style="stop-color:#FEC01E"/><stop offset="0.2004" style="stop-color:#FCA71B"/><stop offset="0.2821" style="stop-color:#FA8316"/><stop offset="0.3681" style="stop-color:#F85510"/><stop offset="0.4563" style="stop-color:#F51E09"/><stop offset="0.5" style="stop-color:#F30005"/><stop offset="0.5035" style="stop-color:#F20007"/><stop offset="0.5966" style="stop-color:#E1003B"/><stop offset="0.6879" style="stop-color:#D30067"/><stop offset="0.7757" style="stop-color:#C70088"/><stop offset="0.8589" style="stop-color:#BF00A0"/><stop offset="0.9357" style="stop-color:#BB00AF"/><stop offset="1" style="stop-color:#B900B4"/></linearGradient><path class="st00" d="M500,1000L500,1000C223.9,1000,0,776.1,0,500v0C0,223.9,223.9,0,500,0h0c276.1,0,500,223.9,500,500v0  C1000,776.1,776.1,1000,500,1000z"/><g><path class="st1" d="M500,220.2c91.1,0,101.9,0.3,137.9,2c33.3,1.5,51.4,7.1,63.4,11.8c15.9,6.2,27.3,13.6,39.2,25.5   c11.9,11.9,19.3,23.3,25.5,39.2c4.7,12,10.2,30.1,11.8,63.4c1.6,36,2,46.8,2,137.9s-0.3,101.9-2,137.9   c-1.5,33.3-7.1,51.4-11.8,63.4c-6.2,15.9-13.6,27.3-25.5,39.2c-11.9,11.9-23.3,19.3-39.2,25.5c-12,4.7-30.1,10.2-63.4,11.8   c-36,1.6-46.8,2-137.9,2s-101.9-0.3-137.9-2c-33.3-1.5-51.4-7.1-63.4-11.8c-15.9-6.2-27.3-13.6-39.2-25.5   c-11.9-11.9-19.3-23.3-25.5-39.2c-4.7-12-10.2-30.1-11.8-63.4c-1.6-36-2-46.8-2-137.9s0.3-101.9,2-137.9   c1.5-33.3,7.1-51.4,11.8-63.4c6.2-15.9,13.6-27.3,25.5-39.2c11.9-11.9,23.3-19.3,39.2-25.5c12-4.7,30.1-10.2,63.4-11.8   C398.1,220.5,408.9,220.2,500,220.2 M500,158.7c-92.7,0-104.3,0.4-140.7,2.1c-36.3,1.7-61.1,7.4-82.9,15.9   C254,185.3,234.9,197,216,216c-19,19-30.6,38-39.4,60.5c-8.4,21.7-14.2,46.5-15.9,82.9c-1.7,36.4-2.1,48-2.1,140.7   c0,92.7,0.4,104.3,2.1,140.7c1.7,36.3,7.4,61.1,15.9,82.9C185.3,746,197,765.1,216,784c19,19,38,30.6,60.5,39.4   c21.7,8.4,46.5,14.2,82.9,15.9c36.4,1.7,48,2.1,140.7,2.1s104.3-0.4,140.7-2.1c36.3-1.7,61.1-7.4,82.9-15.9   C746,814.7,765.1,803,784,784c19-19,30.6-38,39.4-60.5c8.4-21.7,14.2-46.5,15.9-82.9c1.7-36.4,2.1-48,2.1-140.7   s-0.4-104.3-2.1-140.7c-1.7-36.3-7.4-61.1-15.9-82.9C814.7,254,803,234.9,784,216c-19-19-38-30.6-60.5-39.4   c-21.7-8.4-46.5-14.2-82.9-15.9C604.3,159.1,592.7,158.7,500,158.7L500,158.7z"/><path class="st1" d="M500,324.7c-96.8,0-175.3,78.5-175.3,175.3S403.2,675.3,500,675.3S675.3,596.8,675.3,500   S596.8,324.7,500,324.7z M500,613.8c-62.8,0-113.8-50.9-113.8-113.8S437.2,386.2,500,386.2c62.8,0,113.8,50.9,113.8,113.8   S562.8,613.8,500,613.8z"/><circle class="st1" cx="682.2" cy="317.8" r="41"/></g></svg>
														</a><br/>
														<span>Instagram</span>
													</li>
													@endif
													
												</ul>
											</div>
										</div>

										<div class="common-form my-4 py-3 border-bottom" id="facilities">
											<h6 class="pb-1 r-boldItalic f-16  head-description">Facilities</h6>
											<div class="space-preference mb-4">
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
											</div>
										</div>

										<div class="common-form my-4 py-3 border-bottom"  id="location">
											<h6 class="r-boldItalic f-16  head-description">Location</h6>
											@if(!empty($coWorkSpace->address['address']))
												<p class="pb-0 mb-0">{{$coWorkSpace->address['address']}}</p>
												<p>{{$coWorkSpace->address['pin_code'] ?? ''}}</p>
											@endif
											<div id="mapName">

											</div>
											
										</div>
										@if(!empty($coWorkSpace->admin_rating))
											@include('front.cowork.explore.review')
										@endif
										@auth	
											@if(Auth::id() != $coWorkSpace->user_id)  
												@if($coWorkSpace->cwsBookings()->where('user_id', Auth::id())->count() > 0)
												<div class="common-form py-4 border-bottom">
													<div>
														<h6 class="r-boldItalic f-16  head-description">Your Booking History</h6>
														<p class="r-lightItalic f-9 head-description para">Here are your previous bookings for this venue. You could book this venue again with your previous booked seating types.</p>
													</div>
													@foreach($coWorkSpace->cwsBookings()->where('user_id', Auth::id())->get() as $coWorkSpaceBooking)  
														@if($coWorkSpaceBooking && $coWorkSpaceBooking->where('user_id',Auth()->user())) 			
															@if($coWorkSpaceBooking->dedicatedDeskBooking || $coWorkSpaceBooking->sharedDeskBooking || $coWorkSpaceBooking->privateOfficeBooking || $coWorkSpaceBooking->meetingRoomBooking)
															<div class="px-3 pt-3 pb-4 mt-2 single-book-history" id="booking_history_{{$coWorkSpaceBooking->id}}">
																<div class="row">
																	<div class="col-md-6">
																		<p class="r-lightItalic f-9 head-description para">Recent Booking : <span>{{ date('jS F Y', strtotime($coWorkSpaceBooking->start_date)) }}</span></p>
																	</div>
																	<div class="col-md-6 text-right">
																		{{-- <button type="button" class="bookNow btn btn-success n-bold f-9 rounded-0 mx-auto text-center justify-content-center d-block w-100 mb-3">Book Again</button> --}}
																		<a href="{{ route('rebooking-review', $coWorkSpaceBooking->id) }}" class="btn btn-success n-bold f-9 rounded-0 mx-auto text-center justify-content-center d-block w-100 mb-3">Book Again</a>
																	</div>
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
											@endif
										@endauth
										<div class="padding-bottom"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class=""> -->
				@php
					$showBookingTab = true;
				@endphp
				@auth
					@if(Auth::id() == $coWorkSpace->user_id)
						@php
							$showBookingTab = false;
						@endphp
					@endif
				@endauth

				@if($showBookingTab)
					<div id="mySidenavTabs" class="card-listing-filter-wrapper  pt-md-5 pt-5 col-md-4">					
						<div class="card-listing-filter-tab pt-md-0 h-100">
							<ul class="nav nav-tabs" role='tab-list'>
								<li class="nav-item h-auto pt-0" >
									<a href="#coWorker" data-toggle='tab' class="nav-link active text-uppercase text-muted n-bold f-9">
										BOOKING
									</a>
								</li>
								<li class="nav-item">
									<a href="#meeting" data-toggle='tab' class="nav-link text-uppercase text-muted n-bold f-9">
										ENQUIRY
									</a>
								</li>
							</ul>
							<div class="tab-content px-0">
								<div class="tab-pane show active px-0" id="coWorker">
									@livewire('co-work.booking-tab', ['cws' => $coWorkSpace->id], 'booking-tab-key'.$coWorkSpace->id)
								</div>
								@include('front.cowork.explore.enquiry-tab')
							</div>
						</div>
					</div>
				@endif
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
	
 	
    
	@include('front.cowork.explore.script.index-script')
	@include('front.cowork.explore.script.enquiry-script')
	@include('front.cowork.explore.script.booking-script')
	@include('front.cowork.explore.script.review-script')
	@include('front.cowork.create-listing.scripts.location-script')
@endsection
