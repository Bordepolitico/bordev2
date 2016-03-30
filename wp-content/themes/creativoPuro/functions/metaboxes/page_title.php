<div class="pyre_metabox">

<?php
$this->select(	'show_title',
				__('Show Page Title and Breadcumb Section', 'Creativo'),
				array('yes' => __('Yes', 'Creativo'), 'no' => __('No', 'Creativo')),
				''
			);
?>
<?php
$this->select(	'show_page_title',
				__('Show Page Title', 'Creativo'),
				array('yes' => __('Yes', 'Creativo'), 'no' => __('No', 'Creativo')),
				''
			);
?>
<?php
$this->select(	'show_breadcrumb',
				__('Show Breadcrumb', 'Creativo'),
				array('yes' => __('Yes', 'Creativo'), 'no' => __('No', 'Creativo')),
				''
			);
?>

<?php
$this->select(	'show_searchbox',
				__('Show Searchbox', 'Creativo'),
				array('default' => __('Default', 'Creativo'),'yes' => __('Yes', 'Creativo'), 'no' => __('No', 'Creativo')),
				''
			);
?>

<?php
$this->select(	'page_title_align',
				__('Elements Positioning', 'Creativo'),
				array('left' => __('Left', 'Creativo'), 'right' => __('Right', 'Creativo') , 'center' => __('Center', 'Creativo')),
				''
			);
?>

<?php
$this->text(	'page_title_custom',
				__('Page Title Custom text', 'Creativo'),
				'Enter a custom text to be used instead of the Title you set for your page'
			);
?>

<?php
$this->text(	'page_title_subheading',
				__('Page Title SubHeading text', 'Creativo'),
				'Enter a custom sub heading text to be used below the Title'
			);
?>

<?php
$this->text(	'page_title_font_size',
				__('Page Title Font Size', 'Creativo'),
				'Set the Page Title font size in pixels - also used for the Page Title Custom Text. E.g: 40px'
			);
?>

<?php
$this->text(	'page_title_subhead_font_size',
				__('Page Title SubHeading Font Size', 'Creativo'),
				'Set the Page Title SubHeading font size in pixels. E.g: 20px'
			);
?>
<?php
$this->text(	'breadcrumb_font_size',
				__('Breadcrumb Font Size', 'Creativo'),
				'Set the Breadcrumb font size in pixels. E.g: 14px'
			);
?>
<?php
$this->text(	'page_title_height',
				__('Page Title Area Height', 'Creativo'),
				'Set the Page Title Area Height in pixels. E.g: 300px'
			);
?>
<?php
$this->text(	'page_title_top_padding',
				__('Page Title Top Padding', 'Creativo'),
				'Set a padding top in pixels for the Page Title area. Useful when using the Transparent Header option. E.g: 90px'
			);
?>
<?php
$this->colorpicker('page_title_bg_color', __('Page Title Background Color', 'Creativo'), __('Select a background color for the Page Title area - this will overide the Header Menu settings under Theme Options', 'Creativo')); 
?>
<?php
$this->colorpicker('page_title_font_color', __('Page Title & SubHeading Text Color', 'Creativo'), __('Select a color for the Page Title & SubHeading', 'Creativo')); 
?>
<?php
$this->colorpicker('breadcrumb_font_color', __('Breadcrumbs Text Color', 'Creativo'), __('Select a color for the Breadcrumbs', 'Creativo')); 
?>
<?php 
$this->upload('page_title_bg_img', __('Page Title Background Image', 'Creativo'), __('Upload a background image for the Page Title area', 'Creativo')); ?>
<?php
$this->colorpicker('page_title_mask', __('Page Title Mask Color', 'Creativo'), __('Add a colored mask over the background image.', 'Creativo')); 
?>
<?php
$this->text(	'page_title_mask_transparency',
				__('Page Title Mask Transparency', 'Creativo'),
				'Set the transparency in %. Higher values will make the mask more transparent. E.g: 70%'
			);
?>

<?php
$this->select(	'page_title_bg_img_full',
				__('Enable FullScreen Background Image', 'Creativo'),
				array('no' => __('No', 'Creativo'), 'yes' => __('Yes', 'Creativo')),
				''
			);
?>
<?php
$this->select(	'page_title_parallax',
				__('Enable Parallax effect', 'Creativo'),
				array('no' => __('No', 'Creativo'), 'yes' => __('Yes', 'Creativo')),
				''
			);
?>
</div>