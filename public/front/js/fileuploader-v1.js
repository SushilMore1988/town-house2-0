(function($){
	$.fn.fileuploader = function(options){		
		//default options
		var element = $(this);

		var settings = $.extend({
			multiple: false,		
		}, options);


		//append hidden input type file
		var inputType = `<input type="file" name="`+settings.name+`" hidden multiple=`+settings.multiple+` />`;
		this.append(inputType);

		$(element).click(function(event){			
			event.stopPropagation();
			$(element).find('input[type=file]').click();
		})

		//to avoid maximum call stack size exceeded error
		//https://stackoverflow.com/questions/54984522/uncaught-rangeerror-maximum-call-stack-size-exceeded-jquery-1-12-4
		$(element).find('input[type=file]').click(function(event){
			event.stopPropagation();
		})

		//after selecting files by user show image preview
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

        //show image preview to user
		function showImagePreview(event){
			for(var i = 0; i < event.currentTarget.files.length; i++){				
				let random_name = Math.random().toString(36).substring(10)+i;
				console.log(event.currentTarget.files[0]);
				if(validateFileSize(event.currentTarget.files[i].size)){
					if ( /\.(jpe?g|png|gif)$/i.test(event.currentTarget.files[i].name)) {
						//create new file reader object

						let reader = new FileReader();

						//add event listener for when the file has been loaded to update the src on the file
						//preview
						reader.addEventListener('load', function(file){
							var image = new Image();
							image.src = reader.result;
							image.onload = function(){
								if(!validateFileDimensions(this.width, this.height) && false){
									//file dimensions is not allowed show error to user
									var errorPreviewTemplate = `<li class="border position-relative addDelete-img deletePreview" id="`+random_name+`">
																<div class="overlay position-absolute d-flex justify-content-center danger-border">
																	<p class="text-danger f-8 d-flex align-self-center mb-0 justify-content-center text-center" title="`+event.currentTarget.files[0].name+` is invalid file type to upload">
																		`+event.currentTarget.files[0].name.substring(0, 15)+` dimensions not matching
																	</p>
																	<a href="javascript:void(0)" class="minus-border">
																		<i class="fas fa-minus-circle float-right text-danger"></i>
																	</a>
																</div>
																<img src="" alt="" class="h-100 w-auto">
															</li>`;											

									$(element).before(errorPreviewTemplate);
									toastr.error("Please upload image of given dimension");

								}
								else{
									var previewTemplate = `<li class="border position-relative" id="`+random_name+`">
																<div class="overlay position-absolute d-flex justify-content-center">
																	<div class="progress w-75 d-flex align-self-center">
																	    <div class="progress-bar" style="width:70%"></div>
																	</div>
																</div>
																<img src="`+reader.result+`" alt="" class="h-100 w-auto" style="max-width: 84px">
															</li>`;

									$(element).before(previewTemplate);							
									uploadFilesToServer(random_name, reader.result);

								}
								//console.log('Image width : '+this.width);
							}
							//console.log('Random Name : '+random_name);							
						});

						/**
						*	Read the data for the file in through the reader. When it has been loaded, we 
						*	listen to the event propagated and set the image src to what was loaded from the 
						*	reader
						**/
						reader.readAsDataURL(event.currentTarget.files[i]);
					}
					else{
						//file type is not allowed show error to user
						var errorPreviewTemplate = `<li class="border position-relative addDelete-img deletePreview" id="`+random_name+`">
													<div class="overlay position-absolute d-flex justify-content-center danger-border">
														<p class="text-danger f-8 d-flex align-self-center mb-0 justify-content-center text-center" title="`+event.currentTarget.files[0].name+` is invalid file type to upload">
															`+event.currentTarget.files[0].name.substring(0, 15)+` Failed Uploading
														</p>
														<a href="javascript:void(0)" class="minus-border">
															<i class="fas fa-minus-circle float-right text-danger"></i>
														</a>
													</div>
													<img src="" alt="" class="h-100 w-auto">
												</li>`;											

						$(element).before(errorPreviewTemplate);
						toastr.error("Please upload jpg, png or gif image only");

					}
				}
				else{
					//show file size error
					var errorPreviewTemplate = `<li class="border position-relative addDelete-img deletePreview" id="`+random_name+`">
													<div class="overlay position-absolute d-flex justify-content-center danger-border">
														<p class="text-danger f-8 d-flex align-self-center mb-0 justify-content-center text-center" title="`+event.currentTarget.files[0].name+` exceeded max allowed file size">
															`+event.currentTarget.files[0].name.substring(0, 10)+` exceeded max allowed file size
														</p>
														<a href="javascript:void(0)" class="minus-border">
															<i class="fas fa-minus-circle float-right text-danger"></i>
														</a>
													</div>
													<img src="" alt="" class="h-100 w-auto">
												</li>`;											

					$(element).before(errorPreviewTemplate);
					toastr.error("Maximum image size exceeds");

				}				
			}
		}
		
		function validateFileDimensions(width, height){
			if(width < 1366 || height < 465){
				return false;
			}
			return true;
		}

		function validateFileSize(fileSize){
			//6 MB			
			if(fileSize > settings.maxAllowdFileSize) {				
				return false;
			}
			return true;
		}

		$(document).on('click', '.deletePreview', function(e){
			console.log($('.deletePreview').length);
			e.stopPropagation();
			$(this).remove();
		});

		function showOnDropImagePreview(files){
			for(var i = 0; i < files.length; i++){				
				if ( /\.(jpe?g|png|gif)$/i.test(files[i].name)) {
					//create new file reader object					
					let reader = new FileReader();

					//add event listener for when the file has been loaded to update the src on the file
					//preview
					reader.addEventListener('load', function(){
						 let random_name = Math.random().toString(36).substring(10)+i;
						// var previewTemplate = `<li class="border position-relative" id="`+random_name+`">
						// 							<div class="overlay position-absolute d-flex justify-content-center">
						// 								<div class="progress w-75 d-flex align-self-center">
						// 								    <div class="progress-bar" style="width:70%"></div>
						// 								</div>
						// 							</div>
						// 							<img src="`+reader.result+`" alt="" class="h-100 w-auto" style="max-width: 84px">
						// 						</li>`;

						// $(element).before(previewTemplate);
						
						// uploadFilesToServer(random_name, reader.result);

						var image = new Image();
							image.src = reader.result;
							image.onload = function(){
								if(!validateFileDimensions(this.width, this.height) && false){
									//file dimensions is not allowed show error to user
									var errorPreviewTemplate = `<li class="border position-relative addDelete-img deletePreview" id="`+random_name+`">
																<div class="overlay position-absolute d-flex justify-content-center danger-border">
																	<p class="text-danger f-8 d-flex align-self-center mb-0 justify-content-center text-center" title="`+this.name+` is invalid file type to upload">
																		`+this.name.substring(0, 15)+` dimensions not matching
																	</p>
																	<a href="javascript:void(0)" class="minus-border">
																		<i class="fas fa-minus-circle float-right text-danger"></i>
																	</a>
																</div>
																<img src="" alt="" class="h-100 w-auto">
															</li>`;											

									$(element).before(errorPreviewTemplate);
								}
								else{
									var previewTemplate = `<li class="border position-relative" id="`+random_name+`">
																<div class="overlay position-absolute d-flex justify-content-center">
																	<div class="progress w-75 d-flex align-self-center">
																	    <div class="progress-bar" style="width:70%"></div>
																	</div>
																</div>
																<img src="`+reader.result+`" alt="" class="h-100 w-auto" style="max-width: 84px">
															</li>`;

									$(element).before(previewTemplate);							
									uploadFilesToServer(random_name, reader.result);					
								}
								//console.log('Image width : '+this.width);
							}					
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

		function uploadFilesToServer(previewId, file){
			var formData = new FormData();
			formData.append('_token', settings.csrfToken);			
			formData.append('image', file);
			formData.append('id', settings.coWorkSpaceId);
			formData.append('photoType', settings.photoType);

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
												<span data-image="`+data.coWorkSpacePhotoId+`" data-type="`+data.photoType+`"class="delete-img">
													<i style="right:24px;" class="far fa-times-circle float-right text-danger"></i>
												</span>
											</div>`;						
						$(document).find('#'+previewId).prepend(buttonTemplate);
						if($('#photo .uploaded-img').find('img').length > 7){
							$('.photo-mark').css('display', 'block');
						}	
					}					
				},
				error: function(){
					console.log('Ajax Error');
				},
				complete: function(){
					toastr.success("Image uploaded successfully!");
					
				}
			});						
		}

		

		return this;
	}

	$.fn.coveruploader = function(options){
		var element = $(this);

		var settings = $.extend({
			multiple: false,		
		}, options);

		//append hidden input type file
		var inputType = `<input type="file" name="`+settings.name+`" hidden />`;
		this.append(inputType);

		$(element).click(function(event){			
			event.stopPropagation();
			$(element).find('input[type=file]').click();
		})

		//to avoid maximum call stack size exceeded error
		//https://stackoverflow.com/questions/54984522/uncaught-rangeerror-maximum-call-stack-size-exceeded-jquery-1-12-4
		$(element).find('input[type=file]').click(function(event){
			event.stopPropagation();
		})

		//after selecting files by user show image preview
		$(element).find('input[type=file]').change(function(event){	
			showImagePreview(event);										
		});

		 //show image preview to user
		function showImagePreview(event){
			//for(var i = 0; i < event.currentTarget.files.length; i++){				
				let random_name = Math.random().toString(36).substring(10);
				console.log(event.currentTarget.files[0]);
				if(validateFileSize(event.currentTarget.files[0].size)){
					if ( /\.(jpe?g|png|gif)$/i.test(event.currentTarget.files[0].name)) {
						//create new file reader object					
						let reader = new FileReader();

						//add event listener for when the file has been loaded to update the src on the file
						//preview
						reader.addEventListener('load', function(){						
							//console.log('Random Name : '+random_name);
							var previewTemplate = `<li class="border position-relative" id="`+random_name+`">
														<div class="overlay position-absolute d-flex justify-content-center">
															<div class="progress w-75 d-flex align-self-center">
															    <div class="progress-bar" style="width:70%"></div>
															</div>
														</div>
														<img src="`+reader.result+`" alt="" class="h-100 w-auto" style="max-width: 84px">
													</li>`;

							if($(element).parent().find('li').length > 1){
								$(element).parent().find('li').first().remove();
							}
							$(element).before(previewTemplate);
							
							uploadFilesToServer(random_name, reader.result);					
						});

						/**
						*	Read the data for the file in through the reader. When it has been loaded, we 
						*	listen to the event propagated and set the image src to what was loaded from the 
						*	reader
						**/
						reader.readAsDataURL(event.currentTarget.files[0]);
					}
					else{
						//file type is not allowed show error to user
						var errorPreviewTemplate = `<li class="border position-relative addDelete-img deletePreview" id="`+random_name+`">
													<div class="overlay position-absolute d-flex justify-content-center danger-border">
														<p class="text-danger f-8 d-flex align-self-center mb-0 justify-content-center text-center" title="`+event.currentTarget.files[0].name+` is invalid file type to upload">
															`+event.currentTarget.files[0].name.substring(0, 15)+` Failed Uploading
														</p>
														<a href="javascript:void(0)" class="minus-border">
															<i class="fas fa-minus-circle float-right text-danger"></i>
														</a>
													</div>
													<img src="" alt="" class="h-100 w-auto">
												</li>`;											
						if($(element).parent().find('li').length > 1){
							$(element).parent().find('li').first().remove();
						}
						$(element).before(errorPreviewTemplate);
					}
				}
				else{
					//show file size error
					var errorPreviewTemplate = `<li class="border position-relative addDelete-img deletePreview" id="`+random_name+`">
													<div class="overlay position-absolute d-flex justify-content-center danger-border">
														<p class="text-danger f-8 d-flex align-self-center mb-0 justify-content-center text-center" title="`+event.currentTarget.files[0].name+` exceeded max allowed file size">
															`+event.currentTarget.files[0].name.substring(0, 10)+` exceeded max allowed file size
														</p>
														<a href="javascript:void(0)" class="minus-border">
															<i class="fas fa-minus-circle float-right text-danger"></i>
														</a>
													</div>
													<img src="" alt="" class="h-100 w-auto">
												</li>`;											
					if($(element).parent().find('li').length > 1){
						$(element).parent().find('li').first().remove();
					}
					$(element).before(errorPreviewTemplate);
				}				
			//}
		}

		function validateFileDimensions(width, height){
			if(width < 1366 || height < 465){
				return false;
			}
			return true;
		}
		
		function validateFileSize(fileSize){
			//6 MB			
			if(fileSize > settings.maxAllowdFileSize) {				
				return false;
			}
			return true;
		}

		$(document).on('click', '.deletePreview', function(e){
			console.log($('.deletePreview').length);
			e.stopPropagation();
			$(this).remove();
		});

		function showOnDropImagePreview(files){
			//for(var i = 0; i < files.length; i++){				
				if ( /\.(jpe?g|png|gif)$/i.test(files[0].name)) {
					//create new file reader object					
					let reader = new FileReader();

					//add event listener for when the file has been loaded to update the src on the file
					//preview
					reader.addEventListener('load', function(){
						let random_name = Math.random().toString(36).substring(10);
						//console.log('Random Name : '+random_name);
						var previewTemplate = `<li class="border position-relative" id="`+random_name+`">
													<div class="overlay position-absolute d-flex justify-content-center">
														<div class="progress w-75 d-flex align-self-center">
														    <div class="progress-bar" style="width:70%"></div>
														</div>
													</div>
													<img src="`+reader.result+`" alt="" class="h-100 w-auto" style="max-width: 84px">
												</li>`;
						if($(element).parent().find('li').length > 1){
							$(element).parent().find('li').first().remove();
						}
						$(element).before(previewTemplate);
						
						uploadFilesToServer(random_name, reader.result);					
					});

					/**
					*	Read the data for the file in through the reader. When it has been loaded, we 
					*	listen to the event propagated and set the image src to what was loaded from the 
					*	reader
					**/
					reader.readAsDataURL(files[0]);
				}
			//}
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

		function uploadFilesToServer(previewId, file){
			var formData = new FormData();
			formData.append('_token', settings.csrfToken);			
			formData.append('image', file);
			formData.append('id', settings.coWorkSpaceId);
			formData.append('photoType', settings.photoType);

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
												<span data-image-id="`+data.coWorkSpacePhotoId+`" class="delete-img">
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