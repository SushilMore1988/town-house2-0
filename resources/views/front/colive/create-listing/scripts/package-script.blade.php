<script type="text/javascript">
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

	$('.package').on('click', function(){ 
		$('.package').removeClass('light-bg');
		$('.package').removeClass('border');
		$(this).addClass('light-bg');
		$(this).addClass('border');

		$('#selected-package-id').val($(this).data('id'));
	});

	$(document).on('click', '.submit-btn', function(){
		// if(!$('.selected-package-id').val().length){
		// 	alert('please select package.');
		// }else{
		// 	$('#packageForm').submit();
		// }
	});

	$(document).on('click', '.next-terms-page', function(){
		$('.tactab').trigger('click');
	});

</script>