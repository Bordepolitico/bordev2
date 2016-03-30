<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}	
if ( ! $product->is_in_stock() ) {

	$mk_add_to_cart = '<a href="'. apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->id ) ).'" class="add_to_cart_button">'. apply_filters( 'out_of_stock_add_to_cart_text', __( '<i class="icon-block"></i>Out of Stock', 'woocommerce' ) ).'</a>';
	
}
else { ?>

	<?php

	switch ( $product->product_type ) {
	case "variable" :
		$link  = apply_filters( 'variable_add_to_cart_url', get_permalink( $product->id ) );
		$label  = apply_filters( 'variable_add_to_cart_text', __( 'Select options', 'woocommerce' ) );
		$icon_class = 'icon-cog';
		break;
	case "grouped" :
		$link  = apply_filters( 'grouped_add_to_cart_url', get_permalink( $product->id ) );
		$label  = apply_filters( 'grouped_add_to_cart_text', __( 'View options', 'woocommerce' ) );
		$icon_class = 'icon-plus-circled';
		break;
	case "external" :
		$link  = apply_filters( 'external_add_to_cart_url', get_permalink( $product->id ) );
		$label  = apply_filters( 'external_add_to_cart_text', __( 'Read More', 'woocommerce' ) );
		$icon_class = 'icon-login';
		break;
	default :
		$link  = apply_filters( 'add_to_cart_url', esc_url( $product->add_to_cart_url() ) );
		$label  = apply_filters( 'add_to_cart_text', __( 'Add to cart', 'woocommerce' ) );
		$icon_class = 'icon-basket';
		break;
	}

	if ( $product->product_type != 'external' ) {
		$mk_add_to_cart = '<a href="'. $link .'" rel="nofollow" data-product_id="'.$product->id.'" class="add_to_cart_button product_type_'.$product->product_type.'"><i class="'.$icon_class.'"></i>'. $label.'</a>';
	}
	else {
		$mk_add_to_cart = '';
	}
}
	
?>
<li <?php post_class( $classes ); ?>>
	
    <div class="inside_prod">
    
        
    
            <div class="image_prod">
            	<?php
				if (nv_is_out_of_stock()) {
				
					echo '<div class="badge out-of-stock-badge"><span>' . __( 'Out of Stock', 'Creativo' ) . '</span></div>';
			
				} else if ($product->is_on_sale()) {
					
					echo apply_filters('woocommerce_sale_flash', '<div class="badge onsale"><span>'.__( 'Sale!', 'Creativo' ).'</span></div>', $post, $product);				
				} else if (!$product->get_price()) {
					
					echo '<div class="badge free-badge"><span>' . __( 'Free', 'Creativo' ) . '</span></div>';
					
				} 
				?>
				<a href="<?php the_permalink(); ?>">
					<?php
					$img_url = wp_get_attachment_url( get_post_thumbnail_id(),'full' );                 	
            		?>
                	<img src="<?php echo $img_url; ?>" />
                 </a>
                 <div class="product_buttons_wrap clearfix">
    
                    <?php echo $mk_add_to_cart; ?>               
        
                </div>
            </div>

    
       
        
        <div class="product_details">
            
                <h3><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></h3>
        
                <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
                
                <div class="product_price">
    
                    <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
    
                </div>
                       
		</div>

	</div>        

</li>