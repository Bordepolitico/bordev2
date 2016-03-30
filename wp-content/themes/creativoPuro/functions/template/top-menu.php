<div class="top_navigation">
	<?php
	if( get_post_meta($post->ID, 'pyre_top_menu', true) != 'default' ) {
		$top_menu = get_post_meta($post->ID, 'pyre_top_menu', true);
	}
	else {
		$top_menu = '';
	}
    if(has_nav_menu('top-menu')) { 
        wp_nav_menu(array('theme_location' => 'top-menu', 'menu' => $top_menu, 'container' => false, 'items_wrap' => '<ul id="top-menu" class="%2$s clearfix">%3$s</ul>', 'fallback_cb' => 'default_menu_fallback', 'walker' => new cr_walker));
    }
    else{
        echo '<ul id="top-menu"><li><a href="#">'.__('No menu assigned!','Creativo').'</a></li></ul>';
    }
    ?>
</div>    
  
