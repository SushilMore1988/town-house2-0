<div>
    {!! Form::open(['wire:submit.prevent' => 'store']) !!}
		<div class="row px-3">
			<div class="col-md-7">
				<h6 class=" r-boldItalic f-9 check-label">Currency </h6>
				{!! Form::select('currency', ['USD' => 'USD', 'INR' => 'INR', 'SGD' => 'SGD', 'EUR' => 'EUR', 'GBP' => 'GBP', 'AUD' => 'AUD', 'RUB' => 'RUB', 'JPY' => 'JPY', 'AUD' => 'AUD', 'CAD' => 'CAD'], $size['currency'], ['class' => 'form-control w-100 currency-percent', 'wire:model' => 'currency']) !!}
				@if ($errors->has('currency')) 
		  			<div class="text-danger mt-1">
		  			<p class="error"> 	
						{{ $errors->first('currency') }}
						</p>
					</div>
			    @endif
		  	</div>
		  	<div class="col-md-12">
				<p class="f-9">We charge approximate {{$size['service_charges']['price']}}{{$size['service_charges']['type'] == 'percentage' ? '%' : ''}} of service charges (excluding subscription) on each transaction.</p>
			</div>
			<div class="col-md-7">
				<h6 class=" r-boldItalic f-9 check-label">GST Number (optional) </h6>
				{!! Form::text('gst', $cws->gst, ['class'=>'form-control w-100 currency-percent', 'wire:model' => 'gst']) !!}
				@if ($errors->has('gst'))
		  			<div class="text-danger mt-1">
		  			    <p class="error"> 	
						{{ $errors->first('gst') }}
						</p>
					</div>
			    @endif
		  	</div>
		</div>
		@if($size['shared_desk']['for_listing'] > 0)
		<hr/>
		<div class="row px-3">
			<div class="col-md-12">
				<h6 class="r-boldItalic f-9 check-label">Pricing : Shared Desks</h6>
				<div class="row">
					@foreach($size['shared_desk']['pricing'] as $key => $value)
						@php
							if($price_setting == 'percentage'){
								$shared_price = ($size['shared_desk']['pricing'][$key]) - (($size['shared_desk']['pricing'][$key] * $price)/100);
							}else{
								$shared_price = $size['shared_desk']['pricing'][$key] - $price;
							}
						@endphp	
						<div class="col-md-2">{{$key}}:</div>
						<div class="col-md-5 col-sm-8">
							<input type="text" class="form-control number currency-percent commonClass" name="shared_desk_{{str_replace(' ','_',$key)}}" wire:model="size.shared_desk.pricing.{{ $key }}" value="{{$size['shared_desk']['pricing'][$key]}}">
						</div>
						<div class="col-md-5 col-sm-8 nextDiv">
							<input type="text" class="form-control number currency-percent commonClasss" name="" @if($shared_price != 0) value="{{ $shared_price }}" @endif placeholder="you will get" disabled="true">
						</div>
					@endforeach
				</div>
			</div>
		</div>
		@endif
		@if($size['dedicated_desk']['for_listing'] > 0)
		<hr/>
		<div class="row px-3">
			<div class="col-md-12">
				<h6 class="r-boldItalic f-9 check-label">Pricing : Dedicated Desks</h6>
				<div class="row">
					@foreach($size['dedicated_desk']['pricing'] as $key => $value)
						@php
							if($price_setting == 'percentage'){
								$dedicated_price = ($size['dedicated_desk']['pricing'][$key]) - (($size['dedicated_desk']['pricing'][$key] * $price)/100);
							}else{
								$dedicated_price = $size['dedicated_desk']['pricing'][$key] - $price;
							}
						@endphp
						<div class="col-md-2">{{$key}} :</div>
						<div class="col-md-5 col-sm-8"><input type="text" class="form-control number currency-percent commonClass" name="dedicated_desk_{{str_replace(' ','_',$key)}}" wire:model="size.dedicated_desk.pricing.{{ $key }}" value="{{ $size['dedicated_desk']['pricing'][$key] }}"></div>
						<div class="col-md-5 col-sm-8"><input type="text" class="form-control number currency-percent" name="" @if($dedicated_price != 0) value="{{ $dedicated_price }}" @endif placeholder="you will get" disabled="true"></div>
					@endforeach
				</div>
			</div>
		</div>
		@endif
		@if(!empty($size['private_offices']['types']) && $size['private_offices']['types_for_listing'] > 0)
		@foreach($size['private_offices']['types'] as $private_office_number => $private_office)
		<hr/>
		<div class="row px-3">
			<div class="col-md-12">
				<h6 class="r-boldItalic f-9 check-label">Pricing : Private Office Type {{$private_office_number+1}} ({{$private_office['name']}})</h6>
				<div class="row">
					@foreach($size['private_offices']['types'][$private_office_number]['pricing'] as $key => $value)
						@php
							if($price_setting == 'percentage'){
								$private_price = ($size['private_offices']['types'][$private_office_number]['pricing'][$key]) - (($size['private_offices']['types'][$private_office_number]['pricing'][$key] * $price)/100);
							}else{
								$private_price = $size['private_offices']['types'][$private_office_number]['pricing'][$key] - $price;
							}
						@endphp
						<div class="col-md-2">{{$key}} :</div>
						<div class="col-md-5 col-sm-8">
							<input type="text" class="form-control number currency-percent commonClass" name="private_office_{{$private_office_number}}_{{str_replace(' ','_',$key)}}" wire:model="size.private_offices.types.{{ $private_office_number }}.pricing.{{ $key }}" value="{{ $size['private_offices']['types'][$private_office_number]['pricing'][$key] }}">
						</div>
						<div class="col-md-5 col-sm-8"><input type="text" class="form-control number currency-percent" name="" disabled="true" placeholder="you will get" @if($private_price != 0) value="{{ $private_price }}"  @endif></div>
					@endforeach
				</div>
			</div>
		</div>
		@endforeach
		@endif
		@if(!empty($size['meeting_rooms']['types_for_listing']) && $size['meeting_rooms']['types_for_listing'] > 0)
		@foreach($size['meeting_rooms']['types'] as $meeting_room_number => $meeting_room)
		<hr/>
		<div class="row px-3">
			<div class="col-md-12">
				<h6 class="r-boldItalic f-9 check-label">Pricing : Meeting Room {{$meeting_room_number+1}} ({{$meeting_room['name']}} )</h6>
				<div class="row">
					@foreach($size['meeting_rooms']['types'][$meeting_room_number]['pricing'] as $key => $value)
						@php
							if($price_setting == 'percentage'){
								$meeting_price = ($size['meeting_rooms']['types'][$meeting_room_number]['pricing'][$key]) - (($size['meeting_rooms']['types'][$meeting_room_number]['pricing'][$key] * $price)/100);
							}else{
								$meeting_price = $size['meeting_rooms']['types'][$meeting_room_number]['pricing'][$key] - $price;
							}
						@endphp
						<div class="col-md-2">{{$key}} :</div>
						<div class="col-md-5 col-sm-8"><input type="text" class="form-control number currency-percent commonClass" name="meeting_room_{{$meeting_room_number}}_{{str_replace(' ','_',$key)}}" wire:model="size.meeting_rooms.types.{{ $meeting_room_number }}.pricing.{{ $key }}"></div>
						<div class="col-md-5 col-sm-8"><input type="text" class="form-control number currency-percent" name="" disabled="true" placeholder="you will get" @if($meeting_price != 0) value="{{ $meeting_price }}" @endif></div>
					@endforeach
				</div>
			</div>
		</div>
		@endforeach
		@endif
		<div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5 px-3">
			<button type="button" wire:click="store('save')" name="save" value="1" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100" >SAVE</button>
			<button type="button" wire:click="store('saveAndSubmit')" name="saveAndSubmit" value="1" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100">SAVE & SUBMIT</button>	
		</div>
	{!! Form::close() !!}
</div>
