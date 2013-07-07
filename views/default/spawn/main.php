<div class="spawn-admin spawn-list">

<?php echo elgg_view('spawn/global_settings'); ?>

<?php $entities = $vars['entities']; ?>
<?php foreach ($entities as $type => $subtypes): ?>
	<?php foreach ($subtypes as $subtype => $details): ?>

	<div class="spawn-entity">

		<div class="spawn-name">
			<?php $item_name = elgg_echo(($subtype === '__base__') ? "item:$type" : "item:$type:$subtype"); ?>
			<?php echo $item_name; ?>			
		</div>

		<div class="spawn-details">
			<div class="spawn-info" title="<?php echo elgg_echo('spawn:entity:count:spawned', array($item_name)); ?>">
				<?php echo spawn_view_icon('spawned') . $details['spawned']; ?>			
			</div>
	
			<?php 
				if ($details['count']) {
					echo elgg_view('output/url', array(
						'href' => "admin/develop_tools/spawn/inspect",
						'text' => spawn_view_icon('inspect'),
						'title' => elgg_echo('spawn:entity:inspect:spawned', array($item_name)),
					)); 
				} else {
					echo spawn_view_icon('empty');
				}
			?>			
			
			<div class="spawn-info" title="<?php echo elgg_echo('spawn:entity:count:total', array($item_name)); ?>">
				<?php echo spawn_view_icon('count') . $details['count']; ?>
			</div>
	
			<?php 
				if ($details['count']) {
					echo elgg_view('output/url', array(
						'href' => "admin/develop_tools/spawn/inspect",
						'text' => spawn_view_icon('inspect'),
						'title' => elgg_echo('spawn:entity:inspect:all', array($item_name)),
					)); 
				} else {
					echo spawn_view_icon('empty');
				}
			?>
		</div>	

		<div class="spawn-delete">
			<?php 
				if (intval($details['count'])) {
					echo elgg_view('input/button', array(
						'class' => 'elgg-requires-confirmation',
						'value' => elgg_echo('spawn:items:delete', array($details['spawned'], $item_name)) 
					));
				} 
			?>
		</div>
		
		<div class="spawn-actions">

			<label for="<?php echo "$type:$subtype"; ?>"><?php echo elgg_echo('spawn:items:spawn', array($item_name)); ?></label>
			<?php 
				echo elgg_view('input/text', array(
					'name' => "$type:$subtype",
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

	<?php endforeach; ?>
<?php endforeach; ?>

<?php echo elgg_view('spawn/footer'); ?>

</div>
