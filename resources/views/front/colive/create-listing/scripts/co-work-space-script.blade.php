<script type="text/javascript">
	$('#dynamic-header').text($('.{{ $current_tab }}').data('header'));
	$('#dynamic-message').text($('.{{ $current_tab }}').data('message'));
	
	$('.about').on('click', function(){
		$('#dynamic-header').text($(this).data('header'));
		$('#dynamic-message').text($(this).data('message'));
	});

	$('.facilities').on('click', function(){
		$('#dynamic-header').text($(this).data('header'));
		$('#dynamic-message').text($(this).data('message'));
	});

	$('.location').on('click', function(){
		$('#dynamic-header').text($(this).data('header'));
		$('#dynamic-message').text($(this).data('message'));
	});

	$('.opening-hours').on('click', function(){
		$('#dynamic-header').text($(this).data('header'));
		$('#dynamic-message').text($(this).data('message'));
	});

	$('.size').on('click', function(){
		$('#dynamic-header').text($(this).data('header'));
		$('#dynamic-message').text($(this).data('message'));
	});

	$('.pricing').on('click', function(){
		$('#dynamic-header').text($(this).data('header'));
		$('#dynamic-message').text($(this).data('message'));
	});

	$('.photo').on('click', function(){
		$('#dynamic-header').text($(this).data('header'));
		$('#dynamic-message').text($(this).data('message'));
	});

	$('.marketing').on('click', function(){
		$('#dynamic-header').text($(this).data('header'));
		$('#dynamic-message').text($(this).data('message'));
	});

	$('.subscription').on('click', function(){
		$('#dynamic-header').text($(this).data('header'));
		$('#dynamic-message').text($(this).data('message'));
	});

	$('.terms-and-condition').on('click', function(){
		$('#dynamic-header').text($(this).data('header'));
		$('#dynamic-message').text($(this).data('message'));
	});

</script>