(function ($) {

    "use strict";

    var $header = $('header');
    var $ham = $('.hamburger');

    function navSlide(){
    	
    	if($header.hasClass('active')){
    		$header.removeClass('active');
    	}else{
    		$header.addClass('active');
    	}
    }
    
    $ham.click(function(){
		navSlide();
	});

})(jQuery);
