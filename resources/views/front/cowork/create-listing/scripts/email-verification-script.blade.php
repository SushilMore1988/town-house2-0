<script type="text/javascript">
	var email = $('#email_id').val();
	var email_verified = '{{$coWorkSpace->email_verified == null ? 'No' : 'Yes'}}';

	$(document).on('keyup', '#email_id', function(){
		if($(this).val() == email && email_verified == 'Yes'){
			$('#email_verify_div').html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41" class="w-100"><defs><style>.cls-51{fill:#00a651;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-52{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-51" x="0.01" y="0.01" width="87.27" height="22.4"/><text class="cls-52" transform="translate(20.48 15.42)">VERIFIED</text></g></g></svg>');
			$('#email_verify_div').removeClass('email_verify');
		}else{
			$('#email_verify_div').html(`<i class="email-loader d-none input-group-text btn-warning f-8 n-bold" >
						    	<div class="spinner-border text-white spinner-border-sm mx-auto" role="status">
								  <span class="sr-only">Loading...</span>
								</div>
						    </i>
							<svg id="email-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41" class="w-100"><defs><style>.cls-41{fill:#f90;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-42{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}@import url("https://www.urbanfonts.com/fonts/nevis_Bold.font");</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-41" width="87.27" height="22.4"/><text class="cls-42" transform="translate(24.45 15.41)">VERIFY</text></g></g></svg>`);
			$('#email_verify_div').addClass('email_verify');
		}
	});

	$('.submitForm').on('click', function(){
		var is_submit = true; 
		$('.invalid-feedback').remove();
		if($('.email_verify').text() == 'verify'){
			$('.email_error').show();
            $('.email_error').html('<span class="invalid-feedback d-block">Please verify email.</span>');
			is_submit = false;
		}else{
			$('.email').hide();
		}
		if(is_submit == false){
			return false;
		}
	});
	
	$(document).on('click', '.email_verify', function(){
		if(!$('#email_id').val().length){
			toastr.error('Please enter email first and then try again.', '')
			return false;
		}
		$.ajax({
	        url : '{{url('/co-work-space/email-otp')}}/'+$('#email_id').val(),
	        type : 'get',
	        beforeSend : function(){
	        	$('.email-loader').removeClass('d-none');
	        	$('#email-svg').addClass('d-none');
	            //$('#email_verify').html('<i class="fa fa-circle-notch fa-spin"></i> verify').prop('disabled', true);
	        },
	        success : function(data){
	        	if(data['error'] == 0){
	        		$('#emailOtpModal').modal();
	        	}else{
				    toastr.error('Failed to send verification email. Please try again.', '')
	        	}
	        },
	        error : function(data){
	        	toastr.error('Failed to send verification email. Please try again', '');
	        },
	        complete : function(){
	            //$('#email_verify').html('verify').prop('disabled', false);
				$('.email-loader').addClass('d-none');
	        	$('#email-svg').removeClass('d-none');
	        }
	    });
	});

	$(document).on('click', '.submitEmailOtp', function(){
		var formData = new FormData();
		formData.append('_token', '{{ csrf_token() }}');
		formData.append('otp', $('#otp').val());
		formData.append('email', $('#email_id').val());
		formData.append('cws_id', {{ $coWorkSpace->id }});
		$.ajax({
			url : '{{ route("co-work-space.email.verify") }}',
			type : 'post',
			data: formData,
			processData: false,
			contentType: false,
			success: function(data){
				
				user_email = data['email'];
				user_email_verified = data['verified'];
				if(data['verified'] == 'Yes'){
					$('#emailOtpModal').modal('hide');
					$('.email_error').hide();
					var verified_html = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41"><defs><style>.cls-51{fill:#00a651;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-52{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-51" x="0.01" y="0.01" width="87.27" height="22.4"/><text class="cls-52" transform="translate(20.48 15.42)">VERIFIED</text></g></g></svg>`;
					$('#email_verify_div').html(verified_html);
				}else{
					$('#otp-error').html('<span class="text text-danger">Please enter correct OTP.</span>');
				}
			},
		});
	});

	$('.close').on('click', function(){
		$('#emailOtpModal').modal('hide');
	});

</script>