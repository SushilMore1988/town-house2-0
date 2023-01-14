@extends('front.layouts.app')

@section('content')
<section class="top-space under-development">
	<div class="container">
		<div class="row d-flex pb-5 ">
			<div class="col-md-9 mx-auto text-center align-self-start pt-lg-5 pt-3 ">
				<h2 class="n-bold f-24 text-muted mb-0 pt-2">TH2.0 NETWORK</h2>
				<p class="r-lightItalic f-9 text-body pt-2">A Log of allthe networks . Build Save and Rate your Experinces</p>
			</div>
			<div class="col-lg-9 mx-auto align-self-center justify-items-center d-flex pt-lg-5 pt-3 ">
				<div class="services commute-opinion mx-auto">
				  	<div class="row  ">
						<div class="col-lg-4 col-md-4 col-sm-6 mx-lg-auto">
							<label for="co-living" class="mx-auto">
								<input class="work-checkbox" type="radio" name="service" id="co-living" value="option5">
								<div class="box share-opinion d-flex flex-column justify-content-center">
									<img class="rounded mx-auto align-self-center co-work-original" src="{{url('/img/co-living/network/all-network.svg')}}" alt="all-network.svg">
									<img class="rounded mx-auto align-self-center co-work-focus" src="{{url('/img/co-living/network/hover-all-network.svg')}}" alt="hover-all-network.svg">
									<h6 class="mt-3 r-boldItalic f-9 text-center">All Networks</h6>
								</div>
							</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mx-lg-auto">
							<label for="co-working" class="mx-auto">
								<input class="work-checkbox" type="radio" name="service" id="co-working" value="option6">
								<div class="box share-opinion d-flex flex-column justify-content-center">
									<img class="rounded mx-auto align-self-center co-work-original" src="{{url('/img/co-living/network/saved-network.svg')}}" alt="saved-network.svg">
									<img class="rounded mx-auto align-self-center co-work-focus" src="{{url('/img/co-living/network/hover-saved-network.svg')}}" alt="hover-saved-network.svg">
									<h6 class="mt-3 r-boldItalic f-9 text-center">Saved Networks</h6>
								</div>
							</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mx-lg-auto ">
							<label for="both">
								<input class="work-checkbox" type="radio" name="service" id="both" value="option7">
								<div class="box share-opinion d-flex flex-column justify-content-center" onclick="window.location.replace('{{route('th-network.create')}}')">
									<img class="rounded mx-auto align-self-center co-work-original" src="{{url('/img/co-living/network/new-network.svg')}}" alt="new-network.svg">
									<img class="rounded mx-auto align-self-center co-work-focus" src="{{url('/img/co-living/network/hover-new-network.svg')}}" alt="hover-new-network.svg">
									<h6 class="mt-3 r-boldItalic f-9 text-center">New Network</h6>
								</div>	
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
	<section class="pb-4 home-card py-5 bg-color">
        <div class="container">
            <div>
                <div class="mx-auto text-center align-self-start py-lg-3 pt-3 ">
					<h2 class="n-bold f-24 text-muted mb-0 pt-2">ALL NETWORKS</h2>
					<p class="r-lightItalic f-9 text-body pt-2">All the saved and networked Communities. Rate your community for<br> a better and more accurate predictions</p>
				</div>
                <div class="row">
					@foreach($communityGroups as $communityGroup)
                    <div class="mb-3 col-md-4 col-sm-6 card-wrapper pr-sm-0">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <div class="right-box w-100">
                                    <div class="card-text">
                                        <div class="card-text-left-box d-flex flex-column w-100 ">
                                            <div class="mb-1">
                                                <h4 class="n-bold text-dark text-uppercase f-20">{{ $communityGroup->name }}</h4>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                            	<div class="w-50">
                                            		<p class="r-lightItalic f-9 ">{{ $communityGroup->memberNames }}</p>
                                            	</div>
                                            	<div class="w-50 mx-auto text-center">
                                            		{{-- <h6 class="r-boldItalic f-9 text-light">Venue Name</h6> --}}
                                                	<h6 class="r-lightItalic f-9 text-light text-center">{{ ucfirst($communityGroup->hdyk) }}</h6>
                                            	</div>
                                            </div>
                                             <div class="d-flex justify-content-between">
                                            	<div class="w-50">
                                            		<h6 class="r-boldItalic f-9 text-light">Community Rating</h6>
                                            	</div>
                                            	<div class="w-50 mx-auto text-right">
                                            		<div class="row w-100 ml-auto">
								     					<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
															<input type="checkbox" {{ $communityGroup->rating >= 1 ? 'checked="checked"' : '' }} name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
									     				<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
															<input type="checkbox" {{ $communityGroup->rating >= 2 ? 'checked="checked"' : '' }} name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
															<input type="checkbox" {{ $communityGroup->rating >= 3 ? 'checked="checked"' : '' }} name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
															<input type="checkbox" {{ $communityGroup->rating >= 4 ? 'checked="checked"' : '' }} name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
															<input type="checkbox" {{ $communityGroup->rating >= 5 ? 'checked="checked"' : '' }} name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
															<input type="checkbox" {{ $communityGroup->rating >= 6 ? 'checked="checked"' : '' }} name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
															<input type="checkbox" {{ $communityGroup->rating >= 7 ? 'checked="checked"' : '' }} name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
															<input type="checkbox" {{ $communityGroup->rating >= 8 ? 'checked="checked"' : '' }} name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
															<input type="checkbox" {{ $communityGroup->rating >= 9 ? 'checked="checked"' : '' }} name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
														<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
															<input type="checkbox" {{ $communityGroup->rating >= 10 ? 'checked="checked"' : '' }} name="Desk-quality">
															<span class="checkmark checkbox-checkmark"></span>
														</label>
													</div>
                                            	</div>
                                            </div>
                                        </div>
                                        <div class="clearfix"> 
                                            <a class="btn btn-info n-bold f-9 text-muted rounded-0 mt-3 float-right border-0 px-5 py-2" href="{{url('/th-networks/group/'.$communityGroup->slug)}}">DETAILS</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					@endforeach
                </div>
            </div>
            
            
        </div>
    </section>
@endsection

@section('js')
	<script>
		$(document).ready(function(){
			$('.co-work-focus').hide();
			$(".work-checkbox").change(function () {
				$('.co-work-original').show();
			    $('.co-work-focus').hide();
			    if ($(this).is(':checked')) {
			    	$(this).parent().find('.co-work-original').hide();
			    	$(this).parent().find('.co-work-focus').show();
			    }else{
			       $(this).parent().find('.co-work-original').show();
			    	$(this).parent().find('.co-work-focus').hide();
			    }
			});
		});
		
	</script>
@endsection