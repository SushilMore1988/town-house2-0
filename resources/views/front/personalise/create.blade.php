@extends('front.layouts.app')

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('/front/bootstrap3-datepicker/datetime-picker.css')}}">
	{{-- <link rel="stylesheet" type="text/css" href="{{url('/plugins/datetime-picker/css/datetime-picker.css')}}"> --}}

	<link rel="stylesheet" type="text/css" href="{{url('/front/bootstrap3-datepicker/bootstrap-glyphicons.css')}}">	
	<style type="text/css">
		.bootstrap-datetimepicker-widget table td {
		     text-align: left; 
		    /*border-radius: 4px;*/
		}
		.bootstrap-datetimepicker-widget table td span {
			text-align: center;
		}
		.bootstrap-datetimepicker-widget table thead tr:first-child th {
		   font-family: "nevis-bold", sans-serif;
		}
		.bootstrap-datetimepicker-widget.dropdown-menu {
			padding: 15px 5px;
			display: block;
		    margin: 2px 0;
		    /*padding: 4px;*/
		    width: 20em;
		    border-radius: 17px;
		}
		.glyphicon {
		    border: 1px solid #ccc;
		    padding: 6px 7px 8px 7px;
		    border-radius: 50%;
		}
		.bootstrap-datetimepicker-widget table td.day {
		    text-align: center;
		}
		.bootstrap-datetimepicker-widget table th {
		    text-align: center;
		}
	</style>
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
												<h6 class="mb-0 text-uppercase text-live-text n-bold f-9 tab-clicked">{{auth()->user()->fname}} {{auth()->user()->lname}}</h6>
											</div>
											<div class="col-md-3 text-right">
												<a href="#">
													<img src="{{url('/img/co-living/edit-icon.png')}}" alt="edit icon" class="edit-icon">
												</a>
											</div>
										</div>
										<div class="row">
											<div class="col-md-9 text-left align-self-center">
												@php
													$from = new DateTime(auth()->user()->dob);
													$to   = new DateTime('today');
												@endphp
												<h6 class="mb-0 text-live-text r-lightItalic f-8 tab-clicked">{{auth()->user()->gender}} ( {{$from->diff($to)->y}} )</h6>
												@if(auth()->user()->personalise()->exists())
												<h6 class="mb-0 text-live-text r-lightItalic f-8 tab-clicked">{{auth()->user()->personalise->profession}} ( {{auth()->user()->personalise->marital_status}} )</h6>
												@endif
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
													<h6 class="mb-0 text-live-text r-lightItalic f-8 tab-clicked">Completion Status : {{$gi_per}}</h6>
													@if(auth()->user()->personalise()->exists())
													<h6 class="mb-0 text-live-text r-boldItalic f-8 tab-clicked">{{auth()->user()->personalise->marital_status}}, {{$from->diff($to)->y}} Years Old</h6>
													@else
													<h6 class="mb-0 text-live-text r-boldItalic f-8 tab-clicked">{{$from->diff($to)->y}} Years Old</h6>
													@endif
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
													<h6 class="mb-0 text-live-text r-lightItalic f-8 tab-clicked">Completion Status : {{$lp_per}}</h6>
													@if(auth()->user()->locationPreference()->exists())
													<h6 class="mb-0 text-live-text r-boldItalic f-8 tab-clicked">{{auth()->user()->locationPreference->time_of_daily_commute}} Minutes ( One Way ) by {{auth()->user()->locationPreference->getModeOfCommute()}}</h6>
													@endif
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
													<h6 class="mb-0 text-live-text r-lightItalic f-8 tab-clicked">Completion Status : {{$sp_per}}</h6>
													@if(auth()->user()->spatialPreference()->exists())
													<h6 class="mb-0 text-live-text r-boldItalic f-8 tab-clicked">{{auth()->user()->spatialPreference->max_members}} People sharing {{auth()->user()->spatialPreference->getSharing()}}</h6>
													@endif
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
													<h6 class="mb-0 text-live-text r-lightItalic f-8 tab-clicked">Completion Status : {{$sop_per}}</h6>
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
								@livewire('personalise.general-information')
							</div>
							<div class="tab-pane fade mt-auto" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
								@livewire('personalise.location-preference')
							</div>
							<div class="tab-pane fade mt-auto" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
								@livewire('personalise.spatial-preference')
							</div>
							<div class="tab-pane fade mt-auto" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
								@livewire('personalise.social-preference')
							</div>
						</div>
					</div>
				</div>
				<div class="row pb-4">
					<div class="col-md-4 clearfix pt-md-0 pt-5 ">
						<button type="button" class="btn btn-primary n-bold f-14 my-3 w-100 rounded-0 save-btn gisaveaquit" id="gisaveaquit">SAVE AND QUIT</button>
						<button type="button" class="btn btn-primary n-bold f-14 my-3 w-100 rounded-0 save-btn lpsaveaquit d-none" id="lpsaveaquit">SAVE AND QUIT</button>
						<button type="button" class="btn btn-primary n-bold f-14 my-3 w-100 rounded-0 save-btn spsaveaquit d-none" id="spsaveaquit">SAVE AND QUIT</button>
						<button type="button" class="btn btn-primary n-bold f-14 my-3 w-100 rounded-0 save-btn sopsaveaquit d-none" id="sopsaveaquit">SAVE AND QUIT</button>
					</div>
					<div class="col-md-8 pt-md-0 pt-5">
						<button type="button" class="btn btn-primary n-bold f-14 my-3 w-100 rounded-0 save-btn gisaveaconti" id="gisaveaconti">SAVE AND CONTINUE</button>
						<button type="button" class="btn btn-primary n-bold f-14 my-3 w-100 rounded-0 save-btn lpsaveaconti d-none" id="lpsaveaconti">SAVE AND CONTINUE</button>
						<button type="button" class="btn btn-primary n-bold f-14 my-3 w-100 rounded-0 save-btn spsaveaconti d-none" id="spsaveaconti">SAVE AND CONTINUE</button>
						<button type="button" class="btn btn-primary n-bold f-14 my-3 w-100 rounded-0 save-btn sopsaveaconti d-none" id="sopsaveaconti">SAVE AND CONTINUE</button>
					</div>
				</div>
			</div>
		</div>
    </section>
