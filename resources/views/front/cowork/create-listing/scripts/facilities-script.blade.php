<script type="text/javascript">
	/**
	*	show or hide green tick mark on facilities tab (left pane)
	**/
	// var i = 0;
	// $('.facilities-percent').each(function(){
	// 	if($(this).is(":checked")){
	// 		//unmark completed
	// 		i++;
	// 	}
	// 	if(i >= 5){
	// 		$('.facilities-mark').removeClass('d-none');
	// 		$('.facilities-mark-error').addClass('d-none');
	// 		return;
	// 	}else if(i < 5){
	// 		$('.facilities-mark').addClass('d-none');
	// 		$('.facilities-mark-error').removeClass('d-none');
	// 	}
	// });


	/**
	*	Show hide textbox to get other facilities value from user
	**/
 	$('.other-facility').click(function() {
 		if($(this).is(":checked")) {  
	        $(this).parent().parent().find('.other-text-box').removeClass('d-none');
    	}
    	else{
    		$(this).parent().parent().find('.other-text-box').addClass('d-none');    	
    	}
	});	
</script>