<?php
// Translation
load_theme_textdomain('Creativo', get_template_directory() . '/languages');

require_once (get_template_directory().'/admin/index.php');

require_once(get_template_directory() . "/functions/megamenu/wp-nav-custom-walker.php");

if (is_admin()) {
	include_once (get_template_directory().'/functions/megamenu/mega-menu.php');
	include_once (get_template_directory().'/radium-demo-install/init.php');
}

function cr_theme_is_menus()
{
     if ('nav-menus.php' == basename($_SERVER['PHP_SELF'])) {
          return true;
     }
     // to be add some check code for validate only in theme options pages
     return false;
}

/*-----------------------------------------------------------------------------------*/
/*	Register WP3.0+ Menus
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'cr_register_menu' ) ) {
    function cr_register_menu() {
	    register_nav_menu('primary-menu', __('Primary Menu'));
		register_nav_menu('top-menu', __('Top Menu'));
		register_nav_menu('one-page-menu', __('One Page Menu'));
		register_nav_menu('footer-menu', __('Footer Menu'));
    }

    add_action('init', 'cr_register_menu');
}

function add_last_nav_item($items, $args) {
	if( $args->theme_location == 'primary-menu' || $args->theme_location == 'one-page-menu' ) {
  		$items .= '<li class="header_search_li">';
			$items .= '<div id="header_search_wrap">';
				$items .= '<a href="#" id="header-search"><i class="fa fa-search"></i><i class="fa fa-remove"></i></a>';                                
			$items .= '</div>';
		$items .='</li>';
		
		$items .= '<li class="menu-item-resp responsive-item">';
			$items .= '<div class="responsive-search">';
				$items .= '<form action="'. get_home_url() .'" method="get" class="header_search">';
					$items .='<input type="text" name="s" class="form-control" value="" placeholder="">';
					$items .='<input type="submit" value="'.__('GO','Creativo').'" class="responsive_search_submit">';
                $items .= '</form>';
			$items .= '</div>';
		$items .= '</li>';					  
						  
	}
	return $items;
}
add_filter('wp_nav_menu_items','add_last_nav_item',10,2);


$dir = get_stylesheet_directory() . '/vc_templates'; // First, set new directory for templates

if( function_exists ('vc_set_shortcodes_templates_dir') ) vc_set_shortcodes_templates_dir( $dir );

/**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 * @since Twenty Eleven 1.0
 */
function creativo_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Blog Sidebar', 'Creativo' ),
		'id' => 'sidebar-1',
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="sidebar-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'WooCommerce Sidebar', 'Creativo' ),
		'id' => 'woocommerce-sidebar',
		'before_widget' => '<div class="sidebar-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="sidebar-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar', 'Creativo' ),
		'id' => 'sidebar-2',
		'before_widget' => '<div class="footer_widget_content">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'creativo_widgets_init' );

add_filter('dynamic_sidebar_params','columnise_widgets');

function columnise_widgets($params) {

	$columnise2 = strstr($params[0]['before_widget'],'front_widget');
	$columnise3 = strstr($params[0]['before_widget'],'footer_widget_content');
	
	$add_mob_footer = '';
 	$add_footer = '';
 
	if($columnise2){
		
		global $my_widget_num, 
			   $sec_widget_num;
		
		$my_widget_num++; 
		$sec_widget_num++;
		
		if($my_widget_num %5 ==0){
			$add = ' forth'; $my_widget_num=1;
		}
		if($sec_widget_num %3 ==0){
			$add_mob = ' third'; $sec_widget_num =1;
		}
		$class = $add . $add_mob; 
		$params[0]['before_widget'] = substr_replace($params[0]['before_widget'], $class,24,0);
	}
	if($columnise3){
		
		global $my_footer_widget_num, 
			   $sec_footer_widget_num;
		
		$my_footer_widget_num++; 
		$sec_footer_widget_num++;
		
		if($my_footer_widget_num %5 ==0){
			$add_footer = ' forth'; $my_footer_widget_num=1;
		}
		if($sec_footer_widget_num %3 ==0){
			$add_mob_footer = ' third'; $sec_footer_widget_num =1;
		}
		$class_footer = $add_footer . $add_mob_footer; 
		$params[0]['before_widget'] = substr_replace($params[0]['before_widget'], $class_footer,33,0);
	}
	return $params;
}
add_filter('get_sidebar','columnise_widgets_counter_reset', 99);
function columnise_widgets_counter_reset($text) {
   global $my_widget_num;
   $my_widget_num = 0;
   return $text;
}

