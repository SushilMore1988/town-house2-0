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
	$(document).ready(function(){
		if($('#gst').val()){
			$('.commonClass').each(function(){
				var sibling = $(this).closest('div').next().find('input');
				var priceSetting = '{{ $coWorkSpace->size['service_charges']['type'] }}';
				var price = '{{ $coWorkSpace->size['service_charges']['price'] }}';
				var previousPrice = $(this).val();
				if(priceSetting == 'percentage'){
					var result = (+previousPrice) - ((+previousPrice * +price)/100);
					sibling.attr('value', result + ' + Tax');
				}else{
					var result = +previousPrice - +price;
					sibling.attr('value', result + ' + Tax');
				}
			});
		}else{
			$('.commonClass').each(function(){
				var sibling = $(this).closest('div').next().find('input');
				var priceSetting = '{{ $coWorkSpace->size['service_charges']['type'] }}';
				var price = '{{ $coWorkSpace->size['service_charges']['price'] }}';
				var previousPrice = $(this).val();
				if(priceSetting == 'percentage'){
					var result = (+previousPrice) - ((+previousPrice * +price)/100);
					sibling.attr('value', result);
				}else{
					var result = +previousPrice - +price;
					sibling.attr('value', result);

				}
			});
		}
	});
	$(document).on('keyup', '#gst', function(){
		if($(this).val()){
			$('.commonClass').each(function(){
				var sibling = $(this).closest('div').next().find('input');
				var priceSetting = '{{ $coWorkSpace->size['service_charges']['type'] }}';
				var price = '{{ $coWorkSpace->size['service_charges']['price'] }}';
				var previousPrice = $(this).val();
				if(priceSetting == 'percentage'){
					var result = (+previousPrice) - ((+previousPrice * +price)/100);
					sibling.attr('value', result + ' + Tax');
				}else{
					var result = +previousPrice - +price;
					sibling.attr('value', result + ' + Tax');
				}
			});
		}else{
			$('.commonClass').each(function(){
				var sibling = $(this).closest('div').next().find('input');
				var priceSetting = '{{ $coWorkSpace->size['service_charges']['type'] }}';
				var price = '{{ $coWorkSpace->size['service_charges']['price'] }}';
				var previousPrice = $(this).val();
				if(priceSetting == 'percentage'){
					var result = (+previousPrice) - ((+previousPrice * +price)/100);
					sibling.attr('value', result);
				}else{
					var result = +previousPrice - +price;
					sibling.attr('value', result);

				}
			});
		}
	})

	$(document).on('keyup', '.commonClass' , function(){
		if($('#gst').val()){
			/**
			 * Set a price if owner has gst registered
			 */
			var sibling = $(this).closest('div').next().find('input');
			var priceSetting = '{{ $coWorkSpace->size['service_charges']['type'] }}';
			var price = '{{ $coWorkSpace->size['service_charges']['price'] }}';
			var previousPrice = $(this).val();
			if(priceSetting == 'percentage'){
				var result = (+previousPrice) - ((+previousPrice * +price)/100);
				sibling.attr('value', result + ' + Tax');
			}else{
				var result = +previousPrice - +price;
				sibling.attr('value', result + ' + Tax');

			}
		}else{
			/**
			 * Set a price if owner do not have gst registered
			 */
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
		}
	});
</script>