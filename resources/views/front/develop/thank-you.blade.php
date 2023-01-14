@extends('front.layouts.app')

@section('content')
	<section class="top-space">
		<div class="container">
			<div class="row d-flex min-height">
				<div class="col-md-10 mx-auto text-center align-self-start">
					<h2 class="n-bold f-24 text-muted mb-0 pt-5">THANK YOU !</h2>
					<p class="r-lightItalic f-9 text-body">Welcome to the TH2.0 Business community. We shall coonect with you on the provided details. Expect the best from us.   </p>
					
				</div>
				<div class="col-md-10 mx-auto text-center align-self-end mb-4">
					<div class="row pt-sm-5 pt-3 mt-sm-5 ">
						<div class="col-6 ">
							<button type="button" class="btn btn-success n-bold f-9 rounded-0 w-100">QUIT</button>
						</div>
						<div class="col-6 ">
							<a href='{{route('co-live')}}' class="btn btn-success n-bold f-9 rounded-0 ml-md-2 w-100">HOMEPAGE</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('js')	
	<script src="{{ url('/front/js/main.js') }}" type="text/javascript" charset="utf-8" async defer></script>
@endsection