@extends('admin.layouts.app')
@section('content')
@if(session()->has('message'))
	 <p class="alert alert-success time-out-alert">{{session()->get('message')}}</p>
@elseif(session()->has('error'))
	 <p class="alert alert-danger time-out-alert">{{session()->get('error')}}</p>
@endif
<div class=" pt-3 pb-2 border-bottom">
	<div class="form-row py-4">
		<h1 class="col-6">Add CoWorkSpace Master</h1>
		<div class="col-sm-6 text-right">
			<a href="{{ url()->previous()}}" class="form-group">
				<button type="button" class="btn">Back</button>
			</a>
		</div>
	</div>
</div>
{!! Form::open( [ 'route' => 'admin.co-work-space.master.store' ] ) !!}
	{!! Form::hidden('coWorkSpaceId',$coWorkSpace->id)!!} 
	<div class="form-box mt-3 py-3">
		<div class="col-lg-8 col-sm-12">
			<div class="form-row">
				<div class="col-sm-12 col-lg-12">
					<div class="form-group">
						<label class="w-100">Review Text Master :</label><br />
						{!! Form::textarea( 'review_text_master', empty($coWorkSpace->cwsMaster) ? null : $coWorkSpace->cwsMaster->review_text_master , [ 'id' => 'review_text_master']) !!}	
			  				@if ($errors->has('review_text_master')) 
					  			<div class="text-danger mt-1">	
									{{ $errors->first('review_text_master') }}
								</div>
							@endif
					</div>
				</div>
				<div class="col-sm-12 col-lg-12">
					<div class="form-group">
						<label class="w-100">Special Attribute :</label><br />
						{!! Form::textarea( 'special_attribute', empty($coWorkSpace->cwsMaster) ? null : $coWorkSpace->cwsMaster->special_attribute, [ 'id' => 'special_attribute']) !!}	
			  				@if ($errors->has('special_attribute')) 
					  			<div class="text-danger mt-1">	
									{{ $errors->first('special_attribute') }}
								</div>
							@endif
					</div>
				</div>
				<div class="col-sm-12 col-lg-12">
					<div class="form-group">
						<label class="w-100">Tag Line :</label><br />
						{!! Form::textarea( 'tag_line', empty($coWorkSpace->cwsMaster) ? null : $coWorkSpace->cwsMaster->tag_line, [ 'id' => 'tag_line']) !!}	
			  				@if ($errors->has('tag_line')) 
					  			<div class="text-danger mt-1">	
									{{ $errors->first('tag_line') }}
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
						<button type="submit" class="btn">Save details</button>
					</div>
				</div>
			</div>
		</div>
	</div>
{!! Form::close() !!}

{!!Form::open(['id'=>'review_form'])!!}
<p class="alert alert-success d-none" id="message"></p>
	<div class="row  mx-0 mt-2">
		<div class="col-12">
			<h6 class="w-100 m-bold">Rate The {{$coWorkSpace->name}}</h6>
			<div class="row py-3">
			{!! Form::hidden('coWorkSpaceId', $coWorkSpace->id)!!}
 				<div class="col-lg-6 pr-0">
						@foreach($ratingTypes as $ratingType)
							<div class="row">
			 					<div class="col-5">
				     				<p class="r-lightItalic f-8 head-description mb-2">{{$ratingType->type}}</p>
				     			</div>
				     			<div class="col-7 px-0">
				     				<div class="row">
										{!! Form::hidden('ratingType_ids[]', $ratingType->id, ['class' => 'rating_id']) !!}
										{!! Form::hidden('rating_value[]', 0, ['class' => 'rating_value']) !!}

										<?php 
				 							if($coWorkSpace->adminCwsRatings->where('cws_id',$coWorkSpace->id)->where('rating_type',$ratingType->id)->first()){
				 								$j = $coWorkSpace->adminCwsRatings->where('cws_id',$coWorkSpace->id)->where('rating_type',$ratingType->id)->first()->rating;
				 							}
				 							else{
				 								$j = 0;
				 							}
				 						?>
				     					@for($i = 1; $i <= 10; $i++)
					     					<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3 checked">
					     						@if($j < $i)
													{!! Form::checkbox('', $j, false, ['class'=>'checkbox', 'data-no' => $i]) !!}
												@else
													{!! Form::checkbox('', $i, true, ['class'=>'checkbox', 'data-no' => $i]) !!}
												@endif
												<span class="checkmark checkbox-checkmark check"></span>
											</label>
										@endfor
									</div>
								</div>
							</div>
						@endforeach
		 			</div>
				<div class="col-lg-8 col-sm-12">
					<div class="form-row pt-4">
						<div class="col-sm-12 text-left">
							<div class="form-group">
								<button type="button" class="btn"  id="save-rating">Save details</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
{!!Form::close()!!}
@endsection

@section('js')
	{{-- @include(); --}}
	@include('admin.co-work.script.rating-script')
	<script type="text/javascript" src="{{url('/admin/vendor/ckeditor-std/ckeditor.js')}}"></script>
	<script type="text/javascript">
    	CKEDITOR.replace( 'review_text_master' );
    	CKEDITOR.replace( 'special_attribute' );
    	CKEDITOR.replace( 'tag_line' );
	</script>
@endsection
