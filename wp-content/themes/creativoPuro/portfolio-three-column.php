<?php // Template Name: Portfolio Three Column ?>
<?php get_header(); ?>
	<?php 
	$portfolio_style = get_post_meta($post->ID, 'pyre_portfolio_style', true);	
	$grid = ($portfolio_style == 'flat') ? 'grid' : '';
	?> 
			<div class="row">
            	<?php while(have_posts()): the_post(); ?>
                	<div class="page_description"><?php the_content(); ?></div>
                <?php endwhile; ?> 
                <div id="content" class="portfolio-three">
                    <?php
                    if(!get_post_meta(get_the_ID(), 'pyre_portfolio_category', true)):
                    $portfolio_category = get_terms('portfolio_category');
                    if($portfolio_category):
                    ?>                    
                        <ul class="portfolio-tabs portfolio-templates clearfix">
                            <li class="active"><a data-filter="*" href="#"><?php _e('All', 'Creativo'); ?></a></li>
                            <?php foreach($portfolio_category as $portfolio_cat): ?>
                            <li><a data-filter=".<?php echo $portfolio_cat->slug; ?>" href="#"><?php echo $portfolio_cat->name; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php endif; ?>
                    <div class="portfolio-wrapper <?php echo $grid; ?>">
                        <?php
                        if(is_front_page()) {
							$paged = (get_query_var('page')) ? get_query_var('page') : 1;
						} else {
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						}
                        $args = array(
                            'post_type' => 'creativo_portfolio',
                            'paged' => $paged,
                            'posts_per_page' => $data['portfolio_items']
                        );
                        if(get_post_meta(get_the_ID(), 'pyre_portfolio_category', true)){
                            $args['tax_query'][] = array(
                                'taxonomy' => 'portfolio_category',
                                'field' => 'ID',
                                'terms' => get_post_meta(get_the_ID(), 'pyre_portfolio_category', true)
                            );
                        }
                        $gallery = new WP_Query($args);						
                        while($gallery->have_posts()): $gallery->the_post();
                            if(has_post_thumbnail() || get_post_meta($post->ID, 'pyre_youtube', true) || get_post_meta($post->ID, 'pyre_vimeo', true) ):
								?>
								<?php
								$item_classes = '';
								$item_cats = get_the_terms($post->ID, 'portfolio_category');
								$portf_cat = wp_get_object_terms($post->ID, 'portfolio_category');
								if($item_cats):
								foreach($item_cats as $item_cat) {
									$item_classes .= $item_cat->slug . ' ';
								}
								endif;	
								$thumb_link = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio-three'); 															
								$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');						
								
								if ( $portfolio_style != 'flat' ){					
								?>
                                    <div class="portfolio-item  <?php echo $item_classes; ?>">	 
                                        <div class="project-feed clearfix">										
                                            <div class="ch-item portfolio-3">	
                                                <div class="ch-info portfolio-3">
                                                    <div class="ch-info-front3 "><img src="<?php echo $thumb_link[0]; ?>" /></div>
                                                    <div class="ch-info-back3 portfolio-3" style="background-image:url(<?php echo $thumb_link[0]; ?>);">
                                                        <?php 													
                                                        if (get_post_meta($post->ID, 'pyre_custom_link', true) != '') {													
                                                        ?>
                                                            <div class="info"><a href="<?php echo get_post_meta($post->ID, 'pyre_custom_link', true); ?>" target="<?php echo get_post_meta($post->ID, 'pyre_custom_link_target', true); ?>"><i class="fa fa-search"></i></a>
                                                            </div>                                                    	
                                                        <?php
                                                        }
                                                        else{
                                                        ?>														
                                                            <div class="info"><a href="<?php echo get_permalink($post->ID)?>"><i class="fa fa-search"></i></a>
                                                            </div>
                                                        <?php 
                                                        } 
                                                        ?>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="portfolio_details">                                    	
                                            <h3><a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_title(); ?></a></h3>
                                            <div class="tags"><i class="fa fa-tag"></i><?php echo get_the_term_list($post->ID, 'portfolio_category', '', ', ', '');?></div>
                                        </div>									
                                    </div>
                        		<?php 
								}
								else {
								?>	
									<figure class="effect-zoe cols-3 <?php echo $item_classes; ?>">	
										<?php echo get_the_post_thumbnail($post->ID, 'portfolio-three');?>
										<div class="effect-overlay">
											<div class="zoomin"><a href="<?php echo $full_image[0]; ?>" rel="prettyPhoto"><i class="fa fa-search"></i></a></div>
                                            <?php
											if (get_post_meta($post->ID, 'pyre_custom_link', true) != '') {
											?>	
												<div class="launch"><a href="<?php echo get_post_meta($post->ID, 'pyre_custom_link', true); ?>" target="<?php echo get_post_meta($post->ID, 'pyre_custom_link_target', true); ?>"><i class="fa fa-link"></i></a></div>';
                                            <?php    
											}
											else {
											?>
												<div class="launch"><a href="<?php echo get_permalink($post->ID); ?>"><i class="fa fa-link"></i></a></div>
											<?php
                                            }
											?>
										</div>
										<figcaption>
											<h3><a href="<?php echo get_permalink($post->ID);?>"><?php echo get_the_title(); ?></a></h3>
										</figcaption>
									</figure>
								<?php	
								}
						endif; endwhile; ?>
                    </div>
                    
                </div>
                <?php kriesi_pagination($gallery->max_num_pages, $range = 2); ?>
 			</div>
<?php get_footer(); ?>