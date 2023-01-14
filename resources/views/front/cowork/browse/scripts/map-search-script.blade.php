<script type="text/javascript">	
	$('#addFilter').click(function(){
		// $('#main').removeClass('col-md-8');
		// $('#main').addClass('col-md-12');
		google.maps.event.trigger(map, "resize");
		$('#addFilter').toggleClass('bg-white');
		if($(this).data('val') == 'ADD FILTER'){
			$(this).data('val', 'REMOVE FILTER');
			$(this).text('ADD FILTER');
		}
		else{
			
			console.log('Resized');
			$(this).data('val', 'ADD FILTER');
			$(this).text('REMOVE FILTER');				
		}
		google.maps.event.trigger(map, 'resize');
		console.log('Add Filter Clicked');
	});
	
	$('.place-search').on('keyup keypress', function(e){
		var markerArray=[];
		var counter = 0;
		var searchText = $('.place-search').val().trim();
		var enteredText = searchText.toLowerCase().split(/[ ,.]+/);
		$('.co-work-space-card').each(function(){
			var coWorkAddress = $(this).data('address');
			var spaceId = $(this).data('space-id');
			var latitude = $(this).data('latitude');
			var longitude = $(this).data('longitude');

			var address = coWorkAddress.trim().toLowerCase().split(/[ ,.]+/);
			var display = false;
			for(i = 0; i <= (address.length - enteredText.length); i++){
				for(j = 0; j < enteredText.length; j++){
					if(address[i].indexOf(enteredText[j]) != -1 ){

						display = true;
						break;
					}
				}
			}
			if(display){
				addMarker(spaceId,latitude,longitude,markerArray);
				$(this).removeClass('d-none');
			}
			else{
		    	$(this).addClass('d-none');
			}
		});
		console.log(markerArray);
	});

	$('.space_reference').click(function(){
		removeMarker();
		$('#s_space_reference').val($(this).data('space_reference'));
		$('.price-dropdown').removeClass('d-none');
		$('.no-of-people').removeClass('d-none');
		$('.price-range').removeClass('d-none');
		filterMapCard();
	});

	$('.category-value').click(function(){
		removeMarker();
		$('#s_category').val($(this).data('category_value'));
		$('.category li').removeClass('active');
		if($('#s_category').val() == 'gold'){
			$('.gold').parent().addClass('active');
		}
		else if($('#s_category').val() == 'silver'){
			$('.silver').parent().addClass('active');
		}
		else if($('#s_category').val() == 'bronze'){
			$('.bronze').parent().addClass('active');
		}
		else if($('#s_category').val() == 'all'){
			$('.all').parent().addClass('active');
		}
		filterMapCard();
	}); 

	$('.nop_click').click(function(){
		$('#s_number_of_people').val($('#no-of-people').text());
		filterMapCard();
	}); 

	$('#slider-values').click( function(){
	 	filterMapCard();
	});

	function filterMapCard(){

		/* This are the hidden value fetched  from  php file */
		var s_space_reference = $('#s_space_reference').val();
		var s_category = $('#s_category').val();
		var s_number_of_people = $('#s_number_of_people').val();
		var s_min_value =  $('#slider-range-value1').attr('data-value1');
		var s_max_value = $('#slider-range-value2').attr('data-value2');
		/* End of the hidden value fetched  from  php file */

		/* Variable used in the  function */
		var markerArray = [];

		$('.co-work-space-card').addClass('d-none');
		$('.co-work-space-card').each(function(){
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
			

			if(s_space_reference == 'shared'){
				var shared = $(this).data('shared');
				var sharedCapacity =  $(this).data('shared_capacity');
				var sharedPrice = $(this).data('shared_month_price');
			}			
			if(s_space_reference == 'dedicated'){
				var dedicated = $(this).data('dedicated');
				var dedicatedCapacity =  $(this).data('dedicated_capacity');
				var dedicatedPrice = $(this).data('dedicated_month_price');
			}
			if(s_space_reference == 'private'){
				var private = $(this).data('private');
				var privateCapacity =  $(this).data('private_capacity');
				var privatePrice = $(this).data('private_month_price');
			}

			if(shared){	
				if(s_category == 'all'){
					 addMarker(spaceId,latitude,longitude,markerArray, icon);
					 $('.card-body').removeClass('d-none');
					$(this).removeClass('d-none');
				}
				if(s_category == colorCategory && s_space_reference == 'shared' && shared ){
					addMarker(spaceId,latitude,longitude,markerArray, icon);
					$(this).removeClass('d-none');
				}
				if(s_number_of_people > 0 && s_number_of_people > sharedCapacity){
					markerArray = deleteMarker(spaceId,latitude,longitude,markerArray);
					$(this).addClass('d-none');
				}
				if(s_min_value >= sharedPrice || sharedPrice >= s_max_value){
					markerArray = deleteMarker(spaceId,latitude,longitude,markerArray);
					$(this).addClass('d-none');
				}
			}

			if(dedicated){
				if(s_category == 'all'){
					addMarker(spaceId,latitude,longitude,markerArray, icon);
					$(this).removeClass('d-none');
				}
				if(s_category == colorCategory && s_space_reference == 'dedicated' && dedicated ){
					addMarker(spaceId,latitude,longitude,markerArray, icon);
					$(this).removeClass('d-none');
				}
				if(s_number_of_people > 0 && s_number_of_people > dedicatedCapacity){
					markerArray = deleteMarker(spaceId,latitude,longitude,markerArray);
					$(this).addClass('d-none');
				}
				if(s_min_value >= dedicatedPrice || dedicatedPrice >= s_max_value){
					markerArray = deleteMarker(spaceId,latitude,longitude,markerArray);
					$(this).addClass('d-none');
				}
			}

			if(private){
				if(s_category == 'all'){
					addMarker(spaceId,latitude,longitude,markerArray, icon);
					$(this).removeClass('d-none');
				}
				if(s_category == colorCategory && s_space_reference == 'private' && private ){
					addMarker(spaceId,latitude,longitude,markerArray, icon);
					$(this).removeClass('d-none');
				}
				if(s_number_of_people > 0 && s_number_of_people > privateCapacity){
					markerArray = deleteMarker(spaceId,latitude,longitude,markerArray);
					$(this).addClass('d-none');
				}
				if(s_min_value >= privatePrice || privatePrice >= s_max_value){
					markerArray = deleteMarker(spaceId,latitude,longitude,markerArray);
					$(this).addClass('d-none');
				}
			}

			/* If no space prefrences selected and category is selected*/
			if(s_number_of_people ==0 ){
				if(s_space_reference == 'all'){
					if(s_category == colorCategory){
						addMarker(spaceId,latitude,longitude,markerArray, icon);
						$(this).removeClass('d-none');
					}
					if(s_category == 'all'){
						addMarker(spaceId,latitude,longitude,markerArray, icon);
						$(this).removeClass('d-none');
					}
				}
			}
		});
	}

	function  addMarker(spaceId,latitude,longitude,markerArray, icon){
		var localMarkerArray =[];
		removeMarker();
		localMarkerArray['lat'] = latitude ;
		localMarkerArray['lng'] = longitude ;
		localMarkerArray['coWorkSpaceId'] =spaceId;
		localMarkerArray['icon'] = icon;
		markerArray.push(localMarkerArray);
		$('.single-card').addClass('d-none');
		addMarkerToMap(map, markerArray);
		
	}

	function removeMarker(){
		markers_list.forEach(function(marker,index){
	      marker.setMap(null);
	    });
	}

	function deleteMarker(spaceId,latitude,longitude,markerArray){
		removeMarker();
		var removeArray = [];
		removeArray['lat'] = latitude ;
		removeArray['lng'] = longitude ;
		removeArray['coWorkSpaceId'] = spaceId ;

		markerArray = $.grep(markerArray, function(value) {
	  		return value['coWorkSpaceId']!= removeArray['coWorkSpaceId'];
		});
		addMarkerToMap(map, markerArray);
		return markerArray;
	}
</script>