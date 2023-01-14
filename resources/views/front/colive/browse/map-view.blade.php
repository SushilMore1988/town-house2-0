@extends('front.layouts.app')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{url('front/vendor/slick-slider/css/slick.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('front/vendor/slick-slider/css/slick-theme.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('front/vendor/price-ranger/css/price-ranger.css')}}">
	<link rel="stylesheet" href="{{url('front/vendor/fondation-datePicker/css/foundation-datepicker.css')}}">
	<link rel="stylesheet" href="{{url('front/vendor/datetime-picker/css/datetime-picker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('/front/bootstrap3-datepicker/bootstrap-glyphicons.css')}}">	
	{{-- <link rel="stylesheet" href="{{url('front/css/main.css')}}"> --}}
	<style type="text/css" media="screen">
		.gm-style-iw, .gm-style-iw-c, .gm-style-iw-d {
		    max-height: 300px !important;   
		    width: 300px !important;
		    overflow:scroll;
		}
		.gm-style .gm-style-iw-c{
			border-radius: 0 !important;
			border:1px solid rgba(1, 2, 1, 0.3);
			padding: 8px;
		}
		.gm-style img {
		    max-width:293px;
		}
		.gm-style .ratings {
		    width: 50px;
		    height: 50px;
		}
		.gm-ui-hover-effect{
			background-color: #fff!important;
			box-shadow:0px 6px 14px rgba(0,0,0,0.16);
			z-index:1023 !important;
			border-radius: 50%;
			top: 0px !important;
			right: 2px !important;
			opacity: 1;
		}
		.card-close{

		}
		.gm-style-iw-d .btn.btn-info{
			margin-top: 10px;
		}
		.list-view-rating{
			width: 50px !important;
			height: 50px !important;
		}
		/*.list-view-rating{
				width: 50px !important;
				height: 50px !important;
		}*/
		.header .container{
			padding-left:0px !important;
			padding-right: 0px !important;
		}
		@media (max-width: 767.98px){
			.header .container{
				padding-left:15px !important;
				padding-right: 15px !important;
			}
		}
	</style>
@endsection
@section('content') 
	@include('front.colive.browse.search-bar')
	<section class="card-listing-filter-wrapper min-height-section">
		<div class="container">
			<div class="row py-4">
				@include('front.colive.browse.filters-side-bar')
				<div id="main" class="main col-md-8 px-md-0 pt-md-0 pt-5">
					<!-- <div class=""> -->
					<div class="slider slider-single border">
						<div class="card-listing-filter d-flex position-relative">
							<div id="map" style="width: 100%">
								<img src="{{url('/img/2019_01_10_UI_5.png')}}" alt="2019_01_10_UI_5" class="w-100">
							</div>			  	  
							<div class="card align-content-end topper-card single-card border-success border-0" style="min-height:auto; width: 43%;">
								<div class="card-body ">
									<div class="text-center img-rank">
										<img src="{{ url('/img/card-banner.png') }}" class="img-fluid w-100" alt="" id="cover_image">
									</div>
									<div class="right-box w-100">
										<div class="card-text">
											<div class="d-flex justify-content-between flex-column flex-lg-row">
												<div class="card-text-left-box d-flex flex-column ">
													<div class="">
														<h4 class="n-bold text-dark text-uppercase" id="co-work-space-name">SHARED APARTMENT/ FLAT</h4>
														<span class="r-boldItalic f-8 text-light" style="display: block">1Bed/Room/Apt - 1BHK</span>
														<i class="r-lightItalic f-9 text-light" id="co-work-space-address">Prabhat Road, Pune, Maharashtra (IN)</i>
													</div>
													<div class="card-prices mt-auto">
														
														<div class="category-type img-comntainer pt-xl-2 text-center d-flex">
															<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver" id="colorCategory">
																<p class="text-black n-bold text-center align-self-center mb-0 " style="font-size: 24px;">3.0</p>
															</div>
															<span class="align-self-center ml-2"> 
																<strong class="n-bold f-9"> 
																	<i class="currency">INR</i>
																	<span class="pr-0" id="dedicated-desk">5000</span>
																</strong>/Mo
															</span>
														</div>
														
													</div>
												</div>
												<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
													<div class="mt-3 text-center">
														<h5 class="n-bold text-dark text-uppercase" id="co-work-space-name text-center f-20">06</h5>
														<i class="r-lightItalic f-9 text-light" id="co-work-space-address pt-2">Networks Found</i>
														<span class="r-boldItalic f-8 text-light pt-2" style="display: block">Switch to Network mode</span>
														
													</div>
													
													
													<a class="btn btn-info n-bold f-6 text-muted rounded-0 mt-3" id="explore" href="http://127.0.0.1:8000/explore/ripp-studio-private-limited-6">EXPLORE</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>  	   
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-6">
							<p class="r-lightItalic f-9 check-label">We Found <span id="foundCounter"></span> Location, that matches your search Preference. </p>
						</div>
						<div class="col-md-6 text-right">
							<ul class="sort d-flex justify-content-md-end">
								<li class="sort-title f-9 check-label">
									Sort by:
								</li>
								<li class="dropdown sort-title price-dropdown">
									<span class="active f-9 check-label dropdown-toggle" data-toggle="dropdown">Price</span>
									<div class="dropdown-menu py-0 dropdown-menu-right">
								        <a class="dropdown-item border-top-0 price-sort" data-sort_price="high-to-low">
							        		<div class="media">
											  	<div class="media-body">
												    <p class="f-9 mb-0">High to Low</p>
												</div>
											  	<div class="align-self-center arrows">
											  		<img src="{{url('/img/SVG_Cowork/up-long-arrow.svg')}}" alt="up-long-arrow">
											  	</div>
											</div>
								        </a>
								        <a class="dropdown-item price-sort" data-sort_price="low-to-high">
								        	<div class="media">
											  	<div class="media-body">
												    <p class="f-9 mb-0">Low to High</p>
												</div>
											  	<div class="align-self-center arrows">
											  		<img src="{{url('/img/SVG_Cowork/down-long-arrow.svg')}}" alt="down-long-arrow">
											  	</div>
											</div>
								        </a>
								        <a class="dropdown-item price-sort" data-sort_price="default">
								        	<div class="media">
											  	<div class="media-body">
												    <p class="f-9 mb-0">Default</p>
												</div>
											</div>
								        </a>
								    </div>	|
								</li>
								<li class="sort-title dropdown">
									 <span class="f-9 check-label dropdown-toggle"  data-toggle="dropdown">Rating</span>
									<div class="dropdown-menu py-0 dropdown-menu-right">
								        <a class="dropdown-item border-top-0 rating-sort" data-sort_value="high-to-low" href="javascript:void(0)">
								        	<div class="media">
											  	<div class="media-body">
												    <p class="f-9 mb-0">High to Low</p>
												</div>
											  	<div class="align-self-center arrows">
											  		<img src="{{url('/img/SVG_Cowork/up-long-arrow.svg')}}" alt="up-long-arrow">
											  	</div>
											</div>
								        </a>
								        <a class="dropdown-item rating-sort" data-sort_value="low-to-high" href="javascript:void(0)">
								        	<div class="media">
											  	<div class="media-body">
												    <p class="f-9 mb-0">Low to High</p>
												</div>
											  	<div class="align-self-center arrows">
											  		<img src="{{url('/img/SVG_Cowork/down-long-arrow.svg')}}" alt="down-long-arrow">
											  	</div>
											</div>
								        </a>
								        <a class="dropdown-item rating-sort" href="#" data-sort_value="default">
								        	<div class="media">
											  	<div class="media-body">
												    <p class="f-9 mb-0">Default</p>
												</div>
											</div>
								        </a>
								    </div>	
								</li>
								<li class="dropdown sort-title">
									| <span class="dropdown-toggle f-9 check-label" data-toggle="dropdown">Categories</span>
									<div class="dropdown-menu py-0 dropdown-menu-right">
								        <a class="dropdown-item border-top-0  category-sort " href="#" data-sort_category="bronze-below">
								        	<div class="media">
											  	<div class="media-body">
												    <p class="f-9 mb-0">Bronze and below</p>
												</div>
											  	<div class="align-self-center">
											  		<div class="circle-medal bronze"></div>
											  	</div>
											</div>
								        </a>
								        <a class="dropdown-item category-sort" href="#" data-sort_category="silver-below">
								        	<div class="media">
											  	<div class="media-body">
												    <p class="f-9 mb-0 ">Silver and below</p>
												</div>
											  	<div class="align-self-center">
											  		<div class="circle-medal silver"></div>
											  	</div>
											</div>
								        </a>
								        <a class="dropdown-item category-sort" href="#" data-sort_category="gold-below">
								        	<div class="media">
											  	<div class="media-body">
												    <p class="f-9 mb-0">Gold and below</p>
												</div>
											  	<div class="align-self-center">
											  		<div class="circle-medal gold"></div>
											  	</div>
											</div>
								        </a>
								        <a class="dropdown-item category-sort" href="#" data-sort_category="default">
								        	<div class="media">
											  	<div class="media-body">
												    <p class="f-9 mb-0">Default</p>
												</div>
											</div>
								        </a>
								    </div>	
								</li>
							</ul>
						</div>
					</div>
					<div class="row " id="space-list">
						<div class="mb-3 col-md-4 col-sm-6 colive-card-wrapper pr-sm-0" >
							<div class="card border-orange border-0 colive-card">
								<div class="card-body">
									<div class="text-center img-rank" >
										<img src="{{ url('/img/card-banner.png') }}" class="img-fluid" alt="" />								
									</div>
									<div class="right-box w-100">
										<div class="card-text">
											<div class="d-flex justify-content-between flex-column flex-lg-row">
												<div class="card-text-left-box d-flex flex-column w-100">
													<div class="mb-2">
														<h4 class="n-bold text-dark text-uppercase">SHARED APARTMENT/ FLAT</h4>
														
															<span class="r-boldItalic f-8 text-light" style="display: block">1Bed/Room/Apt - 1BHK</span>
													</div> 
													<div class="card-prices mt-auto pr-3">
														<p class="r-lightItalic f-8 text-light shared-hide">Shared Desks <span > <strong class="n-bold f-8 ">5000</strong> /Mo</span> </p>
														<p class="r-lightItalic f-8 text-light private-hide">Private Office <span> <strong class="n-bold f-8">4000</strong>/Mo</span> </p>
													</div>
												</div> 
												<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
													<div class="category-type img-comntainer pt-xl-4 text-center pt-lg-4" >
														
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-brown border-brown">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																3.1
															</p>
														</div>
													
														{{-- <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																3.0
															</p>
														</div>
													
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-gold border-gold">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																4.0
															</p>
														</div>--}}
														
													</div>
													 
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3 col-md-4 col-sm-6 colive-card-wrapper pr-sm-0" >
							<div class="card border-success border-0 colive-card">
								<div class="card-body">
									<div class="text-center img-rank" >
										<img src="{{ url('/img/card-banner.png') }}" class="img-fluid" alt="" />								
									</div>
									<div class="right-box w-100">
										<div class="card-text">
											<div class="d-flex justify-content-between flex-column flex-lg-row">
												<div class="card-text-left-box d-flex flex-column w-100">
													<div class="mb-2">
														<h4 class="n-bold text-dark text-uppercase">SHARED APARTMENT/ FLAT</h4>
														
															<span class="r-boldItalic f-8 text-light" style="display: block">1Bed/Room/Apt - 1BHK</span>
													</div> 
													<div class="card-prices mt-auto pr-3">
														<p class="r-lightItalic f-8 text-light shared-hide">Shared Desks <span > <strong class="n-bold f-8 ">5000</strong> /Mo</span> </p>
														<p class="r-lightItalic f-8 text-light private-hide">Private Office <span> <strong class="n-bold f-8">4000</strong>/Mo</span> </p>
													</div>
												</div> 
												<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
													<div class="category-type img-comntainer pt-xl-4 text-center pt-lg-4" >
														
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-brown border-brown">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																3.1
															</p>
														</div>
													
														{{-- <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																3.0
															</p>
														</div>
													
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-gold border-gold">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																4.0
															</p>
														</div>--}}
														
													</div>
													 
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3 col-md-4 col-sm-6 colive-card-wrapper pr-sm-0" >
							<div class="card border-red border-0 colive-card">
								<div class="card-body">
									<div class="text-center img-rank" >
										<img src="{{ url('/img/card-banner.png') }}" class="img-fluid" alt="" />								
									</div>
									<div class="right-box w-100">
										<div class="card-text">
											<div class="d-flex justify-content-between flex-column flex-lg-row">
												<div class="card-text-left-box d-flex flex-column w-100">
													<div class="mb-2">
														<h4 class="n-bold text-dark text-uppercase">SHARED APARTMENT/ FLAT</h4>
														
															<span class="r-boldItalic f-8 text-light" style="display: block">1Bed/Room/Apt - 1BHK</span>
													</div> 
													<div class="card-prices mt-auto pr-3">
														<p class="r-lightItalic f-8 text-light shared-hide">Shared Desks <span > <strong class="n-bold f-8 ">5000</strong> /Mo</span> </p>
														<p class="r-lightItalic f-8 text-light private-hide">Private Office <span> <strong class="n-bold f-8">4000</strong>/Mo</span> </p>
													</div>
												</div> 
												<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
													<div class="category-type img-comntainer pt-xl-4 text-center pt-lg-4" >
														
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-brown border-brown">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																3.1
															</p>
														</div>
													
														{{-- <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																3.0
															</p>
														</div>
													
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-gold border-gold">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																4.0
															</p>
														</div>--}}
														
													</div>
													 
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3 col-md-4 col-sm-6 colive-card-wrapper pr-sm-0" >
							<div class="card border-orange border-0 colive-card">
								<div class="card-body">
									<div class="text-center img-rank" >
										<img src="{{ url('/img/card-banner.png') }}" class="img-fluid" alt="" />								
									</div>
									<div class="right-box w-100">
										<div class="card-text">
											<div class="d-flex justify-content-between flex-column flex-lg-row">
												<div class="card-text-left-box d-flex flex-column w-100">
													<div class="mb-2">
														<h4 class="n-bold text-dark text-uppercase">SHARED APARTMENT/ FLAT</h4>
														
															<span class="r-boldItalic f-8 text-light" style="display: block">1Bed/Room/Apt - 1BHK</span>
													</div> 
													<div class="card-prices mt-auto pr-3">
														<p class="r-lightItalic f-8 text-light shared-hide">Shared Desks <span > <strong class="n-bold f-8 ">5000</strong> /Mo</span> </p>
														<p class="r-lightItalic f-8 text-light private-hide">Private Office <span> <strong class="n-bold f-8">4000</strong>/Mo</span> </p>
													</div>
												</div> 
												<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
													<div class="category-type img-comntainer pt-xl-4 text-center pt-lg-4" >
														
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-brown border-brown">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																3.1
															</p>
														</div>
													
														{{-- <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																3.0
															</p>
														</div>
													
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-gold border-gold">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																4.0
															</p>
														</div>--}}
														
													</div>
													 
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3 col-md-4 col-sm-6 colive-card-wrapper pr-sm-0" >
							<div class="card border-success border-0 colive-card">
								<div class="card-body">
									<div class="text-center img-rank" >
										<img src="{{ url('/img/card-banner.png') }}" class="img-fluid" alt="" />								
									</div>
									<div class="right-box w-100">
										<div class="card-text">
											<div class="d-flex justify-content-between flex-column flex-lg-row">
												<div class="card-text-left-box d-flex flex-column w-100">
													<div class="mb-2">
														<h4 class="n-bold text-dark text-uppercase">SHARED APARTMENT/ FLAT</h4>
														
															<span class="r-boldItalic f-8 text-light" style="display: block">1Bed/Room/Apt - 1BHK</span>
													</div> 
													<div class="card-prices mt-auto pr-3">
														<p class="r-lightItalic f-8 text-light shared-hide">Shared Desks <span > <strong class="n-bold f-8 ">5000</strong> /Mo</span> </p>
														<p class="r-lightItalic f-8 text-light private-hide">Private Office <span> <strong class="n-bold f-8">4000</strong>/Mo</span> </p>
													</div>
												</div> 
												<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
													<div class="category-type img-comntainer pt-xl-4 text-center pt-lg-4" >
														
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-brown border-brown">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																3.1
															</p>
														</div>
													
														{{-- <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																3.0
															</p>
														</div>
													
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-gold border-gold">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																4.0
															</p>
														</div>--}}
														
													</div>
													 
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3 col-md-4 col-sm-6 colive-card-wrapper pr-sm-0" >
							<div class="card border-red border-0 colive-card">
								<div class="card-body">
									<div class="text-center img-rank" >
										<img src="{{ url('/img/card-banner.png') }}" class="img-fluid" alt="" />								
									</div>
									<div class="right-box w-100">
										<div class="card-text">
											<div class="d-flex justify-content-between flex-column flex-lg-row">
												<div class="card-text-left-box d-flex flex-column w-100">
													<div class="mb-2">
														<h4 class="n-bold text-dark text-uppercase">SHARED APARTMENT/ FLAT</h4>
														
															<span class="r-boldItalic f-8 text-light" style="display: block">1Bed/Room/Apt - 1BHK</span>
													</div> 
													<div class="card-prices mt-auto pr-3">
														<p class="r-lightItalic f-8 text-light shared-hide">Shared Desks <span > <strong class="n-bold f-8 ">5000</strong> /Mo</span> </p>
														<p class="r-lightItalic f-8 text-light private-hide">Private Office <span> <strong class="n-bold f-8">4000</strong>/Mo</span> </p>
													</div>
												</div> 
												<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
													<div class="category-type img-comntainer pt-xl-4 text-center pt-lg-4" >
														
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-brown border-brown">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																3.1
															</p>
														</div>
													
														{{-- <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																3.0
															</p>
														</div>
													
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-gold border-gold">
															<p class="text-black n-bold f-18 text-center align-self-center mb-0">
																4.0
															</p>
														</div>--}}
														
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
		</div>
	</section>
