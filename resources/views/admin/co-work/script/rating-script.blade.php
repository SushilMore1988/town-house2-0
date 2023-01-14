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
	
	$('#save-rating').click(function(){
		var formData = new FormData($('#review_form')[0]);
		formData.append('_token', '{{csrf_token()}}');
		console.log(formData);
		$.ajax({
			url : '{{route("admin.co-work.rating")}}',
			data: formData,
			type: 'POST',
			processData: false,
			contentType: false,
			dataType: 'JSON',
			success: function(data){
				console.log(data.lastInsertedReview);
				if(data.status == true){
					console.log( data.message)
					$('#message').removeClass('d-none');
					$('#message').addClass('time-out-alert');
					$('#message').text(data.message);
				}
				else{
					$('#error').text(data.error);
				}

			},
			error: function(error){
				console.log(error);
			}

		});
	});
</script> 