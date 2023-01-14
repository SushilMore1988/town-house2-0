<script type="text/javascript">	

	function validatePriceForm(){
		var returnType = true;
		$('.shared-price-val').each(function(){
			if($(this).val().length == 0){
				$('#shared-price-error').html('Enter price for Shared Desks');
				$('#shared-price-error').removeClass('d-none');
				returnType = false;
			}
		});
		$('.dedicated-price-val').each(function(){
			if($(this).val().length == 0){
				$('#dedicated-price-error').html('Enter price for Dedicated Desks');
				$('#dedicated-price-error').removeClass('d-none');
				returnType = false;
			}
		});
	return returnType;
	}

	$(document).on('keyup', '.commonClass' , function(){
		// var sibling = $(this).next(); 
		var sibling = $(this).closest('div').next().find('input');
		var priceSetting = '{{ $coWorkSpace->size['service_charges']['type'] }}';
		var price = '{{ $coWorkSpace->size['service_charges']['price'] }}';
		var previousPrice = $(this).val();
		if(priceSetting == 'percentage'){
			var result = (+previousPrice) - ((+previousPrice * +price)/100); 
			sibling.attr('value', result);
		}else{
			var result = +previousPrice - +price; 
			sibling.attr('value', result );

		}
		
	});
</script>