@extends('admin.layouts.app')

@section('content')
		
	@if(session()->has('message'))
		 <p class="alert alert-success time-out-alert">{{session()->get('message')}}</p>
	@elseif(session()->has('error'))
		 <p class="alert alert-danger time-out-alert">{{session()->get('error')}}</p>
	@endif
	<div class=" pt-3 pb-2 border-bottom">
		<div class="form-row py-4">
			<h1 class="col-6">Edit Amenity Category</h1>
			<div class="col-sm-6 text-right">
				<a href="{{ url()->previous()}}" class="form-group">
					<button type="button" class="btn">Back</button>
				</a>
			</div>
		</div>
	</div>
	{!! Form::model('clsAmenityCategory', [ 'route' => [ 'admin.amenity-category.update', $clsAmenityCategory->id ] ] ) !!}
        @method('PUT')
		<div class="form-box mt-3 py-4">
			<div class="col-lg-8 col-sm-12">
					<div class="col-sm-12 col-lg-12">
						<div class="form-group">
							<label class="w-100">Amenity Category Name:</label><br />
							{!! Form::text( 'name', $clsAmenityCategory->name, [ 'id' => 'name', 'required' =>'required', 'class' => 'form-control']) !!}	
				  				@if ($errors->has('name')) 
						  			<div class="text-danger mt-1">	
										{{ $errors->first('name') }}
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
							<button type="submit" class="btn">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	{!! Form::close() !!}
@endsection

