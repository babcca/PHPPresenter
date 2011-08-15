(function($){  
    $.fn.slider = function() {       
        
        var element     = this;
        var time     	= 7000;
		var fadeTime 	= 1000;
        var current     = null;
        var items       = $("#" + element[0].id + "Content ." + element[0].id + "Image");
		
		var loop = function() {
			if(items.length > 0) {
				 makeSlider();
			}
		}
		
        var makeSlider = function() {
			current = (current != null) ? current : items[0];
            var currNo = jQuery.inArray(current, items) + 1;
            currNo = (currNo == items.length + 1) ? 0 : (currNo - 1);

			$(items[currNo]).fadeIn(fadeTime, function() {
				setTimeout(function() {
					$(items[currNo]).fadeOut(fadeTime, function() {
						current = items[(currNo+1)];
						loop();
					});
				}, time);
			}); 
        }

		makeSlider();
    };  
	
})(jQuery);