<div class="common-form my-4 py-3 review-tab"  id="reviews">
	<h6 class="pb-3 r-boldItalic f-16  head-description">TH2.0 Review Board</h6>
	<div class="row">
		<div class="col-lg-7 pr-0">
			@foreach($ratingTypes as $ratingType)
	 			@if($coWorkSpace->adminCwsRatings->where('cws_id',$coWorkSpace->id)->where('rating_type',$ratingType->id)->first())
					<div class="row">
						<div class="col-5">
			 				<p class="r-lightItalic f-8 head-description mb-2">{{$ratingType->type}}</p>
			 			</div>
			 			<div class="col-7 px-0">
			 				<div class="row">
			 					@php 
		 							if($coWorkSpace->adminCwsRatings->where('cws_id',$coWorkSpace->id)->where('rating_type',$ratingType->id)->first()){
		 								$j = $coWorkSpace->adminCwsRatings->where('cws_id',$coWorkSpace->id)->where('rating_type',$ratingType->id)->first()->rating;
		 							}
		 							else{
		 								$j = 0;
		 							}
		 						@endphp 
			 					@for($i = 1; $i <= 10; $i++)
			 					<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3">
									@if($j < $i)
									{!! Form::checkbox('',$j, false, ['class'=>'admin-checkbox', 'data-no' => $j, 'disabled']) !!}
									@else
									{!! Form::checkbox('',$j, true, ['class'=>'admin-checkbox', 'data-no' => $j, 'disabled']) !!}
									@endif
									<span class="checkmark checkbox-checkmark"></span>
								</label>
								@endfor
							</div>
						</div>
					</div>
				@endif
			@endforeach
			<p class="r-boldItalic f-8  head-description mb-0">{!! empty($coWorkSpace->cwsMaster) ? null : $coWorkSpace->cwsMaster->review_text_master !!}</p>
		</div>
		<div class="col-lg-5 category-type">
			@if($coWorkSpace->color_category == 'bronze')
			<div class="d-flex flex-column justify-content-center">
				<div class="ratings align-self-center d-flex justify-content-center bg-brown border-brown">
						<p class="text-black n-bold f-20 text-center align-self-center mb-0">
							{{ number_format($coWorkSpace->admin_rating,1)}}
						</p>
					</div>
				<p class="r-boldItalic f-8  head-description mb-0 text-center">Category : <span class="r-lightItalic">Bronze</span></p>
			</div>
			@elseif($coWorkSpace->color_category == 'silver')
			<div class="d-flex flex-column justify-content-center">
				<div class="ratings align-self-center d-flex justify-content-center bg-silver border-silver">
						<p class="text-black n-bold f-20 text-center align-self-center mb-0">
							{{ number_format($coWorkSpace->admin_rating,1)}}
						</p>
					</div>
				<p class="r-boldItalic f-8  head-description mb-0 text-center">Category : <span class="r-lightItalic">Silver</span></p>
			</div>
			@elseif($coWorkSpace->color_category == 'gold')
			<div class="d-flex flex-column justify-content-center justify-items-center">
				<div class="ratings align-self-center d-flex justify-content-center bg-gold border-gold">
						<p class="text-black n-bold f-20 text-center align-self-center mb-0">
							{{ number_format($coWorkSpace->admin_rating,1)}}
						</p>
					</div>
				<p class="r-boldItalic f-8  head-description mb-0 text-center">Category : <span class="r-lightItalic">Gold</span></p>
			</div>
			@endif
			<div class="r-boldItalic f-8  head-description mb-0 pt-5 text-center"> {!! empty($coWorkSpace->cwsMaster) ? null : $coWorkSpace->cwsMaster->tag_line !!} </div>
		</div>
	</div>
{{-- Ratting By User --}}

	{{-- {{dd($coWorkSpace->experienceOfCoWorkSpaces->where('user_id',Auth::user()->id)->where('co_work_space_id',$coWorkSpace->id)->first())}} --}}
