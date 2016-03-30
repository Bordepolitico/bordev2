<?php get_header(); ?>
	
	<?php
	$items = $data['portfolio_related_items'];
	$has_slides = false;
	if(get_post_meta($post->ID, 'pyre_width', true) == 'half') {
		$portfolio_width = 'half';
		$desc_width = 'half_desc';
		$add_css = 'portfolio-misc-responsive';
		$margin = '';
		$featured_img = 'blog-large';
		
	} else {
		$portfolio_width = 'full';
		$desc_width = 'full_desc clearfix';
		$add_css = 'portfolio-misc-info-left';
		$margin = 'no-margin';
		$featured_img = 'portfolio-full';
	}
	?>
    <div class="row">
        <div class="portfolio-area <?php echo $margin; ?>">
        	<?php if($data['show_port_navi']) { ?>  
        	<div class="portfolio-navigation">
				<?php next_post_link('%link', '<div class="portfolio-navi-next"><i class="fa fa-angle-left"></i>'.__('Previous ','Creativo').'</div>'); ?>
                <?php previous_post_link('%link', '<div class="portfolio-navi-previous">'.__('Next ','Creativo').'<i class="fa fa-angle-right"></i></div>'); ?>
                <div class="clear"></div>
            </div> 
            <?php } ?>         
            <?php while(have_posts()): the_post(); ?>
            <div id="post-<?php the_ID(); ?>" >
                <?php
                
                if(has_post_thumbnail() || get_post_meta($post->ID, 'pyre_youtube', true) || get_post_meta($post->ID, 'pyre_vimeo', true)):
                ?>
                <div class="flexslider <?php echo $portfolio_width; ?>" data-interval="0" data-flex_fx="fade">
                    <ul class="slides">
                        <?php if( get_post_meta($post->ID, 'pyre_youtube', true) != ''){ ?>
                        <li class="video-container">                        	
                            <?php echo  do_shortcode('[youtube id="'.get_post_meta($post->ID, 'pyre_youtube', true).'" ]'); ?>                               
                        </li>
                        <?php } ?>
                        <?php if( get_post_meta($post->ID, 'pyre_vimeo', true) != ''){ ?>
                        <li class="video-container">                        
                            <?php echo  do_shortcode('[vimeo id="'.get_post_meta($post->ID, 'pyre_vimeo', true).'" width="600" height="350"]'); ?>
                        </li>
                        <?php } ?>
                        
                        <?php
						if(has_post_thumbnail() && ( get_post_meta(get_the_ID(), 'pyre_skip_first', true) !='yes' )){	
						?>						   
							<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
							<?php $attachment_data = wp_get_attachment_metadata(get_post_thumbnail_id()); ?>
							<li>
								<a href="<?php echo $full_image[0]; ?>" rel="prettyPhoto['gallery']"><?php the_post_thumbnail('full');?></a>                                    
							</li>
                        <?php } 
						
						$i = 2;
                        while($i <= $data['featured_images_count']):
							$attachment = new StdClass();
							$attachment->ID = kd_mfi_get_featured_image_id('featured-image-'.$i, 'creativo_portfolio');
							if($attachment->ID):										
							?>
							
							<?php $full_image = wp_get_attachment_image_src($attachment->ID, 'full'); ?>
							<?php $attachment_data = wp_get_attachment_metadata($attachment->ID); ?>
								<li>	
									<a href="<?php echo $full_image[0] ?>" rel="prettyPhoto['gallery']"><img src="<?php echo $full_image[0]; ?>" alt="<?php echo $attachment->post_title; ?>" /></a>	
								</li>                                                        
							<?php 
								$has_slides = true;
							endif; 
							$i++; 
						endwhile; 
						
						if(!$has_slides && ( get_post_meta(get_the_ID(), 'pyre_skip_first', true) =='yes') ) {
							echo '<li></li>';
						}
					?>		
                    </ul>
                    <div class="clear"></div>
                    
                </div>
                <?php endif; ?>
                <div class="project-content <?php echo $desc_width; ?>">
                	<h2><?php the_title(); ?></h2>
                    <?php if( $data['project_date'] != '0') : ?>
						<div class="date"><i class="fa fa-clock-o"></i><?php the_time( get_option('date_format') ); ?></div> 
                    <?php endif; ?>
                    <div class="project-description <?php if(!$data['project_details']) : echo 'full_description'; endif ?>">
						<?php the_content(); ?>
                    </div>
                <?php if($data['project_details']){ ?>                	
                    <div class="portfolio-misc-info <?php echo $add_css; ?>">                     	
                        
                        <?php if(get_post_meta($post->ID, 'pyre_client_name', true)): ?>                  	
                            <div class="project-info-box clearfix">
                            	<?php 
								if( ( $data['pd_custom' ]) && $data['client_name_custom'] != 'Client name' ) {
									?>
                                	<div class="left_content"><?php echo $data['client_name_custom']; ?></div>
                                    <?php
								}
								else{
								?>
                                	<div class="left_content"><?php _e('Client name', 'Creativo'); ?></div>                            
                                <?php
								}
								?>    
                                <div class="right_content"><?php echo get_post_meta($post->ID, 'pyre_client_name', true); ?></div>                            
                            </div>
                        <?php endif; ?>
                        
                        <?php if(get_post_meta($post->ID, 'pyre_skills', true)): ?>
                            <div class="project-info-box clearfix">
                            	<?php 
								if( ( $data['pd_custom' ]) && $data['skills_custom'] != 'Skills' ) {
									?>
                                	<div class="left_content"><?php echo $data['skills_custom']; ?></div>                           
                                	<?php
								}
								else{
									?>
                                	<div class="left_content"><?php _e('Skills', 'Creativo'); ?></div>                           
                                	<?php
								}
								?>
                                <div class="right_content"><?php echo get_post_meta($post->ID, 'pyre_skills', true); ?> </div>                            
                            </div>
                        <?php endif; ?>
                        
                        <?php if(get_the_term_list($post->ID, 'portfolio_category', '', '<br />', '')): ?>
                            <div class="project-info-box clearfix">
                            	<?php 
								if( ( $data['pd_custom' ]) && $data['category_custom'] != 'Category' ) {
								?>
                                	<div class="left_content"><?php echo $data['category_custom']; ?></div>                           
                                <?php
								}
								else {
								?>
                                	<div class="left_content"><?php _e('Category', 'Creativo'); ?></div>                           
                                <?php
								}
								?>
                                <div class="right_content"><?php echo get_the_term_list($post->ID, 'portfolio_category', '', ', ', ''); ?></div>                            
                            </div>
                        <?php endif; ?>
                        
                        <?php if(get_post_meta($post->ID, 'pyre_website_text', true) && get_post_meta($post->ID, 'pyre_website_url', true)): ?>
                            <div class="project-info-box clearfix no-border">
                            	<?php 
								if( ( $data['pd_custom' ]) && $data['website_custom'] != 'Website' ) {
								?>
                                	<div class="left_content"><?php echo $data['website_custom']; ?></div>
                                <?php
								}
								else {
								?>    
                                    <div class="left_content"><?php _e('Website', 'Creativo'); ?></div>
                                <?php
								}
								?>    
                                <div class="right_content"><a href="<?php echo get_post_meta($post->ID, 'pyre_website_url', true); ?>" rel="nofollow" target="_blank"><?php echo get_post_meta($post->ID, 'pyre_website_text', true); ?></a></div>
                            </div>
                        <?php endif; ?>
                        <?php
							if($data['port_social_icons']){
						?>
                                <ul class="get_social no-float social_ic_margin">
                                    <li><a class="fb" href="http://www.facebook.com/sharer.php?s=100&p&#91;url&#93;=<?php the_permalink(); ?>&p&#91;title&#93;=<?php the_title(); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="tw" href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="lnk" href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="rd" href="http://reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" target="_blank"><i class="fa fa-reddit"></i></a></li>
                                    <li><a class="tu" href="http://www.tumblr.com/share/link?url=<?php echo urlencode(get_permalink()); ?>&amp;name=<?php echo urlencode($post->post_title); ?>&amp;description=<?php echo urlencode(get_the_excerpt()); ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                                    <li><a class="gp" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                        <?php
							}
						?>       
                    </div> 
                    <?php } ?>                             
                    
                </div>
                <div class="clear"></div>
               
            </div>
            <?php endwhile; ?>
        </div>
        <?php
        if($data['related_projects']) { 
		?>
         <?php $relate = get_related_projects($post->ID,$items); ?>
                <?php if($relate->have_posts()): ?>
                <div class="portfolio-related">
                    <div class="content_box_title"><span class="white smaller"><?php _e('Related Projects', 'Creativo'); ?></span></div>
                    <div class="recent_posts_container">
                    		<?php 
							while($relate->have_posts()): $relate->the_post(); 

									
								$args_item = array(
											'post_type' => 'attachment',
											'numberposts' => '4',
											'post_status' => null,
											'post_parent' => $post->ID,
											'orderby' => 'menu_order',
											'order' => 'ASC',
											'exclude' => get_post_thumbnail_id()
										);
								$attachments_item = get_posts($args_item);
							?>
                            	<article class="col extra-width-full-port">
                            		<div class="flexslider mini related_posts">
                                    	<ul class="slides">
										<?php
										if(get_post_meta($post->ID, 'pyre_youtube', true) || get_post_meta($post->ID, 'pyre_vimeo', true)){
											if(get_post_meta($post->ID, 'pyre_youtube', true)):
												echo '<li><div class="video-container" style="height:12px;"><iframe title="YouTube video player" width="218px" height="134px" src="http://www.youtube.com/embed/' . get_post_meta($post->ID, 'pyre_youtube', true) . '" frameborder="0" allowfullscreen></iframe></div></li>';
											endif;
											
											if(get_post_meta($post->ID, 'pyre_vimeo', true)):
												echo '<li><div class="video-container" style="height:12px;"><iframe src="http://player.vimeo.com/video/' . get_post_meta($post->ID, 'pyre_vimeo', true) . '" width="220px" height="161px" frameborder="0"></iframe></div></li>';
											endif;	
											
											foreach($attachments_item as $attachment):
												$attachment_image = wp_get_attachment_image_src($attachment->ID,  'recent-posts');												
												echo '<li><a href="'.get_permalink($post->ID).'"><img src="'. $attachment_image[0].'" alt="'.$attachment->post_title.'" /></a></li>';
											endforeach;
											
										}
										else{
											echo '<li><div class="one-fourth-recent"><figure><a href="'.get_permalink($post->ID).'"><div class="text-overlay"><div class="info"><i class="fa fa-search"></i></div></div></figure>'.get_the_post_thumbnail($post->ID, 'recent-posts').'</a></div></li>';
											
										}
                                        ?>
                                        </ul>
                                    </div>  
									<?php
                                    echo '<div class="description">';
                                        echo '<center><h4><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></h4></center>';												
                                    echo '</div>';
                                	?>
                            	</article>
							<?php
							endwhile;
						?>            
                    </div>
                </div>
                <?php endif; ?>
          <?php } ?>      
    </div>    
<?php get_footer(); ?>