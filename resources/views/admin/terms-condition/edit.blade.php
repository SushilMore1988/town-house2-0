@extends('admin.layouts.app')

@section('css')
	
@endsection

@section('content')

<div class=" pt-3 pb-2 border-bottom">
	<div class="form-row py-4">
		<h1 class="col-6">Update Terms and Condition</h1>
		<div class="col-sm-6 text-right">
			<a href="{{ url()->previous()}}" class="form-group">
				<button type="button" class="btn">Back</button>
			</a>
		</div>
	</div>
</div>
{!! Form::open( [ 'route' => 'admin.terms.condition.update' ] ) !!}
	{!! Form::hidden('setting_id',empty($setting->id) ? null : $setting->id)!!}
	<div class="form-box mt-3 py-3">
		<div class="col-lg-8 col-sm-12">
			<div class="form-row">
				{{-- <div class="col-sm-12 col-lg-12">
					<div class="form-group">
						<label class="w-100">Name :</label><br />
						{!! Form::text( 'name', empty($setting->name) ? null : $setting->name, [ 'id' => 'name']) !!}	
			  				@if ($errors->has('name')) 
					  			<div class="text-danger mt-1">	
									{{ $errors->first('name') }}
								</div>
							@endif
					</div>
				</div> --}}
				<div class="col-sm-12 col-lg-12">
					<div class="form-group">
						<label class="w-100">Review Text Master :</label><br />
						{!! Form::textarea( 'content', $setting->content , [ 'id' => 'content']) !!}	
			  				@if ($errors->has('content')) 
					  			<div class="text-danger mt-1">	
									{{ $errors->first('content') }}
								</div>
							@endif
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-8 col-sm-12">
			<div class="form-row pt-4">
				<div class="col-sm-12 text-left">
					<div class="form-group">
						<button type="submit" class="btn">Update</button>
					</div>
				</div>
			</div>
		</div>
	</div>
{!! Form::close() !!}

@endsection

@section('js')
	
	
	<script type="text/javascript" src="{{url('/admin/vendor/ckeditor-std/ckeditor.js')}}"></script>
	<script type="text/javascript">
    	CKEDITOR.replace( 'content' );
	</script>
@endsection
