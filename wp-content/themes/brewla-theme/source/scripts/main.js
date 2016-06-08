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
		
		
		var $grid = $('.general-grid');
		
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
		
		function initLoadMore(){
			
		    var ppp = 3; // Post per page
		    var pageNumber = 1,
		        $itemList = $grid,
		        totalPosts = parseInt($('.general-grid').attr('data-count'));
		        
		    if (totalPosts > ppp) {
                $(".more-post-cont").removeClass('hidden');
            }
		
		    var load_posts = function(cat){
		
		        var category = (cat)? '&cat='+cat : '';
		
		        pageNumber++;
		        var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax' + category;
		        $.ajax({
		            type: "POST",
		            dataType: "html",
		            url: "/wp-admin/admin-ajax.php",
		            data: str,
		            success: function(data){
		                var $data = $(data);
		                if($data.length){
		                    var $items = $(data);
		                    $itemList.append( $items ).masonry( 'appended', $items );
		                    setTimeout(function(){
			                    $grid.masonry({
								  // options
								  itemSelector: '.grid-item'
								});
		                    }, 200);
		                    $("#more_posts").html('SHOW MORE');
		                } else {
		                    $("#more_posts").html('NO MORE POSTS...');
		                    setTimeout(function(){
		                        $("#more_posts").hide().parent().hide();
		                    }, 500);
		                }
						

		            },
		            error : function(jqXHR, textStatus, errorThrown) {
		                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
		            }
		
		        });
		        return false;
		    }
		
		    $("#more_posts").on("click",function(){ // When btn is pressed.
		        var cat = ($(this).attr('data-cat'))? $(this).attr('data-cat') : false;
		        $("#more_posts").html('LOADING'); // Disable the button, temp.
		        load_posts(cat);
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
            $('a.fancybox, .fancybox-parent a').fancybox();
            
            $grid.masonry({
			  // options
			  itemSelector: '.grid-item'
			});
			
			
			setTimeout(function(){
				$grid.masonry({
				  // options
				  itemSelector: '.grid-item'
				});
			}, 500);
			
			initLoadMore();
            
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