<div class="footer_navigation">
	<?php
	/*
	if( get_post_meta($post->ID, 'pyre_footer_menu', true) != 'default' ) {
		$top_menu = get_post_meta($post->ID, 'pyre_footer_menu', true);
	}
	else {
		$top_menu = '';
	}*/
    if(has_nav_menu('footer-menu')) { 
        wp_nav_menu(array('theme_location' => 'footer-menu', 'container' => false, 'items_wrap' => '<ul id="footer-menu" class="%2$s clearfix">%3$s</ul>', 'fallback_cb' => 'default_menu_fallback', 'walker' => new cr_walker));
    }
    else{
        echo '<ul id="footer-menu"><li><a href="#">'.__('No menu assigned!','Creativo').'</a></li></ul>';
    }
    ?>
</div>    
  
