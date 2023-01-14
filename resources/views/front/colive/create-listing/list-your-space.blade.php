@extends('front.layouts.app')
@section('content')
<section class="top-space  detail-list-space">
	{{-- <div class="container h-100">
		<div class="row">
			<div class="col-md-3 d-flex align-items-end ">
				<img src="{{url('/img/SVG_Cowork/list-your-space.svg')}}" class="img-fluid list-space-img w-75 list-space-img" alt="list-your-space">
			</div>
			<div class="col-md-9 col-sm-12 conatct-detail">
				
				<h2 class="n-bold f-24 text-muted mb-0 pt-md-4 pt-5">LIST YOUR SPACE</h2>
				<p class="r-lightItalic f-9 text-body">Let us know more about your space to get the best TH2.0 reviews and have an attractive page for providing information to the users.</p> 
				<h6 class="mb-3 r-boldItalic f-9 text-body">Contact Details of the Person Representing the Property				 </h6>
				<form class="register-form " method="POST" action="{{url('/co-work-space/store')}}">
					<input type="hidden" name="_token" value="4tgK2gNvef1kAVgNKsXOGSqkxgndnbOLhvm5wERX">						
					<div class="d-flex h-100 flex-column">
						<div class="align-self-start w-100 min-form-ht">
							<input type="hidden" name="coWorkSpaceType" value="co-work-space">

							<div class="d-block">
						  		<input type="text" name="coLiveSpaceName" class="common-field w-100 form-control" placeholder="Name of Representative" value="">
						  	</div>
						  	<div class="d-block">
						  		<input type="text" name="email" class="common-field w-100 form-control" placeholder="Email" value="">
						  	</div>
						  	<div class="d-block">
						  		<input type="text" name="Phone" class="common-field w-100 form-control" placeholder="Phone Number" value="">
						  	</div>
						  	
						  	<div class="d-block">
						  		<select name="city" class="common-field w-100 form-control">
						  			<option value="">--- Select City ---</option>
            					</select>
						  	</div>
						  	<h6 class="pt-3 pb-1 r-boldItalic f-9 text-body">Let us Know your Role at this space</h6>
						  	
					  		<ul class="d-flex justify-content-between flex-wrap">
					  			<li>
					  				<label class="container-2 r-lightItalic f-9 text-body">Owner
									  <input type="radio" checked="checked" name="userRole" value="Owner">
									  <span class="checkmark"></span>
									</label>	
					  			</li>
					  			<li>
					  				<label class="container-2 r-lightItalic f-9 text-body">Broker
									  <input type="radio" name="userRole" value="Broker">
									  <span class="checkmark"></span>
									</label>	
					  			</li>
					  			<li>
					  				<label class="container-2 r-lightItalic f-9 text-body">Care Taker
									  <input type="radio" name="userRole" value="Care Taker">
									  <span class="checkmark"></span>
									</label>
					  			</li>
					  			<li>
					  				<label class="container-2 r-lightItalic f-9 text-body">Guest User
									  <input type="radio" name="userRole" value="Guest User">
									  <span class="checkmark"></span>
									</label>	
					  			</li>
					  		</ul>
					  	</div>
				  		<div class="pt-lg-4 pt-xl-0 align-self-end w-100 align-items-end">
				  			{{-- <!-- <button class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100"  name="saveSubmit" onclick="window.location.href='{{route('colive-create')}}';">SAVE &amp; SUBMIT</button>	 --> -}}
				  			<button type="submit" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100 mb-3">SAVE &amp; SUBMIT</button>
				  		</div>
				  	</div>
				</form>
			</div>
		</div>
	</div> --}}
	<div class="container h-100">
		<div class="row" >
			<div class="col-md-3 d-flex align-items-end ">
				<img src="{{url('/img/SVG_Cowork/list-your-space.svg')}}" class="img-fluid list-space-img w-75 list-space-img" alt="list-your-space" />
			</div>
			<div class="col-md-9 col-sm-12 conatct-detail">
				<!-- <div class="d-flex h-100 flex-column" style="min-height: calc(100vh - 70px);"> -->
					<h2 class="n-bold f-24 text-muted mb-0 pt-md-4 pt-5">LIST YOUR SPACE</h2>
					<p class="r-lightItalic f-9 text-body">Let us know more about your space to get the best TH2.0 reviews and have an attractive page for providing information to the users.</p> 
					@if(session()->has('msg'))
							<div class="alert alert-success">
								{{ session()->get('msg') }}
								</div>
							@endif
							<h6 class="mb-3 r-boldItalic f-9 text-body">Contact Details </h6>
							<form class="register-form " method="POST" action="{{ route('co-live-space.store') }}">
								@csrf
								<div class="d-flex h-100 flex-column" >
									<div class="align-self-start w-100 min-form-ht" >
										<input type="hidden" name="coLiveSpaceType" value="{{ $type }}">

										<div class="d-block">
											  <input type="text" name="coLiveSpaceName" class="common-field w-100 form-control" placeholder="Name of Co-live space" value="{{ old('coLiveSpaceName') }}">
											   @if ($errors->has('coLiveSpaceName')) 
												   <p class="text-danger error">
													   {{ $errors->first('coLiveSpaceName') }}
												   </p> 
											   @endif
										  </div>
										  <div class="d-block">
											  <select name="country" class="common-field w-100 form-control" >
												  <option value="">--- Select Country ---</option>
												  @foreach ($countries as $key => $value)
													<option value="{{ $key }}">{{ $value }}</option>
												   @endforeach
											</select>
											   @if ($errors->has('country')) 
												   <p class="text-danger error">
													   {{ $errors->first('country') }}
												   </p> 
											   @endif
										  </div>
										  <div class="d-block">
											  <select name="state" class="common-field w-100 form-control" >
												  <option value="">--- Select State ---</option>
													{{-- <option value="{{ $key }}">{{ $value }}</option> --}}
											</select>
											   @if ($errors->has('state')) 
												   <p class="text-danger error">
													   {{ $errors->first('state') }}
												   </p> 
											   @endif
										  </div>
										  <div class="d-block">
											  <select name="city" class="common-field w-100 form-control" >
												  <option value="">--- Select City ---</option>
													{{-- <option value="{{ $key }}">{{ $value }}</option> --}}
											</select>
											  
											   @if ($errors->has('city')) 
												   <p class="text-danger error">
													   {{ $errors->first('city') }}
												   </p> 
											   @endif
										  </div>
										  <h6 class="pt-3 pb-1 r-boldItalic f-9 text-body">Let us Know your Role at this space</h6>
										  
										  <ul class="d-flex justify-content-between flex-wrap">
											  	<li>
													<label class="container-2 r-lightItalic f-9 text-body">Owner
													<input type="radio" checked="checked" name="userRole" value="Owner">
													<span class="checkmark"></span>
												</label>	
												</li>
												<li>
													<label class="container-2 r-lightItalic f-9 text-body">Broker
													<input type="radio" name="userRole" value="Broker">
													<span class="checkmark"></span>
												</label>	
												</li>
												<li>
													<label class="container-2 r-lightItalic f-9 text-body">Care Taker
													<input type="radio" name="userRole" value="Care Taker">
													<span class="checkmark"></span>
												</label>
												</li>
												<li>
													<label class="container-2 r-lightItalic f-9 text-body">Guest User
													<input type="radio" name="userRole" value="Guest User">
													<span class="checkmark"></span>
												</label>	
												</li>
										  </ul>
									  </div>
									  <div class="pt-lg-4 pt-xl-0 align-self-end w-100 align-items-end">
										  <!-- <div class="d-flex mt-xl-0 mt-lg-5 pt-xl-0 pt-5"> -->
											  {{-- <button type="submit" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100" value="save" name="save" >SAVE</button> --}}
											  <button  type="submit" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100" value="save_submit" name="saveSubmit">SAVE & SUBMIT</button>	
										  <!-- </div> -->
										  
									  </div>
								  </div>
							</form>
				<!-- </div> -->
			</div>
		</div>
		
	</div>
</section>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="country"]').on('change', function() {
            var countryID = $(this).val();
            if(countryID) {
                $.ajax({
                    url: "{{url('/co-work-space/ajax-state')}}"+'/'+countryID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        $('select[name="state"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="state"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="state"]').empty();
            }
        });


            $('select[name="state"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: "{{url('/co-work-space/ajax-city')}}"+'/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
    });
</script>
@endsection