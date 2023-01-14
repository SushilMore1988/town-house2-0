<script type="text/javascript" src="{{url('front/vendor/slick-slider/js/slick.min.js')}}"></script>
	<script >
		$(document).ready(function() {
			$('.diffrent-tab-home-slider').slick({
				infinite: true,
				speed: 300,
				slideToShow: 1,
				slideToScroll: 1,
				autoplay: false,
				autoplaySpeed: 2000,
				nextArrow: '<div class="nextArrow"><img src="{{url('front/img/prev-arrow-slider.png')}}" alt=""></div>',
				prevArrow: '<div class="prevArrow"><img src="{{url('front/img/prev-arrow-slider.png')}}" alt=""></div>'
			});
		});
		
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.space-preference ul li').click(function() {
				$('.space-preference ul li').removeClass('active');
				$(this).addClass('active');
			})
		});
		$('.scrolling-container').scroll();
		$('#a_overview').click(function(){
			$('.scroll-container ul li').removeClass('text-bold');
			$(this).addClass('text-bold');

			var parentHeight = $('.scrolling').outerHeight();
			var scrollHeight = parentHeight - parentHeight;

			$(".scrolling-container").animate({
				scrollTop: scrollHeight
			}, 500)				
		});

		$('#a_facilities').click(function(){
			$('.scroll-container ul li').removeClass('text-bold');
			$(this).addClass('text-bold');

			// var scrollHeight = $(".scrolling").outerHeight() - 
			// ($("#overview").outerHeight() + $("#reviews").outerHeight() 
			// 	+ $("#packages").outerHeight() + $("#location").outerHeight() + 50);
			var scrollHeight = $("#overview").outerHeight()  + 50; 

			$(".scrolling-container").animate({
				scrollTop: scrollHeight
			}, 500)				
		});

		$('.scrolling-container').scroll();
		$('#a_location').click(function(){
			$('.scroll-container ul li ').removeClass('text-bold');
			$(this).addClass('text-bold');

			var scrollHeight = $("#overview").outerHeight() + $("#facilities").outerHeight() + 50; 

			$(".scrolling-container").animate({
				scrollTop: scrollHeight
			}, 500)				
		});

		$('#a_reviews').click(function(){

			$('.scroll-container ul li ').removeClass('text-bold');
			$(this).addClass('text-bold');

			var scrollHeight = $("#overview").outerHeight() + $("#facilities").outerHeight() + $("#location").outerHeight() + 70;
			console.log(scrollHeight);

			$(".scrolling-container").animate({
				scrollTop: scrollHeight
			}, 500)				
		});

		$('#a_packages').click(function(){

			$('.scroll-container ul li').removeClass('text-bold');
			$(this).addClass('text-bold');

			var scrollHeight = $("#overview").outerHeight() + $("#facilities").outerHeight() + $("#location").outerHeight() + $("#reviews").outerHeight() + 110;
			console.log(scrollHeight);

			$(".scrolling-container").animate({
				scrollTop: scrollHeight
			}, 500)								
		});

		$('#booking_history').click(function(){

			$('.scroll-container ul li').removeClass('text-bold');
			$(this).addClass('text-bold');

			var scrollHeight = $("#overview").outerHeight() + $("#facilities").outerHeight() + $("#location").outerHeight() + $("#reviews").outerHeight() + 150;
			console.log(scrollHeight);

			$(".scrolling-container").animate({
				scrollTop: scrollHeight
			}, 500)								
		});
	</script>
	<script type="text/javascript">
	 $(function(){
		  // implementation of custom elements instead of inputs
		  //http://foundation-datepicker.peterbeno.com/
			mlist = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
			$('#dp4').fdatepicker({
					startDate: new Date(),
				}).on('changeDate', function (ev) {
					$('#booking-start-date').val($('#dp4').data('date'));	

					var today = new Date(ev.date);
					var day = today.getDate();
					var month = mlist[today.getMonth()];
					var year = today.getFullYear();
					$('#b-day').html(day);
					$('#b-month-year').html(month +' '+year);
					$('#dp4').fdatepicker('hide');
			});
			@foreach($coWorkSpace->cwsBookings as $coWorkSpaceBooking)  
				@if($coWorkSpaceBooking && $coWorkSpaceBooking->where('user_id',Auth()->user()))
					$('#dp4-{{$coWorkSpaceBooking->id}}').fdatepicker({
						startDate: new Date(),
					}).on('changeDate', function (ev) {
						$('#booking-start-date-{{$coWorkSpaceBooking->id}}').val($('#dp4-{{$coWorkSpaceBooking->id}}').data('date'));	

						var today = new Date(ev.date);
						var day = today.getDate();
						var month = mlist[today.getMonth()];
						var year = today.getFullYear();
						$('#b-day-{{$coWorkSpaceBooking->id}}').html(day);
						$('#b-month-year-{{$coWorkSpaceBooking->id}}').html(month +' '+year);
						$('#dp4-{{$coWorkSpaceBooking->id}}').fdatepicker('hide');
					});
				@endif
			@endforeach

			//onload set start date to todays date
			$(document).ready(function(){
				var today = new Date();
				var day = today.getDate();
				var month = mlist[today.getMonth()];
				var year = today.getFullYear();
				$('#b-day').html(day);
				$('#b-month-year').html(month +' '+year);
			});

			$('#me-start-date').fdatepicker({
					startDate: new Date(),
				}).on('changeDate', function (ev) {
					$('#me-start-date-val').val($('#me-start-date').data('date'));	

					var today = new Date(ev.date);
					var day = today.getDate();
					var month = mlist[today.getMonth()];
					var year = today.getFullYear();
					$('#me-start-day').html(day);
					$('#me-start-month-year').html(month +' '+year);
					$('#me-start-date').fdatepicker('hide');				
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

			$('#schedule-tour-date').fdatepicker({
				startDate: new Date(),
			}).on('changeDate', function (ev) {
				$('#schedule-tour-date-val').val($('#schedule-tour-date').data('date'));	

				var today = new Date(ev.date);
				var day = today.getDate();
				var month = mlist[today.getMonth()];
				var year = today.getFullYear();
				$('#schedule-tour-day').html(day);
				$('#schedule-tour-month-year').html(month +' '+year);
				$('#schedule-tour-date').fdatepicker('hide');				
			});

		});
		$("#showDate").click( function(){
					alert( $('#startDate').html() );
				});
</script>

<script>
		$(document).ready(function() {

			// #preview-no = $
			$('.sort .sort-title span').click(function() {
				$('.sort .sort-title span').removeClass('active');
				$(this).addClass('active');
			});
			$('.space-preference ul li').click(function() {
				$('.space-preference ul li').removeClass('active');
				$(this).addClass('active');
			})
		});
		$('.shared-minus').click(function() {
			var num = parseInt($(this).next('span').text());
			if(num !== 0) {
				var getNum = parseInt($(this).next('span').text());
				var addOne = 1;
				var sub = parseInt(getNum) - 1;
				$(this).next('span').text(sub);
				$('#shared-desk-count').val( sub );
				return false;
			};
		});

		$('.dedicated-minus').click(function() {
			var num = parseInt($(this).next('span').text());
			if(num !== 0) {
				var getNum = parseInt($(this).next('span').text());
				var addOne = 1;
				var sub = parseInt(getNum) - 1;
				$(this).next('span').text(sub);
				$('#dedicated-desk-count').val( sub );
				return false;
			};
		});

		// $('.plus').click(function() {
		// 	var num = parseInt($(this).next('span').text());
		// 	var getNum = parseInt($(this).next('span').text());
		// 	var addOne = 1;
		// 	var addition = parseInt(getNum) + 1;
		// 	$(this).next('span').text(addition);
		// 	return false;
		// });

		$('.shared-plus').click(function() {
			var dbSharedCount = $('#db-shared-count').val();
			console.log('count : ' + dbSharedCount);
			var getNum = parseInt($(this).prev('span').text());
			var addOne = 1;
			if(getNum < dbSharedCount){
				var addition = parseInt(getNum) + 1;
				 $(this).prev('span').text(addition);
				 $('#shared-desk-count').val( addition );
				 console.log('add : ' + addition);
			}
			return false;
		});

		$('.dedicated-plus').click(function() {
			var dbDedicatedCount = $('#db-dedicated-count').val();
			console.log('count : ' + dbDedicatedCount);
			var getNum = parseInt($(this).prev('span').text());
			var addOne = 1;
			if(getNum < dbDedicatedCount){
				var addition = parseInt(getNum) + 1;
				$(this).prev('span').text(addition);
				 $('#dedicated-desk-count').val( addition );
				
			}
			return false;
		});


			// console.log($('input[name="Shared-radio"]:checked').val());
		
	</script>
	