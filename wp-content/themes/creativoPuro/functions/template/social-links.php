<?php global $data;
if($data['en_social_icons_header']) { 					
?>
	<div class="top_social clearfix">
		<?php if($data['twitter']) { ?><a href="<?php echo $data['twitter']; ?>" class="twitter" title="<?php _e('Follow on Twitter', 'Creativo');?>" target="_blank" rel="nofollow"><i class="fa fa-twitter"></i></a> <?php } ?>
		<?php if($data['facebook']) { ?><a href="<?php echo $data['facebook']; ?>" class="facebook" title="<?php _e("Follow on Facebook", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i></a><?php } ?>
		<?php if($data['instagram']) { ?><a href="<?php echo $data['instagram']; ?>" class="instagram" title="<?php _e("Follow on Instagram", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-instagram"></i></a><?php } ?>
		<?php if($data['google']) { ?><a href="<?php echo $data['google']; ?>" class="google" title="<?php _e("Follow on Google+", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-google-plus"></i></a><?php } ?>
		<?php if($data['linkedin']) { ?><a href="<?php echo $data['linkedin']; ?>" class="linkedin" title="<?php _e("Follow on LinkedIn", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-linkedin"></i></a><?php } ?>
		<?php if($data['pinterest']) { ?><a href="<?php echo $data['pinterest']; ?>" class="pinterest" title="<?php _e("Follow on Pinterest", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-pinterest"></i></a><?php } ?>
		<?php if($data['flickr']) { ?><a href="<?php echo $data['flickr']; ?>" class="flickr" title="<?php _e("Follow on Flickr", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-flickr"></i></a><?php } ?>
		<?php if($data['tumblr']) { ?><a href="<?php echo $data['tumblr']; ?>" class="tumblr" title="<?php _e("Follow on Tumblr", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-tumblr"></i></a><?php } ?>
		<?php if($data['youtube']) { ?><a href="<?php echo $data['youtube']; ?>" class="youtube" title="<?php _e("Follow on YouTube", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-youtube-play"></i></a><?php } ?>
		<?php if($data['behance']) { ?><a href="<?php echo $data['behance']; ?>" class="behance" title="<?php _e("Follow on Behance", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-behance"></i></a><?php } ?>
		<?php if($data['dribbble']) { ?><a href="<?php echo $data['dribbble']; ?>" class="dribbble" title="<?php _e("Follow on Dribbble", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-dribbble"></i></a><?php } ?>
		<?php if($data['vimeo']) { ?><a href="<?php echo $data['vimeo']; ?>" class="vimeo" title="<?php _e("Follow on Vimeo", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-vimeo-square"></i></a><?php } ?>
		<?php if($data['stumbleupon']) { ?><a href="<?php echo $data['vimeo']; ?>" class="stumbleupon" title="<?php _e("Follow on Vimeo", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-stumbleupon"></i></a><?php } ?>
		<?php if($data['xing']) { ?><a href="<?php echo $data['xing']; ?>" class="xing" title="<?php _e("Follow on Xing", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-xing"></i></a><?php } ?>
		<?php if($data['soundcloud']) { ?><a href="<?php echo $data['soundcloud']; ?>" class="soundcloud" title="<?php _e("Follow on SoundCloud", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-soundcloud"></i></a><?php } ?>
 		<?php if($data['rss']) { ?><a href="<?php echo $data['rss']; ?>" class="rss" title="<?php _e("Rss", "Creativo"); ?>" target="_blank"><i class="fa fa-rss"></i></a><?php } ?>
                        
	</div>
<?php 
}
?>
