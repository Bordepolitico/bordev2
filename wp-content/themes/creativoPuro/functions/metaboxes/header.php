<div class="pyre_metabox">
<?php
$this->select(	'en_header',
				__('Enable Header', 'Creativo'),
				array('yes' => __('Yes', 'Creativo'), 'no' => __('No', 'Creativo')),
				''
			);
			
$this->select(	'header_width',
				__('Header Width', 'Creativo'),
				array('default' => __('Default', 'Creativo'), 'normal' => __('Normal', 'Creativo'), 'expanded' => __('Expanded', 'Creativo')),
				''
			);			

$this->select(	'en_topbar',
				__('Enable Top Bar', 'Creativo'),
				array('default' => __('Default', 'Creativo'), 'yes' => __('Yes', 'Creativo'), 'no' => __('No', 'Creativo')),
				''
			);

$this->select(	'transparent_header',
				__('Enable Transparent header', 'Creativo'),
				array('no' => __('No', 'Creativo'), 'yes' => __('Yes', 'Creativo')),
				''
			);

$this->text('header_transparency',
			__('Header Transparency', 'Creativo'),
			__('Enter transparency in percents. E.g: 60%. Leave blank to make your header fully transparent.<br>This option will only work if you Enable Transparent header option above.', 'Creativo')				
			);	
			
$this->upload('transparent_logo', __('Custom Logo', 'Creativo'), __('Allows you to upload a custom logo for the Transparent Header. ', 'Creativo')); 

$this->colorpicker('transparent_header_color', __('Transparent Header Menu Color', 'Creativo'), __('Select a custom color for the main items of the Header Menu - this will overide the Header Menu settings under Theme Options', 'Creativo')); 


/* Menu selection for header */
$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
$menu_select['default'] = 'Default Menu';

foreach ( $menus as $menu ) {
	$menu_select[$menu->term_id] = $menu->name;
}

$this->select(
	'main_menu',
	__( 'Header Menu', 'Creativo' ),
	$menu_select,
	__( 'Select the menu you want to use inside the Header. Leave Default to use the Menu you set as Menus -> Primary Menu', 'Creativo' )
);

$this->select(
	'top_menu',
	__( 'Top Bar Menu', 'Creativo' ),
	$menu_select,
	__( 'Select the menu you want to use as the Top Bar Menu. Leave Default to use the Menu you set as Menus -> Top Menu', 'Creativo' )
);

$this->select(
	'one_menu',
	__( 'One Page Navigation Menu', 'Creativo' ),
	$menu_select,
	__( 'Select the menu you want to use for your One Page Navigation. Leave Default to use the Menu you set as Menus -> One Page Menu', 'Creativo' )
);

?>
</div>