//fixing filtering for shortcodes
function shortcode_empty_paragraph_fix($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $array);
    return $content;
}

//allow custom font upload
add_filter('the_content', 'shortcode_empty_paragraph_fix');

add_filter('upload_mimes', 'cr_filter_mime_types');
function cr_filter_mime_types($mimes)
{
	$mimes['ttf'] = 'font/ttf';
	$mimes['woff'] = 'font/woff';
	$mimes['svg'] = 'font/svg';
	$mimes['eot'] = 'font/eot';

	return $mimes;
}

//dropdown arrows
class Arrow_Walker_Nav_Menu extends Walker_Nav_Menu {
    function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output) {
        $id_field = $this->db_fields['id'];
        if (!empty($children_elements[$element->$id_field]) && $element->menu_item_parent == 0) { 
            $element->title =  $element->title . '<span class="sf-sub-indicator"><i class="fa fa-angle-down"></i></span>'; 
			$element->classes[] = 'sf-with-ul';
        }
		
		if (!empty($children_elements[$element->$id_field]) && $element->menu_item_parent != 0) { 
            $element->title =  $element->title . '<span class="sf-sub-indicator"><i class="fa fa-angle-right"></i></span>'; 
        }

        Walker_Nav_Menu::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}

/* Add Next Page Button in First Row */
add_filter( 'mce_buttons', 'my_add_next_page_button', 1, 2 ); // 1st row
 
/**
 * Add Next Page/Page Break Button
 * in WordPress Visual Editor
 */
function my_add_next_page_button( $buttons, $id ){
 
    /* only add this for content editor */
    if ( 'content' != $id )
        return $buttons;
 
    /* add next page after more tag button */
    array_splice( $buttons, 13, 0, 'wp_page' );
 
    return $buttons;
}

add_action( 'wp_print_scripts', 'de_script', 100 );

function de_script() {
    wp_dequeue_script( 'wc-cart-fragments' );

    return true;
}

/*-----------------------------------------------------------------------------------*/
/*	Configure WP2.9+ Thumbnails 
/*-----------------------------------------------------------------------------------*/

if( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
// Add post thumbnail functionality
add_image_size('blog-large', 600, 273, true);
add_image_size('blog-medium', 320, 202, true);
//add_image_size('tabs-img', 52, 50, true); // aic scos
add_image_size('related-img', 180, 138, true);
add_image_size('portfolio-one', 540, 272, true);
add_image_size('portfolio-two', 550, 353, true);
add_image_size('portfolio-three', 381, 285, true);
add_image_size('portfolio-four', 271, 198, true);
add_image_size('testimonial', 90, 90, true);
//add_image_size('portfolio-full', 940, 400, true); // aici scos
add_image_size('recent-posts', 220, 135, true);
add_image_size('recent-posts-col-2', 600, 370, true);
add_image_size('recent-posts-col-3', 400, 245, true);
//add_image_size('recent-post-thumbnail',  66, 66, true);	// aici scos
//add_image_size('gallery-thumb',  90, 70, true);	// aici scos
}


