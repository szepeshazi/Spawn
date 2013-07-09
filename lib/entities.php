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

function spawn_get_all_content_types() {
	return array(
		'user',
		'admin_user',
		'current_user',
		'reference:owner_guid',
		'reference:site_guid',
		'user',
		'admin_user',
		'current_user',
		'group',
		'album',
		'current_site',
		'real_time',
		'fixed',
		'random_interval',
		'empty',
		'userdata',
		'regexp',
		'lipsum',
		'quotes',
	);
}

/*
 * @property string $type           	object, user, group, or site (read-only after save)
 * @property string $subtype        	Further clarifies the nature of the entity (read-only after save)
 * @property int    $guid           	The unique identifier for this entity (read only)
 * @property int    $owner_guid     	The GUID of the creator of this entity
 * @property int    $container_guid 	The GUID of the entity containing this entity
 * @property int    $site_guid      	The GUID of the website this entity is associated with
 * @property int    $access_id      	Specifies the visibility level of this entity
 * @property int    $time_created   	A UNIX timestamp of when the entity was created (read-only, set on first save)
 * @property int    $time_updated   	A UNIX timestamp of when the entity was last updated (automatically updated on save)
 * @property int    $last_action   		A UNIX timestamp of when the entity was last active on site
 * @property enum(yes|no)	$enabled	If the entity is enabled on the site
 */

function spawn_get_entity_properties() {
	return array(
		'guid' => array('protected' => true, 'type' => 'int'),
		'type' => array('protected' => true, 'type' => 'text'),
		'subtype' => array('protected' => true, 'type' => 'int'),
		'owner_guid' => array('protected' => false, 'type' => 'int',
			'content_types' => array(
				'user',
				'admin_user',
				'current_user'
			)
		),
		'container_guid' => array('protected' => false, 'type' => 'int',
			'content_types' => array(
				'reference:owner_guid',
				'reference:site_guid',
				'user',
				'admin_user',
				'current_user',
				'group',
				'album',
			)
		),
		'site_guid' => array('protected' => false, 'type' => 'int',
			'content_types' => array(
				'current_site',
			)
		),
		'access_id' => array('protected' => false, 'type' => 'int',
			'content_types' => array(
				'access_public',
				'access_private',
				'access_group',
			)
		),
		'time_created' => array('protected' => false, 'type' => 'int',
			'content_types' => array(
				'real_time',
				'fixed',
				'random_interval',
			)
		),
		'time_updated' => array('protected' => false, 'type' => 'int',
			'content_types' => array(
				'reference:time_created',
				'real_time',
				'fixed',
				'random_interval',
			)
		),
		'last_action' => array('protected' => false, 'type' => 'int',
			'content_types' => array(
				'reference:time_created',
				'real_time',
				'fixed',
				'random_interval',
			)
		),
		'enabled' => array('protected' => true, 'type' => 'enum(yes|no)'),
	);
}

function spawn_get_core_properties($entity_type) {
	switch ($entity_type) {
	case 'user':
		$properties = spawn_get_user_properties();
		break;
	case 'object':
		$properties = spawn_get_object_properties();
		break;
	case 'group':
		$properties = spawn_get_group_properties();
		break;
	case 'site':
		$properties = spawn_get_site_properties();
		break;
	default:
		throw new Exception(elgg_echo('spawn:entity_type:unknown'));
	}
	return $properties;
}

function spawn_get_user_properties() {
	return array(
		'name' => array('protected' => false, 'type' => 'text',
			'content_types' => array(
				'empty',
				'userdata',
				'regexp'
			)
		),
		'username' => array('protected' => false, 'type' => 'text',
			'content_types' => array(
				'auto',
				'userdata',
				'regexp'
			)
		),
		'email' => array('protected' => false, 'type' => 'text',
			'content_types' => array(
				'userdata',
				'regexp'
			)
		),
	);
}

function spawn_get_object_properties() {
	return array(
		'title' => array('protected' => false, 'type' => 'text',
			'content_types' => array(
				'empty',
				'lipsum',
				'quotes',
				'regexp'
			)
		),
		'description' => array('protected' => false, 'type' => 'text',
			'content_types' => array(
				'reference:title',
				'empty',
				'lipsum',
				'quotes',
				'regexp'
			)
		),
	);
}

function spawn_get_group_properties() {
	return array(
		'name' => array('protected' => false, 'type' => 'text',
			'content_types' => array(
				'empty',
				'lipsum',
				'quotes',
				'regexp'
			)
		),
		'description' => array('protected' => false, 'type' => 'text',
			'content_types' => array(
				'reference:title',
				'empty',
				'lipsum',
				'quotes',
				'regexp'
			)
		),
	);
}

function spawn_get_site_properties() {
	return array(
		'name' => array('protected' => false, 'type' => 'text',
			'content_types' => array(
				'empty',
				'lipsum',
				'quotes',
				'regexp'
			)
		),
		'description' => array('protected' => false, 'type' => 'text',
			'content_types' => array(
				'reference:name',
				'empty',
				'lipsum',
				'quotes',
				'regexp'
			)
		),
	);
}

function spawn_get_known_metadata($entity_type, $entity_subtype) {
	return array();
}

?>