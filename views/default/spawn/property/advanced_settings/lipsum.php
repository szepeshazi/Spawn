<div class="spawn-property-advanced-settings settings-type-lipsum">
	<div class="spawn-advanced-settings-row">
		<div class="label-short"><?php echo elgg_echo('spawn:settings:advanced:min'); ?></div>
		<div>
		<?php 
			echo elgg_view('input/text', array(
				'class' => 'short'
			)); 
		?>
		</div>
		<div>
		<?php 
			echo elgg_view('input/dropdown', array(
				'options_values' => array('chars' => 'characters', 'words' => 'words')
			)); 
		?>
		</div>
		<div class="spawn-info" title="<?php echo elgg_echo('spawn:settings:advanced:include_guids:info'); ?>">
			<?php echo spawn_view_icon('question'); ?>			
		</div>
	</div>
	
	<div class="spawn-advanced-settings-row">
		<div class="label-short"><?php echo elgg_echo('spawn:settings:advanced:exclude_guids'); ?></div>
		<div>
		<?php 
			echo elgg_view('input/text', array(
				'class' => 'long'
			)); 
		?>
		</div>
		<div class="spawn-info" title="<?php echo elgg_echo('spawn:settings:advanced:exclude_guids:info'); ?>">
			<?php echo spawn_view_icon('question'); ?>			
		</div>
	</div>
</div>