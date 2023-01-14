	<div class="modal" id="emailOtpModal">
        <div class="modal-dialog introModule opt-request-modal">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header d-inline-block">
                    <button type="button" class="close text-dark pl-0" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-uppercase text-center n-bold f-18 text-muted mb-0 text-uppercase">Email Verification requested </h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body px-4">
                    <form method="post" action="">
                        @csrf
                        <div class="form-row">
                            <label >Please check you email inbox and provide the sent OTP</label>
                            <div class="row px-3">
                                <div class="col-2 px-1">
                                    <input class="form-control px-2 number emailOtp" name="emailOtp" onkeyup="movetoNext(this, 'e2')" required="required" minlength="1" maxlength="1">
                                </div>
                                <div class="col-2 px-1">
                                    <input class="form-control px-2 number emailOtp" name="emailOtp" onkeyup="movetoNext(this, 'e3')" id="e2" required="required" minlength="1" maxlength="1">
                                </div>
                                <div class="col-2 px-1">
                                    <input class="form-control px-2 number emailOtp" name="emailOtp"  onkeyup="movetoNext(this, 'e4')" id="e3" required="required" minlength="1" maxlength="1">
                                </div>
                                <div class="col-2 px-1">
                                    <input class="form-control px-2 number emailOtp" name="emailOtp" onkeyup="movetoNext(this, 'e5')" id="e4" required="required" minlength="1" maxlength="1">
                                </div>
                                <div class="col-2 px-1">
                                    <input class="form-control px-2 number emailOtp" id="e5" name="emailOtp" onkeyup="movetoNext(this, 'e6')" required="required" minlength="1" maxlength="1">
                                </div>
                                <div class="col-2 px-1">
                                    <input class="form-control px-2 number emailOtp" id="e6" name="emailOtp" required="required" minlength="1" maxlength="1">
                                </div>
                            </div>
                            <label>If you can't find the email in your inbox, please check your spam folder or request to</label>
                        </div>
                        <div class="d-flex justify-content-center flex-column">
                            <a href="#" class="text-uppercase text-center n-bold f-16 text-muted text-uppercase mx-auto py-3 email_verify">Resend OTP</a>
                            <div id="email-otp-error"></div>
                            <button type="button" class="btn btn-success n-bold f-16 rounded-0 mx-auto text-center submitEmailOtp mt-3 w-100"> Verify email </button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

	<div class="modal" id="phoneOtpModal">
        <div class="modal-dialog introModule">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase text-center n-bold f-18 text-muted mb-0 text-uppercase">Mobile Verification Requested </h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="">
                        {{-- @csrf
                        <div class="form-row">
                            <label>For message please check inbox</label>
                            <input class="form-control" name="phoneOtp" placeholder="Enter OTP sent to your mobile." required="required" id="phoneOtp">
                        </div>
                        <button type="button" class="btn btn-block btn-dark mt-3 submitPhoneOtp"> Verify </button> --}}
                        @csrf
                        <div class="form-row">
                            <label class="pl-1">Please check your message inbox and provide the sent OTP</label>
                            <div class="row px-3">
                                <div class="col-2 px-1">
                                    <input class="form-control px-2 number phoneOtp" name="phoneOtp" onkeyup="movetoNext(this, 'p2')" id="p1" required="required" minlength="1" maxlength="1">
                                </div>
                                <div class="col-2 px-1">
                                    <input class="form-control px-2 number phoneOtp" name="phoneOtp" onkeyup="movetoNext(this, 'p3')" id="p2" required="required" minlength="1" maxlength="1">
                                </div>
                                <div class="col-2 px-1">
                                    <input class="form-control px-2 number phoneOtp" name="phoneOtp" onkeyup="movetoNext(this, 'p4')" id="p3" required="required" minlength="1" maxlength="1">
                                </div>
                                <div class="col-2 px-1">
                                    <input class="form-control px-2 number phoneOtp" name="phoneOtp" onkeyup="movetoNext(this, 'p5')" id="p4" required="required" minlength="1" maxlength="1">
                                </div>
                                <div class="col-2 px-1">
                                    <input class="form-control px-2 number phoneOtp" name="phoneOtp" onkeyup="movetoNext(this, 'p6')" id="p5" required="required" minlength="1" maxlength="1">
                                </div>
                                <div class="col-2 px-1">
                                    <input class="form-control px-2 number phoneOtp" name="phoneOtp" id="p6" required="required" minlength="1" maxlength="1">
                                </div>
                            </div>
                            {{-- <label>if you cant find the message in your inbox, please check your spam folder or requested to</label> --}}
                        </div>
                        <div class="d-flex justify-content-center flex-column">
                            <a href="#" class="text-uppercase text-center n-bold f-16 text-muted text-uppercase mx-auto py-3 phone_verify">Resend OTP</a>
                            <div id="phone-otp-error"></div>
                            <button type="button" class="btn btn-success n-bold f-16 rounded-0 mx-auto text-center submitPhoneOtp mt-3 w-100" id="submitphoneOtp"> Verify phone </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  

