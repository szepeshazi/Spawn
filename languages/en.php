<?php

$english = array(

	// In case the "Developer Tools" plugin is disabled, we still need these labels for menu items
	'admin:develop_tools' => 'Tools',
	'admin:developers' => 'Developers',

	'admin:develop_tools:spawn' => 'Spawn entities',
	'spawn:instructions' => 'Here cometh a bit of instructions',
	'spawn:items:delete' => 'Delete %s spawned %s',
	'spawn:items:spawn' => 'Number of %s to spawn',

	'spawn:property:entity:guid' => 'GUID (unique identifier)',
	'spawn:property:entity:type' => 'Entity type',
	'spawn:property:entity:subtype' => 'Entity subtype',
	'spawn:property:entity:owner_guid' => 'Owner GUID (identifier of owner)',
	'spawn:property:entity:container_guid' => 'Container GUID (indentifier of container)',
	'spawn:property:entity:site_guid' => 'Site GUID (identifier of site)',
	'spawn:property:entity:access_id' => 'Access id',
	'spawn:property:entity:time_created' => 'Time created',
	'spawn:property:entity:time_updated' => 'Time updated',
	'spawn:property:entity:last_action' => 'Last action',
	'spawn:property:entity:enabled' => 'Enabled',

	'spawn:property:user:name' => 'Display name',
	'spawn:property:user:username' => 'Username',
	'spawn:property:user:email' => 'E-mail address',
		
	'spawn:property:object:title' => 'Title',
	'spawn:property:object:description' => 'Description',

	'spawn:property:group:name' => 'Name',
	'spawn:property:group:description' => 'Description',

	'spawn:property:site:title' => 'Title',
	'spawn:property:site:description' => 'Description',

);

add_translation("en", $english);

?>