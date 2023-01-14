<div class="tab-pane pt-3 border-tabs @if($current_tab == 'photo') active @endif" id="photo" role="tabpanel">	
	<div class="d-flex flex-column term-condition-wrapper" >
		<div class="align-self-start">
			<h6 class="pb-3 r-boldItalic f-9 check-label">Upload Tile Photo *</h6>
			<div class="uploaded-img">
				<input type="file" name="images" style="display: none" id="banner-image-upload" accept="image/*">
				<ul class="d-flex flex-wrap pl-0">
					@if($coWorkSpace->images['banner'] != null)
						<li class="border drag-container banner-image-li">
							<img src="{{url('/img/cowork/banner/'.$coWorkSpace->images['banner'])}}" class="img-fluid w-100" alt="" />
						</li>
					@endif
					<li class="border drag-container" id="banner-image-li" onclick="document.getElementById('banner-image-upload').click();">
						<img src="{{url('/img/plus-sign.svg')}}" class="img-fluid w-100" alt="" />
					</li>
				</ul>
			</div>
			{{-- <h6 class="pb-3 r-boldItalic f-9 check-label">Upload Cover Photo <small> (Minimum dimension 1366 * 465)</small> *</h6>

			<!-- Set common id for the input for cropper -->
			<input type="text" style="display: none;" id="cropper-input-id">

			<div class="uploaded-img">
				<!-- Add input tag for cropper -->
				<input type="file" name="images" style="display: none" id="cover-image-upload" accept="image/*">
				
				<ul class="d-flex flex-wrap pl-0">
					@if($coWorkSpace->images['cover'] != null)
					<li class="border position-relative">
						<div class="overlay position-absolute d-flex justify-content-center">
							<i class="far fa-check-circle float-right text-success "></i>
						</div>
						<img src="{{url('img/cowork/cover/'.$coWorkSpace->images['cover'])}}" alt="" class="h-100 w-auto" style="max-width: 84px">
					</li>
					@endif
					
					<!-- Add On click event for cropper -->
					<li class="border drag-container" id="cover-image" >
						<img src="{{url('/img/plus-sign.svg')}}" class="img-fluid w-100" alt="" />
					</li>
				</ul>
			</div> --}}
			<h6 class="pb-3 r-boldItalic f-9 check-label">Upload Photos of your Co-Working Space <small>(Dimension 1366 * 465)</small></h6>
			<div class="uploaded-img">
				<ul class="d-flex flex-wrap pl-0">
					@if($coWorkSpace->images['all'] != null)
						@foreach($coWorkSpace->images['all'] as $value)
							<li class="border drag-container position-relative">
								<div class="position-absolute d-flex delete-img" data-image-id="{{$value}}" data-type="all">
									<i class="far fa-times-circle text-danger"></i>
								</div>
								<img src="{{url('/img/cowork/'.$value)}}" class="img-fluid w-100" alt="" />
							</li>
						@endforeach
					@endif
					<li class="border drag-container" id="drag-container">
						<img src="{{url('/img/plus-sign.svg')}}" class="img-fluid w-100" alt="" />
					</li>
				</ul>
			</div>
			<h6 class="pb-3 r-boldItalic f-9 check-label">Upload Photos of Desks <small>(Dimension 1366 * 465)</small></h6>
			<div class="uploaded-img">
				<ul class="d-flex flex-wrap pl-0">
					@if($coWorkSpace->images['desk'] != null)
						@foreach($coWorkSpace->images['desk'] as $value)
							<li class="border drag-container position-relative">
								<div class="position-absolute d-flex delete-img" data-image-id="{{$value}}" data-type="desk">
									<i class="far fa-times-circle text-danger"></i>
								</div>
								<img src="{{url('/img/cowork/'.$value)}}" class="img-fluid w-100" alt="" />
							</li>
						@endforeach
					@endif
					<li class="border drag-container" id="desk-images">
						<img src="{{url('/img/plus-sign.svg')}}" class="img-fluid w-100" alt="" />
					</li>			
				</ul>
			</div>
			<h6 class="pb-3 r-boldItalic f-9 check-label">Upload Photos of Private Offices <small>(Dimension 1366 * 465)</small></h6>
			<div class="uploaded-img">
				<ul class="d-flex flex-wrap pl-0">
					@if($coWorkSpace->images['private_office'] != null)
						@foreach($coWorkSpace->images['private_office'] as $value)
							<li class="border drag-container position-relative">
								<div class="position-absolute d-flex delete-img" data-image-id="{{$value}}" data-type="private_office">
									<i class="far fa-times-circle text-danger"></i>
								</div>
								<img src="{{url('/img/cowork/'.$value)}}" class="img-fluid w-100" alt="" />
							</li>
						@endforeach
					@endif
					<li class="border drag-container" id="private-office-images">
						<img src="{{url('/img/plus-sign.svg')}}" class="img-fluid w-100" alt="" />
					</li>
				</ul>
			</div>
			<h6 class="pb-3 r-boldItalic f-9 check-label">Upload Photos of Meeting Rooms <small>(Dimension 1366 * 465)</small></h6>
			<div class="uploaded-img">
				<ul class="d-flex flex-wrap pl-0">
					@if($coWorkSpace->images['meeting_room'] != null)
						@foreach($coWorkSpace->images['meeting_room'] as $value)
							<li class="border drag-container position-relative">
								<div class="position-absolute d-flex delete-img" data-image-id="{{$value}}" data-type="meeting_room">
									<i class="far fa-times-circle text-danger"></i>
								</div>
								<img src="{{url('/img/cowork/'.$value)}}" class="img-fluid w-100" alt="" />
							</li>
						@endforeach
					@endif
					<li class="border drag-container" id="meeting-room-images">
						<img src="{{url('/img/plus-sign.svg')}}" class="img-fluid w-100" alt="" />
					</li>
				</ul>
			</div>
		</div>
		<div class="align-items-end justify-content-center d-flex list-space-button photos-responsive w-100">
			<div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5 w-100">
				<button type="button" class="photo-btn-next btn btn-success n-bold f-9 rounded-0 ml-2 w-100">Save</button>	
			</div>
		</div>
	</div>
