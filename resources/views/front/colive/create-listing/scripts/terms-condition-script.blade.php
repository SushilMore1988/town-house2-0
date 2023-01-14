<script type="text/javascript"> 
	

	$('.submitBtn').on('click', function(){
		if($('#customizedRadio').is(':checked')) { 
			$('#customized').val(1);	
		}else{
			$('#customized').val(0);	
		}
		$("#myForm").submit();
	});
	if($('input[type=radio][name=customizedRadio]:checked').val()){ 
		$('.terms-mark').removeClass('d-none');
		$('.terms-mark-error').addClass('d-none');
	}else{ 
		$('.terms-mark').addClass('d-none');
		$('.terms-mark-error').removeClass('d-none');
	}
</script>