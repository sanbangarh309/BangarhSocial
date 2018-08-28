$(document).ready(function() {     
    $('#at-expanding-share-button').hover(function(){     
        $(this).addClass('at-expanding-share-button-animate-in');    
        $('.at-expanding-share-button-services-list li').addClass('button-slide');    
    },     
    function(){    
        $('ul li').removeClass('fadeInUp');     
    });
	$(".wh-widget-button-activator").click(function(){
		$('#at-expanding-share-button').removeClass('at-expanding-share-button-animate-in');
		$('.at-expanding-share-button-services-list li').removeClass('button-slide'); 
	});
	
	
	
}); 
 