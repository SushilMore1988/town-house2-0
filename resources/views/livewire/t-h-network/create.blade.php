<div>
    @if($showCommunityIndex)
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
                                    <a href="javascript:void(0)" wire:click="$set('showCommunityIndex', false)" class="btn btn-primary n-bold f-9 rounded-0 ml-md-2 w-100">Back</a>
                                </div>
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container">
		{{-- {!! Form::open(['route' => 'th-network.show']) !!} --}}
        <form wire:submit.prevent="show">
			<div class="row d-flex pb-5 ">
				<div class="col-md-9 mx-auto text-center align-self-start pt-lg-5 pt-3 ">
					<h2 class="n-bold f-24 text-muted mb-0 pt-2">NEW NETWORK</h2>
					<p class="r-lightItalic f-9 text-body pt-2">Build a new Network with a community or an individual</p>
				</div>
				<div class="col-lg-9 mx-auto align-self-center justify-items-center d-flex pt-lg-5 pt-3 ">
					<div class="services commute-opinion mx-auto">
						<p class="r-boldItalic f-9 text-body text-center">You’re Building a new network with :</p>
						<div class="row  ">
							<div class="col-lg-4 col-md-4 col-sm-6 mx-lg-auto">
								<label for="co-living" class="mx-auto">
									<input class="work-checkbox" type="radio" name="network_type" id="co-living" value="Individual" wire:model="network_type">
									<div class="box share-opinion d-flex flex-column justify-content-center">
                                        @if($network_type == 'Individual')
										<img class="rounded mx-auto align-self-center co-work-focus" src="{{url('/img/co-living/network/hover-all-network.svg')}}" alt="hover-all-network.svg">
                                        @else
										<img class="rounded mx-auto align-self-center co-work-original" src="{{url('/img/co-living/network/all-network.svg')}}" alt="all-network.svg">
                                        @endif
										<h6 class="mt-3 r-boldItalic f-9 text-center">Individual</h6>
									</div>
								</label>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 mx-lg-auto">
								<label for="co-working" class="mx-auto">
									<input class="work-checkbox" type="radio" name="network_type" id="co-working" value="Group" wire:model="network_type">
									<div class="box share-opinion d-flex flex-column justify-content-center">
                                        @if($network_type == 'Group')
										<img class="rounded mx-auto align-self-center co-work-focus" src="{{url('/img/co-living/network/hover-saved-network.svg')}}" alt="hover-saved-network.svg">
                                        @else
										<img class="rounded mx-auto align-self-center co-work-original" src="{{url('/img/co-living/network/saved-network.svg')}}" alt="saved-network.svg">
                                        @endif
										<h6 class="mt-3 r-boldItalic f-9 text-center">Group / Community</h6>
									</div>
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9 mx-auto mt-5">
                    @if($network_type == 'Individual')
					<div class="row">
						<div class="col-md-12">
							{!! Form::text('th_id', null, ['class' => 'r-lightItalic f-9 text-body mb-0 form-control', 'placeholder' => 'TH2.0 ID', 'wire:model' => 'th_id']) !!}
							@error('th_id')
								<span class="invalid-feedback d-block mb-2">{{$message}}</span>
							@enderror
						</div>
					</div>
                    @else
                    <div class="row">
						<div class="col-md-12">
							{!! Form::text('th_ids[]', null, ['class' => 'r-lightItalic f-9 text-body mb-0 form-control', 'placeholder' => 'TH2.0 ID', 'wire:model' => 'th_ids']) !!}
							@error('th_ids')
								<span class="invalid-feedback d-block mb-2">{{$message}}</span>
							@enderror
						</div>
					</div>
                    <div class="form-group">
                        <div class="input-group mb-3 position-relative">
                            <input id="group_name" placeholder="Your Cult / Group Name  (Save for Future Networks) Optional" class="form-control about-percent commonClass mb-0" wire:model="group_name" name="group_name" type="text">
                            <div>
                                <a href="javascript:void(0)" class="input-group-append btn-warning verify-img d-block" style="cursor: pointer;" wire:click="storeGroupName()">
                                    <i class="email-loader d-none input-group-text btn-warning f-8 n-bold w-100">
                                        <div class="spinner-border text-white spinner-border-sm mx-auto" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </i>
                                    <svg id="email-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.28 22.41" class="w-100"><defs><style>.cls-41{fill:#f90;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-42{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}@import  url("https://www.urbanfonts.com/fonts/nevis_Bold.font");</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-41" width="87.27" height="22.4"></rect><text class="cls-42" transform="translate(24.45 15.41)">SAVE</text></g></g></svg>
                                </a>      
                            </div>
                        </div>
                        @error('group_name')
                            <span class="invalid-feedback d-block mb-2">{{$message}}</span>
                        @enderror
                    </div>
                    @endif
					<p class="r-boldItalic f-9 text-body text-center pt-5">How do you know the Individaual / Community ?</p>
																				
					<div class="row py-2 ">
						<div class="col-lg-2 col-sm-6 mb-3 mb-lg-0 mx-auto "> 
							<label class="container-2 r-lightItalic f-8">Friends
								<input class="facilities-percent" name="hdyk" type="radio" value="friend" wire:model="hdyk">
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="col-lg-2 col-sm-6 mb-3 mb-lg-0 mx-auto px-sm-0"> 
							<label class="container-2 r-lightItalic f-8 check-label r-lightItalic  f-9 check-label">Strangers / Mutuals 
								<input class="facilities-percent" checked="checked" name="hdyk" type="radio" value="stranger" wire:model="hdyk">
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="col-lg-2 col-sm-6 mb-3 mb-lg-0 mx-auto px-sm-0"> 
							<label class="container-2 r-lightItalic f-8"> Family Members	 
								<input class="facilities-percent" name="hdyk" type="radio" value="family" wire:model="hdyk">
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="col-lg-2 col-sm-6 mb-3 mb-lg-0 mx-auto"> 
							<label class="container-2 r-lightItalic f-8">Cult Members
								<input class="facilities-percent" name="hdyk" type="radio" value="cult" wire:model="hdyk">
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="col-lg-2 col-sm-6 mb-3 mb-lg-0 mx-auto"> 
							<label class="container-2 r-italicLight f-8">Others 
								<input class="facilities-percent other-facility" name="hdyk" type="radio" value="other" wire:model="hdyk">
								<span class="checkmark"></span>
							</label>
						</div>
                        @error('hdyk')
                            <span class="invalid-feedback d-block mb-2">{{$message}}</span>
                        @enderror
					</div>
				</div>
				<div class="col-lg-9 mx-auto mt-4 align-self-end">
					
					<div class="row">
						@auth
							<div class="col-12">
								<button type="submit" class="btn btn-primary n-bold f-9 rounded-0 ml-md-2 w-100">NETWORK</button>
							</div>
						@else
							<div class="col-12">
								<button type="button" class="btn btn-primary n-bold f-9 rounded-0 w-100">REGISTER</button>
							</div>
						@endauth
					</div>
				</div>
			</div>
		</form>
	</div>
    @endif
</div>
