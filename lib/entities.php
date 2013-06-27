<?php

function spawn_get_entity_statistics() {
	$entity_types = get_registered_entity_types();
	$statistics = get_entity_statistics();
	$spanwed_statistics = spawn_get_spawned_entity_statistics();

	$results = array();
	foreach ($entity_types as $entity_type => $subtypes) {
		if (!isset($results[$entity_type])) {
			$results[$entity_type] = array();
		}
		if (empty($subtypes)) {
			$results[$entity_type]['__base__'] = array('count' => 0, 'spawned' => 0);
		} else {
			foreach ($subtypes as $subtype) {
				$results[$entity_type][$subtype] = array('count' => 0, 'spawned' => 0);
			}
		}
	}

	foreach ($statistics as $entity_type => $subtypes) {
		if (!isset($results[$entity_type])) {
			$results[$entity_type] = array();
		}
		foreach ($subtypes as $subtype => $count) {
			$results[$entity_type][$subtype] = array('count' => $count, 'spawned' => 0); 
		}
	}

	foreach ($spanwed_statistics as $entity_type => $subtypes) {
		foreach ($subtypes as $subtype => $count) {
			$results[$entity_type][$subtype]['spawned'] = $count; 
		}
	}
	
	return $results;
}

function spawn_get_spawned_entity_statistics() {
	global $CONFIG;

	$entity_stats = array();
	$dbprefix = elgg_get_config('dbprefix');

	$query = "SELECT DISTINCT
		e.type,s.subtype,e.subtype as subtype_id
		FROM {$dbprefix}entities e
		LEFT JOIN {$dbprefix}entity_subtypes s ON (e.subtype = s.id)";

	// Get a list of major types

	$types = get_data($query);
	foreach ($types as $type) {
		// assume there are subtypes for now
		if (!is_array($entity_stats[$type->type])) {
			$entity_stats[$type->type] = array();
		}

		$query = "SELECT count(*) as count
			FROM {$dbprefix}entities e
			INNER JOIN {$dbprefix}metadata m ON (m.entity_guid = e.guid)
			INNER JOIN {$dbprefix}metastrings s ON (s.id = m.name_id AND s.string = 'org.wamped.spawned') 
			WHERE type='{$type->type}' ";

		if ($type->subtype) {
			$query .= " and subtype={$type->subtype_id}";
		}

		$subtype_cnt = get_data_row($query);

		if ($type->subtype) {
			$entity_stats[$type->type][$type->subtype] = $subtype_cnt->count;
		} else {
			$entity_stats[$type->type]['__base__'] = $subtype_cnt->count;
		}
	}

	return $entity_stats;
}

function spawn_get_root_nodes() {
	$options = array(
		'type' => 'user',
		'count' => true
	);
	$users_count = elgg_get_entities($options);

	$options['type'] = 'group';
	$groups_count = elgg_get_entities($options);

	$options['type'] = 'object';
	$objects_count = elgg_get_entities($options);

	$entities_count = $users_count + $objects_count + $groups_count;

	$nodes = array(
		'data' => array('title' => "Entities ({$entities_count})", 'attr' => array('id' => 'entity')),
		'state' => 'open',
		'children' => array(
			array('data' => array('title' => "Users ({$users_count})"), 'attr' => array('id' => 'user')),
			array('data' => array('title' => "Objects ({$objects_count})"), 'attr' => array('id' => 'object'), 'state' => 'closed'),
			array('data' => array('title' => "Groups ({$groups_count})" ), 'attr' => array('id' => 'group')),
			array('data' => array('title' => "Sites ({$sites_count})"), 'attr' => array('id' => 'site')),
		)
	);
}

function spawn_get_entity_properties() {
	return array();
}

function spawn_get_core_properties($entity_type) {
	return array();
}

function spawn_get_know_metadata($entity_type, $entity_subtype) {
	return array();
}

?>