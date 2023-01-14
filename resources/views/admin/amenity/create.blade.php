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
	{!! Form::open([ 'route' =>['admin.amenities.store'],'files' => 'true' ] ) !!}
		<div class="form-box mt-3 py-4">
			<div class="col-lg-8 col-sm-12">
					<div class="col-sm-12 col-lg-12">
						<div class="form-group">
							<label class="w-100">Amenity Category:</label><br />
							<select name= "amenity_category" class="form-control"  required>
								@foreach($clsAmenityCategories as $clsAmenityCategory)
								<option value="{{ $clsAmenityCategory->id }}">{{ $clsAmenityCategory->name }}</option>
								@endforeach
							</select>
                            @if ($errors->has('amenity_catgory')) 
                                <div class="text-danger mt-1">	
                                    {{ $errors->first('amenity_catgory') }}
                                </div>
                            @endif
						</div>
					</div>
					<div class="col-sm-12 col-lg-12">
						<div class="form-group">
							<label class="w-100">Amenity Name:</label><br />
							{!! Form::text( 'amenity_name',null, [ 'id' => 'amenity_name', 'required', 'class' => 'form-control']) !!}	
                            @if ($errors->has('amenity_name')) 
                                <div class="text-danger mt-1">	
                                    {{ $errors->first('amenity_name') }}
                                </div>
                            @endif
						</div>
					</div>
					<div class="col-sm-12 col-lg-12">
						<div class="form-group">
							<label class="w-100">Icon :</label><br />
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
							{!! Form::text( 'rating_category',null, [ 'id' => 'rating_category', 'required', 'class' => 'form-control']) !!}	
                            @if ($errors->has('rating_category')) 
                                <div class="text-danger mt-1">	
                                    {{ $errors->first('rating_category') }}
                                </div>
                            @endif
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

