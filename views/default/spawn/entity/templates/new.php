<?php 
	$entities = $vars['entities'];
	$options_values = array();
	foreach ($entities as $type => $subtypes) {
		$options_values[$type] = elgg_echo("spawn:item:$type:singular");
	}
		
?>
<div id="spawn-new-entity" class="spawn-entity">

	<div class="spawn-entity-type">
		<?php echo elgg_view('input/dropdown', array('options_values' => $options_values, 'value' => 'object')); ?>
	</div>
	<div class="spawn-entity-subtype">
		<?php echo elgg_view('input/text'); ?>
	</div>
	
	<div class="spawn-entity-remove">
		<button class="spawn-entity-remove-button">
			<?php echo elgg_view_icon('delete'); ?>
			Remove
		</button>
	</div>
	
	<div class="spawn-actions">

		<label for="<?php echo "$type:$subtype"; ?>"><?php echo elgg_echo('spawn:items:spawn', array("new entities")); ?></label>
		<?php 
			echo elgg_view('input/text', array(
				'name' => "$type",
				'class' => 'number'
			)); 
		?>

		<?php
			echo elgg_view('output/url', array(
				'href' => "#$type\\:$subtype\\:settings",	// escape colons for jQuery
				'rel' => 'toggle',
				'text' => elgg_view_icon('settings-alt') . elgg_echo('settings'),
				'class' => 'spawn-settings-toggle'
			)); 
		?>
		
	</div>
	
	<div id="<?php echo "$type:$subtype:settings"; ?>" class="spawn-settings">
		<?php echo elgg_view("spawn/entity/{$type}_settings", array('type' => $type, 'subtype' => $subtype)); ?>
		<?php echo elgg_view('spawn/entity/settings', array('type' => $type, 'subtype' => $subtype)); ?>
	</div>	
</div>
