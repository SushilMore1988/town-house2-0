<script type="text/javascript">
    $('.to-time-picker').datetimepicker({
        format: 'hh:mm A',
        icons: {
            up: " glyphicon glyphicon-plus",
            down: "glyphicon glyphicon-minus",
            next: 'fa fa-chevron-circle-right',
            previous: 'fa fa-chevron-circle-left'
        }     
    }).on('dp.hide', function(e){
		Livewire.emit("selectCheckInTime", e.target.value);
	});

    // $('select[name="privateOfficeId"]').on('change', function() {
    //     if($('input[type=radio][name=privateRadio]:checked').length){
    //         $('input[type=radio][name=privateRadio]:checked').prop("checked", false);
    //     }
    //     var cws_id = {{ $coWorkSpace->id }};
    //     var private_office_id = $(this).val();
    //     $('.pop').removeClass('d-none');
    //     $('.pop').addClass('d-none');
    //     $('.private_'+$(this).val()).removeClass('d-none');
    // });

    // $('select[name="meetingRoomId"]').on('change', function() {
    //     if($('input[type=radio][name=meetingRadio]:checked').length){
    //     $('input[type=radio][name=meetingRadio]:checked').prop("checked", false);
    //     }
    //     var meeting_room_id = $(this).val();
    //     var cws_id = {{ $coWorkSpace->id }};
    //     $('.mrfl').removeClass('d-none');
    //     $('.mrfl').addClass('d-none');
    //     $('.meeting-room-'+$(this).val()).removeClass('d-none');
    // });

    // $("#total-value").change(function(){

    //    var totalSharedAmount = 0;
    //    var totalDedicatedAmount = 0;
    //    var totalPrivateAmount = 0;
    //    var sharedSelectedValue;
    //    var dedicatedSelectedValue;
    //    var privateSelectedValue ;
    //    var meetingSelectedValue ;
    //    var dedicatedCount;
    //    var sharedCount;
    //    // var privateCount;

    //    if($("input[type=radio][name=sharedRadio]").is(':checked')){
    //       sharedSelectedValue = $("input[type=radio][name=sharedRadio]:checked").data('price');
    //       $('#selectedSharedPrice').val(sharedSelectedValue);
    //    }
    //    else{
    //         sharedSelectedValue = 0;
    //    }
    //    if(parseInt($('#shared-count').text())){

    //        sharedCount = parseInt($('#shared-count').text());
    //    }
    //    else{
    //         sharedCount = 0;
    //    }
    //    totalSharedAmount = sharedCount * sharedSelectedValue;


    //    if( $("input[type=radio][name=dedicatedRadio]:checked").data('price')){
   	//         dedicatedSelectedValue = $("input[type=radio][name=dedicatedRadio]:checked").data('price');
    //          $('#dedicated_desk_price').val(dedicatedSelectedValue);
    //    }
    //    else{
    //         dedicatedSelectedValue = 0;
    //    }
    //    if(parseInt($('#dedicated-count').text())){
    //        dedicatedCount = parseInt($('#dedicated-count').text());
    //    }
    //    else{
    //         dedicatedCount = 0;
    //    }
    //    totalDedicatedAmount = dedicatedCount * dedicatedSelectedValue;

    //     if( $("input[type=radio][name=privateRadio]:checked").attr('price')){ 
    //         privateSelectedValue = $("input[type=radio][name=privateRadio]:checked").attr('price');
          
    //         $('#private_desk_price').val(privateSelectedValue);
    //     }
    //     else{ 
    //            privateSelectedValue = 0;
    //     }
    //     totalPrivateAmount = privateSelectedValue;

        
    //     if( $("input[type=radio][name=meetingRadio]:checked").attr('price')){
    //         meetingSelectedValue = $("input[type=radio][name=meetingRadio]:checked").attr('price');
    //         $('#meeting_room_price').val(meetingSelectedValue);
    //     }
    //     else{
    //            meetingSelectedValue = 0;
    //     }
    //     totalMeetingAmount = meetingSelectedValue;
       
    //     var total = parseInt(totalSharedAmount) + parseInt(totalDedicatedAmount) + parseInt(totalPrivateAmount) + parseInt(totalMeetingAmount)
    //    $(".total-amount").text(total);
    //    $(".total-amount").val(total);

    // });

    //Commented code from here
    // $('#book-now').click(function(){
    //   var returnType = true;
    //    if(parseInt($('#total-check').text()) <= 0 || $('#total-check').text() == '') 
    //   {
    //     $('#book-now-error').html(" Please Fill the data");
    //     returnType = false;
    //   }
    //   else 
    //   {
    //     returnType = true;
    //   }
      
    //   return returnType;
    // });
    //Already commented code till here

	//  $(".plusCount").click(function(){
    //    var totalSharedAmount = 0;
    //    var totalDedicatedAmount = 0;
    //    var totalPrivateAmount = 0;
    //    var sharedSelectedValue;
    //    var dedicatedSelectedValue;
    //    var privateSelectedValue;
    //    var dedicatedCount;
    //    var sharedCount;
    //    var privateCount;
      
    //    if($("input[type=radio][name=sharedRadio]").is(':checked')){
    //         sharedSelectedValue = $("input[type=radio][name=sharedRadio]:checked").data('price');
    //    }
    //    else{
    //         sharedSelectedValue = 0;
    //    }
    //    if(parseInt($('#shared-count').text())){

    //        sharedCount = parseInt($('#shared-count').text());
    //    }
    //    else{
    //         sharedCount = 0;
    //    }
    //    totalSharedAmount = sharedCount * sharedSelectedValue;

    //    if( $("input[type=radio][name=dedicatedRadio]:checked").data('price')){
    //         dedicatedSelectedValue = $("input[type=radio][name=dedicatedRadio]:checked").data('price');
    //    }
    //    else{
    //         dedicatedSelectedValue = 0;
    //    }
    //    if(parseInt($('#dedicated-count').text())){
    //        dedicatedCount = parseInt($('#dedicated-count').text());
    //    }
    //    else{
    //         dedicatedCount = 0;
    //    }
    //    totalDedicatedAmount = dedicatedCount * dedicatedSelectedValue;


    //     if( $("input[type=radio][name=privateRadio]:checked").attr('price')){
    //         privateSelectedValue = $("input[type=radio][name=privateRadio]:checked").attr('price');
    //     }
    //     else{
    //            privateSelectedValue = 0;
    //     }
    //     if(parseInt($('#private-count').text())){
    //            privateCount = parseInt($('#private-count').text());
    //     }
    //     else{
    //             privateCount = 0;
    //     }
      
    //     totalPrivateAmount = privateSelectedValue; 

    //     if( $("input[type=radio][name=meetingRadio]:checked").attr('price')){
    //         meetingSelectedValue = $("input[type=radio][name=meetingRadio]:checked").attr('price');
    //     }
    //     else{
    //            meetingSelectedValue = 0;
    //     }
    //     totalMeetingAmount = meetingSelectedValue;
       
    //     var total = parseInt(totalSharedAmount) + parseInt(totalDedicatedAmount) + parseInt(totalPrivateAmount) + parseInt(totalMeetingAmount)
    //     $(".total-amount").text(total);
    //     $(".total-amount").val(total);
       
    // });

    // $(".minusCount").click(function(){
    //    var totalSharedAmount = 0;
    //    var totalDedicatedAmount = 0;
    //    var totalPrivateAmount = 0;
    //    var sharedSelectedValue;
    //    var dedicatedSelectedValue;
    //    var privateSelectedValue;
    //    var dedicatedCount;
    //    var sharedCount;
    //    var privateCount;
      
    //    if($("input[type=radio][name=sharedRadio]").is(':checked')){
    //         sharedSelectedValue = $("input[type=radio][name=sharedRadio]:checked").data('price');
    //    }
    //    else{
    //         sharedSelectedValue = 0;
    //    }
    //    if(parseInt($('#shared-count').text())){

    //        sharedCount = parseInt($('#shared-count').text());
    //    }
    //    else{
    //         sharedCount = 0;
    //    }
    //    totalSharedAmount = sharedCount * sharedSelectedValue;


    //    if( $("input[type=radio][name=dedicatedRadio]:checked").data('price')){
    //         dedicatedSelectedValue = $("input[type=radio][name=dedicatedRadio]:checked").data('price');
    //    }
    //    else{
    //         dedicatedSelectedValue = 0;
    //    }
    //    if(parseInt($('#dedicated-count').text())){
    //        dedicatedCount = parseInt($('#dedicated-count').text());
    //    }
    //    else{
    //         dedicatedCount = 0;
    //    }
    //    totalDedicatedAmount = dedicatedCount * dedicatedSelectedValue;


    //     if( $("input[type=radio][name=privateRadio]:checked").attr('price')){
    //         privateSelectedValue = $("input[type=radio][name=privateRadio]:checked").attr('price');
    //         console.log(privateSelectedValue);
    //     }
    //     else{
    //            privateSelectedValue = 0;
    //     }
    //     if(parseInt($('#private-count').text())){
    //            privateCount = parseInt($('#private-count').text());
    //     }
    //     else{
    //             privateCount = 0;
    //     }
      
    //     totalPrivateAmount = privateSelectedValue;

    //     if( $("input[type=radio][name=meetingRadio]:checked").attr('price')){
    //         meetingSelectedValue = $("input[type=radio][name=meetingRadio]:checked").attr('price');
    //     }
    //     else{
    //            meetingSelectedValue = 0;
    //     }
    //     totalMeetingAmount = meetingSelectedValue;
       
    //     var total = parseInt(totalSharedAmount) + parseInt(totalDedicatedAmount) + parseInt(totalPrivateAmount) + parseInt(totalMeetingAmount)
    //     $(".total-amount").text(total);
    //     $(".total-amount").val(total);

    // });

    // @if($coWorkSpace->size)
    //   @if( $coWorkSpace->size['shared_desk']['for_listing'] != null || $coWorkSpace->size['shared_desk']['for_listing'] > 0)
    //     $('#shared-desk').removeClass('d-none');
    //     $('#shared').addClass('show collapse');
    //   @endif
    //   @if( $coWorkSpace->size['dedicated_desk']['for_listing'] != null || $coWorkSpace->size['dedicated_desk']['for_listing'] > 0 )
    //     $('#dedicated-desk').removeClass('d-none');
    //     $('#dedicated').addClass('collapse');
    //   @endif
    //   @if( empty($coWorkSpace->size['meeting_rooms']['for_listing']) ||  $coWorkSpace->size['private_offices']['for_listing'] > 0) 
    //     $('#private-desk').removeClass('d-none');
    //     $('#private').addClass('collapse');
    //   @endif
    //    @if( empty($coWorkSpace->size['meeting_rooms']['for_listing']) ||  $coWorkSpace->size['meeting_rooms']['for_listing'] > 0) 
    //     $('#meeting-desk').removeClass('d-none');
    //     $('#meeting-room').addClass('collapse');
    //   @endif
    // @endif

    // $('.bookNow').on('click', function(e){
    //     $('#book-now-error').html('');
    //     $('.invalid-feedback').remove();
    //     var is_submit = true;

    //     if(parseInt($('#total-check').text()) <= 0 || $('#total-check').text() == '') 
    //     {
    //     $('#book-now-error').html("Please select no of desk required and the duration");
    //     is_submit = false;
    //     }
    //     else 
    //     {
    //     is_submit = true;
    //     }

    //     if($('#booking-start-date').val() == null || $('#booking-start-date').val() == "")
    //     { 
    //     $('.start-date').css('border', '1px solid rgb(255 0 0)');
    //     $('#book-now-error').html("Please fill date");
    //     is_submit = false;
    //     }
    //     console.log('Is Submit : '+is_submit);
    //     if(is_submit == false){
    //         return false;
    //     }

    //     e.preventDefault();
    //     var formData = new FormData($('#booking_form')[0]);
    //     // console.log(formData);
    //     $.ajax({
    //         url : '{{ route('co-work-space.check-availability') }}',
    //         type : 'POST',
    //         data: formData,
    //         contentType : false,
    //         processData : false,
    //         success: function(data) { 
    //             if(data.success == true){
    //             $('#booking_form').submit(); 
    //             }else if(data.error == true){
    //                 $.each(data.errors, function (key, val) {
    //                     $('span.'+key).html('<span class="invalid-feedback d-block">'+val+'</span>');
    //                     $('span.'+key).show();
    //                 });
    //             }
    //         },
    //     });
    // });
</script>