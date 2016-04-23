$(document).ready(function(){
	//! Toggle Menu Item Class
	var headerAnim = false;
	
	//! Toggle Menu Item Class
	$('.nav-toggle').click(function(){		
		if(headerAnim == true) {
			return false;
		}

		var $me = $(this);
		
		$me.toggleClass('active');
		headerAnim = true;

		setTimeout(function(){
			headerAnim = false;
		}, 350);
		
	});
	
	$('a:not([href^="' + homeurl + '"]):not([href^="#"]):not([href^="/"])').attr('target', '_blank');

	$('.post-content a')
		.filter(function(){
			return !!this.href.match('[\.jpg|\.png|\.gif|\.jpeg]$');
		})
		.has('img')
		.addClass('fancybox fancybox-img')
		.append('<span class="post-content-fb-btn"></span>');

	$('.fancybox').fancybox();

});

$(window).load(function(){

	$('.flickity-yeah').flickity({
		"wrapAround": false,
		"pageDots" : false,
		"contain" : true,
		"lazyLoad" : true,
		"prevNextButtons" : true,
		"autoPlay" : false,
		"resize" : true,
		"cellAlign" : "left",
		"imagesLoaded" : true
	});
});

document.addEventListener("touchstart", function(){}, true);