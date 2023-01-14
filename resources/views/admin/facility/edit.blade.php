@extends('admin.layouts.app')

@section('content')
		
	@if(session()->has('message'))
		 <p class="alert alert-success time-out-alert">{{session()->get('message')}}</p>
	@elseif(session()->has('error'))
		 <p class="alert alert-danger time-out-alert">{{session()->get('error')}}</p>
	@endif
	<div class=" pt-3 pb-2 border-bottom">
		<div class="form-row py-4">
			<h1 class="col-6">Edit CoWorkSpace Facility</h1>
			<div class="col-sm-6 text-right">
				<a href="{{ url()->previous()}}" class="form-group">
					<button type="button" class="btn">Back</button>
				</a>
			</div>
		</div>
	</div>
	{!! Form::model( 'coWorkFacility',[ 'route' =>['admin.facility.update',$coWorkFacility->id],'files' => 'true' ] ) !!}
		{!! Form::hidden('facility_id',$coWorkFacility->id)!!} 
		<div class="form-box mt-3 py-4">
			<div class="col-lg-8 col-sm-12">
				<div class="col-sm-12 col-lg-12">
						<div class="form-group">
							<label class="w-100">Facility Name:</label><br />
							{!! Form::text( 'facility_name', empty($coWorkFacility->value) ? null : $coWorkFacility->value, [ 'id' => 'facility_name', 'required' =>'']) !!}	
				  				@if ($errors->has('facility_name')) 
						  			<div class="text-danger mt-1">	
										{{ $errors->first('facility_name') }}
									</div>
								@endif
						</div>
					</div>
					<div class="col-sm-12 col-lg-12">
						<div class="form-group">
							<label class="w-100">Icon :</label><br />
							<img src="{{'/img/cowork/facility-icon/'.$coWorkFacility->icon_image}}" height="50" width="50"></img>
							{!! Form::file( 'icon') !!}	
				  				@if ($errors->has('icon')) 
						  			<div class="text-danger mt-1">	
										{{ $errors->first('icon', ['required' =>'']) }}
									</div>
								@endif
						</div>
					</div>
					<div class="col-sm-12 col-lg-12">
						<div class="form-group">
							<label class="w-100">Rating Value:</label><br />
							{!! Form::text( 'rating_category', empty($coWorkFacility->rating_category) ? null : $coWorkFacility->rating_category, [ 'id' => 'rating_category', 'required' =>'']) !!}	
				  				@if ($errors->has('rating_category')) 
						  			<div class="text-danger mt-1">	
										{{ $errors->first('rating_category') }}
									</div>
								@endif
							{{-- <label class="w-100">Rating Category:</label><br />
							<select name= "rating_catgory"  required>
   								<option value="30">Gold</option>
    							<option value="20">Silver</option>
    							<option value="10">Bronze</option>
							</select>
				  				@if ($errors->has('rating_catgory')) 
						  			<div class="text-danger mt-1">	
										{{ $errors->first('rating_catgory') }}
									</div>
								@endif --}}
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-sm-12">
				<div class="form-row py-4">
					<div class="col-sm-12 text-left">
						<div class="form-group">
							<button type="submit" class="btn">Save details</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	{!! Form::close() !!}
@endsection

