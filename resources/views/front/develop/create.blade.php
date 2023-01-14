@extends('front.layouts.app')

@section('content')
	<section class="top-space pt-lg-5 pt-3 pb-4 under-construction">
		<div class="container">
			<div class="row">
				
				<div class="col-md-9 mx-auto text-center">

					<h2 class="n-bold f-24 text-muted mb-0 ">TELL US MORE ABOUT YOUR LISTING</h2>
					<p class="r-lightItalic f-9 text-body">What service would you like to have from us :   </p>
					@if ($message = Session::get('success'))
						<div class="alert alert-success" style="height: 40px; padding: 8pt;">
							{{$message}}
						</div>    
					@endif
				</div>
				<div class="col-lg-9 mx-auto">
					{{-- <form class="register-form pb-3 pt-3"> --}}
				  	{!! Form::open(['route'=>'property.store', 'files' => true]) !!}
					
						<p class="r-boldItalic f-9 text-body">Contact Details of the Person Representing the Property</p>
						<div class="d-block">
					  		{{-- <input type="text" name="name" class="form-control r-lightItalic f-9 " placeholder="Full Name"> --}}
					  		{!! Form::text('name', null, ['class' => 'form-control r-lightItalic f-9 ', 'placeholder' => 'Full Name']) !!}
					  		@if ($errors->has('name')) <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span> @endif
					  	</div>
					  	<div class="d-block">
					  		{{-- <input type="email" name="email" class="form-control r-lightItalic f-9 " placeholder="Email"> --}}
					  		{!! Form::email('email', null, ['class' => 'form-control r-lightItalic f-9 ', 'placeholder' => 'Email']) !!}
					  		@if ($errors->has('email')) <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span> @endif
					  	</div>
					  	<div class="d-block">
					  		{{-- <input type="text" name="phone" class="form-control r-lightItalic f-9 " placeholder="Phone Number"> --}}
					  		{!! Form::text('phone', null, ['class' => 'form-control r-lightItalic f-9 ', 'placeholder' => 'Phone Number']) !!}
					  		@if ($errors->has('phone')) <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('phone') }}</strong></span> @endif
					  	</div>
					  	<div class="d-block">
					  		{{-- <input type="text" name="city" class="form-control r-lightItalic f-9 " placeholder="City"> --}}
					  		{!! Form::text('city', null, ['class' => 'form-control r-lightItalic f-9 ', 'placeholder' => 'City']) !!}
					  		@if ($errors->has('city')) <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('city') }}</strong></span> @endif
					  	</div>
					  	<p class="r-boldItalic f-9 text-body pt-3">Let Us Know your Role at this space</p>
					  	<div class="form-group">
							<div class="row py-2">
						  		<div class="col-sm-3 col-6" >
						  			<label class="container-2 r-lightItalic f-9 check-label">Owner 
									  <input type="radio" checked="checked" name="role" value="owner">
									  <span class="checkmark"></span>
									</label>
						  		</div>
						  		<div class="col-sm-3 col-6">
						  			<label class="container-2 r-lightItalic f-9 check-label">Broker
									  <input type="radio" name="role" value="broker">
									  <span class="checkmark"></span>
									</label>
						  		</div>
						  		<div class="col-sm-3 col-6">
						  			<label class="container-2 r-lightItalic f-9 check-label">Care Taker
									  <input type="radio" name="role" value="care taker">
									  <span class="checkmark"></span>
									</label>
						  		</div>
						  		<div class="col-sm-3 col-6">
						  			<label class="container-2 r-lightItalic f-9 check-label">Guest User
									  <input type="radio" name="role" value="guest user">
									  <span class="checkmark"></span>
									</label>
						  		</div>
						  		@if ($errors->has('role')) <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('role') }}</strong></span> @endif
  							</div>
  						</div>
					  	<p class="r-boldItalic f-9 text-body pt-3">What service would you like from us ?</p>
					  	<div class="services">
						  	<div class="row  text-center mb-5">
						  		<div class="col-sm-4 ">
									<label for="co-living">
										<input class="" type="radio" name="service" id="co-living" value="colive-service">
										<div class="box d-flex flex-column">
											<img class="rounded mx-auto" src="../../img/co-living.svg" alt="co-living.svg">
											<h6 class="mt-auto check-label n-bold f-16">co-living</h6>
											<p class="check-label r-lightItalic f-8">Find me a personalised space</p>
										</div>
									</label>
								</div>
								<div class="col-sm-4 ">
									
									<label for="co-working" class="mx-auto">
										<input class="" type="radio" name="service" id="co-working" value="co-working-service">
										<div class="box  d-flex flex-column">
											<img class="rounded mx-auto" src="../../img/co-working.svg" alt="co-working.svg">
											<h6 class="mt-auto check-label n-bold f-16">co-working</h6>
											<p class="check-label r-lightItalic f-8">Find me a promising work venue</p>
										</div>
									</label>
								</div>
								<div class="col-sm-4 ">
									<label for="both">
										<input class="" type="radio" name="service" id="both" value="both-service">	
										<div class="box d-flex flex-column">
											<img class="rounded mx-auto" src="../../img/co-working.svg" alt="co-working.svg">
											<h6 class="mt-auto check-label n-bold f-16">both</h6>
											<p class="check-label r-lightItalic f-8">I would like to live near work</span></p>
										</div>
									</label>
								</div>
						  		@if ($errors->has('service')) <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('service') }}</strong></span> @endif

							</div>
						</div>
						<p class="r-boldItalic f-9 text-body">Address</p>
						<div class="d-block">
					  		{{-- <input type="text" name="Address" class="form-control r-lightItalic f-9 " placeholder="Address"> --}}
					  		{!! Form::text('address', null, ['class' => 'form-control r-lightItalic f-9 ', 'placeholder' => 'Address']) !!}
					  		@if ($errors->has('address')) <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('address') }}</strong></span> @endif
					  	</div>
					  	<div class="d-block">
					  		{{-- <input type="email" name="Pincode" class="form-control r-lightItalic f-9 " placeholder="Pincode"> --}}
					  		{!! Form::text('pincode', null, ['class' => 'form-control r-lightItalic f-9 ', 'placeholder' => 'Pincode']) !!}
					  		@if ($errors->has('pincode')) <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('pincode') }}</strong></span> @endif

					  	</div>
					  	<p class="r-boldItalic f-9 text-body pt-3">Upload images of your property and the surrounding to help us visalise your space better.</p>
					  	<div class="form-group border pt-4 pl-4">
						  	<div class="uploaded-img">
								<ul class="d-flex flex-wrap pl-0">
									<li class="border drag-container upload" id="upload-container">
										<img src="{{url('/img/plus-sign.svg')}}" class="img-fluid w-100" alt="" />
									</li>
								</ul>
							</div>
						</div>
					  	<div class="row pt-sm-4 pt-3 mt-sm-4">
							<div class="col-6 ">
								<button type="button" class="btn btn-success n-bold f-9 rounded-0 w-100">Back</button>
							</div>
							<div class="col-6 ">
								<button type="submit" {{-- onclick="window.location.href='thank-you.html';" --}} class="btn btn-success n-bold f-9 rounded-0 ml-md-2 w-100">Submit</button>
							</div>
						</div>
					{!! Form::close() !!}	
				</div>
			</div>
		</div>
		<!-- <img src="../../img/under-construction-banner.png"  class="w-100"> -->
	</section>
@endsection

@section('js')	
	<script src="{{ url('front/js/main.js') }}" type="text/javascript" charset="utf-8" async defer></script>
	<script type="text/javascript" src="{{url('/plugins/fileupload/fileuploader-v1.js')}}"></script>
	<script type="text/javascript">
		$('#upload-container').fileuploader({
			multiple: true,
			name: 'files[]',
			uploadUrl: 'ajax-upload-develop-your-property-images',
			deleteUrl: 'ajax-delete-develop-your-property-images',
			csrfToken: '{{csrf_token()}}',				
		});
	</script>
@endsection