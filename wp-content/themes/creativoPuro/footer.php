<?php global $data; ?>
		
		<footer class="footer">
        	<?php
			if($data['en_cta']){
			?>
            <div class="action_bar">
                <div class="action_bar_inner">                
                	<h2><?php echo $data['cta_text_real']; ?></h2>
                	<a href="<?php echo $data['cta_button_link']; ?>" class="button button_default large custompos" target="_self"><?php echo $data['cta_button_text']; ?></a>
                </div>
            </div>  
            <?php 
			}
			?>
        	<?php 
			if (  is_active_sidebar( 'sidebar-2'  )) {
			?>	
				<div class="footer_widget">
					<div id="footer_widget_inside">
						<?php
						if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-2')): 
						endif;
						?>
						<div class="clr"></div>
					</div>
				</div>
            <?php
			}
			?>  
            
        	<div class="inner">
            	<div class="copyright">
                	<?php 
						if($data['footer_copyright']) { 
							echo $data['footer_copyright'];
						}
					?>                    
                </div>
                
             	<?php
						if($data['footer_right_area'] ) {	 
							if($data['footer_right_area'] =='socialinks_footer') { 
								get_template_part('functions/template/social-links-footer');
							} 
							elseif ($data['footer_right_area'] =='footer_menu') {
								get_template_part('functions/template/footer-menu');
							}
						}
						else{
							get_template_part('functions/template/social-links-footer');
						}
                        ?>
            </div>
        </footer>
	</div>
<?php if($data['en_back_top']) { ?>    
		<div id="gotoTop"></div>    
<?php
	}
	
	
//	require_once(get_template_directory().'/style-selector/style_selector.php');
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	
	wp_footer();
	
?>
</body>
</html>
