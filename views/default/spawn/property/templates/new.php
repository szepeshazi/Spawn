<div id="spawn-new-property" class="spawn-entity-property">

	<div class="spawn-entity-property-name">
		<?php echo elgg_view('input/text'); ?>
	</div>

	<div class="spawn-entity-property-type">
	<?php
		$property_options = array();
		$content_types = spawn_get_all_content_types();
		foreach ($content_types as $content_type) {
			$property_options[$content_type] = elgg_echo("spawn:property:content_type:$content_type");
		}
		echo elgg_view('input/dropdown', array('options_values' => $property_options)); 
	?>
	</div>
	
	<div class="spawn-entity-property-actions">
	<?php
		echo elgg_view('output/url', array(
			'href' => "#type:subtype:template:settings",	// escape colons for jQuery
			'rel' => 'toggle',
			'text' => elgg_view_icon('settings-alt') . elgg_echo('spawn:settings:advanced'),
			'class' => 'spawn-settings'
		)); 
	?>
	</div>
	<div class="spawn-entity-property-settings">
		Advanced property settings template
	</div>
	<div class="spawn-entity-property-remove">
		<button class="spawn-property-remove-button">
			<?php echo elgg_view_icon('delete'); ?>
			Remove
		</button>
	</div>
</div>
