<div class="tab-pane  @if($current_tab == 'about') active @endif " id="about-space" role="tabpanel">	 
	<div>			
		{{-- @if(session()->has('message'))
			 <p class="alert alert-success time-out-alert">{{session()->get('message')}}</p>
		@elseif(session()->has('error'))
			 <p class="alert alert-danger time-out-alert">{{session()->get('error')}}</p>
		@endif --}}

	</div>
	{!! Form::model($coWorkSpace, [ 'method'=>'PUT', 'route' => [ 'co-work-space.update', $coWorkSpace->id ] ,'class' => 'register-form' ]) !!} 
	{{-- {!! Form::open([ 'method'=>'PUT', 'route' => [ 'co-work.update', $coWorkSpace->id ] ,'class' => 'register-form' ]) !!}  --}}
  		<div class="mb-2">
  			<h4 class="mb-3 r-boldItalic f-9 text-body">General Information</h4>
  		</div>
  		<div class="form-group">
  			{!! Form::text( 'name', null, [ 'id' => 'name', 'placeholder' => 'Name of Co-working space *' ,'class' => 'w-100 form-control about-percent', 'required' =>'']) !!}	
  				@if ($errors->has('name')) 
		  			<div class="text-danger mt-1">	
						{{ $errors->first('name') }}
					</div>
				@endif
  		</div>
	  	<div class="form-group">
	  		{!! Form::textarea( 'description', null, ['id' => 'description' , 'placeholder' => 'Description', 'rows' => "4", 'cols' => "50", 'class' => 'w-100 form-control about-percent ckeditor', 'required' =>'' ]) !!}	
	  			@if ($errors->has('description')) 
		  			<div class="text-danger mt-1">	
						{{ $errors->first('description') }}
					</div>
				@endif
	  	</div>
	  	<div class="mb-2 form-group">
	  		<h4 class="mb-3 pt-3 r-boldItalic f-9 text-body">Contact Details</h4>
  		</div>
	  	<div class="form-group">
	  		<div class="input-group mb-3 position-relative">
	  			{!! Form::email( 'email_id', !empty($coWorkSpace->contact_details['email_id']) ? $coWorkSpace->contact_details['email_id'] : null, [ 'id' => 'email_id' ,'placeholder' => 'Official Company Email *', 'class' => 'form-control about-percent commonClass mb-0', 'required' =>'' ]) !!}
	  			
			  	<div >
			  		
					@if($coWorkSpace->email_verified == null)
						<div class="input-group-append btn-warning verify-img email_verify d-block" id="email_verify_div" style="cursor: pointer;">
							 <i class="email-loader d-none input-group-text btn-warning f-8 n-bold w-100" >
						    	<div class="spinner-border text-white spinner-border-sm mx-auto" role="status">
								  <span class="sr-only">Loading...</span>
								</div>
						    </i>
							<svg id="email-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41" class="w-100"><defs><style>.cls-41{fill:#f90;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-42{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}@import url("https://www.urbanfonts.com/fonts/nevis_Bold.font");</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-41" width="87.27" height="22.4"/><text class="cls-42" transform="translate(24.45 15.41)">VERIFY</text></g></g></svg>
						</div>
						
				  	@else
						<div class="input-group-append btn-warning verify-img d-block" id="email_verify_div">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41" class="w-100"><defs><style>.cls-51{fill:#00a651;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-52{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-51" x="0.01" y="0.01" width="87.27" height="22.4"/><text class="cls-52" transform="translate(20.48 15.42)">VERIFIED</text></g></g></svg>
						</div>
				  	@endif	
			  	</div>
			  	
	  		</div>
	  		@if ($errors->has('email_id')) 
	  			<div class="text-danger">	
					{{ $errors->first('email_id') }}
				</div>
			@endif
	  	</div>
			<span class="text text-danger email_error" style="display:none"></span>
	  <!-- 	<div class="input-group mb-3 position-relative">
			<input class=" form-control rounded-9 commonClass mb-0" aria-label="Input group example" id="email" name="email" type="email" value="rahulnavale302@gmail.com">
			<div id="email_verify_div">
				<div class="input-group-append btn-success">
					<i toggle="#password-field" class=" input-group-text btn-success f-8 n-bold">verified</i>
				</div>
			</div>
		</div> -->
	  	<div class="d-block form-group">
	  		{!! Form::text( 'phone', empty($coWorkSpace->contact_details['phone']) ? null : $coWorkSpace->contact_details['phone'], ['id' => 'phone' , 'placeholder' => 'Phone *', 'class' => 'w-100 form-control about-percent number', 'required' =>'' ]) !!}	
	  			@if ($errors->has('phone')) 
		  			<div class="text-danger mt-1">	
						{{ $errors->first('phone') }}
					</div>
				@endif
	  	</div>
	  	<div class="d-block mb-3">
	  		{!! Form::text( 'website', empty($coWorkSpace->contact_details['website']) ? null : $coWorkSpace->contact_details['website'] , ['id' => 'website' , 'placeholder' => 'Website  (eg: https://google.com)', 'class' => 'w-100 form-control']) !!}
	  			@if ($errors->has('website')) 
		  			<div class="text-danger mt-1">	
						{{ $errors->first('website') }}
					</div>
				@endif	
	  	</div>
	  	<div class="d-block form-group">
	  		{!! Form::text( 'facebook_url', empty($coWorkSpace->contact_details['facebook_url']) ? null : $coWorkSpace->contact_details['facebook_url'] , ['id' => 'facebook_url' , 'placeholder' => 'Facebook URL', 'class' => 'w-100 form-control']) !!}
	  			@if ($errors->has('facebook_url')) 
		  			<div class="text-danger mt-1">	
						{{ $errors->first('facebook_url') }}
					</div>
				@endif	
	  	</div>
  		
		<div class="d-block  form-group">
			{!! Form::text( 'twitter_url', empty($coWorkSpace->contact_details['twitter_url']) ? null : $coWorkSpace->contact_details['twitter_url'] , ['id' => 'twitter_url' , 'placeholder' => 'Twitter URL', 'class' => 'w-100 form-control']) !!}	
	  			@if ($errors->has('twitter_url')) 
		  			<div class="text-danger mt-1">	
							{{ $errors->first('twitter_url') }}
					</div>
				@endif
	  	</div>
	  	<div class="d-block form-group">
	  		{!! Form::text( 'instagram_url', empty($coWorkSpace->contact_details['instagram_url']) ? null : $coWorkSpace->contact_details['instagram_url'] , ['id' => 'instagram_url' , 'placeholder' => 'Instagram URL', 'class' => 'w-100 form-control']) !!}
	  			@if ($errors->has('instagram_url')) 
		  			<div class="text-danger mt-1">	
							{{ $errors->first('instagram_url') }}
					</div>
				@endif
	  	</div>
	  	<h4 class="pt-3 r-boldItalic f-9 text-body">Information</h4>
	  	<div class="d-block mt-3">
	  		{!! Form::text( 'space_information', empty($coWorkSpace->information) ? null :$coWorkSpace->information , ['id' => 'space_information' , 'placeholder' => 'Description starting some special and distinct feature of your co-work-space', 'class' => ' w-100 form-control']) !!}
	  			@if ($errors->has('space_information')) 
		  			<div class="text-danger mt-1">	
							{{ $errors->first('space_information') }}
					</div>
				@endif
	  	</div>
	  	<h4 class="pt-4 mt-2 r-boldItalic f-9 text-body">Notification Center <i><small class="r-lightItalic">(Kindly let us know your email ID where you would like to recieve notification from the members)</small> </i></h4>
	  	
	  	<div class="d-block mt-3">
	  		{!! Form::text( 'notification_email', empty($coWorkSpace->notify_email) ? null :$coWorkSpace->notify_email  , ['id' => 'notification_email' , 'placeholder' =>'Email *', 'class' => 'common-field w-100 form-control', 'common-field' ]) !!}
	  			@if ($errors->has('notification_email')) 
		  			<div class="text-danger mt-1">	
						{{ $errors->first('notification_email') }}
					</div>
				@endif	
	  	</div>
	  	
		<div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5">
			<button type="submit" name="save" value="1" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100 submitForm">SAVE</button>
		
			<button type="submit" name="saveAndSubmit" value="1" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100 submitForm">SAVE & SUBMIT</button>	
		</div>
	{!!Form::close()!!}
</div>

<div class="modal" id="emailOtpModal">
    <div class="modal-dialog introModule">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Email Verification</h4>
                <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    @csrf
                    <div class="form-row">
                        <label>For email please check inbox and spam folder</label>
                        <input class="form-control" name="otp" placeholder="Enter OTP sent to your email." required="required" id="otp">
                    </div>
                    <div id="otp-error"></div>
                    <button type="button" class="btn btn-block btn-dark mt-3 submitEmailOtp"> Verify </button>
                </form>
            </div>
        </div>
    </div>
</div>