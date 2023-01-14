@extends('front.layouts.app')
@section('content')
	<section class="top-space top-space-responsive">
        <div class="sub-division loginDiv sub-division-responsive">
            <div class="container d-flex h-100 justify-content-center">
                <div class="row justify-content-center align-content-center w-100">
                    <div class="responsive-height  width pt-lg-0 pt-4 h-100 ">
                        <form class="register-form pb-3 pt-3 d-flex flex-column justify-content-center h-100" method="POST" action="http://127.0.0.1:8000/login">
                            <input type="hidden" name="_token" value="vzYNYDvedFnmXqbBIQX5bw4FYpEqqaTNBqrlcgFS">                            
                            <div class="align-self-start justify-content-center w-100 h-100">
	                            <div class="header-strip  text-center border-0  h-auto" id="about">
	                                <h2 class="n-bold f-24 mb-sm-0 mb-1 pt-md-4 pt-2 text-muted">YOUR COMMUNITY INDEX</h2>
	                                <i class="r-lightItalic f-9 text-body">The Index might be different while browsing the Co-living and Co-working Venues. To <br> achieve an accurate result, Use the TH2.0 Applciation </i>
	                            </div>
	                            <div class="community-index-rating bg-success d-flex align-self-center justify-content-center mx-auto my-3">
	                            	<p class="n-bold f-24 text-white mb-0 align-self-center">{{ $community_index }}</p>
	                            </div>
	                           	<p class="r-boldItalic f-9 text-black text-center mb-0">Satisfied with your Results ?</p>
								<div class="row w-100  ">
									<div class="col-md-6 mx-auto">
										<div class="d-flex justify-content-center">
											<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
												<input type="checkbox" {{ $community_index >= 1 ? 'checked="checked"' : '' }} name="Desk-quality">
												<span class="checkmark checkbox-checkmark"></span>
											</label>
						     				<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
												<input type="checkbox" {{ $community_index >= 2 ? 'checked="checked"' : '' }} name="Desk-quality">
												<span class="checkmark checkbox-checkmark"></span>
											</label>
											<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
												<input type="checkbox" {{ $community_index >= 3 ? 'checked="checked"' : '' }} name="Desk-quality">
												<span class="checkmark checkbox-checkmark"></span>
											</label>
											<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
												<input type="checkbox" {{ $community_index >= 4 ? 'checked="checked"' : '' }} name="Desk-quality">
												<span class="checkmark checkbox-checkmark"></span>
											</label>
											<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
												<input type="checkbox" {{ $community_index >= 5 ? 'checked="checked"' : '' }} name="Desk-quality">
												<span class="checkmark checkbox-checkmark"></span>
											</label>
											<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
												<input type="checkbox" {{ $community_index >= 6 ? 'checked="checked"' : '' }} name="Desk-quality">
												<span class="checkmark checkbox-checkmark"></span>
											</label>
											<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
												<input type="checkbox" {{ $community_index >= 7 ? 'checked="checked"' : '' }} name="Desk-quality">
												<span class="checkmark checkbox-checkmark"></span>
											</label>
											<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
												<input type="checkbox" {{ $community_index >= 8 ? 'checked="checked"' : '' }} name="Desk-quality">
												<span class="checkmark checkbox-checkmark"></span>
											</label>
											<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
												<input type="checkbox" {{ $community_index >= 9 ? 'checked="checked"' : '' }} name="Desk-quality">
												<span class="checkmark checkbox-checkmark"></span>
											</label>
											<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
												<input type="checkbox" {{ $community_index >= 10 ? 'checked="checked"' : '' }} name="Desk-quality">
												<span class="checkmark checkbox-checkmark"></span>
											</label>
										</div>
									</div>
								</div>
	                        </div>
	                        <div class="align-self-center justify-content-center w-100 h-100 mt-5">
	                            <div class="alternate-login text-center pt-sm-5 pt-lg-3 pt-4">
	                                <p class=" n-bold f-24 mb-0 text-muted">SHARE YOUR RESULTS</p>
	                                <p class="r-lightItalic f-9 text-body">On your social media platforms</p>
	                            </div>
	                            <div class="social-media-login d-flex justify-content-between mx-auto pt-sm-3 pt-4 pb-2">
	                                <div class="social-media-img">
	                                    <a href="http://127.0.0.1:8000/auth/facebook">
	                                        <img src="{{ url('/img/SVG_Cowork/facebook-logo.svg') }}" class="img-fluid" alt="facebook-logo">
	                                    </a>
	                                </div>
	                                <div class="social-media-img">
	                                    <a href="http://127.0.0.1:8000/auth/google">
	                                        <img src="{{ url('/img/SVG_Cowork/google-logo.svg') }}" class="img-fluid" alt="google-logo">
	                                    </a>
	                                </div>
	                                <div class="social-media-img">
	                                    <a href="http://127.0.0.1:8000/auth/linkedin">
	                                        <img src="{{ url('/img/SVG_Cowork/linkedin-logo.svg') }}" class="img-fluid" alt="linkedin-logo">
	                                    </a>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="align-self-end justify-content-center w-100 ">
	                            <div class="row pt-sm-5 pt-3 mt-sm-4">
		                            <div class="col-10 mx-auto ">
		                                
		                                <a href="{{ url('personalise') }}" class="btn btn-primary n-bold f-9 rounded-0 ml-md-2 w-100">Back</a>
		                            </div>
		                           
		                        </div>
	                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection