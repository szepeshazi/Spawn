<?php

$english = array(

	// In case the "Developer Tools" plugin is disabled, we still need these labels for menu items
	'admin:develop_tools' => 'Tools',
	'admin:developers' => 'Developers',

	'admin:develop_tools:spawn' => 'Spawn entities',
	'spawn:instructions' => 'Here cometh a bit of instructions',
	'spawn:items:delete' => 'Delete %s spawned %s',
	'spawn:items:spawn' => 'Number of %s to spawn',
		
	'spawn:entity:count:total' => 'Total number of %s',
	'spawn:entity:count:spawned' => 'Number of spawned %s',
		
	'spawn:entity:inspect:all' => 'View all %s',
	'spawn:entity:inspect:spawned' => 'View all spawned %s',

	'spawn:settings:advanced' => 'Advanced settings',
		
	'spawn:property:entity:guid' => 'GUID',
	'spawn:property:entity:type' => 'Entity type',
	'spawn:property:entity:subtype' => 'Entity subtype',
	'spawn:property:entity:owner_guid' => 'Owner GUID',
	'spawn:property:entity:container_guid' => 'Container GUID',
	'spawn:property:entity:site_guid' => 'Site GUID',
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
		
	'spawn:property:content_type:user' => 'Any user',
	'spawn:property:content_type:admin_user' => 'Any admin user',
	'spawn:property:content_type:current_user' => 'The logged in user (i.e. you)',
	'spawn:property:content_type:reference:owner_guid' => 'Same as the owner GUID',
	'spawn:property:content_type:reference:site_guid' => 'Same as the site GUID',
	'spawn:property:content_type:group' => 'Any group',
	'spawn:property:content_type:album' => 'Any TidyPics photo album',
	'spawn:property:content_type:current_site' => 'The current site GUID',
	'spawn:property:content_type:access_public' => 'Public access',
	'spawn:property:content_type:access_private' => 'Private access',
	'spawn:property:content_type:access_group' => 'Restrict access to container group',
	'spawn:property:content_type:real_time' => 'Real time (now)',
	'spawn:property:content_type:fixed' => 'User defined time stamp',
	'spawn:property:content_type:random_interval' => 'Random time within a period',
	'spawn:property:content_type:reference:time_created' => 'Same as creation time',
	'spawn:property:content_type:empty' => 'Empty value',
	'spawn:property:content_type:userdata' => 'Value from a fake user database',
	'spawn:property:content_type:regexp' => 'Value allowed by a regular expression',
	'spawn:property:content_type:lipsum' => 'Extract from Lorem Ipsum text',
	'spawn:property:content_type:quotes' => 'Extract from quotes',
	'spawn:property:content_type:reference:title' => 'Same as the title',
	'spawn:property:content_type:reference:name' => 'Same as the name',
	'spawn:property:content_type:auto' => 'Automatically generated',
		
);

add_translation("en", $english);

?>