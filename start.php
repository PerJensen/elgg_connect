<?php
/*
 * Elgg Connect theme
 *
 * @author Per Jensen
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2
 * @copyright Copyright (c) 2019, Per Jensen
 *
 */
 
return function() {
	elgg_register_event_handler('init', 'system', 'connect_init');
};
 
function connect_init() {
	
	$plugin = elgg_get_plugin_from_id('elgg_connect');
	
	// custom icon sizes
	elgg_register_plugin_hook_handler('entity:icon:sizes', 'group', 'elgg_connect_custom_icon_sizes');
	
	// theme specific CSS
	elgg_extend_view('elgg.css', 'elgg_connect/elgg_connect.css');

	elgg_extend_view('groups/edit/profile', 'elgg_connect/elements/info', 0);
	
	if (elgg_is_logged_in() && ($plugin->sidebar == "yes")) {
		elgg_extend_view('river/sidebar', 'elgg_connect/sidebar');
	}
}

/**
 * Set custom icon sizes for group icons
 *
 * @param string $hook   "entity:icon:url"
 * @param string $type   "object"
 * @param array  $return Sizes
 * @param array  $params Hook params
 * @return array
 */
function elgg_connect_custom_icon_sizes($hook, $type, $return, $params) {

	$entity_subtype = elgg_extract('entity_subtype', $params);
	if ($entity_subtype !== 'group') {
		return;
	}
	
	$return['group_cover'] = [
		'w' => 1200,
		'h' => 500,
		'square' => false,
		'upscale' => false,
	];
	
	$return['group_cover_small'] = [
		'w' => 400,
		'h' => 167,
		'square' => false,
		'upscale' => false,
	];
		
	return $return;
}
