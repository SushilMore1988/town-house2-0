@extends('front.layouts.app')

@section('content')
<section class="text-box-wrapper">
	<div class="container ">
		<div class="test-box  commonSecond-mt d-md-flex h-100 py-md-0 py-5 w-100">
			<div class="row  justify-content-center align-self-center w-100 mx-sm-auto mx-0 ">
				<div class="col-md-10 mx-auto px-0 py-5">
					<div class=" shadow border-0 w-100">
				        <div class="success px-sm-5 px-3  py-4 text-center d-block">
				        	<img src="{{url('/img/error.png')}}" class="img-fluid success-img">
				        	<p class="r-regular f-21 common-clr py-3">Thank you for using Town House. Your payment is failed. Please try again.</p>
				        	
				        	<a href="{{ route('front.dashboard.index')}}"  class="btn btn-success n-bold f-9 rounded-0 ml-md-2 px-5">Go To Dashboard</a>
				        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection