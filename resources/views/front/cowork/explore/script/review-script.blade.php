<script>
	$('.checkbox').click(function(){
		var review_no = $(this).data('no');
		
		$(this).parent().parent('.row').find('.rating_type').val(review_no);
		$(this).parent().parent('.row').find('.rating_value').val(review_no);

		$(this).parent().parent('.row').find('.checkbox').each(function(){
			//to remove all checked 
			$(this).prop('checked', false);
		});

		$(this).parent().parent('.row').find('.checkbox').each(function(){
			$(this).prop('checked', true);
			if(review_no == $(this).data('no')){
				console.log('Equal');

				return false;
			}
		});
	})

	// $('.admin-checkbox')
	$('#save-rating').click(function(){
		var formData = new FormData($('#review_form')[0]);
		formData.append('_token', '{{csrf_token()}}');
		$.ajax({
			url : '{{route("co-work-space.rating")}}',
			data: formData,
			type: 'POST',
			processData: false,
			contentType: false,
			dataType: 'JSON',
			success: function(data){
				console.log(data.lastInsertedReview);
				if(data.status == true){
					// console.log( data.message)
					// $('#message').removeClass('d-none');
					// $('#message').text(data.message);
					toastr.success(data.message);
					$('#review_box').hide();
					window.location.reload();
				}
				else{
					toastr.error(data.error);

					// $('#error').text(data.error);
				}

			},
			error: function(error){
				console.log(error);
			}

		});
	});

    $('.thumbs-up').click(function(){
    	var experience_id = $(this).data('id');
    	if($('.thumbs-down').hasClass('text-primary')){
    		$('.thumbs-down').removeClass('text-primary');
			$('.dislike-count').text( parseInt($('.dislike-count').text()) - 1 ) ;
    		$('.thumbs-up').addClass('text-primary');
			$('.like-count').text( parseInt($('.like-count').text()) + 1 ) ;
			// $('#like-count').val($('.like-count').text());
    	}
		else if($(this).hasClass('text-primary')){
			$(this).removeClass('text-primary');
			$('.like-count').text( parseInt($('.like-count').text()) - 1 ) ;
			// $('#like-count').val($('.like-count').text());
		}
		else{
			$(this).addClass('text-primary');
			$('.like-count').text( parseInt($('.like-count').text()) + 1) ;
			// $('#like-count').val($('.like-count').text());
		}
		
		$('#like-count').val($('.like-count').text());

		var like_count 	= $('#like-count').val();
		var formData 	= new FormData();
		formData.append('_token', '{{csrf_token()}}');
		formData.append('like_count', like_count);
		$.ajax({
			url : "{{ url('co-work-space/ajax-like')}}"+'/'+experience_id,
			data: formData,
			type: 'POST',
			processData: false,
			contentType: false,
			dataType: 'JSON',
			success: function(data){
			},
			error: function(error){
				console.log(error);
			}
    	});
    });

   $('.thumbs-down').click(function(){
    	var experience_id = $(this).data('id');
   		if($('.thumbs-up').hasClass('text-primary')){
    		$('.thumbs-up').removeClass('text-primary');
			$('.like-count').text( parseInt($('.like-count').text()) - 1 ) ;
    		$('.thumbs-down').addClass('text-primary');
			$('.dislike-count').text( parseInt($('.dislike-count').text()) + 1 ) ;
		}
		else if($(this).hasClass('text-primary')){
			$(this).removeClass('text-primary');
			$('.dislike-count').text( parseInt($('.dislike-count').text()) - 1 );
			// $('#dislike-count').val($('.dislike-count').text());
		}
		else{
			$(this).addClass('text-primary');
			$('.dislike-count').text( parseInt($('.dislike-count').text()) + 1) ;
		}
		$('#dislike-count').val($('.dislike-count').text());
		
		var dislike_count 	= $('#dislike-count').val();
		var formData 	= new FormData();
		formData.append('_token', '{{csrf_token()}}');
		formData.append('dislike_count', dislike_count);
		$.ajax({
			url : "{{ url('co-work-space/ajax-dislike')}}"+'/'+experience_id,
			data: formData,
			type: 'POST',
			processData: false,
			contentType: false,
			dataType: 'JSON',
			success: function(data){
			},
			error: function(error){
				console.log(error);
			}
    	});
    }); 
</script> 