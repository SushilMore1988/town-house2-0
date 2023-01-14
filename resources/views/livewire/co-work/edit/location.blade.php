<div>
	<form action="javascript:void(0)" method="POST" wire:submit.prevent="save">
		<h6 class="pb-3 r-boldItalic f-9 check-label">Let us know your location</h6>
		<p class="label r-lightItalic f-9 check-label"><small>Address</small></p>
		<div class="input-group mt-2">
			{!! Form::text('address', null, ['class' => 'w-100 form-control location-percent', 'placeholder' =>'Full address', 'required' =>'', 'wire:model' => 'coWorkSpace.address.address']) !!}
			@if ($errors->has('coWorkSpace.address.address')) 
				<div class="text-danger mt-1">	
					{{ $errors->first('address') }}
				</div>
			@endif
		</div>
		<div class="input-group mt-2">
			{!! Form::text('pin_code', null, ['class' => 'w-100 form-control location-percent number ', 'placeholder' =>'Pincode', 'required' => '', 'wire:model' => 'coWorkSpace.address.pin_code']) !!}
			@if ($errors->has('coWorkSpace.address.pin_code')) 
				<div class="text-danger mt-1">	
					{{ $errors->first('pin_code') }}
				</div>
			@endif
		</div>
		<div class="input-group mb-sm-3 mt-2">
			Please pin your exact location on the map to help users find your place easily.		
		</div>
		<div id="mapName" class="mt-2" wire:ignore></div>
		<div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5">
			<button wire:click="save('save')" type="button" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100" name="save" value="save">SAVE</button>
			<button wire:click="save('saveAndSubmit')" type="button" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100" name="saveAndSubmit" value="submit">SAVE & SUBMIT</button>	
		</div>
	</form>
</div>
