{{-- {{dd($coWorkSpace->size)}} --}}
<div style="margin: 0px -15px;" class="tab-pane pt-3 border-tabs @if($current_tab == 'pricing') active @endif" id="pricing" role="tabpanel">
	@livewire('co-work.pricing', ['cws' => $coWorkSpace], key($coWorkSpace->id))

	{{-- <div>
		<div>
			@if(session()->has('message'))
				 <p class="alert alert-success time-out-alert">{{session()->get('message')}}</p>
			@elseif(session()->has('error'))
				 <p class="alert alert-danger time-out-alert">{{session()->get('error')}}</p>
			@endif
	
		</div>
		{!! Form::open(['route'=>['co-work-space.price.store', $coWorkSpace->id], 'onsubmit' => 'return validatePriceForm()']) !!}
			{!! Form::hidden('coWorkSpaceId', $coWorkSpace->id)!!}
			{!! Form::hidden('service_fee_type', $priceSetting->type)!!}
			{!! Form::hidden('service_fee', $priceSetting->price)!!}
			@php
				$price_setting = $priceSetting->type;
				$price = $priceSetting->price;
			@endphp
			<div class="row px-3">
				<div class="col-md-7">
					<h6 class=" r-boldItalic f-9 check-label">Currency </h6>
					{{-- {!! Form::text('currency', $coWorkSpace->size['currency'], ['class'=>'form-control w-100 currency-percent']) !!} -}}
					{!! Form::select('currency', ['USD' => 'USD', 'INR' => 'INR', 'SGD' => 'SGD', 'EUR' => 'EUR', 'GBP' => 'GBP', 'AUD' => 'AUD', 'RUB' => 'RUB', 'JPY' => 'JPY', 'AUD' => 'AUD', 'CAD' => 'CAD'], $coWorkSpace->size['currency'], ['class' => 'form-control w-100 currency-percent']) !!}
					@if ($errors->has('currency')) 
						  <div class="text-danger mt-1">
						  <p class="error"> 	
							{{ $errors->first('currency') }}
							</p>
						</div>
					@endif
				  </div>
				  <div class="col-md-12">
					<p class="f-9">We charge approximate {{$coWorkSpace->size['service_charges']['price']}}{{$coWorkSpace->size['service_charges']['type'] == 'percentage' ? '%' : ''}} of service charges (excluding subscription) on each transaction.</p>
				</div>
				<div class="col-md-7">
					<h6 class=" r-boldItalic f-9 check-label">GST Number (optional) </h6>
					{!! Form::text('gst', $coWorkSpace->gst, ['class'=>'form-control w-100', 'id' => 'gst']) !!}
					@if ($errors->has('gst'))
						  <div class="text-danger mt-1">
						  <p class="error"> 	
							{{ $errors->first('gst') }}
							</p>
						</div>
					@endif
				  </div>
			</div>
			@if($coWorkSpace->size['shared_desk']['for_listing'] > 0)
			<hr/>
			<div class="row px-3">
				<div class="col-md-12">
					<h6 class="r-boldItalic f-9 check-label">Pricing : Shared Desks</h6>
					<div class="row">
						@foreach($coWorkSpace->size['shared_desk']['pricing'] as $key => $value)
							@php
								if($price_setting == 'percentage'){
									$shared_price = ($coWorkSpace->size['shared_desk']['pricing'][$key]) - (($coWorkSpace->size['shared_desk']['pricing'][$key] * $price)/100);
								}else{
									$shared_price = $coWorkSpace->size['shared_desk']['pricing'][$key] - $price;
								}
							@endphp	
							<div class="col-md-2">{{$key}} :</div>
							<div class="col-md-5 col-sm-8"><input type="text" class="form-control number currency-percent commonClass" name="shared_desk_{{str_replace(' ','_',$key)}}" value="{{$coWorkSpace->size['shared_desk']['pricing'][$key]}}"></div>
							<div class="col-md-5 col-sm-8 nextDiv"><input type="text" class="form-control number currency-percent commonClasss" name="" @if($shared_price != 0) value="{{ $shared_price }}" @endif placeholder="you will get" disabled="true"></div>
						@endforeach
					</div>
				</div>
			</div>
			@endif
			@if($coWorkSpace->size['dedicated_desk']['for_listing'] > 0)
			<hr/>
			<div class="row px-3">
				<div class="col-md-12">
					<h6 class="r-boldItalic f-9 check-label">Pricing : Dedicated Desks</h6>
					<div class="row">
						@foreach($coWorkSpace->size['dedicated_desk']['pricing'] as $key => $value)
							@php
								if($price_setting == 'percentage'){
	
									$dedicated_price = ($coWorkSpace->size['dedicated_desk']['pricing'][$key]) - (($coWorkSpace->size['dedicated_desk']['pricing'][$key] * $price)/100);
								}else{
									$dedicated_price = $coWorkSpace->size['dedicated_desk']['pricing'][$key] - $price;
								}
							@endphp
							<div class="col-md-2">{{$key}} :</div>
							<div class="col-md-5 col-sm-8"><input type="text" class="form-control number currency-percent commonClass" name="dedicated_desk_{{str_replace(' ','_',$key)}}" value="{{$coWorkSpace->size['dedicated_desk']['pricing'][$key]}}"></div>
							<div class="col-md-5 col-sm-8"><input type="text" class="form-control number currency-percent" name="" @if($dedicated_price != 0) value="{{ $dedicated_price }}" @endif placeholder="you will get" disabled="true"></div>
						@endforeach
					</div>
				</div>
			</div>
			@endif
			@if($coWorkSpace->size['private_offices']['types_for_listing'] > 0)
			@foreach($coWorkSpace->size['private_offices']['private_offices'] as $private_office_number => $private_office)
			<hr/>
			<div class="row px-3">
				<div class="col-md-12">
					<h6 class="r-boldItalic f-9 check-label">Pricing : Private Office (Office Name {{$private_office_number}})</h6>
					<div class="row">
						@foreach($coWorkSpace->size['private_offices']['private_offices'][$private_office_number]['pricing'] as $key => $value)
							@php
								if($price_setting == 'percentage'){
	
									$private_price = ($coWorkSpace->size['private_offices']['private_offices'][$private_office_number]['pricing'][$key]) - (($coWorkSpace->size['private_offices']['private_offices'][$private_office_number]['pricing'][$key] * $price)/100);
								}else{
									$private_price = $coWorkSpace->size['private_offices']['private_offices'][$private_office_number]['pricing'][$key] - $price;
								}
							@endphp
							<div class="col-md-2">{{$key}} :</div>
							<div class="col-md-5 col-sm-8"><input type="text" class="form-control number currency-percent commonClass" name="private_office_{{$private_office_number}}_{{str_replace(' ','_',$key)}}" value="{{$coWorkSpace->size['private_offices']['private_offices'][$private_office_number]['pricing'][$key]}}"></div>
							<div class="col-md-5 col-sm-8"><input type="text" class="form-control number currency-percent" name="" disabled="true" placeholder="you will get" @if($private_price != 0) value="{{ $private_price }}"  @endif></div>
							{{-- <div class="col-4">{{$key}} :</div>
							<div class="col-8">
								<input type="text" class="form-control number currency-percent commonClass" name="private_office_{{$private_office_number}}_{{str_replace(' ','_',$key)}}" value="{{$coWorkSpace->size['private_offices']['private_offices'][$private_office_number]['pricing'][$key]}}">
								<input type="text" class="form-control number currency-percent"  value="{{$coWorkSpace->size['private_offices']['private_offices'][$private_office_number]['pricing'][$key]}}">
	
							</div> -}}
						@endforeach
					</div>
				</div>
			</div>
			@endforeach
			@endif
			@if($coWorkSpace->size['meeting_rooms']['for_listing'] > 0)
			@foreach($coWorkSpace->size['meeting_rooms']['meeting_rooms'] as $meeting_room_number => $meeting_room)
			<hr/>
			<div class="row px-3">
				<div class="col-md-12">
					<h6 class="r-boldItalic f-9 check-label">Pricing : Meeting Room (Room Name {{$meeting_room_number}})</h6>
					<div class="row">
						@foreach($coWorkSpace->size['meeting_rooms']['meeting_rooms'][$meeting_room_number]['pricing'] as $key => $value)
							@php
								if($price_setting == 'percentage'){
	
									$meeting_price = ($coWorkSpace->size['meeting_rooms']['meeting_rooms'][$meeting_room_number]['pricing'][$key]) - (($coWorkSpace->size['meeting_rooms']['meeting_rooms'][$meeting_room_number]['pricing'][$key] * $price)/100);
								}else{
									$meeting_price = $coWorkSpace->size['meeting_rooms']['meeting_rooms'][$meeting_room_number]['pricing'][$key] - $price;
								}
							@endphp
							<div class="col-md-2">{{$key}} :</div>
							<div class="col-md-5 col-sm-8"><input type="text" class="form-control number currency-percent commonClass" name="meeting_room_{{$meeting_room_number}}_{{str_replace(' ','_',$key)}}" value="{{$coWorkSpace->size['meeting_rooms']['meeting_rooms'][$meeting_room_number]['pricing'][$key]}}"></div>
							<div class="col-md-5 col-sm-8"><input type="text" class="form-control number currency-percent" name="" disabled="true" placeholder="you will get" @if($meeting_price != 0) value="{{ $meeting_price }}" @endif></div>
							{{-- <div class="col-4">{{$key}} :</div>
							<div class="col-8">
								<input type="text" class="form-control number currency-percent commonClass" name="meeting_room_{{$meeting_room_number}}_{{str_replace(' ','_',$key)}}" value="{{$coWorkSpace->size['meeting_rooms']['meeting_rooms'][$meeting_room_number]['pricing'][$key]}}">
								<input type="text" class="form-control number currency-percent commonClass"  value="{{$coWorkSpace->size['meeting_rooms']['meeting_rooms'][$meeting_room_number]['pricing'][$key]}}">
							</div> -}}
						@endforeach
					</div>
				</div>
			</div>
			@endforeach
			@endif
			<div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5 px-3">
				<button type="submit" name="save" value="1" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100" >SAVE</button>
				<button type="submit" name="saveAndSubmit" value="1" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100">SAVE & SUBMIT</button>	
			</div>
		{!! Form::close() !!}
	</div>--}}
	
</div>