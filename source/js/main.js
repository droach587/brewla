var mainJs = (function () {
 		
 		/**
 		 * Avoid Console Errors
 		 *
 		 * 
 		 */
		(function() {
		    var method;
		    var noop = function () {};
		    var methods = [
		        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
		        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
		        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
		        'timeStamp', 'trace', 'warn'
		    ];
		    var length = methods.length;
		    var console = (window.console = window.console || {});
		
		    while (length--) {
		        method = methods[length];
		
		        // Only stub undefined methods.
		        if (!console[method]) {
		            console[method] = noop;
		        }
		    }
		}());
		
		function mobileNav(){
			
			var $element = $('.mobile-nav-toggle');
			var active = 'isActive';
			var $target = $('.primary-nav');
			
			$element.on('click', function(e){
				
				$target.toggleClass(active);
				$element.toggleClass(active);
				
				e.preventDefault();
			});
			
		}
		
		function search(){
			
			var $element = $('.primary-nav__search a');
			var $target = $('.primary-header__search');
			var active = 'isActive';
			
			$element.on('click', function(e){
				$target.toggleClass(active);
				e.preventDefault();
			});
		}
		
		function slickSlider(){
			$('.hero__container').slick({
				fade: true,
				dots: true,
				arrows: false,
			});		
		}
 		
 		/**
 		 * Simple Init Function
 		 *
 		 * 
 		 */
        function init() {
            mobileNav();
            search();
            slickSlider();
        }
 
 
        /**
         * Reveal All Methods here
         *
         * 
         */
        return {
            init 	:	init
        };
})();