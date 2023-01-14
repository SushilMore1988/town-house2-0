@extends('front.layouts.app')
@section('content')
	<section class="top-space pt-lg-5 pt-3 under-construction">
		<div class="container">
			<div class="row">
				<div class="col-md-9 mx-auto text-center">					
					<!-- <img src="{{url('/img/under-construction-logo.svg')}}" alt="" class="under-construction-img"> -->
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60.32 74.34" class="home-page-logo under-construction-img"><defs><style>.cls-11{fill:#fff;stroke:#010201;stroke-width:0.16px;}.cls-11,.cls-15{stroke-miterlimit:10;}.cls-12,.cls-15{fill:none;}.cls-13,.cls-14,.cls-15,.cls-16{isolation:isolate;}.cls-14,.cls-15{font-size:21.65px;}.cls-14{fill:#b2b2b3;}.cls-14,.cls-15,.cls-16{font-family:nevis-Bold, nevis;font-weight:700;}.cls-15{stroke:#010101;stroke-width:0.04px;}.cls-16{font-size:6.4px;fill:#999;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-11" x="0.08" y="0.08" width="60.16" height="60.16"/><rect class="cls-12" x="12.75" y="10.32" width="34.8" height="39.66"/><g class="cls-13"><text class="cls-14" transform="translate(13.92 26.16)">TH </text><text class="cls-15" transform="translate(13.92 26.16)">TH </text><text class="cls-14" transform="translate(12.93 49.77)">2.0</text><text class="cls-15" transform="translate(12.93 49.77)">2.0</text></g><text class="cls-16" transform="translate(0.08 73) scale(1.04 1)">TOWNHOUSE 2.0</text></g></g></svg>
					<h2 class="n-bold f-24 text-muted mb-0 pt-2">WE ARE UNDER CONSTRUCTION</h2>
					<p class="r-lightItalic f-9 text-body">TH2.0 is currently in their final stages of development. This technology is available for listing properties only. If you’re interested in co-living or co-working, you could Reach us by providing your contact details below and TH2.0 Team would be happy to serve and provide you personalised solutions. </p>
				</div>
			</div>
		</div> {{-- {{dd($errors->all())}} --}}
		<div class="banner-image" style="background: url('{{url('/img/under-construction-banner.png')}}'); background-size: cover; background-repeat: none; "></div>
		<div class="container py-5">
			<div class="row">
				<div class="col-md-9 mx-auto text-center">
					<h2 class="n-bold f-24 text-muted mb-0 pt-2">CONTACT US</h2>
					<p class="r-lightItalic f-9 text-body">What service would you like to have from us :  </p>
				</div>
				<div class="col-lg-9 mx-auto">
					{{-- <form class="register-form pb-3 pt-3"> --}}
				  	{!! Form::open(['route'=>'contact.store', 'onsubmit' => 'return validateInput()']) !!}
						<p class="r-boldItalic f-9 text-body">Contact Details of the Person Representing the Property</p>
						<div class="d-block">
					  		{{-- <input type="text" name="name" class="form-control r-lightItalic f-9 " placeholder="Full Name"> --}}
					  		{!! Form::text('name', null, ['class' => 'form-control r-lightItalic f-9 ', 'placeholder' => 'Full Name', 'id' => 'name', 'required' => 'required']) !!}
					  		<div id="name_error" class="text-danger">
					  				@if ($errors->has('name')) <span class="invalid-feedback"  role="alert"><strong>{{ $errors->first('name') }}</strong></span> @endif
					  		</div>
					  	</div>
					  	<div class="d-block">
					  		{{-- <input type="email" name="email" class="form-control r-lightItalic f-9 " placeholder="Email"> --}}
					  		{!! Form::email('email', null, ['class' => 'form-control r-lightItalic f-9 ', 'placeholder' => 'Email', 'id' => 'email', 'required' => 'required']) !!}
					  		<div id="email_error" class="text-danger">
					  			@if ($errors->has('email')) <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span> @endif
					  		</div>	
					  	</div>
					  	<div class="d-block">
					  		{{-- <input type="text" name="phone" class="form-control r-lightItalic f-9 " placeholder="Phone Number"> --}}
					  		{!! Form::text('phone', null, ['class' => 'form-control r-lightItalic f-9 ', 'placeholder' => 'Phone Number', 'id' => 'phone', 'required' => 'required']) !!}
					  		<div id="phone_error" class="text-danger">
					  			@if ($errors->has('phone')) <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('phone') }}</strong></span> @endif
					  		</div>	
					  	</div>
					  	<div class="d-block">
					  		{{-- <input type="text" name="city" class="form-control r-lightItalic f-9 " placeholder="City"> --}}
					  		{!! Form::text('city', null, ['class' => 'form-control r-lightItalic f-9 ', 'placeholder' => 'City', 'id' => 'city', 'required' => 'required']) !!}
					  		<div id="city_error" class="text-danger">
					  			@if ($errors->has('city')) <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('city') }}</strong></span> @endif
					  		</div>	
					  	</div>
					  	<p class="r-boldItalic f-9 text-body pt-3">What service would you like from us ?</p>
					  	<div class="services">
						  	<div class="row  text-center mb-5">
						  		<div class="col-sm-4 ">
									<label for="co-living">
										<input class="" type="radio" name="service" id="co-living" value="colive-service">
										<div class="box d-flex flex-column">
											<img class="rounded mx-auto" src="{{url('/img/co-living.svg')}}" alt="co-living.svg">
											<h6 class="mt-auto check-label n-bold f-16">co-living</h6>
											<p class="check-label r-lightItalic f-8">Find me a personalised space</p>
										</div>
									</label>
								</div>
								<div class="col-sm-4 ">
									
									<label for="co-working" class="mx-auto">
										<input class="" type="radio" name="service" id="co-working" value="cowork-service">
										<div class="box  d-flex flex-column">
											<img class="rounded mx-auto" src="{{url('/img/co-working.svg')}}" alt="co-working.svg">
											<h6 class="mt-auto check-label n-bold f-16">co-working</h6>
											<p class="check-label r-lightItalic f-8">Find me a promising work venue</p>
										</div>
									</label>
								</div>
								<div class="col-sm-4 ">
									<label for="both">
										<input class="" type="radio" name="service" id="both" value="both-service">	
										<div class="box d-flex flex-column">
											<img class="rounded mx-auto" src="{{url('/img/co-working.svg')}}" alt="co-working.svg">
											<h6 class="mt-auto check-label n-bold f-16">both</h6>
											<p class="check-label r-lightItalic f-8">I would like to live near work</span></p>
										</div>
									</label>
								</div>
								<div id="service_error" class="text-danger">
									@if ($errors->has('service')) <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('service') }}</strong></span> @endif	
								</div>	
							</div>
						</div>
				  	
					  	<div class="row pt-sm-4 pt-3 mt-sm-4">
							<div class="col-6 ">
								<button type="button" class="btn btn-success n-bold f-9 rounded-0 w-100">Back</button>
							</div>
							<div class="col-6 ">
								<button type="submit" class="btn btn-success n-bold f-9 rounded-0 ml-md-2 w-100">Submit</button>
							</div>
						</div>
					{!! Form::close() !!}	
					{{-- </form> --}}
				</div>
				
			</div>
		</div>
		<!-- <img src="../img/under-construction-banner.png"  class="w-100"> -->
	</section>	
@endsection

@section('js')
	<script type="text/javascript">
		function validateInput() {
			var name = document.getElementById('name').value;
			var email = document.getElementById('email').value;
			var phone = document.getElementById('phone').value;
			var city = document.getElementById('city').value;

			if(name == "" || name == null){
				document.getElementById('name_error').innerHTML = 'name field is required';
				return false;
			}
			else if(email == "" || email == null){
				document.getElementById('email_error').innerHTML = 'email field is required';
				return false;
			}
			else if(phone == "" || phone == null){
				document.getElementById('phone_error').innerHTML = 'phone field is required';
				return false;
			}
			else if(city == "" || city == null){
				document.getElementById('city_error').innerHTML = 'city field is required';
				return false;
			}
			else{
				return true;
			}
		}
	</script>
@endsection