jQuery(document).ready(function ($) {
	"use strict";
	function mycarousel4_initCallback(e){e.buttonNext.hover(function(){e.stopAuto()},function(){e.startAuto()});e.buttonPrev.hover(function(){e.stopAuto()},function(){e.startAuto()});e.clip.hover(function(){e.stopAuto()},function(){e.startAuto()})};
	jQuery.browser={};(function(){jQuery.browser.msie=false;
	jQuery.browser.version=0;if(navigator.userAgent.match(/MSIE ([0-9]+)\./)){
	jQuery.browser.msie=true;jQuery.browser.version=RegExp.$1;}})();
	
	$('.top-lang').topLang();
		
	// Paralax Background
	if ($(".paralax_bg")[0]) {
		$('.paralax_bg').parallax("50%", 0.5);
	}

	// Youtube Video Background
	if ($(".row_player")[0]) {
		$(".row_player").mb_YTPlayer();
	}
	
	// HTML5 Video Background Opacity
	if ($(".HTML5video")[0]) {
		jQuery('.HTML5video').each(function() {
			var this_element = jQuery(this);
			var vidopacity = this_element.attr('data-opacity');
			this_element.fadeTo(0, vidopacity);
		});
    }
	// Tabber Tabs
	jQuery(".tabber-widget").each(function(){	
        var ul = jQuery(this).find("ul.tabs");

        jQuery(this).find("li.st-tab").each(function() {
            var widget = jQuery(this).attr("id");
            jQuery(this).find('a.tab').attr("href", "#" + widget).wrap('<li></li>').parent().detach().appendTo(ul);
        });

    });
	
	// Service Style One
	if ($(".service-one")[0]) {
		$('.section_row').each(function(){
		if($('.service-one', this).html() != undefined){
			$(this).addClass('services'); 
		}
		});
	}
	
	// Side Navigation
	$('.side-nav li').each(function() {
		if($(this).find('> .children').length >=1) {
			$(this).find('> a').append('<i class="fa-angle-right"></i>');
		}
	});
	$('.side-nav .current_page_item').each(function() {
		if($(this).find('.children').length >= 1){
			$(this).find('.children').slideDown('slow');
		}
	});
	$('.side-nav .current_page_item').each(function() {
		if($(this).parent().hasClass('side-nav')){
			$(this).find('ul').slideDown('slow');
		}
		if($(this).parent().hasClass('children')){
			$(this).parents('ul').slideDown('slow');
		}
	});
	
	$('.side-nav li').hoverIntent({
	over: function() {
		if($(this).find('> .children').length >= 1) {
			$(this).find('> .children').stop(true, true).slideDown('slow');
		}
	},
	out: function() {
		if($(this).find('.current_page_item').length == 0 && jQuery(this).hasClass('current_page_item') == false) {
			$(this).find('.children').stop(true, true).slideUp('slow');
		}
	},
	timeout: 500
	});
	
	// Superfish
	if ($(".sf-menu")[0]) {
		$('.sf-menu').superfish({
			animation: {
				opacity: 'show', height: 'show'
			},
			speed: 300
		});
		$('.sf-menu li li a').prepend('<i class="fa-caret-right"></i>');
		$('.sf-menu li li .sf-sub-indicator i').removeClass('fa-chevron-down').addClass('fa-chevron-right');
	}
	
	$(document).click(function() {
		$('.search-pop-form').hide();
	});
	$('.search-pop-form').click(function(e) {
		e.stopPropagation();
	});
	$('.search-pop-button').click(function(e) {
		e.stopPropagation();
		if($('.search-pop-form').css('display') == 'block') {
			$('.search-pop-form').hide();
		} else {
			$('.search-pop-form').show();
		}
	});
	
	
	// Tabs
	var tabs = jQuery('ul.tabs');
	tabs.each(function (i) {
		jQuery(".tabs-content li:first-child, .tabs li:first-child a").addClass("active");
		// get tabs
		var tab = jQuery(this).find('> li > a');
		tab.click(function (e) {
			// get tab's location
			var contentLocation = jQuery(this).attr('href');
			// Let go if not a hashed one
			if (contentLocation.charAt(0) === "#") {
				e.preventDefault();
				// add class active
				tab.removeClass('active');
				jQuery(this).addClass('active');
				// show tab content & add active class
				jQuery(contentLocation).fadeIn(500).addClass('active').siblings().hide().removeClass('active');
				jQuery(contentLocation).find('.isotope').isotope("reLayout");
			}
		});
	});
	
	// Accordion
	jQuery("ul.tt-accordion li").each(function () {
		if (jQuery(this).index() > 0) {
			jQuery(this).children(".accordion-content").css('display', 'none');
		} else {
			if ($(".faq")[0]) {
				jQuery(this).addClass('active').find(".accordion-head-sign").append("<i class='fa-chevron-up'></i>");
				jQuery(this).siblings("li").find(".accordion-head-sign").append("<i class='fa-chevron-down'></i>");
			} else {
				jQuery(this).addClass('active').find(".accordion-head-sign").append("<i class='fa-chevron-up'></i>");
				jQuery(this).siblings("li").find(".accordion-head-sign").append("<i class='fa-chevron-down'></i>");
			}
		}
		jQuery(this).children(".accordion-head").bind("click", function () {
			jQuery(this).parent().addClass(function () {
				if (jQuery(this).hasClass("active")) {
					return;
				} {
					return "active";
				}
			});
			if ($(".faq")[0]) {
				jQuery(this).siblings(".accordion-content").slideDown();
				jQuery(this).parent().find(".accordion-head-sign i").addClass("fa-chevron-up").removeClass("fa-chevron-down");
				jQuery(this).parent().siblings("li").children(".accordion-content").slideUp();
				jQuery(this).parent().siblings("li").removeClass("active");
				jQuery(this).parent().siblings("li").find(".accordion-head-sign i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
			} else {
				jQuery(this).siblings(".accordion-content").slideDown();
				jQuery(this).parent().find(".accordion-head-sign i").addClass("fa-chevron-up").removeClass("fa-chevron-down");
				jQuery(this).parent().siblings("li").children(".accordion-content").slideUp();
				jQuery(this).parent().siblings("li").removeClass("active");
				jQuery(this).parent().siblings("li").find(".accordion-head-sign i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
			}
		});
	});
	
	// Toggle
	jQuery(".toggle").each(function () {
		jQuery(this).children(".toggle-content").css('display', 'none');
		jQuery(this).find(".toggle-head-sign").html("<i class='fa-chevron-down'></i>");
		jQuery(this).children(".toggle-head").bind("click", function () {
			if (jQuery(this).parent().hasClass("active")) {
				jQuery(this).parent().removeClass("active");
			} else {
				jQuery(this).parent().addClass("active");
			}
			jQuery(this).find(".toggle-head-sign").html(function () {
				if (jQuery(this).parent().parent().hasClass("active")) {
					return "<i class='fa-chevron-up'></i>";
				} else {
					return "<i class='fa-chevron-down'></i>";
				}
			});
			jQuery(this).siblings(".toggle-content").slideToggle();
		});
	});
	jQuery(".toggle").find(".toggle-content.active").siblings(".toggle-head").trigger('click');
	
	// 4Mob
	$("#header nav").before('<div id="mobilepro"><i class="fa-bars fa-times"></i></div>');
	$("#header .sf-menu a.sf-with-ul").before('<div class="subarrow"><i class="fa-angle-down"></i></div>');
	$('.subarrow').click(function () {
		$(this).parent().toggleClass("xpopdrop");
	});
	
	
	$('#mobilepro').click(function () {
		$('#header .sf-menu').slideToggle('slow', 'easeInOutExpo').toggleClass("xactive");
		$("#mobilepro i").toggleClass("fa-bars");
	});
	$("body").click(function() {
		$('#header .xactive').slideUp('slow', 'easeInOutExpo').removeClass("xactive");
		$("#mobilepro i").addClass("fa-bars");
	});
	$('#mobilepro, .sf-menu').click(function(e) {
		e.stopPropagation();
	});
	function checkWindowSize() {
		if ($(window).width() >= 959) {
			$('#header .sf-menu').css('display', 'block').removeClass("xactive");
		} else {
			$('#header .sf-menu').css('display', 'none');
		}
	}
	$(window).load(checkWindowSize);
	$(window).resize(checkWindowSize);

	// ToTop
	jQuery('#toTop').click(function () {
		jQuery('body,html').animate({
			scrollTop: 0
		}, 1000);
	});
	
	// Notification
	$(".notification-close").click(function () {
		$(this).parent().slideUp("slow");
		return false;
	});
	
	// Owl Carousel
	if ($(".rd_carousel")[0]) {
		jQuery('.rd_carousel').each(function() {
			var this_element = jQuery(this);
			var grid = parseInt(this_element.attr('data-grid')),
				tablet = parseInt(this_element.attr('data-tablet')),
				tabletsmall = parseInt(this_element.attr('data-tabletsmall')),
				mobile = parseInt(this_element.attr('data-mobile')),
				mobilesmall = parseInt(this_element.attr('data-mobilesmall')),
				auto = parseInt(this_element.attr('data-auto'))*1000,
				nav = this_element.attr('data-navigation');
			var navi=false;
			if(nav == 'yes'){navi=true;}
			if(auto == 0){auto=false;}

			this_element.owlCarousel({
				itemsCustom : [
					[100, mobilesmall],
					[480, mobile],
					[768, tabletsmall],
					[959, tablet],
					[1177, grid]
				  ],
				autoPlay : auto,
				singleItem : false,
				itemsScaleUp : false,
				stopOnHover : true,
				navigation : navi,
				navigationText : ['<i class="fa-angle-left"></i>','<i class="fa-angle-right"></i>'],
				rewindNav : true,
				scrollPerPage : false,
				responsive: true,
				responsiveRefreshRate : 200,
				responsiveBaseWidth: window,
				pagination : false,
				paginationNumbers: false,

			});
		});
    }
	
	// Owl Slider
	if ($(".rd_slides")[0]) {
		jQuery('.rd_slides').each(function() {
			var this_element = jQuery(this);
			var auto = parseInt(this_element.attr('data-auto'))*1000,
				nav = this_element.attr('data-navigation'),
				pag = this_element.attr('data-pagination');
			var navi=false;
			if(nav == 'yes'){navi=true;} else{navi=false;}
			if(pag == 'yes'){pag=true;} else{pag=false;}
			if(auto == 0){auto=false;}

			this_element.owlCarousel({
				autoPlay : auto,
				singleItem : true,
				slideSpeed : 800,
				stopOnHover : true,
				navigation : navi,
				navigationText : ['<i class="fa-angle-left"></i>','<i class="fa-angle-right"></i>'],
				rewindNav : true,
				scrollPerPage : false,
				pagination : pag,
				paginationNumbers: false,
			});
		});
    }
	
	// Owl Slider + Thumb
	if ($(".rd_slides_thumb")[0]) {
		jQuery('.rd_slides_thumb').each(function() {
			var this_element = jQuery(this);
			var grid = parseInt(this_element.attr('data-grid')),
				tablet = parseInt(this_element.attr('data-tablet')),
				tabletsmall = parseInt(this_element.attr('data-tabletsmall')),
				mobile = parseInt(this_element.attr('data-mobile')),
				mobilesmall = parseInt(this_element.attr('data-mobilesmall')),
				auto = parseInt(this_element.attr('data-auto'))*1000,
				nav = this_element.attr('data-navigation');
			var navi=false;
			if(nav == 'yes'){navi=true;}
			if(auto == 0){auto=false;}
			var slidexthumbxId = this_element.closest(".rd_slides_thumb").attr("id");
			var slidexId = "#slidex" + slidexthumbxId;
			var thumbxId = "#thumbx" + slidexthumbxId;
			
			jQuery(slidexId).owlCarousel({
				autoPlay : auto,
				stopOnHover : true,
				singleItem : true,
				slideSpeed : 800,
				afterAction : syncPosition,
				responsiveRefreshRate : 200,
				navigation : navi,
				navigationText : ['<i class="fa-angle-left"></i>','<i class="fa-angle-right"></i>'],
				rewindNav : true,
				scrollPerPage : false,
				pagination : false,
				paginationNumbers: false,
			});
			jQuery(thumbxId).owlCarousel({
				itemsCustom : [
					[100, mobilesmall],
					[480, mobile],
					[768, tabletsmall],
					[959, tablet],
					[1177, grid]
				  ],
				pagination:false,
				responsiveRefreshRate : 100,
				afterInit : function(el){
				  el.find(".owl-item").eq(0).addClass("synced");
				}
			});
			
			function syncPosition(el){
				var current = this.currentItem;
				$(thumbxId)
				  .find(".owl-item")
				  .removeClass("synced")
				  .eq(current)
				  .addClass("synced")
				if($(thumbxId).data("owlCarousel") !== undefined){
				  center(current)
				}
			}

			$(thumbxId).on("click", ".owl-item", function(e){
				e.preventDefault();
				var number = $(this).data("owlItem");
				$(slidexId).trigger("owl.goTo",number);
			});

			function center(number){
				var sync2visible = $(thumbxId).data("owlCarousel").owl.visibleItems;

				var num = number;
				var found = false;
				for(var i in sync2visible){
				  if(num === sync2visible[i]){
					var found = true;
				  }
				}
				if(found===false){
				  if(num>sync2visible[sync2visible.length-1]){
					$(thumbxId).trigger("owl.goTo", num - sync2visible.length+2)
				  }else{
					if(num - 1 === -1){
					  num = 0;
					}
					$(thumbxId).trigger("owl.goTo", num);
				  }
				} else if(num === sync2visible[sync2visible.length-1]){
				  $(thumbxId).trigger("owl.goTo", sync2visible[1])
				} else if(num === sync2visible[0]){
				  $(thumbxId).trigger("owl.goTo", num-1)
				}
			}
		});
    }
	
	// Gmap3
	if ($("#map")[0]) {
		jQuery('#map').each(function() {
			var this_element = jQuery(this);
			var mapLatitude = this_element.attr('data-latitude'),
				mapLongitude = this_element.attr('data-longitude'),
				mapZoom = parseInt(this_element.attr('data-zoom')),
				mapHeight = parseInt(this_element.attr('data-height'));
			this_element.height(mapHeight).gmap3({
				marker:{latLng: [mapLatitude, mapLongitude]},
				map:{options:{zoom: mapZoom, scrollwheel: false}}
			});

		});
    }
	
	// prettyPhoto
	if ($("a[data-gal^='lightbox']")[0]) {
		$("a[data-gal^='lightbox']").prettyPhoto({
			animation_speed: 'normal',
			theme: 'dark_rounded',
			autoplay_slideshow: false,
			overlay_gallery: true,
			show_title: true,
			deeplinking: false
		});
	}
	
	// Gallery Grid
	if ($(".image_grid")[0]) {
		jQuery('.image_grid').each(function(index) {
			var this_element = jQuery(this);
			var isotope = this_element.find('.image_grid_ul');
					
					jQuery(window).load(function() {
						isotope.isotope("reLayout");
						isotope.isotope({
							// options
							itemSelector : '.isotope-item',
							layoutMode : 'fitRows'
						});
					});
					
		});
	}
	
	// Teaser Grid
	if ($(".wpb_teaser_grid")[0]) {
		var layout_modes = {
            fitrows: 'fitRows',
            masonry: 'masonry'
        }
        jQuery('.wpb_grid .teaser_grid_container:not(.wpb_carousel), .wpb_filtered_grid .teaser_grid_container:not(.wpb_carousel)').each(function(){
            var $container = jQuery(this);
            var $thumbs = $container.find('.wpb_thumbnails');
            var layout_mode = $thumbs.attr('data-layout-mode');
            $thumbs.isotope({
                // options
                itemSelector : '.isotope-item',
                layoutMode : (layout_modes[layout_mode]==undefined ? 'fitRows' : layout_modes[layout_mode])
            });
            $container.find('.categories_filter a').data('isotope', $thumbs).click(function(e){
                e.preventDefault();
                var $thumbs = jQuery(this).data('isotope');
                jQuery(this).parent().parent().find('.active').removeClass('active');
                jQuery(this).parent().addClass('active');
                $thumbs.isotope({filter: jQuery(this).attr('data-filter')});
            });
			
            jQuery(window).bind('load resize', function() {
                $thumbs.isotope("reLayout");
            });
        });
	}
	
	// Teaser Grid
	if ($(".grids_wrap")[0]) {
		var layout_modes = {
            fitrows: 'fitRows',
            masonry: 'masonry'
        }
        jQuery('.grids_wrap').each(function(){
            var $container = jQuery(this);
            var $thumbs = $container.find('.grid_layout');
            var layout_mode = $thumbs.attr('data-layout-mode');
            $thumbs.isotope({
                // options
                itemSelector : '.grid_item',
                layoutMode : (layout_modes[layout_mode]==undefined ? 'fitRows' : layout_modes[layout_mode]),
				
				
            });
			
            $container.find('.categories_filter a').data('isotope', $thumbs).click(function(e){
                e.preventDefault();
                var $thumbs = jQuery(this).data('isotope');
                jQuery(this).parent().parent().find('.active').removeClass('active');
                jQuery(this).parent().addClass('active');
                $thumbs.isotope({filter: jQuery(this).attr('data-filter')});
            });
            jQuery(window).bind('load resize', function() {
                $thumbs.isotope("reLayout");
            });
        });
	}
	
	// Tipsy
	$('.toptip').tipsy({fade: true,gravity: 's'});
	$('.bottomtip').tipsy({fade: true,gravity: 'n'});
	$('.righttip').tipsy({fade: true,gravity: 'w'});
	$('.lefttip').tipsy({fade: true,gravity: 'e'});
	
	// T20 Custom
	var isDesktop = (function() {
		return !('ontouchstart' in window) // works on most browsers 
		|| !('onmsgesturechange' in window); // works on ie10
	})();
	var window_width = $(window).width();
	window.isDesktop = isDesktop;
	if( isDesktop && window_width >= 959){
		if ($(".animated")[0]) {
			jQuery('.animated').css('opacity', '0');
		}
		jQuery('.animt').each(function () {
			var $curr = jQuery(this);
			var $currOffset = $curr.attr('data-gen-offset');
			if ($currOffset === '' || $currOffset === 'undefined' || $currOffset === undefined) {
				$currOffset = 'bottom-in-view';
			}
			$curr.waypoint(function () {
				$curr.trigger('animt');
			}, {
				triggerOnce: true,
				offset: $currOffset
			});
		});
		jQuery('.animated').each(function () {
			var $curr = jQuery(this);
			$curr.bind('animt', function () {
				$curr.css('opacity', '');
				$curr.addClass($curr.data('gen'));
			});
		});
		jQuery('.animated').each(function () {
			var $curr = jQuery(this);
			var $currOffset = $curr.attr('data-gen-offset');
			if ($currOffset === '' || $currOffset === 'undefined' || $currOffset === undefined) {
				$currOffset = 'bottom-in-view';
			}
			$curr.waypoint(function () {
				$curr.trigger('animt');
			}, {
				triggerOnce: true,
				offset: $currOffset
			});
		});
	}
	// Progress Load
	if ($(".progress-bar > span")[0]) {
		$('.progress-bar > span').waypoint(function() {
			$(this).each(function() {
				$(this).animate({
					width: $(this).attr('rel') + "%"
				}, 800);
			});
		}, {
			triggerOnce: true,
			offset: 'bottom-in-view'
		});
	}
	
	// Animated Counter
	if ($(".counter .display-value")[0]) {
		$('.counter').waypoint(function() {
			$(this).find('.display-value').each(function() {
				var length = $(this).data('to');
				$(this).countTo({from: 0, to: length, speed: 1200});
			});
		}, {
			triggerOnce: true,
			offset: 'bottom-in-view'
		});
	}

	// Sticky
	if ($(".my_sticky")[0]){
		$('.my_sticky').before('<div class="Corpse_Sticky"></div>');
		$(window).scroll(function(){
			var wind_scr = $(window).scrollTop();
			var window_width = $(window).width();
			var head_w = $('.my_sticky').height();
			if (window_width >= 959) {
				if(wind_scr < 150){
					if($('.my_sticky').data('sticky') === true){
						$('.my_sticky').data('sticky', false);
						$('.my_sticky').stop(true).animate({opacity : 0}, 300, function(){
							$('.my_sticky').removeClass('sticky');
							$('.my_sticky').stop(true).animate({opacity : 1}, 300);
							$('.Corpse_Sticky').css('padding-top', '').css('border-bottom', '0').css('border-top', '0');
						});
					}
				} else {
					if($('.my_sticky').data('sticky') === false || typeof $('.my_sticky').data('sticky') === 'undefined'){
						$('.my_sticky').data('sticky', true);
						$('.my_sticky').stop(true).animate({opacity : 0},300,function(){
							$('.my_sticky').addClass('sticky');
							$('.my_sticky.sticky').stop(true).animate({opacity : 1}, 300);
							$('.Corpse_Sticky').css('padding-top', head_w + 'px').css('border-bottom', '8px solid #F5F5F5').css('border-top', '4px solid #F5F5F5');
						});
					}
				}
			}
		});
		$(window).resize(function(){
			var window_width = $(window).width();
			if (window_width <= 959) {
				if($('.my_sticky').hasClass('sticky')){
					$('.my_sticky').removeClass('sticky');
					$('.my_sticky').stop(true).animate({opacity : 0}, 300, function(){
						$('.my_sticky').removeClass('sticky');
						$('.my_sticky').stop(true).animate({opacity : 1}, 300);
						$('.Corpse_Sticky').css('padding-top', '');
					});
				}
			}
		});
	}
	
	// Landing Page
	if ($(".OneNav")[0]){
		$('body').plusAnchor({
			easing: 'easeInOutExpo',
			speed:  1000
		});
		$('.OneNav li').click(function(){
			$('.OneNav li.current').removeClass('current');
			$(this).addClass('current');
		});

		// Bind to scroll
		$(window).scroll(function(){
			var lastId,
				topMenu = $(".OneNav"),
				topMenuHeight = topMenu.outerHeight()+15,
				menuItems = topMenu.find("a"),
			scrollItems = menuItems.map(function(){
				var item = $($(this).attr("href"));
				if (item.length) { return item; }
			});
			var fromTop = $(this).scrollTop()+topMenuHeight;
			var cur = scrollItems.map(function(){
			if ($(this).offset().top < fromTop)
				return this;
			});
			// Get the id of the current element
			cur = cur[cur.length-1];
			var id = cur && cur.length ? cur[0].id : "";
		   
			if (lastId !== id) {
				lastId = id;
				// Set/remove active class
				menuItems
				.parent().removeClass("current")
				.end().filter("[href=#"+id+"]").parent().addClass("current");
			}                   
		});
	}
	
	// Woo Commerce
	$('a.add_to_cart_button').click(function(e) {
		var link = this;
		$(link).closest('.product').find('.add_to_cart_button').fadeOut();
		$(link).closest('.product').find('.cart-loading').find('i').removeClass('fa-check').addClass('fa fa-spinner fa-spin');
		$(this).closest('.product').find('.cart-loading').fadeIn();
		setTimeout(function(){
			$(link).closest('.product').find('.product_img').animate({opacity: 0.75});
			$(link).closest('.product').find('.cart-loading').find('i').hide().removeClass('fa fa-spinner fa-spin').addClass('fa-check').fadeIn();
			$(link).closest('.product').find('.add_to_cart_button').find('i').removeClass('fa-shopping-cart');
			
			setTimeout(function(){
				$(link).closest('.product').find('.cart-loading').fadeOut().closest('.product').find('.product_img').animate({opacity: 1});;
			}, 1000);
		}, 1000);
	});
	$('li.product').mouseenter(function() {
		if($(this).find('.cart-loading').find('i').hasClass('fa-check')) {
			$(this).find('.cart-loading').fadeIn();
		}
	}).mouseleave(function() {
		if($(this).find('.cart-loading').find('i').hasClass('fa-check')) {
			$(this).find('.cart-loading').fadeOut();
		}		
	});
	$('.product_image').mouseenter(function() {
		if($(this).find('.add_to_cart_button').find('i').hasClass('fa-shopping-cart')) {
			$(this).find('.add_to_cart_button').fadeIn();
		}
	}).mouseleave(function() {
		if($(this).find('.add_to_cart_button').find('i').hasClass('fa-shopping-cart')) {
			$(this).find('.add_to_cart_button').fadeOut();
		}		
	});

});