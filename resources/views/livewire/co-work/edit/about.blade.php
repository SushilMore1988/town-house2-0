<div>
    <form action="javascript:void(0)" method="POST" class="register-form">
        <div class="mb-2">
            <h4 class="mb-3 r-boldItalic f-9 text-body">General Information</h4>
        </div>
        <div class="form-group">
            {!! Form::text( 'name', null, [ 'id' => 'name', 'placeholder' => 'Name of Co-working space *' ,'class' => 'w-100 form-control about-percent', 'required' =>'', 'wire:model' => 'coWorkSpace.name']) !!}	
                @if ($errors->has('coWorkSpace.name')) 
                    <div class="text-danger mt-1">	
                    {{ $errors->first('coWorkSpace.name') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            {!! Form::textarea( 'description', null, ['id' => 'description' , 'placeholder' => 'Description *', 'rows' => "4", 'cols' => "50", 'class' => 'w-100 form-control about-percent', 'required' =>'', 'wire:model' => 'coWorkSpace.description' ]) !!}	
                @if ($errors->has('coWorkSpace.description')) 
                    <div class="text-danger mt-1">	
                    {{ $errors->first('coWorkSpace.description') }}
                </div>
            @endif
        </div>
        <div class="mb-2 form-group">
            <h4 class="mb-3 pt-3 r-boldItalic f-9 text-body">Contact Details</h4>
        </div>
        <div class="form-group">
            <div class="input-group mb-3 position-relative">
                {!! Form::email( 'email_id', null, [ 'id' => 'email_id' ,'placeholder' => 'Official Company Email *', 'class' => 'form-control about-percent commonClass mb-0', 'required' =>'', 'wire:model' => 'coWorkSpace.contact_details.email_id' ]) !!}
                <div>
                    @if($coWorkSpace->email_verified == null || $this->verifiedEmail != $this->coWorkSpace->contact_details['email_id'])
                        <a href="javascript:void(0)" class="input-group-append btn-warning verify-img d-block" style="cursor: pointer;" wire:click="sendOtp()">
                                <i class="email-loader d-none input-group-text btn-warning f-8 n-bold w-100" >
                                <div class="spinner-border text-white spinner-border-sm mx-auto" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </i>
                            <svg id="email-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41" class="w-100"><defs><style>.cls-41{fill:#f90;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-42{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}@import url("https://www.urbanfonts.com/fonts/nevis_Bold.font");</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-41" width="87.27" height="22.4"/><text class="cls-42" transform="translate(24.45 15.41)">VERIFY</text></g></g></svg>
                        </a>    
                    @else
                        <div class="input-group-append btn-warning verify-img d-block">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41" class="w-100"><defs><style>.cls-51{fill:#00a651;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-52{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-51" x="0.01" y="0.01" width="87.27" height="22.4"/><text class="cls-52" transform="translate(20.48 15.42)">VERIFIED</text></g></g></svg>
                        </div>
                    @endif	
                </div>
                
            </div>
            @if ($errors->has('coWorkSpace.contact_details.email_id')) 
                <div class="text-danger">	
                {{ $errors->first('coWorkSpace.contact_details.email_id') }}
            </div>
        @endif
        </div>
        <span class="text text-danger email_error" style="display:none"></span>
        <div class="d-block form-group">
            {!! Form::text( 'phone', null, ['id' => 'phone' , 'placeholder' => 'Phone *', 'class' => 'w-100 form-control about-percent number', 'required' =>'', 'wire:model' => 'coWorkSpace.contact_details.phone' ]) !!}	
                @if ($errors->has('coWorkSpace.contact_details.phone')) 
                    <div class="text-danger mt-1">	
                    {{ $errors->first('coWorkSpace.contact_details.phone') }}
                </div>
            @endif
        </div>
        <div class="d-block mb-3">
            {!! Form::text( 'website', null, ['id' => 'website' , 'placeholder' => 'Website  (eg: https://google.com)', 'class' => 'w-100 form-control', 'wire:model' => 'coWorkSpace.contact_details.website']) !!}
                @if ($errors->has('coWorkSpace.contact_details.website')) 
                    <div class="text-danger mt-1">	
                    {{ $errors->first('coWorkSpace.contact_details.website') }}
                </div>
            @endif	
        </div>
        <div class="d-block form-group">
            {!! Form::text( 'facebook_url', null, ['id' => 'facebook_url' , 'placeholder' => 'Facebook URL', 'class' => 'w-100 form-control', 'wire:model' => 'coWorkSpace.contact_details.facebook_url']) !!}
                @if ($errors->has('coWorkSpace.contact_details.facebook_url')) 
                    <div class="text-danger mt-1">	
                    {{ $errors->first('coWorkSpace.contact_details.facebook_url') }}
                </div>
            @endif	
        </div>
        
        <div class="d-block  form-group">
        {!! Form::text( 'twitter_url', null, ['id' => 'twitter_url' , 'placeholder' => 'Twitter URL', 'class' => 'w-100 form-control', 'wire:model' => 'coWorkSpace.contact_details.twitter_url']) !!}	
                @if ($errors->has('coWorkSpace.contact_details.twitter_url')) 
                    <div class="text-danger mt-1">	
                        {{ $errors->first('coWorkSpace.contact_details.twitter_url') }}
                </div>
            @endif
        </div>
        <div class="d-block form-group">
            {!! Form::text( 'instagram_url', null, ['id' => 'instagram_url' , 'placeholder' => 'Instagram URL', 'class' => 'w-100 form-control', 'wire:model' => 'coWorkSpace.contact_details.instagram_url']) !!}
            @if ($errors->has('coWorkSpace.contact_details.instagram_url')) 
                <div class="text-danger mt-1">	
                    {{ $errors->first('coWorkSpace.contact_details.instagram_url') }}
            </div>
            @endif
        </div>
        <h4 class="pt-3 r-boldItalic f-9 text-body">Information</h4>
        <div class="d-block mt-3">
            {!! Form::text( 'information', null, ['id' => 'information' , 'placeholder' => 'Description starting some special and distinct feature of your co-work-space', 'class' => ' w-100 form-control', 'wire:model' => 'coWorkSpace.information']) !!}
            @if ($errors->has('coWorkSpace.information')) 
                <div class="text-danger mt-1">
                    {{ $errors->first('coWorkSpace.information') }}
                </div>
            @endif
        </div>
        <h4 class="pt-4 mt-2 r-boldItalic f-9 text-body">Notification Center <i><small class="r-lightItalic">(Kindly let us know your email ID where you would like to recieve notification from the members)</small> </i></h4>
        
        <div class="d-block mt-3">
            {!! Form::text( 'notification_email', null, ['id' => 'notification_email' , 'placeholder' =>'Email *', 'class' => 'common-field w-100 form-control common-field', 'wire:model' => 'coWorkSpace.notify_email' ]) !!}
            @if ($errors->has('coWorkSpace.notify_email')) 
                <div class="text-danger mt-1">	
                    {{ $errors->first('coWorkSpace.notify_email') }}
                </div>
            @endif	
        </div>
            
        <div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5">
            <button type="button" wire:click="save('save')" name="save" value="1" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100 submitForm">SAVE</button>
        
            <button type="button" wire:click="save('saveAndSubmit')" name="saveAndSubmit" value="1" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100 submitForm">SAVE & SUBMIT</button>	
        </div>
    </form>
    
    {{-- <div class="modal" id="emailOtpModal"> --}}
    @if($showOtpModal)
    <div class="modal show" id="emailOtpModal" aria-modal="true" role="dialog" style="display: block;">
        <div class="modal-dialog introModule">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Email Verification</h4>
                    <button type="button" class="close text-dark" data-dismiss="modal" wire:click="$set('showOtpModal', false)">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        @csrf
                        <div class="form-row">
                            <label>For email please check inbox and spam folder</label>
                            <input class="form-control" name="otp" placeholder="Enter OTP sent to your email." required="required" id="otp" wire:model="userOtp">
                            @if ($errors->has('userOtp')) 
                                <div class="text-danger mt-1">	
                                    {{ $errors->first('userOtp') }}
                                </div>
                            @endif	
                        </div>
                        <div id="otp-error"></div>
                        <button type="button" class="btn btn-block btn-dark mt-3" wire:click="verifyOtp()"> Verify ({{ Crypt::decrypt($otp) }})</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
