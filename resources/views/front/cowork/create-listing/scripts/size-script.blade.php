<script type="text/javascript">
	var index = 0;
	$('.size-percent').each(function(){
		if($(this).val().length == 0){ 
			//unmark completed
			index++;			
		}
		if(index >= 2){
			$('.size-mark').addClass('d-none');				
			$('.size-mark-error').removeClass('d-none');				
			// index = 0;
			// return;
		}else if(index < 2){
			$('.size-mark').removeClass('d-none');				
			$('.size-mark-error').addClass('d-none');				
		}			
	});

	var index = 0;
	$('.currency-percent').each(function(){
		if($(this).val().length == 0){
			//unmark completed
			index++;
		}
		if(index >= 3){				
			$('.currency-mark-error').removeClass('d-none');
			$('.currency-mark').addClass('d-none');
		}else if(index < 3){
			$('.currency-mark').removeClass('d-none');
			$('.currency-mark-error').addClass('d-none');
			// index = 0;
			return;
		}
	});

	function updateSharedDeskCount(byNumber){

		var availableSharedDesks = parseInt($('#shared_desk_available').val());

		if(isNaN(availableSharedDesks) || availableSharedDesks <= 0 ){
			$('#shared-desk-available-error').html('<span class="invalid-feedback d-block">Please enter number of shared desk available.</span>');
			return;
		}

		var totalSharedDesk = parseInt($('#shared_desk_for_listing').val());
			totalSharedDesk = totalSharedDesk + byNumber;
		if(byNumber == 1){
			if(totalSharedDesk > $('#shared_desk_available').val()){
				return;
			}
			$('#shared_desk_for_listing').val(totalSharedDesk);
			$('#shared_desk_for_listing_view').html(totalSharedDesk)
		}else{
			if(totalSharedDesk == 0 || totalSharedDesk == -1){
				$('#shared_desk_for_listing').val(0);
				$('#shared_desk_for_listing_view').html(0);
				return;
			}
			$('#shared_desk_for_listing').val(totalSharedDesk);		
			$('#shared_desk_for_listing_view').html(totalSharedDesk)
		}
	}

	function updateDedicatedDeskCount(byNumber){
		var availableDedicatedDesks = parseInt($('#dedicated_desk_available').val());
		if(isNaN(availableDedicatedDesks) || availableDedicatedDesks <= 0 ){
			$('#dedicated-desk-available-error').html('<span class="invalid-feedback d-block">Please enter number of shared desk available.</span>');
			return;
		}
		var totalDedicatedDesk = parseInt($('#dedicated_desk_for_listing').val());
		totalDedicatedDesk = totalDedicatedDesk + byNumber;
		if(byNumber == 1){
			if(totalDedicatedDesk > $('#dedicated_desk_available').val()){
				return;
			}
			$('#dedicated_desk_for_listing').val(totalDedicatedDesk);
			$('#dedicated_desk_for_listing_view').html(totalDedicatedDesk);
		}
		else{
			if(totalDedicatedDesk == 0 || totalDedicatedDesk == -1){
				$('#dedicated_desk_for_listing').val(0)
				$('#dedicated_desk_for_listing_view').html(0)
				return;
			}			
			$('#dedicated_desk_for_listing').val(totalDedicatedDesk);
			$('#dedicated_desk_for_listing_view').html(totalDedicatedDesk);
		}
	}

	function updatePrivateOfficesCount(byNumber){
		var availablePrivateOffices = parseInt($('#private_office_available').val());
		var totalPrivateOffices = parseInt($('#total-private-offices').val());

		totalPrivateOffices = totalPrivateOffices + byNumber;
		if(totalPrivateOffices > 0){
			$('#private-office-div').removeClass('d-none');
		}else{
			$('#private-office-div').addClass('d-none');
		}
		if(byNumber == 1){	
			if(totalPrivateOffices > $('#private_office_available').val()){
				return;
			}		
			$('#total-private-offices').val(totalPrivateOffices);
			$('#total-private-offices-view').html(totalPrivateOffices);
			var addZero = '';
			if(totalPrivateOffices<10){
				addZero = '0';
			}
			// <label class="sub-input-label r-lightItalic f-9 text-secondary"><small>Office Name `+addZero+totalPrivateOffices+`:</small></label>
			var template = `<div class="col-lg-10 col-xl-10 mb-3">
							<div class="d-flex align-items-center">
								<div class="w-50">
									<input type="text" name="privateOfficeName_`+totalPrivateOffices+`" class="form-control size-percent common-field-input ml-0 w-100 privateOfficeName" placeholder="" value="Office Name `+addZero+totalPrivateOffices+`" />
								</div>
								<div class="w-50 ml-2">
							  		<input type="text" name="privateOfficeCapacity_`+totalPrivateOffices+`" class="form-control size-percent common-field-input ml-2 w-100 number privateOfficeCapacity" placeholder="Number of Seats" />
							  	</div>
							</div>
						</div>`;
			$('#office-capacity-view').append(template);
		}
		else{
			$('#office-capacity-view').find('.col-lg-8').last().remove();
			if(totalPrivateOffices == 0 || totalPrivateOffices == -1){				
				$('#total-private-offices').val(0)
				$('#total-private-offices-view').html(0)
				return;
			}
			$('#total-private-offices').val(totalPrivateOffices);
			$('#total-private-offices-view').html(totalPrivateOffices);
		}
	}

	function updateMeetingRoomCount(byNumber){
		var availableMeetingRoom = parseInt($('#meeting_room_available').val());
		var totalMeetingRooms = parseInt($('#total-meeting-rooms').val());

		totalMeetingRooms = totalMeetingRooms + byNumber;
		
		if(totalMeetingRooms > 0){
			$('#meeting-room-div').removeClass('d-none');
		}else{
			$('#meeting-room-div').addClass('d-none');
		}
		if(byNumber == 1){		
			if(totalMeetingRooms > $('#meeting_room_available').val()){
				return;
			}	
			$('#total-meeting-rooms').val(totalMeetingRooms);
			$('#total-meeting-rooms-view').html(totalMeetingRooms);
			var addZero = '';
			if(totalMeetingRooms<10){
				addZero = '0';
			}
			var template = `<div class="col-lg-8 col-xl-8 mb-3">
							<div class="d-flex align-items-center">
								<div class="w-75">
									<input type="text" name="meetingRoomName_`+totalMeetingRooms+`" class="form-control size-percent common-field-input ml-2 w-100 meetingRoomName" placeholder="" value="Meeting Room Name `+addZero+totalMeetingRooms+`" />
								</div>
								<div class="w-25 ml-2">
							  		<input type="text" name="meetingRoomCapacity_`+totalMeetingRooms+`" class="form-control size-percent common-field-input ml-2 w-100 number meetingRoomCapacity" placeholder="" />
							  	</div>
							</div>
						</div>`;
			$('#meeting-room-capacity-view').append(template);
		}
		else{
			if(totalMeetingRooms == 0 || totalMeetingRooms == -1){				
				$('#total-meeting-rooms').val(0)
				$('#total-meeting-rooms-view').html(0)
				$('#meeting-room-capacity-view').find('.col-lg-8').last().remove();
				return;
			}
			$('#total-meeting-rooms').val(totalMeetingRooms);
			$('#total-meeting-rooms-view').html(totalMeetingRooms);
			
			$('#meeting-room-capacity-view').find('.col-lg-8').last().remove();
		}
	}

	function validateSizeForm(){ 
		var template = `<div class="text-danger mt-1">	
						This field is required
					</div>`;
		var flag = true;
		$('.meetingRoomCapacity').each(function(){ 
			if($(this).val().length == 0){
				$(this).parent().find('.text-danger').remove();
				$(this).after(template);				
				flag = false;
			}
		});

		$('.meetingRoomName').each(function(){ 
			if($(this).val().length == 0){
				$(this).parent().find('.text-danger').remove();
				$(this).after(template);				
				flag = false;
			}
		});

		$('.privateOfficeName').each(function(){ 
			if($(this).val().length == 0){ 
				$(this).parent().find('.text-danger').remove();
				$(this).after(template);				
				flag = false;
			}
		});

		$('.privateOfficeCapacity').each(function(){ 
			if($(this).val().length == 0){ 
				$(this).parent().find('.text-danger').remove();
				$(this).after(template);				
				flag = false;
			}
		});

		var sharedDesk = $('#total-shared-desk').val();
		var dedicatedDesk = $('#total-dedicated-desk').val();
		var privateOffices = $('#total-private-offices').val();
		var meetingRooms = $('#total-meeting-rooms').val();

		if(sharedDesk == 0 && dedicatedDesk == 0 && privateOffices == 0 && meetingRooms == 0){
			$('.size-error').css('display', 'block');
			$('.size-error').removeClass('d-none');
			flag = false;
		}

		//if user added shared desk count and not added values
		if(sharedDesk > 0){	
			console.log('In error');
			if($('#shared-desk-capacity').val() <= 0 || $('#shared-desk-capacity').val() == 'undefined'){
				$('#shared-desk-capacity-error').html('This field is required');
				flag = false;
			}
			
			if($('#shared-desk-size').val() <= 0 || $('#shared-desk-size').val() == 'undefined')
			{
				$('#shared-desk-size-error').html('This field is required');
				flag = false;	
			}
		}

		if(dedicatedDesk > 0){	
			console.log('In dedicatedDesk error');
			console.log(dedicatedDesk);
			if($('#dedicated-desk-capacity').val() <= 0 || $('#dedicated-desk-capacity').val() == 'undefined'){
				$('#dedicated-desk-capacity-error').html('This field is required');
				flag = false;
			}
			
			if($('#dedicated-desk-size').val() <= 0 || $('#dedicated-desk-size').val() == 'undefined')
			{
				$('#dedicated-desk-size-error').html('This field is required');
				flag = false;	
			}
		}
		return flag;
		// return false;
	}

	$(document).on('blur', '#shared_desk_available', function(){
		if($(this).val() != ''){
			$('#shared-desk-available-error').html('');
			if(parseInt($(this).val()) < parseInt($('#shared_desk_for_listing').val())){
				$('#shared-desk-available-error').html('<span>Available shared desks are not greater than listing.</span>');
				$(this).val($('#shared_desk_for_listing').val());
			}
		}
	});
	$(document).on('blur', '#dedicated_desk_available', function(){
		if($(this).val() != ''){
			$('#dedicated-desk-available-error').html('');
			if(parseInt($(this).val()) < parseInt($('#dedicated_desk_for_listing').val())){
				$('#dedicated-desk-available-error').html('<span>Available dedicated desks are not greater than listing.</span>');
				$(this).val($('#dedicated_desk_for_listing').val());
			}
		}
	});
</script>