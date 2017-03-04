if(typeof $intnav !== "undefined") {
	
	jQuery(document).ready(function($){
		var colclass = ' class="col-xs-12"';
		
		colclass = ' class="col-md-9"';
		
		var	$intnavHtml = $('<div class="inner-nav-wrap"><div class="inner-nav"><div class="container-fluid"><div class="row center-cols"><div' + colclass + '><div id="int-nav">' + sidrBtn + '<ul class="inner-nav-ul nav">'),
			$intnavUl = $intnavHtml.find('.inner-nav-ul'),
			$firstHero = $('.hero-wrap').first();
			
			
		if($firstHero.length == 0) {
			$firstHero = $('.banner-title').first();
		}
		
		$intnav = $($intnav).map (function () {return this.toArray(); } );
		
		$intnav.appendTo($intnavUl);
		
		if($firstHero.length) {
			$intnavHtml.insertAfter($firstHero);
		}
	});
	
	jQuery(window).load(function(){
		$('body').scrollspy({ target: '#int-nav' });
	
		$('body').scrollspy('refresh');
	
		$('.inner-nav').affix({
		  offset: {
		    top:  function () {
		      return (this.top = ( $('.inner-nav-wrap').offset().top - $('.inner-nav-wrap').outerHeight() ))
		    }
		  }
		});
	
		$(".inner-nav").headroom({
			offset : 300
		});

		$(".inner-nav a[href^=#]").click(function(e) {
			e.preventDefault();
			var dest = $(this).attr('href');
			
			$('html,body').animate({
				scrollTop: $(dest).offset().top - 80
			}, 'slow');
		});
	});
}