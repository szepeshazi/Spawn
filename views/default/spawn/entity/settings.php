<?php 
	extract(array_intersect_key($vars, array('type' => true, 'subtype' => true)));

	$entity_properties = spawn_get_entity_properties();
	$core_properties = spawn_get_core_properties($type);
	
?>

<?php foreach ($entity_properties as $property => $description) : ?>
	<?php if (!$description['protected']): ?>
	<div id="property:<?php echo "$type:$subtype:$property"; ?>" class="spawn-entity-property">

		<div class="spawn-entity-property-name">
			<?php echo elgg_echo("spawn:property:entity:$property"); ?>
		</div>
		
		<div class="spawn-entity-property-type">
		<?php
			$property_options = array();
			foreach ($description['content_types'] as $content_type) {
				$property_options[$content_type] = elgg_echo("spawn:property:content_type:$content_type");
			}
			echo elgg_view('input/dropdown', array(
				'name' => "property_type:$type:$subtype:$property",
				'options_values' => $property_options
			)); 
		?>
		</div>
		
		<div class="spawn-entity-property-actions">
		<?php
			echo elgg_view('output/url', array(
				'href' => "#$type\\:$subtype\\:$property\\:settings",	// escape colons for jQuery
				'rel' => 'toggle',
				'text' => elgg_view_icon('settings-alt') . elgg_echo('spawn:settings:advanced'),
				'class' => 'spawn-settings'
			)); 
		?>
		</div>
	</div>
	<div id="<?php echo "$type:$subtype:$property:settings"; ?>" class="spawn-entity-property-settings">
		<div class="spawn-property-settings-spacer">&nbsp;</div>
		<?php echo elgg_view("spawn/property/advanced_settings/" . $description['content_types'][0]); ?>
	</div>
	
	<?php endif; ?>
<?php endforeach; ?>

<?php foreach ($core_properties as $property => $description) : ?>
	<?php if (!$description['protected']): ?>
	<div class="spawn-entity-property">

		<div class="spawn-entity-property-name">
			<?php echo elgg_echo("spawn:property:$type:$property"); ?>
		</div>

		<div class="spawn-entity-property-type">
		<?php
			$property_options = array();
			foreach ($description['content_types'] as $content_type) {
				$property_options[$content_type] = elgg_echo("spawn:property:content_type:$content_type");
			}
			echo elgg_view('input/dropdown', array(
				'name' => "property_type:$type:$subtype:$property",
				'options_values' => $property_options
			)); 
		?>
		</div>
		
		<div class="spawn-entity-property-actions">
		<?php
			echo elgg_view('output/url', array(
				'href' => "#$type\\:$subtype\\:$property\\:settings",	// escape colons for jQuery
				'rel' => 'toggle',
				'text' => elgg_view_icon('settings-alt') . elgg_echo('spawn:settings:advanced'),
				'class' => 'spawn-settings'
			)); 
		?>
		</div>
		<div id="<?php echo "$type:$subtype:$property:settings"; ?>" class="spawn-entity-property-settings">
			<?php echo "$type:$subtype:$property:settings"; ?>
		</div>
	</div>
	<?php endif; ?>
<?php endforeach; ?>

<?php echo elgg_view('spawn/property/add'); ?>
