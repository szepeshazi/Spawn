<?php 
	extract(array_intersect_key($vars, array('type' => true, 'subtype' => true))); 

	$entity_properties = spawn_get_entity_properties();
	$core_properties = spawn_get_core_properties($type);
	
	/*
	$property_options = array();
	foreach ($properties as $property => $description) {
		if (!$description['protected']) {
			$property_options[$property] = elgg_echo("spawn:property:$type:$property");
		}
	}
	*/
?>

<?php foreach ($entity_properties as $property => $description) : ?>
	<?php if (!$description['protected']): ?>
		<div class="spawn-entity-property">

			<span class="spawn-entity-property-name elgg-icon elgg-icon-delete-alt">
				<?php echo elgg_echo("spawn:property:entity:$property"); ?>
			</span>
			
			<?php
				echo elgg_view('output/url', array(
					'href' => "#$type\\:$subtype\\:$property\\:settings",	// escape colons for jQuery
					'rel' => 'toggle',
					'text' => elgg_echo('settings'),
					'class' => 'spawn-settings elgg-icon elgg-icon-settings-alt'
				)); 
			?>			
			
			<div id="<?php echo "$type:$subtype:$property:settings"; ?>" class="spawn-settings">
				<?php echo "$type:$subtype:$property:settings"; ?>
			</div>
		
		</div>
	<?php endif; ?>
<?php endforeach; ?>

<?php foreach ($core_properties as $property => $description) : ?>
	<?php if (!$description['protected']): ?>
		<div class="spawn-entity-property">

			<span class="spawn-entity-property-name">
				<?php echo elgg_echo("spawn:property:$type:$property"); ?>
			</span>
			
			<?php
				echo elgg_view('output/url', array(
					'href' => "#$type\\:$subtype\\:$property\\:settings",	// escape colons for jQuery
					'rel' => 'toggle',
					'text' => elgg_echo('settings'),
					'class' => 'spawn-settings elgg-icon elgg-icon-settings-alt'
				)); 
			?>			
			
			<div id="<?php echo "$type:$subtype:$property:settings"; ?>" class="spawn-settings">
				<?php echo "$type:$subtype:$property:settings"; ?>
			</div>
		
		</div>
	<?php endif; ?>
<?php endforeach; ?>