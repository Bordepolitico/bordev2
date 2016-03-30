<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php global $data; ?>
<?php
if($data['favicon']){
?>
    <link rel="shortcut icon" href="<?php echo $data['favicon']; ?>" type="image/x-icon" />
<?php
}
?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php bloginfo('name'); ?> <?php wp_title(' - ', true, 'left'); ?></title>

<?php if ($data['responsiveness']) { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php } ?>    

 <?php wp_head(); ?> 
 <style type="text/css">
	<?php
	ob_start();
	include_once get_template_directory() . '/functions/dynamic_css.php';
	$dynamic_css = ob_get_contents();
	ob_get_clean();
	echo less_css( $dynamic_css );
	?>
	</style>
 
<?php if($data['footer_code']) { echo $data['footer_code']; } ?>
<style type="text/css" id="ss">
</style>	
<link rel="stylesheet" type="text/css" id="skins">
</head>
<?php
if($data['page_load_effect']) {
	$page_class =  'animsition';	
	$body = 'page-with-animation';
}
if( ( $data['site_width'] == 'Boxed' ) && ( $data['en_parallax'] == '1' ) ) {
	$body.=' parallax_class';
	$container_style = 'style="background-size: cover; background-attachment:fixed;"  data-stellar-background-ratio="0.1"';
}
if( ( ( $data['site_width'] == 'Extra Wide' ) || ( $data['site_width'] == 'Wide' ) ) && ( $data['en_parallax'] == '1' ) ) {
	$container_parallax = ' parallax_class';
	$container_style = 'style="background-size: cover; background-attachment:fixed;"  data-stellar-background-ratio="0.1"';
}

/*
if($data['header_position'] == 'left') {
	$body .= ' side-header';		
}*/
?>
<body <?php body_class( $body ); echo $container_style; ?>>

	<?php		
    if($boxed && get_post_meta($post->ID, 'pyre_background', true) && get_post_meta($post->ID, 'pyre_en_full_screen', 'no')=='yes'): 
    ?>
		<img id="background" src="<?php echo get_post_meta($post->ID, 'pyre_background', true); ?>" class="bgwidth">    
    <?php
    endif;    
	?>
	<div <?php if( is_page_template ( 'page-one-full.php' ) ) { echo 'id=home'; } else { echo 'id="container"'; } ?> class="container <?php echo $page_class . $container_parallax; ?>" 
	<?php echo $container_style; ?>>
    <?php if($data['en_top_bar'] && ( get_post_meta($post->ID, 'pyre_en_topbar', true) != 'no' ) ) { ?>
    	<div class="top_nav_out">
            <div class="top_nav clearfix">
            	<?php
				if($data['tb_left_content'] !='Leave Empty'){
				?>
                    <div class="tb_left">
                        <?php
						if($data['tb_left_content'] ) {	 
							if($data['tb_left_content'] =='contactinfo') { 
								get_template_part('functions/template/contact-info');
							} 
							elseif ($data['tb_left_content'] =='socialinks') {
								get_template_part('functions/template/social-links');
							}
							elseif ($data['tb_left_content'] =='nav') {
								get_template_part('functions/template/top-menu');
							}
						}
						else{
							get_template_part('functions/template/contact-info');
						}
                        ?>
                    </div>    
                <?php    
				}
				?> 
                
                <?php
				if($data['tb_right_content'] !='Leave Empty'){
				?>
                    <div class="tb_right">
                        <?php
						if($data['tb_right_content'] ) {	 
							if($data['tb_right_content'] =='contactinfo') { 
								get_template_part('functions/template/contact-info');
							} 
							elseif ($data['tb_right_content'] =='socialinks') {
								get_template_part('functions/template/social-links');
							}
							elseif ($data['tb_right_content'] =='nav') {
								get_template_part('functions/template/top-menu');
							}
						}
						else{
							get_template_part('functions/template/social-links');
						}
                        ?>
                    </div>    
                <?php    
				}
				?>                       
            </div>
        </div>   
    <?php } 
		$header_class = ($data['enable_sticky']) ? 'sticky_h' : '';
		$header_style = ($data['header_style'] == 'style2') ? 'more_padding' : '';
		
		if( get_post_meta($post->ID, 'pyre_main_menu', true) != 'default' ) {
			$main_menu = get_post_meta($post->ID, 'pyre_main_menu', true);
		}
		else {
			$main_menu = '';
		}
		if( get_post_meta($post->ID, 'pyre_one_menu', true) != 'default' ) {
			$one_menu = get_post_meta($post->ID, 'pyre_one_menu', true);
		}
		else {
			$one_menu = '';
		}
	?> 
