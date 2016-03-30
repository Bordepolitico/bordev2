		<?php
		$boxed = false;
		$body = $transparent_logo = $container_parallax = $container_style = '';	
		if(	$data['custom_woff'] && $data['custom_ttf'] && $data['custom_svg'] && $data['custom_eot'] ){
		?>
			@font-face {
				font-family: 'CustomFont';
				src: url('<?php echo $data['custom_eot']; ?>'); /* IE9 Compat Modes */
				src: url('<?php echo $data['custom_eot']; ?>?#iefix') format('embedded-opentype'), /* IE6-IE8 */
					 url('<?php echo $data['custom_woff']; ?>') format('woff'), /* Modern Browsers */
					 url('<?php echo $data['custom_ttf']; ?>') format('truetype'), /* Safari, Android, iOS */
					 url('<?php echo $data['custom_svg']; ?>#CustomFont') format('svg'); /* Legacy iOS */	
				
			}
		<?php
		// where to use the custom font		
		$custom_body = ($data['custom_body']) ? true : false; // use on Body
		$custom_menu = ($data['custom_menu']) ? true : false; // use on Menu
		$custom_heading = ($data['custom_heading']) ? true : false; // use on Headings
		$custom_sidebar = ($data['custom_sidebar']) ? true : false; // use on Sidebar Headings
		$custom_logo = ($data['custom_logo_tagline']) ? true : false; // use on Text Logo and Tagline			
		}
		
		// logo and tagline font family
		if(!$custom_logo) {	
			if($data['logo_tagline_font'] != 'Select Font') {
				$logo_font = '"'.$data['logo_tagline_font'].'", Arial, Helvetica, sans-serif';
			}
		}
		else {
			$logo_font = "'CustomFont', Arial, Helvetica, sans-serif";
		}
		
		// body font family
		if(!$custom_body){
			if($data['google_body'] != 'Select Font') {
				$body_font = '"'.$data['body_font'].'", Arial, Helvetica, sans-serif ';
			}
		}
		else{
			$body_font = "'CustomFont', Arial, Helvetica, sans-serif";
		}
		
		// headings font family
		if(!$custom_heading){
			if($data['heading_font'] != 'Select Font') {
				$heading_font = '"'.$data['heading_font'].'", Arial, Helvetica, sans-serif ';
			}
		}
		else{
			$heading_font = "'CustomFont', Arial, Helvetica, sans-serif";
		}
		
		// sidebar font family
		if(!$custom_sidebar){
			if($data['side_heading_font'] != 'Select Font') {
				$sidebar_heading_font = '"'.$data['side_heading_font'].'", Arial, Helvetica, sans-serif ';
			}
		}
		else {
			$sidebar_heading_font = "'CustomFont', Arial, Helvetica, sans-serif";
		}
		
		// navigation font family
		if(!$custom_menu) {
			if($data['menu_font_family'] != 'Select Font') {
				$navigation_font = '"'.$data['menu_font_family'].'", Arial, Helvetica, sans-serif t';
			}
		}
		else {
			$navigation_font = "'CustomFont', Arial, Helvetica, sans-serif";
		}
		// navigation font family
		if(!$custom_top_menu) {
			if($data['tm_font_family'] != 'Select Font') {
				$tm_font = '"'.$data['tm_font_family'].'", Arial, Helvetica, sans-serif t';
			}
		}
		else {
			$tm_font = "'CustomFont', Arial, Helvetica, sans-serif";
		}
		?>
        
        body,
		.more,
		.meta .date,
		.review blockquote q,
		.review blockquote div strong,
		.footer-area  h3,
		.image .image-extras .image-extras-content h4,
		.project-content .project-info h4,
		.post-content blockquote,
        input, textarea, keygen, select, button		
		{
			font-family:<?php echo $body_font; ?>;
			font-size:<?php echo $data['font_size']; ?>px;
		}
        
        #branding h1.text, #branding .tagline {
        	font-family: <?php echo $logo_font; ?>;
        }
        
        #branding h1.text {
        	font-size: <?php echo $data['textlogo_font_size']; ?>px;
        }
		
		body, .sidebar-widget ul.twitter li i {
			color: <?php echo $data['font_color']; ?>;
			background-color: <?php echo $data['body_bg_color'] ?>
		}
		
		#navigation .has-mega-menu ul.twitter li i {
			color: <?php echo $data['font_color']; ?>;
		}
		
		h1, h2, h3, h4, h5, h6,  .content_box_title span.grey, .bellow_header_title,.qbox_title1,.content_box_title span.white,.full .title,.tab-holder .tabs li, .page-title .breadcrumb{
			font-family: <?php echo $heading_font; ?>;
		}
        h1, h2, h3, h4, h5, h6, .blogpost .post-content h1, .blogpost .post-content h2, .blogpost .post-content h3, .blogpost .post-content h4, .blogpost .post-content h5, .blogpost .post-content h6 {
        	font-weight: <?php echo $data['headings_font_weight']; ?>;
            margin-bottom: <?php echo $data['headings_margin_bottom']; ?>px;
        }
        h1, .post-content h1 {
        	font-size: <?php echo $data['h1_font_size']; ?>px;
        }
        h2, .post-content h2 {
        	font-size: <?php echo $data['h2_font_size']; ?>px;
        }
        h3, .post-content h3 {
        	font-size: <?php echo $data['h3_font_size']; ?>px;
        }
        h4, .post-content h4 {
        	font-size: <?php echo $data['h4_font_size']; ?>px;
        }
        h5, .post-content h5 {
        	font-size: <?php echo $data['h5_font_size']; ?>px;
        }
        h6, .post-content h6 {
        	font-size: <?php echo $data['h6_font_size']; ?>px;
        }
        p, .post-content p {
        	margin-bottom: <?php echo $data['paragraph_margin_bottom']; ?>px;
        }
		h3.sidebar-title {
			font-family: <?php echo $sidebar_heading_font; ?>;
			font-size: <?php echo $data['side_font_size']; ?>px;
		}
		.woocommerce h1,.woocommerce h2,.woocommerce h3,.woocommerce h4,.woocommerce h5 {
			font-family: <?php echo $body_font; ?>;
		}
		#top-menu {
        	font-family: <?php echo $tm_font; ?>;
            font-size: <?php echo $data['tm_font_size'] ?>px;
        }
        #top-menu li a {
        	color: <?php echo $data['tm_link_color'] ?>;
        }
        #top-menu li a:hover {
        	color: <?php echo $data['tm_link_color_hover'] ?>;
        }
        <?php
		if ( isset($data['footer_right_area']) && ($data['footer_right_area']!='empty') && ($data['footer_right_area'] =='footer_menu')) {
			?>
            #footer-menu li a{
				color: <?php echo $data['fm_link']; ?>;
            }
            #footer-menu li a:hover{
				color: <?php echo $data['fm_link_hover']; ?>;
            }
		<?php
		}
		?>
        .page-title h1 {
        	<?php if(get_post_meta($post->ID, 'pyre_page_title_font_size', true)=='') { ?>
        		font-size: <?php echo $data['page_title_font_size']; ?>px;
            <?php } else { ?>
            	font-size: <?php echo get_post_meta($post->ID, 'pyre_page_title_font_size', true); ?>;
            <?php } ?>
        }
        .page-title h3 {
        	<?php if(get_post_meta($post->ID, 'pyre_page_title_subhead_font_size', true)=='') { ?>
        		font-size: <?php echo $data['page_title_subheading_font_size']; ?>px;
            <?php } else { ?>
            	font-size: <?php echo get_post_meta($post->ID, 'pyre_page_title_subhead_font_size', true); ?>;
            <?php } ?>    
        }
        <?php
		if($data['tm_separator']) {
		?>
            #top-menu li:after {
                content: "<?php echo $data['tm_separator_symbol'] ?>";
                color: <?php echo $data['tm_separator_color']; ?>;
            }
        <?php
		}
		else{
		?>
        	#top-menu li:after {
            	content: "";
            }
        <?php
		}
		?>
		#navigation {
			font-family: <?php echo $navigation_font; ?>;
		}
		.tp-bannertimer {
			background-image:none !important;			
			height:7px;
		}
		.latest-posts h2, .page-title, .action_bar_inner h2{
			font-family:<?php echo $body_font; ?>;
		}
		.container {
			background-color: <?php echo $data['body_bg_color_inside']; ?>;
		}

	<?php
	//Page Title single page/post design
	
	if( get_post_meta($post->ID, 'pyre_show_title', true) == 'no' || ( $data['global_title_bread'] == 1 )) {
		?>
        .bellow_header {
        	display: none;
            height: 0px;
        }
        <?php
	}
	if( get_post_meta($post->ID, 'pyre_show_breadcrumb', true) == 'no') {
		?>
        .page-title .breadcrumb {
        	display: none;
        }
        <?php
	}
	if( get_post_meta($post->ID, 'pyre_show_page_title', true) == 'no') {
		?>
        .page-title h1 {
        	display: none;
        }
        <?php
	}
	
	if( get_post_meta($post->ID, 'pyre_page_title_align', true) == 'right') {
		?>
        .page-title {
        	text-align:right;
        }
        .breadcrumb_search_form {
        	right: auto;
            left:0;
        }
        <?php
	}
	if( get_post_meta($post->ID, 'pyre_page_title_align', true) == 'center') {
		?>
        .page-title {
        	text-align:center;
        }
        .breadcrumb_search_form {
        	position:relative;
            left: 50%;
            width: 600px;
            margin-left: -300px;
            margin-top: 15px;
        }
        .breadcrumb_search_form input[type=text] {
        	width: 100%;
            text-align: center;
        }
        <?php
	}
	if( get_post_meta($post->ID, 'pyre_show_searchbox', true) == 'no') {
		?>
        .breadcrumb_search_form {
        	display: none;
        }
        <?php
	}
	
	if( get_post_meta($post->ID, 'pyre_page_title_height', true) != '') {
		?>
        .bellow_header {
        	height: <?php echo get_post_meta($post->ID, 'pyre_page_title_height', true); ?>;
            padding:0;            
        }
        .bellow_header_title {
        	display: table;
            height: 100%;
            width: 100%;
            margin:0 auto;
        }
        .page-title {
        	display:table-cell;
            vertical-align: middle;
        }
        @media screen and (min-width: 830px) {
        	<?php
			if( get_post_meta($post->ID, 'pyre_page_title_top_padding', true) != '' ){
				?>
                .bellow_header {
                	padding-top: <?php echo get_post_meta($post->ID, 'pyre_page_title_top_padding', true);?>;
                }    
                <?php
			}
			?>
        }
        <?php
	}
	if(get_post_meta($post->ID, 'pyre_page_title_bg_color', true) != '') {
		?>
        .bellow_header {
        	background-color: <?php echo get_post_meta($post->ID, 'pyre_page_title_bg_color', true); ?> !important;
        }
        <?php
	}
	if(get_post_meta($post->ID, 'pyre_page_title_font_color', true) != '') {
		?>
        .page-title h1, .page-title h3 {
        	color: <?php echo get_post_meta($post->ID, 'pyre_page_title_font_color', true); ?>;
        }
        <?php
	}
	if( (get_post_meta($post->ID, 'pyre_breadcrumb_font_color', true) != '' ) || ( get_post_meta($post->ID, 'pyre_breadcrumb_font_size', true) != '' ) ){
		?>
        .page-title .breadcrumb a, .page-title ul li {
        	color: <?php echo get_post_meta($post->ID, 'pyre_breadcrumb_font_color', true); ?>!important;
            font-size: <?php echo get_post_meta($post->ID, 'pyre_breadcrumb_font_size', true); ?>;
            line-height:2;
        }
        <?php
	}
	
	if(get_post_meta($post->ID, 'pyre_page_title_bg_img', true) != '') {
		?>
        .bellow_header {
        	background:url("<?php echo get_post_meta($post->ID, 'pyre_page_title_bg_img', true); ?>");
            <?php 
			if(get_post_meta($post->ID, 'pyre_page_title_bg_img_full', true) == 'yes') {
				?>
            	background-size:cover;                  	
                <?php
			}
			if(get_post_meta($post->ID, 'pyre_page_title_parallax', true) == 'yes') {
			?>
            	background-size:cover;
                background-attachment:fixed;
            <?php
			}
			?>
        }
        <?php
		if(get_post_meta($post->ID, 'pyre_page_title_mask', true) !='' ) {
			if( get_post_meta($post->ID, 'pyre_page_title_mask_transparency', true) != '' ) {
				$mask_transp = explode("%", get_post_meta($post->ID, 'pyre_page_title_mask_transparency', true));
				$mask_transp = 1 - ($mask_transp[0] / 100);
			}
			else {
				$mask_transp = 0.5;
			}
			$pt_rgba = hex2rgba( get_post_meta($post->ID, 'pyre_page_title_mask', true) );
			?>
            .pt_mask {
            	height: 100%;
                background-color: rgba(<?php echo $pt_rgba[0] . ',' . $pt_rgba[1] . ',' . $pt_rgba[2]; ?>, <?php echo $mask_transp; ?>);	
            }
            <?php
		}
	}

	if(!$data['use_custom']){ 
		$primary_color = $data['primary_color'];
		$second_link_color = $data['second_link_color'];
		$pb_hover_color = $data['pb_hover_color'];
		$shortcode_color = $data['shortcode_color'];
		$button_text_color = $data['button_text_color'];
		$button_text_shadow_color = $data['button_text_shadow_color'];
		$button_gradient_top_color = $data['button_gradient_top_color'];
		$button_gradient_bottom_color = $data['button_gradient_bottom_color'];
		$button_border_color = $data['button_border_color'];
		$footer_link_color = $data['footer_widget_link_color'];
	}
	else{
		$primary_color = $data['custom_primary_color'];
		$second_link_color = $data['custom_second_link_color'];
		$pb_hover_color = $data['custom_pb_hover_color'];
		$shortcode_color = $data['custom_shortcode_color'];
		$button_text_color = $data['custom_button_text_color'];
		$button_text_shadow_color = $data['custom_button_text_shadow_color'];
		$button_gradient_top_color = $data['custom_button_gradient_top_color'];
		$button_gradient_bottom_color = $data['custom_button_gradient_bottom_color'];
		$button_border_color = $data['custom_button_border_color'];
		$footer_link_color = $data['custom_footer_widget_link_color'];		
	}
	?>
		a,.front_widget a, .vc_front_widget a, h5.toggle a.default_color,.portfolio-navigation a:hover,h2.page404,.project-feed .title a,.post_meta li a:hover, .portfolio-item .portfolio_details a, .product_feature .pf_content a.more_info:hover, a.woocommerce_orders:hover  {
			color:<?php echo $primary_color ; ?>;
		}
		#navigation .has-mega-menu ul.twitter li a, #navigation .has-mega-menu .contact ul li a, #navigation .has-mega-menu .latest-posts a {
			color:<?php echo $primary_color ; ?> !important;
			
		}
		a:hover, .col h3 a:hover,.col h4 a:hover, h5.toggle a.default_color:hover, .portfolio-item .portfolio_details a:hover, .product_feature .pf_content a.more_info, a.woocommerce_orders, .product .star-rating:before, .cart-collaterals .cart_totals table tr.order-total td, .woocommerce table.shop_table tfoot tr.order-total td {
			color: <?php echo $data['primary_color_hover']; ?>;
		}
		#navigation .has-mega-menu ul.twitter li a:hover, #navigation .has-mega-menu .contact ul li a:hover, #navigation .has-mega-menu .latest-posts a:hover {
			color: <?php echo $data['primary_color_hover']; ?> !important;
			background-color:transparent;
		}
		
		.post-gallery-item a:hover img, .recent-portfolio a:hover img, .recent-flickr a:hover img{
			border-color:<?php $primary_color ; ?>; 
		}
		.default_dc{
			color:<?php echo $primary_color ; ?>;
		}
		
		/* Menu Style */
		
		
		 
		
		/* Call to Action styling */
		/*
		.default_border{
			border-color:<?php echo $data['action_border']; ?>;
		}
		.default_border:hover{
			border-color: <?php echo $data['action_border_hover']; ?>;
		}
		*/	
		
		.reading-box.default_border {
			background-color: <?php echo $data['action_bg']; ?>;
			color: <?php echo $data['action_text_color']; ?>;
		}
		.reading-box.default_border:hover {
			background-color: <?php echo $data['action_bg_hover']; ?>;
			color: <?php echo $data['action_text_color_hover']; ?>;
		}
		.reading-box.default_border .button {
			border-color: <?php echo $data['action_text_color']; ?>;
			color: <?php echo $data['action_text_color']; ?>;
		}
		.reading-box.default_border:hover .button {
			border-color: <?php echo $data['action_text_color_hover']; ?>;
			color: <?php echo $data['action_text_color_hover']; ?>;
		}
		
	<?php
	if($pb_hover_color): ?>
		.gallery_zoom{
			background-color: <?php echo $pb_hover_color; ?>;
		}
	<?php
	endif;
	?>
	
		.vc_front_widget {
			background-color: <?php echo $data['featured_serv_bg']; ?>;
		}
		.vc_front_widget a{
			color: <?php echo $data['featured_serv_link']; ?>;
		}
		.vc_front_widget:hover {
			background-color: <?php echo $data['featured_serv_bg_hover']; ?>;
			color:#fff;
		}
		.vc_front_widget:hover a{
			color:#fff;
		}
	
	<?php
	
	if($shortcode_color): ?>
		.progress-bar-content,.ch-info-back4,.ch-info-back3,.ch-info-back2,.ch-info-back1,.col:hover .bottom,.tp-bannertimer,.review_inside:after, .flex-direction-nav a, figure.effect-zoe figcaption {
			background-color:<?php echo $shortcode_color; ?>;
		}
		.front_widget:hover, .front_widget:hover a, .portfolio-tabs a:hover, .portfolio-tabs li.active a{
			color:#fff; background-color:<?php echo $shortcode_color; ?>;
		}
		._border:hover, .review blockquote q, .pagination a.inactive, .recent-flickr a:hover img{
			border-color:<?php echo $shortcode_color; ?>;
		}
		.review blockquote div {
			color:<?php echo $shortcode_color; ?>;
		}
		.pagination .current, .pagination a.inactive:hover {
			background-color:<?php echo $shortcode_color; ?>; 
			border-color:<?php echo $shortcode_color; ?>;
		}

		.project-feed .info, figure a .text-overlay {
			<?php
			$bg = hex2rgba($shortcode_color)
			?>
			background: rgba(0,0,0,0.70);
		}
		.recent_posts_container figure a .text-overlay .info i, .project-feed a i, .blogpost figure a .text-overlay i {
			background-color: <?php echo $shortcode_color; ?>;
			color: #fff;
		}
	<?php
	endif;

	if($button_gradient_top_color && $button_gradient_bottom_color && $button_border_color): ?>
		.border_default{
			border: 1px solid <?php echo $button_border_color; ?>;
		}		
		
	<?php
	endif;
	?>
	.button_default, .button, .tp-caption a.button {					
		background-color: <?php echo $data['button_background_color']; ?>;
		border-color: <?php echo $data['button_border_color']; ?>;
		color: <?php echo $data['button_text_color']; ?>;		
	}
	
	
	.button_default:hover, .button:hover, .tp-caption a.button:hover{
		background-color: <?php echo $data['button_background_color_hover']; ?>;
		border-color: <?php echo $data['button_border_color_hover']; ?>;
		color: <?php echo $data['button_text_color_hover']; ?>;	
	}
	<?php
	if($footer_link_color): ?>
		.footer_widget_content a, .footer_widget_content ul.twitter li span a, ul.twitter li i{
			color:<?php echo $footer_link_color; ?> ;			
		}

	<?php
	endif;
	
	if($data['site_width']=='Boxed'){
		$bg = $data['boxed_bg'];
		$boxed='true';
		?>
			body{
				background-image: url(<?php echo $data['boxed_bg'];?>);
				background-repeat: <?php echo $data['bg_repeat'];?> ;
				background-position: top center;
				background-attachment: <?php echo $data['bg_attachment'];?>;				
				
				<?php if($data['bg_fullscreen']): ?>
					-webkit-background-size: cover;
					-moz-background-size: cover;
					-o-background-size: cover;
					background-size: cover;
				<?php endif; ?>
				
				<?php
				if($data['enable_pattern']){					
				?>
					background-image: url("<?php echo $data['pattern']; ?>");
					background-repeat: repeat;
					background-attachment: fixed;
				<?php
				}
					
				?>
			
			<?php 
			if(get_post_meta($post->ID, 'pyre_background', true) || get_post_meta($post->ID,'pyre_bg_color', true)): ?>
				background:url(<?php echo get_post_meta($post->ID, 'pyre_background', true); ?>);
				background-color: <?php echo get_post_meta($post->ID, 'pyre_bg_color', true); ?>;
				background-repeat: <?php echo get_post_meta($post->ID, 'pyre_bg_repeat', true); ?>;
				background-position: <?php echo get_post_meta($post->ID, 'pyre_bg_position', true); ?>;
				background-attachment: <?php echo get_post_meta($post->ID, 'pyre_bg_attach', true); ?>;				
			<?php 
			endif; 
			?>
			}
			.container{				
				max-width:980px;	
				margin:<?php echo $data['margin_all']; ?>px auto;
				padding:<?php echo $data['padding_out']; ?>px;
				border:<?php echo $data['outer_border']; ?>px <?php echo $data['outer_border_type']; ?> <?php echo $data['outer_border_color']; ?>;
				<?php
				if($data['outer_shadow']){
				?>
				box-shadow: 0 0 10px rgba(0,0,0,0.3);
				-moz-box-shadow: 0 0 10px rgba(0,0,0,0.3);
				-webkit-box-shadow: 0 0 10px rgba(0,0,0,0.3);	
				<?php
				}
				?>
			}
			.pi-header-row-fixed .sticky_h {
				max-width:980px;
				margin:0 auto;
			}
		<?php
		if($data['boxed_width'] == '1160px') {
			?>
            .container {
            	width: auto; 
                max-width:1180px; 
            }
            .content-layer {
            	padding:0px;
             }
            .inside_content {
            	width:100%;
            } 
            .blogpost_small_pic { 
            	width:50%
            } 
            .blogpost_small_desc {
            	width:47%;
            } 
            .inner, .row, .front_page_in,.footer_widget_inside,.footer .inner, .top_nav, .bellow_header_title, .inner_wrap,.qbox, .action_bar_inner, .reviews .flexslider, #footer_widget_inside, .flexslider { 
            	max-width:1140px;
            } 
            .pi-header-row-fixed .sticky_h { 
            	width:1180px; margin:0 auto; max-width: none;
            } 
            .row_full { 
            	max-width:1180px; overflow:hidden; 
            } .fullscreen { 
            	width:1180px; 
            } 
            .grid.fullscreen figure.cols-5{ 
            	width:236px;
            }
            <?php
		}
			
	}
	if( ( $data['site_width']=='Extra Wide') ||  ($data['site_width']=='Wide') ){
	?>
    	.container {
    			background-image: url(<?php echo $data['boxed_bg'];?>);
				background-repeat: <?php echo $data['bg_repeat'];?> ;
				background-position: top center;
				background-attachment: <?php echo $data['bg_attachment'];?>;				
				
				<?php if($data['bg_fullscreen']): ?>
					-webkit-background-size: cover;
					-moz-background-size: cover;
					-o-background-size: cover;
					background-size: cover;
				<?php endif; ?>
				
				<?php
				if($data['enable_pattern']){					
				?>
					background-image: url("<?php echo $data['pattern']; ?>");
					background-repeat: repeat;
					background-attachment: fixed;
				<?php
				}
					
				?>
			
			<?php 
			if(get_post_meta($post->ID, 'pyre_background', true) || get_post_meta($post->ID,'pyre_bg_color', true)): ?>
				background:url(<?php echo get_post_meta($post->ID, 'pyre_background', true); ?>);
				background-color: <?php echo get_post_meta($post->ID, 'pyre_bg_color', true); ?>;
				background-repeat: <?php echo get_post_meta($post->ID, 'pyre_bg_repeat', true); ?>;
				background-position: <?php echo get_post_meta($post->ID, 'pyre_bg_position', true); ?>;
				background-attachment: <?php echo get_post_meta($post->ID, 'pyre_bg_attach', true); ?>;				
			<?php 
			endif; 
			?>
        }
    <?php	
	}
	if($data['site_width']=='Extra Wide'){		

	?>
    	
		.inner, .row, .front_page_in,.footer_widget_inside,.footer .inner, .top_nav, .bellow_header_title, .inner_wrap,.qbox, .action_bar_inner, .reviews .flexslider, #footer_widget_inside, .flexslider, .reading-box .cta_inside {
			max-width:1140px;
		}
		.second_navi_inner {
			width: 1140px;
		}

		.qbox_title1{
			width:34%;
		}
		.portfolio-four .portfolio-item{
			margin:4px;
		}
		
		.col{
			/*width:19%;*/
			max-width:none;
		}
		.blogpost_small_pic{ width:39.5%}.blogpost_small_desc{width:57%;}
		
		.grid figure.cols-4 {
			width: 271px;
		}
		.grid figure.cols-3 {
			width: 360px;
		}
		.grid figure.cols-2 {
			width: 550px;
		}
		
		.portfolio-three .portfolio-item {
			width:358px;
		}
		.portfolio-3 {
			width: 358px;
			height: 255px;
		}
		
		.portfolio-two .portfolio-item {
			width: 550px;
		}
		.portfolio-2 {
			width: 550px;
			height: 353px;
		}
		
		.ch-info .ch-info-back3 {
			-webkit-transform: translate3d(0,0,-358px) rotate3d(1,0,0,90deg);
			-moz-transform: translate3d(0,0,-358px) rotate3d(1,0,0,90deg);
			-o-transform: translate3d(0,0,-358px) rotate3d(1,0,0,90deg);
			-ms-transform: translate3d(0,0,-358px) rotate3d(1,0,0,90deg);
			transform: translate3d(0,0,-358px) rotate3d(1,0,0,90deg);
			opacity: 0;
		}
		.ch-item:hover .ch-info-front3 {
			-webkit-transform: translate3d(0,358px,0) rotate3d(1,0,0,-90deg);
			-moz-transform: translate3d(0,358px,0) rotate3d(1,0,0,-90deg);
			-o-transform: translate3d(0,358px,0) rotate3d(1,0,0,-90deg);
			-ms-transform: translate3d(0,358px,0) rotate3d(1,0,0,-90deg);
			transform: translate3d(0,358px,0) rotate3d(1,0,0,-90deg);
			opacity: 0;
		}
		.ch-info .ch-info-back2 {
			-webkit-transform: translate3d(0,0,-550px) rotate3d(1,0,0,90deg);
			-moz-transform: translate3d(0,0,-550px) rotate3d(1,0,0,90deg);
			-o-transform: translate3d(0,0,-550px) rotate3d(1,0,0,90deg);
			-ms-transform: translate3d(0,0,-550px) rotate3d(1,0,0,90deg);
			transform: translate3d(0,0,-550px) rotate3d(1,0,0,90deg);
			opacity: 0;
		}
		.ch-item:hover .ch-info-front2 {
			-webkit-transform: translate3d(0,550px,0) rotate3d(1,0,0,-90deg);
			-moz-transform: translate3d(0,550px,0) rotate3d(1,0,0,-90deg);
			-o-transform: translate3d(0,550px,0) rotate3d(1,0,0,-90deg);
			-ms-transform: translate3d(0,550px,0) rotate3d(1,0,0,-90deg);
			transform: translate3d(0,550px,0) rotate3d(1,0,0,-90deg);
			opacity: 0;
		}
	<?php
	}
	?>
	.header{
		margin-bottom: <?php echo $data['header_bottom_margin']; ?>px;
		margin-top: <?php echo $data['header_top_margin']; ?>px;
		padding-bottom: <?php echo $data['header_bottom_padding']; ?>px;
		padding-top: <?php echo $data['header_top_padding']; ?>px;
		
	
		<?php
		if($data['en_header_pattern']){
			$head_pattern = $data['header_patterns'];
		?>		
			background-image:url("<?php echo $head_pattern; ?>");		
		<?php
		}
		else{
		?>		
			background-color:<?php echo $data['header_bg_color']; ?>;	
            <?php 
			if(get_post_meta($post->ID, 'pyre_header_transparency', true) !='') { 
				$transparency = explode("%", get_post_meta($post->ID, 'pyre_header_transparency', true));
				$transparency = 1 - ($transparency[0] / 100);
				$hc_rgba = hex2rgba($data['header_bg_color']);
			?>
            	background-color: rgba(<?php echo $hc_rgba[0] . ',' . $hc_rgba[1] . ',' . $hc_rgba[2]; ?>, <?php echo $transparency; ?>);	
            <?php 
			} 
			?>
		<?php
		}
		if($data['header_bg_image']){			
		?>		
			background:url("<?php echo $data['header_bg_image']; ?>") <?php echo $data['header_bg_repeat']; ?>;		
		<?php
		}
		if($data['header_bottom_shadow'] == '0'){	
			?>
			box-shadow: none;
			-webkit-box-shadow: none;
			<?php
		}

		?>
	}

	<?php
	$header_width = (get_post_meta($post->ID, 'pyre_header_width', true) != NULL) ? get_post_meta($post->ID, 'pyre_header_width', true) : $data['header_width'] ;
	if( $header_width == 'default' ) {
		$header_width = $data['header_width'];
	}
	if($header_width=='expanded') {
		?>
        .header .inner {
        	max-width:100%;
            padding-left:20px;
            
        }
        .top_nav {
        	max-width: 100%;
        }
        #navigation ul li:nth-last-of-type(3) ul {
        	right:0;
        }
        #navigation li.has-mega-menu > ul.sub-menu {
        	width:98%;
        	left:1%;
        }
        #top-menu li:last-child a.button {
            margin-right: 15px;
        }
        <?php
	}
	if($data['enable_sticky']) {
		//if sticky header, let's determine the opacity and bg color		
		$opacity = ($data['sticky_header_opacity']) ? $data['sticky_header_opacity'] : '100';
		
		$sticky_header_bg = hex2rgba($data['header_bg_color']);
		$sticky_header_opacity = $opacity/100;
		?>
		.pi-header-row-fixed .header {
			background-color: rgba(<?php echo $sticky_header_bg[0] . ',' . $sticky_header_bg[1] . ',' . $sticky_header_bg[2]; ?>, <?php echo $sticky_header_opacity; ?>);
		}
		@media screen and (max-width: 830px) {
			.pi-header-row-fixed .header {
				background-color: <?php echo $data['header_bg_color']; ?>;
			}
			
		}
		<?php
	}	
	
	if($data['header_position'] == 'left') {
		?>
        .container {
        	margin-left: 260px;
        }
        <?php
	}
	
	if($data['sidebar_pos'] == 'left') { ?>
			.post_container{
				float:right;
			}
			.sidebar{
				float:left;
			}
	<?php 
	}	
			
	if( get_post_meta($post->ID, 'pyre_en_header', true) == 'no' ) {
		?>
        .full_header {
        	display:none;
        }
        #responsive_navigation {
        	display: none;
        }
        <?php
	}
		
	?>
	.main-navigation {
		float:right;
	}

	#navigation {
		font-size: <?php echo $data['menu_font_size']; ?>px;
	}
	
	<?php
	if(!$data['submenu_indicator']) {
	?>
		.sf-sub-indicator {
			display: none;
		}
	<?php
	}
	
	if($data['force_uppercase']) {
	?>
		#navigation ul {
			text-transform: uppercase;
		}
	<?php
	}
	if($data['menu_color']){
	?>
		#navigation ul li a {
			color:<?php echo $data['menu_color']; ?>;
		}
	<?php
	}
	if($data['menu_color_hover']){
	?>
		#navigation > ul > li > a:hover, #navigation > ul li:hover > a, #navigation ul li li:hover > a, #navigation > ul > li.current-menu-item > a, #navigation > ul > li.current-menu-parent > a, #navigation > ul > li.current-menu-parent > ul > li.current-menu-item > a, #navigation ul li.current-menu-ancestor a {
			color:<?php echo $data['menu_color_hover']; ?> ;
		}
	<?php
	}
	if($data['submenu_border_color']) {
		?>
        #navigation li.has-mega-menu > ul.sub-menu, #navigation ul ul {
        	border-color: <?php echo $data['submenu_border_color']; ?>
        }
        <?php
	}
	else{
		?>
        #navigation li.has-mega-menu > ul.sub-menu, #navigation ul ul {
        	border-top: none;
        }
        <?php
	}
	$menu_bg_color_hover = ($data['menu_color_bg_hover']) ? $data['menu_color_bg_hover'] : 'transparent';
	?>
	#navigation > ul > li > a {
		font-weight: <?php echo $data['menu_font_weight']; ?>;
	}
	#navigation > ul > li > a:hover, #navigation > ul li:hover > a, #navigation ul li.current-menu-parent a, #navigation ul li.current-menu-ancestor a,#navigation > ul > li.current-menu-item > a {
		background-color: <?php echo $menu_bg_color_hover; ?>;
	}
	
	#navigation ul.sub-menu li > a, #navigation.custom_menu_color ul.sub-menu li > a {
		color: <?php echo $data['submenu_color']; ?> ;
		background-color:<?php echo $data['submenu_bg_color']; ?>; 
	}
	
	#navigation ul.sub-menu li > a:hover, #navigation ul.sub-menu > li:hover > a {
		color: <?php echo $data['submenu_color_hover']; ?> ;
		background-color:<?php echo $data['submenu_bg_color_hover']; ?>;
	}
	#navigation > ul > li.current-menu-parent > ul > li.current-menu-item > a {
		color: <?php echo $data['submenu_color_hover']; ?> ;
	}
	#navigation > ul > li.current-menu-parent > ul > li.current-menu-item > a {
		background-color: <?php echo $data['submenu_bg_color_hover']; ?>;
	}

	#navigation ul ul, #navigation ul ul li {
		background-color:<?php echo $data['submenu_bg_color']; ?>;
	}
	
	#navigation ul.sub-menu li {
		border-bottom-color: <?php echo $data['submenu_separator']; ?>;
	}
	
	<?php
	if($data['header_style'] == "style2" ){
	?>		
		#navigation{
			float: none;
			margin-top:0;
			position:relative;
		}
		#navigation ul, #navigation ul li {
			float: none;
		}
		#navigation ul li {
			display: inline-block;
			line-height:50px;
			height: 50px;
		}
		.second_navi {
			background-color: <?php echo $data['menu_bg_color_full']; ?>;
			border-color: <?php echo $data['menu_border_color']; ?>;
		}
		.header {
			box-shadow:none;
			-webkit-box-shadow:none;			
		}
		.full_header{
			box-shadow: 0 1px 15px rgba(0, 0, 0, 0.1);
			-webkit-box-shadow: 0 1px 15px rgba(0, 0, 0, 0.1);
		}

	<?php
	}
	else {
		?>
		body:not(.hs-open) #branding {
			opacity: 1;
			-webkit-transition: opacity .3s ease-in-out;
			-o-transition: opacity .3s ease-in-out;
			transition: opacity .3s ease-in-out;
		}
		body.hs-open #branding {
			opacity: 0;
		}
		<?php
	}
	?>
	
	<?php
	if($data['header_el_pos'] == "center") {
		?>
		body.hs-open #branding {
			opacity: 1;
		}
		#branding, #navigation, #navigation ul, #navigation ul li {
			float: none;
		}
		#branding .logo a img {
			margin:0 auto;
		}		
		#navigation {
			margin-top:0;
			position:relative;
		}
		#navigation ul {
			text-align:center;
		}
		#navigation ul li ul {
			text-align:left;
		}		
		#navigation ul li {
			display:inline-block;
			line-height:50px;
			height:50px;
		}
		#navigation ul li ul li {
			display: inherit;
		}
		
		#branding, #navigation ul {
			text-align:center;
		}
		.banner{
			float: none;
			padding-bottom:20px;
			text-align:center;
		}
		.responsive-menu-link {
			position:relative;
			padding-bottom:20px;
		}
		
		<?php
	}
	if($data['header_search_icon']) {
		?>
		#navigation ul li.header_search_li {
			
		}
		@media screen and (min-width: 831px){
			#navigation ul li.responsive-item {
				display:none;
			}
		}
		<?php
	}
	else {
		?>
		#navigation ul li.header_search_li, #navigation ul li.responsive-item {
			display: none;
		}
        @media screen and (max-width: 830px) {
        	.responsive-item {
            	display: none !important;
            }
        }
		<?php
	}
	?>
	
	
	#navigation .has-mega-menu .megamenu-title, #navigation .has-mega-menu .megamenu-title a {
		color: <?php echo $data['mm_column_title'] ?>;
		font-size: <?php echo $data['mm_column_title_font_size']; ?>px;
		font-weight: <?php echo $data['mm_column_title_font_weight']; ?>;
	}
	#navigation .has-mega-menu .megamenu-title a:hover {
		color: <?php echo $data['mm_column_title_hover'] ?>;
	}
	#navigation .has-mega-menu ul.sub-menu li > a{
		color: <?php echo $data['mm_links_color'] ?>;
		background-color: transparent;
	}
	#navigation .has-mega-menu ul.sub-menu li > a:hover{
		color: <?php echo $data['mm_links_color_hover'] ?>;
	}
	
	.footer {	
		<?php 
		if($data['en_footer_copy_pattern'] && !$data['footer_copyright_bg'] ) { ?>
			background: url("<?php echo $data['footer_copy_patterns']; ?>") repeat;
		<?php 
		} 
		if($data['footer_copyright_bg']) {
		?>
			background: url("<?php echo $data['footer_copyright_bg'] ?>") <?php echo $data['footer_copyright_bg_repeat']; ?>;	
		<?php
		}
		?>
			background-color: <?php echo $data['footer_copy_bg_color']; ?>;	
            
        <?php 
		if( get_post_meta($post->ID, 'pyre_en_footer', true) == 'no' ) {
			?>
            display: none;
            <?php
		}
		?>			
	}
	.footer_widget {
		<?php if($data['en_footer_pattern']) {  ?>
			background: url("<?php echo $data['footer_patterns'];?>") repeat;
		<?php } ?>
			background-color: <?php echo $data['footer_bg_color']; ?>;
			border-top-color: <?php echo $data['footer_widgets_tb_color']; ?>;
			border-bottom-color: <?php echo $data['footer_widgets_bb_color']; ?>;
        <?php 
		if( get_post_meta($post->ID, 'pyre_en_widgets', true) == 'no' ) {
			?>
            display: none;
            <?php
		}
		?>	    
	}
	h3.footer-widget-title {
		color: <?php echo $data['footer_heading_color']; ?>;
        font-size: <?php echo $data['footer_side_font_size']; ?>px;
	}
	.recent-flickr a img {
		border-color: <?php echo $data['footer_flickr_bcolor']; ?>;
	}
	.footer_widget_content {
		color: <?php echo $data['footer_widget_text_color']; ?>;
	}
	.copyright {
		color: <?php echo $data['footer_text_color']; ?>;	
	}
	.footer .copyright a {
		color: <?php echo $data['footer_link_color']; ?>;
	}
	.footer .copyright a:hover {
		color: <?php echo $data['footer_link_color_hover']; ?>;
	}
	
	<?php
	if($data['en_footer_center']){
	?>
		.copyright, .footer_branding, .connect {
			float: none;
			text-align: center;
		}
		.connect {
			width:auto;
		}
		.connect li {
			float:none;
			display:inline-block;
		}
		.footer .top_social{
			width: 100%;
			text-align:center;
			margin-bottom:10px;
		}
		.footer .top_social a {
			float: none;
			display: inline-block;
			margin-bottom:10px;
		}
        .footer_navigation{
        	float: none;
        }
        #footer-menu {
        	text-align:center;
        }
	<?php
	}
	?>
	
	<?php if($data['en_back_top']){ ?>
		#gotoTop {
			background-color: <?php echo $data['back_top_bg']; ?>;
		}
		#gotoTop:hover {
			background-color: <?php echo $data['back_top_bg_hover']; ?>;
		}
	<?php } ?>
	
	.bellow_header{
		background-color:<?php echo $data['tb_bg_color']; ?>;
	}
	.bellow_header_title, .page-title .breadcrumb, .page-title .breadcrumb a {
		color: <?php echo $data['tb_title_color']; ?>;
	}
	
	<?php
	
	if($data['logo_resize']){
		?>
		#branding img {
			max-width: 270px;; ?>
		}
		<?php
	}
	?>
	#branding .logo {
		padding-top:<?php echo $data['logo_padding_top']; ?>px;
		padding-bottom:<?php echo $data['logo_padding_bottom']; ?>px;
	}
	<?php
	
	if(!$data['logo']) {
		?>

		#branding h1.text a {
			color: <?php echo $data['text_logo_color']; ?>;
		}
		#branding h1.text a:hover {
			color: <?php echo $data['text_logo_color_hover']; ?>;
		}
		#branding .tagline {
			color: <?php echo $data['tagline_color']; ?>;
			font-size: <?php echo $data['tagline_font_size']; ?>px;  
		}
		<?php
	}
	
	if(!$data['white_circle']) {
		?>
		.shortcode_img {
			background-color: transparent;
			border-radius:0;
			width:100%;
			height:auto;
			margin-top:30px;
		}
		<?php
	}
	else{
		?>
		.shortcode_img img{
			max-width: 32px;
			height:auto;
			position: relative;
			top: 50%;
			margin-top: -16px;
		}
		<?php
	}
	
	if($data['en_top_bar']) {
		?>
		.top_nav_out {
			background-color: <?php echo $data['top_bar_bg']; ?>;
			border-color: <?php echo $data['top_bar_border'] ?>;
		}
		.top_social a {
			opacity: <?php echo ($data['social_icons_opacity']/100); ?>;
			filter: alpha(opacity=<?php echo ($data['social_icons_opacity']/100); ?>);	
			color: <?php echo $data['top_bar_social_color']; ?>;		
		}
		.top_contact .contact_email span.email, .top_contact .contact_phone span.phone {
			opacity: <?php echo ($data['social_icons_opacity']/100); ?>;
			filter: alpha(opacity=<?php echo ($data['social_icons_opacity']/100); ?>);
		}
		.top_contact a{
			color:  <?php echo $data['contact_link']; ?>;
			border-color: <?php echo $data['top_bar_separator']; ?>;
		}
		.top_contact a:hover {
			color:  <?php echo $data['contact_link_hover']; ?>;
		}
		.top_contact {
			color: <?php echo $data['contact_text']; ?>;
		}
		<?php
	}
	?>
	
	.single_post_tags a, .single_post_tags a:hover, .woocommerce-pagination ul li span.current, .woocommerce .quantity .minus:hover, .woocommerce .quantity .plus:hover {
		background-color: <?php echo $shortcode_color ?>;
		border-color: <?php echo $shortcode_color ?>;
	}
	.woocommerce-pagination ul li {
		border-color: <?php echo $shortcode_color ?>;
	}
	.author_box:after, .woocommerce-pagination ul li a:hover, .product .shortcode-tabs .tab-hold .tabs li.active a:after {
		background-color: <?php echo $shortcode_color ?>;
	}
	
	.footer .top_social a {
		color: <?php echo $data['footer_social_icons']; ?>;
	}
	
	<?php
	if($data['en_cta']) {
	?>
		.action_bar {
			background-color: <?php echo $data['cta_bg']; ?>;
			color: <?php echo $data['cta_text']; ?>;
		}
		.action_bar:hover {
			background-color: <?php echo $data['cta_bg_hover']; ?>;
			color: <?php echo $data['cta_text_hover']; ?>;
		}	
		
		
		.action_bar_inner .button_default{					
			background-color: <?php echo $data['cta_button_background_color']; ?>;
			border-color: <?php echo $data['cta_button_border_color']; ?>;
			color: <?php echo $data['cta_button_text_color']; ?>;		
		}
		
		.action_bar_inner .button_default:hover{
			background-color: <?php echo $data['cta_button_background_color_hover']; ?>;
			border-color: <?php echo $data['cta_button_border_color_hover']; ?>;
			color: <?php echo $data['cta_button_text_color_hover']; ?>;	
		}
		<?php		
		
	}
	?>	
	
	.image_prod .badge, .product .badge {
		background-color: <?php echo $data['shortcode_color']; ?>;
	}
	.product_price, .product .summary .price {
		color: <?php echo $data['primary_color_hover']; ?>;
	}
	
	<?php 
	if( get_post_meta($post->ID, 'pyre_transparent_header', true) == 'yes' ) {
		$transparent_class = 'header_transparent';

		?>
		.header_transparent {
        	<?php if( get_post_meta($post->ID, 'pyre_header_transparency', true=='') || !get_post_meta($post->ID, 'pyre_header_transparency', true=='')) { ?>
				background-color: transparent;
            <?php } ?>
			position: absolute;
			width: 100%;
			box-shadow: none;
			-webkit-box-shadow: none;
		}
		.pi-header-row-fixed .full_header {
			padding-bottom:0;
		}
		@media screen and (max-width: 830px) {
			.header_transparent {
				background-color:<?php echo $data['header_bg_color']; ?>;
			}
		}
		<?php
	}
	if( ( get_post_meta($post->ID, 'pyre_transparent_header', true) == 'yes' ) && ( get_post_meta($post->ID, 'pyre_transparent_header_color', true) != '' ) ) {
		$menu_extra_class = ' custom_menu_color';
		?>
		#navigation.custom_menu_color ul li a {
			color: <?php echo get_post_meta($post->ID, 'pyre_transparent_header_color', true); ?>;
		}
		<?php
	}
	?>
    
    .post-content blockquote {
    	border-color: <?php echo $shortcode_color;?>;
    }

<?php
	if($data['creativo_custom_css']) {
	?>    	
			<?php	
			echo $data['creativo_custom_css'];
			?>
        <?php
	}
?>
