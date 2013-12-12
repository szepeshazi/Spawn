<?php if (false) : ?><script type="text/javascript"><?php endif; ?>

elgg.provide('spawn');

spawn.toggler = function() {
	$("input[type='checkbox'].toggler").live('change', function() {
		var node = $("#" + $(this).attr('data-rel'));
		if ($(this).is(":checked")) {
			node.show();
		} else {
			node.hide();
		}
	});
};

spawn.addPropertyBinding = function() {
	$('a.spawn-add-property').live('click', function() {
		var $template = $('div#spawn-new-property').clone();
		var $this = $(this);

		// Remove the cloned div's id to avoid duplicate nodes
		$template.first().removeAttr('id');

		// Determine the proper name for property-type selector
		var parentId = $this.closest('div.spawn-entity').attr('id');
		var idParts = parentId.split(":");
		$template.find('select').attr('name', 'property_type:' + idParts[1] + ':' + idParts[2] + ':new[]');
		
		$this.parent().before($template);
	});
};

spawn.addEntityBinding = function() {
	$('a.spawn-add-entity').live('click', function() {
		var $template = $('div#spawn-new-entity').clone();
		var $this = $(this);

		// Remove the cloned div's id to avoid duplicate nodes
		$template.first().removeAttr('id');
		
		$this.parent().before($template);
	});
};

spawn.removeEntityBinding = function() {
	$('button.spawn-entity-remove-button').live('click', function() {
		var $entityDiv = $(this).closest('div.spawn-entity');
		$entityDiv.remove();
	});
};

spawn.removePropertyBinding = function() {
	$('button.spawn-property-remove-button').live('click', function() {
		var $propertyDiv = $(this).closest('div.spawn-entity-property');
		$propertyDiv.remove();
	});
};

spawn.changePropertyTypeBinding = function() {
	$('div.spawn-entity-property-type select.elgg-input-dropdown').change(function() {
		var newPropertyType = $(this).val();
		var $propertySettingsDiv = $(this).parents('div.spawn-entity-property').next('div.spawn-entity-property-settings');
		var $propertyTemplate = $('div.spawn-property-templates.advanced-settings').find('div.settings-type-' + newPropertyType).clone();
		$propertySettingsDiv.find('div.spawn-property-advanced-settings').remove();
		$propertySettingsDiv.append($propertyTemplate);
	});
};

spawn.init = function() {

	// inline-block style toggler
	// $('div.spawn-entity-property-settings').hide();
	$('div.spawn-entity-property-settings').each(function() {
		// $height = $(this).height();
		// $(this).css('height', $height);
		$(this).hide();
	});

	// Checkbox state dependent div displays
	spawn.toggler();

	$('div.slider').slider({
		create: function(event, ui){
	        $(this).slider('value', $(this).next().val());
	    },		
		slide: function(event, ui) {
        	$(this).next().val(ui.value).next().text(ui.value);
    	}
	});
	
	// Initialize different UI change bindings
	spawn.addPropertyBinding();
	spawn.removePropertyBinding();
	spawn.addEntityBinding();
	spawn.removeEntityBinding();
	spawn.changePropertyTypeBinding();
};

elgg.register_hook_handler('init', 'system', spawn.init);

<?php if (false): ?></script><?php endif; ?>
