var $ = jQuery.noConflict();
jQuery(window).load(function(){

        var $container = jQuery('.portfolio-wrapper');
                         
		$container.isotope({layoutMode: 'fitRows'});
                            
        jQuery('.portfolio-tabs a').click(function(){
                                
        	jQuery('.portfolio-tabs li').removeClass('active');
            jQuery(this).parent('li').addClass('active');
            var selector = jQuery(this).attr('data-filter');
            $container.isotope({ filter: selector });
            return false;
                                
        });
 
        jQuery(window).resize(function() {
          	$container.isotope('reLayout');
		});	
		
});

jQuery(document).ready(function($) {
	
	$("a[rel^='prettyPhoto']").prettyPhoto();
					
	var $window = $(window),
		$fullScreenEl = $('.full-screen'),
		$body = $('body'),
		$top_bar = $('.top_nav_out'),
		$header = $('.header'),
		$pageTitle = $('.bellow_header');

	if( $body.hasClass('page-with-animation') ){	
		$(".animsition").animsition({
	  
			inClass               :   'fade-in',
			outClass              :   'fade-out',
			inDuration            :    1500,
			outDuration           :    800,
			linkElement           :   '#navigation ul li a:not([target="_blank"]):not([href^=#])',
			// e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
			loading               :    true,
			loadingParentElement  :   'body', //animsition wrapper element
			loadingClass          :   'animsition-loading',
			unSupportCss          : [ 'animation-duration',
									  '-webkit-animation-duration',
									  '-o-animation-duration'
									],
			//"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
			//The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
			
			overlay               :   false,
			
			overlayClass          :   'animsition-overlay',
			overlayParentElement  :   'body'
		});
	}
	
	
	$(function(){	
    		
			jQuery('#one_page_navigation a').click(function() {
				if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				  var target = $(this.hash);
				  var id = $(this).attr('href');
				  var header_height = jQuery('.header').outerHeight();
				  var header_height_admin = jQuery('#wpadminbar').outerHeight();
				  
				  if(header_height_admin){
					  header_height = header_height_admin + header_height;
				  }
				  
				  if(window.innerWidth < 830 )	{
					  header_height = 0;
				  }
				  
				  //alert(header_height);
				  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				  if (target.length && (id != '#home')) {
					$('html,body').animate({ scrollTop: target.offset().top - header_height }, 1000);
					return false;
				  }
				  else if(target.length && (id == '#home')) {					  
				  	$('html,body').animate({ scrollTop: 0}, 1000);
					return false;
				  }
				}
			  });
		
			if(window.innerWidth > 830 ){
				//jQuery('.mobile-parallax').removeClass('mobile-parallax');			  
			  	$.stellar({
					horizontalScrolling: false,
					verticalOffset: 150,
					responsive: true
				});
			}
			else {
				jQuery('.parallax_class').addClass('mobile-parallax');
			}
			
			$fullScreenEl.each( function(){
					var element = $(this),
						topbarHeight = $top_bar.height(),
						adminbarHeight = $('#wpadminbar').height(),
						pagetitleHeight = $pageTitle.height(),
						innerwrap = $(this).find('.inner_wrap_margins'),
						headerHeight = $header.height();
						if($header.attr('data-transparent') == 'yes') {
							headerHeight = 0;
						}
						
					scrHeight = $window.height() - (topbarHeight + adminbarHeight + headerHeight + pagetitleHeight);									
					

					if($(window).width() < 959) {
						scrHeight = 'auto';
					}
					else{
						element.css({							
							'height': scrHeight,							
						});						
						innerwrap.css({ top: ( scrHeight - innerwrap.outerHeight() ) / 2 + 'px', position: 'relative' })
					}
			});
		
		
		
			$('.clients_carousel').each(function(){
				var timeout = $(this).attr('data-timeout');
				var clientsNo = $(this).attr('data-visible-items');				
				var clientsAutoPlay = $(this).attr('data-autoplay');
				var dotsNavigation = $(this).attr('data-navigation');
				
				var display_0 = $(this).attr('data-0');
				var display_480 = $(this).attr('data-480');	
				var display_768 = $(this).attr('data-768');
				var display_992 = $(this).attr('data-992');
							
				var carouselSpeed = $(this).attr('data-speed');
				if( !carouselSpeed ) { carouselSpeed = 400}
				if( clientsAutoPlay === 'true' ) { clientsAutoPlay = true; } else { clientsAutoPlay = false; }
				if( dotsNavigation === 'yes' ) { dotsNavigation = true; } else { dotsNavigation = false; }				
				$(this).owlCarousel({
					items: parseInt(clientsNo),
					margin: 30,
					loop: true,
					nav: false,
					lazyLoad: true,
					/*navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],*/
					autoplay: clientsAutoPlay,
					autoplayTimeout: timeout,
					autoplayHoverPause: true,
					autoplaySpeed: 1000,
					dragEndSpeed: carouselSpeed,
					dotsSpeed: carouselSpeed,
					dots: dotsNavigation,
					navRewind: true,        	
					responsive:{
						0:{ items:  Number(display_0) },
						480:{ items: parseInt(display_480) },
						768:{ items: parseInt(display_768) },
						992:{ items: parseInt(display_992) },
						1200:{ items: parseInt(clientsNo) }
					}
				});
			});
					        
	});
	
	// Tabs
	//When page loads...
	$('.tabs-wrapper').each(function() {
		$(this).find(".tab_content").hide(); //Hide all content
		$(this).find("ul.tabs li:first").addClass("active").show(); //Activate first tab
		$(this).find(".tab_content:first").show(); //Show first tab content
	});
	
	//On Click Event
	$("ul.tabs li").click(function(e) {
		$(this).parents('.tabs-wrapper').find("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(this).parents('.tabs-wrapper').find(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(this).parents('.tabs-wrapper').find(activeTab).fadeIn(); //Fade in the active ID content
		
		e.preventDefault();
	});
	
	$("ul.tabs li a").click(function(e) {
		e.preventDefault();
	})		
	
	function html_video() {
		var videoEl = $('.video-bg:has(video)');
			if( videoEl.length > 0 ) {
				videoEl.each(function(){
					var element = $(this),
						elementVideo = element.find('video'),
						placeholderImg = element.attr('poster');
						outerContainerWidth = element.outerWidth(),
						outerContainerHeight = element.outerHeight(), // inaltime .video-bg
						innerVideoWidth = elementVideo.outerWidth(),
						innerVideoHeight = elementVideo.outerHeight(); //inaltime video tag
					var placeholderImg = elementVideo.attr('poster');	
					
					if( placeholderImg != '' && window.innerWidth < 830 ) {						
						element.append('<div class="video-placeholder" style="background-image: url('+ placeholderImg +');"></div>')
					}

				});
			}
	}
	html_video();
	
	function header_search() {
		/*$(document).on('click', function(event) {
			if (!$(event.target).closest('#header-search').length) { $body.toggleClass('top-search-open', false); }			
		});
		*/
		$("#header-search").click(function(e){
			$body.toggleClass('hs-open');			
			//$( '#navigation > ul > li.menu-item' ).toggleClass("show", false);
			if ($body.hasClass('hs-open')){
				$('#navigation form.header_search').find('input').focus();
			}
			e.stopPropagation();
			e.preventDefault();
		});
	}
	
	header_search();
	
	function responsive_nav() {
		 // responsive menu show	 
			 	
			 $('.responsive-menu-link').click(function() {
					 					
					var $body = $('body'),
					  $nav = $('#responsive_menu');
					if ($body.hasClass('opened-nav')) {
					  $body.removeClass('opened-nav').addClass('closed-nav');
					  $nav.slideUp(300);
					} else {
					  $body.removeClass('closed-nav').addClass('opened-nav');
					  $nav.slideDown(300);
					}
				 
			  });
			  $(window).resize(function(){
				  if(window.innerWidth > 830 ){			  
				  	$('#responsive_menu').slideUp(300);
					$('body').removeClass('opened-nav').addClass('closed-nav')
				  }
			  });
			  $('#responsive_menu .sf-sub-indicator').addClass('nav-sub-closed');
			  $('#responsive_menu .sf-sub-indicator').on('click', function(e) {		  
				var $this = $(this);
				if ($this.hasClass('nav-sub-closed')) {
				  $this.parent().siblings('ul').slideDown(450).end().end().removeClass('nav-sub-closed').addClass('nav-sub-opened');
				} else {
				  $this.parent().siblings('ul').slideUp(450).end().end().removeClass('nav-sub-opened').addClass('nav-sub-closed');
				}
				e.preventDefault();
			  });
		 
	}
	responsive_nav();
	
	function counter_cr(){
		var $counterElement = jQuery('.counter');
		if( $counterElement.length > 0 ){
			$counterElement.each(function(){
				var element = $(this);
				var counterWithComma = $(this).find('span').attr('data-comma');
				if( !counterWithComma ) { counterWithComma = false; } else { counterWithComma = true; }
					element.appear( function(){
						runCounter( element, counterWithComma );
					},{accX: 0, accY: -120},'easeInCubic');			
			});
		}
	}	

	function runCounter( counterElement,counterWithComma ){
		if( counterWithComma == true ) {
			counterElement.find('span').countTo({
				formatter: function (value, options) {
					value = value.toFixed(options.decimals);
					value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
					return value;
				}
			});
		} else {
			counterElement.find('span').countTo();
		}
	}
	
	counter_cr();
	

	// Scroll to Top
		if($(window).width() > 979) {        
			$(window).scroll(function() {
				if($(this).scrollTop() > 450) {
					$('#gotoTop').fadeIn();
				} else {
					$('#gotoTop').fadeOut();
				}
			});
			
			
			$('#gotoTop').click(function() {
				$('body,html').animate({scrollTop:0},400);
				return false;
			});
        
		}
	
		
	jQuery('.flexslider').each(function() {
        var this_element = jQuery(this);
        var sliderSpeed = 800,
            sliderTimeout = parseInt(this_element.attr('data-interval'))*1000,
            sliderFx = this_element.attr('data-flex_fx'),
            slideshow = true;
        if ( (sliderTimeout == 0) || (!sliderTimeout) ) slideshow = false;

        this_element.flexslider({
            animation: sliderFx,
            slideshow: slideshow,
            slideshowSpeed: sliderTimeout,
            sliderSpeed: sliderSpeed,
            smoothHeight: false,
			directionNav: true,
			controlNav: false

        });
    });
	
	
});

 		topSocialExpander=function(){
            
            var windowWidth = jQuery(window).width();
        
            if( windowWidth > 767 ) {
                jQuery("#style_selector").show();                
            } else {                    
	            jQuery("#style_selector").hide();
            }
        
        };
		topSocialExpander();
        
        jQuery(window).resize(function() {
            topSocialExpander();
        });

