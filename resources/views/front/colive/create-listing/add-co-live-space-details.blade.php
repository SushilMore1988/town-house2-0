@extends('front.layouts.app')
@section('css')
<link rel="stylesheet" href="{{url('front/vendor/datetime-picker/css/datetime-picker.css')}}">
<link rel="stylesheet" href="{{url('front/vendor/custome-scroll/css/scroll.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/cropper/cropper.min.css') }}">
<link rel="stylesheet" href="{{url('front/vendor/datetime-picker/css/datetime-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('/front/bootstrap3-datepicker/bootstrap-glyphicons.css')}}">	


<style>
       /* Set the size of the div element that contains the map */
      #mapName {
        height: 400px;  /* The height is 400 pixels */
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
		  /*max-height: 220px;*/
		 max-height: calc(100vh - 538px);
		  /*width: 350px;*/
		  overflow: auto;
		}
		.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
		    position: relative;
		    width: 8px;
		    height: 100%;
		    margin: 0 auto;
		    -webkit-border-radius: 16px;
		    -moz-border-radius: 16px;
		    border-radius: 16px;
		    text-align: center;
		}
		.mCSB_scrollTools .mCSB_dragger{
			position: absolute;
		    min-height: 30px !important;
		    display: block;
		    height: 30px !important;
		    max-height: 70px !important;
		    /*top: 10px !important;
		    bottom:10px !important;*/
		}
		.mCS-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
		    background-color: #000;
		    /*background-color: rgba(0,0,0,.75);*/
		    background-color: #939598 !important;
		}
		.mCS-dark.mCSB_scrollTools .mCSB_draggerRail {
		    background-color: #000;
		    /*background-color: rgba(0,0,0,.15);*/
		    background-color: #a7aaac;
		    opacity: 0.5;
		    width: 1px !important;
		}
		.mCS-dark.mCSB_scrollTools .mCSB_draggerRail::before{
		   content: "";
		   position: absolute;
		   top:0px;
		   left: 5px;
		   width: 6px;
		   height: 6px;
		   border-radius: 50%;
		   background-color: #a7aaac;
		   display: block; 
		}
		.mCS-dark.mCSB_scrollTools .mCSB_draggerRail::after{
		   content: "";
		   position: absolute;
		   bottom:0px;
		   left: 5px;
		   width: 6px;
		   height: 6px;
		   border-radius: 50%;
		   background-color: #a7aaac;
		   display: block; 
		}
    </style>
@endsection
@section('content')
<section class="top-space create-listing-page">
		<div class="container h-100">
			<div class="justify-content-center align-self-center d-flex flex-column">
				<div class="row ">
					<div class="col-md-3">
					</div>
					<div class="col-md-9 col-sm-12 px-lg-5" >
						<h2 class="n-bold f-24 text-muted mb-0 pt-md-4 pt-sm-3 pt-5" id="dynamic-header">ABOUT YOUR SPACE</h2>
						<p class="r-lightItalic f-9 text-body" id="dynamic-message">Provide your accomodation details and generate a Specific Property Index (SPI). Let us know more about your property to get the best TH2.0 reviews and have an attractive page for providing information to the users.</p> 
					</div>
				</div>
				<div class="sub-division mt-md-3">
					@livewire('colive.edit-space', ['cls' => $cls], key($cls->id))
				</div>				
			</div>
		</div>
	</section>
@endsection

@section('js')	
	
	{{-- @jquery --}}
	
    
	<script>
		window.livewire.on('updateActiveSection', param => {
			Livewire.emit('setActiveSection', param['value']);
		});
	</script>
	<script type="text/javascript" src="{{url('/front/js/fileuploader-v1.js')}}"></script>
	<script type="text/javascript" src="{{ url('plugins/cropper/cropper.min.js') }}"></script>
	<script src="{{url('front/vendor/datetime-picker/js/datetime-picker.js')}}" type="text/javascript" ></script>
	{{-- @include('front.colive.create-listing.scripts.photo-script')
			@include('front.colive.create-listing.scripts.image-cropper-script')
			@include('front.colive.create-listing.scripts.about-script')
			@include('front.colive.create-listing.scripts.facilities-script')
			@include('front.colive.create-listing.scripts.package-script')
			
			@include('front.colive.create-listing.scripts.opening-hours-script')
			@include('front.colive.create-listing.scripts.size-script')
			@include('front.colive.create-listing.scripts.pricing-script')
			@include('front.colive.create-listing.scripts.terms-condition-script')
			@include('front.colive.create-listing.scripts.co-work-space-script')
			@include('front.colive.create-listing.scripts.email-verification-script') -}}

	<script type="text/javascript">
		function setDefaultPackageSelected(){
			if($('#selected-package-id').val().length <= 0){
				$('#selected-package-id').val(1);
				console.log('SET DEFAULT PACKAGE');
			}
		}
	   	setTimeout(function() {
	  	  $('.time-out-alert').fadeOut('fast');
		}, 3000); 

		$('.marketing-btn-next').click(function(){
			$('.sidebar a').removeClass('active show');
			$('.sidebar .left-package-tab').addClass('active show');

			$('.tab-pane').removeClass('active show');
			$('.package-tab').addClass('active show');
		});

		// $(".container-2").click(function(event) {
		//     this.removeAttribute("href");            
		//     anchorClicked("container-2");
		//   });
		$(function() {
		    $('input:radio').click(function(e) { 
		        e.stopPropagation();
		    });
		    // $('.main-anch').click(function(e) {
		    //     $('input:radio:first', this).attr("checked", true);
		    //     return false;
		    // });
		});
	</script>
   
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjDLRNg0HB3jgYjZt3HDTqZ0KFEiobAYc&libraries=places&callback"></script>
    {{-- @include('front.cowork.create-listing.scripts.location-script') --}}

    <script src="{{url('front/vendor/datetime-picker/js/moment.js')}}" type="text/javascript" ></script>
	<script src="{{url('front/vendor/datetime-picker/js/datetime-picker.js')}}" type="text/javascript" ></script>
	<script src="{{url('front/vendor/custome-scroll/js/scroll.js')}}" type="text/javascript" ></script>

@endsection
