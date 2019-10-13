<?php
/**
 * Elgg Connect sidebar
 * @package elgg_connect
 * 
 */

$plugin = elgg_get_plugin_from_id('elgg_connect');
$user = elgg_get_logged_in_user_entity();

if ($plugin->usericon != 'no'){
			
	$icon = elgg_view_entity_icon($user, 'large', array('use_hover' => false));
	echo elgg_view_module('info', elgg_echo($user->name), $icon);
}

if ($plugin->friends != 'no'){
		
	$count = $user->getFriends(array('count' => TRUE));
	
	$title = elgg_view('output/url', array(
		'href' => "/friends/$user->username",
		'text' => elgg_echo('friends'),
		'is_trusted' => true,
	));
	
	$options = array(
		'type' => 'user',
		"limit" => 40,
		'relationship' => 'friend',
		'relationship_guid' => elgg_get_logged_in_user_guid(),
		'inverse_relationship' => false,
		'full_view' => false,
		'pagination' => false,
		'list_type' => 'gallery',
		'no_results' => elgg_echo('friends:none'),
		'order_by' => 'rand()' 
	);
	$content = elgg_list_entities_from_relationship($options);
	
	$title .= '<span> (' . $count . ')</span>';
	echo elgg_view_module('info', $title, $content);
}
