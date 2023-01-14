@extends('front.layouts.app')

@section('css')
	
	<style>
		.btn-warning {
		    color: #212529;
		    background-color: #ffc107 !important;
		    border-color: #ffc107 !important;
		}
		.emailOtp, .phoneOtp{
			font-family: "nevis-bold", sans-serif;
		}
		.modal{
			background-color: rgba(0,0,0,0.6);

		}
		.modal .modal-dialog{
			position: absolute;
		    top: 50%;
		    left: 50%;
		    transform: translate(-50%, -50%);
		}
	</style>
@endsection

@section('content')
	@if(Session::has('message'))
		<input type="hidden" name="message" id="message" value="{{ Session::get('message') }}">
	@endif
	<section class="top-space listing-dashboard">
		<div class=" border-bottom">
			<div class="container">
				<div class="row">
					<div class="col-12 text-center pb-3 pt-4">
						@if(Auth::user()->profile_image != null)
                                <img src="{{url('img/user/profile-image/'.Auth::user()->profile_image)}}" class="img-fluid dashboard-profile">
                            @else
                                <img src="{{url('img/user-profile.png')}}" class="img-fluid dashboard-profile">
                            @endif 
						<h2 class="n-bold f-24 text-muted mb-0 pt-md-4 pt-4 text-uppercase">HI {{Auth::user()->fname}}</h2>
						<p class="r-lightItalic f-9 text-body">Here is the dashboard for your previous / upcoming events and your <br class="d-md-block d-none">progress with TH2.0 </p> 
					</div>
				</div>
			</div>
		</div>
		<div class=" border-bottom update-profile pb-4 pt-3">
			<div class="container">
				<h2 class="n-bold f-24 text-muted mb-0 py-md-4 pt-4 text-center text-uppercase">Verification Details</h2>
					<!-- <div class="form-group">
						{{-- {!! Form::open(['id'=>'profilePhoto', 'files'=>true]) !!} --}}
							<label for="profile-image">Profile Image:</label>
							<input type="file" name="profile-image" id="profile-image">
						{{-- {!! Form::close() !!}	 --}}
					</div>
					<div class="form-group">
						{{-- {!! Form::open(['id'=>'governmentId', 'files'=>true]) !!} --}}
							<label for="government-id">Government ID:</label>
							<input type="file" name="government-id" id="government-id">
						{{-- {!! Form::close() !!}	 --}}
					</div> -->
					<div class="row">
						<div class="col-lg-6">
							

							<div class="form-group ">
								{!! Form::open(['id'=>'selfiePhoto', 'class' => 'w-100', 'files'=>true]) !!}
								<label for="selfie-image" class=" text-left mb-0 align-self-center r-italic f-9 text-body">Your Photograph (Recognisable Image/ Passport Photograph):</label>
								
								<div class="uploaded-img">
									<ul class="d-flex flex-wrap pl-0">
										@if(!empty(Auth::user()->images) && !empty(Auth::user()->images['selfie']) && !empty(Auth::user()->images['selfie']['name']))
										<li class="border position-relative">
											@if(Auth::user()->images['selfie']['is_approved'] == '1')
												<div class="overlay position-absolute d-flex justify-content-center">
													<i class="far fa-check-circle float-right text-success"></i>
												</div>
											@endif
											@if(Auth::user()->images['selfie']['is_approved'] == '0')
												<div class="overlay position-absolute d-flex justify-content-center">
													<i class="far fa-times-circle float-right text-danger delete-photo" title="Your document is rejected by admin. Please upload new or contact admin."></i>
												</div>
											@endif
											@if(Auth::user()->images['selfie']['is_approved'] == 'Pending Approval')
												<div class="overlay position-absolute d-flex justify-content-center">
													<i class="far fa-times-circle float-right text-danger delete-photo" title="Your document not yet verified. You can update the document." style="cursor: pointer"></i>
												</div>
											@endif
											<img src="{{url('img/user/selfie/'.Auth::user()->images['selfie']['name'])}}" alt="" class="h-100 w-auto" style="max-width: 84px">
										</li>
										@else
										<input type="file" class="custom-file-input w-100 form-control rounded-0 d-none" id="selfie-image" name="selfie-image">
										<li class="border drag-container" id="photograph" @if(!empty(Auth::user()->images['selfie']['is_approved']) && Auth::user()->images['selfie']['is_approved'] == '1') title="Your profile is alreday approved. If you upload new document then it will send for approval again." @endif >
											<div class="progress d-none" id="official-photo-progress" style="height: 0.6rem; font-size: 0.5rem; margin-top:38px;">
												<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
											  </div>
											<img src="{{url('/img/plus-sign.svg')}}" class="img-fluid w-100" alt="" />
										</li>
										@endif
									</ul>
								</div>
								
								{{-- <div class="custom-file  text-left rounded-0">
								    
								    <label class="custom-file-label rounded-0" for="selfie-image">Choose file</label>
								</div>
								<div class="progress d-none" id="official-photo-progress" style="height: 0.6rem; font-size: 0.5rem">
								  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
								</div> --}}
								{!! Form::close() !!}	
							</div>
						</div>
						<div class="col-lg-6 ">
							<div class="form-group">
								{!! Form::open(['id'=>'governmentFormId', 'class' => 'w-100', 'files'=>true]) !!}
									<label for="government-id" class="text-left mb-0 align-self-center r-italic f-9 text-body">Two ID Proofs (Adhar, Passport, Driving Licence, Pancard):</label>
									<div class="uploaded-img">
										<ul class="flex-wrap pl-0 d-inline-block" style="display: inline-block;">
											@if(!empty(Auth::user()->images) && !empty(Auth::user()->images['government_id']) && !empty(Auth::user()->images['government_id'][0]['name']))
											<li class="border position-relative">
												@if(Auth::user()->images['government_id'][0]['is_approved'] == '1')
													<div class="overlay position-absolute d-flex justify-content-center">
														<i class="far fa-check-circle float-right text-success "></i>
													</div>
												@endif
												@if(Auth::user()->images['government_id'][0]['is_approved'] == '0')
													<div class="overlay position-absolute d-flex justify-content-center">
														<i class="far fa-times-circle float-right text-success " title="Your document rejected by admin. Please uploade new or contact admin."></i>
													</div>
												@endif
												@if(Auth::user()->images['government_id'][0]['is_approved'] == 'Pending Approval')
													<div class="overlay position-absolute d-flex justify-content-center">
														<i class="far fa-times-circle float-right text-danger delete-gov-id" data-gov-doc="0" style="cursor: pointer" title="Your document not yet verified, You can update the document."></i>
													</div>
												@endif
												<img src="{{url('img/user/government-id/'.Auth::user()->images['government_id'][0]['name'])}}" alt="" class="h-100 w-auto" style="max-width: 84px">
											</li>
											@else
											<input type="file" class="custom-file-input w-100 d-none government-ids" id="government-id1" name="government-id1">
											<li class="border drag-container gov-id" @if(!empty(Auth::user()->images['government_id'][0]['is_approved']) && Auth::user()->images['government_id'][0]['is_approved'] == '1') title="Your profile is alreday approved. If you upload new document then it will send for approval again." @endif >
												<div class="progress d-none gov-id-progress" style="height: 0.6rem; font-size: 0.5rem; margin-top:38px;">
													<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
												  </div>					
												<img src="{{url('/img/plus-sign.svg')}}" class="img-fluid w-100" alt="" />
											</li>	
											@endif							
										</ul>

										<ul class="flex-wrap pl-0 d-inline-block" style="display: inline-block;">
											@if(!empty(Auth::user()->images) && !empty(Auth::user()->images['government_id']) && !empty(Auth::user()->images['government_id'][1]['name']))
											<li class="border position-relative">
												@if(Auth::user()->images['government_id'][1]['is_approved'] == '1')
													<div class="overlay position-absolute d-flex justify-content-center">
														<i class="far fa-check-circle float-right text-success "></i>
													</div>
												@endif
												@if(Auth::user()->images['government_id'][1]['is_approved'] == '0')
													<div class="overlay position-absolute d-flex justify-content-center">
														<i class="far fa-times-circle float-right text-success " title="Your document rejected by admin. Please uploade new or contact admin."></i>
													</div>
												@endif
												@if(Auth::user()->images['government_id'][1]['is_approved'] == 'Pending Approval')
													<div class="overlay position-absolute d-flex justify-content-center">
														<i class="far fa-times-circle float-right text-danger delete-gov-id" data-gov-doc="1" style="cursor: pointer" title="Your document not yet verified, You can update the document."></i>
													</div>
												@endif
												<img src="{{url('img/user/government-id/'.Auth::user()->images['government_id'][1]['name'])}}" alt="" class="h-100 w-auto" style="max-width: 84px">
											</li>
											@else
											<input type="file" multiple class="custom-file-input w-100 d-none government-ids" name="government-id2">
											<li class="border drag-container gov-id" @if(!empty(Auth::user()->images['government_id'][1]['is_approved']) && Auth::user()->images['government_id'][1]['is_approved'] == '1') title="Your profile is alreday approved. If you upload new document then it will send for approval again." @endif >
												<div class="progress d-none gov-id-progress" style="height: 0.6rem; font-size: 0.5rem; margin-top:38px;">
													<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
												  </div>					
												<img src="{{url('/img/plus-sign.svg')}}" class="img-fluid w-100" alt="" />
											</li>
											@endif								
										</ul>
									</div>
									

										{{-- <div class="custom-file  text-left ">
										    <input type="file" class="custom-file-input w-100" id="government-id" name="government-id">
										    <label class="custom-file-label rounded-0" for="government-id">Choose file</label>
										</div>
										<div class="progress d-none" id="gov-id-progress" style="height: 0.6rem; font-size: 0.5rem">
										  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
										</div> --}}
								{!! Form::close() !!}	
							</div>
						</div>
					</div>
					{{-- {!! Form::open() !!} --}}
						
				  	<div class="row">
				  		<div class="col-lg-6">
				  			<label for="email" class="text-left mb-0 align-self-center r-italic f-9 text-body">Email:</label>
				  			<div class="input-group mb-3 position-relative">
								{!! Form::email('email', Auth::user()->email, ['class' => ' form-control rounded-9 commonClass mb-0','aria-label' => 'Input group example', 'id' => 'email'] ) !!}
								<div id="email_verify_div">
									
								  	@if(Auth::user()->email_verified != null)
										<div class="input-group-append btn-success" >
										    <!-- <i toggle="#password-field" class=" input-group-text btn-success f-8 n-bold">verified</i> -->
										    <!-- <img src="{{url('/img/SVG_Cowork/verified-svg.svg')}}" class="img-fluid verify-img"> -->
										    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41"><defs><style>.cls-51{fill:#00a651;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-52{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-51" x="0.01" y="0.01" width="87.27" height="22.4"/><text class="cls-52" transform="translate(20.48 15.42)">VERIFIED</text></g></g></svg>
										</div>
										
									@else

										{{-- <div class="input-group-append btn-warning" >
										    <i toggle="#password-field" class=" input-group-text btn-warning f-8 email_verify n-bold" id="email_verify">verify</i>
										</div> --}}
										<div class="input-group-append btn-warning email_verify" id="email_verify" style="cursor: pointer;">
										    <i class="email-loader d-none input-group-text btn-warning f-8 email_verify n-bold" >
										    	<div class="spinner-border text-white spinner-border-sm mx-auto" role="status">
												  <span class="sr-only">Loading...</span>
												</div>
										    </i>
										    <svg id="email-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41"><defs><style>.cls-41{fill:#f90;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-42{isolation:isolate;font-size:11px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}@import url("https://www.urbanfonts.com/fonts/nevis_Bold.font");</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-41" width="87.27" height="22.4"/><text class="cls-42" transform="translate(24.45 15.41)">VERIFY</text></g></g></svg> 
										</div>
									@endif
								</div>
					  			@if ($errors->has('email')) 
					  	  			<div class="invalid-feedback d-block mt-1">	
					  					{{ $errors->first('email') }}
					  				</div>
					  			@endif
					  		</div>
				  		</div>
				  		<div class="col-lg-6">
				  			<label for="email" class="text-left mb-0 align-self-center r-italic f-9 text-body">Phone:</label>
				  			<div class="input-group mb-3 position-relative">
								{!! Form::text('phone', Auth::user()->phone, ['class' => 'form-control','aria-label' => 'Input group example', 'id' => 'phone'] ) !!}
									<div id="phone_verify_div">
										@if(Auth::user()->phone_verified != null)
											<div class="input-group-append btn-success">
											    <!-- <i toggle="#password-field" class=" input-group-text btn-success f-8 n-bold">verified</i> -->
											    <!-- <img src="{{url('/img/SVG_Cowork/verified-svg.svg')}}" class="img-fluid verify-img"> -->
											    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41"><defs><style>.cls-51{fill:#00a651;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-52{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-51" x="0.01" y="0.01" width="87.27" height="22.4"/><text class="cls-52" transform="translate(20.48 15.42)">VERIFIED</text></g></g></svg>
											</div>
										@else
											<div class="input-group-append btn-warning phone_verify" id="phone_verify" style="cursor: pointer;">
												<i class="phone-loader d-none input-group-text btn-warning f-8 email_verify n-bold" >
											    	<div class="spinner-border text-white spinner-border-sm mx-auto" role="status">
													  <span class="sr-only">Loading...</span>
													</div>
											    </i>
										    	
										    	<svg id="phone-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41"><defs><style>.cls-41{fill:#f90;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-42{isolation:isolate;font-size:11px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}@import url("https://www.urbanfonts.com/fonts/nevis_Bold.font");</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-41" width="87.27" height="22.4"/><text class=" cls-42" transform="translate(24.45 15.41)">VERIFY</text></g></g></svg>
											</div>
										@endif
									</div>
						  			@if ($errors->has('phone')) 
						  	  			<div class="invalid-feedback d-block mt-1">	
						  					{{ $errors->first('phone') }}
						  				</div>
						  			@endif
							</div>	
				  		</div>
				  	</div>
				  	{{-- <div class="text-center mt-4">
				  		<button type="button" class="btn btn-success n-bold f-6 rounded-0 mx-auto text-center d-inline-block justify-content-center">Update</button>
				  	</div> --}}
					
					{{-- {!! Form::close() !!} --}}
					</div>
				</div>
			</div>
		</div>
		
		@if(count($coWorkSpaces) > 0)
		<div class="main-listing body-color pt-md-4 pt-0 border-bottom pb-4">
			<div class="container ">
				<h2 class="n-bold f-24 text-muted mb-0 pt-md-0 pt-5 text-center">CO-WORK LISTING DASHBOARD</h2>
				<p class="r-lightItalic f-9 text-body text-center">Get all your listing details and their growth since listed on TH2.0 </p>
				@if ($message = Session::get('success'))
					<div class="alert-success">
						{{$message}}
					</div>
				@endif
				<div class="row pt-md-3 pt-4 card-listing-filter card-listing-filter-dashboard"> 
					@foreach($coWorkSpaces as $coWorkSpace)
					<div class="col-xl-4 col-lg-4 col-sm-6 mb-2 pb-md-0 pb-4 pr-sm-0">
						<div class="card bg-white border rounded-0">
							<div class="card-body p-0">
								<div class="text-center img-rank position-relative">
									<div class="dropdown position-absolute">
										<div class="bg-color rounded-6 shadow-sm" data-toggle="dropdown">
											<i class="fas fa-ellipsis-h text-success "></i>
										</div>
										<div class="dropdown-menu py-0 dropdown-menu-right" style="z-index: 999;min-width: 10rem;">
											@if($account_verified != 'verified')
											    @php
													Session::put('message' ,$message);
												@endphp
												<a href="{{ route($route) }}" class="dropdown-item r-boldItalic f-9 text-dark py-2">Verify Account</a>
											@endif
											@if($coWorkSpace->is_approved == "pending approval")
												<button class="dropdown-item r-boldItalic f-9 text-dark py-2">
												Pending Approval</button>	
											@else
												@if($account_verified == 'verified')
												{!! Form::open(['route' => [ 'co-work.change.status', $coWorkSpace->id,'name' => 'form' ] ]) !!}
													<input type="hidden" name="status" class="status" value="">
													@if($coWorkSpace->status != config("constant.CO_WORK.STATUS.PUBLISED"))
												    <button class="dropdown-item r-boldItalic f-9 text-dark publish-button py-2" value="{{config("constant.CO_WORK.STATUS.PUBLISED")}}" >
												    Publish</button>
												    @else
												    <button class="dropdown-item r-boldItalic f-9 text-dark publish-button py-2" value="{{config("constant.CO_WORK.STATUS.UNPUBLISED")}}">Unpublish</button>
												    @endif
												{!! Form::close() !!}
											    
												@endif
											@endif
											<button type="button" class="dropdown-item r-boldItalic f-9 text-dark py-2 deleteBtn" data-value="{{ $coWorkSpace->id }}">Delete</button>
										</div>
									</div>
									@if($coWorkSpace->images['banner'])
									<img src="{{url('/img/cowork/banner/'.$coWorkSpace->images['banner'])}}" class="img-fluid card-image-top" alt="" />
									@else									
                                        <img src="{{url('img/placeholder-image.png')}}" class="img-fluid card-image-top w-100" alt="{{ $coWorkSpace->name }}" />                                        
									{{-- <img src="{{url('/front/img/2019_01_10_UI_10.png')}}" class="img-fluid card-image-top" alt="" > --}}
									@endif
									<div class="position-absolute eye-wrapper">
										<a href="{{route('front.explore',$coWorkSpace->slug)}}" target="_blank" ><i class="fas fa-eye text-info"></i></a>
									</div>
									{{-- {{url('/')}}/img/profile/{{$user->photographer->profile_image}} --}}
								</div>
								<div class="d-flex justify-content-between  flex-md-row flex-sm-column flex-row pt-2">
									<div class="card-prices pr-3">
									 	<h5 class="f-16 text-dark n-bold mb-0 text-uppercase">{{$coWorkSpace->name}}</h5>
										<div class="description">
											<p class="text-light r-lightItalic f-8 p-0">@if(!empty($coWorkSpace->address)) {{ substr($coWorkSpace->address['address'], 0, 30)}}@endif
												</p>
										</div>
										<h6 class="r-boldItalic f-8 text-light mb-0">Current Subscription : <span class="r-lightItalic"> 
											@if($coWorkSpace->cwsPackages()->count() > 0) 
											{{-- {{ dd($coWorkSpace->cwsPackage->package) }} --}}
												{{$coWorkSpace->cwsPackages->last()->package->package_name}}
											@endif
										</span></h6>
									</div>
									<div class="card-text-right-box d-flex align-items-start pt-3 pt-lg-0"> 
										 {{-- <div class="img-comntainer text-center">
										 	<img src="{{ url('/img/add-filter-list/silver.jpg') }}" alt="">
										 </div> --}}
										<div class="category-type img-comntainer pt-xl-4 text-center pt-lg-4" >
											@if($coWorkSpace->color_category == 'bronze')
												<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-brown border-brown">
													<p class="text-black n-bold f-24 text-center align-self-center mb-0">
														{{number_format($coWorkSpace->admin_rating,1)}}
														{{-- @if($coWorkSpace->admin_rating != 0 && ($coWorkSpace->admin_rating % 1) == 0)
															{{ $coWorkSpace->admin_rating}}.0
														@else
															{{ $coWorkSpace->admin_rating}}
														@endif --}}
													</p>
												</div>
											@elseif($coWorkSpace->color_category == 'silver')
												<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
													<p class="text-black n-bold f-24 text-center align-self-center mb-0">
														{{number_format($coWorkSpace->admin_rating,1)}}
														{{-- @if($coWorkSpace->admin_rating != 0 && ($coWorkSpace->admin_rating % 1) == 0)
															{{ $coWorkSpace->admin_rating}}.0
														@else
															{{ $coWorkSpace->admin_rating}}
														@endif --}}
													</p>
												</div>
											@elseif($coWorkSpace->color_category == 'gold')
												<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-gold border-gold">
													<p class="text-black n-bold f-24 text-center align-self-center mb-0">
														{{number_format($coWorkSpace->admin_rating,1)}}
														{{-- @if($coWorkSpace->admin_rating != 0 && ($coWorkSpace->admin_rating % 1) == 0)
															{{ $coWorkSpace->admin_rating}}.0
														@else
															{{ $coWorkSpace->admin_rating}}
														@endif --}}
													</p>
												</div>
											@endif
										</div>
									</div>									
								</div>
								<div class="d-md-flex d-sm-block d-flex mt-xl-3 mt-lg-2 mt-md-0 pt-xl-0 pt-5 pt-sm-2">
					  				{{-- <button type="button" class="btn btn-info n-bold f-6 text-muted rounded-0 w-100" href={{route('co-work.edit',$coWorkSpace->id)}}>EDIT LISTING</button> --}}
					  				<a class="btn btn-info n-bold f-6 text-muted rounded-0 w-100" href={{route('co-work-space.edit',$coWorkSpace->slug)}}>EDIT LISTING</a>
					  				{{-- <a href="{{route('co-work-space.edit',[$coWorkSpace->slug, 'package'])}}" class="btn btn-success n-bold f-6 rounded-0 ml-md-2 ml-sm-0 ml-2 mt-md-0 mt-sm-2 mt-0 w-100">UPGRADE PACKAGE</a>	 --}}
					  				<a href="{{route('co-work-space.upgrade-package',[$coWorkSpace->slug])}}" class="btn btn-success n-bold f-6 rounded-0 ml-md-2 ml-sm-0 ml-2 mt-md-0 mt-sm-2 mt-0 w-100">UPGRADE PACKAGE</a>	
					  			</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		@endif

		@if(count($coLiveSpaces) > 0)
		<div class="main-listing body-color pt-md-4 pt-0 border-bottom pb-4">
			<div class="container ">
				<h2 class="n-bold f-24 text-muted mb-0 pt-md-0 pt-5 text-center">CO-LIVE LISTING DASHBOARD</h2>
				<p class="r-lightItalic f-9 text-body text-center">Get all your listing details and their growth since listed on TH2.0 </p>
				{{-- @if ($message = Session::get('success'))
					<div class="alert-success">
						{{$message}}
					</div>
				@endif --}}
				<div class="row pt-md-3 pt-4 card-listing-filter card-listing-filter-dashboard"> 
					@foreach($coLiveSpaces as $coLiveSpace)
					<div class="col-xl-4 col-lg-4 col-sm-6 mb-2 pb-md-0 pb-4 pr-sm-0">
						<div class="card bg-white border rounded-0">
							<div class="card-body p-0">
								<div class="text-center img-rank position-relative">
									<div class="dropdown position-absolute">
										<div class="bg-color rounded-6 shadow-sm" data-toggle="dropdown">
											<i class="fas fa-ellipsis-h text-success "></i>
										</div>
										<div class="dropdown-menu py-0 dropdown-menu-right" style="z-index: 999;min-width: 10rem;">
											@if($account_verified != 'verified')
											    @php
													Session::put('message' ,$message);
												@endphp
												<a href="{{ route($route) }}" class="dropdown-item r-boldItalic f-9 text-dark py-2">Verify Account</a>
											@endif
											@if($coLiveSpace->is_approved == "pending approval")
												<button class="dropdown-item r-boldItalic f-9 text-dark py-2">
												Pending Approval</button>	
											@else
												@if($account_verified == 'verified')
												{!! Form::open(['route' => [ 'co-work.change.status', $coLiveSpace->id,'name' => 'form' ] ]) !!}
													<input type="hidden" name="status" class="status" value="">
													@if($coLiveSpace->status != config("constant.CO_WORK.STATUS.PUBLISED"))
												    <button class="dropdown-item r-boldItalic f-9 text-dark publish-button py-2" value="{{config("constant.CO_WORK.STATUS.PUBLISED")}}" >
												    Publish</button>
												    @else
												    <button class="dropdown-item r-boldItalic f-9 text-dark publish-button py-2" value="{{config("constant.CO_WORK.STATUS.UNPUBLISED")}}">Unpublish</button>
												    @endif
												{!! Form::close() !!}
											    
												@endif
											@endif
											<button type="button" class="dropdown-item r-boldItalic f-9 text-dark py-2 deleteBtn" data-value="{{ $coLiveSpace->id }}">Delete</button>
										</div>
									</div>
									@if(!empty($coLiveSpace->images) && $coLiveSpace->images['banner'])
									<img src="{{url('/img/cowork/banner/'.$coLiveSpace->images['banner'])}}" class="img-fluid card-image-top" alt="" />
									@else									
                                        <img src="{{url('img/placeholder-image.png')}}" class="img-fluid card-image-top w-100" alt="{{ $coLiveSpace->name }}" />                                        
									{{-- <img src="{{url('/front/img/2019_01_10_UI_10.png')}}" class="img-fluid card-image-top" alt="" > --}}
									@endif
									<div class="position-absolute eye-wrapper">
										<a href="{{route('front.explore',$coLiveSpace->slug)}}" target="_blank" ><i class="fas fa-eye text-info"></i></a>
									</div>
									{{-- {{url('/')}}/img/profile/{{$user->photographer->profile_image}} --}}
								</div>
								<div class="d-flex justify-content-between  flex-md-row flex-sm-column flex-row pt-2">
									<div class="card-prices pr-3">
									 	<h5 class="f-16 text-dark n-bold mb-0 text-uppercase">{{$coLiveSpace->name}}</h5>
										<div class="description">
											<p class="text-light r-lightItalic f-8 p-0">@if(!empty($coLiveSpace->address)) {{ substr($coLiveSpace->address['address'], 0, 30)}}@endif
												</p>
										</div>
										<h6 class="r-boldItalic f-8 text-light mb-0">Current Subscription : <span class="r-lightItalic"> 
											@if($coLiveSpace->cwsPackage) 
											{{$coLiveSpace->cwsPackage->package->package_name}}
											@endif
										</span></h6>
									</div>
									<div class="card-text-right-box d-flex align-items-start pt-3 pt-lg-0"> 
										 {{-- <div class="img-comntainer text-center">
										 	<img src="{{ url('/img/add-filter-list/silver.jpg') }}" alt="">
										 </div> --}}
										<div class="category-type img-comntainer pt-xl-4 text-center pt-lg-4" >
											@if($coLiveSpace->color_category == 'bronze')
												<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-brown border-brown">
													<p class="text-black n-bold f-24 text-center align-self-center mb-0">
														{{number_format($coLiveSpace->admin_rating,1)}}
														{{-- @if($coLiveSpace->admin_rating != 0 && ($coLiveSpace->admin_rating % 1) == 0)
															{{ $coLiveSpace->admin_rating}}.0
														@else
															{{ $coLiveSpace->admin_rating}}
														@endif --}}
													</p>
												</div>
											@elseif($coLiveSpace->color_category == 'silver')
												<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
													<p class="text-black n-bold f-24 text-center align-self-center mb-0">
														{{number_format($coLiveSpace->admin_rating,1)}}
														{{-- @if($coLiveSpace->admin_rating != 0 && ($coLiveSpace->admin_rating % 1) == 0)
															{{ $coLiveSpace->admin_rating}}.0
														@else
															{{ $coLiveSpace->admin_rating}}
														@endif --}}
													</p>
												</div>
											@elseif($coLiveSpace->color_category == 'gold')
												<div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-gold border-gold">
													<p class="text-black n-bold f-24 text-center align-self-center mb-0">
														{{number_format($coLiveSpace->admin_rating,1)}}
														{{-- @if($coLiveSpace->admin_rating != 0 && ($coLiveSpace->admin_rating % 1) == 0)
															{{ $coLiveSpace->admin_rating}}.0
														@else
															{{ $coLiveSpace->admin_rating}}
														@endif --}}
													</p>
												</div>
											@endif
										</div>
									</div>									
								</div>
								<div class="d-md-flex d-sm-block d-flex mt-xl-3 mt-lg-2 mt-md-0 pt-xl-0 pt-5 pt-sm-2">
					  				{{-- <button type="button" class="btn btn-info n-bold f-6 text-muted rounded-0 w-100" href={{route('co-work.edit',$coLiveSpace->id)}}>EDIT LISTING</button> --}}
					  				<a class="btn btn-info n-bold f-6 text-muted rounded-0 w-100" href={{route('co-live-space.edit',$coLiveSpace->slug)}}>EDIT LISTING</a>
					  				{{-- <a href="{{route('co-work-space.edit',[$coLiveSpace->slug, 'package'])}}" class="btn btn-success n-bold f-6 rounded-0 ml-md-2 ml-sm-0 ml-2 mt-md-0 mt-sm-2 mt-0 w-100">UPGRADE PACKAGE</a>	 --}}
					  				<a href="{{route('co-work-space.upgrade-package',[$coLiveSpace->slug])}}" class="btn btn-success n-bold f-6 rounded-0 ml-md-2 ml-sm-0 ml-2 mt-md-0 mt-sm-2 mt-0 w-100">UPGRADE PACKAGE</a>	
					  			</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		@endif

		@if(count($coWorkSpaceBookings) > 0)
		<div class="booking-listing py-4 border-bottom">
			<div class="container">
				<h2 class="n-bold f-24 text-muted mb-0 pt-md-0 pt-5 text-center">MY BOOKINGS</h2>
				<p class="r-lightItalic f-9 text-body text-center">Get a timeline list of all the venues and events you booked via TH2.0</p>
				<div class="row pt-md-3 pt-4 card-listing-filter ">
					@foreach($coWorkSpaceBookings as $coWorkSpaceBooking)
					@if($coWorkSpaceBooking->cws)
						<div class="col-xl-4 col-lg-4 col-sm-6 mb-2 pb-md-0 pb-4 pr-sm-0">
							{{-- @if($coWorkSpaceBooking->coWorkSpacePayment) --}}
								<div class="card bg-white border rounded-0 {{ $coWorkSpaceBooking->status == 'success' || $coWorkSpaceBooking->status == 'Success' ? 'border-bottom-green' : 'border-bottom-red'}}">
							
								<div class="card-body p-0">
									<div class="text-center img-rank">
										@if(!empty($coWorkSpaceBooking->cws->images['banner']))
											<img src="{{url('/img/cowork/banner/'.$coWorkSpaceBooking->cws->images['banner'])}}" class="img-fluid" alt="" />
										@else
											<img src="url('img/placeholder-image.png')" class="img-fluid" alt="{{ $coWorkSpaceBooking->cws->name }}" />										
										@endif	
									</div>
									
									<div class="d-flex justify-content-between  flex-row pt-2">	
										<div class="card-prices">
											<h5 class="f-16 text-dark n-bold mb-0 text-uppercase">{{ $coWorkSpaceBooking->cws->name }}</h5>
											<div class="description">
												<p class="text-light r-lightItalic f-9 p-0">
													@if(!empty($coWorkSpaceBooking->cws->address)){{substr($coWorkSpaceBooking->cws->address['address'], 0, 30)}}@endif</p>
											</div>
										</div>
										<div class="card-text-right-box  pt-3 pt-lg-0 align-self-center"> 
											{{--  <div class="img-comntainer text-center">
											 	<img src="{{ url('/img/add-filter-list/bronze.jpg') }}" alt="">
											 </div> --}}
											 <a  href="{{route('front.explore',$coWorkSpaceBooking->cws->slug)}}" class="btn btn-info n-bold f-6 text-muted rounded-0">EXPLORE</a>

										</div>	
									</div>
									{{-- @if($coWorkSpaceBooking->$coWorkSpace->coWorkSpacePrice || $coWorkSpaceBooking->$coWorkSpace->coWorkSpaceSize) --}}
										{{-- <h6 class="r-boldItalic f-9 text-light mb-0">Starting Prices*</h6> --}}
										{{-- @if( $coWorkSpaceBooking->$coWorkSpace->coWorkSpaceSize->shared_desk_count != null || $coWorkSpaceBooking->$coWorkSpace->coWorkSpaceSize->shared_desk_count > 0) --}}
										@if($coWorkSpaceBooking)
											<div class="d-flex justify-content-between w-100 pr-2">
												<p class="f-8 r-lightItalic text-light mb-0">Booking Date </p> 
												<p class="f-8 r-lightItalic pl-1 mb-0">{{ date('jS F Y', strtotime($coWorkSpaceBooking->start_date)) }}</p>
										{{-- @endif --}}
											</div>
											<div class="d-flex justify-content-between w-100 pr-2">
												<p class="f-8 r-lightItalic text-light mb-0">Booking Created On</p> 
												<p class="f-8 r-lightItalic pl-1 mb-0">{{ $coWorkSpaceBooking->created_at->format('jS F Y') }}</p>
											</div>
											<div class="d-flex justify-content-between w-100 pr-2">
												{{-- @if($coWorkSpaceBooking->coWorkSpacePayment)
												<p class="f-8 r-lightItalic text-light mb-0">Transaction Status : </p> 
													<p class="f-8 r-lightItalic pl-1 mb-0">{{ $coWorkSpaceBooking->coWorkSpacePayment->status }}</p>
												@else
												<p class="f-8 r-lightItalic text-light mb-0">Transaction Status : </p> 
													<p class="f-8 r-lightItalic pl-1 mb-0"> Canceled </p>
												@endif --}}
												{{-- <a href="{{ route('payment',$coWorkSpaceBooking) }}" class="btn btn-success n-bold f-6 rounded-0 ml-md-2 ml-sm-0 ml-2 mt-md-0 mt-sm-2 mt-0 w-100">Pay Now</a> --}}	
											</div>
											{{-- @if($coWorkSpaceBooking->status == 'Available')
											<div class="d-flex justify-content-between w-100 pr-2">
												{!! Form::open(['route' => 'co-work-space.payment']) !!}
												<!-- <button type="button" class="btn green-btn"></button> -->
												{!! Form::hidden('bookingId',$coWorkSpaceBooking->id) !!}
												{!! Form::hidden('price', $coWorkSpaceBooking->total) !!}
												{!! Form::hidden('title', 'Booking Co-working space') !!}
												<button type="submit" class="btn btn-success n-bold f-9 rounded-0 w-100"> Pay Now </button>
												{!! Form::close() !!}
											</div>
											@elseif($coWorkSpaceBooking->status == 'success')
												<div class="d-flex justify-content-between w-100 pr-2">
												<p class="f-8 r-lightItalic text-light mb-0">Status </p> 
												<p class="f-8 r-lightItalic pl-1 mb-0">Payment done successfully</p>
												</div>
											@else
												<div class="d-flex justify-content-between w-100 pr-2">
												<p class="f-8 r-lightItalic text-light mb-0">Status </p> 
												<p class="f-8 r-lightItalic pl-1 mb-0">Requested For Check Availablity</p>
											</div>
											@endif --}}
											<div class="d-flex justify-content-between w-100 pr-2">
												<p class="f-8 r-lightItalic text-light mb-0">Payment Status </p> 
												<p class="f-8 r-lightItalic pl-1 mb-0">{{ $coWorkSpaceBooking->status }}</p>
											</div>
										@endif
									{{-- 	<div class="d-flex justify-content-between w-100 pr-2">
											<p class="f-8 r-lightItalic text-light mb-0">Private Desks</p> 
											<p class="f-8 r-lightItalic pl-1 mb-0"><span class="n-bold f-8"><i class="fas fa-rupee-sign "></i>12000 </span> /Mo</p>
										</div> --}}
									{{-- @endif --}}
										{{-- </div>
																		
									</div> --}}
								</div>
							</div>
						</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
		@endif
		{{-- <div class="main-listing body-color pt-4 border-bottom pb-4">
			<div class="container ">
				<h2 class="n-bold f-24 text-muted mb-0 pt-md-0 pt-5 text-center">RECENT UPDATES</h2>
				<p class="r-lightItalic f-9 text-body text-center">Learn analytical facts about your recent activities and your listed spaces </p>
				<div class="row pt-4">
					<div class="col-12">
						<div class="border py-md-5 py-3 bg-white px-md-5 px-3">
							<div class="media mb-4">
							  <div class="media-body " >
							    <p class="r-lightItalic f-9 text-body">Your Listed Space <span class="r-boldItalic">THE THIRD SPACE </span>was the most trending co-working space in Baner, Pune last<br class="d-md-block d-none"> week. Boost your working space and attract more users with <span class="r-boldItalic">TH2.0</span></p>
							  </div>
							  <img class="ml-3 graph" src="{{url('/img/SVG_Cowork/recent-update-graph.svg')}}" alt="Generic placeholder image">
							</div>
							<div class="media my-4">
							  <div class="media-body " >
							    <p class="r-lightItalic f-9 text-body">Your Listed Space <span class="r-boldItalic">THE THIRD SPACE </span>was the most trending co-working space in Baner, Pune last<br class="d-md-block d-none"> week. Boost your working space and attract more users with <span class="r-boldItalic">TH2.0</span></p>
							  </div>
							  <img class="ml-3 graph" src="{{url('/img/SVG_Cowork/recent-update-fire.svg')}}" alt="Generic placeholder image">
							</div>
							<div class="media my-4">
							  <div class="media-body " >
							    <p class="r-lightItalic f-9 text-body">Your Listed Space <span class="r-boldItalic">THE THIRD SPACE </span>was the most trending co-working space in Baner, Pune last<br class="d-md-block d-none"> week. Boost your working space and attract more users with <span class="r-boldItalic">TH2.0</span></p>
							  </div>
							  <img class="ml-3 graph" src="{{url('/img/SVG_Cowork/recent-update-eyes.svg')}}" alt="Generic placeholder image">
							</div>
							<div class="media mt-4">
							  <div class="media-body " >
							    <p class="r-lightItalic f-9 text-body">Your Listed Space <span class="r-boldItalic">THE THIRD SPACE </span>was the most trending co-working space in Baner, Pune last<br class="d-md-block d-none"> week. Boost your working space and attract more users with <span class="r-boldItalic">TH2.0</span></p>
							  </div>
							  <img class="ml-3 graph" src="{{url('/img/SVG_Cowork/recent-update-eyes.svg')}}" alt="Generic placeholder image">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
	</section>
@endsection

@section('js')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
    
    @include('front.cowork.dashboard.script.dashboard')
    @include('front.cowork.dashboard.script.verification-script')
	<script type="text/javascript">
		$(".custom-file-input").on("change", function() {
		  	var fileName = $(this).val().split("\\").pop();
		  	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});
		$('.publish-button').on('click', function(e){
			// document.getElementById("select_test_id").value = $('.publish-button').val();
			var stat = $(this).val();
			$('.status').val(stat);
			document.getElementByTagName('form').submit();
			});

		   	setTimeout(function() {
		  	  $('.alert-success').fadeOut('fast');
			}, 3000); 

			$('#profile-image').on('change',function(){ 
				$("#profilePhoto").submit(); 
			});

			$('#profilePhoto').on('submit',(function(e) {  
		        e.preventDefault();
        		var url = "{{route('profile.image')}}";
		        $.ajax({
		        	headers: {
		                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		            },
		            type:'POST',
		            url: url,
		            data: new FormData(this),
		            dataType: 'JSON',
		            cache: false,
		            contentType: false,
		            processData: false,
		            
		            success:function(data){ 
		            	toastr.success('Profile image uploaded successfully!');
		            },
		            error: function(data){
		            	toastr.error('Error in uploading profile image.');
		            },
		            
		        });
		    }));

			// $('#government-id').on('change',function(){ 
			// 	$("#governmentId").submit(); 
			// });

			// $('#governmentId').on('submit',(function(e) {  
		 //        e.preventDefault();
   //      		var url = "{{route('government.id')}}";
		 //        $.ajax({
		 //        	headers: {
		 //                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		 //            },
		 //            type:'POST',
		 //            url: url,
		 //            data: new FormData(this),
		 //            dataType: 'JSON',
		 //            cache: false,
		 //            contentType: false,
		 //            processData: false,
		            
		 //            success:function(data){ 
		 //            	toastr.success('Government ID uploaded successfully!');
		 //            },
		 //            error: function(data){
		 //            	toastr.error('Error in uploading government ID.');
		 //            },
		            
		 //        });
		 //    }));
	</script>
@endsection
