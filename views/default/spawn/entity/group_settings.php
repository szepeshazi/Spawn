<?php 
	extract(array_intersect_key($vars, array('type' => true, 'subtype' => true))); 
?>
<div class="spawn-settings-head">
	<div class="spawn-settings-head-row">
		<?php 
			echo elgg_view('input/checkbox', array(
				'name' => 'groupicons',
				'checked' => 'checked',
			));
		?>
		<label for="groupicons" class="short"><?php echo elgg_echo('spawn:groups:createicons'); ?></label>
	</div>

	<div class="spawn-settings-head-row">
		<?php 
			echo elgg_view('input/checkbox', array(
				'name' => 'memberships',
				'checked' => 'checked',
				'class' => 'toggler',
				'data-rel' => 'membership-amount-block'
			)); 
		?>
		<label for="memberships" class="short"><?php echo elgg_echo('spawn:groups:memberships'); ?></label>
		<div id="membership-amount-block" class="slider-block">
			<span><?php echo elgg_echo('spawn:groups:membership:amount:pre'); ?></span>
			<div id="membership-amount" class="slider"></div>
			<input type="hidden" name="membership-amount" value="30"></input>
			<div id="membership-amount-value" class="slider-overlay">30</div>
			<span><?php echo elgg_echo('spawn:groups:membership:amount:post'); ?></span>
		</div>
	</div>	
</div>