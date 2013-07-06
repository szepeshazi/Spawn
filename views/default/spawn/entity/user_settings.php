<?php 
	extract(array_intersect_key($vars, array('type' => true, 'subtype' => true))); 
?>
<div class="spawn-settings-head">
	<div class="spawn-settings-head-row">
		<?php 
			echo elgg_view('input/checkbox', array(
				'name' => 'usericons',
				'checked' => 'checked',
				'class' => 'toggler',
				'data-rel' => 'usericons-percentage-block'
			));
		?>
		<label for="usericons"><?php echo elgg_echo('spawn:users:createicons'); ?></label>
		<div id="usericons-percentage-block" class="slider-block">
			<div id="usericons-percentage" class="slider"></div>
			<input type="hidden" name="usericons-percentage" value="75"></input>
			<div id="usericons-percentage-value" class="slider-overlay">75</div>
			<span><?php echo elgg_echo('spawn:users:createicons:percentage'); ?></span>
		</div>
	</div>

	<div class="spawn-settings-head-row">
		<?php 
			echo elgg_view('input/checkbox', array(
				'name' => 'createfriends',
				'checked' => 'checked',
				'class' => 'toggler',
				'data-rel' => 'friends-amount-block'
			)); 
		?>
		<label for="friendrelations"><?php echo elgg_echo('spawn:users:createfriends'); ?></label>
		<div id="friends-amount-block" class="slider-block">
			<div id="friends-amount" class="slider"></div>
			<input type="hidden" name="friends-amount" value="20"></input>
			<div id="friends-amount-value" class="slider-overlay">20</div>
			<span><?php echo elgg_echo('spawn:users:createfriends:amount'); ?></span>
		</div>
	</div>	
</div>