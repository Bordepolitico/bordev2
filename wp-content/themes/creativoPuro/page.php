<?php get_header(); ?>
    <?php 
	if(get_post_meta($post->ID, 'pyre_en_sidebar', true) != 'no') {
		if(get_post_meta($post->ID, 'pyre_sidebar_pos', true) == 'left') { 
			$container= 'float: right;';
			$sidebar = 'float: left;';	
		}
		else{ 
			$container= 'float: left;';
			$sidebar = 'float: right;';	
		}
	}
	else {
		$container = 'width:100%;';
	}
	?>
		<div class="row">
        	<div class="post_container" style="<?php echo $container; ?>">
            <?php
				while(have_posts()): the_post(); 	
				?>
					<div class="blogpost">
					<?php	
					if(get_post_meta($post->ID, 'pyre_show_featured', true) == 'yes'){			

						if(has_post_thumbnail()):
						?>
							<div class="flexslider ">
								<ul class="slides">
                               		<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
                                    <?php $attachment_data = wp_get_attachment_metadata(get_post_thumbnail_id()); ?>
                                    <li>
                                    	<a href="<?php echo $full_image[0]; ?>" rel="prettyPhoto['gallery']"><?php the_post_thumbnail($featured_img);?></a>                                    
                                    </li>
									<?php 
									$i = 2;
                                    while($i <= $data['featured_images_count']):
										$attachment = new StdClass();
                                        $attachment->ID = kd_mfi_get_featured_image_id('featured-image-'.$i, 'page');
                                        if($attachment->ID):										
                                        ?>
                                        <?php $attachment_image = wp_get_attachment_image_src($attachment->ID, $featured_img); ?>
                                        <?php $full_image = wp_get_attachment_image_src($attachment->ID, 'full'); ?>
                                        <?php $attachment_data = wp_get_attachment_metadata($attachment->ID); ?>
                                            <li>	
                                                <a href="<?php echo $full_image[0] ?>" rel="prettyPhoto['gallery']"><img src="<?php echo $attachment_image[0]; ?>" alt="<?php echo $attachment->post_title; ?>" /></a>	
                                            </li>                                                        
                                        <?php 
                                        endif; 
                                        $i++; 
                                    endwhile;
									?>
								</ul>
								<div class="clear"></div>
							</div>
						<?php
						endif;
					}
					else{
						if((get_post_meta($post->ID, 'pyre_show_featured_one', true) == 'yes') && has_post_thumbnail() ) {
							$full_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blog-full');
							?>
                            <div class="flexslider">
                            	<ul class="slides">
                                	<li>
                            			<a rel="prettyPhoto" href="<?php echo $full_image[0];?>" > <?php the_post_thumbnail('blog-large');?></a>
                                    </li>    
                                </ul>    
                            </div>
                            <?php
						}
					}
						?>
                        <?php /* if(get_post_meta($post->ID, 'pyre_show_title_sec', true) == 'yes'){ ?>
                        	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php } */?>    
                        <div class="post-content">
                            <?php the_content('');?>
                            <div class="single_blogpost_split"></div>
							<?php 
                            wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'Creativo' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span class="navigation_arrow">',
                                'link_after'  => '</span>',
                                ) );
                            ?>
                            <div class="single_blogpost_split"></div>
                            <?php
							if($data['comments_pages']){
								comments_template('', true);
							}
							?>	
                        </div>                        
                    </div>
                    					
				<?php
				endwhile;	
				?>               
             </div>
             <?php 
			 if(get_post_meta($post->ID, 'pyre_en_sidebar', true) != 'no') {
			 ?>
                <!--BEGIN #sidebar .aside-->
                <div class="sidebar" style="<?php echo $sidebar; ?>">                
                    <?php //generated_dynamic_sidebar(); 
                    if ( !function_exists( 'generated_dynamic_sidebar' ) || !generated_dynamic_sidebar() ): 
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