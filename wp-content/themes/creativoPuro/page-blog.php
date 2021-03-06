<?php // Template Name: Blog Style Big Image ?>
<?php get_header(); ?>
    <?php 
		if(get_post_meta($post->ID, 'pyre_sidebar_pos', true) == 'left') { 
			$container= 'float: right;';
			$sidebar = 'float: left;';	
		}
		else{ 
			$container= 'float: left;';
			$sidebar = 'float: right;';	
		}	
	?>

		<div class="row">
        	<div class="post_container" style="<?php echo $container; ?>">
            <?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$blog = new WP_Query('showposts='.$data['posts_count'].'&paged='.$paged);
				
				while($blog->have_posts()): $blog->the_post(); 	
				?>
                	<?php $posttags = get_the_tags(); ?>
                	<?php $more = 0; ?>		
					<div class="blogpost">
				<?php					
						
						if(has_post_thumbnail() || get_post_meta(get_the_ID(), 'pyre_youtube', true) || get_post_meta(get_the_ID(), 'pyre_vimeo', true)):
						?>
							<div class="flexslider" data-interval="0" data-flex_fx="fade">
								<ul class="slides">
									<?php if( get_post_meta($post->ID, 'pyre_youtube', true) != ''){ ?>
									<li class="video-container">                        	
										<?php echo  do_shortcode('[youtube id="'.get_post_meta($post->ID, 'pyre_youtube', true).'"]'); ?>                               
									</li>
									<?php } ?>
									<?php if( get_post_meta($post->ID, 'pyre_vimeo', true) != ''){ ?>
									<li class="video-container">                        
										<?php echo  do_shortcode('[vimeo id="'.get_post_meta($post->ID, 'pyre_vimeo', true).'"]'); ?>
									</li>
									<?php } ?>
                                    
                                    
                                    <?php
									$extra ='';									
									$i = 2;
                                	while($i <= $data['featured_images_count']):
										$attachment = new StdClass();
										$attachment_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
										if($attachment_id):										
											?>
											<?php $attachment_image = wp_get_attachment_image_src($attachment_id, 'blog-large'); ?>
											<?php $full_image = wp_get_attachment_image_src($attachment_id, 'full'); ?>
											<?php $attachment_data = wp_get_attachment_metadata($attachment_id); ?>										
											<?php $extra .= '<li><a href="'.get_permalink().'"><img src="'.$attachment_image[0].'" alt="'.$attachment_data['image_meta']['title'].'" ></a></li>'; ?>
                                        <?php    
										endif; 
										$i++; 
									endwhile; 									
									?>
                                    
                                    <?php
									if(has_post_thumbnail()){	
										if($extra == '') {
									?>								   
                                            <li>
                                                <figure>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <div class="text-overlay"> 
                                                        	<div class="info">
                                                              	<i class="fa fa-search"></i>
                                                            </div>                                                          
                                                        </div>
                                                        <?php the_post_thumbnail($thumbnail); ?>
                                                    </a>  
                                                </figure>                                      
                                            </li>
                                        <?php 
										}
										else{
											?>
                                            <li><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full');?></a></li>
                                            <?php											
											echo $extra; 
										}
										?>
									<?php
									}
									?>

								</ul>
								<div class="clear"></div>
							</div>
						<?php
						endif;
						?>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        
                        <?php 
						if($data['show_date'] || $data['show_author'] || $data['show_categories'] || $data['show_comments']){
						?>
                        	<ul class="post_meta">
								<?php if($data['show_author']){ ?>
                                    <li><i class="fa fa-user"></i><?php _e('by ','Creativo'); the_author_posts_link(); ?></li>
                                <?php } ?> 
                                
                                <?php if($data['show_date']){ ?>
                                    <li><i class="fa fa-clock-o"></i><?php the_time( get_option('date_format') ); ?></li>
                                <?php } ?>
                                
                                <?php if($data['show_categories']){ ?>   
                                	<li><i class="fa fa-bookmark"></i><?php the_category(', '); ?></li>
                                <?php } ?>
                                
                                <?php if($data['show_tags']){ ?>    
                                	<li><i class="fa fa-tag"></i><?php echo count($posttags); ?></li>
                                <?php } ?> 
                                
                                <?php if($data['show_comments']){ ?>    
                                    <li><i class="fa fa-comment"></i><?php comments_popup_link('0', '1', '%'); _e(" Comments" , "Creativo"); ?></li>
                                <?php } ?> 
                            </ul>                                           
                        <?php 
						}
						?>
                        
                        <div class="post-content archive">
                        	<?php 
							if($data['post_content']!='Full Content') { 
                            	 the_excerpt(''); 
							}
							else{
								the_content();
							}
							?>
                        </div>
                      <?php 
						if ( $data['show_view_more']){
						?>
                            <div class="post-atts archive">                                
                                <?php if($data['show_view_more']){ ?>
                                    <a href="<?php the_permalink(); ?>" class="button small button_default "><?php _e('Read More &rarr;', 'Creativo'); ?></a>
                                <?php } ?>   
                            </div>
                        <?php } ?>
                    </div>
                    <div class="blogpost_split"></div>   
                    <?php
				endwhile;	
				?>
                <?php kriesi_pagination($blog->max_num_pages, $range = 2); ?> 
             </div>
              <!--BEGIN #sidebar .aside-->
            <div class="sidebar" style="<?php echo $sidebar; ?>">                
            	<?php //generated_dynamic_sidebar(); 
                if ( !function_exists( 'generated_dynamic_sidebar' ) || !generated_dynamic_sidebar() ): 
                endif;
                ?>          
            <!--END #sidebar .aside-->
            </div>
             <div class="clr"></div>   
        </div>        
       <div class="clr"></div>		
<?php get_footer(); ?>