@endsection

@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="{{url('/plugins/datetime-picker/js/moment.js')}}"></script>
<script type="text/javascript" src="{{url('/plugins/datetime-picker/js/datetime-picker.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function () {
		@if(!empty($warningMsg))
			toastr.error('{{ $warningMsg }}');
		@endif
		$('#dob').datetimepicker({
			format: 'YYYY-MM-DD',
			viewMode: 'years',
			maxDate: new Date('{{ date('Y-m-d', strtotime('- 16 year')) }}'),
		}).on('dp.change', function(e){
			Livewire.emit("selectDate", e.target.value)
		});
	});
	$('.minus').click(function() {
		var num = parseInt($(this).parent().find('input[type=hidden]').val());
		if(isNaN(num)){
			num = 0;
		}
		if(num > 0) {
			var addOne = 1;
			var addition = parseInt(num) - 1;
			$(this).parent().find('.num-text').text(addition);
			$(this).parent().find('input[type=hidden]').val(addition)
			return false;
		};
	});

	$('.plus').click(function() {
		var num = parseInt($(this).parent().find('input[type=hidden]').val());
		if(isNaN(num)){
			num = 0;
		}
		if(num >= 0) {
			var addOne = 1;
			var addition = parseInt(num) + 1;
			$(this).parent().find('.num-text').text(addition);
			$(this).parent().find('input[type=hidden]').val(addition)
			return false;
		};
	});

	$(document).on('click', '#v-pills-home-tab', function(){
		$('.save-btn').removeClass('d-none');
		$('.save-btn').addClass('d-none');
		$('#gisaveaquit').removeClass('d-none');
		$('#gisaveaconti').removeClass('d-none');
	});

	$(document).on('click', '#v-pills-profile-tab', function(){
		$('.save-btn').removeClass('d-none');
		$('.save-btn').addClass('d-none');
		$('#lpsaveaquit').removeClass('d-none');
		$('#lpsaveaconti').removeClass('d-none');
	});

	$(document).on('click', '#v-pills-messages-tab', function(){
		$('.save-btn').removeClass('d-none');
		$('.save-btn').addClass('d-none');
		$('#spsaveaquit').removeClass('d-none');
		$('#spsaveaconti').removeClass('d-none');
	});

	$(document).on('click', '#v-pills-settings-tab', function(){
		$('.save-btn').removeClass('d-none');
		$('.save-btn').addClass('d-none');
		$('#sopsaveaquit').removeClass('d-none');
		$('#sopsaveaconti').removeClass('d-none');
	});

	$(document).on('click', '#gisaveaconti', function(){
		$('#save-gi-input').trigger('click');
	});
	$(document).on('click', '#gisaveaquit', function(){
		$('#save-gi-input').trigger('click');
	});

	$(document).on('click', '#lpsaveaquit', function(){
		$('#save-lp-input').trigger('click');
	});
	$(document).on('click', '#lpsaveaconti', function(){
		$('#save-lp-input').trigger('click');
	});
	
	$(document).on('click', '#spsaveaquit', function(){
		$('#save-sp-input').trigger('click');
	});
	$(document).on('click', '#spsaveaconti', function(){
		$('#save-sp-input').trigger('click');
	});

	$(document).on('click', '#sopsaveaquit', function(){
		$('#save-sop-input').trigger('click');
	});
	$(document).on('click', '#sopsaveaconti', function(){
		$('#save-sop-input').trigger('click');
	});

	$(document).on('click', '.rate-checkbox', function(){
		var checkValue = parseInt($(this).val());
		$(this).parent().parent('.row').find('.rating_value').val(checkValue);
		$(this).closest('.rate-div').find('input[type=checkbox]').each(function(){
			$(this).prop('checked', false);
		});
		$(this).closest('.rate-div').find('input[type=checkbox]').each(function(){
			$(this).prop('checked', true);
			if(checkValue == $(this).val()){
				return false;
			}
		});
	});

	$(document).on('keyup', 'input[type=text][name=intrest]', function(){
		var search_intrest = $(this).val().trim().toLowerCase();
		$('.pi_div').each(function(){
			$(this).addClass('d-none');
		});
		$('.pi_div').each(function(){
			if($(this).data('name').includes(search_intrest)){
				$(this).removeClass('d-none');
			}
		});
	});

	$(document).on('keyup', 'input[type=text][name=social_intrest]', function(){
		var search_intrest = $(this).val().trim().toLowerCase();
		$('.si_div').each(function(){
			$(this).addClass('d-none');
		});
		$('.si_div').each(function(){
			if($(this).data('name').includes(search_intrest)){
				$(this).removeClass('d-none');
			}
		});
	});
	/** google map autocompleted */
	// This sample uses the Places Autocomplete widget to:
	// 1. Help the user select a place
	// 2. Retrieve the address components associated with that place
	// 3. Populate the form fields with those address components.
	// This sample requires the Places library, Maps JavaScript API.
	// Include the libraries=places parameter when you first load the API.
	let autocomplete;
	let address1Field;

	let shipautocomplete;
	let shipaddress1Field;

	function initAutocomplete() {
		shipaddress1Field = document.querySelector("#currenct_work_location_2");
		address1Field = document.querySelector("#currenct_work_location_1");
		
		// Create the autocomplete object, restricting the search predictions to
		// addresses in the US and Canada.
		autocomplete = new google.maps.places.Autocomplete(address1Field, {
		  componentRestrictions: { country: [] },
		  fields: ["address_components", "geometry"],
		  types: ["address"],
		});
		address1Field.focus();
	
		// When the user selects an address from the drop-down, populate the
		// address fields in the form.
		autocomplete.addListener("place_changed", fillInAddress);

		shipautocomplete = new google.maps.places.Autocomplete(shipaddress1Field, {
		  componentRestrictions: { country: [] },
		  fields: ["address_components", "geometry"],
		  types: ["address"],
		});
		shipaddress1Field.focus();
	
		// When the user selects an address from the drop-down, populate the
		// address fields in the form.
		shipautocomplete.addListener("place_changed", fillInShipAddress);
	  }

	  function fillInAddress() {
		const place = autocomplete.getPlace();
		const geocoder = new google.maps.Geocoder();
		const address = document.getElementById("currenct_work_location_1").value;
		geocoder.geocode({ address: address }, (results, status) => {
		if (status === "OK") {
					Livewire.emit('updateBillAddress', results);
		} else {
			alert("Geocode was not successful for the following reason: " + status);
		}
		});
	  }

	function fillInShipAddress() {
		const place = shipautocomplete.getPlace();
		const geocoder = new google.maps.Geocoder();
		const address = document.getElementById("currenct_work_location_2").value;
		geocoder.geocode({ address: address }, (results, status) => {
		if (status === "OK") {
					Livewire.emit('updateShipAddress', results);
		} else {
			alert("Geocode was not successful for the following reason: " + status);
		}
		});
	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjDLRNg0HB3jgYjZt3HDTqZ0KFEiobAYc&libraries=places&callback=initAutocomplete"></script>
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjDLRNg0HB3jgYjZt3HDTqZ0KFEiobAYc&libraries=places&callback"></script> --}}
@endsection