<?php //if($data['header_position'] !='left') { ?>    
    <div class="full_header <?php echo $header_style; ?>">    
        <div class="header_area <?php echo $header_class; ?>">
            <header class="header_wrap">        	
                <div class="header <?php echo $transparent_class ?>" data-transparent="<?php $output_tr =(get_post_meta($post->ID, 'pyre_transparent_header', true)=='yes')? 'yes' : 'no'; echo $output_tr; ?>" >             
                    <div class="header_reduced">
                        <div class="inner clr">
                            <div id="branding">
                                <?php  
                                if($data['logo']) {
                                ?> 
                                	<?php 
									$transparent_logo = 'data-custom-logo="false"';
                                    if(get_post_meta($post->ID, 'pyre_transparent_logo', true)!='' && ( get_post_meta($post->ID, 'pyre_transparent_header', true)=='yes' )) {
                                    	$logo_class = 'hide_logo';	
										$transparent_logo = 'data-custom-logo="true"';
                                    }
									else{
										$logo_class = 'show_logo';										
									}
                                    ?>            	
                                    <div class="logo" <?php echo $transparent_logo; ?>>	
                                        <a href="<?php if($data['en_custom_logo_url'] && !empty($data['custom_logo_url']) ) { echo $data['custom_logo_url']; } else { echo home_url(); } ?>" rel="home" title="<?php bloginfo('name'); ?>">                                            
                                        	<img src="<?php echo $data['logo']; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="original_logo <?php echo $logo_class; ?>">   
                                            <?php 
											if(get_post_meta($post->ID, 'pyre_transparent_logo', true)!='' && (get_post_meta($post->ID, 'pyre_transparent_header', true)=='yes')) {
											?>
                                            	<img src="<?php echo get_post_meta($post->ID, 'pyre_transparent_logo', true); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="custom_logo show_logo">
                                            <?php
											}
											?>                                                                                    
                                        </a>
                                    </div>                   
                                <?php    
                                }
                                else{
                                ?>
                                    <h1 class="text"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
                                    
                                    <?php 
                                    if($data['en_tagline']) {
                                    ?>
                                    
                                        <div class="tagline"><?php echo get_bloginfo('description') ?></div>
                                    
                                <?php
                                    }
                                }
                                ?>    
                            </div>
                            
                            <?php if($data['header_style'] == 'style1') { ?>   
                                    <nav id="navigation" class="main_menu <?php echo $menu_extra_class ?> clearfix">                     
                                    <?php
                                    if ( is_page_template ( 'page-one-full.php' ) ) {
                                        wp_nav_menu(array('theme_location' => 'one-page-menu', 'menu' => $one_menu, 'container' => false, 'items_wrap' => '<ul id="one_page_navigation" class="%2$s clearfix">%3$s</ul>', 'fallback_cb' => 'default_menu_fallback', 'walker' => new cr_walker));
                                        
                                    }
                                    else{
                                        
                                        wp_nav_menu(array('theme_location' => 'primary-menu', 'menu' => $main_menu, 'container' => false, 'items_wrap' => '<ul id="%1$s" class="%2$s clearfix">%3$s</ul>', 'fallback_cb' => 'default_menu_fallback', 'walker' => new cr_walker));
                                        ?>
                                        
                                    <?php
                                    }
                                    ?> 
                                        <form action="<?php home_url(); ?>" method="get" class="header_search">
                                            <input type="text" name="s" class="form-control" value="" placeholder="<?php _e('Type &amp; Hit Enter..','Creativo'); ?>">
                                        </form>                                        
                                    </nav>
                                      
                                                           
                            <?php } ?>
                            <!--
                            <div class="responsive-menu-link">
                                <span class="button large button_default mob_menu" href="" target=""><i class="fa fa-bars"></i><?php _e('Menu','Creativo'); ?></span>                           	
                            </div> 
                            -->
                            <?php if( ($data['header_style'] == 'style2') && ( $data['header_banner'] !='' ) ) { ?>                	
                                <div class="banner">
                                    <?php echo $data['header_banner']; ?>
                                </div>
                            <?php 
                            }
                            ?>                        
                             
                        </div>    
                    </div>
                </div>   
            </header>
            <?php if($data['header_style'] == 'style2') { ?>
            <div class="second_navi">
                <div class="second_navi_inner">
                     <nav id="navigation" class="main_menu clearfix">
                        <?php
                        if ( is_page_template ( 'page-one-full.php' ) ) {
                            wp_nav_menu(array('theme_location' => 'one-page-menu', 'menu' => $one_menu, 'container' => false, 'items_wrap' => '<ul id="one_page_navigation" class="%2$s">%3$s</ul>', 'fallback_cb' => 'default_menu_fallback', 'walker' => new cr_walker));
                        }
                        else{
                            wp_nav_menu(array('theme_location' => 'primary-menu', 'menu' => $main_menu, 'container' => false, 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'fallback_cb' => 'default_menu_fallback', 'walker' => new cr_walker));
                        }
                        ?>
                        <form action="<?php home_url(); ?>" method="get" class="header_search">
                            <input type="text" name="s" class="form-control" value="" placeholder="<?php _e('Type &amp; Hit Enter..','Creativo'); ?>">
                        </form>
                     </nav>   
                </div>
            </div>                    
            <?php
            }
            
            ?>
            
        </div>
    </div> 
    <div id="responsive_navigation" sticky-mobile-menu="<?php if($data['sticky_mobile_menu']) { echo 'yes'; } else { echo 'no'; } ?>">
        <div class="responsive-menu-link" >
            <span class="button large button_default mob_menu" href="" target=""><i class="fa fa-bars"></i><?php _e('Menu','Creativo'); ?></span>
        </div>
        <div class="mobile_menu_holder">    
            <?php
            if ( is_page_template ( 'page-one-full.php' ) ) {
                wp_nav_menu(array('walker' => new Arrow_Walker_Nav_Menu, 'theme_location' => 'one-page-menu','container' => false, 'items_wrap' => '<ul id="responsive_menu">%3$s</ul>'));
            }
            else {
                wp_nav_menu(array('walker' => new Arrow_Walker_Nav_Menu, 'theme_location' => 'primary-menu', 'menu' => $main_menu, 'container' => false, 'items_wrap' => '<ul id="responsive_menu">%3$s</ul>'));
            }
            ?>                        
    	</div>           	
	</div>	       
