<div class="pyre_metabox">
<?php
$this->text(	'link',
				__('Client Link', 'Creativo'),
				''
			);
?>

<?php
$this->select(	'target',
				__('Link Target', 'Creativo'),
				array('_self' => __('Same Window', 'Creativo'), '_blank' => __('New Window', 'Creativo')),
				''
			);
?>
</div>