<script type="text/javascript">
	
	var tab = 'coWorkerTab'; //tab declared globel

	/* Checked for which tab is clicked */
	$('.tab-clicked').click(function(){
		tab = $(this).data('tab_clicked');
		/* Meeting Tab when click  display the price dropdown*/
		if(tab == 'meetingTab'){
			// $('.shared-hide').addClass('d-none');
			// $('.dedicated-hide').addClass('d-none');
			// $('.private-hide').addClass('d-none');
			$('.meeting-hide').removeClass('d-none');
			// $('.price-dropdown').removeClass('d-none');
			filterCardMeeting();
		}
		else if(tab == 'coWorkerTab'){			/* checked for coWork tab is clicked */
			// $('.price-dropdown').addClass('d-none');
			$('.meeting-hide').addClass('d-none');
			$('.shared-hide').removeClass('d-none');
			$('.dedicated-hide').removeClass('d-none');
			$('.private-hide').removeClass('d-none');
			filterCard();
		}
	});

	/*------------------------Comman part of price, rating, category ------------------------------------*/

	/* Check for price sort (High - low , low - high , default) */
	var price = "default";   // price variable is declared globel
	$('.price-sort').click(function(){
		$('.price-sort').removeClass('sort-active-cls');
		$(this).addClass('sort-active-cls');
		price = $(this).data('sort_price');
		
		if( tab == 'meetingTab'){ 	// Checked for which tab is clicked (meeting tab or not)
			filterCardMeeting();
		}
		else if( tab == 'coWorkerTab'){

			filterCard();
		}
		
	});

	/* check for category sort ( bronze , silver & below, gold and below)*/
	var category_sort = "default"; //category_sort is declared globel
	$('.category-sort').click(function(){
		$('.category-sort').removeClass('sort-active-cls');
		$(this).addClass('sort-active-cls');
		category_sort = $(this).data('sort_category');

		if( tab == 'meetingTab'){ 	// Checked for which tab is clicked (meeting tab or not)
			filterCardMeeting();
		}
		else if( tab == 'coWorkerTab'){
			filterCard();
		}
	});

	/* check for rating sort (High - low , low - high , default)*/
	$('.rating-sort').click(function(){
		$('.rating-sort').removeClass('sort-active-cls');
		if( tab == 'meetingTab'){
			$(this).addClass('sort-active-cls');
			if($(this).data('sort_value') == 'low-to-high'){
				$("#space-list div.card-wrapper").sort(function(a, b) {
	  				return $(a).data("rating") - $(b).data("rating");
				}).appendTo("#space-list");
			}
			else if($(this).data('sort_value') == 'high-to-low'){
				$("#space-list div.card-wrapper").sort(function(a, b) {
	  				return $(b).data("rating") - $(a).data("rating");
				}).appendTo("#space-list");	
			}
		}
		else if( tab == 'coWorkerTab'){
			$(this).addClass('sort-active-cls');
			if($(this).data('sort_value') == 'low-to-high'){
				$("#space-list div.card-wrapper").sort(function(a, b) {
	  				return $(a).data("rating") - $(b).data("rating");
				}).appendTo("#space-list");
			}
			else if($(this).data('sort_value') == 'high-to-low'){
				$("#space-list div.card-wrapper").sort(function(a, b) {
	  				return $(b).data("rating") - $(a).data("rating");
				}).appendTo("#space-list");	
			}
		}
	});

	/*------------------------End Comman part of price, rating, category ------------------------------------*/
	
	/*------------------------Different part of category ,no_of_people , price slider ------------------------------------*/

	/* Check which category is selected (gold, silver, bronze )*/
	$('.m_category-value').click(function(){
		$('#s_mcategory').val($(this).data('category_value'));
		$('.m_category li').removeClass('active');
		if($('#s_mcategory').val() == 'gold'){
			console.log('gold');
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
		filterCardMeeting();
	});
	
	/*Checking which number of people group selected (5-10, 10-20, 20 +) */
	$('.meeting-no-people').click(function(){
		$('#s_m_number_of_people').val($(this).data('mnumber_of_people'));
		filterCardMeeting();
	});

	/* Check if price slider is clicked or not*/
	$('#mslider-values').click( function(){
	 	filterCardMeeting();
	});

	/*-------------------End of Different part of category ,no_of_people , price slider ---------------------*/
	

	/*------------------function for checking diffrent condition for meeting tab ----------------------------*/


	function filterCardMeeting(){
		$('.card-wrapper').addClass('d-none');
		$('.card-wrapper').each(function(){
			
			var meeting = $(this).data('meeting');
			var roomCapacity = $(this).data('meeting_capacity');
			var roomPrice = $(this).data('meeting_month_price');
			var colorCategory = $(this).data('category');

			var s_mspace_reference = $('#s_mspace_reference').val();
			var s_mcategory = $('#s_mcategory').val();
			var s_m_number_of_people = $('#s_m_number_of_people').val();
			var sm_min_value =  $('#mslider-range-value1').attr('data-value1');
			//we have aded 50,000+ and if price is more than 50k then it not showing
			if($('#slider-range-value2').attr('data-value2') == 50000){
				var sm_max_value = 50000000;
			}
			else{
				var sm_max_value = $('#mslider-range-value2').attr('data-value2');
			}


			//var sm_max_value = $('#mslider-range-value2').attr('data-value2');

			// if(meeting){
			// 	if(s_mcategory == 'all' && s_m_number_of_people == 0 ){
			// 		$(this).removeClass('d-none');
			// 	}
			// 	if(colorCategory == s_mcategory && meeting){
			// 		$(this).removeClass('d-none');
			// 	}
			// 	if(s_m_number_of_people !=0 && meeting){
			// 		if(s_m_number_of_people == 'five_to_ten'){
			// 			if(roomCapacity >=5 && roomCapacity < 10){
			// 				$(this).removeClass('d-none');
			// 			}
			// 		}
			// 		if(s_m_number_of_people == 'ten_to_twenty'){
			// 			if(roomCapacity >= 10 && roomCapacity < 20){
			// 				$(this).removeClass('d-none');
			// 			}
			// 		}
			// 		if(s_m_number_of_people == 'twenty_and_above'){
			// 			if(roomCapacity >= 20){
			// 				$(this).removeClass('d-none');
			// 			}
			// 		}
			// 	}
			// 	if(s_m_number_of_people ==0){

			// 	}
			// 	if(sm_min_value >= roomPrice || roomPrice >= sm_max_value){
			// 		$(this).addClass('d-none');
			// 	}
			// 	if(price != 'default'){
			// 		sortPriceFunction('meeting_month_price',$(this));
			// 	}
			// 	if(category_sort != 'default'){
			// 		sortCategoryfunction(category_sort,colorCategory,$(this));
			// 	}
			// }
			if(meeting){
				if(s_m_number_of_people == 0){
					// console.log('s_m_number_of_people');
					if(colorCategory == s_mcategory){
						$(this).removeClass('d-none');
					}
					if(s_mcategory == 'all'){
						$(this).removeClass('d-none');
					}
				}
				
				if(s_m_number_of_people !=0){
					if(s_m_number_of_people == 'five_to_ten'){
						if(roomCapacity >=5 && roomCapacity < 10){
							if(colorCategory == s_mcategory){
								$(this).removeClass('d-none');
							}
							if(s_mcategory == 'all'){
								$(this).removeClass('d-none');
							}
						}
					}
					if(s_m_number_of_people == 'ten_to_twenty'){
						if(roomCapacity >= 10 && roomCapacity < 20){
							if(colorCategory == s_mcategory){
								$(this).removeClass('d-none');
							}
							if(s_mcategory == 'all'){
								$(this).removeClass('d-none');
							}
						}
					}
					if(s_m_number_of_people == 'twenty_and_above'){
						if(roomCapacity >= 20){
							if(colorCategory == s_mcategory){
								$(this).removeClass('d-none');
							}
							if(s_mcategory == 'all'){
								$(this).removeClass('d-none');
							}
						}
					}
				}
				if(sm_min_value == 500){
					sm_min_value = 0;
				}
				if(sm_min_value >= roomPrice || roomPrice >= sm_max_value){
					$(this).addClass('d-none');
				}
			}
		});
	}

	/*--------End of function for checking diffrent condition for meeting tab -----------*/
	
	/*---------------Sort function for category (bronze-below, silver-below, gold-below)------------------- */
	function sortCategoryfunction(sortCategory,colorCategory,thisVar){

		if(sortCategory == "bronze-below"){
			if(colorCategory == 'bronze'){
				thisVar.removeClass('d-none');
			}
			else {
				thisVar.addClass('d-none');
			}
		}
		if(sortCategory == "silver-below"){
			if(colorCategory == 'bronze'|| colorCategory == 'silver'){
				thisVar.removeClass('d-none');
			}
			else {
				thisVar.addClass('d-none');
			}
		}
		if(sortCategory == "gold-below" || (sortCategory == "default")){
			if(colorCategory == 'bronze'|| colorCategory == 'silver' ||  colorCategory == 'gold'){
				thisVar.removeClass('d-none');
			}
		}
	}

	/*-------------End of Sort function for category (bronze-below, silver-below, gold-below)----------------*/

	/*-------------Sort function for price (low to high, high to low)----------------*/
	function sortPriceFunction(pricedata){
		
		if(price == 'low-to-high'){
			$("#space-list div.card-wrapper").sort(function(a, b) {
  				return $(a).data(pricedata) - $(b).data(pricedata);
			}).appendTo("#space-list");
		}
		else if(price == 'high-to-low'){
			console.log('high to low function');
		$("#space-list div.card-wrapper").sort(function(a, b) {
  				return $(b).data(pricedata) - $(a).data(pricedata);
			}).appendTo("#space-list");
		}
	}
	/*-------------End ofSort function for price (low to high, high to low)----------------*/

</script>