/*-----------------------------------------------------------------------------------*/
/*	Custom Gravatar Support
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'cr_custom_gravatar' ) ) {
    function cr_custom_gravatar( $avatar_defaults ) {
        $cr_avatar = get_template_directory_uri() . '/images/gravatar.png';
        $avatar_defaults[$cr_avatar] = 'Custom Gravatar (/images/gravatar.png)';
        return $avatar_defaults;
    }
    
    add_filter( 'avatar_defaults', 'cr_custom_gravatar' );
}

/*-----------------------------------------------------------------------------------*/
/*	Comment Styling
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'comment_style' ) ) {
    function comment_style($comment, $args, $depth) {

        $GLOBALS['comment'] = $comment; ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     
            <div id="comment-<?php comment_ID(); ?>" class="comment_quote">            	
                <div>               
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em class="moderation"><?php _e('Your comment is awaiting moderation.', 'Creativo') ?></em>
                        <br />
                    <?php endif; ?>          
                    <div class="comment-body">
                        <?php comment_text() ?>
                    </div>
                </div>    
            </div>
            <div class="comment_details clearfix">
                <div class="comment_image">
                        <?php echo get_avatar($comment,$size='55'); ?>
                </div>
                <div class="comment_author_details">
                    <div class="comment-author vcard">
                            <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
                    </div>
        
                    <div class="comment-meta commentmetadata">
                        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'Creativo'), get_comment_date(),  get_comment_time()) ?></a>
                        <?php edit_comment_link(__('(Edit)', 'Creativo'),'  ','') ?> &middot; <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </div>
                </div>    
			</div>
    <?php
    }
}


/*-----------------------------------------------------------------------------------*/
/*	Seperated Pings Styling
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'cr_list_pings' ) ) {
    function cr_list_pings($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment; ?>
    	<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
    	<?php 
    }
}


/*-----------------------------------------------------------------------------------*/
/*	Change Default Excerpt Length
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'cr_excerpt_length' ) ) {
    function cr_excerpt_length($length) {
    	return 40; 
    }
    
    add_filter('excerpt_length', 'cr_excerpt_length');
}


/*-----------------------------------------------------------------------------------*/
/*	Configure Excerpt String
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'cr_excerpt_more' ) ) {
    function cr_excerpt_more($excerpt) {
    	return str_replace('[...]', '...', $excerpt); 
    }
    
    add_filter('wp_trim_excerpt', 'cr_excerpt_more');
}

if ( is_admin() ) {
    $of_page= 'appearance_page_options-framework';
    add_action( "admin_print_scripts-$of_page", 'optionsframework_custom_js', 0 );
}

function creativo_js_scripts() {
	
	global $data;
	
	wp_enqueue_script( 'jquery', false, array(), '5.5.8', true );

	wp_enqueue_style( 'creativo-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'fontawesome' , get_template_directory_uri() . '/css/fontawesome/css/font-awesome.css' );
	if ($data['page_load_effect']) {
		wp_enqueue_style( 'animsition' , get_template_directory_uri() . '/css/animsition.min.css' );
	}
	if ($data['responsiveness']) {	
    	wp_enqueue_style( 'responsive' , get_template_directory_uri() . '/css/responsive.css' );
 	} 
	else {
		wp_enqueue_style( 'fixed' , get_template_directory_uri() . '/css/fixed.css' );
	}
	wp_enqueue_script( 'plugins' , get_template_directory_uri() . '/js/plugins.js', array(), '5.4', TRUE );
    wp_enqueue_script( 'creativo.main', get_template_directory_uri().'/js/main.js', array(), '5.4', TRUE );
	
	if(class_exists('Woocommerce')) {
		wp_enqueue_script( 'woo', get_template_directory_uri().'/js/woo.js', array(), '5.4', TRUE );
	}
	
	if($data['body_font'] && $data['body_font'] != 'Select Font') {
		$ggl_font[ urlencode( $data['body_font'] ) ] = '' . urlencode( $data['body_font'] );
	}
	if($data['heading_font'] && $data['heading_font'] != 'Select Font') {
		$ggl_font[ urlencode( $data['heading_font'] ) ] = '' . urlencode( $data['heading_font'] );
	}
	if($data['side_heading_font'] && $data['side_heading_font'] != 'Select Font') {
		$ggl_font[ urlencode( $data['side_heading_font'] ) ] = '' . urlencode( $data['side_heading_font'] );
	}
	if($data['menu_font_family'] && $data['menu_font_family'] != 'Select Font') {
		$ggl_font[ urlencode( $data['menu_font_family'] ) ] = '' . urlencode( $data['menu_font_family'] );
	}
	
	if($data['tm_font_family'] && $data['tm_font_family'] != 'Select Font') {
		$ggl_font[ urlencode( $data['tm_font_family'] ) ] = '' . urlencode( $data['tm_font_family'] );
	}
	
	if ( isset( $ggl_font ) && $ggl_font ) {
			$font_families = '';
						
			$font_styles = $font_subsets = '';
			
			$font_subsets = $data['ggl_character_sets'];
			$font_styles = $data['ggl_font_weight'];

			foreach ( $ggl_font as $g_font ) {
				$font_families .= sprintf( '%s:%s|', $g_font, urlencode( $font_styles ) );
			}
			
			if ( $font_subsets ) {
				$font_families = sprintf( '%s&%s', rtrim( $font_families, '|' ), $font_subsets );
			} else {
				$font_families = rtrim( $font_families, '|' );
			}

			wp_enqueue_style( 'google-fonts', 'http' . ( ( is_ssl() ) ? 's' : '' ) . '://fonts.googleapis.com/css?family=' . $font_families, array(), '' );
		}

}
add_action('wp_enqueue_scripts', 'creativo_js_scripts');

function cr_searchform() {
	echo '<form method="get" id="searchform" action="'. get_home_url().'"><fieldset style="border:none;"><input type="text" name="s" id="s" value="'. __('Search keywords here', 'Creativo') .'" onfocus="if(this.value==\''. __('Search keywords here', 'Creativo'). '\') this.value=\'\';" onblur="if(this.value==\'\')this.value=\''. __('Search keywords here', 'Creativo').'\';" /></fieldset><!--END #searchform--></form>';	
}

/* WOOCOMMERCE FILTER HOOKS
	================================================== */
		
	/************************************************
	*	WooCommerce Functions		       	     	* 
	/************************************************/
	
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
	
	function my_theme_wrapper_start() {
	  echo '<div class="page-content clearfix">';
	}
	 
	function my_theme_wrapper_end() {
	  echo '</div>';
	}
	
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// Auto plugin activation
require_once('functions/plugin/class-tgm-plugin-activation.php');
add_action('tgmpa_register', 'cr_register_required_plugins');
function cr_register_required_plugins() {
	global $data;
	$plugins = array(
		array(
            'name'          => 'WPBakery Visual Composer', // The plugin name
            'slug'          => 'js_composer', // The plugin slug (typically the folder name)
            'source'            => get_template_directory() . '/functions/plugin/js_composer.zip', // The plugin source
            'required'          => true, // If false, the plugin is only 'recommended' instead of required
            'version'           => '4.7.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'      => '', // If set, overrides default API URL and points to an external URL
        ),
		array(
			'name'     				=> 'Layer Slider', // The plugin name
			'slug'     				=> 'LayerSlider', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/functions/plugin/layersliderwp.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '5.6.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'Revolution Slider ', // The plugin name
			'slug'     				=> 'revslider', // Theplugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/functions/plugin/revslider.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '5.0.8.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'WordPress Live Chat 1.5', // The plugin name
			'slug'     				=> 'screets-chat', // Theplugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/functions/plugin/screets-chat.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		)
	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'Creativo';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'	   		=> 'Creativo',		 	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',						 	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'		 		=> 'install-required-plugins', 	// Menu slug
		'has_notices'	  	=> true,					   	// Show admin notices or not
		'is_automatic'		=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'	  		=> array(
			'page_title'					   			=> __( 'Install Required Plugins', 'Creativo' ),
			'menu_title'					   			=> __( 'Install Plugins', 'Creativo' ),
			'installing'					   			=> __( 'Installing Plugin: %s', 'Creativo' ), // %1$s = plugin name
			'oops'							 			=> __( 'Something went wrong with the plugin API.', 'Creativo' ),
			'notice_can_install_required'	 			=> _n_noop( 'This theme requires the following plugin installed or update: %1$s.', 'This theme requires the following plugins installed or updated: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin installed or updated: %1$s.', 'This theme recommends the following plugins installed or updated: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'				=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'						   			=> __( 'Return to Required Plugins Installer', 'Creativo' ),
			'plugin_activated'				 			=> __( 'Plugin activated successfully.', 'Creativo' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'Creativo' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa($plugins, $config);
}
/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'cr_vcSetAsTheme' );
function cr_vcSetAsTheme() {
    vc_set_as_theme();
}


require_once('functions/plugin/multiple-featured-images/multiple-featured-images.php');

if( class_exists( 'kdMultipleFeaturedImages' )) {
		$i = 2;

		while($i <= $data['featured_images_count']) {
	        $args = array(
	                'id' => 'featured-image-'.$i,
	                'post_type' => 'post',      // Set this to post or page
	                'labels' => array(
	                    'name'      => __( 'Featured image ', 'Creativo' ).$i,
	                    'set'       => __( 'Set featured image ', 'Creativo' ).$i,
	                    'remove'    => __( 'Remove featured image ', 'Creativo' ).$i,
	                    'use'       => __( 'Use as featured image ', 'Creativo' ).$i,
	                )
	        );

	        new kdMultipleFeaturedImages( $args );

	        $args = array(
	                'id' => 'featured-image-'.$i,
	                'post_type' => 'page',      // Set this to post or page
	                'labels' => array(
	                    'name'      => __( 'Featured image ', 'Creativo' ).$i,
	                    'set'       => __( 'Set featured image ', 'Creativo' ).$i,
	                    'remove'    => __( 'Remove featured image ', 'Creativo' ).$i,
	                    'use'       => __( 'Use as featured image ', 'Creativo' ).$i,
	                )
	        );

	        new kdMultipleFeaturedImages( $args );

	        $args = array(
	                'id' => 'featured-image-'.$i,
	                'post_type' => 'creativo_portfolio',      // Set this to post or page
	                'labels' => array(
	                    'name'      => __( 'Featured image ', 'Creativo' ).$i,
	                    'set'       => __( 'Set featured image ', 'Creativo' ).$i,
	                    'remove'    => __( 'Remove featured image ', 'Creativo' ).$i,
	                    'use'       => __( 'Use as featured image ', 'Creativo' ).$i,
	                )
	        );

	        new kdMultipleFeaturedImages( $args );

	        $i++;
    	}

}

/*
function vc_theme_vc_row($atts, $content = null) {
   return '<div class=""><div>'.wpb_js_remove_wpautop($content).'</div></div>';
}
*/



/*-----------------------------------------------------------------------------------*/
/*	Load Widgets & Shortcodes
/*-----------------------------------------------------------------------------------*/

// More custom functions
include_once('functions/custom_functions.php');

// VC custom classes
include_once('functions/vc_class.php');

// Add the Theme Shortcodes
include("functions/shortcodes.php");
 
// Add meta boxes
include('functions/metaboxes.php');

// Add the post types
include("functions/theme-posttypes.php");

// Add flickr widget
include("functions/widget-flickr.php");

// Add contact info widget
include("functions/widget-contact.php");

// Add latest tweets widget
include("functions/widget-tweets.php");

// Add the Custom Youtube Widget
include("functions/widget-youtube.php");

// Add the Custom Vimeo Widget
include("functions/widget-vimeo.php");

// Add the Popular/Recent Tabs Widget
include("functions/widget-tabs.php");

// Add Custom Blog Posts Widget
include('functions/widget-blogposts.php'); 

// Add socila links widget
include("functions/widget-social.php");

// Add Custom Recent Portfolios Widget
include('functions/widget-recentportfolios.php');

// Add the post types
include_once('functions/plugin/multiple_sidebars.php');

/*-----------------------------------------------------------------------------------*/
/*	Filters that allow shortcodes in Text Widgets
/*-----------------------------------------------------------------------------------*/

add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');


function SearchFilter($query) {
	global $data;
	$search_array = array();
	
	if($data['en_search_post']) $search_array[] = 'post';
	if($data['en_search_page']) $search_array[] = 'page';
	if($data['en_search_portfolio']) $search_array[] = 'creativo_portfolio';
	if($data['en_search_product']) $search_array[] = 'product';
	if( empty( $search_array ) ) $search_array[] = ' ';
	
	if ($query->is_search) {
		$query->set('post_type', $search_array);
	}
	return $query;
}

add_filter('pre_get_posts','SearchFilter');

function custom_sanitize_textarea($input) {
    global $allowedposttags;
    $custom_allowedtags["embed"] = array(
      "src" => array(),
      "type" => array(),
      "allowfullscreen" => array(),
      "allowscriptaccess" => array(),
      "height" => array(),
          "width" => array()
      );
      $custom_allowedtags["script"] = array();
      $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
      $output = wp_kses( $input, $custom_allowedtags);
    return $output;
}

remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

require_once('wp-updates-theme.php');
new WPUpdatesThemeUpdater_398( 'http://wp-updates.com/api/2/theme', basename( get_stylesheet_directory() ) );

include_once( get_template_directory() . "/themeupgrader.php" );
new EWA_Theme_Upgrader( "http://rockythemes.com/api", 1 );