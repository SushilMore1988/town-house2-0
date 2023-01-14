<div class="tab-pane pt-3 border-tabs @if($current_tab == 'opening-hours') active @endif" id="opening-hours" role="tabpanel">	
	{!! Form::open( [ 'route' =>['co-work-space.opening-hours.store', $coWorkSpace->id]]) !!}
		{!! Form::hidden('coWorkSpaceId', $coWorkSpace->id)!!}
			<h6 class="pb-3 r-boldItalic f-9 check-label">Let us Know your Opening Hours</h6>
			@foreach(config('constant.DAYS') as $day => $key)
				<div class="row register-form office-time align-items-center mb-4 mb-lg-3">
					<div class="col-sm-12">
						<label class="container-2 r-lightItalic f-9 check-label mb-3">  {{ucfirst($day)}}
						  {!! Form::checkbox( $day.'_radio', $day, $coWorkSpace->opening_hours['timing'][$day]['checked'] == 1 ? '[\'checked\' => \'checked\']' : '', ['class' => 'from-mark']) !!}
						  <span class="checkmark"></span>
						</label>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 text-lg-center align-items-center ml-3 ml-lg-0">
						<label class="mr-3 mb-3 mb-lg-0 r-lightItalic f-9 text-secondary r-lightItalic f-9 check-label">Office Hours :</label>
					</div>
					<div class="col-lg-5 col-md-6 col-sm-12 pt-md-0 pt-3">
						<div class="form-group mb-0">
							<div class="ml-md-3 d-flex align-items-center">
								<label class="mr-3 r-lightItalic f-9 text-secondary r-lightItalic f-9 check-label">From</label>	
				                <div class='input-group date d-flex @if($day == "monday") monday-from-time-picker @else from-time-picker @endif from-time' data-id={{$day.'_from'}} >			                	
				                	
				                	@if($day == "monday") 
				                		{!! Form::text( $day.'_from', $coWorkSpace->opening_hours['timing'][$day]['from'], [ 'class' => 'common-field-input monday-from-time-picker number ']) !!}
				                	@else 			                		
				                		{!! Form::text( $day.'_from', $coWorkSpace->opening_hours['timing'][$day]['from'], [ 'class' => 'common-field-input from-time-picker from-mark number']) !!}                
				                	@endif
							  		
							  		@if ($errors->has($day.'_from')) 
						  			<div class="text-danger mt-1">	
										{{ $errors->first($day.'_from') }}
									</div>
								    @endif	
				                    
				                    <span class="input-group-addon">
				                        <span class="far fa-clock"></span>
				                    </span>
				                </div>
				            </div>
					  	</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-12 pl-md-0 pt-md-0 pt-3">
					  	<div class="form-group mb-0">
							<div class="ml-md-3 d-flex align-items-center">
								<label class="mr-md-2 mr-4 r-lightItalic f-9 text-secondary r-lightItalic f-9 check-label">To</label>
				                <div class='input-group date d-flex @if($day == "monday") monday-to-time-picker @else to-time-picker @endif ' >
				                	@if($day == "monday") 
				                		{!! Form::text( $day.'_to', $coWorkSpace->opening_hours['timing'][$day]['to'], [ 'class' => 'monday-to-time-picker common-field-input number ']) !!}
				                	@else 			                		
				                		{!! Form::text( $day.'_to', $coWorkSpace->opening_hours['timing'][$day]['to'], [ 'class' => 'to-time-picker to-mark common-field-input number']) !!}
				                	@endif
				                    

							  		@if ($errors->has($day.'_to')) 
						  			<div class="text-danger mt-1">	
										{{ $errors->first($day.'_to') }}
									</div>
								    @endif	
				                    <span class="input-group-addon">
				                        <span class="far fa-clock"></span>
				                    </span>
				                </div>
				            </div>
					  	</div>
					</div>
				</div>
			@endforeach
			<h6 class="pb-3 pt-4 r-boldItalic f-9 check-label">Any Specific Timing Information</h6>
			<div class="row">
				<div class="col-sm-12">	
					{!! Form::textarea( 'time_information', $coWorkSpace->opening_hours['specific_time_info'], [ 'placeholder' => 'Eg: We accept late daily checkouts on request ', 'rows' => '2' , 'class' => 'w-100' ]) !!}
					@if ($errors->has('time_information')) 
			  			<div class="text-danger mt-1">	
							{{ $errors->first('time_information') }}
						</div>
					@endif	
				</div>
			</div>
			<div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5">
				<button type="submit" name="save" value='1' class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100">SAVE</button>
				<button type="submit" name="saveAndSubmit" value='1' class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100">SAVE & SUBMIT</button>	
			</div>
	{!!Form::close()!!}
</div>