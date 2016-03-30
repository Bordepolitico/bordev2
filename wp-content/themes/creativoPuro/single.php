<?php get_header(); ?>    
        <?php
		$has_slides = false;
		if(get_post_meta($post->ID, 'pyre_en_sidebar', true) == 'yes'){
			$en_sidebar = 'yes';
			$outer_container = 'post_container';
			$extra = 'extra-width';
			$coloane = 3;	
			$items = $data['related_items'];		
			if(get_post_meta($post->ID, 'pyre_sidebar_pos', true) == 'left') { 
				$container= 'float: right;';
				$sidebar = 'float: left;';	
			}
			else{ 
				$container= 'float: left;';
				$sidebar = 'float: right;';	
			}	
		}
		else{
			$outer_container = 'post_container_full';
			$coloane = 5;
			$extra ='extra-width-full';
			$items = $data['related_items'];			
		}
	?>  
    <div class="row">
        	<div class="<?php echo $outer_container; ?>" style="<?php echo $container; ?>">            
            <?php				
				while(have_posts()): the_post(); 	
				?>
					<div class="blogpost">
                    <?php 
					if($data['show_post_navi']){	?>
                    	<div class="portfolio-navigation">
							<?php next_post_link('%link', '<div class="portfolio-navi-next"><i class="fa fa-angle-left"></i>'.__('Next ','Creativo').'</div>'); ?>
                            <?php previous_post_link('%link', '<div class="portfolio-navi-previous">'.__('Previous ','Creativo').'<i class="fa fa-angle-right"></i></div>'); ?>
                            <div class="clear"></div>
                        </div>
					<?php
					}
					if(get_post_meta(get_the_ID(), 'pyre_show_featured', true)=='yes') {
						if(has_post_thumbnail() || get_post_meta(get_the_ID(), 'pyre_youtube', true) || get_post_meta(get_the_ID(), 'pyre_vimeo', true)):
						?>
							<div class="flexslider" data-interval="0" data-flex_fx="fade">
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
                                        $attachment->ID = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
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
						<?php
						endif;
						}
						?>
                        
                        <h1><?php the_title(); ?></h1>
                        
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
                                
                                <?php if($data['show_comments']){ ?>    
                                    <li><i class="fa fa-comment"></i><?php _e('Comments: ','Creativo');  comments_popup_link('0', '1', '%'); ?></li>
                                <?php } ?> 
                            </ul>                                           
                        <?php 
						}
						?>
                        
                                    
                        <div class="post-content">
                            <?php the_content(''); ?>
                        </div>                        
                        <?php 
						if($data['show_tags']){
						?>
                            <div class="post-atts">                                                               	   
                                <span><?php _e('Tags: ','Creativo');?></span> <span class="single_post_tags"><?php  the_tags('',' '); ?></span>                                                                       
                            </div>
                        <?php } ?>
                    </div>
                    
                    <?php 
					wp_link_pages( array(
						'before'      => '<div class="single_blogpost_split"></div><div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'Creativo' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span class="navigation_arrow">',
						'link_after'  => '</span>',
						) );
					?>
                    <div class="single_blogpost_split"></div> 
                    <?php
						if($data['social_icons']){
					?>
                    	
                            <div class="social_icons">
                                <div class="share_text"><?php _e('Share this post: ','Creativo'); ?></div>    
                                <ul class="get_social">
                                    <li><a class="fb" href="http://www.facebook.com/sharer.php?m2w&s=100&p&#91;url&#93;=<?php the_permalink(); ?>&p&#91;title&#93;=<?php the_title(); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a class="tw" href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="lnk" href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="rd" href="http://reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" target="_blank"><i class="fa fa-reddit"></i></a></li>
                                    <li><a class="tu" href="http://www.tumblr.com/share/link?url=<?php echo urlencode(get_permalink()); ?>&amp;name=<?php echo urlencode($post->post_title); ?>&amp;description=<?php echo urlencode(get_the_excerpt()); ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                                    <li><a class="gp" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                                <div class="clr"></div>
                            </div>
                    <?php
						}
					?>
                     <?php
						if($data['show_author']){
					?>
                        <div class="posts-boxes">
                            <!--<div class="content_box_title"><span class="white smaller"><?php _e('About the Author', 'Creativo'); ?></span></div> -->
                            <div class="author_box">
                                <div class="author_pic">
                                    <?php 
                                        echo get_avatar( get_the_author_meta('id'), $size = '80'); 
                                    ?>
                                </div>
                                <h3><?php the_author_posts_link(); ?></h3>
                                <?php the_author_meta( 'description'); ?>
                                <div class="clear"></div>
                            </div>
                        </div>
                     <?php } ?>   
                     <?php
				    if($data['related_posts']) { 
					?>
					 <?php $relate = get_related_posts($post->ID,$items); ?>
							<?php if($relate->have_posts()): ?>
							<div class="posts-boxes">
								<div class="content_box_title">
                                	<span class="white smaller"><?php _e('Related Posts', 'Creativo'); ?></span>
                                </div>
                                <div class="recent_posts_container">
                                	<?php
									$count = 1;
									$i = 3;
									
									while($relate->have_posts()): $relate->the_post();						
										/*
										if(($count == $i) && ($count < $coloane)){
											echo '<div class="clear-responsive"></div><article class="col '.$extra.'">';
											$i = $i + 2;
										}
										elseif(($count == $i) && ($count == $coloane)){
											echo '<div class="clear-responsive"></div><article class="col '.$extra.' last">';
											$i = $i + 2;
										}
										else{
											echo '<article class="col '.$extra.'">';
										}
										*/
										?>
                                        <article class="col <?php echo $extra; ?>">
                                       
                                        
                                        <?php

										if(has_post_thumbnail() || get_post_meta($post->ID, 'pyre_youtube', true) || get_post_meta($post->ID, 'pyre_vimeo', true)):
										?>
                                        	<div class="flexslider mini related_posts">
                                            	<ul class="slides">
                                                <?php
													if(get_post_meta($post->ID, 'pyre_youtube', true)):
														echo '<li><div class="video-container" style="height:12px;"><iframe title="YouTube video player" width="218px" height="134px" src="http://www.youtube.com/embed/' . get_post_meta($post->ID, 'pyre_youtube', true) . '" frameborder="0" allowfullscreen></iframe></div></li>';
													endif;
													if(get_post_meta($post->ID, 'pyre_vimeo', true)):
														echo '<li><div class="video-container" style="height:12px;"><iframe src="http://player.vimeo.com/video/' . get_post_meta($post->ID, 'pyre_vimeo', true) . '" width="220px" height="161px" frameborder="0"></iframe></div></li>';
													endif;													
													
													if(has_post_thumbnail()):
													
														$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'recent-posts');
														$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
														$attachment_data = wp_get_attachment_metadata(get_post_thumbnail_id());														
															echo '<li><div class="one-fourth-recent"><figure><a href="'.get_permalink($post->ID).'"><div class="text-overlay"><div class="info">
                                                                <i class="fa fa-search"></i>                                                              
                                                            </div></div></figure>'.get_the_post_thumbnail($post->ID, 'recent-posts').'</a></div></li>';
																
													endif;													
													
												?>
                                                </ul>
                                            </div>
                                        <?php
										endif;	
											echo '<div class="description">';
												echo '<center><h4><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></h4></center>';												
											echo '</div>';
										echo'</article>';
										$count++;								
									endwhile;
									
									?>
                                <div class="clear"></div>
                             </div>   
                         </div>                                
                               
						<?php endif; wp_reset_query(); ?>
                     <?php } ?>
                            
                    <?php
						if($data['show_comments']){
					?>                    
                    	<?php comments_template('', true); ?>  
                    <?php
						}
				endwhile;	
				?>
             </div>
             <?php
			 if($en_sidebar == 'yes'){
			 ?>
				 <!--BEGIN #sidebar .aside-->
				<div class="sidebar" style="<?php echo $sidebar; ?>">                
					<?php
					if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Blog Sidebar')): 
					endif;
					?>            
				<!--END #sidebar .aside-->
				</div>
              <?php 
			  }
			  ?>  
             <div class="clr"></div>   
        </div>        
       <div class="clr"></div>		
	
<?php get_footer(); ?>