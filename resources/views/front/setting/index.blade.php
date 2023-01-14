@extends('front.layouts.app')

@section('css')
	
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
                            <img src="{{url('img/user-profile.png')}}"  class="img-fluid dashboard-profile">
                        @endif 
						<h2 class="n-bold f-24 text-muted mb-0 pt-md-4 pt-4 text-uppercase"> HI {{Auth::user()->fname}}</h2>
						<p class="r-lightItalic f-9 text-body">Here are your personel details and TH2.0 credentials </p>
						{{-- <br class="d-md-block d-none">progress with TH2.0  --}}
					</div>
				</div>
			</div>
		</div>
		<div class=" border-bottom update-profile pb-4">
			<div class="container">
				<h2 class="n-bold f-24 text-muted mb-0 py-md-4 pt-4 text-center">PERSONEL DETAILS</h2>
					<div class="row">
						<div class="col-lg-6 mx-auto">
							<form class="register-form pb-2 pt-2" method="POST" action="{{ route('update.profile') }}" enctype="multipart/form-data">
	                            @csrf
								<div class="form-group">
									<label for="current-password" class=" text-left mb-0 align-self-center r-italic f-9 text-body">TH2-0 Unique Code:</label>
									<input disabled type="text" value="{{Auth::user()->unique_name}}" name="unique_code" placeholder="Auto generated th2-0 unique code" class=" w-100 form-control rounded-0" >							
								</div>
	                            <div class="d-block">
	                               <input id="fname" type="text" class="r-lightItalic f-9 form-control w-100 {{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ $user->fname }}" placeholder="First Name" required autofocus>

	                                @if ($errors->has('fname'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('fname') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                            <div class="d-block">
	                                <input id="lname" type="text" class="-lightItalic f-9 form-control w-100{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ $user->lname }}" placeholder="Last Name" required autofocus>

	                                @if ($errors->has('lname'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('lname') }}</strong>
	                                    </span>
	                                @endif
								</div>

								
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
	                           
	                            {{-- <div class="d-block">
	                                <input id="email" type="email" class="r-lightItalic f-9 form-control w-100 {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" placeholder="Email Address" required>

	                                @if ($errors->has('email'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
	                            </div> --}}
	                            <div class="d-block">

	                            	{{-- <div class="container">
									   <div class="col-sm-6" style="height:130px;">
									      <div class="form-group">
									         <div class='input-group date' id='datetimepicker9'>
									            <input type='text' class="form-control" />
									            <span class="input-group-addon">
									            <span class="glyphicon glyphicon-calendar">
									            </span>
									            </span>
									         </div>
									      </div>
									   </div>
									   
									</div> --}}

	                                <div class="form-group mb-2">
	                                    <div class='input-group date mb-1'>
	                                        <input type='text' class="form-control w-100 {{ $errors->has('birth_date') ? ' is-invalid' : '' }}" value="{{ $user->dob }}" name="birth_date" placeholder="Birth Date"  id="datetimepicker2"/>
	                                    </div>
	                                </div>
	                                @if ($errors->has('birth_date'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('birth_date') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                            <div class="d-block">
	                                <select name="gender" class="r-lightItalic f-9 form-control w-100 {{ $errors->has('gender') ? ' is-invalid' : '' }}" value="{{ old('gender') }}">
	                                    <option value="" selected disabled>Gender</option>
	                                    <option value="Male" {{ $user->gender == "Male" ? 'selected' : '' }} >Male</option>
	                                    <option value="Female" {{ $user->gender == "Female" ? 'selected' : '' }}>Female</option>
	                                </select>
	                                @if ($errors->has('gender'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('gender') }}</strong>
	                                    </span>
	                                @endif
								</div>
								
	                            <div class="d-block">
	                                <input id="phone" type="text" class="r-lightItalic f-9 form-control w-100 {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->phone }}" placeholder="Phone" required autofocus>
	                                @if ($errors->has('phone'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('phone') }}</strong>
	                                    </span>
	                                @endif
								</div>
								
								<h6 class=" f-9 check-label">@if($user->profile_image != null) Replace @else Upload @endif Profile Photo</h6>
								<div class="uploaded-img">
									<ul class="d-flex flex-wrap pl-0">
										@if($user->profile_image != null)
										<li class="border position-relative">
											<div class="overlay position-absolute d-flex justify-content-center">
												<i class="far fa-check-circle float-right text-success "></i>
											</div>
											<img src="{{url('img/user/profile-image/'.$user->profile_image)}}" alt="" class="h-100 w-auto" style="max-width: 84px">
										</li>
										@endif
										<input type="file" class="custom-file-input w-100 d-none form-control rounded-0" id="profile-image" name="profile-image">
										<li class="border drag-container" id="cover-image">
											<img src="{{url('/img/plus-sign.svg')}}" id="profile-preview" class="img-fluid w-100" alt="" />
										</li>
									</ul>
								</div>

                        		{{-- <div class="form-group "> --}}
                        			
                        			{{-- <div class="custom-file  text-left rounded-0">
                        			    <input type="file" class="custom-file-input w-100 form-control rounded-0" id="profile-image" name="profile-image">
                        			    <label class="custom-file-label rounded-0" for="profile-image">Profile Image</label>
                        			</div> --}}
                        			
                        			
                        		{{-- </div> --}}
								@if(!empty(Auth::user()->password))
								<div class="form-group">
									<label for="current-password" class=" text-left mb-0 align-self-center r-italic f-9 text-body">Current Password:</label>
									<input type="password" name="current-password" placeholder="Enter current password *" class=" w-100 form-control rounded-0 @error('password') is-invalid @enderror" >
									@error('current-password')
										<span class="text  text-danger">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								@endif
								
								<div class="form-group">
									<label for="new-password" class=" text-left mb-0 align-self-center r-italic f-9 text-body">New Password:</label>
									<input type="password" name="new-password" placeholder="Enter new password *" class=" w-100 form-control rounded-0" >
									@error('new-password')
										<span class="text  text-danger">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="form-group">
									<label for="current-password" class=" text-left mb-0 align-self-center r-italic f-9 text-body">Confirm Password:</label>
									<input type="password" name="new-password_confirmation" placeholder="Re-enter New Password *" class=" w-100 form-control rounded-0" >
									@error('new-password_confirmation')
										<span class="text  text-danger">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
	                            <div class="row">
	                                <div class="col-12 mx-auto text-center">
	                                    {{-- <button type="submit" class="btn btn-success n-bold f-9 rounded-0 ml-md-2 w-100">Update 1</button> --}}

	                                    <button type="submit" class="btn btn-success n-bold f-9 rounded-0 mx-auto text-center justify-content-center d-block w-100">Update</button>
	                                </div>
	                                {{-- <div class="col-6">
	                                    <a href="{{route('login')}}" class="btn btn-success n-bold f-9 rounded-0 ml-md-2 w-100">Sign In</a>
	                                </div> --}}
	                            </div>
	                        </form>
						</div>
					</div>
					
					</div>
				</div>
			</div>
		</div>
		{{-- <div class="main-listing body-color pt-md-4 pt-0 border-bottom pb-4">
			<div class="container">
				<h2 class="n-bold f-24 text-muted mb-0 pt-md-0 pt-5 text-center text-uppercase">Login Setting</h2>
				<p class="r-lightItalic f-9 text-body text-center">Change your login details below </p>
				<div class="row pt-md-3 pt-4 card-listing-filter"> 
					<div class="col-lg-6 mx-auto">
						<div class="form-group">
							<label for="current-password" class=" text-left mb-0 align-self-center r-italic f-9 text-body">TH2-0 Unique Code:</label>
							<input disabled type="text" value="{{Auth::user()->unique_name}}" name="unique_code" placeholder="Auto generated th2-0 unique code" class=" w-100 form-control rounded-0" >							
						</div>
						{!! Form::open(['route'=>'password.change', 'class' => 'w-100']) !!}
							@if(!empty(Auth::user()->password))
							<div class="form-group">
								<label for="current-password" class=" text-left mb-0 align-self-center r-italic f-9 text-body">Current Password:</label>
								<input required type="password" name="current-password" placeholder="Enter current password *" class=" w-100 form-control rounded-0 @error('password') is-invalid @enderror" >
								@error('current-password')
								    <span class="text  text-danger">
								        <strong>{{ $message }}</strong>
								    </span>
								@enderror
							</div>
							@endif
							
							<div class="form-group">
								<label for="new-password" class=" text-left mb-0 align-self-center r-italic f-9 text-body">New Password:</label>
								<input required type="password" name="new-password" placeholder="Enter new password *" class=" w-100 form-control rounded-0" >
								@error('new-password')
								    <span class="text  text-danger">
								        <strong>{{ $message }}</strong>
								    </span>
								@enderror
							</div>

							<div class="form-group">
								<label for="current-password" class=" text-left mb-0 align-self-center r-italic f-9 text-body">Confirm Password:</label>
								<input required type="password" name="new-password_confirmation" placeholder="Re-enter New Password *" class=" w-100 form-control rounded-0" >
								@error('new-password_confirmation')
								    <span class="text  text-danger">
								        <strong>{{ $message }}</strong>
								    </span>
								@enderror
							</div>

							<div class="text-center mt-4">
								<button type="submit" class="btn btn-success n-bold f-9 rounded-0 mx-auto text-center justify-content-center d-block w-100">Update</button>
							</div>
						{!! Form::close() !!}	
					</div>
				</div>
			</div>
		</div> --}}
	</section>

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
@endsection

@section('js')
	{{-- @jquery --}}
	
    
    <script type="text/javascript" src="{{url('/plugins/datetime-picker/js/moment.js')}}"></script>
    <script type="text/javascript" src="{{url('/plugins/datetime-picker/js/datetime-picker.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#datetimepicker2').datetimepicker({
                format: 'DD-MM-YYYY',
                viewMode: 'years',
                //inline: true,                
                //debug: true
            });
            //$('.date').data("DateTimePicker").show();
		});
		$('#cover-image').click(function(e){
			e.preventDefault();
			$('#profile-image').trigger('click');
		});

		//show image preview
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					console.log('in Input onload');
					$('#profile-preview').attr('src', e.target.result);
				}
				
				reader.readAsDataURL(input.files[0]); // convert to base64 string
			}
		}

		$("#profile-image").change(function() {
			readURL(this);
		});
	</script>
	@include('front.cowork.dashboard.script.verification-script')
	<script type="text/javascript">

		// $('#profile-image').on('change',function(){ 
		// 	$("#profilePhoto").submit(); 
		// });

		// $('#profilePhoto').on('submit',(function(e) {  
	 //        e.preventDefault();
		// 	var url = "{{route('profile.image')}}";
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
	 //            beforeSend : function(){
		//             $('#profilePhoto').html('<i class="fa fa-circle-notch fa-spin"></i> Uploading profile image.').prop('disabled', true);
		//         },
	 //            success:function(data){ 
	 //            	toastr.success('Profile image uploaded successfully!');
	 //            	window.location.reload();
	 //            },
	 //            error: function(data){
	 //            	toastr.error('Error in uploading profile image.');
	 //            },
	            
	 //        });
	 //    }));

	</script>

	<script type="text/javascript">
		if($('#message').val().length > 0){
			var message = $('#message').val();
			toastr.error(message);
		}


	</script>
{{-- 	<script type="text/javascript">
      $(function () {
          $('#datetimepicker9').datetimepicker({
              viewMode: 'years'
          });
      });
   </script> --}}
@endsection
