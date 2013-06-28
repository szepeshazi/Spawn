<div class="spawn-admin spawn-list">

<?php 
$entities = $vars['entities'];
?>

<?php foreach ($entities as $type => $subtypes): ?>
	<?php foreach ($subtypes as $subtype => $details): ?>

	<div class="spawn-entity">

		<div class="spawn-info spawn-left">

			<span class="spawn-name">
				<?php $item_name = elgg_echo(($subtype === '__base__') ? "item:$type" : "item:$type:$subtype"); ?>
				<?php echo $item_name; ?>			
			</span>

			<span class="spawn-count">
				<?php echo $details['count']; ?>			
			</span>

			<span class="spawn-spawned-count">
				<?php echo $details['spawned']; ?>			
			</span>
		</div>

		<div class="spawn-delete spawn-left">
			<?php if (intval($details['spawned']) == 0) : ?>
				<span class="spawn-delete">
					<?php 
						echo elgg_view('input/button', array(
							'class' => 'elgg-requires-confirmation',
							'value' => elgg_echo('spawn:items:delete', array($details['spawned'], $item_name)) 
						));
					?>
				</span>
			<?php endif; ?>
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
					'text' => elgg_echo('settings'),
					'class' => 'spawn-settings elgg-icon elgg-icon-settings-alt'
				)); 
			?>
			
		</div>
		
		<div id="<?php echo "$type:$subtype:settings"; ?>" class="spawn-settings">
			<?php echo elgg_view('spawn/entity/settings', array('type' => $type, 'subtype' => $subtype)); ?>
		</div>
		
		
	</div>
	<div class="clearfix"></div>

	<?php endforeach; ?>
<?php endforeach; ?>

</div>
