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

			<div class="spawn-entity-property-name">
				<?php echo elgg_echo("spawn:property:entity:$property"); ?>
			</div>
			
			<?php
				echo elgg_view('output/url', array(
					'href' => "#$type\\:$subtype\\:$property\\:settings",	// escape colons for jQuery
					'rel' => 'toggle',
					'text' => elgg_view_icon('settings-alt') . elgg_echo('settings'),
					'class' => 'spawn-settings'
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

			<div class="spawn-entity-property-name">
				<?php echo elgg_echo("spawn:property:$type:$property"); ?>
			</div>
			
			<div class="spawn-entity-property-type">

			</div>
			
			<?php
				echo elgg_view('output/url', array(
					'href' => "#$type\\:$subtype\\:$property\\:settings",	// escape colons for jQuery
					'rel' => 'toggle',
					'text' => elgg_view_icon('settings-alt') . elgg_echo('settings'),
					'class' => 'spawn-settings'
				)); 
			?>			
			
			<div id="<?php echo "$type:$subtype:$property:settings"; ?>" class="spawn-property-settings">
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
