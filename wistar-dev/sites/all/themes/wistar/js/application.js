$(function() {
	var sf_options = {
		hoverClass:    'hover',
		pathClass:     'active-trail',
		delay:         200,
		animation:     {opacity:'show'},
		speed:         0,
		autoArrows:    false,
		dropShadows:   false
	};
	
	// primary and secondary nav need superfish
	$('#primary_nav').superfish(sf_options);

	$('#secondary_nav_container ul').superfish(sf_options);

	// callout 4-up 
	var img_link_context = $('.callout_header .four_up_container').not('.has_active');
	$('.image_link', img_link_context).hover(
		function(){
			$('.on', this).css('display', 'block');	
			$('.off', this).css('display', 'none');	
		},
		function(){
			$('.off', this).css('display', 'block');	
			$('.on', this).css('display', 'none');	
		}
	);

	// handle the sliding top navigation
	$('#slide_nav_tabs #find_a_scientist').click(function(e) {
		var $container = $('#slide_nav_elements');
		if ( $(this).hasClass('active') ) {
		
			$container.animate({
				marginTop: '-200px'
			}, 300);

			$container.removeClass('open');
			$(this).removeClass('active');
			$('.slide_nav_menu').hide();

		}
		else {
			e.preventDefault();
			$('.tab.active').removeClass('active');
		
			var $tab = $(this);
			var menu = '#menu_' + $tab.attr('id'); 
		
			if( !$container.hasClass('open') ) {
				$container.animate({
					marginTop: 0
				}, 300);

				$container.addClass('open');
			}
		
			$tab.addClass('active');			
			$('.slide_nav_menu').hide();
			$(menu).show();
		}

		return false;
	});

	if($('#quicktabs-1').get(0)){
		$('#quicktabs-1 > ul > li > a').unbind('click');
		apply_quicktabs_click_events('#quicktabs-1', [ '/events', '/news-and-media/press-releases' ] );
		$('#quicktabs-1 > ul > li > a').bind('click', quicktabsClick);
	}
	
	$('#wistar_wire_elements h3.with_plus').click(function ( e ) {
		//if ( /* was_plus_icon_activated */(this, e) ) {
			document.location.href='/wistar-today/wistar-wire';
		//}
	}).mousemove(
		function( e ) {
			//if (/* was_plus_icon_activated */(this, e) ) {
				$(this).css('cursor', 'pointer');
			//}
			//else {
			//	$(this).css('cursor', 'default');
			//}
		} 

	);
	
	// ensure external links open in new window
	$('a[href^="http"]').attr('target', '_blank');
	
	// share link menu
	$('.post_share li.target').hoverIntent({
		timeout: 500,
		over: function() {
			$(this).find('ul').show();
		},
		out: function() {
			$(this).find('ul').hide();
		}		
	}).find('a.anchor').click(function(e){
		return false;
	});	
	
	$('.list_filters > ul > li').hover(function(){	
		$(this).find('ul').show();
	}, function(){
		$(this).find('ul').hide();
	});	
	
	$('.gallery_container .desc').makeEqualHeight();
});

// equal height plugin - MD 2011
(function(){
	$.fn.makeEqualHeight = function(){
		var maxHeight = 0;
		this.each(function() {
			var height = parseInt($(this).outerHeight());
			if( height > maxHeight ) maxHeight = height;
		});
			
		return this.css('height', maxHeight + 'px');
	}
})(jQuery);

