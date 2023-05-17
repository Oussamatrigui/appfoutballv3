(function ($) {
 
	/*------------- preloader js --------------*/
	$(window).on('load',function() { // makes sure the whole site is loaded
		$('.preloder-wrap').fadeOut(); // will first fade out the loading animation
		$('.loader').delay(1500).fadeOut('slow'); // will fade out the white DIV that covers the website.
		$('body').delay(600).css({'overflow':'visible'})
	})
})(jQuery);
