<?php

/**
 * Spawn plugin
 *
 * @package Spawn
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Andras Szepeshazi
 * @copyright Andras Szepeshazi
 * @link http://wamped.org
 */

/**
 * Spawn initialization
 */
function spawn_init() {
	if (elgg_is_admin_logged_in()) {

		$base_name = basename(dirname(__FILE__));
		$path = elgg_get_plugins_path() . $base_name;
		elgg_register_library('spawn:entities', $path . '/lib/entities.php');
		elgg_load_library('spawn:entities');

		elgg_register_event_handler('pagesetup', 'system', 'spawn_setup_menu');
		elgg_extend_view('css/admin', 'css/spawn');
	}
}

function spawn_setup_menu() {
	if (elgg_in_context('admin')) {
		if (!elgg_is_menu_item_registered('page', 'develop_tools')) {
			elgg_register_admin_menu_item('develop', 'develop_tools');
		}
		elgg_register_admin_menu_item('develop', 'spawn', 'develop_tools');
	}
}

elgg_register_event_handler('init', 'system', 'spawn_init');
