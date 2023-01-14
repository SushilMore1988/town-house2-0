<script type="text/javascript"> 

$(function () {
    $('.from-time-picker').datetimepicker({
        format: 'hh:mm A',       
        icons: {
            up: " glyphicon glyphicon-plus",
            down: "glyphicon glyphicon-minus",
            next: 'fa fa-chevron-circle-right',
            previous: 'fa fa-chevron-circle-left'
        } 
    })
    .on('dp.hide', function (e){
        Livewire.emit("selectFromTime", e.target.value, e.target.getAttribute("data-id"));
    });

    $('.to-time-picker').datetimepicker({
        format: 'hh:mm A',  
        icons: {
            up: " glyphicon glyphicon-plus",
            down: "glyphicon glyphicon-minus",
            next: 'fa fa-chevron-circle-right',
            previous: 'fa fa-chevron-circle-left'
        }          
    })
    .on('dp.hide', function (e){
        Livewire.emit("selectToTime", e.target.value, e.target.getAttribute("data-id"));
    });
});

</script>