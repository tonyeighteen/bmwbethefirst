(function($) { "use strict";


	//Preloader

	Royal_Preloader.config({
		mode           : 'progress=',
		background     : '#ffffff',
		showProgress   : true,
		showPercentage : false
	});


	// Scroll Animation

	window.scrollReveal = new scrollReveal();


	//Parallax & fade on scroll


	function scrollBanner() {
		$(document).on('scroll', function (e) {
			if ($(window).width() > 991) {
				var scrollPos = $(this).scrollTop();
				$('.parallax-fade-top').css({
					'top' : (scrollPos/2)+'px',
					'opacity' : 1-(scrollPos/1000)
				});
			}
		});
	}
	scrollBanner();

	//Misc
	$(document).ready(function() {


		//Scroll Too

		$(".scroll").on('click', function(event){

			event.preventDefault();

			var full_url = this.href;
			var parts = full_url.split("#");
			var trgt = parts[1];
			var target_offset = $("#"+trgt).offset();
			var target_top = target_offset.top - 67;

			$('html, body').animate({scrollTop:target_top}, 800);
		});


		//Scroll back to top

		var offset = 300;
		var duration = 600;
		jQuery(window).on('scroll', function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.scroll-to-top').fadeIn(duration);
			} else {
				jQuery('.scroll-to-top').fadeOut(duration);
			}
		});

		jQuery('.scroll-to-top').on('click', function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		})


		//Home Carousel

		var sync1 = $("#hero-sync1");
		var sync2 = $("#hero-sync2");

		sync1.owlCarousel({
			singleItem : true,
			slideSpeed : 400,
			transitionStyle : "fade",
			pagination:false,
			autoPlay : 3000,
			afterAction : syncPosition
		});
		(function ($) {
			var owl = $("#hero-sync1");
			owl.owlCarousel();

			// Custom Navigation Events
			$(".next-hero-sync-1").click(function(){
				owl.trigger('owl.next');
			})
			$(".prev-hero-sync-1").click(function(){
				owl.trigger('owl.prev');
			})
		} )(jQuery);

		sync2.owlCarousel({
			items : 4,
			itemsDesktop      : [479,4],
			itemsDesktopSmall     : [479,0],
			itemsTablet       : [479,0],
			itemsMobile       : [479,0],
			pagination:false,
			responsiveRefreshRate : 100,
			afterInit : function(el){
				el.find(".owl-item").eq(0).addClass("synced");
			}
		});

		function syncPosition(el){
			var current = this.currentItem;
			$("#hero-sync2")
				.find(".owl-item")
				.removeClass("synced")
				.eq(current)
				.addClass("synced")
			if($("#hero-sync2").data("owlCarousel") !== undefined){
				center(current)
			}
		}

		$("#hero-sync2").on("click", ".owl-item", function(e){
			e.preventDefault();
			var number = $(this).data("owlItem");
			sync1.trigger("owl.goTo",number);
		});

		function center(number){
			var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
			var num = number;
			var found = false;
			for(var i in sync2visible){
				if(num === sync2visible[i]){
					var found = true;
				}
			}

			if(found===false){
				if(num>sync2visible[sync2visible.length-1]){
					sync2.trigger("owl.goTo", num - sync2visible.length+2)
				}else{
					if(num - 1 === -1){
						num = 0;
					}
					sync2.trigger("owl.goTo", num);
				}
			} else if(num === sync2visible[sync2visible.length-1]){
				sync2.trigger("owl.goTo", sync2visible[1])
			} else if(num === sync2visible[0]){
				sync2.trigger("owl.goTo", num-1)
			}

		}


		//Parallax

		$('.parallax').parallax("50%", 0.3);


		// Video

		$(".section").fitVids();

		$('.vimeo a,.youtube a').on('click', function (e) {
			e.preventDefault();
			var videoLink = $(this).attr('href');
			var classeV = $(this).parent();
			var PlaceV = $(this).parent();
			if ($(this).parent().hasClass('youtube')) {
				$(this).parent().wrapAll('<div class="video-wrapper">');
				$(PlaceV).html('<iframe frameborder="0" height="333" src="' + videoLink + '?autoplay=1&showinfo=0" title="YouTube video player" width="547"></iframe>');
			} else {
				$(this).parent().wrapAll('<div class="video-wrapper">');
				$(PlaceV).html('<iframe src="' + videoLink + '?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1&amp;color=6dc234" width="500" height="281" frameborder="0"></iframe>');
			}
		});

		/* Portfolio Sorting */

		(function ($) {
			var container = $('.grid-wraper');
			function getNumbColumns() {
				var winWidth = $(window).width(),
					columnNumb = 1;
				if (winWidth > 1500) {
					columnNumb = 4;
				} else if (winWidth > 1200) {
					columnNumb = 3;
				} else if (winWidth > 900) {
					columnNumb = 2;
				} else if (winWidth > 600) {
					columnNumb = 1;
				} else if (winWidth > 300) {
					columnNumb = 1;
				}
				return columnNumb;
			}
			function setColumnWidth() {
				var winWidth = $(window).width(),
					columnNumb = getNumbColumns(),
					postWidth = Math.floor(winWidth / columnNumb);
			}
			$('.grid-filter .filter a').click(function () {
				var selector = $(this).attr('data-filter');
				$(this).parent().parent().find('a').removeClass('current');
				$(this).addClass('current');
				container.isotope( {
					filter : selector
				});
				setTimeout(function () {
					reArrangeProjects();
				}, 300);
				return false;
			});
			function reArrangeProjects() {
				setColumnWidth();
				container.isotope('layout');
			}
			container.imagesLoaded(function () {
				setColumnWidth();
				container.isotope( {
					itemSelector : '.grid-box',
					layoutMode : 'masonry',
					resizable : false
				} );
			} );
			$(window).on('debouncedresize', function () {
				reArrangeProjects();
			} );
		} )(jQuery);

	});

	/* DebouncedResize Function */
	(function ($) {
		var $event = $.event,
			$special,
			resizeTimeout;


		$special = $event.special.debouncedresize = {
			setup : function () {
				$(this).on('resize', $special.handler);
			},
			teardown : function () {
				$(this).off('resize', $special.handler);
			},
			handler : function (event, execAsap) {
				var context = this,
					args = arguments,
					dispatch = function () {
						event.type = 'debouncedresize';

						$event.dispatch.apply(context, args);
					};
				if (resizeTimeout) {
					clearTimeout(resizeTimeout);
				}
				execAsap ? dispatch() : resizeTimeout = setTimeout(dispatch, $special.threshold);
			},
			threshold : 150
		};
	} )(jQuery);

    function resizeIFrameToFitContent( iFrame ) {

        iFrame.width  = iFrame.contentWindow.document.body.scrollWidth;
        iFrame.height = iFrame.contentWindow.document.body.scrollHeight;
    }

    window.addEventListener('DOMContentLoaded', function(e) {

        var iFrame = document.getElementById( 'iFrame1' );
        resizeIFrameToFitContent( iFrame );

        // or, to resize all iframes:
        var iframes = document.querySelectorAll("iframe");
        for( var i = 0; i < iframes.length; i++) {
            resizeIFrameToFitContent( iframes[i] );
        }
    } );

})(jQuery);
