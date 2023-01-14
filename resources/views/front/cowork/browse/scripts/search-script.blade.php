<script type="text/javascript">

	var s_country = $('#filter_country').val();
	var s_city = $('#select_city').val();
	$(document).ready(function(){
		// Create the selectize instance as usual 
		// $('#country').select2({
        //             maximumSelectionLength: 2,
        //         });
		// 	ajax: {
		// 		url: '{{ url('co-work-space/ajax-country') }}',
		// 		dataType: 'json'
		// 		// Additional AJAX parameters go here; see the end of this chapter for the full code of this example
		// 	}
		// });
		$(document.body).on('change', '#select_m_city', function(){
			$(this).find(":selected").each(function () {
				s_city = $(this).val();
			});
			$('#select_city').val(s_city).trigger('change');
		});
		$(document.body).on('change', '#select_city', function(){
			$(this).find(":selected").each(function () {
				s_city = $(this).val();
			});
			if($('#select_m_city').val() != $('#select_city').val()){
				$('#select_m_city').val(s_city).trigger('change');
			}
			filterCard();
		});
		
		$(document).on('change', '#filter_m_country', function(){
			$(this).find(":selected").each(function () {
				s_country = $(this).val();
			});
			$('#filter_country').val(s_country).trigger('change');
		});
		
		$(document).on('change', '#filter_country', function(){
			$(this).find(":selected").each(function () {
				s_country = $(this).val();
			});
			if($('#filter_m_country').val() != s_country){
				$('#filter_m_country').val(s_country).trigger('change');
			}
			$.ajax({
				type: 'GET',
				url: '{{ url('/co-work-space/ajax-country-city') }}/'+s_country,
				success: function (data) {
					$('#select_city').find('option').remove();
					$('#select_city').append('<option>Select City</option>');
					$.each(data, function(i, item) {
						$('#select_city').append('<option value=' + i + '>' + item + '</option>');
					});

					$('#select_m_city').find('option').remove();
					$('#select_m_city').append('<option>Select City</option>');
					$.each(data, function(i, item) {
						$('#select_m_city').append('<option value=' + i + '>' + item + '</option>');
					});
				}
			});
			filterCard();
		});
	});
	$('.meeting-booking-time').datetimepicker({
        format: 'hh:mm A',        
        //format: 'LT'
    });

	$('#addFilter').click(function(){
		//google.maps.event.trigger(map, "resize");
		$('#addFilter').toggleClass('bg-white');
		$(this).text($(this).text() == 'ADD FILTERS' ? 'REMOVE FILTERS' : 'ADD FILTERS');
	});
	
	$('.place-search').on('keyup keypress', function(e){
		var counter = 0;
		var searchText = $('.place-search').val().trim();
		var enteredText = searchText.toLowerCase().split(/[ ,.]+/);
		$('.card-wrapper').each(function(){
			var coWorkAddress = $(this).data('address');
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
				$(this).removeClass('d-none');
			}
			else{
		    	$(this).addClass('d-none');
			}
		});
	});


	$('.space_reference').click(function(){
		$('#s_space_reference').val($(this).data('space_reference'));
		filterCard();
	});

	$('.coWorkerTab').click(function(){
		filterCard();
	});

	$('.category-value').click(function(){
		$('#s_category').val($(this).data('category_value'));
		$('.category li').removeClass('active');
		if($('#s_category').val() == 'gold'){
			console.log('gold');
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
		filterCard();
	});

	

	$('.nop_click').click(function(){
		$('#s_number_of_people').val($('#no-of-people').text());
		filterCard();
	}); 

	$('#slider-values').click( function(){
	 	filterCard();
	});
	
	function filterCard(){
		var s_space_reference = $('#s_space_reference').val();
		var s_category = $('#s_category').val();
		var s_number_of_people = $('#s_number_of_people').val(); 
		var s_min_value =  $('#slider-range-value1').attr('data-value1');
		if(s_min_value == 500){
			s_min_value = 0;
		}
		//we have aded 50,000+ and if price is more than 50k then it not showing
		if($('#slider-range-value2').attr('data-value2') == 50000){
			var s_max_value = 50000000;
		}
		else{
			var s_max_value = $('#slider-range-value2').attr('data-value2');
		}
		
		var s_location = $('#place-autocomplete').val();

		$('.card-wrapper').addClass('d-none');
		$('.card-wrapper').each(function(){
			/* Checking for color Category*/
			var colorCategory = $(this).data('category');  
			var total_seating_capacity = $(this).data('total_seating'); 
			var comman_price = $(this).data('comman_price'); 
			
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

			
			/*  check for the condition if nothing is selected in space reference  and category is selected */
			if(colorCategory == null || colorCategory == '' || s_category == colorCategory){ 
				if(s_space_reference == 'all'){
					$(this).removeClass('d-none');
				}
			}

			/* Checking for colorcategory with shared desk*/ 
			if(shared){
				allCategory($(this),s_category);
				if(s_category == colorCategory && s_space_reference == 'shared' && shared ){
					display($(this));
				}
				if(s_number_of_people > 0 && s_number_of_people > sharedCapacity){
					$(this).addClass('d-none');
				}
				if(s_min_value >= sharedPrice || sharedPrice >= s_max_value){
					$(this).addClass('d-none');
				}
				if(category_sort != 'default' && s_space_reference == 'shared' && shared){
					if(s_category == 'all'){
						sortCategoryfunction(category_sort,colorCategory,$(this));
					}
					if(s_category == colorCategory){ 
						$(this).removeClass('d-none');
					}
				}
				if(price != 'default' && s_space_reference == 'shared' && shared){
					sortPriceFunction('shared_month_price',$(this));
				}
			}
			
			/* Checking for colorcategory with dedicated desk*/
			if(dedicated){
				// console.log('dedicated');
				allCategory($(this),s_category);
				if(s_category == colorCategory && s_space_reference == 'dedicated' && dedicated ){
					display($(this));
				}
				if(s_number_of_people > 0 && s_number_of_people > dedicatedCapacity){
					$(this).addClass('d-none');
				}
				if(s_min_value >= dedicatedPrice || dedicatedPrice >= s_max_value){
					$(this).addClass('d-none');
				}
				if(category_sort != 'default' && s_space_reference == 'dedicated' && dedicated){
					if(s_category == 'all'){
						sortCategoryfunction(category_sort,colorCategory,$(this));
					}
					if(s_category == colorCategory){
						$(this).removeClass('d-none');
					}
				}
				if(price != 'default' && s_space_reference == 'dedicated' && dedicated){
					sortPriceFunction('dedicated_month_price',$(this));
				}
			}

			/* Checking for colorcategory with private desk*/
			if(private){
				// console.log('private');
				allCategory($(this),s_category);
				if(s_category == colorCategory && s_space_reference == 'private' && private ){
					display($(this));
				}
				if(s_number_of_people > 0 && s_number_of_people > privateCapacity){
					$(this).addClass('d-none');
				}
				if(s_min_value >= privatePrice || privatePrice >= s_max_value){
					$(this).addClass('d-none');
				}
				if(category_sort!= 'default' && s_space_reference == 'private' && private){
					if(s_category == 'all'){
						sortCategoryfunction(category_sort,colorCategory,$(this));
					}
					if(s_category == colorCategory){
						$(this).removeClass('d-none');
					}
				}
				if(price != 'default' && s_space_reference == 'private' && private){
					sortPriceFunction('private_month_price',$(this));
				}
			}
			if(category_sort!= 'default' && s_space_reference == 'all'){
				if(s_category == 'all'){
					sortCategoryfunction(category_sort,colorCategory,$(this));
				}
				if(s_category == colorCategory){
					$(this).removeClass('d-none');
				}
				
			}
			if( s_space_reference == 'all' &&  category_sort == 'default' && s_category == 'all'){
				$(this).removeClass('d-none');
				if(s_number_of_people > 0 && s_number_of_people > total_seating_capacity){
					$(this).addClass('d-none');
				}
				if(s_min_value >= comman_price || comman_price >= s_max_value){
					$(this).addClass('d-none');
				}
				if(price != 'default'){
					sortPriceFunction('comman_price');
				}
			}
			// console.log($(this).data('country') +" = "+s_country);
			if(s_country != '' && s_country != null && s_country != $(this).data('country')){
				$(this).addClass('d-none');
			}
			// console.log($(this).data('city') +" = "+$('#city').val());
			if($('#select_city').val() != '' && $('#select_city').val() != null && $('#select_city').val() != $(this).data('city')){
				$(this).addClass('d-none');
			}
		});
	}

	function allCategory(thisVar,s_category){  
		if(s_category == 'all'){
			// console.log('hello');
			thisVar.removeClass('d-none');
		}
	}

	function display(thisVar){
		thisVar.removeClass('d-none');
	}
	
</script>