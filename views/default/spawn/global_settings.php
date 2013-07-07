<?php 
	extract(array_intersect_key($vars, array('type' => true, 'subtype' => true))); 
?>
<div class="spawn-settings-head spawn-global-settings">

	<div class="spawn-settings-head-row">
		<?php 
			echo elgg_view('input/checkbox', array(
				'name' => 'riverentries',
				'checked' => 'checked',
			));
		?>
		<label for="riverentries"><?php echo elgg_echo('spawn:settings:createriver'); ?></label>
	</div>

	<div class="spawn-settings-head-row">
		<?php 
			echo elgg_view('input/checkbox', array(
				'name' => 'containspawn',
				'checked' => 'checked',
				'class' => 'toggler',
				'data-rel' => 'containcurrent'
			));
		?>
		<label for="containspawn"><?php echo elgg_echo('spawn:settings:containspawn'); ?></label>
	</div>
	
	<div class="spawn-settings-head-row" id="containcurrent">
		<?php 
			echo elgg_view('input/checkbox', array(
				'name' => 'containcurrent',
			));
		?>
		<label for="containcurrent"><?php echo elgg_echo('spawn:settings:containcurrent'); ?></label>
	</div>
	
</div>