var debounce = function (func, threshold, execAsap) {
  var timeout;

  return function debounced () {
      var obj = this, args = arguments;
      function delayed () {
          if (!execAsap)
              func.apply(obj, args);
          timeout = null; 
      };

      if (timeout)
          clearTimeout(timeout);
      else if (execAsap)
          func.apply(obj, args);

      timeout = setTimeout(delayed, threshold || 100); 
  };
}

jQuery.fn.extend({
	hwFadeIn: function() {
		var $me = $(this);
		
		$me.addClass('hw-fade--workin');
		
		setTimeout(function(){
			$me.addClass('hw-fade--in');
		}, 10);
	},
	hwFadeOut: function() {
		var $me = $(this);
		
		$me.removeClass('hw-fade--in');

		setTimeout(function(){
			$me.removeClass('hw-fade--workin');
		}, 400);
	}
});

(function($) {
	$.extend($.lazyLoadXT, {
	  edgeY:  1000,
	});
	
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
	
		$('.fancybox').fancybox({
			helpers: { 
			    overlay: { 
			        locked: false 
			   }
			}	
		});
	
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
		
		// BOOTSTRAP MODAL PADDING FIX
	    var oldSSB = $.fn.modal.Constructor.prototype.setScrollbar;
	    $.fn.modal.Constructor.prototype.setScrollbar = function () 
	    {
	        oldSSB.apply(this);
	        if(this.bodyIsOverflowing && this.scrollbarWidth) 
	        {
	            $('.fixed-nav').css('padding-right', this.scrollbarWidth);
	        }       
	    }
	
	    var oldRSB = $.fn.modal.Constructor.prototype.resetScrollbar;
	    $.fn.modal.Constructor.prototype.resetScrollbar = function () 
	    {
	        oldRSB.apply(this);
	        $('.fixed-nav').css('padding-right', '');
	    }


		var $theflkty = $('.flickity-enabled');

		if( typeof $theflkty !== 'undefined' && $theflkty.length > 0) {
			var $flktycells = $theflkty.find('.gallery-cell');
			
			theflktyData = $theflkty.data('flickity');
			
			$theflkty.on('select.flickity', function(){
				var myIndex = theflktyData,
					$lazyImg = $flktycells.filter(':eq(' + theflktyData.selectedIndex + ')').find('[data-src], [data-bg]');
				
				if(typeof $lazyImg !== 'undefined' && $lazyImg.length > 0) {
					$lazyImg.lazyLoadXT({show: true});
				}
				
			});
		}
	});
	
	document.addEventListener("touchstart", function(){}, true);


})(jQuery);