@auth
	@if($coWorkSpace->user_id != Auth::id())
		@if($coWorkSpace->experienceOfCoWorkSpaces->where('user_id',Auth::user()->id)->where('cws_id',$coWorkSpace->id)->first())
			{{-- @foreach($coWorkSpace->experienceOfCoWorkSpaces as $experience)
				@if($experience->coWorkSpaceRatings->first())
					
				@endif
			@endforeach --}}
		@elseif(empty($coWorkSpace->experienceOfCoWorkSpaces->where('user_id',Auth::user()->id)->where('cws_id',$coWorkSpace->id)->first()))
			<h6 class=" r-boldItalic f-16  head-description pt-3">User Review Board</h6>
			<p class="r-boldItalic f-8  head-description mb-0">Average User Rating :<span class="r-lightItalic">4.3</span> </p>
			<div id ="message" class="alert alert-success d-none ">
			</div>
			<div id ="error" class="alert alert-danger d-none ">
			</div>
			{!!Form::open(['id'=>'review_form'])!!}
			<div class="row  mx-0 mt-3" id="review_box">
				<div class="col-12 body-color">
					<h6 class=" r-boldItalic f-16  head-description pt-3 text-uppercase">Rate The {{$coWorkSpace->name}}</h6>
					<div class="row py-3">
						{!! Form::hidden('coWorkSpaceId', $coWorkSpace->id,['id'=>'coWorkSpaceId'])!!}
						{!! Form::hidden('userId',Auth()->user()->id,['id'=>'userId'])!!}
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
					     					@for($i = 1; $i <= 10; $i++)
						     					<label class="container-review r-lightItalic f-9 check-label mb-3 pl-3 checked">
												{!! Form::checkbox('', $i, false, ['class'=>'checkbox', 'data-no' => $i]) !!}
												<span class="checkmark checkbox-checkmark check"></span>
												</label>
											@endfor
										</div>
									</div>
								</div>
							@endforeach
			 			</div>
			 			<div class="col-lg-6 text-center">
				 			<div class="form-group">
								{!! Form::textarea( 'experience', null, ['id' => 'experience' , 'placeholder' => 'Write something about your experiences at the '. $coWorkSpace->name. ' (optional)', 'rows' => "4", 'cols' => "50", 'class' => 'w-100 form-control px-2', 'required' =>'' ]) !!}
							</div>
							<p class="alert alert-success time-out-alert d-none" id="success"></p>
							<p class="alert alert-danger time-out-alert d-none" id="error"></p>
						  	<button type="button" class="btn btn-success f-9 rounded-0 mr-2 w-100  r-boldItalic f-9 " id="save-rating" >Submit your Review</button>
			 			</div>
					</div>
				</div>
			</div>
			{!!Form::close()!!}
		@endif
	@endif
{{-- @endif --}}
@endauth
{{--End Of Ratting By User  --}}

<div class="row mx-0 mt-3">
@foreach($coWorkSpace->experienceOfCoWorkSpaces->sortByDesc('id') as $c) 
	<div class="col-12 body-color">
		<div class="row py-3 " >
			<div class="col-lg-2 col-sm-3">
				<div class="img-wrapper border bg-white ">
					
				</div>
			</div>
			<div class="col-lg-7 col-sm-9 px-lg-0">
				<p class="r-boldItalic f-6 head-description mb-2">
					 {{$c->user->fname}} Rate this Space : 
					 <span>{{$c->average_rating}}</span>
					
				</p>
				<div class="row ml-0">
				@foreach($ratingTypes as $ratingType)
					<div class="col-lg-6">
						<div class="row">
     					<div class="col-5 px-0">
		     				<p class="r-lightItalic f-6 head-description mb-2">{{$ratingType->type}}</p>
		     			</div>
		     			<div class="col-7 px-0">
		     				<?php 
								if($c->cwsRatings->where('rating_type',$ratingType->id)->first()){ 
		 							$j = $c->cwsRatings->where('rating_type',$ratingType->id)->first()->rating;
		 						}
		 						else{
		 							$j = 0;
		 						}
		 					?>
		     				<div class="row">
		     					@for($i = 1; $i <= 10; $i++)
		     					<label class="container-under-review r-lightItalic f-9 check-label mb-3 ">
		     						@if($j < $i)
									{!! Form::checkbox('',$j, false, ['class'=>'admin-checkbox', 'data-no' => $j, 'disabled']) !!}
									@else
									{!! Form::checkbox('',$j, true, ['class'=>'admin-checkbox', 'data-no' => $j, 'disabled']) !!}
									@endif
									<span class="checkmark checkbox-checkmark"></span>
									{{-- <input type="checkbox" checked="checked" name="Desk-quality">
									<span class="checkmark checkbox-checkmark"></span> --}}
								</label>
								@endfor
							</div>
						</div>
						</div>
					</div>
				@endforeach
				</div>
			</div>
			<div class="col-lg-3 col-12 ">
				<p class="r-lightItalic f-6 head-description mb-2">" 
						{{ $c->experience }} 
					"</p>
				<div class="clearfix">
					<div class="float-left">
						<div class="like d-flex ">
						{{-- {{dd(Auth::user()->id)}} --}}
							<p class="r-lightItalic f-6 head-description mb-0 pt-1 pr-2 like-count">{{ empty($c->like)? 0 :$c->like }}</p>
							<i class="fas fa-thumbs-up thumbs-up " data-id= {{$c->id}} ></i>
							{!! Form::hidden('likeCount',$c->like,['id'=>'like-count']) !!}
						</div>
					</div>
					<div class="float-right">
						<div class="like d-flex ">
							<p class="r-lightItalic f-6 head-description mb-0 pr-2 dislike-count">{{ empty($c->dislike)? 0 :$c->dislike }}</p>
							<i class="fas fa-thumbs-down thumbs-down" data-id= {{$c->id}}></i>
							{!! Form::hidden('dislikeCount',$c->dislike,['id'=>'dislike-count']) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endforeach
</div>
</div>