<?php
//}
/*else {
?>
	<header class="header_left">
    </header>    
<?php
}
*/
		if(is_search()){ 
		?>
        	<div class="bellow_header">
                <div class="bellow_header_title">
                	<div class="page-title">
						<h1><?php printf( __( 'Search Results for: %s', 'Creativo' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                        <?php if(function_exists('cr_breadcrumb')):?>                                                   
                            <div class="breadcrumb">
                                <?php cr_breadcrumb();  ?>
                            </div>   
						<?php endif; ?>  
                                                   
                        <?php if($data['header_search_form']) { ?>
                            <div class="breadcrumb_search_form">
                                <?php cr_searchform(); ?>
                            </div>
                        <?php } ?> 
                    </div>
                </div>
            </div>        
        <?php 
		} 
		if(is_category() ){
		?>
        <div class="bellow_header">
        	<div class="bellow_header_title">
            	<div class="page-title">
            		<h1><?php _e('Posts filed under: ','Creativo'); single_cat_title(); ?></h1>
               		 <?php if(function_exists('cr_breadcrumb')):?>                                                   
                            <div class="breadcrumb">
                                <?php cr_breadcrumb();  ?>
                            </div>   
						<?php endif; ?>   
                                               
                    <?php if($data['header_search_form']) { ?>
                    	<div class="breadcrumb_search_form">
                        	<?php cr_searchform(); ?>
                        </div>
                    <?php } ?> 
            	</div>
            </div>
        </div>
        <?php	
		}
		if(is_404()){
		?>
        <div class="bellow_header">
        	<div class="bellow_header_title">
            	<div class="page-title">
					<h1><?php _e('404 Error ','Creativo'); ?></h1>                    
                                               
                    <?php if($data['header_search_form']) { ?>
                    	<div class="breadcrumb_search_form">
                        	<?php cr_searchform(); ?>
                        </div>
                    <?php } ?> 
                </div>
            </div>
        </div>
        <?php	
		}
		if(is_tag() ){
		?>
        <div class="bellow_header">
        	<div class="bellow_header_title">
            	<div class="page-title">
					<h1><?php _e('Posts tagged with: ','Creativo'); single_cat_title(); ?></h1>
                    <?php if(function_exists(bcn_display)):?>                                                   
                            <div class="breadcrumb">
                                <?php bcn_display();  ?>
                            </div>   
                    <?php endif; ?>  
                                               
                    <?php if($data['header_search_form']) { ?>
                    	<div class="breadcrumb_search_form">
                        	<?php cr_searchform(); ?>
                        </div>
                    <?php } ?> 
            	</div>        
            </div>
        </div>
        <?php	
		}
		
		if(get_query_var('portfolio_category')){
		?>
        <div class="bellow_header">
        	<div class="bellow_header_title">
            	<div class="page-title">
                    <h1><?php _e('Projects filed under: ','Creativo'); single_cat_title(); ?></h1>
                    <?php if(function_exists(bcn_display)):?>                                                   
                            <div class="breadcrumb">
                                <?php bcn_display();  ?>
                            </div>   
                    <?php endif; ?>  
                                               
                    <?php if($data['header_search_form']) { ?>
                    	<div class="breadcrumb_search_form">
                        	<?php cr_searchform(); ?>
                        </div>
                    <?php } ?> 
            	</div>        
            </div>
        </div>    
        <?php
		}
		if(is_author()) {
			if(have_posts() ) {									
					the_post();
					?>                
                    <div class="bellow_header">
                        <div class="bellow_header_title">
                        	<div class="page-title">
                                <h1><?php _e('All posts by: ','Creativo') ; echo get_the_author(); ?></h1>                               
                                                            
                                <?php if($data['header_search_form']) { ?>
                                    <div class="breadcrumb_search_form">
                                        <?php cr_searchform(); ?>
                                    </div>
                                <?php } ?>
                        	</div>        
                        </div>
                    </div>
					<?php
					rewind_posts();
			}
			wp_reset_query();
		}		
		
		if(is_month()) {
			if(have_posts() ) {									
					the_post();
					?>                
                    <div class="bellow_header">
                        <div class="bellow_header_title">
                        	<div class="page-title">
                                <h1><?php printf( __( 'Monthly Archives: %s', 'Creativo' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'Creativo' ) ) ); ?></h1>
                         
                                <?php if($data['header_search_form']) { ?>
                                    <div class="breadcrumb_search_form">
                                        <?php cr_searchform(); ?>
                                    </div>
                                <?php } ?>
                                
                        	</div>        
                        </div>
                    </div>
					<?php
					rewind_posts();
			}
			wp_reset_query();
		}
		
		$spb = false;		
		if(class_exists('Woocommerce') && is_product() ) $spb = true;
				
		if(((is_page() || is_single() || is_singular('creativo_portfolio'))) && !is_front_page() && !$spb ){
		?>
         <div class="bellow_header <?php if( get_post_meta($post->ID, 'pyre_page_title_parallax', true) == 'yes' ) { echo 'parallax_class"'. 'data-stellar-background-ratio="0.4'; } else echo ''; ?>" >
         	<div class="pt_mask">
                <div class="bellow_header_title">
                    <div class="page-title"> 
                        <?php if(get_post_meta($post->ID, 'pyre_page_title_custom', true) != '') { 
                        ?>
                            <h1><?php echo get_post_meta($post->ID, 'pyre_page_title_custom', true); ?></h1>
                        <?php
                        }
                        else{
                        ?>          
                            <h1><?php the_title(); ?></h1> 
                        <?php 
                        }
                        if(get_post_meta($post->ID, 'pyre_page_title_subheading', true)) {
                            echo '<h3>'.get_post_meta($post->ID, 'pyre_page_title_subheading', true).'</h3>';	
                        }
                        ?>
                        <?php if(function_exists('cr_breadcrumb')):?>                                                   
                                <div class="breadcrumb">
                                    <?php cr_breadcrumb();  ?>
                                </div>   
                        <?php endif; ?>  
                                                   
                        <?php if($data['header_search_form']) { ?>
                            <div class="breadcrumb_search_form">
                                <?php cr_searchform(); ?>
                            </div>
                        <?php } ?>   
                                                 
                    </div>        
                </div>
        	</div>        
        </div>
        <?php
		}
		if( ( class_exists( 'Woocommerce' ) && is_woocommerce() ) || ( is_tax( 'product_cat' ) ||  is_tax( 'product_tag' ) ) ) {
			?>
            <div class="bellow_header">
				<div class="bellow_header_title">
                	<div class="page-title">
                    
						<h1><?php if(!is_product()) woocommerce_page_title(true); else the_title();?></h1>   
                        <div class="breadcrumb">                      
                    	<?php
                        woocommerce_breadcrumb(array(
                        	'wrap_before' => '<ul class="breadcrumbs">',
                            'wrap_after' => '</ul>',
                            'before' => '<li>',
                            'after' => '</li>',
                            'delimiter' => '',
                            'home'        => _x( '<i class="fa fa-home"></i>', 'breadcrumb', 'woocommerce' ),
						));
						?> 
                        </div>                                                   
                        <?php if($data['header_search_form']) { ?>
                            <div class="breadcrumb_search_form">
                                <?php cr_searchform(); ?>
                            </div>
                        <?php } ?>    
                                       
                    </div>
                </div>                
            </div>            
            <?php
		}		
		?>        
            