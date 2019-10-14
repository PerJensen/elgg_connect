<?php
/**
 * Elgg Connect layout
 * @package elgg_connect
 *
 */

$plugin = elgg_get_plugin_from_id('elgg_connect');

$params_members = array(
	'text' => $plugin->members_h1,
	'href' => 'members',
	'is_trusted' => true,
);
$members_url = elgg_view('output/url', $params_members);

$params_groups = array(
	'text' => $plugin->groups_h1,
	'href' => 'groups/all',
	'is_trusted' => true,
);
$groups_url = elgg_view('output/url', $params_groups);

$groups = $vars['groups'];
$members = $vars['members'];

echo elgg_view('elgg_connect/elements/featured');

// action content
if ($plugin->display_action == "yes") {
			
	$h1 = elgg_format_element('h1', [], $plugin->action_h1);
	$header = elgg_format_element('div', [
		'class' => 'elgg-head elgg-layout-header',
	], $h1);
	$sub = elgg_format_element('div', [
		'class' => 'elgg-layout-content',
	], $plugin->action_h2);
	
	$body = elgg_format_element('div', ['class' => 'elgg-container action'], $header . $sub);
	$action_content = elgg_format_element('div', ['class' => 'elgg-layout-content'], $body);

}
// members list 
if ($plugin->display_members == "yes") {
		
	$url = elgg_format_element('h1', [], $members_url); 
	$header = elgg_format_element('div', [
		'class' => 'elgg-head elgg-layout-header',
	], $url);
	
	$i = 0; 
	foreach ($members as $member) {
		if ($member->banned == 'yes') {
			continue;
		}
		$name = elgg_format_element('p', [], $member->name);
		$items .= elgg_format_element('div', [
			'class' => 'elgg-item',
		], elgg_view_entity_icon($member, 'medium', [
			'use_hover' => false
		]) . $name);
		
		$i ++;
		if ($i == 5) {
			break;
		}
	}
	$body = elgg_format_element('div', ['class' => 'elgg-container users'], $header . $items);
	$users_content = elgg_format_element('div', ['class' => 'elgg-layout-content'], $body);
}
// groups list
if ($plugin->display_groups == "yes") {
					
	$url = elgg_format_element('h1', [], $groups_url);
	$header = elgg_format_element('div', [
		'class' => 'elgg-head elgg-layout-header',
	], $url);

	$i = 0;
	foreach ($groups as $group) {
		if ($group->getContentAccessMode() == ElggGroup::CONTENT_ACCESS_MODE_MEMBERS_ONLY) {
			continue;
		}
		$image = elgg_format_element('div', [
			'class' => 'elgg-image',
		], elgg_view_entity_icon($group, 'group_cover_small'));		
		
		$url = elgg_view('output/url', array(
			'text' => $group->name,
			'href' => $group->getURL()
		));
		$title = elgg_format_element('h2', [], $url);
		
		$members = elgg_echo('members') . ": " . $group->getMembers(array('count' => true));	
		$sub = elgg_format_element('div', [], $members);
						
		$body = elgg_format_element('div', ['class' => 'elgg-body'], $title . $sub);
		
		$group_item .= elgg_format_element('div', ['class' => 'elgg-image-block'], $image . $body);
		
		$i ++;
		if ($i == 3) {
			break;
		}
	}
	$body = elgg_format_element('div', ['class' => 'elgg-container groups'], $header . $group_item);
	$groups_content = elgg_format_element('div', ['class' => 'elgg-layout-content'], $body);
}
	
echo elgg_format_element('div', [
	'class' => 'elgg-landing-page-body'
], $action_content . $users_content . $groups_content);
