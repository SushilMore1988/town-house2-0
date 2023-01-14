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
		.cursor-pointer {
			cursor: pointer;
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
					<!-- <div class=""> -->
					<div class="slider slider-single border">
						<div class="card-listing-filter d-flex position-relative">
							<div id="map" style="width: 100%; height: calc(100vh - 190px)"></div>				  	  
							<div class="card d-none align-content-end topper-card single-card" style="min-height:auto; width: 43%;">
								<div class="card-body ">
									<div class="text-center img-rank" >
										<img src="{{url('img/2019_01_10_UI_10.png')}}" class="img-fluid w-100" alt="" id="cover_image"/>
									</div>
									<div class="right-box w-100">
										<div class="card-text">
											<div class="d-flex justify-content-between flex-column flex-lg-row">
												<div class="card-text-left-box d-flex flex-column ">
													<div class="mb-2">
														<h4 class="n-bold text-dark text-uppercase" id="co-work-space-name">{{-- THE THIRD SPACE --}}</h4>
														<i class="r-lightItalic f-9 text-light" id="co-work-space-address"></i>
													</div>
													<div class="card-prices mt-auto">
														<h6 class="r-boldItalic f-9 text-light">Starting prices*</h6>
														<p class="r-lightItalic f-9 text-light d-none" id="shared-line">Shared Desks
															<span > 
																<strong class="n-bold f-9">
																	<i class="currency"></i>
																	<span class="pr-0" id="shared-desk"></span>
																</strong>/Mo
															</span> 
														</p>
														<p class="r-lightItalic f-9 text-light d-none" id="dedicated-line" >Dedicated Desks 
															<span> 
																<strong class="n-bold f-9"> 
																	<i class="currency"></i>
																	<span class="pr-0" id="dedicated-desk"> </span>
																</strong>/Mo
															</span> 
														</p>
														<p class="r-lightItalic f-9 text-light d-none" id="private-line">Private Office 
															<span> 
																<strong class="n-bold f-9">
																	<i class="currency"></i>
																		<span class="pr-0" id="private-office"></span>
																</strong>/Mo
															</span> 
														</p>
														<p class="r-lightItalic f-9 text-light d-none" id="meeting-line">Meeting Room
															<span> 
																<strong class="n-bold f-9">
																	<i class="currency"></i>
																		<span class="pr-0" id="meeting-room"></span>
																</strong>/Mo
															</span> 
														</p>
													</div>
												</div>
												<div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
													<div class="category-type img-comntainer pt-xl-3 text-center pt-lg-4">
														<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver" id ="colorCategory">
															<p class="text-black n-bold text-center align-self-center mb-0 " style="font-size: 24px;"></p>
														   </div>
													   </div>
													{{-- <div class="img-comntainer pt-xl-4 text-center pt-lg-4">
														 <img src="./img/add-filter-list/bronze.jpg" alt="" />
													</div> --}}
													{{-- <button type="button" class="btn btn-info n-bold f-6 text-muted rounded-0">EXPLORE</button> --}}
													<a class="btn btn-info n-bold f-6 text-muted rounded-0 mt-3" id="explore">EXPLORE</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>  	   
						</div>
					</div>
					<div class="slider-3">
						
						<div class="slider slider-nav py-3">	
						 @foreach($coWorkSpaces as $coWorkSpace)	
						 @if(!empty($coWorkSpace->size['shared_desk']['pricing']) || !empty($coWorkSpace->size['dedicated_desk']['pricing']) || !empty($coWorkSpace->size['private_offices']['private_offices']) || !empty($coWorkSpace->size['meeting_rooms']['meeting_rooms']))
							<div class="slider1 position-relative px-1 infow co-work-space-card"  data-space-id = "{{$coWorkSpace->id}}"
								@if(!empty($coWorkSpace->address)) 
										data-address="{{$coWorkSpace->address['address']}}"
										data-latitude="{{$coWorkSpace->address['latitude']}}"
										data-longitude="{{$coWorkSpace->address['longitude']}}"
									@endif 
									data-category='{{ $coWorkSpace->color_category }}' 
									data-rating='{{ $coWorkSpace->admin_rating}}'
									@if( $coWorkSpace->size)
										@if( $coWorkSpace->size['shared_desk']['available'] != null || $coWorkSpace->size['shared_desk']['available'] > 0) 
											data-shared= true
											data-shared_capacity="{{ $coWorkSpace->size['shared_desk']['available'] }}"
											data-shared_month_price ="{{empty($coWorkSpace->size['shared_desk']['pricing']) ? 0 : $coWorkSpace->size['shared_desk']['pricing']['1 Month'] }}"
										@else
											data-shared= false
											data-shared_capacity= 0
											data-shared_month_price =0
										@endif
										@if( $coWorkSpace->size['dedicated_desk']['available'] != null || $coWorkSpace->size['dedicated_desk']['available'] > 0) 
											data-dedicated=true
											data-dedicated_capacity="{{ $coWorkSpace->size['dedicated_desk']['available'] }}"
											data-dedicated_month_price="{{empty($coWorkSpace->size['dedicated_desk']['pricing']) ? 0 : $coWorkSpace->size['dedicated_desk']['pricing']['1 Month'] }}"
										@else
											data-dedicated=false
											data-dedicated_capacity=0
											data-dedicated_month_price=0
										@endif
										@if($coWorkSpace->size['private_offices'])
											@if( !empty($coWorkSpace->size['private_offices']['private_offices'][1]['pricing']))
												data-private= true
												data-private_capacity="{{ $coWorkSpace->size['private_offices']['private_offices'][1]['capacity'] }}"
												data-private_month_price="{{ $coWorkSpace->size['private_offices']['private_offices'][1]['pricing']['1 Month'] }}"
											@else
												data-private= false
												data-private_capacity= 0
												data-private_month_price= 0
											@endif
										@endif
										@if( $coWorkSpace->size['meeting_rooms'])
											@if( !empty($coWorkSpace->size['meeting_rooms']['meeting_rooms'][1]['pricing']))
												data-meeting='true'
												data-meeting_capacity="{{ $coWorkSpace->size['meeting_rooms']['meeting_rooms'][1]['capacity'] }}"
												data-meeting_month_price="{{ $coWorkSpace->size['meeting_rooms']['meeting_rooms'][1]['pricing']['1 Month'] }}"
											@else
												data-meeting='false'
												data-meeting_capacity= 0
												data-meeting_month_price =0
											@endif
										@endif
									@endif>
								@if(!empty($coWorkSpace->images['banner']))
									<img src="{{url('img/cowork/banner/'.$coWorkSpace->images['banner'])}}" alt=""  class="w-auto h-100"/>
								@else
									<img src="url('img/placeholder-image.png')" class="img-fluid" alt="" />										
								@endif	
								{{-- {{ $coWorkSpace->id }} --}}
							  	{{-- <img src="{{url('front/img/add-filter-list/gold.png')}}" class="category-img" alt=""> --}}
							  	@if($coWorkSpace->color_category == 'bronze')
										<div class=" category-img ratings list-view-rating align-self-center d-flex justify-content-center bg-brown border-brown">
											<p class="text-black n-bold f-12 text-center align-self-center mb-0">
												@if(empty($coWorkSpace->admin_rating))
													0.0
												@elseif($coWorkSpace->admin_rating % 1 == 0)
													{{ $coWorkSpace->admin_rating.".0"}}
												@else
													{{ $coWorkSpace->admin_rating.".0"}}
												@endif
											</p>
										</div>
									@elseif($coWorkSpace->color_category == 'silver')
										<div class="category-img ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
											<p class="text-black n-bold f-12 text-center align-self-center mb-0">
												@if(empty($coWorkSpace->admin_rating))
													0.0
												@elseif($coWorkSpace->admin_rating % 1 == 0)
													{{ $coWorkSpace->admin_rating.".0"}}
												@else
													{{ $coWorkSpace->admin_rating.".0"}}
												@endif
											</p>
										</div>
									@elseif($coWorkSpace->color_category == 'gold')
										<div class=" category-img ratings list-view-rating align-self-center d-flex justify-content-center bg-gold border-gold">
											<p class="text-black n-bold f-12 text-center align-self-center mb-0">
												@if(empty($coWorkSpace->admin_rating))
													0.0
												@elseif($coWorkSpace->admin_rating % 1 == 0)
													{{ $coWorkSpace->admin_rating.".0"}}
												@else
													{{ $coWorkSpace->admin_rating.".0"}}
												@endif
											</p>
										</div>
									@endif
							</div>
							@endif
						@endforeach
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

	{{-- <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjDLRNg0HB3jgYjZt3HDTqZ0KFEiobAYc&callback=initAutocomplete&libraries=places"
          defer
        ></script> --}}

    <script
          src="https://maps.googleapis.com/maps/api/js?key={{Config('constant.GMAP_API_KEY')}}&callback=initMap&libraries=places"
          defer
        ></script>

	@include('front.cowork.browse.scripts.slider-script')
	{{-- @include('front.cowork.browse.scripts.search-script') --}}
	@include('front.cowork.browse.scripts.map-view-script')	
	@include('front.cowork.browse.scripts.map-search-script')
	@include('front.cowork.browse.scripts.map-meeting-search-script')
	
	{{-- @include('front.google-location-tracing-script') --}}
	<script type="text/javascript">
		$(document).ready(function(){
			$('.slider1').first().trigger('click');
		});
	</script>
@endsection

	