<script type="text/javascript">
	var user_email = '{{ Auth::user()->email }}';
	var user_email_verified = '{{Auth::user()->email_verified == null ? 'No' : 'Yes'}}';
	var user_phone = '{{ Auth::user()->phone }}';
	var user_phone_verified = '{{Auth::user()->phone_verified == null ? 'No' : 'Yes'}}';

    $('.close').on('click', function(){
        $('#emailOtpModal').hide();
        $('#phoneOtpModal').hide();
    });

    $('.number').keypress(function(){
        return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57));
    });

	// $(document).on('keyup', '#email', function(){
	// 	if($(this).val() == user_email && user_email_verified == 'Yes'){
	// 		$('#email_verify_div').html('<div class="input-group-append btn-success" ><i toggle="#password-field" class=" input-group-text btn-success f-8 n-bold">verified</i></div>');
	// 	}else{
	// 		$('#email_verify_div').html('<div class="input-group-append btn-warning" ><i toggle="#password-field" class=" input-group-text btn-warning f-8 n-bold" id="email_verify">verify</i></div>');
	// 	}
	// });
    // $('#phoneOtpModal').show();
    $(document).on('keyup', '#email', function(){
        if($(this).val() == user_email && user_email_verified == 'Yes'){
            var verified_html = `<div class="input-group-append btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41"><defs><style>.cls-51{fill:#00a651;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-52{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-51" x="0.01" y="0.01" width="87.27" height="22.4"/><text class="cls-52" transform="translate(20.48 15.42)">VERIFIED</text></g></g></svg>
                                    </div>`;

            $('#email_verify_div').html(verified_html);
        }else{
            var verify_html = `<div class="input-group-append btn-warning email_verify" style="cursor: pointer;" id="email_verify">                                            
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41"><defs><style>.cls-41{fill:#f90;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-42{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}@import url("https://www.urbanfonts.com/fonts/nevis_Bold.font");</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-41" width="87.27" height="22.4"/><text class="cls-42" transform="translate(24.45 15.41)">VERIFY</text></g></g></svg>
                                        </div>`;
            $('#email_verify_div').html(verify_html);
        }
    });

	$(document).on('click', '.email_verify', function(){
        // $('#emailOtpModal').show();
        // return;
        var email = $('#email').val();
        $.ajax({
            url : '{{url('/email-otp')}}/'+email,
            type : 'get',
            beforeSend : function(){
                $('.email-loader').removeClass('d-none');
                $('#email-svg').addClass('d-none');
            },
            success : function(data){
                if(data['error'] == 0){
                    $('#emailOtpModal').show();
                }else{
                    toastr.error(data['message'], '')
                    $('.email-loader').addClass('d-none');
                    $('#email-svg').removeClass('d-none');
                }
            },
            error : function(data){
                toastr.error('OTP mail sending failed, Please try again.', 'Error');
            },
            complete : function(){
                //$('#email_verify').html('<div class="input-group-append btn-warning" ><i toggle="#password-field" class=" input-group-text btn-warning f-8 n-bold">verify</i></div>').prop('disabled', false);
            }
        });
    });

    $(document).on('click', '.submitEmailOtp', function(){
        var otp = "";
        $(".emailOtp").each(function(){
            otp = "" + otp + $(this).val();
        });

        var formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('otp', otp);
        formData.append('email', $('#email').val());
        $.ajax({
            url : '{{ route("email.verify") }}',
            type : 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                // user_email = data['email'];
                // user_email_verified = data['verified'];
                if(data['verified'] == 'Yes'){
                    $('#emailOtpModal').hide();
                    $('#email_verify_div').html('<div class="input-group-append btn-success" ><img src="{{url("/img/SVG_Cowork/verified-svg.svg")}}" class="img-fluid verify-img"></div>');
                }else{
                    $('#email_verify_div').html('<div class="input-group-append btn-warning" > <img src="{{url("/img/SVG_Cowork/verify-svg.svg")}}" class="img-fluid verify-img email_verify" toggle="#password-field" data-toggle="modal" data-target="#emailOtpModal"></div>');
                    $('#email-otp-error').html('<span class="text text-danger">Please enter correct OTP.</span>');
                }
            },
        });
    });


    $(document).on('keyup', '#phone', function(){
        if($(this).val() == user_phone && user_phone_verified == 'Yes'){
            var phone_verified_html = `<div class="input-group-append btn-success">                                                
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41"><defs><style>.cls-51{fill:#00a651;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-52{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-51" x="0.01" y="0.01" width="87.27" height="22.4"/><text class="cls-52" transform="translate(20.48 15.42)">VERIFIED</text></g></g></svg>
                                            </div>`;
            $('#phone_verify_div').html(phone_verified_html);
        }else{
            var phone_verify_html = `<div class="input-group-append btn-warning phone_verify" id="phone_verify" style="cursor: pointer;">
                                                
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41"><defs><style>.cls-41{fill:#f90;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-42{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}@import url("https://www.urbanfonts.com/fonts/nevis_Bold.font");</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-41" width="87.27" height="22.4"/><text class="cls-42" transform="translate(24.45 15.41)">VERIFY</text></g></g></svg>
                                            </div>`;
            $('#phone_verify_div').html(phone_verify_html);
        }
    });

    	$(document).on('click', '.phone_verify', function(){
            //$('#phoneOtpModal').show();
            // return;
            var phone = $('#phone').val();
            $.ajax({
                url : '{{url('/phone-otp')}}/'+phone,
                type : 'get',
                beforeSend : function(){
                    $('.phone-loader').removeClass('d-none');
                    $('#phone-svg').addClass('d-none');
                    // $('#phone_verify').html(loader).prop('disabled', true);
                },
                success : function(data){
                    if(data['error'] == 0){
                        $('#phoneOtpModal').show();
                    }else{
                        toastr.error(data['message'], '')
                         $('.phone-loader').addClass('d-none');
                        $('#phone-svg').removeClass('d-none');
                    }
                },
                error : function(data){
                    toastr.error('OTP sending failed. Please try again.', '');
                     var phone_verify_html = `<div class="input-group-append btn-warning phone_verify" id="phone_verify" style="cursor: pointer;">
                                                
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41"><defs><style>.cls-41{fill:#f90;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-42{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}@import url("https://www.urbanfonts.com/fonts/nevis_Bold.font");</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-41" width="87.27" height="22.4"/><text class="cls-42" transform="translate(24.45 15.41)">VERIFY</text></g></g></svg>
                                            </div>`;
                    $('#phone_verify').html(phone_verify_html).prop('disabled', false);
                },
                complete : function(){
                    //$('#phone_verify').html('verify').prop('disabled', false);
                }
            });
        });

        $(document).on('click', '#submitphoneOtp', function(){
            //alert('Ok');
            var otp = "";
            $(".phoneOtp").each(function(){
                otp = "" + otp + $(this).val();
            });
            console.log('OTP: '+otp);
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('otp', otp);
            formData.append('phone', $('#phone').val());
            $.ajax({
                url : '{{ route("phone.verify") }}',
                type : 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    // user_phone = data['phone'];
                    // user_phone_verified = data['verified'];
                    if(data['verified'] == 'Yes'){
                        $('#phoneOtpModal').hide();
                         var phone_verified_html = `<div class="input-group-append btn-success">                                                
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41"><defs><style>.cls-51{fill:#00a651;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-52{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-51" x="0.01" y="0.01" width="87.27" height="22.4"/><text class="cls-52" transform="translate(20.48 15.42)">VERIFIED</text></g></g></svg>
                                            </div>`;
                        $('#phone_verify_div').html(phone_verified_html);
                    }else{
                        var phone_verify_html = `<div class="input-group-append btn-warning phone_verify" id="phone_verify" style="cursor: pointer;">
                                                
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41"><defs><style>.cls-41{fill:#f90;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-42{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}@import url("https://www.urbanfonts.com/fonts/nevis_Bold.font");</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-41" width="87.27" height="22.4"/><text class="cls-42" transform="translate(24.45 15.41)">VERIFY</text></g></g></svg>
                                            </div>`;
                        $('#phone_verify_div').html(phone_verify_html);
                        $('#phone-otp-error').html('<span class="text text-danger">Please enter correct OTP.</span>');
                    }
                },
            });
        });

        function movetoNext(current, nextFieldID) {
            if (current.value.length >= current.maxLength) {
               document.getElementById(nextFieldID).focus();
            }
        }

        $(document).on('keyup', '.emailOtp', function(){

        });
</script>