@extends('front.layouts.app')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{url('front/vendor/slick-slider/css/slick.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('front/vendor/slick-slider/css/slick-theme.css')}}">
	<link rel="stylesheet" href="{{url('front/vendor/fondation-datePicker/css/foundation-datepicker.css')}}">
	<link rel="stylesheet" href="{{url('front/vendor/datetime-picker/css/datetime-picker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('front/vendor/price-ranger/css/price-ranger.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('/front/bootstrap3-datepicker/bootstrap-glyphicons.css')}}">	
	<style type="text/css" media="screen">
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
		.cursor-pointer {
			cursor: pointer;
		}
		.pac-container {
			z-index: 1111;
		}
	</style>
@endsection

@section('content')
	@include('front.cowork.browse.search-bar')
	<section class="card-listing-filter-wrapper min-height-section">
		<div class="container">
			<div class="row py-4">
				@include('front.cowork.browse.filters-side-bar')
				<div id="main" class="main col-md-8 px-md-0 pt-md-0 pt-5">
					<div class="row">
						<div class="col-md-6">
							@if($coWorkSpaces->count() > 0)
								<p class="r-lightItalic f-9 check-label">We Found <span id="foundCounter"></span> Location, that matches your search Preference. </p>
							@else
								<p class="r-lightItalic f-9 check-label">We didn't found any co-working spaces for you.</p>
							@endif
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
						@foreach($coWorkSpaces as $cws)
							<x-co-work-space.card :cws="$cws" class="mb-3 col-md-6 col-sm-6 card-wrapper pr-sm-0" />
						@endforeach
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

		@include('front.cowork.browse.scripts.slider-script')
		@include('front.cowork.browse.scripts.search-script')	
		@include('front.cowork.browse.scripts.meeting-search-script')	
		@include('front.google-location-tracing-script')	

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
	