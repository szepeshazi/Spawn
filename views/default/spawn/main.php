<div class="spawn-admin spawn-list">

<?php 
$entities = $vars['entities'];
?>

<?php foreach ($entities as $type => $subtypes): ?>
	<?php foreach ($subtypes as $subtype => $details): ?>

	<div class="spawn-entity">

		<div class="spawn-info">

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

		<div class="spawn-actions">

		<?php if (intval($details['spawned']) == 0) : ?>
				<span class="spawn-delete">
					<?php 
						echo elgg_view('input/button', array(
							'value' => elgg_echo('spawn:items:delete', array($details['spawned'], $item_name)) 
						));
					?>
				</span>
			<?php endif; ?>

			<label for="<?php echo "$type:$subtype"; ?>"><?php echo elgg_echo('spawn:items:spawn', array($item_name)); ?></label>
			<?php 
				echo elgg_view('input/text', array(
					'name' => "$type:$subtype",
					'class' => 'number'
				)); 
			?>

			<span class="spawn-settings">
				<a href="#">Settings</a>
			</span>
			
		</div>
		
	</div>

	<?php endforeach; ?>
<?php endforeach; ?>

</div>
