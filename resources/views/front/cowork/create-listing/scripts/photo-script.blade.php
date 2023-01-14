<script type="text/javascript">				
	if($('#photo .uploaded-img').find('img').length < 8){ 
		$('.photo-mark').addClass('d-none');
		$('.photo-mark-error').removeClass('d-none');
	}else if($('#photo .uploaded-img').find('img').length >= 8){ 
		$('.photo-mark').removeClass('d-none');
		$('.photo-mark-error').addClass('d-none');
	}		

	//photo uploader js start		
	$('#drag-container').fileuploader({
		multiple: true,
		name: 'files[]',
		uploadUrl: '{{ route('co-work-space.image.store', $coWorkSpace->id) }}',
		deleteUrl: '{{route("ajax-delete-cowork-image")}}',
		csrfToken: '{{csrf_token()}}',
		photoType: '{{config("constant.CO_WORK.PHOTOS.CO_WORKING_SPACE")}}',
		coWorkSpaceId: {{$coWorkSpace->id}},
		maxAllowdFileSize: 6297152
	});

	$('#desk-images').fileuploader({
		multiple: true,
		name: 'files[]',
		uploadUrl: '{{ route('co-work-space.desk.image.store', $coWorkSpace->id) }}',
		deleteUrl: '{{route("ajax-delete-cowork-image")}}',
		csrfToken: '{{csrf_token()}}',
		photoType: '{{config("constant.CO_WORK.PHOTOS.DESK")}}',
		coWorkSpaceId: {{$coWorkSpace->id}},
		maxAllowdFileSize: 6297152
	});	

	$('#meeting-room-images').fileuploader({
		multiple: true,
		name: 'files[]',
		uploadUrl: '{{ route('co-work-space.meeting-room.image.store', $coWorkSpace->id) }}',
		deleteUrl: '{{route("ajax-delete-cowork-image")}}',
		csrfToken: '{{csrf_token()}}',
		photoType: '{{config("constant.CO_WORK.PHOTOS.MEETING_ROOMS")}}',
		coWorkSpaceId: {{$coWorkSpace->id}},
		maxAllowdFileSize: 6297152
	});

	$('#private-office-images').fileuploader({
		multiple: true,
		name: 'files[]',
		uploadUrl: '{{ route('co-work-space.private-office.image.store', $coWorkSpace->id) }}',
		deleteUrl: '{{route("ajax-delete-cowork-image")}}',
		csrfToken: '{{csrf_token()}}',
		photoType: '{{config("constant.CO_WORK.PHOTOS.PRIVATE_OFFICES")}}',
		coWorkSpaceId: {{$coWorkSpace->id}},
		maxAllowdFileSize: 6297152
	});			

	// $('#cover-image').coveruploader({
	
	// $('#cover-image').coveruploader({
	// 	multiple: false,
	// 	name: 'files[]',
	// 	uploadUrl: '{{ route('co-work-space.cover.store', $coWorkSpace->id) }}',
	// 	csrfToken: '{{csrf_token()}}',
	// 	coWorkSpaceId: {{$coWorkSpace->id}},
	// 	maxAllowdFileSize: 6297152
	// });		

	//photo uploader js ends
	$(document).on('click', '.delete-img', function(e)
	{
		e.stopPropagation();
		var iname = $(this).data('image-id');
		var itype = $(this).data('type');
		var formData = new FormData();
		formData.append('name', iname);
		formData.append('type', itype);
		formData.append('cws_id', {{$coWorkSpace->id}});
		formData.append('_token', '{{csrf_token()}}');
		var self = this;
		$.ajax({
			url : '{{route("ajax-delete-cowork-image")}}',
			data: formData,
			type: 'POST',
			processData: false,
			contentType: false,
			success: function(data){
				if(data.status == 'success'){
					$(self).closest('li').remove();
				}
			},
			error: function(error){
				console.log(error);
			}
		});
	});

	$('.photo-btn-next').click(function(){
		$('.sidebar a').removeClass('active show');
		$('.marketing').addClass('active show');

		$('.tab-pane').removeClass('active show');
		$('.package-tab').addClass('active show');

		if($('#photo .uploaded-img').find('img').length > 7){
			$('.photo-mark').css('display', 'block');
		}	
	});

	//Cropper script from sushil
	$("#banner-image-upload").on("change", function(event) {
       	$('#active-cropper').val('cropper-image');
    });

	function validateFileSize(file){    	
		var file_size = file['size'];
		var sFileName = file['name'];
		//console.log('file size ' + file_size);
		if(file_size > 4000000) {
			alert('File Size Error - Maximum allowed file size 4MB');
			$('#file-upload-err').removeClass('d-none');
	        $('#file-upload-err').html('Selected file ['+sFileName+'] size is greater than 6MB');			
			return false;
		} 

		return true;
	}

	window.addEventListener('DOMContentLoaded', function () {
		// var avatar = document.getElementById('profile-image');
		var image = document.getElementById('cropper-image');
		var input = document.getElementById('banner-image-upload');

		// var avatar1 = document.getElementById('banner-cropper-image');		
		// var input1 = document.getElementById('banner_image');


		var $progress = $('.progress');
		var $progressBar = $('.progress-bar');
		var $alert = $('.alert');
		var $modal = $('#imgCroppermodal');
		var cropper;	

		$('[data-toggle="tooltip"]').tooltip();

		input.addEventListener('change', function (e) {
			// console.log('input addevent listener');
			var files = e.target.files;
			//validateFileSize(files[0]);

			var done = function (url) {
		   		input.value = '';
				image.src = url;
				$alert.hide();
				$modal.modal('show');
			};
			var reader;
			var file;
			var url;

			if (files && files.length > 0) {
			  file = files[0];

			  if (URL) {
			  	if(validateFileSize(file)){			  		
			    	done(URL.createObjectURL(file));
			  	}
			  } else if (FileReader) {
			    reader = new FileReader();
			    reader.onload = function (e) {
			    	if(validateFileSize(file)){
			      		done(reader.result);
			    	}
			    };
			    reader.readAsDataURL(file);
			  }
			};
		});

	  	$modal.on('shown.bs.modal', function () {
	  		cropper = new Cropper(image, {
	  			//viewMode: 2,
				aspectRatio: 1,
				responsive: true,
				//modal: true,
				guides: true,
				center: true,
				dragMode: 'move',
				autoCropArea: 0,		      
				center: false,
				highlight: false,
				zoomable: true,
				cropBoxMovable: true,
				cropBoxResizable: false,
				toggleDragModeOnDblclick: false,		      	
		    });    
	   
	  	}).on('hidden.bs.modal', function () {
		  	if(cropper != null)
		  		cropper.destroy();
			cropper = null;
	  	});
	  	
	  	$('.zoom-in').click(function(){
  			cropper.zoom(0.1);
  		});
  		$('.zoom-out').click(function(){
  			cropper.zoom(-0.1);
  		});

	  	$(document).on('click', '#crop', function () {
		  	cropper.getCroppedCanvas().toBlob((blob) => {
		  		var overlay = `<div class="overlay">
								    <div class="overlay__inner">
								        <div class="overlay__content"><span class="spinner"></span></div>
								    </div>
								</div>`;
		  		var formData = new FormData();
		  			formData.append("image", blob);
					var url = "{{route('co-work-space.banner.store', $coWorkSpace->id)}}";
					$('.profile-overlay').html(overlay);
		                
		        formData.append('_token', '{{ csrf_token() }}');

				// Use `jQuery.ajax` method
				$.ajax(url, {
					method: "POST",
					data: formData,
					processData: false,
					contentType: false,
					success: function(data) {
					  if (data.status == "success") {
					  	$('.banner-image-li').remove();
					  	$('#banner-image-li').before('<li class="border drag-container banner-image-li"><img src="{{url('/img/cowork/banner')}}/'+data.banner+'" class="img-fluid w-100" alt="" /></li>');
							// $('.banner-overlay').html('');
							// $('.profile-overlay').html('');
							// $('#successModal').modal('show');
							// $('#successMessageText').html('Banner image updated successfully.');
							// alert('Banner image updated successfully.');
							toastr.success(data.message);
		                	{{-- $("img.profile-img").attr("src", '{{url("/img/cowork/banner")}}/'+data.profile_image); --}}
			            } else {
			                alert("Error in uploading banner image. Please try again.");
			            }
					},
					error() {
						alert("Error in uploading banner image. Please try again.");
					},
				});
			});
			cropper.destroy();
			cropper = null;
	  	});

		document.getElementById('crop').addEventListener('click', function () {
		    // var initialAvatarURL;
		    var canvas;

		    $modal.modal('hide');

		    if (cropper) {
		      
		      	canvas = cropper.getCroppedCanvas({
			        height: 300
			    });
		      	// initialAvatarURL = avatar.src;
		      	// avatar.src = canvas.toDataURL();	
		      	// $('#profile-image').addClass('w-100');
		      	// $('#profile-image').removeClass('default-image');
		      $progress.show();
		      $alert.removeClass('alert-success alert-warning');
		    }
		});
	});

    $(document).ready(function() {
		$('#crop').click(function() {
			$('.crop-img-conatiner .position-relative').css({
				'height': '300px',
				'width': '300px',
				'margin': 'auto'
			});
			$('.crop-img-conatiner .addimg').css({
				'position': 'absolute',
				'top': '0',
				'left': '0',
				'height': '100%',
				'width': '100%',
				'opacity': '0'
			});
			$('.continue-btn button').removeAttr('disabled');
		});

	});
</script>