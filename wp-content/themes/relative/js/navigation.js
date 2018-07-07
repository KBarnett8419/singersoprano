jQuery(document).ready(function($) {

	// Toggle mobile-menu
	$(".nav-toggle").on("click", function(){	
		$(this).toggleClass("active");
		$(".mobile-menu").slideToggle();
		if ($(".search-toggle").hasClass("active")) {
			$(".search-toggle").removeClass("active");
			$(".blog-search").slideToggle();
		}
	});
	
	// Toggle search form
	$(".search-toggle").on("click", function(){	
		$(this).toggleClass("active");
		$(".blog-search").slideToggle();
		if ($(".nav-toggle").hasClass("active")) {
			$(".nav-toggle").removeClass("active");
			$(".mobile-menu").slideToggle();
		}
	});
	
	
	// Show mobile-menu > 700
	$(window).resize(function() {
		if ($(window).width() > 700) {
			$(".toggle").removeClass("active");
			$(".mobile-menu").hide();
			$(".blog-search").hide();
		}
	});
	
	

});