</div>


<div class="modal fade imgCroppermodal pr-0" id="imgCroppermodalForOtherImages" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog h-100 w-100 m-0" role="document" >
        <div class="modal-content w-100 h-100 m-0">
          <!-- <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Crop the image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> -->
          <div class="modal-body p-0 h-100">
            <div class="img-container w-100 position-relative h-100" >
              	<img id="cropper-other-image" src="">
              	<div class="zoom-wrapper text-center px-5 rounded-9" >
		            <button class="zoom-in btn btn-dark px-3 border-0 text-white" >
				  		<span class="fa fa-search-plus"></span>
				  	</button>
				  	<button class="zoom-out btn btn-dark px-3 border-0 text-white" >
				  		<span class="fa fa-search-minus"></span>
				  	</button>
				  	<button type="button" class="btn btn-dark border-0 px-3 r-boldItalic text-white f-14" id="cropOtherImages" >
				  		<!-- <span class="fas fa-crop-alt"></span> -->
				  		Crop & Save
				  	</button>
				  	<button type="button" class=" btn btn-dark border-0 px-3" data-dismiss="modal" aria-label="Close">
			              <span aria-hidden="true" class="text-white f-24">&times;</span>
			        </button>
				 </div>

            </div>
          </div>
          <!-- <div class="modal-footer">
          	<button class="zoom-in btn btn-primary px-2">
		  		<span class="fa fa-search-plus"></span>
		  	</button>
		  	<button class="zoom-out btn btn-primary px-2">
		  		<span class="fa fa-search-minus"></span>
		  	</button>
            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> --}}
            <button type="button" class="btn btn-primary" id="crop">Crop</button>
          </div> -->
        </div>
      </div>

	</div>
	

	<div class="modal fade imgCroppermodal pr-0" id="imgCroppermodal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog h-100 w-100 m-0" role="document" >
		  <div class="modal-content w-100 h-100 m-0">
			<!-- <div class="modal-header">
			  <h5 class="modal-title" id="modalLabel">Crop the image</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div> -->
			<div class="modal-body p-0 h-100">
			  <div class="img-container w-100 position-relative h-100" >
					<img id="cropper-image" src="">
					<div class="zoom-wrapper text-center px-5 rounded-9" >
					  <button class="zoom-in btn btn-dark px-3 border-0 text-white" >
							<span class="fa fa-search-plus"></span>
						</button>
						<button class="zoom-out btn btn-dark px-3 border-0 text-white" >
							<span class="fa fa-search-minus"></span>
						</button>
						<button type="button" class="btn btn-dark border-0 px-3 r-boldItalic text-white f-14" id="crop" >
							<!-- <span class="fas fa-crop-alt"></span> -->
							Crop & Save
						</button>
						<button type="button" class=" btn btn-dark border-0 px-3" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" class="text-white f-24">&times;</span>
					  </button>
				   </div>
  
			  </div>
			</div>
			<!-- <div class="modal-footer">
				<button class="zoom-in btn btn-primary px-2">
					<span class="fa fa-search-plus"></span>
				</button>
				<button class="zoom-out btn btn-primary px-2">
					<span class="fa fa-search-minus"></span>
				</button>
			  {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> --}}
			  <button type="button" class="btn btn-primary" id="crop">Crop</button>
			</div> -->
		  </div>
		</div>
  
	  </div>
	  