<?php if (false): ?><script type="text/javascript"><?php endif; ?>

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

spawn.init = function() {
	spawn.toggler();
	$('div.slider').slider({
		create: function(event, ui){
	        $(this).slider('value', $(this).next().val());
	    },		
		slide: function(event, ui) {
        	$(this).next().val(ui.value).next().text(ui.value);
    	}
	});
};

elgg.register_hook_handler('init', 'system', spawn.init);

<?php if (false): ?></script><?php endif; ?>
