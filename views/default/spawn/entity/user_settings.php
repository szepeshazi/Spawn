<?php 
	extract(array_intersect_key($vars, array('type' => true, 'subtype' => true))); 
?>
<div class="spawn-settings-head">
	<label for="usericons"><?php echo elgg_echo('spawn:users:createicons'); ?></label>
	<?php 
		echo elgg_view('input/checkbox', array(
			'name' => 'usericons'
		));
	?>
	
	<label for="friendrelations"><?php echo elgg_echo('spawn:users:createfriends'); ?></label>
	<?php 
		echo elgg_view('input/checkbox', array(
			'name' => 'createfriends'
		)); 
	?>
</div>