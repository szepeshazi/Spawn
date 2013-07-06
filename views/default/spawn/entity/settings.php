<?php 
	extract(array_intersect_key($vars, array('type' => true, 'subtype' => true))); 

	$entity_properties = spawn_get_entity_properties();
	$core_properties = spawn_get_core_properties($type);
	
?>

<?php foreach ($entity_properties as $property => $description) : ?>
	<?php if (!$description['protected']): ?>
	<div class="spawn-entity-property">

		<div class="spawn-entity-property-name">
			<?php echo elgg_echo("spawn:property:entity:$property"); ?>
		</div>
		
		<div class="spawn-entity-property-type">
		<?php
			$property_options = array();
			foreach ($description['content_types'] as $content_type) {
				$property_options[$content_type] = elgg_echo("spawn:property:content_type:$content_type");
			}
			echo elgg_view('input/dropdown', array('options_values' => $property_options)); 
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
			echo elgg_view('input/dropdown', array('options_values' => $property_options)); 
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

<div class="spawn-entity-property">
	<span class="spawn-entity-property-name">
		Add new property
	</span>
</div>


