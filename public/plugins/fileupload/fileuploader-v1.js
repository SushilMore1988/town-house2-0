/**
*	REDE ME
*	this plugin initialized by following code
*	HTML
*	<li class="border drag-container" id="meeting-room-images">
*		<img src="{{url('/img/plus-sign.svg')}}" class="img-fluid w-100" alt="" />
*	</li>

*	$('#meeting-room-images').fileuploader({
			multiple: true,
			name: 'files[]', //name to access
			uploadUrl: '{{route("ajax-upload-co-work-images")}}', //to upload image
			deleteUrl: '{{route("ajax-delete-cowork-image")}}', //to delete uploaded image
			csrfToken: '{{csrf_token()}}',
			photoType: '', //profile image, banner image etc
			coWorkSpaceId: {{$coWorkSpace->id}}, // to make table entry we are passing this id to server
			maxAllowdFileSize: 6297152 //file size limit
		});		
*	
*	
*	
**/


(function($){
	$.fn.fileuploader = function(options){		
		//in this plugin we are refering this(the element on which user clicks + sign or the your customized design element for file upload)
		//refere this cusomized element
		//in this case it will refer to id - meeting-room-images
		var element = $(this);

		//this is default js funtion wich initialize our plugin with parameters
		var settings = $.extend({
			//initialize default options
			multiple: false,
		}, options);


		//append hidden input type file
		//to upload image we need input type file. We will create and append this in design.
		//this is hidden so don't worry about the design
		var inputType = `<input type="file" name="`+settings.name+`" hidden multiple=`+settings.multiple+` />`;		
		this.append(inputType);


		$(element).click(function(event){			
			event.stopPropagation();
			//trigger dynamically added file input
			$(element).find('input[type=file]').click();
		})

		//to avoid maximum call stack size exceeded error
		//https://stackoverflow.com/questions/54984522/uncaught-rangeerror-maximum-call-stack-size-exceeded-jquery-1-12-4
		$(element).find('input[type=file]').click(function(event){
			event.stopPropagation();
		})

		//on user file selection show selected file preview
		$(element).find('input[type=file]').change(function(event){	
			showImagePreview(event);										
		})				

		function getFileName(fileExtension) {
	        var d = new Date();
    	    var year = d.getUTCFullYear();
        	var month = d.getUTCMonth();
        	var date = d.getUTCDate();
          	return 'blob' + year + month + date + '-' + getRandomString() + '.' + fileExtension;
      	}

        function getRandomString() {
              if (window.crypto && window.crypto.getRandomValues && navigator.userAgent.indexOf('Safari') === -1) {
                  var a = window.crypto.getRandomValues(new Uint32Array(3)),
                      token = '';
                  for (var i = 0, l = a.length; i < l; i++) {
                      token += a[i].toString(36);
                  }
                  return token;
              } else {
                  return (Math.random() * new Date().getTime()).toString(36).replace(/\./g, '');
              }
        }

		function showImagePreview(event){
			for(var i = 0; i < event.currentTarget.files.length; i++){				
				if ( /\.(jpe?g|png|gif)$/i.test(event.currentTarget.files[i].name)) {
					//create new file reader object					
					let reader = new FileReader();

					//add event listener for when the file has been loaded to update the src on the file
					//preview
					reader.addEventListener('load', function(){
						let random_name = Math.random().toString(36).substring(10);
						var previewTemplate = `<div class="col-lg-2">
												<div class="border position-relative view-uploadImage" id="`+random_name+`">
													<div  class="overlay position-absolute d-flex justify-content-center">
														<div class="progress w-75 d-flex align-self-center">
														    <div class="progress-bar" style="width:70%"></div>
														</div>
													</div>
													<img src="`+reader.result+`" alt="" class="h-100 w-auto">
												</div>
											</div>`;						

						$('#img-preview').append(previewTemplate);
						
						uploadFilesToServer(random_name, reader.result);					
					});

					/**
					*	Read the data for the file in through the reader. When it has been loaded, we 
					*	listen to the event propagated and set the image src to what was loaded from the 
					*	reader
					**/
					reader.readAsDataURL(event.currentTarget.files[i]);
				}
			}
		}

		//DRAG AND DROP CODE
		//we have 2 cases 
		//1 - user clicks on file uploade btn and file explorer opens for file selection
		//2 - user drag and drop file over the file upload btn
		function showOnDropImagePreview(files){
			for(var i = 0; i < files.length; i++){				
				if ( /\.(jpe?g|png|gif)$/i.test(files[i].name)) {
					//create new file reader object					
					let reader = new FileReader();

					//add event listener for when the file has been loaded to update the src on the file
					//preview
					reader.addEventListener('load', function(){
						let random_name = Math.random().toString(36).substring(10)+i;
						console.log('Random Name : '+random_name);
						var previewTemplate = `<div class="col-lg-2">
												<div class="border position-relative view-uploadImage" id="`+random_name+`">
													<div  class="overlay position-absolute d-flex justify-content-center">
														<div class="progress w-75 d-flex align-self-center">
														    <div class="progress-bar" style="width:70%"></div>
														</div>
													</div>
													<img src="`+reader.result+`" alt="" class="h-100 w-auto">
												</div>
											</div>`;						


						$('#img-preview').append(previewTemplate);
						
						uploadFilesToServer(random_name, reader.result);					
					});

					/**
					*	Read the data for the file in through the reader. When it has been loaded, we 
					*	listen to the event propagated and set the image src to what was loaded from the 
					*	reader
					**/
					reader.readAsDataURL(files[i]);
				}
			}
		}

		$(element).on('dragover', function(e){	
			e.preventDefault();  
    		e.stopPropagation();		
			$(element).css('box-shadow', '0px 0px 14px 2px #CCC');
		});

		$(element).on('dragleave', function(e){			
			e.preventDefault();  
    		e.stopPropagation();		
			$(element).css('box-shadow', '0px 0px 0px 0px #CCC');
		});

		$(element).on('drop', function(e){			
			e.preventDefault();  
    		e.stopPropagation();			
			$(element).css('box-shadow', '0px 0px 0px 0px #CCC');

			showOnDropImagePreview(e.originalEvent.dataTransfer.files);			
		});
		//DRAG AND DROP CODE ENDS

		//We are uploading files server one by one. Not all the files once
		function uploadFilesToServer(previewId, file){
			var formData = new FormData();
			formData.append('_token', settings.csrfToken);
			formData.append('image', file);
			formData.append('id', settings.coWorkSpaceId);

			$.ajax({
				xhr: function(){
					var xhr = new window.XMLHttpRequest();

					xhr.upload.addEventListener('progress', function(e){
						if(e.lengthComputable){							
							var percent = Math.round(e.loaded / e.total * 100);
							$(document).find('#'+previewId).find('.progress-bar').css('width', percent+'%');							
						}
					});					
					return xhr;
				},
				type: 'POST',
				url: settings.uploadUrl,			
				data: formData, 
				processData: false,
				contentType: false,				
				success: function(data){	
					if(data.status == 'success'){
						$(document).find('#'+previewId).find('.overlay').remove();

						var buttonTemplate = `<div class="overlay position-absolute d-flex justify-content-center">														
														<a href="#">
															<i class="far fa-check-circle float-right text-success"></i>
														</a>
														<span data-image-id="`+data.imageId+`" class="delete-img">
															<i style="right:24px;" class="far fa-times-circle float-right text-danger"></i>
														</span>
													</div>`;
										
						$(document).find('#'+previewId).prepend(buttonTemplate);					
					}					
				},
				error: function(){
					console.log('Ajax Error');
				},
				complete: function(){
					
				}
			});						
		}		
		return this;
	}
}(jQuery))