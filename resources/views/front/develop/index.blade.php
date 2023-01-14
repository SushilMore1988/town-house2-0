@extends('front.layouts.app')

@section('content')
	<section class="top-space pt-lg-5 pt-3 under-development">
		<div class="container">
			<div class="row">
				<div class="col-md-9 mx-auto text-center">
					<h2 class="n-bold f-24 text-muted mb-0 pt-2">DEVELOP YOUR PROPERTY</h2>
					<p class="r-lightItalic f-9 text-body pt-2">If you’re interested in developing your property, TH2.0 provides you with design, develop and manage option. List your property and start your business. We design as per your requirement, we manage the users, and we develop your business. Be a part of the 2.0 business community and help us encourage co-living and co-working in cities. </p>
					<!-- <img src="{{url('img/under-construction.svg')}}" alt="" class="under-development-img pt-5 mt-3"> -->
					
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 94.24 116.64" class="under-development-img pt-5 mt-3"><defs><style>.cls-81{fill:#fff;stroke:#010201;stroke-width:0.25px;}.cls-81,.cls-82{stroke-miterlimit:10;}.cls-82{font-size:33.83px;fill:#b2b2b3;stroke:#010101;stroke-width:0.06px;}.cls-82,.cls-83{font-family:nevis-Bold, nevis;font-weight:700;}.cls-83{font-size:9px;fill:#999;}</style></defs><title>Asset 2</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-81" x="0.12" y="0.13" width="93.99" height="93.99"/><text class="cls-82" transform="translate(21.75 40.88)">TH <tspan x="-1.56" y="36.9">2.0</tspan></text><text class="cls-83" transform="translate(6.63 112.27)">TOWNHOUSE 2.0</text></g></g></svg>
				</div>
			</div>
		</div>
		<div class="container py-3">
			<div class="row">
				<div class="col-lg-9 mx-auto">
					<form class="register-form pb-3 pt-3">
					  	<div class="row pt-sm-4 pt-3 mt-sm-4">
							<div class="col-6 ">
								<a href="{{ url()->previous() }}" class="btn btn-success n-bold f-9 rounded-0 w-100">Back</a>
							</div>
							<div class="col-6 ">
								<a href="{{ route('property.create') }}" {{-- onclick="window.location.href='tell-about-your-properties.html';" --}} class="btn btn-success n-bold f-9 rounded-0 ml-md-2 w-100" >Submit</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- <img src="../../img/under-construction-banner.png"  class="w-100"> -->
	</section>
@endsection

@section('js')	
	<script src="{{ url('front/js/main.js') }}" type="text/javascript" charset="utf-8" async defer></script>
@endsection