@endsection

@section('js')
	<script type="text/javascript" src="{{url('front/vendor/slick-slider/js/slick.min.js')}}"></script>
	<script type="text/javascript" src="{{url('front/vendor/fondation-datePicker/js/foundation-datepicker.js')}}"></script>
	<script src="{{url('front/vendor/datetime-picker/js/moment.js')}}" type="text/javascript" ></script>
	<script src="{{url('front/vendor/datetime-picker/js/datetime-picker.js')}}" type="text/javascript" ></script>
	<!-- <script src="{{url('front/js/main.js')}}" type="text/javascript" ></script> -->

	{{-- <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjDLRNg0HB3jgYjZt3HDTqZ0KFEiobAYc&callback=initAutocomplete&libraries=places"
          defer
        ></script> --}}

    <script
          src="https://maps.googleapis.com/maps/api/js?key={{Config('constant.GMAP_API_KEY')}}&callback=initMap&libraries=places"
          defer
        ></script>

	{{-- @include('front.colive.browse.scripts.slider-script')
	 @include('front.colive.browse.scripts.search-script') 
	@include('front.colive.browse.scripts.map-view-script')	
	@include('front.colive.browse.scripts.map-search-script')
	@include('front.colive.browse.scripts.map-meeting-search-script') --}}
	
	{{-- @include('front.google-location-tracing-script') --}}
	<script type="text/javascript">
		$(document).ready(function(){
			$('.slider1').first().trigger('click');
		});
		jQuery(document).ready(function($){

			$('#addFilter').on('click',function(){
				
				if($("#main").hasClass('col-md-12') ) {
					
					   	
					     $(".colive-card-wrapper").addClass('col-md-3');
					     $(".colive-card-wrapper").removeClass('col-md-4');
					    
					}else {
					    
					     $(".colive-card-wrapper").addClass('col-md-4');
					     $(".colive-card-wrapper").removeClass('col-md-3');
					     
				};
				
			});

		});
	</script>
@endsection

	