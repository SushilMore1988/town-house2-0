<script type="text/javascript"> 
    //to show completed check mark on tab   
    var i = 0;
    $('.from-mark').each(function(){ 
        if($(this).is(":checked")){
            //unmark completed
            i++;
        }
        if(i >= 1){
            $('.hours-mark').removeClass('d-none');
            $('.hours-mark-error').addClass('d-none');
            return;
        }else{
            $('.hours-mark').addClass('d-none');
            $('.hours-mark-error').removeClass('d-none');
        }
    });

$(function () {
	//https://eonasdan.github.io/bootstrap-datetimepicker/Options/
    $('.monday-from-time-picker').datetimepicker({
        format: 'hh:mm A',
          // debug: true,
          icons: {
            up: " glyphicon glyphicon-plus",
            down: "glyphicon glyphicon-minus",
            next: 'fa fa-chevron-circle-right',
            previous: 'fa fa-chevron-circle-left'
        }     
            
        //format: 'LT'
    })
    .on('dp.change', function (e) { 
    	//on change monday date set default date time
    	$('.from-time-picker').datetimepicker('date', e.date.format('hh:mm:ss'));
    	//$('.datetimepicker3').datetimepicker('date', new Date());
    });

    $('.from-time-picker').datetimepicker({
        format: 'hh:mm A',        
    });


    $('.monday-to-time-picker').datetimepicker({
        format: 'hh:mm A',        
        icons: {
            up: " glyphicon glyphicon-plus",
            down: "glyphicon glyphicon-minus",
            next: 'fa fa-chevron-circle-right',
            previous: 'fa fa-chevron-circle-left'
        }    
        //format: 'LT'
    })
    .on('dp.change', function (e) { 
    	//on change monday date set default date time
    	$('.to-time-picker').datetimepicker('date', e.date.format('hh:mm A'));
    	//$('.datetimepicker3').datetimepicker('date', new Date());
    });

    $('.to-time-picker').datetimepicker({
        format: 'hh:mm A',  
        icons: {
            up: " glyphicon glyphicon-plus",
            down: "glyphicon glyphicon-minus",
            next: 'fa fa-chevron-circle-right',
            previous: 'fa fa-chevron-circle-left'
        }          
    });
});

</script>