<script type="text/javascript" src="{{url('front/vendor/slick-slider/js/slick.min.js')}}"></script>
<script type="text/javascript" src="{{url('front/vendor/price-ranger/js/price-ranger.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.sort .sort-title span').click(function() {
			$('.sort .sort-title span').removeClass('active');
			$(this).addClass('active');
		});
		$('.space-preference ul li').click(function() {
			$('.space-preference ul li').removeClass('active');
			$(this).addClass('active');
		})
	});

	$('.minus').click(function() {
		var num = parseInt($(this).parent().find('h4').text());
		if(num !== 0) {
			var getNum = parseInt($(this).parent().find('h4').text());
			var addOne = 1;
			var addition = parseInt(getNum) - 1;
			$(this).parent().find('h4').text(addition);
			return false;
		};
	});
	
	$('.plus').click(function() {
		var num = parseInt($(this).parent().find('h4').text());
		var getNum = parseInt($(this).parent().find('h4').text());
		var addOne = 1;
		var addition = parseInt(getNum) + 1;
		$(this).parent().find('h4').text(addition);
		return false;
	});
	
	// $('.slider-single').slick({
	//  	slidesToShow: 1,
	//  	slidesToScroll: 1,
	//  	arrows: false,
	//  	fade: false,
	//  	adaptiveHeight: true,
	//  	infinite: false,
	// 	useTransform: true,
	//  	speed: 400,
	//  	cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
	//  });

	$('.slider-nav').on('init', function(event, slick) {
 		$('.slider-nav .slick-slide.slick-current').addClass('is-active');
 	})
	.slick({
		slidesToShow: 11,
		slidesToScroll: 1,
		dots: false,
		focusOnSelect: false,
		infinite: false,
		// centerMode: true,
		// centerMode: true,
			centerPadding: '0',
			// centerPadding: '10px',
			// centerMode: true,
			variableWidth: true,
		responsive: [{
			breakpoint: 1024,
			
		}, {
			breakpoint: 640,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 4,
			}
		}, {
			breakpoint: 420,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
		}
		}]
	});

	 $('.slider-single').on('afterChange', function(event, slick, currentSlide) {
	 	$('.slider-nav').slick('slickGoTo', currentSlide);
	 	var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
	 	$('.slider-nav .slick-slide.is-active').removeClass('is-active');
	 	$(currrentNavSlideElem).addClass('is-active');
	 });

	 $('.slider-nav').on('click', '.slick-slide', function(event) {
	 	event.preventDefault();
	 	var goToSingleSlide = $(this).data('slick-index');

	 	//$('.slider-single').slick('slickGoTo', goToSingleSlide);
	 });

	 $(function(){
		  // implementation of custom elements instead of inputs
		  //http://foundation-datepicker.peterbeno.com/
			mlist = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
			$('#dp4').fdatepicker({
					startDate: new Date(),
				}).on('changeDate', function (ev) {
					$('#start-date').val($('#dp4').data('date'));	

					var today = new Date(ev.date);
					var day = today.getDate();
					var month = mlist[today.getMonth()];
					var year = today.getFullYear();
					$('#b-day').html(day);
					$('#b-month-year').html(month +' '+year);
					$('#dp4').fdatepicker('hide');				
			});

			//onload set start date to todays date
			$(document).ready(function(){
				var today = new Date();
				var day = today.getDate();
				var month = mlist[today.getMonth()];
				var year = today.getFullYear();
				$('#b-day').html(day);
				$('#b-month-year').html(month +' '+year);		
				$('#day').html(day);
				$('#month-year').html(month +' '+year);			
			});

			$('#me-start-date').fdatepicker({
					startDate: new Date(),
				}).on('changeDate', function (ev) {
					$('#me-start-date-val').val($('#me-start-date').data('date'));	

					var today = new Date(ev.date);
					var day = today.getDate();
					var month = mlist[today.getMonth()];
					var year = today.getFullYear();
					$('#b-day').text('');
					$('#b-month-year').text('');
					$('#me-start-day').html(day);
					$('#me-start-month-year').html(month +' '+year); 
					$('#me-start-date').fdatepicker('hide');				
			});

			$('#selected-time').fdatepicker({
				startDate: new Date(),
			}).on('changeDate', function (ev) {
				$('#selected-time').val($('#me-start-date').data('date'));	

				var today = new Date(ev.date);
				var day = today.getDate();
				var month = mlist[today.getMonth()];
				var year = today.getFullYear();
				$('#b-day').text('');
				$('#b-month-year').text('');
				$('#me-start-day').html(day);
				$('#me-start-month-year').html(month +' '+year); 
				$('#me-start-date').fdatepicker('hide');				
			});

			$('#start-date').fdatepicker({
					startDate: new Date(),
				}).on('changeDate', function (ev) {
					$('#start-date-val').val($('#start-date').data('date'));	

					var today = new Date(ev.date);
					var day = today.getDate();
					var month = mlist[today.getMonth()];
					var year = today.getFullYear();
					$('#day').text('');
					$('#month-year').text('');
					$('#start-day').html(day);
					$('#start-month-year').html(month +' '+year); 
					$('#start-date').fdatepicker('hide');				
			});

			$('#me-end-date').fdatepicker({
					startDate: new Date(),
				}).on('changeDate', function (ev) {
					$('#me-end-date-val').val($('#me-end-date').data('date'));	

					var today = new Date(ev.date);
					var day = today.getDate();
					var month = mlist[today.getMonth()];
					var year = today.getFullYear();
					$('#me-end-day').html(day);
					$('#me-end-month-year').html(month +' '+year);
					$('#me-end-date').fdatepicker('hide');				
			});

		});
</script>




