<?php

$current_tab = get_input('tab', 'spawn');

$tabs = array();
$tabs[] = array(
	'title' => 'Spawn entities',
	'url' => 'admin/develop_tools/spawn?tab=spawn',
	'selected' => ($current_tab == 'spawn')
);
$tabs[] = array(
	'title' => 'Delete spawned entities',
	'url' => 'admin/develop_tools/spawn?tab=delete',
	'selected' => ($current_tab == 'delete')
);
$tabs[] = array(
	'title' => 'Manage entity types',
	'url' => 'admin/develop_tools/spawn?tab=entity_types',
	'selected' => ($current_tab == 'entity_types')
);


echo elgg_view('navigation/tabs', array('tabs' => $tabs));

echo elgg_view('output/longtext', array('value' => elgg_echo('spawn:instructions')));

echo elgg_view('spawn/main', array('entities' => spawn_get_entity_statistics()));

