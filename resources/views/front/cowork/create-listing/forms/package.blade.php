@php
// dd($coWorkSpace->cwsPackage->package_id);
	$package_currency = 'USD';
    if(strtolower(trim($coWorkSpace->country->name)) == 'india'){
        $package_currency = 'INR';
    }
@endphp
<div class="tab-pane package-tab pt-0 border-tabs @if($current_tab == 'package') active @endif" id="package" role='tabpanel'>
	<div class="d-flex flex-column term-condition-wrapper" >
		<div>
			@if(session()->has('message'))
				 <p class="alert alert-success time-out-alert">{{session()->get('message')}}</p>
			@elseif(session()->has('error'))
				 <p class="alert alert-danger time-out-alert">{{session()->get('error')}}</p>
			@endif
		</div>
		{{-- {!! Form::open([ 'route' => 'co-work-space.terms-package-page', 'id' => 'packageForm']) !!}
		{!! Form::hidden('coWorkSpaceId', $coWorkSpace->id)!!}
		{!! Form::hidden('name', $coWorkSpace->user->fname)!!}
		{!! Form::hidden('email',$coWorkSpace->user->email)!!}
		{!! Form::hidden('phone', $coWorkSpace->user->phone)!!}
		{!! Form::hidden('currency', 'USD')!!} --}}
		
		{{-- <div class="row">
			@foreach($packages as $package)
				@php
				$package_amount = $package->packageAmounts()->where('currency', $package_currency)->first();
				@endphp
				{{-- @if(($loop->first))
					<input type="hidden"  id="selected-package-id" name="selectedPackageId" value="@if($coWorkSpace->cwsPackage) {{$coWorkSpace->cwsPackage->package_id}} @endif">
				@endif -}}
			@if($package->id == 1)
				<div class="col-12 package" data-id="{{$package->id}}" data-amount="{{$package_amount->amount}}">
					<div class="row @if(!$coWorkSpace->cwsPackage)light-bg @endif package @if($coWorkSpace->cwsPackage && $coWorkSpace->cwsPackage->package_id == $package->id) light-bg @endif">
					<div class="col-sm-3 pt-3" style="overflow: hidden;" data-id="{{$package->id}}">
						<div class="package-container">
							<h2 class="r-boldItalic f-24 check-label mb-3 position-relative d-inline-block"><a href="javascript:void(0)" class="close-cross"></a>{{$package_currency == 'inr' ? '₹2249' : '$33'}}/month</s></h2>
							<ul class="pl-0">
								<li>
									<p class="r-lightItalic f-9 check-label"> <i class="fas fa-circle"></i>  Web Listing on TH2.0</p>
								</li>					
							</ul>
						 	
						</div>
						 	
					</div>
					<div class="col-sm-9 bg-yellow pt-3" data-id="{{$package->id}}">
						<div class="package-container">
							<h2 class="r-boldItalic f-24 check-label mb-3">{{-- $5/month -}} {{$package_amount->sign.$package_amount->amount}}/month <small>(For the first 3 months)</small></h2>
							<ul class="pl-0">
								<li>
									<p class="r-lightItalic f-9 check-label"> <i class="fas fa-circle"></i> Access all Website features for the first 3 months at {{$package_amount->sign.$package_amount->amount}} Only. List, Book, Browse, Enquire and be a member of TH2.0</p>
								</li>
							</ul>
						</div>
					</div>
					</div>
				</div>
			@elseif($package->id != 2)
				<div class="col-sm-12 @if(!($loop->first))py-3 @endif @if($coWorkSpace->cwsPackage && $coWorkSpace->cwsPackage->package_id == $package->id) light-bg @endif package" data-id="{{$package->id}}" data-amount="{{$package_amount->amount}}">
					<div class="package-container">
						<h2 class="r-boldItalic f-24 check-label">{{-- {{$package->package_name}} -}}{{$package_amount->sign.$package_amount->amount}}/month</h2>
						<ul class="pl-0">
							@foreach($package->packagePoints as $points)
							<li>
								<p class="r-lightItalic f-9 check-label"> <i class="fas fa-circle"></i> {{$points->points}}</p>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			@endif
			@endforeach
		</div> --}}
		<div class=" ">
			<div class="row">
				<table class="table table-borderless mb-0">
					<thead>
						<tr class="border-left border-right border-top">
							<td style="width: 52%" class="align-middle">
								<h6 class="r-boldItalic f-9 check-label">Available Packages</h6>
							</td>
							<td style="width: 16%" class="align-middle border-left text-center package-1">
								<h4 class="r-boldItalic f-9 text-body">Starter</h4>
							</td>
							<td style="width: 16%" class="align-middle border-left text-center package-2">
								<h4 class="r-boldItalic f-9 text-body">Professional</h4>
							</td>
							<td style="width: 16%" class="align-middle border-left text-center package-3">
								<h4 class="r-boldItalic f-9 text-body">Business</h4>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr class="border-left border-right">
							<td class="align-middle">
								<h6 class="r-boldItalic f-9 check-label">Subcription Amount</h6>
							</td>
							<td class="align-middle border-left text-center package-1">
								<div class="">
									<h2 class="r-boldItalic f-24 check-label">
										{{ $package_currency == 'USD' ? '$119.88' : '₹999' }}
									</h2>
									<h4 class="r-boldItalic f-9 text-body">/year</h4>
								</div>
							</td>
							<td class="align-middle border-left text-center package-2">
								<div class="">
									<h2 class="r-boldItalic f-24 check-label">
										{{ $package_currency == 'USD' ? '$239.88' : '₹3399' }}
									</h2>
									<h4 class="r-boldItalic f-9 text-body">/year</h4>
								</div>
							</td>
							<td class="align-middle border-left text-center package-3">
								<div class="">
									<h2 class="r-boldItalic f-24 check-label">
										{{ $package_currency == 'USD' ? '$479.88' : '₹4999' }}
									</h2>
									<h4 class="r-boldItalic f-9 text-body">/year</h4>
								</div>
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="pb-0 align-middle">
								<h6 class="r-boldItalic f-9 check-label">Listing Catalogue</h6>
							</td>
							<td class="pb-0 align-middle border-left text-center package-1"></td>
							<td class="pb-0 align-middle border-left text-center package-2"></td>
							<td class="pb-0 align-middle border-left text-center package-3"></td>
						</tr>
						<tr class="border-left border-right">
							<td class="py-0 align-middle">
								<li class="r-boldItalic f-9 text-body ">Get listed in the Catalogue Pages</li>
							</td>
							<td class="py-0 align-middle border-left text-center package-1">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="py-0 align-middle border-left text-center package-2">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
							<td class="py-0 align-middle border-left text-center package-3">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="pb-3 align-middle">
								<li class="r-boldItalic f-9 text-body ">Tile Visibility with Logo/Venue Icons</li>
							</td>
							<td class="pb-3 align-middle border-left text-center package-1">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
							<td class="pb-3 align-middle border-left text-center package-2">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
							<td class="pb-3 align-middle border-left text-center package-3">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="pb-0 align-middle">
								<h6 class="r-boldItalic f-9 check-label">Recommendation & Search Results</h6>
							</td>
							<td class="pb-0 align-middle border-left text-center package-1"></td>
							<td class="pb-0 align-middle border-left text-center package-2"></td>
							<td class="pb-0 align-middle border-left text-center package-3"></td>
						</tr>
						<tr class="border-left border-right">
							<td class="py-0 align-middle">
								<li class="r-boldItalic f-9 text-body ">Search Result Priority</li>
							</td>
							<td class="py-0 align-middle border-left text-center package-1">
								<h4 class=" r-boldItalic f-9 text-body">Low</h4>
							</td>
							<td class="py-0 align-middle border-left text-center package-2">
								<h4 class=" r-boldItalic f-9 text-body">Average</h4>
							</td>
							<td class="py-0 align-middle border-left text-center package-3">
								<h4 class=" r-boldItalic f-9 text-body">High</h4>
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="pb-3 align-middle">
								<li class="r-boldItalic f-9 text-body ">Venue Recommendation with respect to User Location</li>
							</td>
							<td class="pb-3 align-middle border-left text-center package-1">
								<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="pb-3 align-middle border-left text-center package-2">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
							<td class="pb-3 align-middle border-left text-center package-3">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="pb-0 align-middle">
								<h6 class="r-boldItalic f-9 check-label ">Venue Details and Previews</h6>
							</td>
							<td class="pb-0 align-middle border-left text-center package-1"></td>
							<td class="pb-0 align-middle border-left text-center package-2"></td>
							<td class="pb-0 align-middle border-left text-center package-3"></td>
						</tr>
						<tr class="border-left border-right">
							<td class="py-0 align-middle">
								<li class="r-boldItalic f-9 text-body ">Preview Image Limitations</li>
							</td>
							<td class="py-0 align-middle border-left text-center package-1"><h4 class=" r-boldItalic f-9 text-body">6</h4></td>
							<td class="py-0 align-middle border-left text-center package-2"><h4 class=" r-boldItalic f-9 text-body">No Limits</h4></td>
							<td class="py-0 align-middle border-left text-center package-3"><h4 class=" r-boldItalic f-9 text-body">No Limits</h4></td>
						</tr>
						<tr class="border-left border-right">
							<td class="pb-0 align-middle">
								<li class="r-boldItalic f-9 text-body ">Address and Map Visibility</li>
							</td>
							<td class="pb-0 align-middle border-left text-center package-1">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
							<td class="pb-0 align-middle border-left text-center package-2">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
							<td class="pb-0 align-middle border-left text-center package-3">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="pb-0 align-middle">
								<li class="r-boldItalic f-9 text-body ">Links to Social Media Account</li>
							</td>
							<td class="pb-0 align-middle border-left text-center package-1">
								<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="pb-0 align-middle border-left text-center package-2">
								<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="pb-0 align-middle border-left text-center package-3">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="pb-3 align-middle">
								<li class="r-boldItalic f-9 text-body ">Advertising Events on Business Page</li>
							</td>
							<td class="pb-3 align-middle border-left text-center package-1">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
							<td class="pb-3 align-middle border-left text-center package-2">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
							<td class="pb-3 align-middle border-left text-center package-3">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="align-middle">
								<h6 class="pb-3 r-boldItalic f-9 check-label ">Analysis</h6>
							</td>
							<td class="align-middle border-left text-center package-1"></td>
							<td class="align-middle border-left text-center package-2"></td>
							<td class="align-middle border-left text-center package-3"></td>
						</tr>
						<tr class="border-left border-right">
							<td class="align-middle">
								<li class="r-boldItalic f-9 text-body ">User Data report on the Dashboard</li>
							</td>
							<td class="align-middle border-left text-center package-1">
								<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="align-middle border-left text-center package-2">
								<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="align-middle border-left text-center package-3">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="align-middle">
								<li class="r-boldItalic f-9 text-body ">Data Analysis & Visualization</li>
							</td>
							<td class="align-middle border-left text-center package-1">
								<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="align-middle border-left text-center package-2">
								<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="align-middle border-left text-center package-3">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="align-middle">
								<h6 class="pb-3 r-boldItalic f-9 check-label ">TH2.0 Advantages</h6>
							</td>
							<td class="align-middle border-left text-center package-1"></td>
							<td class="align-middle border-left text-center package-2"></td>
							<td class="align-middle border-left text-center package-3"></td>
						</tr>
						<tr class="border-left border-right">
							<td class="align-middle">
								<li class="r-boldItalic f-9 text-body ">Digital Marketing & Mentions</li>
							</td>
							<td class="align-middle border-left text-center package-1">
								<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="align-middle border-left text-center package-2">
								<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="align-middle border-left text-center package-3">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="align-middle">
								<li class="r-boldItalic f-9 text-body ">Listing Pages / Business Page</li>
							</td>
							<td class="align-middle border-left text-center package-1">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
							<td class="align-middle border-left text-center package-2">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
							<td class="align-middle border-left text-center package-3">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="align-middle">
								<li class="r-boldItalic f-9 text-body ">Post Production of Uploaded Images</li>
							</td>
							<td class="align-middle border-left text-center package-1">
								<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="align-middle border-left text-center package-2">
								<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="align-middle border-left text-center package-3">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="align-middle">
								<li class="r-boldItalic f-9 text-body ">Eligibility for TH2.0 Pass</li>
							</td>
							<td class="align-middle border-left text-center package-1">
								<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="align-middle border-left text-center package-2">
								<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="align-middle border-left text-center package-3">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="align-middle">
								<li class="r-boldItalic f-9 text-body ">Online Booking</li>
							</td>
							<td class="align-middle border-left text-center package-1">
								<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="align-middle border-left text-center package-2">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
							<td class="align-middle border-left text-center package-3">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="align-middle">
								<li class="r-boldItalic f-9 text-body ">Enquiry</li>
							</td>
							<td class="align-middle border-left text-center package-1">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
							<td class="align-middle border-left text-center package-2">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
							<td class="align-middle border-left text-center package-3">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="align-middle">
								<li class="r-boldItalic f-9 text-body ">Unique Rating Index</li>
							</td>
							<td class="align-middle border-left text-center package-1">
								<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="align-middle border-left text-center package-2">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
							<td class="align-middle border-left text-center package-3">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="align-middle">
								<li class="r-boldItalic f-9 text-body ">Venue Categorization</li>
							</td>
							<td class="align-middle border-left text-center package-1">
								<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="align-middle border-left text-center package-2">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
							<td class="align-middle border-left text-center package-3">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="align-middle">
								<li class="r-boldItalic f-9 text-body ">Physical Verification</li>
							</td>
							<td class="align-middle border-left text-center package-1">
								<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img ">
							</td>
							<td class="align-middle border-left text-center package-2">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
							<td class="align-middle border-left text-center package-3">
								<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
							</td>
						</tr>
						<tr class="border-left border-right">
							<td class="align-middle">
								<li class="r-boldItalic f-9 text-body ">Marketing Boosts</li>
							</td>
							<td class="align-middle border-left text-center package-1"><h4 class=" r-boldItalic f-9 text-body">None</h4></td>
							<td class="align-middle border-left text-center package-2"><h4 class=" r-boldItalic f-9 text-body">2 Days/Month</h4></td>
							<td class="align-middle border-left text-center package-3"><h4 class=" r-boldItalic f-9 text-body">5 Days/Month</h4></td>
						</tr>
					</tbody>
				</table>
				{{-- <div class="col-lg-6 border-right py-3 border">
					<h6 class="pb-3 r-boldItalic f-9 check-label mb-0">Available Packages</h6>
					<div class="py-3">
						<h6 class="pb-3 r-boldItalic f-9 check-label mb-0">Subcription Amount</h6>
					</div>
					<div class="py-3">
						<h6 class="pb-3 r-boldItalic f-9 check-label mb-0">Listing Catalogue</h6>
						<ul class="pl-3">
							<li class="r-boldItalic f-9 text-body mb-3">Get listed in the Catalogue Pages</li>
							<li class="r-boldItalic f-9 text-body mb-1">Tile Visibility with Logo/Venue Icons</li>
						</ul>
					</div>
					<div class="py-3">
						<h6 class="pb-3 r-boldItalic f-9 check-label mb-0">Recommendation & Search Results</h6>
						<ul class="pl-3">
							<li class="r-boldItalic f-9 text-body mb-3">Search Result Priority</li>
							<li class="r-boldItalic f-9 text-body mb-1">Venue Recommendation with respect to User Location</li>
						</ul>
					</div>
					<div class="py-3">
						<h6 class="pb-3 r-boldItalic f-9 check-label mb-0">Venue Details and Previews</h6>
						<ul class="pl-3">
							<li class="r-boldItalic f-9 text-body mb-3">Preview Image Limitations</li>
							<li class="r-boldItalic f-9 text-body mb-1">Address and Map Visibility</li>
							<li class="r-boldItalic f-9 text-body mb-1">Links to Social Media Account</li>
							<li class="r-boldItalic f-9 text-body mb-1">Advertising Events on Business Page</li>
						</ul>
					</div>
					<div class="py-3">
						<h6 class="pb-3 r-boldItalic f-9 check-label mb-0">Analysis</h6>
						<ul class="pl-3">
							<li class="r-boldItalic f-9 text-body mb-3">User Data report on the Dashboard</li>
							<li class="r-boldItalic f-9 text-body mb-1">Data Analysis & Visualization</li>
						</ul>
					</div>
					<div class="py-3">
						<h6 class="pb-3 r-boldItalic f-9 check-label mb-0">TH2.0 Advantages</h6>
						<ul class="pl-3">
							<li class="r-boldItalic f-9 text-body mb-3">Digital Marketing & Mentions</li>
							<li class="r-boldItalic f-9 text-body mb-1">Listing Pages / Business Page</li>
							<li class="r-boldItalic f-9 text-body mb-1">Post Production of Uploaded Images</li>
							<li class="r-boldItalic f-9 text-body mb-1">Eligibility for TH2.0 Pass</li>
							<li class="r-boldItalic f-9 text-body mb-1">Online Booking</li>
							<li class="r-boldItalic f-9 text-body mb-1">Enquiry</li>
							<li class="r-boldItalic f-9 text-body mb-1">Unique Rating Index</li>
							<li class="r-boldItalic f-9 text-body mb-1">Venue Categorization</li>
							<li class="r-boldItalic f-9 text-body mb-1">Physical Verification</li>
							<li class="r-boldItalic f-9 text-body mb-1">Marketing Boosts</li>
						</ul>
					</div>
				</div>
				<div class="col-md-2 border border-left-0 py-3 text-center hover-anchor package" data-id="2" data-amount="15">
					<a href="#" class="hover-anchor">
						<h4 class="mb-3 r-boldItalic f-9 text-body">Starter</h4>
						<div class="py-3">
							<h2 class="r-boldItalic f-24 check-label mb-0">$15</h2>
							<h4 class="mb-3 r-boldItalic f-9 text-body">/year</h4>
						</div>
						<div class="py-4">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
						</div>
						<div class="py-5">
							<h4 class="mb-1 r-boldItalic f-9 text-body">Low</h4>
							<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img mb-2">
						</div>
						<div class="py-5">
							<h4 class="mb-1 r-boldItalic f-9 text-body">6</h4>
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
						</div>
						<div class="py-5">
							<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img mb-2">
						</div>
						<div class="py-5">
							<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img mb-2">
							<h4 class="mb-1 r-boldItalic f-9 text-body">None</h4>
						</div>
					</a>
				</div>
				<div class="col-md-2 border border-left-0 py-3 text-center hover-anchor package" data-id="3" data-amount="49">
					<a href="#" class="hover-anchor">
						<h4 class="mb-3 r-boldItalic f-9 text-body">Professional</h4>
						<div class="py-3">
							<h2 class="r-boldItalic f-24 check-label mb-0">$49</h2>
							<h4 class="mb-3 r-boldItalic f-9 text-body">/year</h4>
						</div>
						<div class="py-4">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
						</div>
						<div class="py-5">
							<h4 class="mb-1 r-boldItalic f-9 text-body">Average</h4>
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							
						</div>
						<div class="py-5">
							<h4 class="mb-1 r-boldItalic f-9 text-body">No Limits</h4>
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
						</div>
						<div class="py-5">
							<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img mb-2">
						</div>
						<div class="py-5">
							<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/close-icon.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<h4 class="mb-1 r-boldItalic f-9 text-body">2 Days/Month</h4>
						</div>
					</a>
				</div>
				<div class="col-md-2 py-3 text-center border border-left-0 hover-anchor package" data-id="4" data-amount="69">
					<a href="#" class="hover-anchor">
						<h4 class="mb-3 r-boldItalic f-9 text-body">Business</h4>
						<div class="py-3">
							<h2 class="r-boldItalic f-24 check-label mb-0">$69</h2>
							<h4 class="mb-3 r-boldItalic f-9 text-body">/year</h4>
						</div>
						<div class="py-4">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img">
						</div>
						<div class="py-5">
							<h4 class="mb-1 r-boldItalic f-9 text-body">High</h4>
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							
						</div>
						<div class="py-5">
							<h4 class="mb-1 r-boldItalic f-9 text-body">No Limits</h4>
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
						</div>
						<div class="py-5">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
						</div>
						<div class="py-5">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<img src="{{url('/img/check-images-2.png')}}" alt="check-images-2" class="check-img mb-2">
							<h4 class="mb-1 r-boldItalic f-9 text-body">5 Days/Month</h4>
						</div>
					</a>
				</div> --}}
			</div>
			<div class="row border">
				<div class="bg-yellow p-3">
					<div class="package-container">
						<h2 class="r-boldItalic f-24 check-label mb-3"><small>Free Additional Services only for Trial Period (21 Days)</small></h2>
						<ul class="pl-0">
							<li>
								<p class="r-lightItalic f-9 check-label"> <i class="fas fa-circle"></i> Online Booking | Venue categorization | U.R.I | Links to Social Media | Venue Recommendation with respect to User Location | Marketing Boosts </p>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
			{{-- <div class="align-items-end justify-content-center d-flex list-space-button subscription-responsive w-100"> --}}
				{{-- <div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5 w-100"> --}}
					<button type="button" class="btn btn-success n-bold f-9 rounded-0 w-100 next-terms-page" >START YOUR TRIALS & SUBSCRIBE TO TH2.0</button>
				{{-- </div> --}}
			</div>
			
		</div>
		{{-- {!!Form::close()!!} --}}
	</div>
</div>