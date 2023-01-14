<script type="text/javascript">				
	if($('#photo .uploaded-img').find('img').length < 8){ 
		$('.photo-mark').addClass('d-none');
		$('.photo-mark-error').removeClass('d-none');
	}else if($('#photo .uploaded-img').find('img').length >= 8){ 
		$('.photo-mark').removeClass('d-none');
		$('.photo-mark-error').addClass('d-none');
	}		

	//Cropper script from sushil
	$("#banner-image-upload").on("change", function(event) {
       	$('#active-cropper').val('cropper-image');
    });

    $("#cover-image").on("click", function(event) {
       	$('#active-cropper').val('cropper-other-image');
        
        // $('#cropper-input-id').val('cover-image-upload');

        //set cropper image container height width
        setCropperImageContainerHeightWidth();

        //trigger file input to select file
        $('#cover-image-upload').trigger('click');
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
        //this cropper image id is common to perform cropper operations
		var image = document.getElementById('cropper-other-image');

		var input = document.getElementById('banner-image-upload');
		// var coverImage = document.getElementById('cover-image-upload');
		// var input = document.getElementById('banner-image-upload');

		// var avatar1 = document.getElementById('banner-cropper-image');		
		// var input1 = document.getElementById('banner_image');


		var $progress = $('.progress');
		var $progressBar = $('.progress-bar');
		var $alert = $('.alert');
		var $modal = $('#imgCroppermodalForOtherImages');
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

        // coverImage.addEventListener('change', function (e) {
		// 	// console.log('input addevent listener');
		// 	var files = e.target.files;
		// 	//validateFileSize(files[0]);

		// 	var done = function (url) {
		//    		input.value = '';
		// 		image.src = url;
		// 		$alert.hide();
		// 		$modal.modal('show');
		// 	};
		// 	var reader;
		// 	var file;
		// 	var url;

		// 	if (files && files.length > 0) {
		// 	  file = files[0];

		// 	  if (URL) {
		// 	  	if(validateFileSize(file)){			  		
		// 	    	done(URL.createObjectURL(file));
		// 	  	}
		// 	  } else if (FileReader) {
		// 	    reader = new FileReader();
		// 	    reader.onload = function (e) {
		// 	    	if(validateFileSize(file)){
		// 	      		done(reader.result);
		// 	    	}
		// 	    };
		// 	    reader.readAsDataURL(file);
		// 	  }
		// 	};
		// });

	  	$modal.on('shown.bs.modal', function () {
	  		cropper = new Cropper(image, {
	  			//viewMode: 2,
				aspectRatio: 1366/465,
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

	  	$(document).on('click', '#cropOtherImages', function () {
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

		document.getElementById('cropOtherImages').addEventListener('click', function () {
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

    function setCropperImageContainerHeightWidth(){
        $('.crop-img-conatiner .position-relative').css({
				'height': '1366px',
				'width': '465px',
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
    }

</script>