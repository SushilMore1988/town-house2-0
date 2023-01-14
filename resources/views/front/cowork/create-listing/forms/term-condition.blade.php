<div class="tab-pane pt-3 border-tabs @if($current_tab == 'term-condition') active @endif" id="term-condition" role="tabpanel">
	<div class="d-flex flex-column term-condition-wrapper" >
		<div class="align-self-start">
			<h6 class="pb-2 r-boldItalic f-9 check-label mb-0">Select your Business Model</h6>
			<p class="label r-lightItalic f-9 check-label">TH2.0 offers several Business models which could suit your business</p>

			<div id="accordion" class="formAccordian-list-space">
				<div class="card">
					<button href="#collapseThree" class="form-group mb-0 main-anch collapsed card-header rounded-0 border-0" data-toggle="collapse" data-target="#collapseThree" id="headingThree">
						<label class="container-2  r-boldItalic f-9 check-label mb-0 d-flex">Customised Model
							<input type="checkbox" name="customizedRadio" id="customizedRadio" @if($coWorkSpace->customized) checked="true" @endif value="Yes">
							<span class="checkmark"></span>
						</label>
					</button>
					
					<div id="collapseThree" class="collapse collapse-tab" aria-labelledby="headingThree" data-parent="#accordion">
						<div class="card-body  pt-0 pb-5">
							<ul class="px-3">
								<li class="pb-1 r-Italic f-9 check-label mb-0">Select this option for a customised business model.Our team would reach you in 24 Hours.A custom agreement would be formed for our assicaition and a copy of signed documents would be uploaded below:</li>
							</ul>
							<div class="d-flex">
								<img src="{{url('/img/pdf-logo.svg')}}" class="img-fluid dpf-image" alt="" />
								<h6 class="pb-1 r-Italic f-9 check-label mb-0 pl-4 align-self-center">TH2.0 Custom Agreement : The Third Space _Pune_India_2020_01_07.</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<h6 class="r-boldItalic f-9 check-label mb-4 pt-5">Terms and Conditions</h6>
			<div class="terms-wrapper mx-3 px-3 py-4 border ">
				<div class="content longEnough terms-condition-scroll mCustomScrollbar r-italic f-9 check-label" data-mcs-theme="dark">
					@if(isset($coWorkSpace->address['address']))
					{!! str_replace('[SUBSCRIPTION_FEES]', '<span id="subscription_fees"></span>', str_replace('[SERVICE_CHARGE_PERCENTAGE]', $priceSetting->price, str_replace('[ADDR]', $coWorkSpace->address['address'], str_replace('[PHONE]', $coWorkSpace->user->phone, str_replace('[EMAIL]', $coWorkSpace->user->email, str_replace('[NAME]', $coWorkSpace->user->fname.' '.$coWorkSpace->user->lname, str_replace('[TERMS_CONDITION_LINK]', 'https://th2-0.com/terms-and-conditions', str_replace('[PRIVACY_POLICY_LINK]', 'https://th2-0.com/privacy-policy', $terms->content)))))))) !!}
					@endif
				</div>
			</div>
		</div>
			
		<div class="align-items-end justify-content-center d-flex list-space-button term-condition-responsive">
			{!! Form::open([ 'route' => 'co-work-space.show-subscription','class' => 'align-self-end w-100', 'id' => 'packageForm']) !!}
			{{-- {!! Form::open([ 'route' => 'co-work-space.listing-paypal-payment','class' => 'align-self-end w-100', 'id' => 'packageForm']) !!} --}}
			{!! Form::hidden('cws_id', $coWorkSpace->id)!!}
			{!! Form::hidden('coWorkSpaceId', $coWorkSpace->id)!!}
			{!! Form::hidden('name', $coWorkSpace->user->fname)!!}
			{!! Form::hidden('email',$coWorkSpace->user->email)!!}
			{!! Form::hidden('phone', $coWorkSpace->user->phone)!!}
			{!! Form::hidden('selectedPackageId', empty($coWorkSpace->cwsPackage) ? 1 : $coWorkSpace->cwsPackage->package_id, ['class' => 'selected-package-id', 'id' => 'selected-package-id'])!!}
			{!! Form::hidden('selectedPackageAmount', empty($coWorkSpace->cwsPackage) ? 0 : $coWorkSpace->cwsPackage->amount, ['class' => 'selected-package-amount', 'id' => 'selected-package-amount']) !!}
			@if(strtolower(trim($coWorkSpace->country->name)) == 'india')	
				{!! Form::hidden('currency', 'INR') !!}
			@else
				{!! Form::hidden('currency', 'USD') !!}
			@endif
			{!! Form::hidden('customized', empty($coWorkSpace->customized) ? null : $coWorkSpace->customized, ['id' => 'customized'])!!}
			<div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5 w-100">			
				{{-- @if($account_verified == 'verified') --}}
					<button type="submit" name="save" value="1" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100 submit-btn">AGREE & SUBMIT</button>
				{{-- @else
					@php
						Session::put('message' ,$message);
					@endphp
					<a href="{{ route($route) }}" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100">AGREE & SUBMIT</a>
				@endif	 --}}
		
			{{-- <button type="submit" name="saveAndSubmit" value="1" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100 submit-btn">SAVE & SUBMIT</button>	
			</div> --}}

		{!! Form::close() !!}	
		</div>
	</div>
</div>