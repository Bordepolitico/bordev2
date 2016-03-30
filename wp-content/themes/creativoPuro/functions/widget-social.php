<?php
add_action('widgets_init', 'social_links_load_widgets');

function social_links_load_widgets()
{
	register_widget('Social_Links_Widget');
}

class Social_Links_Widget extends WP_Widget {
	
	function __construct()
	{
		$widget_ops = array('classname' => 'social_links', 'description' => __('Add your social links ','Creativo'));

		$control_ops = array('id_base' => 'social_links-widget');

		parent::__construct( 'social_links-widget', __('Social Links', 'Creativo'), $widget_ops, $control_ops );
		//$this->WP_Widget('social_links-widget', __('Social Links','Creativo'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}
		?>
		<ul class="get_social center clearfix">
        	
            <?php if($instance['twitter_link']): ?>
            	<li><a class="tw" href="<?php echo $instance['twitter_link']; ?>" title="<?php _e("Follow on Twitter", "Creativo"); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
			<?php endif; ?>
			
			<?php if($instance['fb_link']): ?>
				<li><a class="fb" href="<?php echo $instance['fb_link']; ?>" title="<?php _e("Follow on Facebook", "Creativo"); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>		
			<?php endif; ?>            
			
            <?php if($instance['google_link']): ?>
				<li><a class="gp" href="<?php echo $instance['google_link']; ?>" title="<?php _e("Follow on Google+", "Creativo"); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
			<?php endif; ?>	
            
            <?php if($instance['instagram_link']): ?>
				<li><a class="instagram" href="<?php echo $instance['instagram_link']; ?>" title="<?php _e("Follow on Instagram", "Creativo"); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
			<?php endif; ?>
            
            <?php if($instance['flickr_link']): ?>
				<li><a class="flickr" href="<?php echo $instance['flickr_link']; ?>" title="<?php _e("Follow on Flickr", "Creativo"); ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
			<?php endif; ?>	
            
            <?php if($instance['linkedin_link']): ?>
				<li><a class="lnk" href="<?php echo $instance['linkedin_link']; ?>" title="<?php _e("Follow on LinkedIn", "Creativo"); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
			<?php endif; ?>	 
            
            <?php if($instance['pinterest_link']): ?>
				<li><a class="pinterest" href="<?php echo $instance['pinterest_link']; ?>" title="<?php _e("Follow on Pinterest", "Creativo"); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
			<?php endif; ?>          

            <?php if($instance['dribbble_link']): ?>
				<li><a class="dribbble" href="<?php echo $instance['dribbble_link']; ?>" title="<?php _e("Follow on Dribbble", "Creativo"); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
			<?php endif; ?>
            
            <?php if($instance['behance_link']): ?>
				<li><a class="behance" href="<?php echo $instance['behance_link']; ?>" title="<?php _e("Follow on Behance", "Creativo"); ?>" target="_blank"><i class="fa fa-behance"></i></a></li>
			<?php endif; ?>
            
            <?php if($instance['youtube_link']): ?>
				<li><a class="yt" href="<?php echo $instance['youtube_link']; ?>" title="<?php _e("Follow on Youtube", "Creativo"); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
			<?php endif; ?> 
            
            <?php if($instance['soundcloud_link']): ?>
				<li><a class="soundcloud" href="<?php echo $instance['soundcloud_link']; ?>" title="<?php _e("Follow on Soundcloud", "Creativo"); ?>" target="_blank"><i class="fa fa-soundcloud"></i></a></li>
			<?php endif; ?>           
            
            <?php if($instance['tumblr_link']): ?>
				<li><a class="tu" href="<?php echo $instance['tumblr_link']; ?>" title="<?php _e("Follow on Tumblr", "Creativo"); ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
			<?php endif; ?>
            
            <?php if($instance['stumbleupon_link']): ?>
				<li><a class="stumbleupon" href="<?php echo $instance['stumbleupon_link']; ?>" title="<?php _e("Follow on Stumbleupon", "Creativo"); ?>" target="_blank"><i class="fa fa-stumbleupon"></i></a></li>
			<?php endif; ?>
            
            <?php if($instance['vimeo_link']): ?>
				<li><a class="vimeo" href="<?php echo $instance['vimeo_link']; ?>" title="<?php _e("Follow on Vimeo", "Creativo"); ?>" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>
			<?php endif; ?>
            
		</ul>
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		$instance['fb_link'] = $new_instance['fb_link'];
		$instance['twitter_link'] = $new_instance['twitter_link'];
		$instance['google_link'] = $new_instance['google_link'];
		$instance['linkedin_link'] = $new_instance['linkedin_link'];
		$instance['tumblr_link'] = $new_instance['tumblr_link'];
		$instance['flickr_link'] = $new_instance['flickr_link'];
		$instance['youtube_link'] = $new_instance['youtube_link'];
		
		$instance['dribbble_link'] = $new_instance['dribbble_link'];
		$instance['behance_link'] = $new_instance['behance_link'];
		$instance['vimeo_link'] = $new_instance['vimeo_link'];
		$instance['soundcloud_link'] = $new_instance['soundcloud_link'];
		$instance['pinterest_link'] = $new_instance['pinterest_link'];
		$instance['instagram_link'] = $new_instance['instagram_link'];
		$instance['stumbleupon_link'] = $new_instance['stumbleupon_link'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Social Links');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','Creativo');?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('fb_link'); ?>"><?php _e('Facebook Link:','Creativo');?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('fb_link'); ?>" name="<?php echo $this->get_field_name('fb_link'); ?>" type="text" value="<?php echo $instance['fb_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter_link'); ?>"><?php _e('Twitter Link:','Creativo');?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('twitter_link'); ?>" name="<?php echo $this->get_field_name('twitter_link'); ?>" type="text" value="<?php echo $instance['twitter_link']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('linkedin_link'); ?>"><?php _e('LinkedIn Link:','Creativo');?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('linkedin_link'); ?>" name="<?php echo $this->get_field_name('linkedin_link'); ?>" type="text" value="<?php echo $instance['linkedin_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('flickr_link'); ?>"><?php _e('Flickr Link:','Creativo');?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('flickr_link'); ?>" name="<?php echo $this->get_field_name('flickr_link'); ?>" type="text" value="<?php echo $instance['flickr_link']; ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id('tumblr_link'); ?>"><?php _e('Tumblr Link:','Creativo');?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('tumblr_link'); ?>" name="<?php echo $this->get_field_name('tumblr_link'); ?>" type="text" value="<?php echo $instance['tumblr_link']; ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id('google_link'); ?>"><?php _e('Google+ Link:','Creativo');?></label>
			<input class="widefat"  id="<?php echo $this->get_field_id('google_link'); ?>" name="<?php echo $this->get_field_name('google_link'); ?>" type="text" value="<?php echo $instance['google_link']; ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id('youtube_link'); ?>"><?php _e('Youtube Link:','Creativo');?></label>
			<input class="widefat"  id="<?php echo $this->get_field_id('youtube_link'); ?>" name="<?php echo $this->get_field_name('youtube_link'); ?>" type="text" value="<?php echo $instance['youtube_link']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('vimeo_link'); ?>"><?php _e('Vimeo Link:','Creativo');?></label>
			<input class="widefat"  id="<?php echo $this->get_field_id('vimeo_link'); ?>" name="<?php echo $this->get_field_name('vimeo_link'); ?>" type="text" value="<?php echo $instance['vimeo_link']; ?>" />
		</p>        
        
        <p>
			<label for="<?php echo $this->get_field_id('dribbble_link'); ?>"><?php _e('Dribbble Link:','Creativo');?></label>
			<input class="widefat"  id="<?php echo $this->get_field_id('dribbble_link'); ?>" name="<?php echo $this->get_field_name('dribbble_link'); ?>" type="text" value="<?php echo $instance['dribbble_link']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('pinterest_link'); ?>"><?php _e('Pinterest Link:','Creativo');?></label>
			<input class="widefat"  id="<?php echo $this->get_field_id('pinterest_link'); ?>" name="<?php echo $this->get_field_name('pinterest_link'); ?>" type="text" value="<?php echo $instance['pinterest_link']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('instagram_link'); ?>"><?php _e('Instagram Link:','Creativo');?></label>
			<input class="widefat"  id="<?php echo $this->get_field_id('instagram_link'); ?>" name="<?php echo $this->get_field_name('instagram_link'); ?>" type="text" value="<?php echo $instance['instagram_link']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('behance_link'); ?>"><?php _e('Behance Link:','Creativo');?></label>
			<input class="widefat"  id="<?php echo $this->get_field_id('behance_link'); ?>" name="<?php echo $this->get_field_name('behance_link'); ?>" type="text" value="<?php echo $instance['behance_link']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('soundcloud_link'); ?>"><?php _e('SoundCloud Link:','Creativo');?></label>
			<input class="widefat"  id="<?php echo $this->get_field_id('soundcloud_link'); ?>" name="<?php echo $this->get_field_name('soundcloud_link'); ?>" type="text" value="<?php echo $instance['soundcloud_link']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('stumbleupon_link'); ?>"><?php _e('StumbleUpon Link:','Creativo');?></label>
			<input class="widefat"  id="<?php echo $this->get_field_id('stumbleupon_link'); ?>" name="<?php echo $this->get_field_name('stumbleupon_link'); ?>" type="text" value="<?php echo $instance['stumbleupon_link']; ?>" />
		</p>
        
	<?php
	}
}
?>