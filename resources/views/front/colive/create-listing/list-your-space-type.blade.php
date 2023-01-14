@extends('front.layouts.app')

@section('content')
	<section class="top-space pt-lg-5 pt-5">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h2 class="n-bold f-24 text-muted mb-0">LIST YOUR SPACE</h2>
					<p class="r-lightItalic f-9 text-body">Select the type of space/property you intend to list. </p>
				</div>
			</div>
		</div>
	</section>
	<section class="py-md-0 py-3 list-space-card">
		<div class="container d-flex h-100">
			<div class="row justify-content-center align-content-center align-items-center align-self-center w-100">
				<div class=" mx-auto col-lg-11">
					<div class="row py-4">
						<div class="col-lg-4 col-md-6 mx-auto" onclick="window.location.href='{{route('co-live-space.create',['type' => 'apartment/flat'])}}';">
							<div class="card d-flex h-100  rounded-0">
								<div class="card-body align-self-center align-content-center">
									<div class="text-center img-grp d-flex">
										<img src="{{url('/img/SVG_Cowork/co-work-space-listing.svg')}}" class="img-fluid h-auto align-self-center mx-auto w-75" alt="co-work-space-listing" />
									</div>
									<div class="border text-center p-3">
										<h2 class="n-bold f-24 text-dark pb-1">01</h2>
										<!-- <div class=" w-100"> -->
										<h4 class="n-bold f-14 text-dark pb-1">APARTMENT / <br class="d-lg-block d-none"/>FLAT </h4>
										<!-- </div> -->
									
										<p class="text-secondary r-lightItalic f-8 text-center">List your property with us to find the users willing to share and co-live.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 mx-auto mt-md-0 mt-4" onclick="window.location.href='{{route('co-live-space.create',['type' => 'co-living space/hostel'])}}';">
							<div class="card d-flex h-100  rounded-0">
								<div class="card-body align-self-center align-content-center">
									<div class="text-center img-grp d-flex">
										<img src="{{url('/img/SVG_Cowork/private-co-worker.svg')}}" class="img-fluid align-self-center mx-auto w-75" alt="private-co-worker" />
									</div>
									<div class="border text-center py-3 px-2">
										<!-- <div class="d-flex arrow"> -->
												<h2 class="n-bold f-24 text-dark pb-1">02</h2>
											<!-- <div class="w-100">  -->
												<h4 class="n-bold f-14 text-dark pb-1">CO-LIVING SPACE / <br class="d-lg-block d-none" /> HOSTEL</h4>
											<!-- </div> -->
										<!-- </div> -->
										<p class="text-secondary r-lightItalic f-8 text-center">List your private property to find co-working mates with mutual objectives</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 mx-auto mt-lg-0 mt-4" onclick="window.location.href='{{route('co-live-space.create',['type' => 'host/paying guest'])}}';">
							<div class="card d-flex h-100  rounded-0">
								<div class="card-body align-self-center align-content-center">
									<div class="text-center img-grp d-flex">
										<img src="{{url('/img/SVG_Cowork/hotel-meeting-rooms-listing.svg')}}" class="img-fluid align-self-center mx-auto w-75" alt="hotel-meeting-rooms-listing" />
									</div>
									<div class="border text-center p-3">
										<!-- <div class="d-flex arrow"> -->
												<h2 class="n-bold f-24 text-dark pb-1">03</h2>
											<!-- <div class="w-100">  -->
												<h4 class="n-bold f-14 text-dark pb-1">HOST / <br class="d-lg-block d-none"/> PAYING GUEST (P.G.)</h4>
											<!-- </div> -->
										<!-- </div> -->
										<p class="text-secondary r-lightItalic f-8 text-center">List your property with us to find the best sharing partners willing to share and co-live.</p>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection