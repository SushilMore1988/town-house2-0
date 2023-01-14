<script type="text/javascript">
		$('.publish-button').on('click', function(e){
			// document.getElementById("select_test_id").value = $('.publish-button').val();
			var stat = $(this).val();
			$('.status').val(stat);
			document.getElementByTagName('form').submit();
			});

		   	setTimeout(function() {
		  	  $('.alert-success').fadeOut('fast');
			}, 3000); 

			$('#photograph').click(function(){
				$('#selfie-image').trigger('click');
			});

			$('.gov-id').click(function(){
				//$('#government-id').trigger('click');
				$(this).parent().find('.government-ids').trigger('click');
			});

			$('#selfie-image').on('change',function(){ 
				$("#selfiePhoto").submit(); 
			});

			$('#selfiePhoto').on('submit',(function(e) {  
		        e.preventDefault();
        		var url = "{{route('selfie.image')}}";
        		$('#official-photo-progress').removeClass('d-none');
		        $.ajax({
		        	headers: {
		                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		            },
		            xhr: function(){
						var xhr = new window.XMLHttpRequest();

						xhr.upload.addEventListener('progress', function(e){
							if(e.lengthComputable){								
								var percent = Math.round(e.loaded / e.total * 100);				
								$('#official-photo-progress').find('.progress-bar').attr('aria-valuenow', percent).css('width', percent+'%').text(percent + '%');
							}
						});					
						return xhr;
					},
		            type:'POST',
		            url: url,
		            data: new FormData(this),
		            dataType: 'JSON',
		            cache: false,
		            contentType: false,
		            processData: false,
		            
		            success:function(data){ 
		            	$('#official-photo-progress').addClass('d-none');
		            	toastr.success('Official photograph uploaded successfully.');
						window.location.reload();
		            },
		            error: function(data){
		            	toastr.error('Official photograph uploading failed. Please try again.');
		            },
		            
		        });
		    }));

			// $('#government-id').on('change',function(){ 
			// 	$("#governmentId").submit(); 
			// });

			$('.government-ids').on('change', function(){
				//to set active progress bar
				$(this).parent().find('.gov-id-progress').addClass('activeProgress');

				$("#governmentFormId").submit(); 
			});

			$('#governmentFormId').on('submit',(function(e) {  
		        e.preventDefault();
        		var url = "{{route('government.id')}}";
        		$('.activeProgress').removeClass('d-none');
		        $.ajax({
		        	headers: {
		                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		            },
		            xhr: function(){
						var xhr = new window.XMLHttpRequest();

						xhr.upload.addEventListener('progress', function(e){
							if(e.lengthComputable){								
								var percent = Math.round(e.loaded / e.total * 100);				
								$('.activeProgress').find('.progress-bar').attr('aria-valuenow', percent).css('width', percent+'%').text(percent + '%');
							}
						});					
						return xhr;
					},
		            type:'POST',
		            url: url,
		            data: new FormData(this),
		            dataType: 'JSON',
		            cache: false,
		            contentType: false,
		            processData: false,
		            
		            success:function(data){ 
		            	$('.activeProgress').addClass('d-none');
						$('.activeProgress').removeClass('activeProgress');
		            	toastr.success('Government ID document uploaded successfully.');
						window.location.reload();
		            },
		            error: function(data){
		            	$('.activeProgress').addClass('d-none');
						$('.activeProgress').removeClass('activeProgress');
		            	toastr.error('Goverment ID document uploading failed. Please try again.');
		            },		            
		        });
		    }));

			//Delete goverment id
			$('.delete-gov-id').click(function(e){				
				e.preventDefault();
        		var url = "{{route('ajax.delete.government.id')}}";
				var formData = new FormData();
				formData.append('_token', '{{csrf_token()}}');
				formData.append('govDocNo', $(this).data('gov-doc'));
		        $.ajax({		        	
		            type:'POST',
		            url: url,
		            data: formData,
		            dataType: 'JSON',
		            cache: false,
		            contentType: false,
		            processData: false,
		            
		            success:function(data){ 		            	
		            	toastr.success('Government ID document deleted successfully.');
						window.location.reload();
		            },
		            error: function(data){
		            	toastr.error('Goverment ID document deleting failed. Please try again.');
		            },		            
		        });
			});

			//Delete photo 
			$('.delete-photo').click(function(e){				
				e.preventDefault();
        		var url = "{{route('ajax.delete.photo.id')}}";
				var formData = new FormData();
				formData.append('_token', '{{csrf_token()}}');
		        $.ajax({		        	
		            type:'POST',
		            url: url,
		            data: formData,
		            dataType: 'JSON',
		            cache: false,
		            contentType: false,
		            processData: false,
		            
		            success:function(data){ 		            	
		            	toastr.success('Photo ID document deleted successfully.');
						//window.location.reload();
		            },
		            error: function(data){
		            	toastr.error('Photo ID document deleting failed. Please try again.');
		            },		            
		        });
			});

		    $('.deleteBtn').on('click', function(){
		    	var cws_id = $(this).data('value');
		    	if(confirm("Are you sure? you want to delete this cowork space?" )){
		    		$.ajax({
						url : '{{ url('/co-work-space/delete') }}/'+cws_id,
						type: 'GET',
						success: function(data){
            				toastr.success('Admin will review your request for deleting workspace. You will get notified when your cowork space is deleted.');
						},
					});
		    	}
		    });

		   	if($('#message')){
		   		var message = $('#message').val();
		   		toastr.error(message);
		   	}
	</script>