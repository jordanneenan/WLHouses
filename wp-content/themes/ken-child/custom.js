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


//vertical align middle
var $selector;
function vAlign($selector){
    if($selector.length){

    }else{
        var $selector = $('.v-align')
    }

    if($selector.length){
        var $vaChild = $selector;
        $vaChild.each(function(){
            var vaChildHeight = $(this).height();
            var vaParentHeight = $(this).parent().height();
            var topOffset = (vaParentHeight - vaChildHeight) / 2;
            $(this).css('paddingTop', topOffset).addClass('show');
        });
    }
}

//--------- on window load ---------
jQuery(window).load(function(){
});

//-------- on window resize --------
jQuery(window).resize(function(){
});