
// Slider functions
// Can also be used with $(document).ready()
jQuery( document ).ready(function( $ ) {
	
	$( window ).load(function() {
		
		if ( 0 !== $( '.flexslider' ).length ) {
			$( '.flexslider' ).flexslider({
				animation: 'fade',
				easing: 'swing',
				direction: 'horizontal',
				reverse: false,
				animationLoop: true,
				smoothHeight: true,
				startAt: 0,
				slideshow: true,
				slideshowSpeed: 5000,
				animationSpeed: 600,
				initDelay: 0,
				randomize: false,
				fadeFirstSlide: true,
				pauseOnAction: true,
				pauseOnHover: false,
				pauseInvisible: true,
				useCSS: true,
				touch: true,
				directionNav: true,
				prevText: '',
				nextText: ''

			});
		}
	});
	
	
 // ScrollUp
$(function($) {
	var goTop = $('#back-to-top');
	$(window).scroll(function() {
		if ( $(this).scrollTop() > 600 ) {
			goTop.addClass('show');
		} else {
			goTop.removeClass('show');
		}
	}); 

	goTop.on('click', function() {
		$("html, body").animate({ scrollTop: 0 }, 1000);
		return false;
	});
});
	

		
});