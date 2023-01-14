<script type="text/javascript">
	var tab = 'coWorkerTab'; //tab declared globel

	/* Checked for which tab is clicked */
	$('.tab-clicked').click(function(){
		tab = $(this).data('tab_clicked');
		/* Meeting Tab when click  display the price dropdown*/
		if(tab == 'meetingTab'){
			filterMapMeetingCard();
		}
		else if(tab == 'coWorkerTab'){			/* checked for coWork tab is clicked */
			filterMapCard();
		}
	});
	/*----------------Different part of category ,no_of_people , price slider-----------------*/
	/* Check which category is selected (gold, silver, bronze )*/
	$('.m_category-value').click(function(){
		removeMarker();
		$('#s_mcategory').val($(this).data('category_value'));
		$('.m_category li').removeClass('active');
		if($('#s_mcategory').val() == 'gold'){
			$('.m_gold').parent().addClass('active');
		}
		else if($('#s_mcategory').val() == 'silver'){
			$('.m_silver').parent().addClass('active');
		}
		else if($('#s_mcategory').val() == 'bronze'){
			$('.m_bronze').parent().addClass('active');
		}
		else if($('#s_mcategory').val() == 'all'){
			$('.all').parent().addClass('active');
		}
		filterMapMeetingCard();
	});
	
	/*Checking which number of people group selected (5-10, 10-20, 20 +) */
	$('.meeting-no-people').click(function(){
		$('#s_m_number_of_people').val($(this).data('mnumber_of_people'));
		console.log($('#s_m_number_of_people').val());
		filterMapMeetingCard();
	});

	/* Check if price slider is clicked or not*/
	$('#mslider-values').click( function(){
	 	filterMapMeetingCard();
	});
	/*---------------End of Different part of category ,no_of_people , price slider--------------*/

	/*--------------function for checking diffrent condition for meeting tab -------------------*/
	function filterMapMeetingCard(){
		
		var meetingMarkerArray = [];

		$('.co-work-space-card').addClass('d-none');
		$('.co-work-space-card').each(function(){
			
			var meeting = $(this).data('meeting');
			var roomCapacity = $(this).data('meeting_capacity');
			var roomPrice = $(this).data('meeting_month_price');
			var colorCategory = $(this).data('category');
			var spaceId = $(this).data('space-id');
			var address = $(this).data('address');
			var latitude = $(this).data('latitude');
			var longitude = $(this).data('longitude');
			var colorCategory = $(this).data('category');
			var icon = '';
			if(colorCategory == 'bronze'){
	            icon = "{{url('/img/bronze-map-marker.png')}}";	            
	          }
	          else if(colorCategory == 'silver'){
	            icon = "{{url('/img/silver-map-marker.png')}}";
	          }
	          else if(colorCategory == 'gold'){
	            icon = "{{url('/img/gold-map-marker.png')}}";
	          }
			

			var s_mspace_reference = $('#s_mspace_reference').val();
			var s_mcategory = $('#s_mcategory').val();
			var s_m_number_of_people = $('#s_m_number_of_people').val();
			var sm_min_value =  $('#mslider-range-value1').attr('data-value1');
			var sm_max_value = $('#mslider-range-value2').attr('data-value2');

			if(meeting){
				if(s_m_number_of_people == 0){
					// console.log('s_m_number_of_people');
					if(colorCategory == s_mcategory){
						addMarker(spaceId,latitude,longitude,meetingMarkerArray, icon);
						$(this).removeClass('d-none');
					}
					if(s_mcategory == 'all'){
							addMarker(spaceId,latitude,longitude,meetingMarkerArray, icon);
							$(this).removeClass('d-none');
					}
				}
				if(s_m_number_of_people !=0){
					if(s_m_number_of_people == 'five_to_ten'){
						if(roomCapacity >=5 && roomCapacity < 10){
							if(colorCategory == s_mcategory){
								addMarker(spaceId,latitude,longitude,meetingMarkerArray, icon);
								$(this).removeClass('d-none');
							}
							if(s_mcategory == 'all'){
								addMarker(spaceId,latitude,longitude,meetingMarkerArray, icon);
								$(this).removeClass('d-none');
							}
						}
					}
					if(s_m_number_of_people == 'ten_to_twenty'){
						if(roomCapacity >= 10 && roomCapacity < 20){
							if(colorCategory == s_mcategory){
								addMarker(spaceId,latitude,longitude,meetingMarkerArray, icon);
								$(this).removeClass('d-none');
							}
							if(s_mcategory == 'all'){
								addMarker(spaceId,latitude,longitude,meetingMarkerArray, icon);
								$(this).removeClass('d-none');
							}
						}
					}
					if(s_m_number_of_people == 'twenty_and_above'){
						if(roomCapacity >= 20){
							if(colorCategory == s_mcategory){
								addMarker(spaceId,latitude,longitude,meetingMarkerArray, icon);
								$(this).removeClass('d-none');
							}
							if(s_mcategory == 'all'){
								addMarker(spaceId,latitude,longitude,meetingMarkerArray, icon);
								$(this).removeClass('d-none');
							}
						}
					}
				}
				if(sm_min_value >= roomPrice || roomPrice >= sm_max_value){
					meetingMarkerArray = deleteMarker(spaceId,latitude,longitude,meetingMarkerArray);
					$(this).addClass('d-none');
				}
			}
		});
	}
	/*-----------End of function for checking diffrent condition for meeting tab ------------------*/
</script>