<div class="tab-pane pt-3 border-tabs @if($current_tab == 'location') active @endif" id="location" role="tabpanel">
	<div>
		@if(session()->has('message'))
			 <p class="alert alert-success time-out-alert">{{session()->get('message')}}</p>
		@elseif(session()->has('error'))
			 <p class="alert alert-danger time-out-alert">{{session()->get('error')}}</p>
		@endif

	</div>
	{!! Form::open([ 'route' => ['co-work-space.location.store', $coWorkSpace->id], 'id' =>'location-form']) !!}
	<h6 class="pb-3 r-boldItalic f-9 check-label">Let us know your location</h6>
	<p class="label r-lightItalic f-9 check-label"><small>Address</small></p>
	<div class="input-group mt-2">
		{!! Form::text('address', empty($coWorkSpace->address['address']) ? null : $coWorkSpace->address['address'], [ 'id' => 'address', 'class' => 'w-100 form-control location-percent', 'placeholder' =>'Full address', 'required' =>''  ]) !!}
			@if ($errors->has('address')) 
	  			<div class="text-danger mt-1">	
					{{ $errors->first('address') }}
				</div>
			@endif
    </div>
    <div class="input-group mt-2 ">
   		{!! Form::text('pin_code', empty($coWorkSpace->address['pin_code']) ? null : $coWorkSpace->address['pin_code'], [ 'id' => 'postal_code', 'class' => 'w-100 form-control location-percent number ', 'placeholder' =>'Pincode', 'required' => ''  ]) !!}
   				@if ($errors->has('pin_code')) 
   		  			<div class="text-danger mt-1">	
   						{{ $errors->first('pin_code') }}
   					</div>
   				@endif
	</div>
	<div class="input-group mb-sm-3 mt-2">
		Please pin your exact location on the map to help users find your place easily.		
 	</div>
    {!! Form::hidden('latitude', empty($coWorkSpace->address['latitude']) ? null : $coWorkSpace->address['latitude'], ['id'=>'latitude']) !!}
    {!! Form::hidden('longitude', empty($coWorkSpace->address['longitude']) ? null : $coWorkSpace->address['longitude'], ['id'=>'longitude']) !!}
    {!! Form::hidden('street_number', empty($coWorkSpace->address['street_number']) ? null : $coWorkSpace->address['street_number'], ['id'=>'street_number']) !!}
    {!! Form::hidden('route', empty($coWorkSpace->address['route']) ? null : $coWorkSpace->address['route'], ['id'=>'route']) !!}
    {!! Form::hidden('locality', empty($coWorkSpace->address['locality']) ? null : $coWorkSpace->address['locality'], ['id'=>'locality']) !!}
    {!! Form::hidden('administrative_area_level_1', empty($coWorkSpace->address['administrative_area_level_1']) ? null : $coWorkSpace->address['administrative_area_level_1'], ['id'=>'administrative_area_level_1']) !!}
    {!! Form::hidden('country', empty($coWorkSpace->address['country']) ? null : $coWorkSpace->address['country'], ['id'=>'country']) !!}
    <div id="mapName" class="mt-2">

    </div>
    <div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5">
		<button type="submit" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100" name="save" value="1">SAVE</button>
		<button type="submit" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100" name="saveAndSubmit" value="1">SAVE & SUBMIT</button>	
	</div>
	{!!Form::close()!!}
</div>