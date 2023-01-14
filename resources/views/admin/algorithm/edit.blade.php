@extends('admin.layouts.app')

@section('css')
	
@endsection

@section('content')
		
	<div class=" pt-3 pb-2 border-bottom">
		<div class="form-row py-4">
			<h1 class="col-6">Edit Algorithm</h1>
			<div class="col-sm-6 text-right">
				<a href="{{ url()->previous()}}" class="form-group">
					<button type="button" class="btn">Back</button>
				</a>
			</div>
		</div>
	</div>
	{!! Form::model( 'algorithm',[ 'route' =>['admin.algorithm.update',$algorithm->id]] ) !!}
		<div class="form-box mt-3 py-4">
			<div class="col-lg-8 col-sm-12">
				<div class="col-sm-12 col-lg-12">
						<div class="form-group">
							<label class="w-100">Category Name:</label><br />
							{!! Form::text( 'category', $algorithm->category, [ 'id' => 'category', 'required' =>'']) !!}	
				  				@if ($errors->has('category')) 
						  			<div class="text-danger mt-1">	
										{{ $errors->first('category') }}
									</div>
								@endif
						</div>
					</div>
					<div class="col-sm-12 col-lg-12">
						<div class="form-group">
							<label class="w-100">Range from :</label><br />
							{!! Form::text( 'range_from', $algorithm->range_from, [ 'id' => 'range_from', 'required' =>'']) !!}
				  				@if ($errors->has('range_from')) 
						  			<div class="text-danger mt-1">	
										{{ $errors->first('range_from', ['required' =>'']) }}
									</div>
								@endif
						</div>
					</div>
					<div class="col-sm-12 col-lg-12">
						<div class="form-group">
							<label class="w-100">Range to :</label><br />
							{!! Form::text( 'range_to', $algorithm->range_to, [ 'id' => 'range_to', 'required' =>'']) !!}
				  				@if ($errors->has('range_to')) 
						  			<div class="text-danger mt-1">	
										{{ $errors->first('range_to', ['required' =>'']) }}
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

@section('js')
	
	
@endsection