$(window).load(function() {
	if($('body').hasClass('front')){
		var $slide_body = $('.slide_body_container > .slide_body_elements');
	
		CAROUSEL = $('#home_masthead_carousel_elements').jCarouselLite({
			circular: true,
			visible: 1,
			scroll: 1,
			auto:7000,
			speed: 800,
			btnNext: ".next",
		    btnPrev: ".prev",
		    easing: "easeInOutQuint",
		    btnGo: ['.indic-0', '.indic-1', '.indic-2', '.indic-3'],
	   		beforeStart: function(slideNum) {
			
				CAROUSEL.nextIdx = parseInt(slideNum) - 1;
				if(CAROUSEL.nextIdx == 4) CAROUSEL.nextIdx = 0;
				if(CAROUSEL.nextIdx < 0) CAROUSEL.nextIdx = 3;

	   			CAROUSEL.nextSlide = $('.slide-' + CAROUSEL.nextIdx);   			

				var content = $('.overlay_contents', CAROUSEL.nextSlide).html();
				var $indic = $('.indic-' + CAROUSEL.nextIdx);   			

				$('a', '.indicators').removeClass('active').addClass('inactive');
				$indic.addClass('active').removeClass('inactive');
				$slide_body.stop();
				$slide_body.animate({'opacity': 0.0}, 400, 'easeInOutQuint', function() {
					$slide_body.html(content);
					$slide_body.animate({'opacity': 1.0}, 400, 'easeInOutQuint');
				});			
			
				if(CAROUSEL.inited) {
					var $active = $('.active_image', '#home_masthead_carousel_elements');			
					$active.removeClass('active_image').children('.desat').children('img').animate({'opacity': 1.0}, 800);
					CAROUSEL.nextSlide.addClass('active_image');
					CAROUSEL.nextSlide.children('.desat').children('img').animate({'opacity': 0.0}, 800);			
				}
			}		
		});
	
		CAROUSEL.go(1).inited = true;	
		$('.sliver').show();
	}
	
	$('.callout_container.set_of_3 .inner').makeEqualHeight();
	if($('#microsite_content div.left.set_of_2').get(0)){
		$('#microsite_content div.left.set_of_2 div.inner').makeEqualHeight();
	}
	
	//initProfilePageGalleryRoll
	initProfilePageGalleryRoll();
});

function initProfilePageGalleryRoll(){
	if($('body.page-user #user-profile-form').get(0)){
		//variables
		var $galleryRollCheckbox = $('#user-profile-form input.form-checkbox[value=11]');
		var $galleryCheckbox = $('#user-profile-form input.form-checkbox[value=2526]');
		//checkedboxes on page load status
		if($galleryRollCheckbox.is(':checked')){
			$galleryCheckbox.attr('checked', true);
		}else $galleryCheckbox.attr('checked', false);
		//event on galleryRoll checkbox click
		$galleryRollCheckbox.click(function(){
			if($(this).is(':checked')){
				$galleryCheckbox.attr('checked', true);
			} else $galleryCheckbox.attr('checked', false);
		});
		//event on gallery checkbox click
		$galleryCheckbox.click(function(){
			if($(this).is(':checked')){
				$galleryRollCheckbox.attr('checked', true);
			} else $galleryRollCheckbox.attr('checked', false);
		});
	}
}

// Applies special click event for when the user clicks a plus sign in the quicktab
function apply_quicktabs_click_events( quicktabs_selector, links ) {
	// Events / Press releases 
	$(quicktabs_selector.toString() + ' .quicktabs_tabs li a').click(function( e ) {
		$parent_li = $(this).parent('li');
		if ( $parent_li.hasClass('active') ) {
			//if ( /*was_plus_icon_activated*/(this, e) ) {
				// User clicked the plus sign
				var class_names = ( $parent_li ).attr('class').split(' ');
				// Match the clicked tab index with an index in our links array
				for ( j = 0; j < class_names.length; j++ ) {
					var class_name = class_names[j];
					if ( class_name.substr(0, 4) == 'qtab' ) {
						var tab_index = class_name.split('-')[1];
						if ( links[tab_index] ) {
							document.location.href=links[tab_index];
						}
					}
				}
			//}
		}
	});
}

// For use with headers and quicktabs that have the blue 'plus' icon for linking out
/*function was_plus_icon_activated( element, event ) {

	var plus_sign_width = 28;
	if ( (event.pageX - $(element).offset().left) >= ($(element).outerWidth() - plus_sign_width ) ) {
		return true;
	}

	return false;
}*/
// test

$(function() {
	var landing_page_img_link_context = $('.callout_landing_page .landing_page_container');
	$('.image_link', landing_page_img_link_context).hover(
		function(){
			$('.on', this).css('display', 'block');	
			$('.off', this).css('display', 'none');	
		},
		function(){
			$('.off', this).css('display', 'block');	
			$('.on', this).css('display', 'none');	
		}
	);
});