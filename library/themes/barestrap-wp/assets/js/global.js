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

});

document.addEventListener("touchstart", function(){}, true);