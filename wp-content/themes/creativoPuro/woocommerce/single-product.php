<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $data;
get_header( 'shop' ); ?>
<?php 
if($data['woocommerce_sidebar_en']) {
	if($data['woocommerce_sidebar_pos'] == 'left') { 
		$container= 'float: right;';
		$sidebar = 'float: left;';	
	}
	else{ 
		$container= 'float: left;';
		$sidebar = 'float: right;';	
	}	
}
else{
	$container = 'float: none; width: 100%;';
}
?>
<div class="row">
	<div class="post_container" style="<?php echo $container; ?>">
		<?php
            /**
             * woocommerce_before_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             * @hooked woocommerce_breadcrumb - 20
             */
            do_action( 'woocommerce_before_main_content' );
        ?>
    
            <?php while ( have_posts() ) : the_post(); ?>
    
                <?php wc_get_template_part( 'content', 'single-product' ); ?>
    
            <?php endwhile; // end of the loop. ?>
    
        <?php
            /**
             * woocommerce_after_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action( 'woocommerce_after_main_content' );
        ?>
	</div>
	<?php if($data['woocommerce_sidebar_en']) { ?>
        <div class="sidebar" style="<?php echo $sidebar; ?>"> 
            <?php
                /**
                 * woocommerce_sidebar hook
                 *
                 * @hooked woocommerce_get_sidebar - 10
                 */
                
                 if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($data['woocommerce_archive_sidebar'])): 
                 endif;
                  
            ?>
        </div>
        <div class="clr"></div>
    <?php 
	}
	?>
</div>
<?php get_footer( 'shop' ); ?>