<div class='pyre_metabox'>
<?php
$this->select(	'skip_first',
				__('Skip first Featured Image', 'Creativo'),
				array('no' => __('No', 'Creativo'), 'yes' => __('Yes', 'Creativo')),
				''
			);
?>

<?php
$this->select(	'show_featured',
				__('Show Featured Images and Videos', 'Creativo'),
				array('yes' => __('Yes', 'Creativo'), 'no' => __('No', 'Creativo')),
				__('Display featured images and videos at the beggining of the post.', 'Creativo')
			);
?>
<?php
$this->select(	'en_sidebar',
				__('Enable Sidebar', 'Creativo'),
				array('yes' => __('Yes', 'Creativo'), 'no' => __('No', 'Creativo')),
				''
			);
?>
<?php
$this->select(	'sidebar_pos',
				__('Sidebar Position', 'Creativo'),
				array('right' => __('Right', 'Creativo'), 'left' => __('Left', 'Creativo')),
				''
			);
?>

</div>