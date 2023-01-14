@extends('front.layouts.app')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{url('front/vendor/slick-slider/css/slick.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('front/vendor/slick-slider/css/slick-theme.css')}}">
	<link rel="stylesheet" href="{{url('front/vendor/fondation-datePicker/css/foundation-datepicker.css')}}">
	<link rel="stylesheet" href="{{url('front/vendor/datetime-picker/css/datetime-picker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('front/vendor/price-ranger/css/price-ranger.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('/front/bootstrap3-datepicker/bootstrap-glyphicons.css')}}">	
	<style type="text/css" media="screen">
			/*.sidetabs {
			  display: none;
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
	</style>
@endsection

@section('content')
	@include('front.colive.browse.search-bar')
	<section class="card-listing-filter-wrapper min-height-section">
		<div class="container">
			<div class="row py-4">
				@include('front.colive.browse.filters-side-bar')
				<div id="main" class="main col-md-8 px-md-0 pt-md-0 pt-5">
					<div class="row">
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
					<div class="row" id="space-list">
						<div class="mb-3 col-md-6 col-sm-6 card-wrapper pr-sm-0" >
							<div class="card border-success border-0 coline-new-card">
								<div class="bg-success p-2 community-details">
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
									</div>
								</div>
								<div class="bg-success p-2 mt-1 community-details">
									<div class="d-flex justify-content-between flex-column flex-lg-row ">
										<div class="card-text-left-box d-flex flex-column w-100">
											<h4 class="n-bold text-white f-14 text-uppercase">COMMUNITY NETWORK INDEX : 7.5</h4>
											<div class="card-prices mt-auto pr-3">
												<p class="r-lightItalic f-8 text-white mb-0">Size :<span > 3 People</span> </p>
												<p class="r-lightItalic f-8 text-white mb-0">Type :<span > Fairly Social</span> </p>
												<p class="r-lightItalic f-8 text-white mb-0">Interests :<span > Reading, Fitness, Cinema</span> </p>
											</div>
										</div> 
										<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-self-center"> 
											<img src="{{url('/img/co-living/cards/three-grp.svg')}}" class="grp-img">
										</div>
									</div>
								</div>
								<div class="bg-yellow p-2 mt-1 community-details">
									<div class="d-flex justify-content-between flex-column flex-lg-row ">
										<div class="card-text-left-box d-flex flex-column w-100">
											<h4 class="n-bold text-black f-14 text-uppercase">COMMUNITY NETWORK INDEX : 7.0</h4>
											<div class="card-prices mt-auto pr-3">
												<p class="r-lightItalic f-8 text-black mb-0">Size :<span > 3 People</span> </p>
												<p class="r-lightItalic f-8 text-black mb-0">Type :<span > Fairly Social</span> </p>
												<p class="r-lightItalic f-8 text-black mb-0">Interests :<span > Reading, Fitness, Cinema</span> </p>
											</div>
										</div> 
										<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-self-center"> 
											<img src="{{url('/img/co-living/cards/five-grp.svg')}}" class="grp-img">
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="right-box w-100">
										<div class="card-text">
											<div class="d-flex justify-content-between flex-column flex-lg-row">
												<div class="card-text-left-box d-flex flex-column w-100">
													<div class="mb-2">
														<span class="r-boldItalic f-9 text-light" style="display: block">1Bed/Room/Apt - 1BHK</span>
														<i class="r-lightItalic f-9">
														Daman, Daman and Diu, India</i>
													</div> 
													<div class="card-prices mt-auto pr-3">
														<h6 class="r-boldItalic f-9 text-light">Starting prices*</h6> 
														<p class="r-lightItalic f-9 text-light shared-hide">Shared Desks <span > <strong class="n-bold f-9 ">5000</strong> /Mo</span> </p>
														<p class="r-lightItalic f-9 text-light private-hide">Private Office <span> <strong class="n-bold f-9">4000</strong>/Mo</span> </p>
													</div>
												</div> 
												<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
													<div class="category-type img-comntainer pt-xl-2 text-center pt-lg-2" >
														
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-brown border-brown">
															<p class="text-black n-bold f-20 text-center align-self-center mb-0">
																3.1
															</p>
														</div>
														{{-- <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
															<p class="text-black n-bold f-20 text-center align-self-center mb-0">
																3.0
															</p>
														</div>
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-gold border-gold">
															<p class="text-black n-bold f-20 text-center align-self-center mb-0">
																4.0
															</p>
														</div>--}}
													</div>
													<h6 class="r-boldItalic f-6 text-center text-light">Switch to Standard mode</h6>
													 <a class="btn btn-info n-bold f-6 text-muted rounded-0" href="#">EXPLORE</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3 col-md-6 col-sm-6 card-wrapper pr-sm-0" >
							<div class="card border-orange border-0">
								<div class="card-body">
									<div class="text-center img-rank" >
										<img src="{{ url('/img/card-banner.png') }}" class="img-fluid" alt="" />								
									</div>
									<div class="right-box w-100">
										<div class="card-text">
											<div class="d-flex justify-content-between flex-column flex-lg-row">
												<div class="card-text-left-box d-flex flex-column w-100">
													<div class="mb-2">
														<h4 class="n-bold text-dark text-uppercase">sushil more</h4>
														
															<span class="r-boldItalic f-9 text-light" style="display: block">Co-Live Space</span>
														
															
														
														
														
														<i class="r-lightItalic f-9">
														Daman, Daman and Diu, India</i>
													</div> 
													<div class="card-prices mt-auto pr-3">
														<h6 class="r-boldItalic f-9 text-light">Starting prices*</h6> 
														
														<p class="r-lightItalic f-9 text-light shared-hide">Shared Desks <span > <strong class="n-bold f-9 ">5000</strong> /Mo</span> </p>
														
														<p class="r-lightItalic f-9 text-light dedicated-hide">Dedicated Desks <span> <strong class="n-bold f-9"> 3000</strong>/Mo</span> </p>
 													
														<p class="r-lightItalic f-9 text-light private-hide">Private Office <span> <strong class="n-bold f-9">4000</strong>/Mo</span> </p>
														
														<p class="r-lightItalic f-9 text-light meeting-hide">Meeting Room <span> <strong class="n-bold f-9">1000</strong>/Mo</span> </p>
													</div>
												</div> 
												<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
													<div class="category-type img-comntainer pt-xl-4 text-center pt-lg-4" >
														
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-brown border-brown">
															<p class="text-black n-bold f-24 text-center align-self-center mb-0">
																3.1
															</p>
														</div>
													
														{{-- <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
															<p class="text-black n-bold f-24 text-center align-self-center mb-0">
																3.0
															</p>
														</div>
													
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-gold border-gold">
															<p class="text-black n-bold f-24 text-center align-self-center mb-0">
																4.0
															</p>
														</div>--}}
														
													</div>
													 <a class="btn btn-info n-bold f-6 text-muted rounded-0" href="#">EXPLORE</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3 col-md-6 col-sm-6 card-wrapper pr-sm-0" >
							<div class="card border-red border-0">
								<div class="card-body">
									<div class="text-center img-rank" >
										<img src="{{ url('img/placeholder-image.png') }}" class="img-fluid" alt="" />								
									</div>
									<div class="right-box w-100">
										<div class="card-text">
											<div class="d-flex justify-content-between flex-column flex-lg-row">
												<div class="card-text-left-box d-flex flex-column w-100">
													<div class="mb-2">
														<h4 class="n-bold text-dark text-uppercase">sushil more</h4>
														
														<span class="r-boldItalic f-9 text-light" style="display: block">Co-Live Space</span>
														
														
														
														<i class="r-lightItalic f-9">
														Daman, Daman and Diu, India</i>
													</div> 
													<div class="card-prices mt-auto pr-3">
														<h6 class="r-boldItalic f-9 text-light">Starting prices*</h6> 
														
														<p class="r-lightItalic f-9 text-light shared-hide">Shared Desks <span > <strong class="n-bold f-9 ">5000</strong> /Mo</span> </p>
														
														<p class="r-lightItalic f-9 text-light dedicated-hide">Dedicated Desks <span> <strong class="n-bold f-9"> 3000</strong>/Mo</span> </p>
 													
														<p class="r-lightItalic f-9 text-light private-hide">Private Office <span> <strong class="n-bold f-9">4000</strong>/Mo</span> </p>
														
														<p class="r-lightItalic f-9 text-light meeting-hide">Meeting Room <span> <strong class="n-bold f-9">1000</strong>/Mo</span> </p>
													</div>
												</div> 
												<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
													<div class="category-type img-comntainer pt-xl-4 text-center pt-lg-4" >
														
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-brown border-brown">
															<p class="text-black n-bold f-24 text-center align-self-center mb-0">
																3.1
															</p>
														</div>
													
														{{-- <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
															<p class="text-black n-bold f-24 text-center align-self-center mb-0">
																3.0
															</p>
														</div>
													
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-gold border-gold">
															<p class="text-black n-bold f-24 text-center align-self-center mb-0">
																4.0
															</p>
														</div>--}}
														
													</div>
													 <a class="btn btn-info n-bold f-6 text-muted rounded-0" href="#">EXPLORE</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3 col-md-6 col-sm-6 card-wrapper pr-sm-0" >
							<div class="card border-success border-0 coline-new-card">
								<div class="bg-success p-2 community-details">
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
									</div>
								</div>
								<div class="bg-danger p-2 mt-1 community-details">
									<div class="d-flex justify-content-between flex-column flex-lg-row ">
										<div class="card-text-left-box d-flex flex-column w-100">
											<h4 class="n-bold text-white f-14 text-uppercase">COMMUNITY NETWORK INDEX : 2.5</h4>
											<div class="card-prices mt-auto pr-3">
												<p class="r-lightItalic f-8 text-white mb-0">Size :<span > 3 People</span> </p>
												<p class="r-lightItalic f-8 text-white mb-0">Type :<span > Fairly Social</span> </p>
												<p class="r-lightItalic f-8 text-white mb-0">Interests :<span > Reading, Fitness, Cinema</span> </p>
											</div>
										</div> 
										<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-self-center"> 
											<img src="{{url('/img/co-living/cards/three-grp.svg')}}" class="grp-img">
										</div>
									</div>
								</div>
								<div class="bg-yellow p-2 mt-1 community-details">
									<div class="d-flex justify-content-between flex-column flex-lg-row ">
										<div class="card-text-left-box d-flex flex-column w-100">
											<h4 class="n-bold text-black f-14 text-uppercase">COMMUNITY NETWORK INDEX : 7.0</h4>
											<div class="card-prices mt-auto pr-3">
												<p class="r-lightItalic f-8 text-black mb-0">Size :<span > 3 People</span> </p>
												<p class="r-lightItalic f-8 text-black mb-0">Type :<span > Fairly Social</span> </p>
												<p class="r-lightItalic f-8 text-black mb-0">Interests :<span > Reading, Fitness, Cinema</span> </p>
											</div>
										</div> 
										<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-self-center"> 
											<img src="{{url('/img/co-living/cards/five-grp.svg')}}" class="grp-img">
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="right-box w-100">
										<div class="card-text">
											<div class="d-flex justify-content-between flex-column flex-lg-row">
												<div class="card-text-left-box d-flex flex-column w-100">
													<div class="mb-2">
														<span class="r-boldItalic f-9 text-light" style="display: block">1Bed/Room/Apt - 1BHK</span>
														<i class="r-lightItalic f-9">
														Daman, Daman and Diu, India</i>
													</div> 
													<div class="card-prices mt-auto pr-3">
														<h6 class="r-boldItalic f-9 text-light">Starting prices*</h6> 
														<p class="r-lightItalic f-9 text-light shared-hide">Shared Desks <span > <strong class="n-bold f-9 ">5000</strong> /Mo</span> </p>
														<p class="r-lightItalic f-9 text-light private-hide">Private Office <span> <strong class="n-bold f-9">4000</strong>/Mo</span> </p>
													</div>
												</div> 
												<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
													<div class="category-type img-comntainer pt-xl-2 text-center pt-lg-2" >
														
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-brown border-brown">
															<p class="text-black n-bold f-20 text-center align-self-center mb-0">
																3.1
															</p>
														</div>
														{{-- <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
															<p class="text-black n-bold f-20 text-center align-self-center mb-0">
																3.0
															</p>
														</div>
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-gold border-gold">
															<p class="text-black n-bold f-20 text-center align-self-center mb-0">
																4.0
															</p>
														</div>--}}
													</div>
													<h6 class="r-boldItalic f-6 text-center text-light">Switch to Standard mode</h6>
													 <a class="btn btn-info n-bold f-6 text-muted rounded-0" href="#">EXPLORE</a>
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
	<script type="text/javascript" src="{{url('front/vendor/fondation-datePicker/js/foundation-datepicker.js')}}"></script>
	
	<script src="{{url('front/vendor/datetime-picker/js/moment.js')}}" type="text/javascript" ></script>
	<script src="{{url('front/vendor/datetime-picker/js/datetime-picker.js')}}" type="text/javascript" ></script>

		{{-- <script src="https://maps.googleapis.com/maps/api/js?key={{Config('constant.GMAP_API_KEY')}}&libraries=places"></script> --}}
		<script
          src="https://maps.googleapis.com/maps/api/js?key={{Config('constant.GMAP_API_KEY')}}&callback=initAutocomplete&libraries=places"
          defer
        ></script>

		{{-- @include('front.colive.browse.scripts.slider-script')
		@include('front.colive.browse.scripts.search-script')	
		@include('front.colive.browse.scripts.meeting-search-script')	
		@include('front.google-location-tracing-script') --}}	

		<script type="text/javascript">
			$('.search-table ').on('keyup keypress', function(e) {
			  var keyCode = e.keyCode || e.which;
			  if (keyCode === 13) { 
			    e.preventDefault();
			    return false;
			  }
			});  		
		</script>
		
		{{-- <script>
  			var input = document.getElementById('place-autocomplete'); 
  			var autocomplete = new google.maps.places.Autocomplete(input);

  			$('.search-table ').on('keyup keypress', function(e) {
			  var keyCode = e.keyCode || e.which;
			  if (keyCode === 13) { 
			    e.preventDefault();
			    return false;
			  }
			});  		
		</script> --}}
@endsection
	