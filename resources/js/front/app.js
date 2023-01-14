window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

window.onscroll = function() {scrollFunction()};

$(document).ready(function() {
	$('#openMenu').click(function() {
		$("#sideNav").css("width", '280px');			
	});
	$('#closeMenu').click(function() {
		$("#sideNav").css("width", '0');			
	});
});

function scrollFunction(){
	if ( $(window).width() > 768 ){
		if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 150) {
		  	$('.navbar').css('height', '60px');  
		  	$('.navbar').css('transition', '0.8s');  
		  	$('.navbar .navbar-brand svg').css('height', '50px');  
		  	$('.navbar .profile-photo .profile-wrapper').css('width', '50px'); 
		  	$('.navbar .profile-photo .profile-wrapper').css('height', '50px');  
		  	$('.navbar .navbar-nav').css('align-self', 'center');  
		  	$('.profile-photo').find('p').removeClass('align-self-end');
		  	$('.profile-photo').find('p').addClass('align-self-center');
		} else {
		    $('.navbar').css('height', '70px');  
		    $('.navbar').css('transition', '0.2s');  
		  	$('.navbar .navbar-brand svg').css('height', '60px'); 
		  	$('.navbar .profile-photo .profile-wrapper').css('width', '60px'); 
		  	$('.navbar .profile-photo .profile-wrapper').css('height', '60px');  
		  	$('.navbar .navbar-nav').css('align-self', 'flex-end');  
		  	$('.profile-photo').find('p').removeClass('align-self-center');
		  	$('.profile-photo').find('p').addClass('align-self-end');
		}
	}else{
		    $('.navbar').css('height', '60px');  
		    $('.navbar').css('transition', '0.2s');  
		  	$('.navbar .navbar-brand svg').css('height', '45px'); 
		  	$('.navbar .profile-photo .profile-wrapper').css('width', '45px'); 
		  	$('.navbar .profile-photo .profile-wrapper').css('height', '45px');  
		  	$('.navbar .navbar-nav').css('align-self', 'flex-end');  
		  	$('.profile-photo').find('p').removeClass('align-self-end');
		  	$('.profile-photo').find('p').addClass('align-self-center');
	}
}

jQuery(document).ready(function($){
	$('#addFilter').on('click',function(){
		if($("#mySidenavTabs").hasClass('col-md-0') ) {
			$("#mySidenavTabs").addClass('col-md-4');
		    $("#mySidenavTabs").removeClass('col-md-0');
		    $(".sidetabs").css('display','block');
		}else {
		    $("#mySidenavTabs").removeClass('col-md-4');
		    $("#mySidenavTabs").addClass('col-md-0');
		    $(".sidetabs").css('display','none');
		}
		if($("#main").hasClass('col-md-12') ) {
			$("#main").addClass('col-md-8');
		    $("#main").removeClass('col-md-12');
		   	$(".card-wrapper").addClass('col-md-6');
		    $(".card-wrapper").removeClass('col-md-4');
		}else {
		    $("#main").removeClass('col-md-8');
		    $("#main").addClass('col-md-12');
		    $(".card-wrapper").addClass('col-md-4');
		    $(".card-wrapper").removeClass('col-md-6');
		};
	});
});

$('#closeSideTab').on('click',function(){
	$(".sidetabs").css('display','none');
	$(".sidetabs").removeClass('col-md-4');
	$(".sidetabs").addClass('col-md-0');
});
$('.addDelete-img').hover(function() {
    if ($(this).find("i").hasClass("fa-check-circle")) {
	    $(this).find("i").toggleClass('fa-times-circle');
	    $(this).find("i").toggleClass('text-danger');
	}
});

setTimeout(function() {
    $('.time-out-alert').fadeOut('fast');
}, 3000);

$(document).on('keypress', ".number", function (e) { 
	var charCode = (e.which) ? e.which : e.keyCode;
	var txt = $(this).val(); 
	// return e.metaKey || e.which <= 0 || e.which == 8|| e.which == 43|| e.which == 45 || e.which == 46 || e.which == 47 || /[0-9]/.test(String.fromCharCode(e.which));
	if (charCode == 46) {
        if (txt.indexOf('.') === -1) {
	        return true;
        } else {
	        return false;
        }
  	} else {
        if (charCode > 31 && (charCode < 48 || charCode > 57))
	        return false;
      	}
    return true;
});	