jQuery(function($){

	//region Fixed header
	var $w = $(window),
		$b = $('body'),
		classRow = 'pi-section-w',
		сlassFixedRow = 'pi-header-row-fixed',
		сlassFixedRows = 'pi-header-rows-fixed',
		сlassFixed = '',
		classReducible = 'header_reduced',
		classReduced = 'pi-row-reduced',
		$stickyHeader = $('.sticky_h'),
		$reducibleRow = $stickyHeader.find('.' + classReducible),
		rowsQuantity = $stickyHeader.find('.' + classRow).length,
		reduceTreshold = 400,
		
		stateFixed = 'default',
		stateReduce = 'default',
		headerTopOffset = 0 ,
		windowWidth = jQuery(window).width(),
		scrollTop = 0,		
				
		header_transparent = jQuery('.header').attr('data-transparent'),
		stk_mob_menu = jQuery('#responsive_navigation').attr('sticky-mobile-menu'),
		logo_height = jQuery('#branding').outerHeight(),
		header_height = jQuery('.full_header').outerHeight(),
		responsive_menu_height = jQuery('.responsive-menu-link').outerHeight(),
		top_bar_height = jQuery('.top_nav_out').outerHeight();
		original_logo = jQuery('.logo .original_logo');
		custom_logo = jQuery('.logo .custom_logo');
		custom_logo_state = jQuery('.logo').attr('data-custom-logo');
		
		$top_bar_header_height = top_bar_height + header_height;		
		
		if(!top_bar_height) { top_bar_height = 1; }

	if($stickyHeader.length){
		init();
		checkHeader();
	}


	function init(){

		scrollTop = $w.scrollTop();
		headerTopOffset += $stickyHeader.offset().top;

		сlassFixed = rowsQuantity > 1 ? сlassFixedRows : сlassFixedRow;

		$w.scroll(function(){
			scrollTop = $w.scrollTop();
			checkHeader();
		});

	}

	function checkHeader(){
		fixHeader();
		if($reducibleRow.length) {
			reduceHeader();
		}
	}

	function fixHeader(){
		if( windowWidth <= 830 && (stk_mob_menu == 'yes')) {
			if(scrollTop >= $top_bar_header_height){
				requestAnimationFrame(function(){
					jQuery('#responsive_navigation ').addClass('sticky_mobile');
					jQuery('.row , .row_full').css('padding-top', responsive_menu_height);
				});
			}
			else {
				requestAnimationFrame(function(){
					jQuery('#responsive_navigation').removeClass('sticky_mobile');
					jQuery('.row, .row_full ').css('padding-top', 0);
				});
			}
		}
		if(scrollTop >= top_bar_height){
			if(stateFixed == 'default'){
				requestAnimationFrame(function(){
					$b.addClass(сlassFixed);
					if(header_transparent === 'yes') {
						jQuery('.header').removeClass('header_transparent');
						jQuery('#navigation').removeClass('custom_menu_color');
					}
					else{
						if(windowWidth>=830){
							jQuery('.pi-header-row-fixed .full_header').css('padding-bottom', header_height);
						}
					}					
				});
				stateFixed = 'fixed';
			}
			//alert( header_bg + header_transparent + header_menu_color );
			
			if(custom_logo_state=='true'){
				custom_logo.removeClass('show_logo').addClass('hide_logo');
				original_logo.removeClass('hide_logo').addClass('show_logo');
			}
			
		} else {
			
				if(header_transparent === 'yes') {
					jQuery('.header').addClass('header_transparent');
					jQuery('#navigation').addClass('custom_menu_color');
				}
				else{
					jQuery('.pi-header-row-fixed .full_header').css('padding-bottom', '');
				}			
			if(stateFixed == 'fixed'){
				requestAnimationFrame(function(){
					$b.removeClass(сlassFixed);
					
				});
				stateFixed = 'default';
			}			
			if(custom_logo_state=='true'){
				original_logo.removeClass('show_logo').addClass('hide_logo');
				custom_logo.removeClass('hide_logo').addClass('show_logo');
			}
		}
	}

	function reduceHeader(){
		var scrollTopExcess = scrollTop - headerTopOffset;

		if (scrollTopExcess > reduceTreshold && stateReduce != 'reduced') {
			requestAnimationFrame(function(){
				$reducibleRow.addClass(classReduced);
			});
			stateReduce = 'reduced';
		} else if(scrollTopExcess <= reduceTreshold && stateReduce != 'default') {
			requestAnimationFrame(function(){
				$reducibleRow.removeClass(classReduced);
			});
			stateReduce = 'default';
		}

	}

	//endregion

});		

