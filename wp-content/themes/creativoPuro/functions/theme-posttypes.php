<?php

/*-----------------------------------------------------------------------------------

	Add Portfolio Post Type

-----------------------------------------------------------------------------------*/


/* Create the Portfolio Custom Post Type ------------------------------------------*/
// Register custom post types
add_action('init', 'pyre_init');
function pyre_init() {
	global $data;
	$slug = (isset($data['portfolio_slug']) && ($data['portfolio_slug'] != '')) ? $data['portfolio_slug'] : 'portfolio-items' ;
	register_post_type(
		'creativo_portfolio',
		array(
			'labels' => array(
				'name' => __('Portfolio', 'Creativo'),
				'singular_name' => __('Portfolio', 'Creativo')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => $slug),
			'supports' => array('title', 'editor', 'thumbnail','comments'),
			'can_export' => true,
		)
	);

	register_taxonomy('portfolio_category', 'creativo_portfolio', array('hierarchical' => true, 'label' => __('Categories', 'Creativo'), 'query_var' => true, 'rewrite' => true));
	
	register_post_type(
		'clients',
		array(
			'labels' => array(
				'name' => __('Clients', 'Creativo'),
				'singular_name' => __('Clients', 'Creativo')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'clients'),
			'supports' => array('title', 'thumbnail'),
			'can_export' => true,
		)
	);
	register_post_type(
		'testimonials',
		array(
			'labels' => array(
				'name' => __('Testimonials', 'Creativo'),
				'singular_name' => __('Testimonials', 'Creativo')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'testimonials'),
			'supports' => array('title', 'editor', 'thumbnail'),
			'can_export' => true,
		)
	);

}

