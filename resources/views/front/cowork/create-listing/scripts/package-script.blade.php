@php
	$package_currency = 'USD';
    if(strtolower(trim($coWorkSpace->country->name)) == 'india'){
        $package_currency = 'INR';
    }
@endphp
<script type="text/javascript">
	
	$(".package-1").hover(function(){
		$('.package-1').addClass("bg-gray");
	}, function () {
		$('.package-1').removeClass("bg-gray");
	});
	$(".package-3").hover(function(){
		$(".package-3").addClass("bg-gray");
	}, function () {
		$(".package-3").removeClass("bg-gray");
	});
	$(".package-2").hover(function(){
		$(".package-2").addClass("bg-gray");
	}, function () {
		$(".package-2").removeClass("bg-gray");
	});
	
	$('.package-1').on('click', function(){
		$('.package-1').addClass("selected-package");
		$('.package-2').removeClass("selected-package");
		$('.package-3').removeClass("selected-package");
		$('#selected-package-id').val(2);
		@if($package_currency == 'INR')
		$('#selected-package-amount').val(999);
		$('#subscription_fees').html('999 INR');
		@else
		$('#selected-package-amount').val(15);
		$('#subscription_fees').html('15 USD');
		@endif
	});
	$('.package-2').on('click', function(){
		$('.package-1').removeClass("selected-package");
		$('.package-2').addClass("selected-package");
		$('.package-3').removeClass("selected-package");
		$('#selected-package-id').val(3);
		@if($package_currency == 'INR')
		$('#selected-package-amount').val(3399);
		$('#subscription_fees').html('3399 INR');
		@else
		$('#selected-package-amount').val(49);
		$('#subscription_fees').html('49 USD');
		@endif
	});
	$('.package-3').on('click', function(){
		$('.package-1').removeClass("selected-package");
		$('.package-2').removeClass("selected-package");
		$('.package-3').addClass("selected-package");
		$('#selected-package-id').val(4);
		@if($package_currency == 'INR')
		$('#selected-package-amount').val(4999);
		$('#subscription_fees').html('4999 INR');
		@else
		$('#selected-package-amount').val(69);
		$('#subscription_fees').html('69 USD');
		@endif
	});

	$(document).ready(function(){
		@php
		$package = $coWorkSpace->cwsPackages->last();
		@endphp
		@if($package)
		if({{ ($package->package_id == '2') ? 1 : 0}}){
			$('.package-1').trigger('click');
		}else if({{ ($package->package_id == '3') ? 1 : 0 }}){
			$('.package-2').trigger('click');
		}else if({{ ($package->package_id == '4') ? 1 : 0}}){
			$('.package-3').trigger('click');
		}
		@endif
	});

	if($('#selected-package-id').val() != 0){
		$('.package-mark').removeClass('d-none');
		$('.package-mark-error').addClass('d-none');
		$('.marketing').removeClass('d-none');
		// $('.package-mark').css('display', 'none');

		$('.terms-mark').removeClass('d-none');
		$('.terms-mark-error').addClass('d-none');
	}else if($('#selected-package-id').val() == 0){
		$('.package-mark').addClass('d-none');
		$('.package-mark-error').removeClass('d-none');
		$('.marketing').addClass('d-none');

		$('.terms-mark').addClass('d-none');
		$('.terms-mark-error').removeClass('d-none');
	}

	// $('.package').on('click', function(){ 
	// 	$('.package').removeClass('light-bg');
	// 	// $('.package').removeClass('border');
	// 	$(this).addClass('light-bg');
	// 	// $(this).addClass('border');

	// 	$('#selected-package-id').val($(this).data('id'));
	// 	$('#selected-package-amount').val($(this).data('amount'));
	// 	$('#subscription_fees').html($(this).data('amount')+' '+$('input[type=hidden][name=currency]').val());
	// });

	$(document).on('click', '.submit-btn', function(){
		if(!$('.selected-package-id').val().length){
			alert('please select package.');
		}else{
			$('#packageForm').submit();
		}
	});

	$(document).on('click', '.next-terms-page', function(){
		$('.tactab').trigger('click');
	});

</script>