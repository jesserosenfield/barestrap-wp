(function($) {
	
	$(document).ready(function(){
		var $root = $('html, body');
		$('.jump-flex-link').click(function() {
		    var href = $.attr(this, 'href');
		    
		    $root.animate({
		        scrollTop: $(href).offset().top
		    }, 500, function () {
		        window.location.hash = href;
		    });
		    return false;
		});		
	});
	
	$(window).load(function(){
		$('body').scrollspy({ target: '#jump-flex-nav' });
	
		$('body').scrollspy('refresh');
	
		$('.jump-flex-nav-wrap').affix({
		  offset: {
		    top:  function () {
		      return (this.top = ( $('.jump-flex-content-wrap').offset().top - 48))
		    }
		  }
		});	
	});


})(jQuery);