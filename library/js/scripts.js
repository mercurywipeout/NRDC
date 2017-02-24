jQuery(document).ready(function($) {

 /********************************
 	Smooth scrolling effect when using anchor links
 */
 
 	$(function() {
 		$('a[href*=#]:not([href=#])').click(function() {
 			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
 				var target = $(this.hash);
 				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
 				if (target.length) {
 					$('html,body').animate({
 						scrollTop: target.offset().top
 					}, 1000);
 					return false;
 				}
 			}
 		});
 	});
	$('.slider').slick({
		dots: false,
		infinite: true,
		speed: 300,
		// variableWidth: true,
		slidesToShow: 4,
		slidesToScroll: 4,
		prevArrow: "<a class='previous'>Previous</a>",
		nextArrow: "<a class='next'>Next</a>",
		
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
				}
			},
			{
			breakpoint: 900,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
			breakpoint: 600,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});
});