<?php // Template Name: One Page Navigation ?>
<?php get_header(); ?>
		<div class="row_full">
            	<?php while(have_posts()): the_post(); ?>                	          	
			    	<?php the_content(); ?>
                                   
                <?php endwhile; ?> 
        </div>        
       <div class="clr"></div>		
<?php get_footer(); ?>