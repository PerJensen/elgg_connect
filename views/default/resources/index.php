<?php
/**
 * Elgg Connect front page
 * @package elgg_connect
 * 
 */

if (elgg_is_logged_in()) {
	forward('activity');
}

$list_params = array(
	'type' => 'user',
	'metadata_names' => 'icontime', 
	'full_view' => false,
	'pagination' => false,
	'limit' => 10,
	'offset' => 0,
);
$members = elgg_get_entities($list_params);

$options = array(
	'type' => 'group', 
	'full_view' => false,
	'pagination' => false,
	'limit' => 10,
	'offset' => 0
);
$groups = elgg_get_entities($options);

// lay out the content
$params = array(
	'groups' => $groups,
	'members' => $members
);

elgg_push_context('elgg_connect');
$class = array('class' => 'elgg-landing-page');

$body = elgg_view_layout('front_page', $params);
echo elgg_view_page(null, $body, 'default', array('body_attrs' => $class));
