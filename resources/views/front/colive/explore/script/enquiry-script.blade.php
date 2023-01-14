<script type="text/javascript">
	/* Enquiry */
	$('#enquiry').click(function(){
		$('#spinner').removeClass('d-none');
		var first_name 	= $('#first_name').val();
		var last_name  	= $('#last_name').val();
		var email 	   	= $('#email').val();
		var message 	= $('#enquiry_message').val();

		console.log($('#enquiry_message').val());
		
		var formData 	= new FormData();
		formData.append('_token', '{{csrf_token()}}');
		formData.append('first_name', first_name);
		formData.append('last_name', last_name);
		formData.append('email', email);
		formData.append('message', message);

		$('#first_name_error').text('');
		$('#last_name_error').text('');
		$('#email_error').text('');
		$('#message_error').text('');

		$.ajax({
			url : '{{route("co-work-space.sendEnquiry")}}',
			data: formData,
			type: 'POST',
			processData: false,
			contentType: false,
			success: function(data){
				if(data.status == 'validation_error'){
					console.log(data[0].email);
					 $('#first_name_error').text(data[0].first_name);
					 $('#last_name_error').text(data[0].last_name);
					 $('#email_error').text(data[0].email);
					 $('#message_error').text(data[0].message);
				}
				if(data.status == 'success'){
					$('#msg').html(data.msg);
					$('#spinner').addClass('d-none');
					$('.time-out-alert').addClass('d-none');
					$('#msg').removeClass('d-none');
					$('#first_name').val('');
					$('#last_name').val('');
					$('#email').val('');
					$('#message').val('');
				}
				else{
					 $('#msg').html(data.msg);
					 $('#spinner').addClass('d-none');
				}

			},
			error: function(error){
				console.log(error);
			}
		});
	});
	
	/* Membership Enquiry */
	$('#member-ship').click(function(){

		
		$('#member-spinner').removeClass('d-none');
		var first_name 	= $('#membership_first_name').val();
		var last_name  	= $('#membership_last_name').val();
		var email 	   	= $('#membership_email').val();
		var message 	= $('#membership_message').val();
		var start_date 	= $('#me-start-date-val').val();
		var end_date 	= $('#me-end-date-val').val();
		
		var formData 	= new FormData();
		formData.append('_token', '{{csrf_token()}}');
		formData.append('first_name', first_name);
		formData.append('last_name', last_name);
		formData.append('email', email);
		formData.append('message', message);
		formData.append('start_date', start_date);
		formData.append('end_date', end_date);

		$('#membership_first_name_error').text('');
		$('#membership_last_name_error').text('');
		$('#membership_email_error').text('');
		$('#membership_message_error').text('');
		$('#membership_start_date_error').text('');
		$('#membership_end_date_error').text('');
		$.ajax({
			url : '{{route("co-work-space.memberShipEnquiry")}}',
			data: formData,
			type: 'POST',
			processData: false,
			contentType: false,
			success: function(data){
				// console.log(data[0].first_name);
				if(data.status == 'validation_error'){
					 $('#membership_first_name_error').text(data[0].first_name);
					 $('#membership_last_name_error').text(data[0].last_name);
					 $('#membership_email_error').text(data[0].email);
					 $('#membership_message_error').text(data[0].message);
					 $('#membership_start_date_error').text(data[0].start_date);
					 $('#membership_end_date_error').text(data[0].end_date);
				}
				if(data.status == 'success'){
					$('#membership_msg').html(data.msg);
					$('#member-spinner').addClass('d-none');
					$('.time-out-alert').addClass('d-none');
					$('#membership_msg').removeClass('d-none');
					$('#membership_first_name').val('');
					$('#membership_last_name').val('');
					$('#membership_email').val('');
					$('#membership_message').val('');
				}
				else{
					 $('#membership_msg').html(data.msg);
					 $('#member-spinner').addClass('d-none');
				}
			},
			error: function(error){
				console.log(error);
			}
		});
	});

	/* Schedule a Tour */
	$('#schedule-tour').click(function(){

		$('#schedule-tour-spinner').removeClass('d-none');
		var first_name 	= $('#schedule_tour_first_name').val();
		var last_name  	= $('#schedule_tour_last_name').val();
		var email 	   	= $('#schedule_tour_email').val();
		var message 	= $('#schedule_tour_message').val();
		var date 	= $('#schedule-tour-date-val').val();
		var schedule_time 	= $('#timeInHrs').text();
		
		$('#schedule_tour_first_name_error').text('');
		$('#schedule_tour_last_name_error').text('');
		$('#schedule_tour_email_error').text('');
		$('#schedule_tour_message_error').text('');

		var formData 	= new FormData();
		formData.append('_token', '{{csrf_token()}}');
		formData.append('first_name', first_name);
		formData.append('last_name', last_name);
		formData.append('email', email);
		formData.append('message', message);
		formData.append('date', date);
		formData.append('schedule_time', schedule_time);

		$.ajax({
			url : '{{route("co-work-space.scheduleTour")}}',
			data: formData,
			type: 'POST',
			processData: false,
			contentType: false,
			success: function(data){
					if(data.status == 'validation_error'){
						 $('#schedule_tour_first_name_error').text(data[0].first_name);
						 $('#schedule_tour_last_name_error').text(data[0].last_name);
						 $('#schedule_tour_email_error').text(data[0].email);
						 $('#schedule_tour_message_error').text(data[0].message);
						 $('#schedule_tour_date_error').text(data[0].date);
						 $('#schedule_tour_time_error').text(data[0].schedule_time);
					}
					if(data.status == 'success'){
						$('#schedule_tour_msg').html(data.msg);
						$('#schedule-tour-spinner').addClass('d-none');
						$('.time-out-alert').addClass('d-none');
						$('#schedule_tour_msg').removeClass('d-none');
						$('#schedule_tour_first_name').val('');
						$('#schedule_tour_last_name').val('');
						$('#schedule_tour_email').val('');
						$('#schedule_tour_message').val('');
					}
					else{
						$('#schedule_tour_msg').html(data.msg);
						$('#schedule-tour-spinner').addClass('d-none');
					}
			},
			error: function(error){
				console.log(error);
			}
		});
	});


	$('.selectedTime').click(function(e){
		$('#timeInHrs').text($(this).text());
	});
</script>